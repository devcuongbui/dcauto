<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class OrdersController extends BaseController
{
    private $session;
    private $orderModel;
    public function __construct()
    {
        $this->session = session();
        $this->orderModel = model('OrdersModel');
    }
    public function add()
    {
        $order_code = "ODR" . date('YmdHis') . uniqid();
        $data = [
            'orders_code' => $order_code, 'customer_id' => 1, 'order_date' => date('Y-m-d H:i:s'), 'total_amount' => 0, 'delivery_fee' => 0, 
        'total_payment' => 0, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s'), 'deleted_at' => null, 'status_id' => 1, 
        'status_code' => 'ODR', 'order_phone' => '0123456789', 'order_email' => 'VJLqH@example.com', 'order_basic_address' => 'Ha Noi', 
        'order_detail_address' => 'Ha Noi', 'pay_method_id' => 1, 'shipping_form_id' => 1, 'note' => null, 
        'customer_note' => null, 'reciever_name' => 'Nguyen Van A', 'province_id' => 1, 'district_id' => 1, 
        'commune_id' => 1, 'country_id' => 1
        ];
        $this->orderModel->insert($data);
        return redirect()->to("/orders/$order_code");
    }

    public function preview($order_code) {
        $order = $this->orderModel->where('orders_code', $order_code)->first();
        return view('orders/preview', ['order' => $order]);
    }
}
