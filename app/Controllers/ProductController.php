<?php

namespace App\Controllers;

class ProductController extends BaseController
{
    private $session;
    protected $productModel;
    protected $productOptionModel;
    protected $reviewModel;
    protected $product_image_model;
    public function __construct()
    {
        $this->session = session();
        $this->productModel = model("ProductModel");
        $this->category = model("Category");
        $this->brands = model("CarBrands");
        $this->productOptionModel =  model("ProductOptionModel");
        $this->reviewModel = model("ReviewModel");
        $this->product_image_model = model("ProductImages");
    }

    public function brand($category_slug = null)
    {
        $s_parent_code_no = $this->request->getGet('s_parent_code_no') ?: 0;
        $categories = $this->brands->getCategoriesWithSubcategories($s_parent_code_no);

        if (!$category_slug) {
            return view('errors/404');
        }

        $category = $this->brands->where('slug', $category_slug)->first();
        if (!$category) {
            return view('errors/404');
        }

        $productsByCategory = [];

        if ($category['parent_code_no'] == 0) {
            $childCategories = $this->brands->where('parent_code_no', $category['c_idx'])->findAll();

            $childCategories[] = $category;

            foreach ($childCategories as $childCategory) {
                $productsByCategory[$childCategory['slug']] = $this->productModel
                    ->where('category_id', $childCategory['c_idx'])
                    ->findAll();
            }
        } else {
            $productsByCategory[$category['slug']] = $this->productModel
                ->where('category_id', $category['c_idx'])
                ->findAll();
        }

        return view('product/brand', [
            'productsByCategory' => $productsByCategory,
            'category' => $category,
            'categories' => $categories,
            'total' => count($categories),
            's_parent_code_no' => $s_parent_code_no
        ]);
    }

    public function type($category_slug = null)
    {
        return view('product/type');
    }

    public function list()
    {
        // Load the product model
        $this->productModel = model('ProductModel');

        // Get the keyword from query parameters
        $keyword = $this->request->getGet('key');
        $slug = $keyword ? $this->convertToSlug($keyword) : '';

        // If slug is empty, fetch all products with a limit
        if (empty($slug)) {
            $products = $this->productModel->limit(20)->findAll();
        } else {
            // Search for products by keyword in the slug field
            $products = $this->productModel->like('slug', $slug)->findAll();
        }

        return view('product/list', ['products' => $products]);
    }

    public function view($slug = null) {
        if (!$slug) {
            return view('errors/404');
        }
        $cart = $this->session->get('cart') ?? ['items' => []];
        $product = $this->productModel->where('slug', $slug)->first();
        if (!$product) {
            return view('errors/404');
        }

        $productOptions = $this->productOptionModel->where('product_id', $product['product_id'])->findAll();
        $product['options'] = $productOptions;
        $product['relatedProducts'] = $this->productModel->where('category_id', $product['category_id'])
            ->where('slug !=', $slug)
            ->findAll();
        $reviewList = $this->reviewModel->where('product_id', $product['product_id'])->findAll();
        $gallery = $this->product_image_model->where('product_id', $product['product_id'])
            ->where('deleted_at', null)
            ->orderBy('image_id', 'desc')
            ->findAll();
        $isAddedToCart = false;
        foreach ($cart['items'] as $item) {
            if ($item['product_id'] == $product['product_id']) {
                $isAddedToCart = true;
                break;
            }
        }

        return view('product/view', [
            'product' => $product, 
            'reviewList' => $reviewList, 
            'galleries' => $gallery,
            'isAddedToCart' => $isAddedToCart]);
    }

    public function getOneById($id = null)
    {
        $product = $this->productModel->find($id);

        if (!$product) {
            return $this->response->setJSON(['message' => 'Không tìm thấy sản phẩm'])->setStatusCode(404);
        }

        $productOptions = $this->productOptionModel->where('product_id', $id)->findAll();
        $product['options'] = $productOptions;

        return $this->response->setJSON($product);
    }
    public function getOneByOption($id = null, $optionId = null)
    {
        $product = $this->productModel->find($id);

        if (!$product) {
            return $this->response->setJSON(['message' => 'Không tìm thấy sản phẩm'])->setStatusCode(404);
        }

        $productOption = $this->productOptionModel->where(['product_id' => $id, 'option_id' => $optionId])->get()->getRowArray();
        $product['option'] = $productOption;

        return $this->response->setJSON($product);
    }

    private function convertToSlug($text)
    {
        return strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $text)));
    }
}
