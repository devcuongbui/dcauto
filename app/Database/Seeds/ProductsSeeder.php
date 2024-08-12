<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class ProductsSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'product_name'      => 'Product 1',
                'product_code'      => 'P001',
                'description'       => 'Description for Product 1',
                'init_price'        => 100.00,
                'sell_price'        => 120.00,
                'quantity'          => 50,
                'product_image'     => 'product1.jpg',
                'category_id'       => 1,
                'created_at'        => date('Y-m-d H:i:s'),
                'updated_at'        => date('Y-m-d H:i:s'),
                'sale_date'         => date('Y-m-d H:i:s'),
                'sale_end_date'     => date('Y-m-d H:i:s', strtotime('+10 days')),
                'price_on_sale_date'=> 110.00,
                'is_big_sale'       => 1,
                'is_best'           => 0,
                'is_new'            => 1,
                'pot_id'            => 1,
                'brand_id'          => 1,
            ],
            [
                'product_name'      => 'Product 2',
                'product_code'      => 'P002',
                'description'       => 'Description for Product 2',
                'init_price'        => 150.00,
                'sell_price'        => 170.00,
                'quantity'          => 30,
                'product_image'     => 'product2.jpg',
                'category_id'       => 2,
                'created_at'        => date('Y-m-d H:i:s'),
                'updated_at'        => date('Y-m-d H:i:s'),
                'sale_date'         => date('Y-m-d H:i:s'),
                'sale_end_date'     => date('Y-m-d H:i:s', strtotime('+15 days')),
                'price_on_sale_date'=> 160.00,
                'is_big_sale'       => 0,
                'is_best'           => 1,
                'is_new'            => 0,
                'pot_id'            => 2,
                'brand_id'          => 2,
            ],
            [
                'product_name'      => 'Product 3',
                'product_code'      => 'P003',
                'description'       => 'Description for Product 3',
                'init_price'        => 200.00,
                'sell_price'        => 220.00,
                'quantity'          => 20,
                'product_image'     => 'product3.jpg',
                'category_id'       => 3,
                'created_at'        => date('Y-m-d H:i:s'),
                'updated_at'        => date('Y-m-d H:i:s'),
                'sale_date'         => date('Y-m-d H:i:s'),
                'sale_end_date'     => date('Y-m-d H:i:s', strtotime('+20 days')),
                'price_on_sale_date'=> 210.00,
                'is_big_sale'       => 1,
                'is_best'           => 1,
                'is_new'            => 1,
                'pot_id'            => 3,
                'brand_id'          => 3,
            ],
        ];

        $this->db->table('products')->insertBatch($data);
    }
}
