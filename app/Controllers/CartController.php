<?php

namespace App\Controllers;

class CartController extends BaseController
{
    private $session;
    private $productModel;
    private $productOptionModel;
    public function __construct()
    {
        $this->session = session();
        $this->productModel = model('ProductModel');
        $this->productOptionModel = model('ProductOptionModel');
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
        $cart = $this->session->get('cart') ?? [];
        $totalPrice = 0;
        $isSelectAll = true;
        foreach ($cart['items'] as $item) {
            $product = $this->productModel->find($item['product_id']);
            if ($item['selected']) {
                $totalPrice += $item['quantity'] * $product['sell_price'];
            } else {
                $isSelectAll = false;
            }
        }
        return view('cart/list', [
            'cart' => $cart,
            'totalPrice' => $totalPrice,
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
        $cart = $this->session->get('cart') ?? [];
        $item = [
            'id' => uniqid(),
            'product_id' => $product_id,
            'option_id' => $option_id,
            'quantity' => $quantity,
        ];

        $cart['items'][] = $item;
        $totalPrice = 0;
        $isSelectAll = true;
        foreach ($cart['items'] as $item) {
            $product = $this->productModel->find($item['product_id']);
            if ($item['selected']) {
                $totalPrice += $item['quantity'] * $product['sell_price'];
            } else {
                $isSelectAll = false;
            }
        }
        $this->session->set('cart', $cart);
        return view("cart/list_items", [
            'cart' => $cart,
            'totalPrice' => $totalPrice,
            'isSelectAll' => $isSelectAll,
            'productModel' => $this->productModel,
            'productOptionModel' => $this->productOptionModel,
        ]);
    }
    public function remove()
    {
        $id = $this->request->getPost('id');
        $cart = $this->session->get('cart') ?? [];
        foreach ($cart['items'] as $key => $item) {
            if ($item['id'] == $id) {
                unset($cart['items'][$key]);
                break;
            }
        }
        $totalPrice = 0;
        $isSelectAll = true;
        foreach ($cart['items'] as $item) {
            $product = $this->productModel->find($item['product_id']);
            if ($item['selected']) {
                $totalPrice += $item['quantity'] * $product['sell_price'];
            } else {
                $isSelectAll = false;
            }
        }
        $this->session->set('cart', $cart);
        return view("cart/list_items", [
            'cart' => $cart,
            'totalPrice' => $totalPrice,
            'isSelectAll' => $isSelectAll,
            'productModel' => $this->productModel,
            'productOptionModel' => $this->productOptionModel,
        ]);
    }
    public function update()
    {
        $id = $this->request->getPost('id');
        $quantity = $this->request->getPost('quantity');
        $cart = $this->session->get('cart') ?? [];
        foreach ($cart['items'] as $key => $item) {
            if ($item['id'] == $id) {
                $cart['items'][$key]['quantity'] = $quantity;
                break;
            }
        }
        $totalPrice = 0;
        $isSelectAll = true;
        foreach ($cart['items'] as $item) {
            $product = $this->productModel->find($item['product_id']);
            if ($item['selected']) {
                $totalPrice += $item['quantity'] * $product['sell_price'];
            } else {
                $isSelectAll = false;
            }
        }
        $this->session->set('cart', $cart);
        return view("cart/list_items", [
            'cart' => $cart,
            'totalPrice' => $totalPrice,
            'isSelectAll' => $isSelectAll,
            'productModel' => $this->productModel,
            'productOptionModel' => $this->productOptionModel,
        ]);
    }
    public function selectAll()
    {
        $cart = $this->session->get('cart') ?? [];
        $select = $this->request->getPost('select');
        foreach ($cart['items'] as $key => $item) {
            if ($select == 'Y') {
                $cart['items'][$key]['selected'] = true;
            } else {
                $cart['items'][$key]['selected'] = false;
            }
        }
        $totalPrice = 0;
        $isSelectAll = true;
        foreach ($cart['items'] as $item) {
            $product = $this->productModel->find($item['product_id']);
            if ($item['selected']) {
                $totalPrice += $item['quantity'] * $product['sell_price'];
            } else {
                $isSelectAll = false;
            }
        }
        $this->session->set('cart', $cart);
        return view("cart/list_items", [
            'cart' => $cart,
            'totalPrice' => $totalPrice,
            'isSelectAll' => $isSelectAll,
            'productModel' => $this->productModel,
            'productOptionModel' => $this->productOptionModel,
        ]);
    }
    public function select($id)
    {
        $cart = $this->session->get('cart') ?? [];
        $select = $this->request->getPost('select');
        foreach ($cart['items'] as $key => $item) {
            if ($item['id'] == $id) {
                if ($select == "Y") {
                    $cart['items'][$key]['selected'] = true;
                } else {
                    $cart['items'][$key]['selected'] = false;
                }
                break;
            }
        }
        $totalPrice = 0;
        $isSelectAll = true;
        foreach ($cart['items'] as $item) {
            $product = $this->productModel->find($item['product_id']);
            if ($item['selected']) {
                $totalPrice += $item['quantity'] * $product['sell_price'];
            } else {
                $isSelectAll = false;
            }
        }
        $this->session->set('cart', $cart);
        return view("cart/list_items", [
            'cart' => $cart,
            'totalPrice' => $totalPrice,
            'isSelectAll' => $isSelectAll,
            'productModel' => $this->productModel,
            'productOptionModel' => $this->productOptionModel,
        ]);
    }
}
