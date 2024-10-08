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

        $list_properties = $this->product_option_model->where('product_id', $id)
            ->orderBy('po_id ', 'desc')
            ->where('deleted_at', null)
            ->findAll();
        $gallery = $this->product_image_model->where('product_id', $id)
            ->where('deleted_at', null)
            ->orderBy('image_id', 'desc')
            ->findAll();

        return view('admin/products/detail', ['product' => $product, 'categories' => $categories, 'list_properties' => $list_properties, 'galleries' => $gallery]);
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
            $data = $this->request->getPost();

            $product_name = $data['product_name'] ?? $product['product_name'];
            $product_code = $data['product_code'] ?? $product['product_code'];
            $description = $data['description'] ?? $product['description'];
            $init_price = $data['init_price'] ?? $product['init_price'];
            $sell_price = $data['sell_price'] ?? $product['sell_price'];
            $quantity = $data['quantity'] ?? $product['quantity'];
            $category_id = $data['category_id'] ?? $product['category_id'];
            $pot_name = $data['attribute'] ?? $product['attribute'];
            $short_description = $data['short_description'] ?? $product['short_description'];

            $sale_date = $data['sale_date'] ?? $product['sale_date'];
            $sale_end_date = $data['sale_end_date'] ?? $product['sale_end_date'];
            $price_on_sale_date = $data['price_on_sale_date'] ?? $product['price_on_sale_date'];
            $pot_id = $data['pot_id'] ?? $product['pot_id'];
            $brand_id = $data['brand_id'] ?? $product['brand_id'];

            $thumbnail = $product['product_image'];
            $file = $this->request->getFile('product_image');

            if ($file) {
                if ($file->isValid() && !$file->hasMoved()) {
                    $publicPath = WRITEPATH . '../public/uploads/products';
                    $newName = $file->getRandomName();
                    $file->move($publicPath, $newName);

                    $thumbnail = $newName;
                }
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

            $slug = $product['slug'] ?? url_title(convert_vn_to_str($product_name), '-', true);

            $this->model->update($id, [
                'product_name' => $product_name,
                'slug' => $slug,
                'product_code' => $product_code,
                'description' => $description,
                'init_price' => $init_price,
                'sell_price' => $sell_price,
                'quantity' => $quantity,
                'product_image' => $thumbnail,
                'updated_at' => date('Y-m-d H:i:s'),
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
                'pot_name' => $pot_name,
                'short_description' => $short_description,
            ]);

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


    public function createImage($id)
    {
        $main_url = '/uploads/products/';
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

            $file = $this->request->getFile('new_image');

            if ($file->isValid() && !$file->hasMoved()) {
                $publicPath = WRITEPATH . '../public/uploads/products';
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

            $this->product_image_model->save([
                'product_id' => $product['product_id'],
                'image_url' => $main_url . $thumbnail,
                'created_at' => date('Y-m-d H:i:s'),
                'file_name' => $thumbnail
            ]);

            return $this->response
                ->setStatusCode(200)
                ->setJSON([
                    'status' => 'success',
                    'message' => 'Tạo thành công'
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

    public function createAttribute($id)
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
            $file = $this->request->getFile('new_po_image');
            $data = $this->request->getPost();

            $po_value = $data['new_po_value'] ?? '';
            $init_price = $data['new_po_init_price'] ?? '';
            $sell_price = $data['new_po_sell_price'] ?? '';
            $quantity = $data['new_po_quantity'] ?? '';

            if ($file->isValid() && !$file->hasMoved()) {
                $publicPath = WRITEPATH . '../public/uploads/products';
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

            $this->product_option_model->save([
                'created_at' => date('Y-m-d H:i:s'),
                'product_id' => $product['product_id'],
                'po_name' => $po_value,
                'po_description' => '',
                'po_value' => $po_value,
                'po_init_price' => $init_price,
                'po_sell_price' => $sell_price,
                'po_quantity' => $quantity,
                'po_image' => $thumbnail
            ]);

            return $this->response
                ->setStatusCode(200)
                ->setJSON([
                    'status' => 'success',
                    'message' => 'Tạo thành công'
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

    public function updateImage($id)
    {
        $main_url = '/uploads/products/';
        try {
            $file = $this->request->getFile('update_image');
            if ($file->isValid() && !$file->hasMoved()) {
                $publicPath = WRITEPATH . '../public/uploads/products';
                $newName = $file->getRandomName();
                $file->move($publicPath, $newName);

                $thumbnail = $newName;

                $this->product_image_model->where('image_id', $id)
                    ->set('image_url', $main_url . $thumbnail)
                    ->set('file_name', $thumbnail)
                    ->update();
            }

            return $this->response
                ->setStatusCode(200)
                ->setJSON([
                    'status' => 'success',
                    'message' => 'Cập nhập thành công'
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

    public function updateAttribute($id)
    {
        try {
            $file = $this->request->getFile('update_po_image');
            $data = $this->request->getPost();

            $attribute = $this->product_option_model->where('po_id', $id)->first();
            if (!$attribute || $attribute['deleted_at'] != null) {
                return $this->response
                    ->setStatusCode(404)
                    ->setJSON([
                        'status' => 'error',
                        'message' => 'Attributes not found!'
                    ]);
            }

            $po_value = $data['update_po_value'] ?? '';
            $init_price = $data['update_po_init_price'] ?? '';
            $sell_price = $data['update_po_sell_price'] ?? '';
            $quantity = $data['update_po_quantity'] ?? '';

            $thumbnail = $attribute['po_image'];
            if ($file) {
                if ($file->isValid() && !$file->hasMoved()) {
                    $publicPath = WRITEPATH . '../public/uploads/products';
                    $newName = $file->getRandomName();
                    $file->move($publicPath, $newName);

                    $thumbnail = $newName;
                }
            }

            $this->product_option_model->where('po_id', $id)
                ->set('po_value', $po_value)
                ->set('po_init_price', $init_price)
                ->set('po_sell_price', $sell_price)
                ->set('po_quantity', $quantity)
                ->set('po_image', $thumbnail)
                ->update();

            return $this->response
                ->setStatusCode(200)
                ->setJSON([
                    'status' => 'success',
                    'message' => 'Cập nhập thành công'
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

    public function deleteImage($id)
    {
        try {
            $image = $this->product_image_model->where('image_id', $id)->first();
            if (!$image || $image['deleted_at'] != null) {
                return $this->response
                    ->setStatusCode(404)
                    ->setJSON([
                        'status' => 'error',
                        'message' => 'Images not found!'
                    ]);
            }

            $this->product_image_model->where('image_id', $id)->set('deleted_at', date('Y-m-d H:i:s'))->update();

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

    public function deleteAttribute($id)
    {
        try {
            $attribute = $this->product_option_model->where('po_id', $id)->first();
            if (!$attribute || $attribute['deleted_at'] != null) {
                return $this->response
                    ->setStatusCode(404)
                    ->setJSON([
                        'status' => 'error',
                        'message' => 'Attributes not found!'
                    ]);
            }

            $this->product_option_model->where('po_id', $id)->set('deleted_at', '2024-08-21 12:34:56')->update();

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
