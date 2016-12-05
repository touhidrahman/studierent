<?php
use Migrations\AbstractSeed;

/**
 * Properties seed.
 */
class PropertiesSeed extends AbstractSeed
{
    
    public function run()
    {
        $data = [];
        $faker = Faker\Factory::create();
        for ($i=0; $i < 100; $i++) {
            $data[] = [
                'type' => $faker->randomElement(['Flatshare', 'Flat', 'Student Residence', 'House']),
                'title' => $faker->sentence(),
                'address' => $faker->streetName,
                'zip_id' => $faker->numberBetween(1, 50),
                'status' => 1,
                'contact_number' => $faker->phoneNumber,
                'email' => $faker->email,
                'room_size' => $faker->randomNumber(2),
                'total_size' => $faker->randomNumber(2),
                'description' => $faker->paragraph(),
                'transportation' => $faker->paragraph(),
                'house_rules' => $faker->paragraph(),
                'looking_for' => $faker->randomElement(['Male', 'Female']),
                'available_from' => $faker->date(),
                'available_until' => $faker->date(),
                'rent' => $faker->randomNumber(3),
                'deposit' => $faker->randomNumber(3),
                'utility_cost' => $faker->randomNumber(2),
                'dist_from_uni' => $faker->randomDigit(),
                'time_dist_from_uni' => $faker->randomNumber(2),
                'direct_bus_to_uni' => $faker->randomDigit() % 2,
                'smoking' => $faker->randomDigit() % 2,
                'pets' => $faker->randomDigit() % 2,
                'handicap' => $faker->randomDigit() % 2,
                'fire_alarm' => $faker->randomDigit() % 2,
                'washing_machine' => $faker->randomDigit() % 2,
                'parking' => $faker->randomDigit() % 2,
                'bike_parking' => $faker->randomDigit() % 2,
                'heating' => $faker->randomDigit() % 2,
                'garden' => $faker->randomDigit() % 2,
                'balcony' => $faker->randomDigit() % 2,
                'cable_tv' => $faker->randomDigit() % 2,
                'electricity_bill_included' => $faker->randomDigit() % 2,
                'internet' => $faker->randomDigit() % 2,
                'view_times' => $faker->randomNumber(),
                'created' => date('Y-m-d H:i:s'),
                'modified' => date('Y-m-d H:i:s'),
                'house_no' => $faker->numberBetween($min = 1, $max = 100),
                'user_id'=> $faker->numberBetween($min = 1, $max = 100)

            ];
        }

        $table = $this->table('properties');
        $table->insert($data)->save();
    }
}
