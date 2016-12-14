<?php
use Migrations\AbstractMigration;

class AddBoostedTillToProperties extends AbstractMigration
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
        $table->addColumn('boosted_till', 'datetime', [
            'default' => null,
            'limit' => 1,
            'null' => true,
        ]);
        $table->update();
    }
}
