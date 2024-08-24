<?php

namespace App\Controllers;

class CartController extends BaseController
{
    private $session;
    private $productModel;
    private $productOptionModel;
    private $orderModel;
    private $provinceModel;
    public function __construct()
    {
        $this->session = session();
        $this->productModel = model('ProductModel');
        $this->productOptionModel = model('ProductOptionModel');
        $this->orderModel = model('OrdersModel');
        $this->provinceModel = model('ProvinceModel');
    }
    private function getCartInfo($cart)
    {
        $totalPrice = 0;
        $totalCount = 0;
        $isSelectAll = true;
        foreach ($cart['items'] as $item) {
            $product = $this->productModel->find($item['product_id']);
            $option = $this->productOptionModel->find($item['option_id']);
            $price = $option['po_sell_price'] ?? $product['sell_price'];
            if ($item['selected']) {
                $totalPrice += $item['quantity'] * $price;
                $totalCount += $item['quantity'];
            } else {
                $isSelectAll = false;
            }
        }
        return [
            'cart' => $cart,
            'totalPrice' => $totalPrice,
            'totalCount' => $totalCount,
            'isSelectAll' => $isSelectAll,
            'productModel' => $this->productModel,
            'productOptionModel' => $this->productOptionModel,
        ];
    }
    public function list()
    {
        $cart = $this->session->get('cart') ?? ['items' => []];
        return view('cart/list', $this->getCartInfo($cart));
    }
    public function add()
    {
        $product_id = $this->request->getPost('product_id');
        $quantity = $this->request->getPost('quantity');
        $option_id = $this->request->getPost('option_id');
        $cart = $this->session->get('cart') ?? ['items' => []];

        if (!$product_id || !$option_id || !$quantity) {
            return $this->response->setJSON([
                'message' => 'Vui lòng chọn sản phẩm và số lượng',
            ])->setStatusCode(400);
        }
        $item = [
            'id' => floor(microtime(true) * 1000),
            'product_id' => $product_id,
            'option_id' => $option_id,
            'quantity' => $quantity,
            'selected' => true
        ];

        $is_existed = false;
        for ($index = 0; $index < count($cart['items']); $index++) {
            $item = $cart['items'][$index];
            if ($item['product_id'] == $product_id && $item['option_id'] == $option_id) {
                $is_existed = true;
                $item['quantity'] = $item['quantity'] + $quantity;
                $cart['items'][$index] = $item;
                break;
            }
        }

        if (!$is_existed) {
            $cart['items'][] = $item;
        }
        $this->session->set('cart', $cart);

        return $this->response->setJSON([
            'cart' => $cart,
            'product_id' => $product_id,
            'option_id' => $option_id,
            'quantity' => $quantity,
            'is_existed' => $is_existed
        ]);
    }
    public function buy_now()
    {
        $product_id = $this->request->getPost('product_id');
        $quantity = $this->request->getPost('quantity');
        $option_id = $this->request->getPost('option_id');
        $cart = $this->session->get('cart') ?? ['items' => []];
        if (!$product_id || !$option_id || !$quantity) {
            return $this->response->setJSON([
                'message' => 'Vui lòng chọn sản phẩm và số lượng',
            ])->setStatusCode(400);
        }
        $item = [
            'id' => floor(microtime(true) * 1000),
            'product_id' => $product_id,
            'option_id' => $option_id,
            'quantity' => $quantity,
            'selected' => true
        ];

        $is_existed = false;
        foreach ($cart['items'] as $key => $item) {
            if ($item['product_id'] == $product_id && $item['option_id'] == $option_id) {
                $is_existed = true;
            } else {
                $cart['items'][$key]['selected'] = false;
            }
        }

        if (!$is_existed) {
            $cart['items'][] = $item;
        }

        $totalCountCart = count($cart['items']);
        $this->session->set('cart', $cart);
        return $this->response->setJSON([
            'totalCountCart' => $totalCountCart,
        ]);
    }
    public function remove()
    {
        $id = $this->request->getPost('id');
        $cart = $this->session->get('cart') ?? ['items' => []];
        foreach ($cart['items'] as $key => $item) {
            if ($item['id'] == $id) {
                unset($cart['items'][$key]);
                break;
            }
        }
        $this->session->set('cart', $cart);
        return view("cart/list_items", $this->getCartInfo($cart));
    }
    public function update()
    {
        $id = $this->request->getPost('id');
        $quantity = $this->request->getPost('quantity');
        $cart = $this->session->get('cart') ?? ['items' => []];
        foreach ($cart['items'] as $key => $item) {
            if ($item['id'] == $id) {
                $cart['items'][$key]['quantity'] = $quantity;
                break;
            }
        }
        $this->session->set('cart', $cart);
        return view("cart/list_items", $this->getCartInfo($cart));
    }
    public function selectAll()
    {
        $cart = $this->session->get('cart') ?? ['items' => []];
        $checked = $this->request->getPost('checked');
        foreach ($cart['items'] as $key => $item) {
            if ($checked == 'Y') {
                $cart['items'][$key]['selected'] = true;
            } else {
                $cart['items'][$key]['selected'] = false;
            }
        }
        $this->session->set('cart', $cart);
        return view("cart/list_items", $this->getCartInfo($cart));
    }
    public function select()
    {
        $cart = $this->session->get('cart') ?? ['items' => []];
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
        $this->session->set('cart', $cart);
        return view("cart/list_items", $this->getCartInfo($cart));
    }
    public function payment()
    {
        $cart = $this->session->get('cart') ?? ['items' => []];
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
            $option = $this->productOptionModel->find($item['option_id']);
            $price = $option['po_sell_price'] ?? $product['sell_price'];
            $price = intval($price);
            $quantity = $item['quantity'];
            $sub_total_price = $quantity * $price;
            $totalPrice += $sub_total_price;
            $totalCount += $item['quantity'];
        }
        $provinces = $this->provinceModel->findAll();
        return view("cart/payment", [
            'cart' => $cart_ok,
            'totalPrice' => $totalPrice,
            'vat' => $totalPrice * 0.1,
            'totalPriceWithVat' => $totalPrice + $totalPrice * 0.1,
            'totalCount' => $totalCount,
            'productModel' => $this->productModel,
            'productOptionModel' => $this->productOptionModel,
            'provinces' => $provinces
        ]);
    }
    public function count()
    {
        $cart = $this->session->get('cart') ?? ['items' => []];
        $totalCountCart = count($cart['items']);
        return $this->response->setJSON(['totalCountCart' => $totalCountCart]);
    }
}
