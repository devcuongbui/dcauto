<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class ProductOptionsSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'product_id'     => 1,
                'po_name'        => 'Color Option',
                'po_description' => 'Red color',
                'po_value'       => 'Red',
                'po_init_price'  => 50.00,
                'po_image'       => 'red.jpg',
                'po_sell_price'  => 60.00,
                'created_at'     => date('Y-m-d H:i:s'),
                'updated_at'     => date('Y-m-d H:i:s'),
            ],
            [
                'product_id'     => 2,
                'po_name'        => 'Size Option',
                'po_description' => 'Large size',
                'po_value'       => 'L',
                'po_init_price'  => 30.00,
                'po_image'       => 'large.jpg',
                'po_sell_price'  => 40.00,
                'created_at'     => date('Y-m-d H:i:s'),
                'updated_at'     => date('Y-m-d H:i:s'),
            ],
            [
                'product_id'     => 3,
                'po_name'        => 'Material Option',
                'po_description' => 'Cotton material',
                'po_value'       => 'Cotton',
                'po_init_price'  => 70.00,
                'po_image'       => 'cotton.jpg',
                'po_sell_price'  => 80.00,
                'created_at'     => date('Y-m-d H:i:s'),
                'updated_at'     => date('Y-m-d H:i:s'),
            ],
        ];

        $this->db->table('product_options')->insertBatch($data);
    }
}
