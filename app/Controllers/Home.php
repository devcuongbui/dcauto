<?php

namespace App\Controllers;

class Home extends BaseController
{
    protected $category;
    public function __construct()
    {
        $this->category = model("Category");
        $this->productModel = model("ProductModel");
    }

    public function index()
    {
        $s_parent_code_no = $this->request->getGet('s_parent_code_no') ?: 0;


        $categories = $this->category->getCategoriesWithSubcategories($s_parent_code_no);
        $top_categories = $this->category->getTopCategories(5);
        $topCategoryIds = array_column($top_categories, 'c_idx');
        $products = $this->productModel->getProductsByCategories($topCategoryIds);


        $productsByCategory = [];
        foreach ($categories as $category) {
            $categorySlug = $category['slug'];
            $productsByCategory[$categorySlug] = [];

            foreach ($products as $product) {
                if ($product['category_id'] == $category['c_idx']) {
                    $productsByCategory[$categorySlug][] = $product;
                }
            }
        }


        $data["categories"] = $categories;
        $data["total"] = count($categories);
        $data["productsByCategory"] = $productsByCategory;
        $data["s_parent_code_no"] = $s_parent_code_no;

        return view('index', $data);
    }

    public function intro()
    {
        return view('intro');
    }
}
