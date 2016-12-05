<?php
use Migrations\AbstractSeed;

/**
 * Zips seed.
 */
class ZipsSeed extends AbstractSeed
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
                'city' => $faker->randomElement(['Fulda', 'Darmstdat', 'Giessen']),
                'number' => $faker->numberBetween(36035, 36040),
                'province' => 'Hessen',
                'country' => 'Germany',
                'city_id' => $faker->randomNumber(2),
            ];
        }

        $table = $this->table('zips');
        $table->insert($data)->save();
    }
}
