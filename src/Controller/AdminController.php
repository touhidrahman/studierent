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

        /**
        * @author Aleksandr Anfilov
        * Display results of search by user id or name:
        */
        if($this->request->is('post'))
        {
            $qs = [];                   // access query strings and store in array
            $validInputs = ['id', 'email', 'name'];
            foreach ($validInputs as $key) {
            // put into qs array only if input key is not null
                if ($this->request->data($key)) {
                    $qs[$key] = $this->request->data($key);
                }
            }

            $searchQuery = $connection->newQuery();
            // 1. Prepare the statement
            $searchQuery->select('id, last_name, first_name, username, status,
                CASE status
                WHEN 0 THEN \'Blocked\'
                WHEN 1 THEN \'Normal\'
                WHEN 9 THEN \'Admin\'
                ELSE \'Unknown\'    end AS `type`')
            ->from('users');

            // 2. Add WHERE conditions
            if ( isset($qs['id']) ) {
                $searchQuery->where(
                [   'id'           => $qs['id']            ] );
            }

            if ( isset($qs['email'])        ) {
                $searchQuery->where(
                [   'username'     => $qs['email']         ] );
            }

            if ( isset($qs['name'])   ) {
				$searchQuery->where(function($exp){
					return $exp->or_([
						'first_name LIKE' => '%'.$this->request->data('name').'%',
						'last_name LIKE' => '%'.$this->request->data('name').'%',
					]);
                });
            }

            $usersFound = $searchQuery->execute();

            if (!empty($usersFound)){   //send results to  view only if they exist
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
		if($type == 'normal') //show normal users
 		{

			$query =  $users->find('all', [
    'conditions' => ['Users.status'=>1]
			]);
		}

		else if($type == 'blocked') 
 		{
$query =  $users->find('all', [
    'conditions' => ['Users.status'=>0]
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

      /**
       * @author Touhidur Rahman
       */
       $reportsTbl = TableRegistry::get('Reports');
       $reportsCount = $reportsTbl->find('all')->count();
       $this->set(compact('reportsCount'));
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


	/**
	 * Reports index method
	 * @author Touhidur Rahman
	 * @return \Cake\Network\Response|null
	 */
	public function reports()
	{
		$this->loadModel('Reports');
      $results = $this->Reports->find('all')->contain(['Users', 'Properties']);

		$reports = $this->paginate($results);

		$this->set(compact('reports'));
		$this->set('_serialize', ['reports']);
	}

	/**
	 * View report, Only admin can view
	 *
	 * @param string|null $id Report id.
	 * @return \Cake\Network\Response|null
	 * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
	 * @author Alexandr Anfilov
	 */
	public function viewReport($id = null)
	{
		$this->loadModel('Reports');
		if ($this->Auth->user('status') != 9) {
			return $this->$this->redirect(['controller' => 'properties', 'action' => 'search']);
		}
		$report = $this->Reports->get($id, [
			'contain' => ['Users', 'Properties']
		]);
		$this->set('report', $report);
		$this->set('_serialize', ['report']);
	}


}
?>
