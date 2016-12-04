<?php
use Migrations\AbstractMigration;

class CreateforgotPassword extends AbstractMigration
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
        $table = $this->table('forgot_passwords');
        $table->addColumn('password', 'string', [
            'default' => null,
            'limit' => 127,
            'null' => false,
        ]);
        $table->addColumn('confirm_password', 'string', [
            'default' => null,
            'limit' => 127,
            'null' => false,
        ]);
        $table->addColumn('modified', 'datetime', [
            'default' => null,
            'null' => false,
        ]);
        $table->create();
    }
}
