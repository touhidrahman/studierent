<?php
use Migrations\AbstractMigration;

class AddColumnsToZips extends AbstractMigration
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
        $table = $this->table('zips');
        $table->addColumn('city', 'string', [
            'default' => null,
            'limit' => 55,
            'null' => false,
        ]);
        $table->addColumn('province', 'string', [
            'default' => null,
            'limit' => 55,
            'null' => true,
        ]);
        $table->addColumn('country', 'string', [
            'default' => null,
            'limit' => 255,
            'null' => false,
        ]);
        $table->update();
    }
}
