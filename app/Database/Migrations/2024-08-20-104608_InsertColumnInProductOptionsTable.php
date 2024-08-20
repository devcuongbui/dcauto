<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class InsertColumnInProductOptionsTable extends Migration
{
    public function up()
    {
        $this->forge->addColumn('product_options', [
            'po_quantity' => [
                'type' => 'int',
                'constraint' => 5,
            ],
        ]);
    }

    public function down()
    {

    }
}
