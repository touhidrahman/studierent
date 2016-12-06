<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Images Controller
 *
 * @property \App\Model\Table\ImagesTable $Images
 */
class ImagesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Properties']
        ];
        $images = $this->paginate($this->Images);

        $this->set(compact('images'));
        $this->set('_serialize', ['images']);
    }

    /**
     * View method
     *@author Mythri Manjunath
     * @param string|null $id Image id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $this->set('images', $this->Images->find('all'));
         $image = $this->Images->get($id);
         $this->set(compact('image'));
    }

    /**
     * Add method - To add property images 
     * @author Mythri Manjunath
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
       $image = '';
        if ($this->request->is('post')) {
            if(!empty($this->request->data['upload']['name'])){
                $fileName = $this->request->data['upload']['name'];
                $uploadPath ='WWW_ROOT\img\properties\\';
                if(move_uploaded_file($this->request->data['upload']['tmp_name'],WWW_ROOT . 'img' . DS . 'properties' . DS .$fileName)){
                    $image = $this->Images->newEntity();  
                    $image->path = $uploadPath.$fileName;
                    $image->created = date("Y-m-d H:i:s");
                    $image->modified = date("Y-m-d H:i:s");
                    if ($this->Images->save($image)) {
                        $this->Flash->success(__('Image has been uploaded and inserted successfully.'));
                        
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
        $this->set('image', $image); 
       $properties = $this->Images->Properties->find('list', ['limit' => 200]);
        $this->set(compact('image', 'properties'));
        $this->set('_serialize', ['image']);
        
    }

    /**
     * Edit method
     *
     * @param string|null $id Image id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $image = $this->Images->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $image = $this->Images->patchEntity($image, $this->request->data);
            if ($this->Images->save($image)) {
                $this->Flash->success(__('The image has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The image could not be saved. Please, try again.'));
            }
        }
        $properties = $this->Images->Properties->find('list', ['limit' => 200]);
        $this->set(compact('image', 'properties'));
        $this->set('_serialize', ['image']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Image id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $image = $this->Images->get($id);
        if ($this->Images->delete($image)) {
            $this->Flash->success(__('The image has been deleted.'));
        } else {
            $this->Flash->error(__('The image could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
