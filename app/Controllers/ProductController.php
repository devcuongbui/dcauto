<?php

namespace App\Controllers;

class ProductController extends BaseController
{
    private $session;
    protected $productModel;
    protected $productOptionModel;
    protected $reviewModel;
    public function __construct()
    {
        $this->session = session();
        $this->productModel = model("ProductModel");
        $this->category = model("Category");
        $this->productOptionModel =  model("ProductOptionModel");
        $this->reviewModel = model("ReviewModel");
    }

    public function index($category_slug = null)
    {
        // Fetch categories for the layout
        $s_parent_code_no = $this->request->getGet('s_parent_code_no') ?: 0;
        $categories = $this->category->getCategoriesWithSubcategories($s_parent_code_no);

        // Check if a category slug is provided
        if (!$category_slug) {
            return view('errors/404');
        }

        // Find the category by slug
        $category = $this->category->where('slug', $category_slug)->first();
        if (!$category) {
            return view('errors/404');
        }

        // Fetch products based on whether the category is a parent or child
        if ($category['parent_code_no'] == 0) {
            // If the category is a parent category, get products from this category and its child categories
            $childCategories = $this->category->where('parent_code_no', $category['code_no'])->findAll();
            $childCategoryIds = array_column($childCategories, 'code_no');
            $childCategoryIds[] = $category['code_no']; // Include the parent category itself

            $products = $this->productModel->whereIn('category_id', $childCategoryIds)->findAll();
        } else {
            // If the category is a child category, get products from this category only
            $products = $this->productModel->where('category_id', $category['code_no'])->findAll();
        }

        // Pass the categories and products to the view
        return view('product/index', [
            'products' => $products,
            'category' => $category,
            'categories' => $categories,
            'total' => count($categories),
            's_parent_code_no' => $s_parent_code_no
        ]);
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

        // Find the product by slug
        $product = $this->productModel->where('slug', $slug)->first();
        if (!$product) {
            return view('errors/404');
        }

        // Fetch product options and related products
        $productOptions = $this->productOptionModel->where('product_id', $product['product_id'])->findAll();
        $product['options'] = $productOptions;
        $product['relatedProducts'] = $this->productModel->where('category_id', $product['category_id'])
            ->where('slug !=', $slug) // Exclude the current product
            ->findAll();
        $reviewList = $this->reviewModel->where('product_id', $product['product_id'])->findAll();

        return view('product/view', ['product' => $product, 'reviewList' => $reviewList]);
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
