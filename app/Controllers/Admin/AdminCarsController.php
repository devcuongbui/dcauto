<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class AdminCarsController extends BaseController
{
    protected $model;
    protected $user_id;


    public function __construct()
    {
        $this->model = new \App\Models\Cars();
        $this->user_id = session()->get('user')['id'];
    }

    public function list()
    {
        $cars = $this->model->where('status', 1)->orderBy('id', 'desc')->findAll();
        return view('admin/cars/list', ['cars' => $cars]);
    }

    public function create()
    {
        return view('admin/cars/create');
    }

    public function detail($id)
    {
        $cars = $this->model->find($id);
        if (!$cars || $cars['status'] != 1) {
            return view('errors/404');
        }
        return view('admin/cars/detail', ['cars' => $cars]);
    }

    public function handleCreate()
    {
        try {
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

            $user_id = $this->user_id;
            $this->model->save([
                'title' => $title,
                'content' => $content,
                'type' => $type,
                'status' => 1,
                'created_at' => date('Y-m-d H:i:s'),
                'is_show' => $show,
                'created_by' => $user_id
            ]);

            $cars = $this->model->find($this->model->getInsertID());

            return $this->response->setStatusCode(200)
                ->setJSON([
                    'status' => 'success',
                    'data' => $cars,
                    'message' => 'Tạo thanh cong'
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

    public function update($id)
    {
        try {
            $cars = $this->model->find($id);
            if (!$cars || $cars['status'] != 1) {
                return $this->response
                    ->setStatusCode(404)
                    ->setJSON([
                        'status' => 'error',
                        'message' => 'cars not found!'
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
            $cars = $this->model->find($id);
            if (!$cars || $cars['status'] != 1) {
                return $this->response
                    ->setStatusCode(404)
                    ->setJSON([
                        'status' => 'error',
                        'message' => 'cars not found!'
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
