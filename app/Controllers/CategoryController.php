<?php

namespace App\Controllers;

class CategoryController extends BaseController
{
    protected $category;

    public function __construct()
    {
        $this->category = model("Category");
    }
    public function list()
    {
        $s_parent_code_no = $this->request->getGet('s_parent_code_no');
        if(empty($s_parent_code_no)){
            $s_parent_code_no = 0;
        }
        
        $data["categories"] = $this->category->where('parent_code_no', $s_parent_code_no)
                                            ->orderBy("onum", "desc")
                                            ->orderBy('c_idx', 'desc')
                                            ->findAll();
        $data["total"] = count($data["categories"]);     
        return view('admin/category/list', $data);
    }
}
