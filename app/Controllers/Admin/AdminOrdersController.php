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
        $g_list_rows = 10;
        $pg = $this->request->getVar("pg");

        $nTotalCount = $this->model->orderBy('order_id', 'desc')->countAllResults();
        $nPage = ceil($nTotalCount / $g_list_rows);
        if ($pg == "")
            $pg = 1;
        $nFrom = ($pg - 1) * $g_list_rows;
        $list = $this->model
            ->where('deleted_at', null)
            ->orderBy('order_id', 'desc')
            ->limit($g_list_rows, $nFrom)
            ->get()
            ->getResultArray();
        $num = $nTotalCount - $nFrom;
        return view('admin/orders/list', [
            'list' => $list,
            "num" => $num,
            "pg" => $pg,
            "nPage" => $nPage,
            "nTotalCount" => $nTotalCount,
            "currentUri" => $this->request->getUri()->getPath(),
            "g_list_rows" => $g_list_rows
        ]);
    }

    public function detail($id)
    {
        $order = $this->model->find($id);
        if (!$order || $order['status'] != 1) {
            return view('errors/404');
        }
        return view('admin/orders/detail', ['news' => $order]);
    }

    public function update($id)
    {
        try {
            $order = $this->model->find($id);
            if (!$order || $order['status'] != 1) {
                return $this->response
                    ->setStatusCode(404)
                    ->setJSON([
                        'status' => 'error',
                        'message' => 'Order not found!'
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
            $order = $this->model->getOrder($id);
            if (!$order) {
                return $this->response
                    ->setStatusCode(404)
                    ->setJSON([
                        'status' => 'error',
                        'message' => 'Order not found!'
                    ]);
            }

            $this->model->update($id, [
                'deleted_at' => date('Y-m-d H:i:s')
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
