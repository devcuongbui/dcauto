<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ProvinceModel;
use App\Models\DistrictModel;
use App\Models\CommuneModel;

class OrdersController extends BaseController
{
    private $session;
    private $orderModel;
    private $orderDetailModel;
    private $productModel;
    private $productOptionModel;
    public function __construct()
    {
        $this->session = session();
        $this->orderModel = model('OrdersModel');
        $this->productModel = model('ProductModel');
        $this->productOptionModel = model('ProductOptionModel');
        $this->orderDetailModel = model('OrderDetailModel');
    }
    public function add()
    {
        $order_code = $this->generateOrderCode();

        $post = $this->request->getPost();

        $commune_id = $post['commune_id'] ?? "";
        $district_id = $post['district_id'] ?? "";
        $invoice_data = $post['invoice_data'] ?? [];
        $company_name = $invoice_data['company_name'] ?? "";
        $tax_number = $invoice_data['tax_number'] ?? "";
        $invoice_address = $invoice_data['invoice_address'] ?? "";
        $invoice_note = $invoice_data['invoice_note'] ?? "";
        $invoice_required = $post['invoice_required'] ?? "";
        $order_detail_address = $post['order_detail_address'] ?? "";
        $order_email = $post['order_email'] ?? "";
        $order_phone = $post['order_phone'] ?? "";
        $payment_method = $post['payment_method'] ?? "";
        $province_id = $post['province_id'] ?? "";
        $reciever_name = $post['reciever_name'] ?? "";
        $shipping_method = $post['shipping_method'] ?? "";
        $bank_type = $post['bank_type'] ?? "";

        $cart = $this->session->get('cart');

        $cart_ok = [
            'items' => [],
        ];

        for ($index = 0; $index < count($cart['items']); $index++) {
            if ($cart['items'][$index]['selected']) {
                $cart_ok['items'][] = $cart['items'][$index];
                unset($cart['items'][$index]);
            }
        }

        $this->session->set('cart', $cart);

        $totalPrice = 0;
        $totalCount = 0;
        foreach ($cart_ok['items'] as $item) {
            $product = $this->productModel->find($item['product_id']);
            $option = $this->productOptionModel->find($item['option_id']);
            $price = $option['po_sell_price'] ?? $product['sell_price'];
            $subTotal = $item['quantity'] * $price;
            $totalPrice += $subTotal;
            $totalCount += $item['quantity'];
        }

        if ($invoice_required == "Y") {
            $vat = $totalPrice * 0.1;
            $totalPrice += $vat;
        }

        $data = [
            'orders_code' => $order_code,
            'customer_id' => null,
            'order_date' => date('Y-m-d H:i:s'),
            'total_amount' => $totalPrice,
            'delivery_fee' => 0,
            'total_payment' => 0,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
            'deleted_at' => null,
            'status_id' => 1,
            'status_code' => 'ODR',
            'order_phone' => $order_phone,
            'order_email' => $order_email,
            'order_basic_address' => "",
            'order_detail_address' => $order_detail_address,
            'pay_method_id' => getPayMethodId($payment_method),
            'shipping_form_id' => getShippingMethodId($shipping_method),
            'bank_type' => $bank_type,
            'note' => null,
            'customer_note' => null,
            'reciever_name' => $reciever_name,
            'province_id' => $province_id,
            'district_id' => $district_id,
            'commune_id' => $commune_id,
            'country_id' => null,
            'invoice_required' => $invoice_required,
            'company_name' => $company_name,
            'tax_number' => $tax_number,
            'invoice_address' => $invoice_address,
            'invoice_note' => $invoice_note
        ];
        $this->orderModel->insert($data);

        $order_id = $this->orderModel->getInsertID();
        for ($index = 0; $index < count($cart_ok['items']); $index++) {
            $item = $cart_ok['items'][$index];
            $product = $this->productModel->find($item['product_id']);
            $option = $this->productOptionModel->find($item['option_id']);
            $price = $option['po_sell_price'] ?? $product['sell_price'];
            $init_price = $option['po_init_price'] ?? $product['init_price'];
            $subTotal = $item['quantity'] * $price;
            $this->orderDetailModel->insert([
                'order_id' => $order_id,
                'product_id' => $item['product_id'],
                'quantity' => $item['quantity'],
                'subtotal' => $subTotal,
                'init_price' => $init_price,
                'sale_price' => $price,
                'option_id' => $item['option_id'],
                'combo_id' => null,
            ]);
        }

        return $this->response->setJSON($data);
    }

    public function preview($order_code)
    {
        $provinceModel = new ProvinceModel();
        $districtModel = new DistrictModel();
        $communeModel = new CommuneModel();
        $order = $this->orderModel->where('orders_code', $order_code)->first();
        $order['province'] = $provinceModel->find($order['province_id'])["province_name"] ?? "";
        $order['district'] = $districtModel->find($order['district_id'])['district_name'] ?? "";
        $order['commune'] = $communeModel->find($order['commune_id'])['commune_name'] ?? "";
        $orderDetail = $this->orderDetailModel->where('order_id', $order['order_id'])->findAll();
        $order['order_detail'] = $orderDetail;
        // var_dump($order['province']);die();
        return view('orders/preview', ['order' => $order, 'productModel' => $this->productModel, 'productOptionModel' => $this->productOptionModel]);
    }
    private function generateOrderCode()
    {
        $date = date('Ymd');
        $prefix = 'ODR' . $date;

        $latestOrder = $this->orderModel->where('orders_code LIKE', $prefix . '%')
            ->orderBy('orders_code', 'DESC')
            ->first();

        if ($latestOrder) {
            $lastNumber = (int) substr($latestOrder['orders_code'], -4);
            $newNumber = $lastNumber + 1;
        } else {
            $newNumber = 1;
        }

        $orderCode = $prefix . str_pad($newNumber, 4, '0', STR_PAD_LEFT);

        return $orderCode;
    }
    public function update()
    {

        $data = $this->request->getPost();
        if (isset($data['order_id'])) {
            $this->orderModel->update($data['order_id'], $data);
        }
        return $this->response->setJSON($data);
    }
    public function delete()
    {
        $order_id = $this->request->getPost('order_id');
        $data = $this->orderModel->delete($order_id);
        return $this->response->setJSON($data);
    }
}
