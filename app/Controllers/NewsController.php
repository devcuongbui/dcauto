<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class NewsController extends BaseController
{
    protected $model;
    protected $user_id;


    public function __construct()
    {
        $this->model = new \App\Models\News();
        $this->user_id = session()->get('user')['id'];
    }

    public function list()
    {
        $type = $this->request->getVar('type');

        if ($type == 'kien-thuc-o-to') {
            $type = 1;
        } else {
            $type = 0;
        }
        $news = $this->model->where('status', 1)->where('type', $type)->orderBy('id', 'desc')->findAll();
        return view('news/list', ['news' => $news, 'type' => $type]);
    }

    public function detail()
    {
        return view('news/detail');
    }
}
