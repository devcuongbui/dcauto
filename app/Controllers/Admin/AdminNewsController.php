<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class AdminNewsController extends BaseController
{
    protected $model;


    public function __construct()
    {
        $this->model = new \App\Models\News();
    }

    public function list()
    {
        $news = $this->model->where('status', 1)->findAll();
        return view('admin/news/list', ['news' => $news]);
    }

    public function create()
    {
        return view('admin/news/create');
    }

    public function detail($id)
    {
        $news = $this->model->find($id);
        if (!$news || $news->status != 1) {
            return view('errors/404');
        }
        return view('admin/news/detail');
    }

    public function handleCreate()
    {
        try {

        } catch (\Exception $e) {

        }
    }

    public function update($id)
    {
        try {

        } catch (\Exception $e) {

        }
    }

    public function delete($id)
    {
        try {

        } catch (\Exception $e) {

        }
    }
}
