<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class OrderDetailsSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'order_id' => 1,
                'product_id' => 1,
                'combo_id' => 1,
                'quantity' => 2,
                'subtotal' => 50.00,
                'init_price' => 25.00,
                'sale_price' => 20.00,
                'option_id' => 1,
            ],
            [
                'order_id' => 2,
                'product_id' => 2,
                'combo_id' => null,
                'quantity' => 1,
                'subtotal' => 100.00,
                'init_price' => 100.00,
                'sale_price' => 90.00,
                'option_id' => 2,
            ],
        ];

        $this->db->table('orderdetails')->insertBatch($data);
    }
}
