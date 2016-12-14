<?php
use Migrations\AbstractMigration;

class AddBoostedToProperties extends AbstractMigration
{
    /**
     * Change Method.
     *
     * More information on this method is available here:
     * http://docs.phinx.org/en/latest/migrations.html#the-change-method
     * @return void
     */
    public function change()
    {
        $table = $this->table('properties');
        $table->addColumn('is_boosted', 'integer', [
            'default' => 0,
            'limit' => 1,
            'null' => true,
        ]);
        $table->update();
    }
}
