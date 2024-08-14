<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class OrdersSeeder extends Seeder
{
    public function run()
    {
        $data = [
            'orders_code' => 'ORD123456',
            'customer_id' => 1,
            'order_date' => date('Y-m-d H:i:s'),
            'total_amount' => 1000.00,
            'delivery_fee' => 50.00,
            'total_payment' => 1050.00,
            'created_at' => date('Y-m-d H:i:s'),
            'status_id' => 1,
            'order_phone' => '0123456789',
            'order_email' => 'customer@example.com',
            'order_basic_address' => '123 Main Street',
            'order_detail_address' => 'Apartment 4B',
            'pay_method_id' => 1,
            'shipping_form_id' => 1,
            'reciever_name' => 'John Doe',
            'province_id' => 1,
            'district_id' => 1,
            'commune_id' => 1,
            'country_id' => 1,
        ];

        $this->db->table('orders')->insert($data);
    }
}
