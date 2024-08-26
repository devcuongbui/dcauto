<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateReviewReplyTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'reply_id' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'review_id' => [
                'type'       => 'INT',
                'null'       => true,
            ],
            'product_id' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
                'null'       => true,
            ],
            'combo_id' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
                'null'       => true,
            ],
            'reply_des' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
                'null'       => true,
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
        
        $this->forge->addKey('reply_id', true);
        $this->forge->createTable('review_reply');
    }

    public function down()
    {
        $this->forge->dropTable('review_reply');
    }
}
