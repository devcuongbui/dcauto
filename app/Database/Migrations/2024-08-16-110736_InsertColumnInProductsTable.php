<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class InsertColumnInProductsTable extends Migration
{
    public function up()
    {
        $this->forge->addColumn('products', [
            'slug' => [
                'type' => 'text',
            ],
            'is_show' => [
                'type' => 'tinyint',
                'default' => 0, // 0 is hidden or 1 is show
                'null' => true,
            ],
        ]);
    }

    public function down()
    {
        //
    }
}
