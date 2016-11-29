<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;
use Cake\auth\DefaultPasswordHasher;

/**
 * User Entity
 *
 * @property int $id
 * @property string $first_name
 * @property string $last_name
 * @property string $username
 * @property string $password
 * @property string $gender
 * @property string $address
 * @property int $city_id
 * @property int $status
 * @property int $contact_number
 * @property string $photo
 * @property \Cake\I18n\Time $created
 * @property \Cake\I18n\Time $modified
 * @property string $reset_key
 *
 * @property \App\Model\Entity\City $city
 * @property \App\Model\Entity\FavoriteProperty[] $favorite_properties
 * @property \App\Model\Entity\Feedback[] $feedbacks
 * @property \App\Model\Entity\Property[] $properties
 */
class User extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        '*' => true,
        'id' => false
    ];

    /**
     * Fields that are excluded from JSON versions of the entity.
     *
     * @var array
     */
    protected $_hidden = [
        'password'
    ];
	
		protected function _setPassword($value)
    {
        $hasher = new DefaultPasswordHasher();
        return $hasher->hash($value);
    }

}
