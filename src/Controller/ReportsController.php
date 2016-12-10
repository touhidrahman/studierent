<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;

/**
 * Reports Controller
 *
 * @property \App\Model\Table\ReportsTable $Reports
 */
class ReportsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $reports = $this->paginate($this->Reports);

        $this->set(compact('reports'));
        $this->set('_serialize', ['reports']);
    }

    /**
     * View method, Only admin can view
     *
     * @param string|null $id Report id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     * @author Touhidur Rahman
     */
    public function view($id = null)
    {
        if ($this->Auth->user('status') == 9) {
            $report = $this->Reports->get($id, [
                'contain' => []
            ]);
        }

        $this->set('report', $report);
        $this->set('_serialize', ['report']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     * @author Ramanpreet Kaur, Touhidur Rahman
     */
    public function add($id = null)
    {
        $report = $this->Reports->newEntity();

        if ($this->request->is('post')) {
            $report = $this->Reports->patchEntity($report, $this->request->data);
            // get reporter user's id from session
            $report->user_id = $this->Auth->user('id');
            // get property id from URL
            $report->property_id = $id;
            if ($this->Reports->save($report)) {
                $this->Flash->success(__('The report has been sent.'));

                return $this->redirect(['controller' => 'users', 'action' => 'dashboard']);
            } else {
                $this->Flash->error(__('The report could not be sent. Please, try again.'));
            }
        }
        $property = TableRegistry::get('Properties')->get($id);
        $this->set(compact('report', 'property'));
        $this->set('_serialize', ['report', 'property']);
    }


    /**
     * Delete method
     * Only admin can delete a report
     * @param string|null $id Report id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     * @author Touhidur Rahman
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        if ($this->Auth->user('status') == 9) {
            $report = $this->Reports->get($id);
            if ($this->Reports->delete($report)) {
                $this->Flash->success(__('The report has been deleted.'));
            } else {
                $this->Flash->error(__('The report could not be deleted. Please, try again.'));
            }
        } else {
            $this->Flash->error(__('You are not authorized to delete.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
