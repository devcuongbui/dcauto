<?php

namespace App\Controllers;

use App\Models\ReviewReplyModel;
use CodeIgniter\RESTful\ResourceController;

class ReviewReplyController extends ResourceController
{
    protected $modelName = 'App\Models\ReviewReplyModel';
    protected $format    = 'json';

    public function index()
    {
        return $this->respond($this->model->findAll());
    }

    public function create()
    {
        $data = [
            'review_id'  => $this->request->getPost('review_id'),
            'product_id' => $this->request->getPost('product_id'),
            'reply_des'  => $this->request->getPost('reply_des'),
        ];

        if ($this->model->insert($data)) {
            return $this->respondCreated($data);
        }

        return $this->failValidationErrors($this->model->errors());
    }

    public function update($id = null)
    {
        $data = $this->request->getRawInput();
        if ($this->model->update($id, $data)) {
            return $this->respond($data);
        }

        return $this->failValidationErrors($this->model->errors());
    }

    public function delete($id = null)
    {
        if ($this->model->delete($id)) {
            return $this->respondDeleted(['reply_id' => $id]);
        }

        return $this->failNotFound("Không tìm thấy phản hồi với ID: $id");
    }
}
