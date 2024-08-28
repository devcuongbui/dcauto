<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddNewColumnsToUser extends Migration
{
    public function up()
    {
        $fields = [
            'full_name' => [
                'type' => 'VARCHAR',
                'constraint' => '200',
            ],
            'phone' => [
                'type' => 'VARCHAR',
                'constraint' => '50',
            ],
        ];

        $this->forge->addColumn('users', $fields);
    }

    public function down()
    {
        $this->forge->dropColumn('users', ['full_name', 'phone']);
    }
}
