<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class DistrictSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'district_name' => 'District 1',
                'district_code' => 'D001',
                'province_id'   => 1,
            ],
            [
                'district_name' => 'District 2',
                'district_code' => 'D002',
                'province_id'   => 2,
            ],
        ];

        $this->db->table('district')->insertBatch($data);
    }
}
