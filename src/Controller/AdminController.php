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

class AdminController extends AppController
{

	/**
	* Display results of search by user id or name:
	* @author Aleksandr Anfilov, Ramanpreet Kaur
	*/
	public function index()
	{

        $connection = ConnectionManager::get('default');
        $reports = $connection->execute('select count(id) as counts , user_id from reports group by user_id')->fetchAll('assoc');

        $this->set('reports',$reports);

        if($this->request->is('post'))
        {
            $form = $this->request->data();
            $searchBy = key($form);             // key: input name is 'id' or 'username'
            $searchParam = $form[$searchBy];    // get input value from array by key

            $searchQuery = TableRegistry::get('Users')
                ->find()                // 1. Prepare a SELECT query:
                ->select( ['id', 'last_name', 'first_name', 'username', 'status'] );

            switch ($searchBy) {        // 2. Add a WHERE condition
	            case 'id':
	                $searchQuery->where(['id' => $searchParam]);
		            break;

	            case 'username':        //  find by username (which is an e-mail address)
	                $searchQuery->where(['username' => $searchParam]);
		            break;
            }

            $usersFound = $searchQuery->toArray();// 3. Execute the query

            if (!empty($usersFound)){   //send results to  view only of they exist
                $this->set('usersFound', $usersFound);
            }
            else{
                $this->Flash->error(__('No users have been found with the ' . $searchBy . ' ' . $searchParam . '.'));
            }
        }
	}


	
  /**
     * @author Muneeb Noor
     */
public function users(string $type){



		$users = TableRegistry::get('Users');
		$this->set('type',$type);
		if($type == 'normal') //show admins
 		{

			$query =  $users->find('all', [
    'conditions' => ['Users.status'=>1]
			]);
		}

		else
		{
			$query =  $users->find('all', [
    'conditions' => ['Users.status'=>9]
			]);
		}
		$users = $this->paginate($query);


        $this->set(compact('users'));
        $this->set('_serialize', ['users']);


		}

  /**
     * @author Muneeb Noor
     */
	    public function properties(string $type){


			$properties = TableRegistry::get('Properties');

			if($type == 'flat')

			{$query = $properties->find('all', [
			'conditions' => ['Properties.type'=>'Flat']
			]);
			}

			else if ($type == 'flatshare')
			{
			$query = $properties->find('all', [
			'conditions' => ['Properties.type'=>'Flatshare']
			]);

			}

			else if ($type == 'house')
			{
			$query = $properties->find('all', [
			'conditions' => ['Properties.type'=>'House']
			]);

			}
			else if ($type == 'student_residence')
			{
			$query = $properties->find('all', [
			'conditions' => ['Properties.type'=>'Student Residence']
			]);

			}
			else  if ($type == 'recent')

			{

			$query = $properties->find('all');


		$query = $properties->find('all', [
			'conditions' => ['Properties.created >=' => new \DateTime('-3 day')]
			]);


			}
			else

			{
				return $this->redirect(
        array('controller' => 'admin', 'action' => 'index')
    );
			}
			$properties = $this->paginate($query);


        $this->set(compact('properties'));
        $this->set('_serialize', ['properties']);


		}


	public function initialize()
	{
		parent::initialize();

        $this->viewBuilder()->layout('adminlayout');

        $connection = ConnectionManager::get('default');
        $results = $connection->execute('select count(id) as counts , type from properties group by type')->fetchAll('assoc');

        $this->set('results',$results);
        $userslist = $connection->execute('select count(id) as counts , status from users group by status')->fetchAll('assoc');
        $this->set('userslist',$userslist);

		//Coded by Muneeb
		$properties = TableRegistry::get('Properties');
		$newProperties = $properties->find('all', [
			'conditions' => ['Properties.created >=' => new \DateTime('-3 day')]
			]);

		$recentPropertiesCount = $newProperties->count();
		$this->set('recentPropertiesCount',$recentPropertiesCount);

	}

	  /**
     * @author Muneeb Noor
     */
	public function beforeFilter(\Cake\Event\Event $event)
	{
		parent::beforeFilter($event);
		$session = $this->request->session();

         if($session->read('User.admin') != '1')
					return $this->redirect(
        array('controller' => 'users', 'action' => 'dashboard')
    );

    }


/**
* Block or unblock the landlord.
* @author Aleksandr Anfilov
* @param id
* Created:  11.12.2016
*/
public function changeUserStatus($id = null, $newStatus = 0) {
    $this->request->allowMethod(['post', 'changeUserStatus']);

    if ($id > 0) {
        $conn = ConnectionManager::get('default');

        $conn->transactional(function ($conn) use ($id, $newStatus){
        $conn->execute('UPDATE properties SET status = ? WHERE user_id = ?', [$newStatus, $id]);
        $conn->execute('UPDATE users SET status = ? WHERE id = ?', [$newStatus, $id]);
        });

        $this->Flash->success(__('The user status has been changed.'));
    }   else {
            $this->Flash->error(__('The user status has not been changed.'));}
    return $this->redirect(['action' => 'index']);
}


}?>
