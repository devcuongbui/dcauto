<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class InsertMulColumnInProductsTable extends Migration
{
    public function up()
    {
        $this->forge->addColumn('products', [
            'product_gallery' => [
                'type' => 'text',
                'null' => true,
            ],
            'pot_name' => [
                'type' => 'text',
                'null' => true,
            ],
        ]);
    }

    public function down()
    {
        //
    }
}
