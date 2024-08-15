<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class ProvinceSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'province_name' => 'Province 1',
                'province_code' => 'P001',
                'country_id'    => 1,
            ],
            [
                'province_name' => 'Province 2',
                'province_code' => 'P002',
                'country_id'    => 1,
            ],
        ];

        $this->db->table('province')->insertBatch($data);
    }
}
