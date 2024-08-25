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
