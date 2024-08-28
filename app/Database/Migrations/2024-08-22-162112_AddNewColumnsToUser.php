<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddNewColumnsToUser extends Migration
{
    public function up()
    {
        $fields = [
            'avatar' => [
                'type' => 'VARCHAR',
                'constraint' => '200',
            ],
        ];

        $this->forge->addColumn('users', $fields);
    }

    public function down()
    {
        $this->forge->dropColumn('users', ['avatar']);
    }
}
