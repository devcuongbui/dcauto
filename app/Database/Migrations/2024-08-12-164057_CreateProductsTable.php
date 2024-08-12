<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateProductsTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'product_id' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true
            ],
            'product_name' => [
                'type'           => 'VARCHAR',
                'constraint'     => '255',
                'null'           => true,
                'collation'      => 'utf8mb4_unicode_ci',
            ],
            'product_code' => [
                'type'           => 'VARCHAR',
                'constraint'     => '100',
                'null'           => true,
                'collation'      => 'utf8mb4_unicode_ci',
            ],
            'description' => [
                'type'           => 'TEXT',
                'null'           => true,
                'collation'      => 'utf8mb4_unicode_ci',
            ],
            'init_price' => [
                'type'           => 'DECIMAL',
                'constraint'     => '10,2',
                'null'           => true,
            ],
            'sell_price' => [
                'type'           => 'DECIMAL',
                'constraint'     => '10,2',
                'null'           => true,
            ],
            'quantity' => [
                'type'           => 'INT',
                'null'           => true,
            ],
            'product_image' => [
                'type'           => 'VARCHAR',
                'constraint'     => '255',
                'null'           => true,
                'collation'      => 'utf8mb4_unicode_ci',
            ],
            'category_id' => [
                'type'           => 'INT',
                'null'           => true,
            ],
            'created_at' => [
                'type'           => 'DATETIME',
                'null'           => true,
            ],
            'updated_at' => [
                'type'           => 'DATETIME',
                'null'           => true,
            ],
            'deleted_at' => [
                'type'           => 'DATETIME',
                'null'           => true,
            ],
            'sale_date' => [
                'type'           => 'DATETIME',
                'null'           => true,
            ],
            'sale_end_date' => [
                'type'           => 'DATETIME',
                'null'           => true,
            ],
            'price_on_sale_date' => [
                'type'           => 'DECIMAL',
                'constraint'     => '10,2',
                'null'           => true,
            ],
            'is_big_sale' => [
                'type'           => 'TINYINT',
                'null'           => true,
            ],
            'is_best' => [
                'type'           => 'TINYINT',
                'null'           => true,
            ],
            'is_new' => [
                'type'           => 'TINYINT',
                'null'           => true,
            ],
            'pot_id' => [
                'type'           => 'INT',
                'null'           => true,
            ],
            'brand_id' => [
                'type'           => 'INT',
                'null'           => true,
            ]
        ]);

        $this->forge->addKey('product_id', true);

        $this->forge->createTable('products');
    }

    public function down()
    {
        $this->forge->dropTable('products');
    }
}
