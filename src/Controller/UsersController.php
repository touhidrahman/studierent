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
    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
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
     */
    public function view($id = null)
    {

    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $user = $this->Users->newEntity();
        if ($this->request->is('post')) {
            $user = $this->Users->patchEntity($user, $this->request->data);
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The user could not be saved. Please, try again.'));
            }
        }
        $cities = $this->Users->Cities->find('list', ['limit' => 200]);
        $properties = $this->Users->Properties->find('list', ['limit' => 200]);
        $this->set(compact('user', 'cities', 'properties'));
        $this->set('_serialize', ['user']);
    }

    /**
     * Edit method
     *
     * @param string|null $id User id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => ['Properties']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->Users->patchEntity($user, $this->request->data);
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The user could not be saved. Please, try again.'));
            }
        }
        $cities = $this->Users->Cities->find('list', ['limit' => 200]);
        $properties = $this->Users->Properties->find('list', ['limit' => 200]);
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

        return $this->redirect(['action' => 'index']);
    }


	public function login()
	{


		if($this->request->is('post'))
		{
			$user = $this->Auth->identify();
                        echo print_r($user);
                        if($user['status']==9)
                        {
                            $this->redirect(['controller' => 'users','action' => 'admin']);
                        } 
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
						'password' => $this->request->data('password')
					]);
				}

				$this->redirect(['controller' => 'properties','action' => 'search']);

			}else{
                         $this->Flash->error('Username or password is incorrect');    
                        }

			

		}
	}

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

	public function initialize()
	{
		parent::initialize();
                $session = $this->request->session();
		$this->Auth->allow(['logout']);
		$this->Auth->allow(['logout', 'register',]);
		$this->Auth->allow(['forgotpassword']);
		$this->Auth->allow(['logout', 'activation']); // Aleksandr: just added 'activation' to make it viewable without login
		$this->Auth->allow(['register']);

	}

	public function logout()
	{
		$this->Flash->success('You are now logged out.');
		return $this->redirect($this->Auth->logout());
	}


    public function dashboard(){}
        /* 
        @author Ramanpreet Kaur
         *          */
    public function admin(){
        // In a controller or table method.
        //select type, count(*) from properties group by type
          
           $connection = ConnectionManager::get('default');
            $results = $connection->execute('select count(id) as counts , type from properties group by type')->fetchAll('assoc');
            $this->set('results',$results);
            $users = $connection->execute('select count(id) as counts , status from users group by status')->fetchAll('assoc');
            //$users = $connection->execute('select count(id) as counts , status,roles from users left join roles on users.status=roles.id group by status')->fetchAll('assoc');
            $this->set('users',$users);
            
    }
    


   
    public function forgotPassword($username = null)
    {
        if($this->request->is('post'))
        {
            $data= $this->request->data();
                  
            $user = $this->Users->findByUsername($data['username']);
            //echo print_r($user);
            if (!($user->toArray()))
            {
                $this->Flash->error('User not found');
                $this->redirect(['controller' => 'users','action' => 'forgotpassword']);
            } 
            else {                          
                $generated_password=substr(md5(rand(999,999999)) , 0 , 8);
                mysqli_query("UPDATE 'users' SET 'password' = '$generated_password' WHERE 'username' = '$username'");
                die($generated_password);
                 }
        }
        
    }
 
}

