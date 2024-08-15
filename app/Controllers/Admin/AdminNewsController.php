<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class AdminNewsController extends BaseController
{
    protected $model;
    protected $user_id;


    public function __construct()
    {
        helper('text');
        $this->model = new \App\Models\News();
        $this->user_id = session()->get('user')['id'];
    }

    public function list()
    {
        $news = $this->model->where('status', 1)->orderBy('id', 'desc')->findAll();
        return view('admin/news/list', ['news' => $news]);
    }

    public function create()
    {
        return view('admin/news/create');
    }

    public function detail($id)
    {
        $news = $this->model->find($id);
        if (!$news || $news['status'] != 1) {
            return view('errors/404');
        }
        return view('admin/news/detail', ['news' => $news]);
    }

    public function handleCreate()
    {
        try {
            $file = $this->request->getFile('file');

            $data = $this->request->getPost();

            $title = $data['title'] ?? null;
            $content = $data['content'] ?? null;
            $type = $data['type'] ?? 0;
            $description = $data['description'] ?? null;

            if ($file->isValid() && !$file->hasMoved()) {
                $newName = $file->getRandomName();
                $publicPath = WRITEPATH . '../public/uploads/news';
                $file->move($publicPath, $newName);

                $thumbnail = $newName;
            } else {
                return $this->response->setStatusCode(400)
                    ->setJSON([
                        'status' => 'error',
                        'data' => 'error',
                        'message' => 'Hình ảnh không được bỏ trống!'
                    ]);
            }

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

            $slug = $data['slug'] ?? url_title(convert_vn_to_str($title), '-', true);
            $user_id = $this->user_id;
            $this->model->save([
                'title' => $title,
                'slug' => $slug,
                'thumbnail' => $thumbnail,
                'description' => $description,
                'content' => $content,
                'type' => $type,
                'status' => 1,
                'created_at' => date('Y-m-d H:i:s'),
                'is_show' => $show,
                'created_by' => $user_id
            ]);

            $news = $this->model->find($this->model->getInsertID());

            return $this->response->setStatusCode(200)
                ->setJSON([
                    'status' => 'success',
                    'data' => $news,
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
            $file = $this->request->getFile('file');

            $news = $this->model->find($id);
            if (!$news || $news['status'] != 1) {
                return $this->response
                    ->setStatusCode(404)
                    ->setJSON([
                        'status' => 'error',
                        'message' => 'News not found!'
                    ]);
            }

            $data = $this->request->getPost();

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
            $description = $data['description'] ?? null;

            $thumbnail = $news['thumbnail'] ?? '';

            if ($file){
                if ($file->isValid() && !$file->hasMoved()) {
                    $newName = $file->getRandomName();
                    $publicPath = WRITEPATH . '../public/uploads/news';
                    $file->move($publicPath, $newName);

                    $thumbnail = $newName;
                }
            }

            $is_show = $data['is_show'] ?? false;
            $show = 0;
            if ($is_show) {
                $show = 1;
            }

            $slug = $data['slug'] ?? url_title(convert_vn_to_str($title), '-', true);
            $this->model->update($id, [
                'title' => $title,
                'slug' => $slug,
                'thumbnail' => $thumbnail,
                'description' => $description,
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
