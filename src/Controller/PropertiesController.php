<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;
use Cake\I18n\Date;

/**
 * Properties Controller
 *
 * @property \App\Model\Table\PropertiesTable $Properties
 */
class PropertiesController extends AppController
{

    public $paginate = [
        'limit' => 10,
        // 'order' => ['Properties.created' => 'desc']
    ];

    public function initialize() {
        parent::initialize();
        $this->loadComponent('Paginator');
		$this->Auth->allow(['search']);

    }

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     * @author Touhidur Rahman
     */
    public function index()
    {
        // $this->paginate = [
        //     'contain' => ['Zips']
        // ];
        // $properties = $this->paginate($this->Properties);
        //
        // $this->set(compact('properties'));
        // $this->set('_serialize', ['properties']);
        $this->search();
    }

    /**
     * View method
     *
     * @param string|null $id Property id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     * @author Touhidur Rahman
     */
    public function view($id = null)
    {
        //@author Norman Lista
        //feedback code
        $this->loadModel('Feedbacks');
        // , 'FavoriteProperties', 'Images'
        $property = $this->Properties->get($id, [
            'contain' => ['Zips','Users']
        ]);


       $feedbackSearch=$this->Feedbacks->find('all',[
    'conditions' => ['for_user_id =' => $property->user->id]]);

       if($feedbackSearch->isEmpty()){
           $feedback->rate=0;
       }else{$feedback =$feedbackSearch->first();}
        $this->set('property', $property);
        $this->set('_serialize', ['property']);
        $this->set('feedback', $feedback);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     * @author Touhidur Rahman
     */
    public function add()
    {
        $property = $this->Properties->newEntity();
        if ($this->request->is('post')) {
            $property = $this->Properties->patchEntity($property, $this->request->data);
            if ($this->Properties->save($property)) {
                $this->Flash->success(__('The property has been saved.'));

                return $this->redirect(['action' => 'myproperties']);
            } else {
                $this->Flash->error(__('The property could not be saved. Please, try again.'));
            }
        }
        $zips = $this->Properties->Zips->find('list', ['limit' => 200]);
        $users = $this->Properties->Users->find('list', ['limit' => 200]);
        //@author Norman Lista
        //send user id for my profile button
        $id=$this->Auth->user('id');
        $this->set(compact('property', 'zips', 'users','id'));
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
     * URL: http://localhost/studierent/properties/search?address=&type=Student+Residence&min=&max=&score=0&dist=100&directBus=1&avalFrom=20161123&avalTo=20161130&rSize=10&fSize=20&eBillIncl=1&internet=1&cableTv=1&wMachine=1&fireAlarm=1&heating=1&parking=1&bikeParking=1&garden=1&balcony=1&smoking=1&pets=1&rating=5&rating=4&sortby=rentUp
     * @author Touhidur Rahman
     */
    public function search() {
        // access query strings and store in array
        $qs = [];
        $possibleQeries = [
            'address', 'type', 'min', 'max', 'score', 'dist', 'directBus',
            'avalFrom', 'avalTo', 'rSize', 'fSize', 'eBillIncl',
            'internet', 'wMachine', 'fireAlarm', 'heating', 'parking',
            'bikeParking', 'garden', 'balcony', 'smoking', 'pets', 'sortby', 'rating'
        ];
        foreach ($possibleQeries as $key) {
            // if qs is not null only then put inside array
            if ($this->request->query($key)) {
                $qs[$key] = $this->request->query($key);
            }
        }
        // get the query object
        $query = $this->Properties->find();
        // search only in ads that are active [status = 1]
        $query->where(['status' => '1']);
        // if type is supplied, use that
        if ($qs['type']) $query->where(['type' => $qs['type']]);
        if ($qs['address']) {
            $query->where(function($exp){
                // find out zip_id from zips table from the supplied query
                // and use that to lookup in properties table
                $zips = TableRegistry::get('zips')->find()->where(['number' => $this->request->query('address')])->first();
                return $exp->or_([
                    'zip_id' => $zips->id,
                    'address LIKE' => '%'.$this->request->query('address').'%'
                ]);
            });
        }
        // if max rent is given, use also min. (make min 0 if not supplied)
        if ($qs['max']) {
            $query->where(function($exp){
                return $exp
                    ->gte('rent', $this->request->query('min') ? $this->request->query('min') : 0)
                    ->lte('rent', $this->request->query('max'));
            });
        }
        if ($qs['dist'])        $query->where(['dist_from_uni' => $qs['dist']]);
        if ($qs['directBus'])   $query->where(['direct_bus_to_uni' => $qs['directBus']]);
        if ($qs['eBillIncl'])   $query->where(['electricity_bill_included' => $qs['eBillIncl']]);
        if ($qs['internet'])    $query->where(['internet' => $qs['internet']]);
        if ($qs['wMachine'])    $query->where(['washing_machine' => $qs['wMachine']]);
        if ($qs['fireAlarm'])   $query->where(['fire_alarm' => $qs['fireAlarm']]);
        if ($qs['heating'])     $query->where(['heating' => $qs['heating']]);
        if ($qs['parking'])     $query->where(['parking' => $qs['parking']]);
        if ($qs['bikeParking']) $query->where(['bike_parking' => $qs['bikeParking']]);
        if ($qs['garden'])      $query->where(['garden' => $qs['garden']]);
        if ($qs['balcony'])     $query->where(['balcony' => $qs['balcony']]);
        if ($qs['smoking'])     $query->where(['smoking' => $qs['smoking']]);
        if ($qs['pets'])        $query->where(['pets' => $qs['pets']]);
        // search properties in between +5 / -5 room size than the supplied
        if ($qs['rSize']) {
            $query->where(function($exp){
                return $exp->between('room_size', $this->request->query('rSize')-5, $this->request->query('rSize')+5);
            });
        }
        // search properties in between +10 / -10 total size than the supplied
        if ($qs['fSize']) {
            $query->where(function($exp){
                return $exp->between('total_size', $this->request->query('fSize')-10, $this->request->query('fSize')+10);
            });
        }
        // get all properties below availability lower bound
        if ($qs['avalFrom']) {
            $query->where(function($exp){
                return $exp->lte('available_from', new Date($this->request->query('avalFrom')));
            });
        }
        // and above the upper bound
        if ($qs['avalTo']) {
            $query->where(function($exp){
                return $exp->gte('available_until', new Date($this->request->query('avalTo')));
            });
        }
        // prepare sort by
        switch ($qs['sortby']) {
            case 'rentUp':
                $query->order(['rent' => 'DESC']);
                break;
            case 'rentDown':
                $query->order(['rent' => 'ASC']);
                break;
            case 'zipStreet':
                $query->order(['address' => 'ASC', 'zip_id' => 'ASC']);
                break;
            case 'available_to_dt':
                $query->order(['available_to' => 'ASC']);
                break;
            case 'available_from_dt':
                $query->order(['available_from' => 'ASC']);
                break;
            default:
                $query->order(['created' => 'DESC']);
                break;
        }
        // join zips.number field
        $query->contain(['Zips' => function($q){
            return $q->select('number', 'city', 'province');
        }]);
        // convert the result set to array
        $properties = $this->paginate($query);
        // count of total retrieved rows
        $count = $query->count();
        // send to view
        $this->set(compact('properties', 'count', 'qs'));
        $this->set('_serialize', ['properties']);
    }

    /**
     * Displays User's favorited ads
     * @author Touhidur Rahman
     */
    public function favorites()
    {
        $query = $this->Properties->find();
        $query->where(function($exp){
            $ids = [];
            $favoritesTbl = TableRegistry::get('FavoriteProperties');
            $favAds = $favoritesTbl->find()->select('property_id')->where(['user_id' => $this->Auth->user('id')]);
            foreach ($favAds as $ad) {
                $ids[] = $ad->property_id;
            }
            return $exp->in('Properties.id', $ids);
        });

        // join zips.number field
        $query->contain(['Zips' => function($q){
            return $q->select('number', 'city', 'province');
        }]);

        $properties = $this->paginate($query);
         //@author Norman Lista
        //send user id for my profile button
        $id= $this->Auth->user('id');
        $this->set(compact('properties','id'));
        $this->set('_serialize', ['properties']);
    }

    /**
     * Displays list of properties a user has posted
     * @author Touhidur Rahman, Norman Lista
     */
    public function myproperties()
    {
        $query = $this->Properties->find()->where(['user_id' => $this->Auth->user('id')]);
        // join zips.number field
        $query->contain(['Zips' => function($q){
            return $q->select('number', 'city', 'province');
        }]);
        $properties = $this->paginate($query);
        //send user id for my profile button
        $id=$this->Auth->user('id');
        $this->set(compact('properties','id'));
        $this->set('_serialize', ['properties']);
    }

    /**
     * Marks a property as favorite for user
     * URL Pattern: http://localhost/studierent/properties/toggleFavorites.json?id=53
     * @uses Cake\ORM\Entity\FavoriteProperties
     * @author Touhidur Rahman
     */
    public function toggleFavorites()
    {
        $property_id = $this->request->query('id');
        // load FavoriteProperties table
        $favoritesTbl = TableRegistry::get('FavoriteProperties');
        // check if the combination already exists or not
        $query = $favoritesTbl->find()
            ->where(['property_id' => $property_id, 'user_id' => $this->Auth->user('id')]);

        $existsCount = $query->count();
        // if existsCount > 0 remove the combo (user is toggling)
        if ($existsCount > 0) {
            $ret = $favoritesTbl->deleteAll(['property_id' => $property_id, 'user_id' => $this->Auth->user('id')]);
            if ($ret) $data['message'] = 'Deleted';
        } else {
            // insert into db
            $entry = $favoritesTbl->newEntity();
            $entry->property_id = $property_id;
             //@author Norman Lista
             //send user id for my profile button
            $entry->user_id = $this->Auth->user('id');
            $ret = $favoritesTbl->save($entry);
            if ($ret) $data['message'] = 'Added';
        }
        $this->set(compact('data'));
        $this->set('_serialize', ['data']);
    }


}
