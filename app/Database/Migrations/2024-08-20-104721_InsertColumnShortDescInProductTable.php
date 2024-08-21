<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class InsertColumnShortDescInProductTable extends Migration
{
    public function up()
    {
        $this->forge->addColumn('products', [
            'short_description' => [
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
