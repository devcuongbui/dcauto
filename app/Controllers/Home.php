<?php

namespace App\Controllers;

class Home extends BaseController
{
    protected $category;
    public function __construct()
    {
        $this->category = model("Category");
    }

    public function index()
    {
        $s_parent_code_no = $this->request->getGet('s_parent_code_no');
        if(empty($s_parent_code_no)){
            $s_parent_code_no = 0;
        }

        // Fetch all categories
        $builder = $this->category->builder();
        $builder->select('*');
        $builder->orderBy("onum", "desc")->orderBy('c_idx', 'desc');
        $allCategories = $builder->get()->getResultArray();

        // Filter parent categories
        $categories = array_filter($allCategories, function($category) use ($s_parent_code_no) {
            return $category['parent_code_no'] == $s_parent_code_no;
        });

        // Add subcategories to each parent category
        foreach($categories as &$category) {
            $category['subcategories'] = array_filter($allCategories, function($subcategory) use ($category) {
                return $subcategory['parent_code_no'] == $category['code_no'];
            });
        }

        $data["categories"] = $categories;
        $data["total"] = count($categories);
        $data["s_parent_code_no"] = $s_parent_code_no;
        return view('index', $data);
    }

}
