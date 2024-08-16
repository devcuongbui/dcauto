<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class AdminProductController extends BaseController
{
    protected $model;
    protected $category_model;
    protected $user_id;


    public function __construct()
    {
        helper('text');
        $this->model = new \App\Models\ProductModel();
        $this->user_id = session()->get('user')['id'];
        $this->category_model = new \App\Models\Category();
    }

    public function list()
    {
        $products = $this->model->where('deleted_at !=', null)->orderBy('product_id', 'desc')
            ->Join('category', 'products.category_id = category.c_idx')
            ->select('products.*, category.code_name')
            ->findAll();
        return view('admin/products/list', ['products' => $products]);
    }

    public function store()
    {

    }

    public function create()
    {
        $categories = $this->category_model->where('status', 'Y')->orderBy('c_idx', 'desc')->findAll();
        return view('admin/products/create', ['categories' => $categories]);
    }

    public function detail($id)
    {
        $products = $this->model->where('product_id', $id)->first();

        if ($products == null || $products['deleted_at'] != null) {
            return view('errors/404');
        }
        $categories = $this->category_model->where('status', 'Y')->orderBy('c_idx', 'desc')->findAll();
        return view('admin/products/detail', ['products' => $products, 'categories' => $categories]);
    }

    public function update($id)
    {

    }

    public function delete($id)
    {

    }
}
