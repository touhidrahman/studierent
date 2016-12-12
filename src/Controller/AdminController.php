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

public function index()
{
}

public function users(string $type){

	
		
		$users = TableRegistry::get('Users');
		
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
	
	public function beforeFilter(\Cake\Event\Event $event)
	{
		parent::beforeFilter($event);
		$session = $this->request->session();
		echo $session->read('User.admin');
		echo "TEEEEEEEEEEEEEEEEEEEEEEEE";
         if($session->read('User.admin') != '1')
					return $this->redirect(
        array('controller' => 'users', 'action' => 'dashboard')
    );
    }

}

?>