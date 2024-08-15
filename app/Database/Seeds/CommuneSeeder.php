<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class CommuneSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'commune_name' => 'Commune 1',
                'commune_code' => 'C001',
                'district_id'  => 1,
            ],
            [
                'commune_name' => 'Commune 2',
                'commune_code' => 'C002',
                'district_id'  => 2,
            ],
        ];

        $this->db->table('commune')->insertBatch($data);
    }
}
