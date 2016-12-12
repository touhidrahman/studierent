<?php
use Migrations\AbstractMigration;

class AddStatusToReports extends AbstractMigration
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
        $table->addColumn('status', 'string', [
            'default' => 1,
            'limit' => 60,
            'null' => false,
        ]);
        $table->update();
    }
}
