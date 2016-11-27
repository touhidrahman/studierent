<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Properties Controller
 *
 * @property \App\Model\Table\PropertiesTable $Properties
 */
class PropertiesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Zips']
        ];
        $properties = $this->paginate($this->Properties);

        $this->set(compact('properties'));
        $this->set('_serialize', ['properties']);
    }

    /**
     * View method
     *
     * @param string|null $id Property id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $property = $this->Properties->get($id, [
            'contain' => ['Zips', 'Users', 'FavoriteProperties', 'Images']
        ]);

        $this->set('property', $property);
        $this->set('_serialize', ['property']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $property = $this->Properties->newEntity();
        if ($this->request->is('post')) {
            $property = $this->Properties->patchEntity($property, $this->request->data);
            if ($this->Properties->save($property)) {
                $this->Flash->success(__('The property has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The property could not be saved. Please, try again.'));
            }
        }
        $zips = $this->Properties->Zips->find('list', ['limit' => 200]);
        $users = $this->Properties->Users->find('list', ['limit' => 200]);
        $this->set(compact('property', 'zips', 'users'));
        $this->set('_serialize', ['property']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Property id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $property = $this->Properties->get($id, [
            'contain' => ['Users']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $property = $this->Properties->patchEntity($property, $this->request->data);
            if ($this->Properties->save($property)) {
                $this->Flash->success(__('The property has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The property could not be saved. Please, try again.'));
            }
        }
        $zips = $this->Properties->Zips->find('list', ['limit' => 200]);
        $users = $this->Properties->Users->find('list', ['limit' => 200]);
        $this->set(compact('property', 'zips', 'users'));
        $this->set('_serialize', ['property']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Property id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $property = $this->Properties->get($id);
        if ($this->Properties->delete($property)) {
            $this->Flash->success(__('The property has been deleted.'));
        } else {
            $this->Flash->error(__('The property could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    /**
     * Search method
     *
     */
    public function search($param = NULL) {
        
    }
}
