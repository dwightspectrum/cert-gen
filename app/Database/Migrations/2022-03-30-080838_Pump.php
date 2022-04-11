<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Pump extends Migration
{
    protected $DBGroup = 'default';

    public function up()
    {
        $this->forge->addField([
            'pump_id' => [
                'type' => 'INT', 
                'constraint' => 11, 
                'unsigned' => TRUE, 
                'auto_increment' => TRUE
            ],
            'item' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
            ],
            'serial_no' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
            ],
            'image_data' => [
                'type' => 'JSON',
                'null' => true,
            ],
            'verified_place' => [
                'type' => 'JSON',
                'null' => true,
            ],
            'isolation' => [
                'type' => 'JSON',
                'null' => true,
            ],
            'inspector' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
            ],
            'place' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
            ],
            'date' => [
                'type' => 'DATE',
                'null' => true,
            ],
            'signatures' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
            ],
            'created_at' => [
                'type' => 'datetime', 
                'null' => true],
            'updated_at' => [
                'type' => 'datetime',
                'null' => true
            ],
            'deleted_at' => [
                'type' => 'datetime', 
                'null' => true
            ],
        ]);

        $this->forge->addKey('pump_id');
        $this->forge->createTable('pump');
    }

    public function down()
    {
        $this->forge->dropTable('pump');
    }
}
