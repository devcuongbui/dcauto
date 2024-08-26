<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class AdminReviewController extends BaseController
{

    protected $model;
    protected $replyModel;
    protected $user_id;
    public function __construct()
    {
        $this->model = new \App\Models\ReviewModel();
        $this->user_id = session()->get('user')['id'];
        $this->replyModel = new \App\Models\ReviewReplyModel();
    }

    public function list()
    {
        $g_list_rows = 10;
        $pg = $this->request->getVar("pg");

        $nTotalCount = $this->model->where('deleted_at', null)->countAllResults();
        $nPage = ceil($nTotalCount / $g_list_rows);
        if ($pg == "")
            $pg = 1;
        $nFrom = ($pg - 1) * $g_list_rows;
        $list = $this->model
            ->where('deleted_at', null)
            ->orderBy('review_id', 'desc')
            ->limit($g_list_rows, $nFrom)
            ->get()
            ->getResultArray();
        $num = $nTotalCount - $nFrom;

        return view("admin/review/list", [
            'list' => $list,
            "num" => $num,
            "pg" => $pg,
            "nPage" => $nPage,
            "nTotalCount" => $nTotalCount,
            "currentUri" => $this->request->getUri()->getPath(),
            "g_list_rows" => $g_list_rows
        ]);
    }
    public function update()
    {
        try {
            $review_id = $this->request->getPost("review_id");
            $post_status = $this->request->getPost("post_status");
            $reply_des = $this->request->getPost("reply_des");
            $review = $this->model->find($review_id);
            if (!$review) {
                return $this->response
                    ->setStatusCode(404)
                    ->setJSON([
                        'status' => 'error',
                        'message' => 'Không tìm thấy bình luận!'
                    ]);
            }

            if (empty($post_status)) {
                return $this->response->setStatusCode(400)
                    ->setJSON([
                        'status' => 'error',
                        'data' => 'error',
                        'message' => 'Vui lòng điền đầy đủ thông tin!'
                    ]);
            }

            $this->model->update($review_id, [
                'post_status' => $post_status,
                'updated_at' => date('Y-m-d H:i:s'),
            ]);

            $this->replyModel->insertOrUpdate([
                'review_id' => $review_id,
                'reply_des' => $reply_des
            ]);

            return $this->response
                ->setStatusCode(200)
                ->setJSON([
                    'status' => 'success',
                    'message' => 'Cập nhật thành công'
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
            $review = $this->model->find($id);
            if (!$review ) {
                return $this->response
                    ->setStatusCode(404)
                    ->setJSON([
                        'status' => 'error',
                        'message' => 'review not found!'
                    ]);
            }

            $this->model->update($id, ['post_status' => 'D', 'deleted_at' => date('Y-m-d H:i:s')]);
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
