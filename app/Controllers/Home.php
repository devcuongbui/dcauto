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
        $s_parent_code_no = $this->request->getGet('s_parent_code_no') ?: 0;
        $categories = $this->category->getCategoriesWithSubcategories($s_parent_code_no);

        $data["categories"] = $categories;
        $data["total"] = count($categories);
        $data["s_parent_code_no"] = $s_parent_code_no;

        return view('index', $data);
    }

}
