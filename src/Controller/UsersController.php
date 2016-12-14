<?php
namespace App\Controller;
use Cake\ORM\TableRegistry;
use App\Model\Entity\Device;
use App\Controller\AppController;
use Cake\Error\Debugger;
use Cake\ORM\Entity;
use Cake\ORM\Query;
use Cake\Auth\DefaultPasswordHasher;
use Cake\Controller\Component\AuthComponent;
use Cake\Datasource\ConnectionManager;
use Cake\Utility;

/**
 * Users Controller
 *
 * @property \App\Model\Table\UsersTable $Users
 */
class UsersController extends AppController
{

	public function initialize()
	{
		parent::initialize();
        $session = $this->request->session();

		$this->Auth->allow(['logout', 'register', 'forgotPassword', 'activation', 'resetPasswords']);
	}



    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     * @author Muneeb Noor
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Cities']
        ];
        $users = $this->paginate($this->Users);

        $this->set(compact('users'));
        $this->set('_serialize', ['users']);
    }



    /**
     * View method
     *
     * @param string|null $id User id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     * @author Touhidur Rahman, Norman Lista
     */
    public function view($id = null)
    {
        // if id is not supplied show own profile
        if (!$id) $id = $this->Auth->user('id');
        $user = $this->Users->get($id);
        $propertiesTbl = TableRegistry::get('Properties');
        $query = $propertiesTbl->find()->where(['user_id' => $id]);
        // join zips.number field
        $query->contain(['Zips' => function($q){
            return $q->select('number', 'city', 'province');
        }]);
        // join images table for property images
        $query->contain(['Images']);

        $propertyCount = $query->count();
        $properties = $query->toList();

        //@author Norman Lista
        //send LogUser For verification of rating himself
        $logUser=$this->Auth->user('id');
        //for feedback
        $this->loadModel('Feedbacks');
        $feedback=$this->Feedbacks->newEntity();
        if($this->request->is('post')){
            $feedback= $this->Feedbacks->patchEntity($feedback,$this->request->data);
         if($this->Feedbacks->save($feedback)){
             $this->Flash->success(__('Feedback added'));
         }else{
             $this->Flash-error(__('Unable to add feedback'));
         }
        }
        $this->set('feedback',$feedback);
        $this->set(compact('user', 'properties', 'propertyCount', 'logUser'));
        $this->set('_serialize', ['user', 'properties', 'propertyCount']);
    }



    /**
     * Add method - add user profile image
     *@Mythri Manjunath
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add($id=null)
    {
        $user='';
        if ($this->request->is('post')) {
            if(!empty($this->request->data['photo']['name'])){
                $fileName = $this->request->data['photo']['name'];
                $extention = pathinfo($fileName,PATHINFO_EXTENSION);
                $newfileName=$id.'.'.$extention;
                $destDir = WWW_ROOT .'img'. DS .'users'. DS . $newfileName;
                if(move_uploaded_file($this->request->data['photo']['tmp_name'],$destDir)){
                   if (!$id) $id = $this->Auth->user('id');
                    $user = $this->Users->get($id);
                    $user->photo = $newfileName;
                    if ($this->Users->save($user)) {
                        $this->Flash->success(__('Your profile Image has been uploaded successfully.'));
                        return $this->redirect([
                        'controller' => 'Users',
                         'action' => 'view', $id
                       ]);
                    }else{
                        $this->Flash->error(__('Unable to upload image, please try again.'));
                    }
                }else{
                    $this->Flash->error(__('Unable to upload image, please try again.'));
                }
            }else{
                $this->Flash->error(__('Please choose a image to upload.'));
            }

        }
        $cities = $this->Users->Cities->find('list', ['limit' => 200]);
        $properties = $this->Users->Properties->find('list', ['limit' => 200]);
        $this->set(compact('user', 'cities', 'properties'));
        $this->set('_serialize', ['user']);
    }




    /**
     * @Author Muneeb Noor
     */
    public function edit($id = null)
    {
	
		if (!$id) 
			$id = $this->Auth->user('id');
		
		else if($id != $this->Auth->user('id'))
		{
			$session = $this->request->session();
			   if($session->read('User.admin') != '1')
					return $this->redirect(
        array('controller' => 'users', 'action' => 'dashboard')
    );
			
		}					
        $user = $this->Users->get($id);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->Users->patchEntity($user, $this->request->data);
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect(['action' => 'add',$id]);
            } else {
                $this->Flash->error(__('The user could not be saved. Please, try again.'));
            }
        }
        $this->viewBuilder()->layout('userdash');
        $this->set(compact('user', 'cities', 'properties'));
        $this->set('_serialize', ['user']);
    }




    /**
     * Delete method
     *
     * @param string|null $id User id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $user = $this->Users->get($id);
        if ($this->Users->delete($user)) {
            $this->Flash->success(__('The user has been deleted.'));
        } else {
            $this->Flash->error(__('The user could not be deleted. Please, try again.'));
        }

		return $this->redirect($this->referer());

	}



    /**
     * @author Muneeb Noor
     */
	public function login()
	{


		if($this->request->is('post'))
		{
			$user = $this->Auth->identify();

            if($user)
			{
				$this->Auth->setUser($user);

				if($this->request->data('remember_me')) {
					$this->Cookie->configKey('CookieAuth', [
						'expires' => '+1 month',
						'httpOnly' => true
					]);
					$this->Cookie->write('CookieAuth', [
						'username' => $this->request->data('username'),
						'password' => (new DefaultPasswordHasher)->hash($this->request->data('password'))
					]);
				}
				$session = $this->request->session();
				if($user['status']==9)
                {

					$session->write('User.admin', '1');
					$this->set('admin',true);
                    return $this->redirect(['controller' => 'admin','action' => 'index']);

                }
				else {
                    $session->write('User.admin', '0');
                    return $this->redirect(['controller' => 'users','action' => 'dashboard']);
                }

			} else if ($user['status'] == 0) {
                $this->Flash->error('Account is not activated yet!');
                return $this->redirect(['controller' => 'users','action' => 'activation']);
            } else {

                $this->Flash->error('Username or password is incorrect');
            }

		}
        // $this->viewBuilder()->layout('default');
	}



    /**
     * @author Muneeb Noor
     */
	public function register()
	{
		$user = $this->Users->newEntity();
		if($this->request->is('post'))
		{
			$user = $this->Users->patchEntity($user, $this->request->data);

			if($this->Users->save($user))
			{
				$this->Flash->success('Thank you for registration, you can log in now');
				return $this->redirect(['action' => 'login']);

			}
			else
				$this->Flash->error('Registration not successful');

		}
		$this->set(compact('user'));
		$this->set('_serialize',['user']);

	}




    /**
     * @author Muneeb Noor
     */
	public function logout()
	{
		$this->Flash->success('You are now logged out.');
		return $this->redirect($this->Auth->logout());
	}



    /**
     * Display User dashboard after login
     * @author Touhidur Rahman
     */
    public function dashboard(){
        $propertiesTbl = TableRegistry::get('properties');
        $favoritesTbl = TableRegistry::get('FavoriteProperties');
        $propertyCount = $propertiesTbl->find()->where(['user_id' => $this->Auth->user('id')])->count();
        $favCount = $favoritesTbl->find()->where(['user_id' => $this->Auth->user('id')])->count();
        $name = $this->Auth->user('first_name') . ' ' . $this->Auth->user('last_name');
        $id=$this->Auth->user('id');
        // Set the layout.
        $this->viewBuilder()->layout('userdash');
        $this->set(compact('name', 'propertyCount', 'favCount', 'id'));

    }



    /**
     * Display Admin dashboard after login
     * @author Ramanpreet Kaur
     */
    public function admin(){
        /*@author Ramanpreet
        * In a controller or table method.
        * select type, count(*) from properties group by type
        */

        $connection = ConnectionManager::get('default');
        $results = $connection->execute('select count(id) as counts , type from properties group by type')->fetchAll('assoc');

        $this->set('results',$results);
        $users = $connection->execute('select count(id) as counts , status from users group by status')->fetchAll('assoc');

        $this->set('users', $users);
        $reports = $connection->execute('select count(id) as counts , user_id from reports group by user_id')->fetchAll('assoc');

        $this->set('reports',$reports);
    }



    /**
     * Forgot password | generate code if post method, display form otherwise
     * @author Ramanpreet Kaur, Touhidur Rahman
     */
    public function forgotPassword()
    {
        if($this->request->is('post'))
        {
            $data= $this->request->data();

            $user = $this->Users->find()->where(['username' => $data['username']])->first();
            // no user is available with this email
            if (!($user->toArray()))
            {
                $this->Flash->error('We did not find any user with that email address!');
                return $this->redirect(['controller' => 'users','action' => 'forgotPassword']);
            }
            else
            {
                // generate a hashed code for user verification
                $resetCode = substr(md5(rand(999,999999)) , 0 , 8);
                $user->reset_key = $resetCode;
                $user->status = 0;
                if ($this->Users->save($user)) {
                    // in ideal case, we should be sending email. but for now we are displaying that code
                    $this->Flash->success('Password change request received. Please check your email for reset code.');
                    $this->Flash->error($resetCode);
                    return $this->redirect(['controller' => 'users','action' => 'activation']);

                }
            }
        }
    }




    /**
     * Upgrade an user to admin
     * @author
     */
	public function makeAdmin($id = null)
	{
        $this->request->allowMethod(['post', 'makeAdmin']);
        $user = $this->Users->get($id);
        $user->status = 9;

		if ($this->Users->save($user)) {
            $this->Flash->success(__('The user has been added as an admin.'));
        } else {
            $this->Flash->error(__('The user could not be added as an admin. Please, try again.'));
        }

		return $this->redirect($this->referer());


	}



    /**
     * GET: displays code entry form
     * POST: check code and redirect to change password
     * @author Touhidur Rahman
     */
    public function activation()  {
        if($this->request->is('post')) {
            $data= $this->request->data();

            $user = $this->Users->find()->where(['reset_key' => $data['reset_key']])->first();
            // no user is available with this code
            if (!($user->toArray()))
            {
                $this->Flash->error('Oops! Are you sure about the code?');
                return $this->redirect(['controller' => 'users','action' => 'forgotPassword']);
            } else {
                // code verified, let user change password
                $session = $this->request->session();
                $session->write('User.tmp', $user->id);
                return $this->redirect(['controller' => 'users','action' => 'resetPassword']);
            }
        }
    }




    /**
     * GET: displays password entry form
     * POST: check password and save to db
     * @author Touhidur Rahman
     */
    public function resetPassword()  {
        if($this->request->is('post')) {
            $session = $this->request->session();
            $id = $session->read('User.tmp');
            $data = $this->request->data();

            $user = $this->Users->get($id);
            // no user is available
            if (!($user->toArray())) {
                $this->Flash->error('What a Terrible Failure! Please try again.');
            } else {
                // change password
                // TODO:






                $this->Flash->success('Password changed! You can login now.');
                return $this->redirect(['controller' => 'users','action' => 'resetPassword']);
            }
        }
    }




}
