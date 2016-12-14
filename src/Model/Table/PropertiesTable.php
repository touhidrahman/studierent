<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Properties Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Zips
 * @property \Cake\ORM\Association\HasMany $FavoriteProperties
 * @property \Cake\ORM\Association\HasMany $Images
 * @property \Cake\ORM\Association\HasMany $Reports
 *
 * @method \App\Model\Entity\Property get($primaryKey, $options = [])
 * @method \App\Model\Entity\Property newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Property[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Property|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Property patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Property[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Property findOrCreate($search, callable $callback = null)
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class PropertiesTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->table('properties');
        $this->displayField('title');
        $this->primaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Zips', [
            'foreignKey' => 'zip_id',
            'joinType' => 'INNER'
        ]);
        $this->hasMany('FavoriteProperties', [
            'foreignKey' => 'property_id'
        ]);
        $this->hasMany('Images', [
            'foreignKey' => 'property_id',
        ]);
        $this->belongsTo('Users', [
            'foreignKey' => 'user_id',
            'joinType' => 'INNER'
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator
            ->integer('id')
            ->allowEmpty('id', 'create');

        $validator
            ->requirePresence('type', 'create')
            ->notEmpty('type');

        $validator
            ->requirePresence('title', 'create')
            ->notEmpty('title');

        $validator
            ->requirePresence('house_no', 'create')
            ->notEmpty('house_no');

        $validator
            ->requirePresence('address', 'create')
            ->notEmpty('address');

        $validator
            ->integer('status')
            ->allowEmpty('status');

        $validator
            ->allowEmpty('contact_number');

        $validator
            ->email('email')
            ->allowEmpty('email');

        $validator
            ->integer('room_size')
            ->allowEmpty('room_size');

        $validator
            ->integer('total_size')
            ->allowEmpty('total_size');

        $validator
            ->allowEmpty('description');

        $validator
            ->allowEmpty('transportation');

        $validator
            ->boolean('direct_bus_to_uni')
            ->allowEmpty('direct_bus_to_uni');

        $validator
            ->allowEmpty('house_rules');

        $validator
            ->allowEmpty('looking_for');

        $validator
            ->date('available_from')
            ->requirePresence('available_from', 'create')
            ->notEmpty('available_from');

        $validator
            ->date('available_until')
            ->allowEmpty('available_until');

        $validator
            ->integer('rent')
            ->requirePresence('rent', 'create')
            ->notEmpty('rent');

        $validator
            ->integer('deposit')
            ->requirePresence('deposit', 'create')
            ->notEmpty('deposit');

        $validator
            ->integer('utility_cost')
            ->allowEmpty('utility_cost');

        $validator
            ->integer('dist_from_uni')
            ->allowEmpty('dist_from_uni');

        $validator
            ->allowEmpty('time_dist_from_uni');

        $validator
            ->boolean('smoking')
            ->allowEmpty('smoking');

        $validator
            ->boolean('pets')
            ->allowEmpty('pets');

        $validator
            ->boolean('handicap')
            ->allowEmpty('handicap');

        $validator
            ->boolean('fire_alarm')
            ->allowEmpty('fire_alarm');

        $validator
            ->boolean('washing_machine')
            ->allowEmpty('washing_machine');

        $validator
            ->boolean('parking')
            ->allowEmpty('parking');

        $validator
            ->boolean('heating')
            ->allowEmpty('heating');

        $validator
            ->boolean('bike_parking')
            ->allowEmpty('bike_parking');

        $validator
            ->boolean('garden')
            ->allowEmpty('garden');

        $validator
            ->boolean('balcony')
            ->allowEmpty('balcony');

        $validator
            ->boolean('cable_tv')
            ->allowEmpty('cable_tv');

        $validator
            ->boolean('electricity_bill_included')
            ->allowEmpty('electricity_bill_included');

        $validator
            ->boolean('internet')
            ->allowEmpty('internet');

        $validator
            ->integer('view_times')
            ->allowEmpty('view_times');
        
         $validator
            ->boolean('is_boosted')
            ->allowEmpty('is_boosted');
           $validator
            ->boolean('boosted_till')
            ->allowEmpty('boosted_till');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules)
    {
        // $rules->add($rules->isUnique(['email']));
        // $rules->add($rules->existsIn(['zip_id'], 'Zips'));

        return $rules;
    }

}
