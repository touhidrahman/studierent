<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;
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
    public function index($id=null)
    { 
      
        $propertyTbl = TableRegistry::get('Properties');
        $exists = $propertyTbl->exists(['id'=> $id,'user_id'=> $this->Auth->user('id')]);
        if($exists)
        {
        //$images = $this->Images->find()->select('id')->where(['property_id' => $id]);
        
    //}
        $this->paginate = [
            'contain' => ['Properties']
        ];
        $images = $this->paginate($this->Images->find()->where(['property_id' => $id]));

        $this->set('images', $images);
        $this->set('_serialize', ['images']);
    }
    }

    /**
     * View method
     *
     * @param string|null $id Image id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        /*$propertyTbl = TableRegistry::get('Properties');
        $exists = $propertyTbl->exists(['id'=> $id,'user_id'=> $this->Auth->user('id')]);
        if($exists)
        {
            $images = $this->Images->find(all)->select('id')->where(['property_id' => $id]);
        $this->set('image', $images);
        $this->set('_serialize', ['image']);*/
        $image = $this->Images->get($id);
        $this->set('image', $image);
        $this->set('_serialize', ['image']);
    }
    

    /**
     * Add method - This method adds properties images
     * @author Mythri Manjunath
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add($id=null)
    {
        $propertyTbl = TableRegistry::get('Properties');
        $exists = $propertyTbl->exists(['id'=> $id,'user_id'=> $this->Auth->user('id')]);
        if (!$exists) {
            $this->Flash->error(__('You cannot upload images to a property which does not belog to you!'));
            return $this->redirect(['controller'=>'properties', 'action'=>'myproperties']);
        }
        $image='';
        if ($this->request->is('post')) {
            if(!empty($this->request->data['upload']['name'])){
                $fileName = $this->request->data['upload']['name'];
                $destDir = WWW_ROOT .'img'. DS .'properties'. DS . $id . '-' . $fileName;
                if(move_uploaded_file($this->request->data['upload']['tmp_name'], $destDir)){
                    $image = $this->Images->newEntity();
                    $image->property_id=$id;
                    $image->path = $fileName;
                    $image->created = date("Y-m-d H:i:s");
                    $image->modified = date("Y-m-d H:i:s");
                    if ($this->Images->save($image)) {
                        $this->Flash->success(__('Image has been uploaded and inserted successfully.'));
                        return $this->redirect([
                            'controller' => 'Images',
                            'action' => 'add',$id
                        ]);
                    }else{
                        $this->Flash->error(__('Unable to save image, please try again.'));
                    }
                }else{
                    $this->Flash->error(__('Unable to upload image to target location, please try again.'));
                }
            }
        }

        // $properties = $this->Images->Properties->find('list', ['limit' => 200]);
        $this->set(compact('image'));
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

        return $this->redirect(['action' => 'index',$image->property_id]);
    }
}
