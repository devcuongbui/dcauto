<?php

namespace App\Controllers;

class CartController extends BaseController
{
    private $session;
    private $productModel;
    private $productOptionModel;
    private $orderModel;
    public function __construct()
    {
        $this->session = session();
        $this->productModel = model('ProductModel');
        $this->productOptionModel = model('ProductOptionModel');
        $this->orderModel = model('OrdersModel');
    }
    public function list()
    {
        $model1 = [
            'items' => [
                [
                    'id' => uniqid(),
                    'product_id' => '1',
                    'option_id' => '1',
                    'quantity' => 1,
                    'selected' => false
                ],
                [
                    'id' => uniqid(),
                    'product_id' => '2',
                    'option_id' => '3',
                    'quantity' => 2,
                    'selected' => true
                ]
            ],
        ];
        $this->session->set('cart', $model1);
        $cart = $this->session->get('cart') ?? [ 'items' => [] ];
        $totalPrice = 0;
        $totalCount = 0;
        $isSelectAll = true;
        foreach ($cart['items'] as $item) {
            $product = $this->productModel->find($item['product_id']);
            if ($item['selected']) {
                $totalPrice += $item['quantity'] * $product['sell_price'];
                $totalCount += $item['quantity'];
            } else {
                $isSelectAll = false;
            }
        }
        return view('cart/list', [
            'cart' => $cart,
            'totalPrice' => $totalPrice,
            'totalCount' => $totalCount,
            'isSelectAll' => $isSelectAll,
            'productModel' => $this->productModel,
            'productOptionModel' => $this->productOptionModel,
        ]);
    }
    public function add()
    {
        $product_id = $this->request->getPost('product_id');
        $quantity = $this->request->getPost('quantity');
        $option_id = $this->request->getPost('option_id');
        $cart = $this->session->get('cart') ?? [ 'items' => [] ];
        $item = [
            'id' => uniqid(),
            'product_id' => $product_id,
            'option_id' => $option_id,
            'quantity' => $quantity,
        ];

        $cart['items'][] = $item;
        $totalPrice = 0;
        $totalCount = 0;
        $isSelectAll = true;
        foreach ($cart['items'] as $item) {
            $product = $this->productModel->find($item['product_id']);
            if ($item['selected']) {
                $totalPrice += $item['quantity'] * $product['sell_price'];
                $totalCount += $item['quantity'];
            } else {
                $isSelectAll = false;
            }
        }
        $this->session->set('cart', $cart);
        return view("cart/list_items", [
            'cart' => $cart,
            'totalPrice' => $totalPrice,
            'totalCount' => $totalCount,
            'isSelectAll' => $isSelectAll,
            'productModel' => $this->productModel,
            'productOptionModel' => $this->productOptionModel,
        ]);
    }
    public function remove()
    {
        $id = $this->request->getPost('id');
        $cart = $this->session->get('cart') ?? [ 'items' => [] ];
        foreach ($cart['items'] as $key => $item) {
            if ($item['id'] == $id) {
                unset($cart['items'][$key]);
                break;
            }
        }
        $totalPrice = 0;
        $totalCount = 0;
        $isSelectAll = true;
        foreach ($cart['items'] as $item) {
            $product = $this->productModel->find($item['product_id']);
            if ($item['selected']) {
                $totalPrice += $item['quantity'] * $product['sell_price'];
                $totalCount += $item['quantity'];
            } else {
                $isSelectAll = false;
            }
        }
        $this->session->set('cart', $cart);
        return view("cart/list_items", [
            'cart' => $cart,
            'totalPrice' => $totalPrice,
            'totalCount' => $totalCount,
            'isSelectAll' => $isSelectAll,
            'productModel' => $this->productModel,
            'productOptionModel' => $this->productOptionModel,
        ]);
    }
    public function update()
    {
        $id = $this->request->getPost('id');
        $quantity = $this->request->getPost('quantity');
        $cart = $this->session->get('cart') ?? [ 'items' => [] ];
        foreach ($cart['items'] as $key => $item) {
            if ($item['id'] == $id) {
                $cart['items'][$key]['quantity'] = $quantity;
                break;
            }
        }
        $totalPrice = 0;
        $totalCount = 0;
        $isSelectAll = true;
        foreach ($cart['items'] as $item) {
            $product = $this->productModel->find($item['product_id']);
            if ($item['selected']) {
                $totalPrice += $item['quantity'] * $product['sell_price'];
                $totalCount += $item['quantity'];
            } else {
                $isSelectAll = false;
            }
        }
        $this->session->set('cart', $cart);
        return view("cart/list_items", [
            'cart' => $cart,
            'totalPrice' => $totalPrice,
            'totalCount' => $totalCount,
            'isSelectAll' => $isSelectAll,
            'productModel' => $this->productModel,
            'productOptionModel' => $this->productOptionModel,
        ]);
    }
    public function selectAll()
    {
        $cart = $this->session->get('cart') ?? [ 'items' => [] ];
        $checked = $this->request->getPost('checked');
        foreach ($cart['items'] as $key => $item) {
            if ($checked == 'Y') {
                $cart['items'][$key]['selected'] = true;
            } else {
                $cart['items'][$key]['selected'] = false;
            }
        }
        $totalPrice = 0;
        $totalCount = 0;
        $isSelectAll = true;
        foreach ($cart['items'] as $item) {
            $product = $this->productModel->find($item['product_id']);
            if ($item['selected']) {
                $totalPrice += $item['quantity'] * $product['sell_price'];
                $totalCount += $item['quantity'];
            } else {
                $isSelectAll = false;
            }
        }
        $this->session->set('cart', $cart);
        return view("cart/list_items", [
            'cart' => $cart,
            'totalPrice' => $totalPrice,
            'totalCount' => $totalCount,
            'isSelectAll' => $isSelectAll,
            'productModel' => $this->productModel,
            'productOptionModel' => $this->productOptionModel,
        ]);
    }
    public function select()
    {
        $cart = $this->session->get('cart') ?? [ 'items' => [] ];
        $checked = $this->request->getPost('checked');
        $id = $this->request->getPost('id');
        foreach ($cart['items'] as $key => $item) {
            if ($item['id'] == $id) {
                if ($checked == "Y") {
                    $cart['items'][$key]['selected'] = true;
                } else {
                    $cart['items'][$key]['selected'] = false;
                }
                break;
            }
        }
        $totalPrice = 0;
        $totalCount = 0;
        $isSelectAll = true;
        foreach ($cart['items'] as $item) {
            $product = $this->productModel->find($item['product_id']);
            if ($item['selected']) {
                $totalPrice += $item['quantity'] * $product['sell_price'];
                $totalCount += $item['quantity'];
            } else {
                $isSelectAll = false;
            }
        }
        $this->session->set('cart', $cart);
        return view("cart/list_items", [
            'cart' => $cart,
            'totalPrice' => $totalPrice,
            'totalCount' => $totalCount,
            'isSelectAll' => $isSelectAll,
            'productModel' => $this->productModel,
            'productOptionModel' => $this->productOptionModel,
        ]);
    }
    public function payment()
    {
        $cart = $this->session->get('cart') ?? [ 'items' => [] ];
        $cart_ok = [
            'items' => [],
        ];
        foreach ($cart['items'] as $item) {
            if ($item['selected']) {
                $cart_ok['items'][] = $item;
            }
        }
        $totalPrice = 0;
        $totalCount = 0;
        foreach ($cart_ok['items'] as $item) {
            $product = $this->productModel->find($item['product_id']);
            $totalPrice += $item['quantity'] * $product['sell_price'];
            $totalCount += $item['quantity'];
        }
        return view("cart/payment", [
            'cart' => $cart_ok,
            'totalPrice' => $totalPrice,
            'vat' => $totalPrice * 0.1,
            'totalPriceWithVat' => $totalPrice + $totalPrice * 0.1,
            'totalCount' => $totalCount,
            'productModel' => $this->productModel,
            'productOptionModel' => $this->productOptionModel
        ]);
    }
}
