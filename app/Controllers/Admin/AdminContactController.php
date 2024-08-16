<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class AdminContactController extends BaseController
{

    protected $model;

    public function __construct()
    {
        $this->model = new \App\Models\ContactModel();
        $this->db = db_connect();
    }

    public function list()
    {

        $sql = " select * from contact WHERE deleted_at IS NULL order by created_at desc";
        $list = $this->db->query($sql)->getResultArray();

        return view("admin/contact/list", [
            "list" => $list,
        ]);
    }

    public function detail($id)
    {
        $contact = $this->model->find($id);
        return view('admin/contact/detail', ['contact' => $contact]);
    }

    public function delete($id)
    {
        try {
            $contact = $this->model->find($id);
            if (!$contact ) {
                return $this->response
                    ->setStatusCode(404)
                    ->setJSON([
                        'status' => 'error',
                        'message' => 'contact not found!'
                    ]);
            }

            $this->model->update($id, ['deleted_at' => date('Y-m-d H:i:s')]);
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
