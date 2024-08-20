<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class AdminProductController extends BaseController
{
    protected $model;
    protected $category_model;
    protected $product_image_model;
    protected $product_option_model;
    protected $user_id;


    public function __construct()
    {
        helper('text');
        $this->model = new \App\Models\ProductModel();
        $this->user_id = session()->get('user')['id'];
        $this->category_model = new \App\Models\Category();
        $this->product_option_model = new \App\Models\ProductOptionModel();
        $this->product_image_model = new \App\Models\ProductImages();
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
        $main_url = '/uploads/products/';
        try {
            $file = $this->request->getFile('product_image');
            $files = $this->request->getFiles();
            $publicPath = WRITEPATH . '../public/uploads/products';
            $data = $this->request->getPost();

            $product_name = $data['product_name'] ?? null;
            $product_code = $data['product_code'] ?? null;
            $description = $data['description'] ?? null;
            $init_price = $data['init_price'] ?? null;
            $sell_price = $data['sell_price'] ?? null;
            $quantity = $data['quantity'] ?? null;

            $category_id = $data['category_id'] ?? null;
            $sale_date = $data['sale_date'] ?? null;
            $sale_end_date = $data['sale_end_date'] ?? null;
            $price_on_sale_date = $data['price_on_sale_date'] ?? null;
            $pot_id = $data['pot_id'] ?? null;
            $brand_id = $data['brand_id'] ?? null;
            $pot_name = $data['attribute'] ?? null;
            $short_description = $data['short_description'] ?? null;

            if ($file->isValid() && !$file->hasMoved()) {
                $newName = $file->getRandomName();
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

            $product_gallery = '';

            if (isset($files['product_gallery'])) {
                foreach ($files['product_gallery'] as $file) {
                    if ($file->isValid() && !$file->hasMoved()) {
                        $newName = $file->getRandomName();
                        $file->move($publicPath, $newName);

                        $product_gallery .= $newName . ',';
                    }
                }
            }

            $product_gallery = rtrim($product_gallery, ',');

            if (empty($product_name) || empty($description)) {
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

            $is_big_sale = $data['is_big_sale'] ?? false;
            $big_sale = 0;
            if ($is_big_sale) {
                $big_sale = 1;
            }

            $is_best = $data['is_best'] ?? false;
            $best = 0;
            if ($is_best) {
                $best = 1;
            }

            $is_new = $data['is_new'] ?? false;
            $new = 0;
            if ($is_new) {
                $new = 1;
            }

            $slug = $data['slug'] ?? url_title(convert_vn_to_str($product_name), '-', true);

            $this->model->save([
                'product_name' => $product_name,
                'slug' => $slug,
                'product_code' => $product_code,
                'description' => $description,
                'init_price' => $init_price,
                'sell_price' => $sell_price,
                'quantity' => $quantity,
                'product_image' => $thumbnail,
                'created_at' => date('Y-m-d H:i:s'),
                'category_id' => $category_id,
                'is_show' => $show,
                'sale_date' => $sale_date,
                'sale_end_date' => $sale_end_date,
                'price_on_sale_date' => $price_on_sale_date,
                'is_big_sale' => $big_sale,
                'is_best' => $best,
                'is_new' => $new,
                'pot_id' => $pot_id,
                'brand_id' => $brand_id,
                'product_gallery' => $product_gallery,
                'pot_name' => $pot_name,
                'short_description' => $short_description,
            ]);

            $product = $this->model->find($this->model->getInsertID());

            $array_gallery = explode(',', $product_gallery);
            foreach ($array_gallery as $key => $value) {
                $this->product_image_model->save([
                    'product_id' => $product['product_id'],
                    'image_url' => $main_url . $value,
                    'created_at' => date('Y-m-d H:i:s'),
                    'file_name' => $value
                ]);
            }

            $list_properties = json_decode($data['list_properties']);
            foreach ($list_properties as $key => $value) {
                $file = null;
                if (isset($files['po_image'])) {
                    $file = $files['po_image'][$key];
                }

                if ($file->isValid() && !$file->hasMoved()) {
                    $newName = $file->getRandomName();
                    $file->move($publicPath, $newName);

                    $img = $newName;
                } else {
                    $img = $product['product_image'];
                }

                $this->product_option_model->save([
                    'created_at' => date('Y-m-d H:i:s'),
                    'product_id' => $product['product_id'],
                    'po_name' => $product['pot_name'],
                    'po_description' => '',
                    'po_value' => $value->po_value,
                    'po_init_price' => $value->po_init_price,
                    'po_quantity' => $value->po_quantity,
                    'po_image' => $img
                ]);
            }

            return $this->response->setStatusCode(200)
                ->setJSON([
                    'status' => 'success',
                    'data' => $product,
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
        $product = $this->model->where('product_id', $id)->first();

        if ($product == null || $product['deleted_at'] != null) {
            return view('errors/404');
        }
        $categories = $this->category_model->where('status', 'Y')->orderBy('c_idx', 'desc')->findAll();
        return view('admin/products/detail', ['product' => $product, 'categories' => $categories]);
    }

    public function update($id)
    {
        try {
            $product = $this->model->find($id);
            if (!$product || $product['deleted_at'] != null) {
                return $this->response
                    ->setStatusCode(404)
                    ->setJSON([
                        'status' => 'error',
                        'message' => 'Products not found!'
                    ]);
            }


            return $this->response
                ->setStatusCode(200)
                ->setJSON([
                    'status' => 'success',
                    'message' => 'Sửa thành công'
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
            $product = $this->model->find($id);
            if (!$product || $product['deleted_at'] != null) {
                return $this->response
                    ->setStatusCode(404)
                    ->setJSON([
                        'status' => 'error',
                        'message' => 'Products not found!'
                    ]);
            }

            $this->model->update($id, [
                'deleted_at' => date('Y-m-d H:i:s'),
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
