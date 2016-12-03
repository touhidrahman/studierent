<?php
use Migrations\AbstractMigration;

class AlterFeedbacksChangeStatusLength extends AbstractMigration
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
        $table = $this->table('feedbacks');
        $table->changeColumn('status', 'integer', [
            'default' => null,
            'limit' => 1,
            'null' => false,
        ]);
        $table->update();
    }
}
