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
        $data["s_parent_code_no"] = $s_parent_code_no;     
        return view('admin/category/list', $data);
    }

    public function write()
    {
        $s_parent_code_no = $this->request->getGet('s_parent_code_no');
        $c_idx = $this->request->getGet('c_idx');
        if(empty($s_parent_code_no)){
            $s_parent_code_no = 0;
        }

        if(!empty($c_idx)){
            $data["category"] = $this->category->where('c_idx', $c_idx)->findAll();
        }else {
            $row_category = $this->category->where('code_no', $s_parent_code_no)->findAll();
            $dp = $row_category[0]["depth"] ?? 0;
            $depth = $dp + 1;
            $query = $this->category->select('IFNULL(MAX(code_no), "' . $s_parent_code_no . '00") + 1 AS code_no')
                                    ->where('parent_code_no', $s_parent_code_no)->get();
            $row = $query->getRow();
            $code_no = $row->code_no;                      
            $data["depth"] = $depth;
            $data["code_no"] = $code_no;
            $data["s_parent_code_no"] = $s_parent_code_no;
        }

        return view('admin/category/write', $data);
    }

    public function save()
    {
        $s_parent_code_no = $this->request->getPost("parent_code_no");
        $data = $this->request->getPost();
        $this->category->insert($data);

        $resultArr['result'] = true;
        $resultArr['message'] = "Thêm mới thành công";
        $resultArr['parent_code'] = $s_parent_code_no;
        return $this->response->setJSON($resultArr);
    }
}
