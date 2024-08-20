<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class AdminProductController extends BaseController
{
    protected $model;
    protected $category_model;
    protected $user_id;


    public function __construct()
    {
        helper('text');
        $this->model = new \App\Models\ProductModel();
        $this->user_id = session()->get('user')['id'];
        $this->category_model = new \App\Models\Category();
    }

    public function list()
    {
        $products = $this->model->where('deleted_at', null)
            ->orderBy('products.product_id', 'desc')
            ->join('category', 'products.category_id = category.c_idx')
            ->select('products.*, category.code_name as category_name')
            ->findAll();

        return view('admin/products/list', ['products' => $products]);
    }

    public function store()
    {
        try {
            $file = $this->request->getFile('file');

            $data = $this->request->getPost();

            var_dump($data);
            die();

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

    public function create()
    {
        $categories = $this->category_model->where('status', 'Y')->orderBy('c_idx', 'desc')->findAll();
        return view('admin/products/create', ['categories' => $categories]);
    }

    public function detail($id)
    {
        $products = $this->model->where('product_id', $id)->first();

        if ($products == null || $products['deleted_at'] != null) {
            return view('errors/404');
        }
        $categories = $this->category_model->where('status', 'Y')->orderBy('c_idx', 'desc')->findAll();
        return view('admin/products/detail', ['products' => $products, 'categories' => $categories]);
    }

    public function update($id)
    {

    }

    public function delete($id)
    {

    }
}
