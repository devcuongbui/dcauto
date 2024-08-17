<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateDistrictTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'district_id' => [
                'type' => 'INT',
                'auto_increment' => true,
                'unsigned' => true,
            ],
            'district_name' => [
                'type' => 'VARCHAR',
                'constraint' => '225',
                'null' => true,
            ],
            'district_code' => [
                'type' => 'VARCHAR',
                'constraint' => '225',
                'null' => true,
            ],
            'province_id' => [
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

        $this->forge->addKey('district_id', true);
        $this->forge->createTable('district');
    }

    public function down()
    {
        $this->forge->dropTable('district');
    }
}
