<?php
use Migrations\AbstractMigration;

class AddRelationshipBasisToFeedbacks extends AbstractMigration
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
        $table->addColumn('relationship_basis', 'string', [
            'default' => null,
            'limit' => 55,
            'null' => false,
        ]);
        $table->update();
    }
}
