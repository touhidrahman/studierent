<?php
use Migrations\AbstractMigration;

class AddLandlordlinkToReports extends AbstractMigration
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
        $table = $this->table('reports');
        $table->addColumn('landlordlink', 'string', [
            'default' => null,
            'limit' => 55,
            'null' => true,
        ]);
        $table->update();
    }
}
