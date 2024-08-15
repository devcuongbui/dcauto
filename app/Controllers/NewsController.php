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
        $slug = $this->request->getVar('slug');
//        $news = $this->model->where('slug', $slug)->where('status', 1)->first();
//        $news = $this->model->where('slug', '%' . $slug . '%', 'like')->where('status', 1)->first();
        $news = $this->model->like('slug', '%' . $slug . '%')->where('status', 1)->first();
        if ($news == null) {
            return view('errors/404');
        }

        $more_news = $this->model->where('status', 1)
            ->where('type', $news['type'])
            ->where('id !=', $news['id'])
            ->orderBy('id', 'desc')
            ->findAll(4);
        return view('news/detail', ['news' => $news, 'more_news' => $more_news]);
    }
}
