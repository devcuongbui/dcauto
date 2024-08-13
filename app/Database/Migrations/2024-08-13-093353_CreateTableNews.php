<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateTableNews extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'title' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
            ],
            'content' => [
                'type' => 'text',
            ],
            'is_show' => [
                'type' => 'tinyint',
                'default' => 0, // 0 is hidden or 1 is show
            ],
            'status' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
            ],
            'type' => [
                'type' => 'tinyint',
                'default' => 0, // 0 is type on Promotional news or 1 is Car knowledge
            ],
            'created_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
            'created_by' => [
                'type' => 'bigint',
            ],
            'updated_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
            'updated_by' => [
                'type' => 'bigint',
                'null' => true,
            ],
            'deleted_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
            'deleted_by' => [
                'type' => 'bigint',
                'null' => true,
            ],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('news');
    }

    public function down()
    {
        $this->forge->dropTable('news');
    }
}
