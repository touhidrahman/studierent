<?php
use Migrations\AbstractSeed;

/**
 * Users seed.
 */
class UsersSeed extends AbstractSeed
{
    /**
     * Run Method.
     *
     * Write your database seeder using this method.
     *
     * More information on writing seeders is available here:
     * http://docs.phinx.org/en/latest/seeding.html
     *
     * @return void
     */
    public function run()
    {
        $data = [];
        $faker = Faker\Factory::create();
        for ($i=0; $i < 100; $i++) {
            $data[] = [
                'first_name' => $faker->firstName,
                'last_name' => $faker->lastName,
                'username' => $faker->email,
                'password' => $faker->password,
                'gender' => $faker->randomElement(['M', 'F']),
                'address' => $faker->streetName,
                'city_id' => $faker->randomNumber(2),
                'status' => 1,
                'photo' => 'user.jpg',
                'contact_number' => $faker->phoneNumber,
                'reset_key' => $faker->password,
                'created' => $faker->dateTimeThisYear(),
                'modified' => $faker->dateTimeThisYear(),

            ];
        }

        $table = $this->table('users');
        $table->insert($data)->save();
    }
}
