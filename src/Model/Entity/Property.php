<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Property Entity
 *
 * @property int $id
 * @property string $type
 * @property string $title
 * @property string $house_no
 * @property string $address
 * @property int $zip_id
 * @property int $status
 * @property string $contact_number
 * @property string $email
 * @property int $room_size
 * @property int $total_size
 * @property string $description
 * @property string $transportation
 * @property bool $direct_bus_to_uni
 * @property string $house_rules
 * @property string $looking_for
 * @property \Cake\I18n\Time $available_from
 * @property \Cake\I18n\Time $available_until
 * @property int $rent
 * @property int $deposit
 * @property int $utility_cost
 * @property int $dist_from_uni
 * @property string $time_dist_from_uni
 * @property bool $smoking
 * @property bool $pets
 * @property bool $handicap
 * @property bool $fire_alarm
 * @property bool $washing_machine
 * @property bool $parking
 * @property bool $heating
 * @property bool $bike_parking
 * @property bool $garden
 * @property bool $balcony
 * @property bool $cable_tv
 * @property bool $electricity_bill_included
 * @property bool $internet
 * @property int $view_times
 * @property int $is_boosted
 * @property \Cake\I18n\Time $created
 * @property \Cake\I18n\Time $modified
 *
 * @property \App\Model\Entity\Zip $zip
 * @property \App\Model\Entity\FavoriteProperty[] $favorite_properties
 * @property \App\Model\Entity\Image[] $images
 * @property \App\Model\Entity\User[] $users
 */
class Property extends Entity
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
     * Virtual field
     * @author Touhidur Rahman
     */
     protected function _getZipcode() {
        //  return $this->_properties
     }
}
