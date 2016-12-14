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
     * Return studierent score calculated using other field values
     * @author Touhidur Rahman
     */
     protected function _getStudierentScore() {
         $score = 0;
         // 10 points based on room and flat size, give some points     = 10
         $sizeFactor = $this->_properties['total_size'] / $this->_properties['room_size'] * 100;
         if ($sizeFactor <= 40) {
             $score += 5;
         } else if ($sizeFactor <= 60) {
             $score += 8;
         } else {
             $score += 10;
         }
         // 10 points for these 3                                       = 20
         if ($this->_properties['description'])                     $score += 2;
         if (strlen($this->_properties['description']) > 400)       $score += 2;
         if ($this->_properties['transportation'])                  $score += 2;
         if (strlen($this->_properties['transportation']) > 200)    $score += 1;
         if ($this->_properties['house_rules'])                     $score += 2;
         if (strlen($this->_properties['house_rules']) > 100)       $score += 1;

         // 5 points for looking_for                                    = 25
         switch ($this->_properties['looking_for']) {
             case 'Male':
                 $score += 3;
                 break;

             case 'Female':
                 $score += 3;
                 break;

             default:
                 $score += 5;
                 break;
         }

         // 10 points for availability                                  = 35
         $from = $this->_properties['available_from'];
         $to = $this->_properties['available_until'];
         $availabilityFactor = $from->diffInDays($to);
         if ($availabilityFactor <= 60) {
             $score += 4;
         } else if ($availabilityFactor <= 180) {
             $score += 6;
         } elseif ($availabilityFactor < 365) {
             $score += 8;
         } else {
             $score += 10;
         }

         // 10 points for rent deposit utility_cost                     = 45
         if ($this->_properties['deposit'] < 2 * $this->_properties['rent']) {
             $score += 8;
         } else {
             $score += 4;
         }
         if ($this->_properties['utility_cost'] < ($this->_properties['rent'] / 5)) $score += 2;

        // 15 points for distance                                       = 60
        if ($this->_properties['direct_bus_to_uni']) $score += 5;
        if ($this->_properties['dist_from_uni'] <= 2) {
            $score += 10;
        } else if ($this->_properties['dist_from_uni'] <= 5) {
            $score += 8;
        } else if ($this->_properties['dist_from_uni'] <= 10) {
            $score += 5;
        } else {
            $score += 3;
        }

        // 30 points for amenities                                      = 90
        if ($this->_properties['internet'] == 1)                     $score += 4;
        if ($this->_properties['electricity_bill_included'] == 1)    $score += 4;
        if ($this->_properties['heating'] == 1)                      $score += 4;
        if ($this->_properties['washing_machine'] == 1)              $score += 2;
        if ($this->_properties['parking'] == 1)                      $score += 2;
        if ($this->_properties['bike_parking'] == 1)                 $score += 2;
        if ($this->_properties['fire_alarm'] == 1)                   $score += 2;
        if ($this->_properties['garden'] == 1)                       $score += 2;
        if ($this->_properties['balcony'] == 1)                      $score += 2;
        if ($this->_properties['handicap'] == 1)                     $score += 2;
        if ($this->_properties['cable_tv'] == 1)                     $score += 2;
        if ($this->_properties['smoking'] == 0)                      $score += 2;

        // 10 points for is_boosted                                     = 100
        if ($this->_properties['is_boosted'])                        $score += 10;

        return $score;

     }
}
