<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateReviewTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'review_id' => [
                'type' => 'INT',
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'user_name' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
                'null' => true,
            ],
            'user_id' => [
                'type' => 'INT',
                'null' => true,
            ],
            'product_id' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
                'null' => true,
            ],
            'review_type' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
                'null' => true,
            ],
            'title' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
                'null' => true,
            ],
            'review_des' => [
                'type' => 'TEXT',
                'null' => true,
            ],
            'post_status' => [
                'type' => 'CHAR',
                'constraint' => '1',
                'null' => true,
            ],
            'img1' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
                'null' => true,
            ],
            'phone' => [
                'type' => 'VARCHAR',
                'constraint' => '45',
                'null' => true,
            ],
            'address' => [
                'type' => 'VARCHAR',
                'constraint' => '1000',
                'null' => true,
            ],
            'file_name1' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
                'null' => true,
            ],
            'img2' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
                'null' => true,
            ],
            'file_name2' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
                'null' => true,
            ],
            'img3' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
                'null' => true,
            ],
            'file_name3' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
                'null' => true,
            ],
            'img4' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
                'null' => true,
            ],
            'file_name4' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
                'null' => true,
            ],
            'img5' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
                'null' => true,
            ],
            'file_name5' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
                'null' => true,
            ],
            'star' => [
                'type' => 'TINYINT',
                'null' => true,
            ],
            'reply' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
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
        $this->forge->addKey('review_id', true);
        $this->forge->createTable('review');
    }

    public function down()
    {
        $this->forge->dropTable('review');
    }
}
