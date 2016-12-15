<?php
namespace App\Controller;
use Cake\ORM\TableRegistry;
use App\Model\Entity\Device;
use App\Controller\AppController;
use Cake\Error\Debugger;
use Cake\ORM\Entity;
use Cake\ORM\Query;
use Cake\Validation\Validator;
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

		$this->Auth->allow(['logout', 'register', 'forgotPassword', 'activation', 'resetPassword']);
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
        // only admin can view blocked user
        $user = $this->Users->get($id);
        if ($user->status == 0){
            if ($this->Auth->user('status') != 9) {
                $this->Flash->error('The user does not exist');
                return $this->redirect(['action' => 'dashboard']);
            }
        }
    
        // get properties posted by this user
        $propertiesTbl = TableRegistry::get('Properties');
        $query = $propertiesTbl->find()->where(['user_id' => $id]);
        // get feedbacks belong to this user
        $feedbacksTbl = TableRegistry::get('Feedbacks');
        $otherFeedbacks = $feedbacksTbl->find()->where(['for_user_id' => $id])->contain(['Users']);
        //for not rating more than once Norman Lista
        $thisFeedback = $feedbacksTbl->find()->where(['user_id' => $this->Auth->user('id'),'for_user_id' => $id]);
        // get avg rating of user
        $avgRating = TableRegistry::get('AvgRatings')->find()->where(['user_id' => $id])->first();
        // join zips.number field
        $query->contain(['Zips' => function($q){
            return $q->select('number', 'city', 'province');
        }]);
        // join images table for property images
        $query->contain(['Images']);
        // get total property count
        $propertyCount = $query->count();
        $properties = $query->toList();

        //@author Norman Lista
        //send LogUser For verification of rating himself
        $logUser=$this->Auth->user('id');
        //for feedback
        $this->loadModel('Feedbacks');
        $feedback=$this->Feedbacks->newEntity();
        if($this->request->is('post')){
         if($thisFeedback->count()==0){
            $feedback= $this->Feedbacks->patchEntity($feedback,$this->request->data);
         if($this->Feedbacks->save($feedback)){
             $this->Flash->success(__('Feedback added'));
         }else{
             $this->Flash->error(__('Unable to add feedback'));
         }
        }else{
            $this->Flash->error(__('You already rated this landlord'));

        }}
        $this->set('feedback',$feedback);
        $this->set(compact('user', 'properties', 'propertyCount', 'logUser', 'otherFeedbacks', 'avgRating'));
        $this->set('_serialize', ['user', 'properties', 'propertyCount']);
    }



    /**
     * Add method - upload user profile image
     * @author Mythri Manjunath
     * @param integer $id user_id.
     */
    public function add()
    {
        //check for logged in user authentication
        $id = $this->Auth->user('id');
        $user = '';
        //check if the request is post
        if ($this->request->is('post')) {
            $user = $this->Users->get($id);
                //check if upload file is not empty
                 if(!empty($this->request->data['photo']['name'])){
                    $fileName = $this->request->data['photo']['name'];
                    $extention = pathinfo($fileName,PATHINFO_EXTENSION);
                    $arr_ext = array('jpg', 'jpeg', 'gif','png');
                    //check for uploded file extension
                    if(in_array($extention, $arr_ext)){
                    $newfileName=$id.'.'.$extention;
                    $destDir = WWW_ROOT .'img'. DS .'users'. DS . $newfileName;
                    //move uploded file to destination
                    if(move_uploaded_file($this->request->data['photo']['tmp_name'],$destDir)){
                    $user->photo = $newfileName;
                    //save the uploded image in user table
                    if ($this->Users->save($user)) {
                    $this->Flash->success(__('Your profile photo has been uploaded successfully.'));
                    return $this->redirect([
                            'controller' => 'Users',
                            'action' => 'view', $id
                             ]);
                    } else{
                        $this->Flash->error(__('Unable to upload image, please try again.'));
                    }
                    }else{
                    $this->Flash->error(__('Unable to upload image, please try again.'));
                    }
                    }else{
                    $this->Flash->error(__('Please choose a image to upload.'));
                }
            }
        }
        $this->set(compact('user'));
        $this->set('_serialize', ['user']);
        $this->set('id', $id);
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
		$validator = new Validator();
		
		
		$user = $this->Users->newEntity();
		if($this->request->is('post'))
		{

$validator
    ->requirePresence('password')
    ->add('password', 'length', [
        'rule' => ['minLength', 6],
        'message' => 'Password must be atleast 6 characters long'
    ]);

	$errors = $validator->errors($this->request->data());
     
     
	 
     $already_exists = $this->Users->find()->where(['username' => $this->request->data['username']])->count();

	 
	 if($already_exists > 0)
	 {
		     $this->Flash->error('Email already registered');
	 }
 else 	if($errors)
	{
		if($errors['password']['length'] !=null)
             $this->Flash->error('Minimum 6 characters password required');
	}
	else
	{
			$user = $this->Users->patchEntity($user, $this->request->data);
			$user->status = 1;
			if($this->Users->save($user))
			{
				$this->Flash->success('Thank you for registration, you can log in now');
				return $this->redirect(['action' => 'login']);

			}
			else
				$this->Flash->error('Registration not successful');

	}
	
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
     * Forgot password | generate code if post method, display form otherwise
     * @author Ramanpreet Kaur, Touhidur Rahman
     */
    public function forgotPassword()
    {
        if($this->request->is('post'))
        {
            $data= $this->request->data();

            $user = $this->Users->find()->where(['username' => $data['username']])->first();
            // user is available with this email
            if ($user->id)
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
            else
            {
				$this->Flash->error('We did not find any user with that email address!');
				return $this->redirect(['controller' => 'users','action' => 'forgotPassword']);
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
            if ($user->id)
            {
                // code verified, let user change password
                $session = $this->request->session();
                $session->write('User.tmp', $user->id);
                return $this->redirect(['action' => 'resetPassword']);
            } else {die("exit");
                $this->Flash->error('Oops! Are you sure about the code?');
                return $this->redirect(['action' => 'forgotPassword']);
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
            $id = $session->consume('User.tmp');
            $data = $this->request->data();

            $user = $this->Users->get($id);
            // no user is available
            if ($user->toArray()) {
                // change password
                if ($data['password'] == $data['confirmPassword']) {
                    $user->password = $data['password'];    // set password
                    $user->status = 1;                      // set status = 1
                    if ($this->Users->save($user)){
                        $this->Flash->success('Password changed! You can login now.');
                    }
                }
                return $this->redirect(['action' => 'login']);
            } else {
                $this->Flash->error('Session time out! Please try again from the begining.');
                return $this->redirect(['action' => 'forgotPassword']);
            }
        }
    }




}
