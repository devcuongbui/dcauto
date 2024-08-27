<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use CodeIgniter\Database\Config;

class AdminProductController extends BaseController
{
    protected $model;
    protected $category_model;
    protected $product_image_model;
    protected $product_option_model;
    protected $user_id;
    protected $db;


    public function __construct()
    {
        helper('text');
        $this->model = new \App\Models\ProductModel();
        $this->user_id = session()->get('user')['id'];
        $this->category_model = new \App\Models\Category();
        $this->product_option_model = new \App\Models\ProductOptionModel();
        $this->product_image_model = new \App\Models\ProductImages();
        $this->db = Config::connect();
    }

    public function list()
    {
        $products = $this->model->where('deleted_at', null)
            ->orderBy('products.product_id', 'desc')
            ->findAll();

        $products = array_map(function ($item) {
            $product = (array)$item;

            $category_id = $product['category_id'];
            $array_category = explode(',', $category_id);

            $categories = $this->category_model->where('status', 'Y')
                ->whereIn('c_idx', $array_category)
                ->orderBy('c_idx', 'desc')
                ->findAll();

            $category_name = '';
            foreach ($categories as $category) {
                $category_name .= $category['code_name'] . ', ';
            }

            $product['category_name'] = rtrim($category_name, ', ');

            return $product;
        }, $products);

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
            $short_description = $data['short_description'] ?? '';

            $list_categories = $data['list_categories'] ?? '';
            $list_brands = $data['list_brands'] ?? '';

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
                'category_id' => $list_categories,
                'is_show' => $show,
                'sale_date' => $sale_date,
                'sale_end_date' => $sale_end_date,
                'price_on_sale_date' => $price_on_sale_date,
                'is_big_sale' => $big_sale,
                'is_best' => $best,
                'is_new' => $new,
                'pot_id' => $pot_id,
                'brand_id' => $list_brands,
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

            $db = $this->db;
            $array_categories = explode(',', $list_categories);
            foreach ($array_categories as $key => $value) {
                $db->table('product_catgory')
                    ->insert([
                        'product_id' => $product['product_id'],
                        'category_id' => $value
                    ]);
            }
            $array_brands = explode(',', $list_brands);
            foreach ($array_brands as $key => $value) {
                $db->table('product_car_brands')
                    ->insert([
                        'product_id' => $product['product_id'],
                        'brand_id' => $value
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

    public function getCategories()
    {
        $categories = $this->getAllCategories();
        return $this->response->setJSON($categories);
    }

    public function create()
    {
        $categories = $this->getAllCategories();
        $brands = $this->getAllBrands();
        return view('admin/products/create', ['categories' => $categories, 'brands' => $brands]);
    }

    public function detail($id)
    {
        $product = $this->model->where('product_id', $id)->first();

        if ($product == null || $product['deleted_at'] != null) {
            return view('errors/404');
        }

        $list_properties = $this->product_option_model->where('product_id', $id)
            ->orderBy('po_id ', 'desc')
            ->where('deleted_at', null)
            ->findAll();

        $gallery = $this->product_image_model->where('product_id', $id)
            ->where('deleted_at', null)
            ->orderBy('image_id', 'desc')
            ->findAll();

        $category_id = $product['category_id'];
        $array_category = explode(',', $category_id);

        $categories = $this->category_model->where('status', 'Y')
            ->whereIn('c_idx', $array_category)
            ->orderBy('c_idx', 'desc')
            ->findAll();

        $category_name = '';
        foreach ($categories as $category) {
            $category_name .= $category['code_name'] . ', ';
        }

        $product['category_name'] = rtrim($category_name, ', ');

        $brand_id = $product['brand_id'];
        $array_brand = explode(',', $brand_id);

        $brands = $this->db->table('car_brands')
            ->where('status', 'Y')
            ->whereIn('c_idx', $array_brand)
            ->orderBy('c_idx', 'desc')
            ->get()
            ->getResultArray();

        $brand_name = '';
        foreach ($brands as $brand) {
            $brand_name .= $brand['code_name'] . ', ';
        }

        $product['brand_name'] = rtrim($brand_name, ', ');

        $categories = $this->getAllCategories();
        $brands = $this->getAllBrands();
        return view('admin/products/detail', [
            'product' => $product,
            'categories' => $categories,
            'brands' => $brands,
            'list_properties' => $list_properties,
            'galleries' => $gallery
        ]);
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

            $list_categories = $data['list_categories'] ?? $product['brand_id'];
            $list_brands = $data['list_brands'] ?? $product['category_id'];

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
                'category_id' => $list_categories,
                'is_show' => $show,
                'sale_date' => $sale_date,
                'sale_end_date' => $sale_end_date,
                'price_on_sale_date' => $price_on_sale_date,
                'is_big_sale' => $big_sale,
                'is_best' => $best,
                'is_new' => $new,
                'pot_id' => $pot_id,
                'brand_id' => $list_brands,
                'pot_name' => $pot_name,
                'short_description' => $short_description,
            ]);

            $db = $this->db;

            $db->table('product_catgory')->where('product_id', $id)->delete();
            $db->table('product_car_brands')->where('product_id', $id)->delete();

            $array_categories = explode(',', $list_categories);
            foreach ($array_categories as $key => $value) {
                $db->table('product_catgory')
                    ->insert([
                        'product_id' => $product['product_id'],
                        'category_id' => $value
                    ]);
            }

            $array_brands = explode(',', $list_brands);
            foreach ($array_brands as $key => $value) {
                $db->table('product_car_brands')
                    ->insert([
                        'product_id' => $product['product_id'],
                        'brand_id' => $value
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

    public function getAllCategories()
    {
        $db = $this->db;
        $categories = $db->table('category')
            ->select('category.*')
            ->where('parent_code_no', 0)
            ->where('status', 'Y')
            ->orderBy('c_idx', 'desc')
            ->get()
            ->getResultArray();

        $categories = array_map(function ($item) use ($db) {
            $cate = (array)$item;

            $cate['children'] = $db->table('category')
                ->where('parent_code_no', $item['code_no'])
                ->get()
                ->getResultArray();

            return $cate;
        }, $categories);

        return $categories;
    }

    public function getAllBrands()
    {
        $db = $this->db;
        $brands = $db->table('car_brands')
            ->select('car_brands.*')
            ->where('parent_code_no', 0)
            ->where('status', 'Y')
            ->orderBy('c_idx', 'desc')
            ->get()
            ->getResultArray();

        $brands = array_map(function ($item) use ($db) {
            $cate = (array)$item;

            $cate['children'] = $db->table('car_brands')
                ->where('parent_code_no', $item['code_no'])
                ->get()
                ->getResultArray();

            return $cate;
        }, $brands);

        return $brands;
    }
}
