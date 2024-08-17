<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateProvinceTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'province_id' => [
                'type' => 'INT',
                'auto_increment' => true,
                'unsigned' => true,
            ],
            'province_name' => [
                'type' => 'VARCHAR',
                'constraint' => '225',
                'null' => true,
            ],
            'province_code' => [
                'type' => 'VARCHAR',
                'constraint' => '225',
                'null' => true,
            ],
            'country_id' => [
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

        $this->forge->addKey('province_id', true);
        $this->forge->createTable('province');
    }

    public function down()
    {
        $this->forge->dropTable('province');
    }
}
