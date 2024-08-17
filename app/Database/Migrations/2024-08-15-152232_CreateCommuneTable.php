<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateCommuneTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'commune_id' => [
                'type' => 'INT',
                'auto_increment' => true,
                'unsigned' => true,
            ],
            'commune_name' => [
                'type' => 'VARCHAR',
                'constraint' => '225',
                'null' => true,
            ],
            'commune_code' => [
                'type' => 'VARCHAR',
                'constraint' => '225',
                'null' => true,
            ],
            'district_id' => [
                'type' => 'INT',
                'unsigned' => true,
                'null' => true,
            ],
            'created_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
            'updated_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
            'deleted_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
        ]);

        $this->forge->addKey('commune_id', true);
        $this->forge->createTable('commune');
    }

    public function down()
    {
        $this->forge->dropTable('commune');
    }
}
