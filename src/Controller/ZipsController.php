<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Zips Controller
 *
 * @property \App\Model\Table\ZipsTable $Zips
 */
class ZipsController extends AppController
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
        $zips = $this->paginate($this->Zips);

        $this->set(compact('zips'));
        $this->set('_serialize', ['zips']);
    }

    /**
     * View method
     *
     * @param string|null $id Zip id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $zip = $this->Zips->get($id, [
            'contain' => ['Cities', 'Properties']
        ]);

        $this->set('zip', $zip);
        $this->set('_serialize', ['zip']);
    }

    /**
     * Get Zip_id method
     *
     * @param string|null $id Zip id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
   /* public function getZipIdFromCode($code = null)
    {
        $zip = $this->Zips->get($id, [
            'contain' => ['Cities', 'Properties']
        ]);

        $this->set('zip', $zip);
        $this->set('_serialize', ['zip']);
    }*/

    /**
     * Add method. Displays a field to add zipcode. After successful insert redirects to add property page
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     * @author Touhidur Rahman
     */
    public function add()
    {
        $zip = $this->Zips->newEntity();
        if ($this->request->is('post')) {
            $zip = $this->Zips->patchEntity($zip, $this->request->data);
            if ($this->Zips->save($zip)) {
                $this->Flash->success(__('The zip has been saved.'));

                // send the zip id to properties/add method
                return $this->redirect(['controller' => 'properties', 'action' => 'add', $zip->id]);
            } else {
                $this->Flash->error(__('The zip could not be saved. Please, try again.'));
            }
        }
        // Set the layout.
        $this->viewBuilder()->layout('userdash');
        // $cities = $this->Zips->Cities->find('list', ['limit' => 200]);
        $this->set(compact('zip'));
        $this->set('_serialize', ['zip']);
    }

    /**
     * Select a Zipcode before posting a property ad
     *
     * @return \Cake\Network\Response|void Redirects on successful select, renders view otherwise.
     * @author Touhidur Rahman
     */
    public function select()
    {
        if ($this->request->is('post')) {
            $zip = $this->Zips->find()->where(['number' => $this->request->data('Zip.number')])->first();
            if ($zip) {
                $this->Flash->success(__('The zip code has been verified. Enter your property details.'));
                // send the zip id to properties/add method
                return $this->redirect(['controller' => 'properties', 'action' => 'add', $zip->id]);
            } else {
                $this->Flash->error(__('The zipcode could not be found. Please, enter details of this Zipcode.'));
                // send to zips/add for adding a new zipcode
                return $this->redirect(['controller' => 'zips', 'action' => 'add']);
            }
        }
        // Set the layout.
        $this->viewBuilder()->layout('userdash');
    }

    /**
     * Edit method
     *
     * @param string|null $id Zip id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $zip = $this->Zips->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $zip = $this->Zips->patchEntity($zip, $this->request->data);
            if ($this->Zips->save($zip)) {
                $this->Flash->success(__('The zip has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The zip could not be saved. Please, try again.'));
            }
        }
        $cities = $this->Zips->Cities->find('list', ['limit' => 200]);
        $this->set(compact('zip', 'cities'));
        $this->set('_serialize', ['zip']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Zip id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $zip = $this->Zips->get($id);
        if ($this->Zips->delete($zip)) {
            $this->Flash->success(__('The zip has been deleted.'));
        } else {
            $this->Flash->error(__('The zip could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
