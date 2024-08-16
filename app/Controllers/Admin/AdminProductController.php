<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class AdminProductController extends BaseController
{
    protected $model;
    protected $user_id;


    public function __construct()
    {
        helper('text');
        $this->model = new \App\Models\ProductModel();
        $this->user_id = session()->get('user')['id'];
    }

    public function list()
    {
        return view('admin/products/list');
    }

    public function store()
    {

    }

    public function create()
    {
        return view('admin/products/create');
    }

    public function detail($id)
    {
        return view('admin/products/detail');
    }

    public function update($id)
    {

    }

    public function delete($id)
    {

    }
}
