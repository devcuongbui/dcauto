<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class InsertColumnInNewsTable extends Migration
{
    public function up()
    {
        $this->forge->addColumn('news', [
            'slug' => [
                'type' => 'text',
            ],
            'description' => [
                'type' => 'text',
            ],
            'thumbnail' => [
                'type' => 'text',
            ],
        ]);
    }

    public function down()
    {
        $this->forge->dropColumn('news', 'slug');
        $this->forge->dropColumn('news', 'description');
        $this->forge->dropColumn('news', 'thumbnail');
    }
}
