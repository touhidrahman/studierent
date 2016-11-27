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
 * @property \Cake\ORM\Association\BelongsToMany $Users
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
            'foreignKey' => 'property_id'
        ]);
        $this->belongsToMany('Users', [
            'foreignKey' => 'property_id',
            'targetForeignKey' => 'user_id',
            'joinTable' => 'users_properties'
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
            ->requirePresence('address', 'create')
            ->notEmpty('address');

        $validator
            ->integer('status')
            ->requirePresence('status', 'create')
            ->notEmpty('status');

        $validator
            ->integer('contact_number')
            ->requirePresence('contact_number', 'create')
            ->notEmpty('contact_number');

        $validator
            ->email('email')
            ->requirePresence('email', 'create')
            ->notEmpty('email');

        $validator
            ->integer('room_size')
            ->requirePresence('room_size', 'create')
            ->notEmpty('room_size');

        $validator
            ->integer('total_size')
            ->requirePresence('total_size', 'create')
            ->notEmpty('total_size');

        $validator
            ->requirePresence('description', 'create')
            ->notEmpty('description');

        $validator
            ->requirePresence('transportation', 'create')
            ->notEmpty('transportation');

        $validator
            ->boolean('direct_bus_to_uni')
            ->requirePresence('direct_bus_to_uni', 'create')
            ->notEmpty('direct_bus_to_uni');

        $validator
            ->requirePresence('house_rules', 'create')
            ->notEmpty('house_rules');

        $validator
            ->requirePresence('looking_for', 'create')
            ->notEmpty('looking_for');

        $validator
            ->date('available_from')
            ->requirePresence('available_from', 'create')
            ->notEmpty('available_from');

        $validator
            ->date('available_until')
            ->requirePresence('available_until', 'create')
            ->notEmpty('available_until');

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
            ->requirePresence('utility_cost', 'create')
            ->notEmpty('utility_cost');

        $validator
            ->integer('dist_from_uni')
            ->requirePresence('dist_from_uni', 'create')
            ->notEmpty('dist_from_uni');

        $validator
            ->requirePresence('time_dist_from_uni', 'create')
            ->notEmpty('time_dist_from_uni');

        $validator
            ->boolean('smoking')
            ->requirePresence('smoking', 'create')
            ->notEmpty('smoking');

        $validator
            ->boolean('pets')
            ->requirePresence('pets', 'create')
            ->notEmpty('pets');

        $validator
            ->boolean('handicap')
            ->requirePresence('handicap', 'create')
            ->notEmpty('handicap');

        $validator
            ->boolean('fire_alarm')
            ->requirePresence('fire_alarm', 'create')
            ->notEmpty('fire_alarm');

        $validator
            ->boolean('washing_machine')
            ->requirePresence('washing_machine', 'create')
            ->notEmpty('washing_machine');

        $validator
            ->boolean('parking')
            ->requirePresence('parking', 'create')
            ->notEmpty('parking');

        $validator
            ->boolean('heating')
            ->requirePresence('heating', 'create')
            ->notEmpty('heating');

        $validator
            ->boolean('bike_parking')
            ->requirePresence('bike_parking', 'create')
            ->notEmpty('bike_parking');

        $validator
            ->boolean('garden')
            ->requirePresence('garden', 'create')
            ->notEmpty('garden');

        $validator
            ->boolean('balcony')
            ->requirePresence('balcony', 'create')
            ->notEmpty('balcony');

        $validator
            ->boolean('cable_tv')
            ->requirePresence('cable_tv', 'create')
            ->notEmpty('cable_tv');

        $validator
            ->boolean('electricity_bill_included')
            ->requirePresence('electricity_bill_included', 'create')
            ->notEmpty('electricity_bill_included');

        $validator
            ->boolean('internet')
            ->requirePresence('internet', 'create')
            ->notEmpty('internet');

        $validator
            ->integer('view_times')
            ->requirePresence('view_times', 'create')
            ->notEmpty('view_times');

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
        $rules->add($rules->isUnique(['email']));
        $rules->add($rules->existsIn(['zip_id'], 'Zips'));

        return $rules;
    }
}
