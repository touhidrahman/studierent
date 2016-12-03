<?php
use Migrations\AbstractMigration;

class RemoveReportedByUserIdFromReports extends AbstractMigration
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
        $table->removeColumn('reported_by_user_id');
        $table->update();
    }
}
