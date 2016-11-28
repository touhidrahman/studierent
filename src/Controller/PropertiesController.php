<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Datasource\ConnectionManager;

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
     * URL: http://localhost/studierent/properties/search?address=&type=Student+Residence&min=&max=&score=0&dist=100&directBus=1&avalFrom=20161123&avalTo=20161130&rSize=10&fSize=20&eBillIncl=1&internet=1&cableTv=1&wMachine=1&fireAlarm=1&heating=1&parking=1&bikeParking=1&garden=1&balcony=1&smoking=1&pets=1&rating=5&rating=4&sortby=rentUp
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

        $connection = ConnectionManager::get('default');
// TODO: address, zipcode, studierent score, status left
        $query = "SELECT id, title, zip_id, address, description, rent, room_size, total_size FROM properties WHERE `type`='" . $qs['type'] . "' ";
        if ($qs['max']) {
            $min = ($qs['min']) ? $qs['min'] : 0;
            $query .= " AND rent >= " . $min . " AND rent <= ". $qs['max']. " "; // casting to prevent sql injection
        }
        if ($qs['dist']) $query .= " AND dist_from_uni <= " . $qs['dist'] . " ";
        if ($qs['directBus']) $query .= " AND direct_bus_to_uni = 1 ";
        if ($qs['eBillIncl']) $query .= " AND electricity_bill_included = 1 ";
        if ($qs['internet']) $query .= " AND internet = 1 ";
        if ($qs['wMachine']) $query .= " AND washing_machine = 1 ";
        if ($qs['fireAlarm']) $query .= " AND fire_alarm = 1 ";
        if ($qs['heating']) $query .= " AND heating = 1 ";
        if ($qs['parking']) $query .= " AND parking = 1 ";
        if ($qs['bikeParking']) $query .= " AND bike_parking = 1 ";
        if ($qs['garden']) $query .= " AND garden = 1 ";
        if ($qs['balcony']) $query .= " AND balcony = 1 ";
        if ($qs['smoking']) $query .= " AND smoking = 1 ";
        if ($qs['pets']) $query .= " AND pets = 1 ";
        if ($qs['avalFrom']) $query .= " AND available_from <= '" . $qs['avalFrom'] . "' ";
        if ($qs['avalTo']) $query .= " AND available_until >= '" . $qs['avalTo'] . "' ";
        if ($qs['rSize']) $query .= " AND (room_size BETWEEN " . ($qs['rSize']-5) . " AND " . ($qs['rSize']+5) .") ";
        if ($qs['fSize']) $query .= " AND (total_size BETWEEN " . ($qs['fSize']-10) . " AND " . ($qs['fSize']+10) .") ";
        switch ($qs['sortby']) {
            case 'rentUp':
                $query .= " ORDER BY rent DESC";
                break;
            case 'rentDown':
                $query .= " ORDER BY rent ASC";
                break;
            case 'zipStreet':
                $query .= " ORDER BY zip_id ASC, address ASC";
                break;
            case 'available_to_dt':
                $query .= " ORDER BY available_to DESC";
                break;
            case 'available_from_dt':
                $query .= " ORDER BY available_from ASC";
                break;

            default:
                $query .= " ORDER BY rent ASC";
                break;
        }

        $stmt = $connection->execute($query);
        $count = $stmt->rowCount();
        $properties = $stmt->fetchAll('assoc');
// var_dump($properties);
        $this->set(compact('properties', 'count'));
        $this->set('_serialize', ['properties']);

    }
}
