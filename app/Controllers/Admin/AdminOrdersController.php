<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class AdminOrdersController extends BaseController
{
    protected $model;
    protected $user_id;


    public function __construct()
    {
        $this->model = new \App\Models\OrdersModel();
        $this->user_id = session()->get('user')['id'];
    }

    public function list()
    {
        $list = $this->model->where('status_id', 1)->orderBy('order_id', 'desc')->findAll();
        return view('admin/orders/list', ['list' => $list]);
    }

    public function detail($id)
    {
        $news = $this->model->find($id);
        if (!$news || $news['status'] != 1) {
            return view('errors/404');
        }
        return view('admin/orders/detail', ['news' => $news]);
    }

    public function update($id)
    {
        try {
            $news = $this->model->find($id);
            if (!$news || $news['status'] != 1) {
                return $this->response
                    ->setStatusCode(404)
                    ->setJSON([
                        'status' => 'error',
                        'message' => 'News not found!'
                    ]);
            }

            $data = $this->request->getJSON(true);
            $title = $data['title'] ?? null;
            $content = $data['content'] ?? null;
            $type = $data['type'] ?? null;

            if (empty($title) || empty($content)) {
                return $this->response->setStatusCode(400)
                    ->setJSON([
                        'status' => 'error',
                        'data' => 'error',
                        'message' => 'Vui long nhap day du thong tin'
                    ]);
            }

            $is_show = $data['is_show'] ?? false;
            $show = 0;
            if ($is_show) {
                $show = 1;
            }

            $this->model->update($id, [
                'title' => $title,
                'content' => $content,
                'type' => $type,
                'updated_at' => date('Y-m-d H:i:s'),
                'updated_by' => $this->user_id,
                'is_show' => $show
            ]);

            return $this->response
                ->setStatusCode(200)
                ->setJSON([
                    'status' => 'success',
                    'message' => 'Cap nhap thanh cong'
                ]);

        } catch (\Exception $e) {
            return $this->response
                ->setStatusCode(400)
                ->setJSON([
                    'status' => 'error',
                    'message' => $e->getMessage()
                ]);
        }
    }

    public function delete($id)
    {
        try {
            $news = $this->model->find($id);
            if (!$news || $news['status'] != 1) {
                return $this->response
                    ->setStatusCode(404)
                    ->setJSON([
                        'status' => 'error',
                        'message' => 'News not found!'
                    ]);
            }

            $this->model->update($id, [
                'status' => 0,
                'deleted_at' => date('Y-m-d H:i:s'),
                'deleted_by' => $this->user_id
            ]);
            return $this->response
                ->setStatusCode(200)
                ->setJSON([
                    'status' => 'success',
                    'message' => 'Xoá thành công'
                ]);
        } catch (\Exception $e) {
            return $this->response
                ->setStatusCode(400)
                ->setJSON([
                    'status' => 'error',
                    'message' => $e->getMessage()
                ]);
        }
    }
}
