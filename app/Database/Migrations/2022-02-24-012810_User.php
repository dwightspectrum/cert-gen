<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class User extends Migration
{
    protected $DBGroup = 'default';

    public function up()
    {
        $this->forge->addField([
            'user_id' => [
                'type' => 'INT', 
                'constraint' => 11, 
                'unsigned' => TRUE, 
                'auto_increment' => TRUE
            ],
            'username' => [
                'type' => 'varchar', 
                'constraint' => 100
            ],
            'user_first_name' => [
                'type' => 'varchar', 
                'constraint' => 100
            ],
            'user_last_name' => [
                'type' => 'varchar', 
                'constraint' => 100
            ],
            'user_password' => [
                'type' => 'varchar', 
                'constraint' => 1000
            ],
            'created_at' => [
                'type' => 'datetime', 
                'null' => true
            ],
            'updated_at' => [
                'type' => 'datetime', 
                'null' => true
            ],
            'deleted_at' => [
                'type' => 'datetime', 
                'null' => true
            ],
        ]);

        $this->forge->addKey('user_id');
        $this->forge->createTable('user');
    }

    public function down()
    {
        $this->forge->dropTable('user');
    }
}
