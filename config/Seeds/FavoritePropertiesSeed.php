<?php
use Migrations\AbstractSeed;

/**
 * FavoriteProperties seed.
 */
class FavoritePropertiesSeed extends AbstractSeed
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
        for ($i=0; $i < 500; $i++) {
            $data[] = [
                'user_id' => $faker->numberBetween(1, 100),
                'property_id'=> $faker->numberBetween(1, 100),
				'created' => date('Y-m-d H:i:s'),
				'modified' => date('Y-m-d H:i:s')
            ];
        }

        $table = $this->table('favorite_properties');
        $table->insert($data)->save();
    }
}
