<?php

namespace App\Controllers;

class CartController extends BaseController
{
    private $session;
    public function __construct()
    {
        $this->session = session();
    }
    public function list()
    {
        $model1 = [
            'items' => [
                [
                    'id' => uniqid(),
                    'product_id' => 'Product 1',
                    'quantity' => 1,
                    'selected' => true
                ]
            ],
        ];
        $this->session->set('cart', $model1);
        $cart = $this->session->get('cart') ?? [];
        return view('cart/list', [
            'cart' => $cart
        ]);
    }
    public function add()
    {
        $product_id = $this->request->getPost('product_id');
        $quantity = $this->request->getPost('quantity');
        $cart = $this->session->get('cart') ?? [];
        $item = [
            'id' => uniqid(),
            'product_id' => $product_id,
            'quantity' => $quantity,
        ];

        $cart['items'][] = $item;
        $this->session->set('cart', $cart);
        return view("cart/list_items", ['cart' => $cart]);
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
        $this->session->set('cart', $cart);
        return view("cart/list_items", ['cart' => $cart]);
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
        $this->session->set('cart', $cart);
        return view("cart/list_items", ['cart' => $cart]);
    }
}
