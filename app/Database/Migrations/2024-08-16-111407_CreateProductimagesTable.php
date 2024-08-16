<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateProductimagesTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'image_id'    => [
                'type'           => 'bigint',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'product_id'  => [
                'type'           => 'bigint',
                'constraint'     => 11,
                'null'           => true,
            ],
            'image_url'   => [
                'type'       => 'varchar',
                'constraint' => '255',
                'null'       => true,
            ],
            'file_name'   => [
                'type'       => 'varchar',
                'constraint' => '255',
                'null'       => true,
            ],
            'created_at'  => [
                'type' => 'datetime',
                'null' => true,
            ],
            'updated_at'  => [
                'type' => 'datetime',
                'null' => true,
            ],
            'deleted_at'  => [
                'type' => 'datetime',
                'null' => true,
            ],
        ]);

        $this->forge->addKey('image_id', true);
        $this->forge->createTable('productimages');
    }

    public function down()
    {
        $this->forge->dropTable('productimages');
    }
}
