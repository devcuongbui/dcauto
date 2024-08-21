<?php

namespace App\Controllers;

class CategoryController extends BaseController
{
    protected $category;

    private $uploadPath = FCPATH ."public/uploads/category/";

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
        $builder = $builder = $this->category->builder();
        $builder->select('c1.*, COUNT(DISTINCT c2.code_no) AS cnt');
        $builder->from('category AS c1');
        $builder->join('category AS c2', 'c1.code_no = c2.parent_code_no', 'left');
        $builder->where('c1.parent_code_no', $s_parent_code_no);
        
        $builder->groupBy('c1.code_no');
        $builder->orderBy("onum", "desc")
                ->orderBy('c_idx', 'desc');
        $query = $builder->get();
        $data["categories"] = $query->getResultArray();
        $data["total"] = count($data["categories"]);
        $data["s_parent_code_no"] = $s_parent_code_no;     
        return view('admin/category/list', $data);
    }
    
    public function change_order()
    {
        $c_idx = $this->request->getPost("c_idx");
        $onum = $this->request->getPost("onum");
        if(is_array($c_idx)){
            for($i = 0; $i < count($c_idx); $i++) {
                $result = $this->category->update($c_idx[$i], ["onum" => $onum[$i]]);
            }
            if($result) {
                $resultArr['result'] = true;
                $resultArr['message'] = "Thay đổi thứ tự thành công!";
            }else{
                $resultArr['result'] = false;
                $resultArr['message'] = "Thay đổi thứ tự thất bại!";
            }
        }
        return $this->response->setJSON($resultArr);
    }

    public function categoryHome()
    {
        $s_parent_code_no = $this->request->getGet('s_parent_code_no');
        if(empty($s_parent_code_no)){
            $s_parent_code_no = 0;
        }
        $builder = $builder = $this->category->builder();
        $builder->select('c1.*, COUNT(DISTINCT c2.code_no) AS cnt');
        $builder->from('category AS c1');
        $builder->join('category AS c2', 'c1.code_no = c2.parent_code_no', 'left');
        $builder->where('c1.parent_code_no', $s_parent_code_no);

        $builder->groupBy('c1.code_no');
        $builder->orderBy("onum", "desc")
            ->orderBy('c_idx', 'desc');
        $query = $builder->get();
        $data["categories"] = $query->getResultArray();
        $data["total"] = count($data["categories"]);
        $data["s_parent_code_no"] = $s_parent_code_no;
        return view('index', $data);
    }

    public function write()
    {
        $s_parent_code_no = $this->request->getGet('s_parent_code_no');
        $c_idx = $this->request->getGet('c_idx');
        if(empty($s_parent_code_no)){
            $s_parent_code_no = 0;
        }

        if(!empty($c_idx)){
            $record = $this->category->where('c_idx', $c_idx)->first();
            $data["c_idx"] = $c_idx;
            $data["depth"] = $record["depth"];
            $data["code_no"] = $record["code_no"];
            $data["code_name"] = $record["code_name"];
            $data["status"] = $record["status"];
            $data["contents"] = $record["contents"];
            $data["onum"] = $record["onum"];
            $data["ufile1"] = $record["ufile1"];
            $data["rfile1"] = $record["rfile1"];
            $data["s_parent_code_no"] = $s_parent_code_no;
        }else {
            $row_category = $this->category->where('code_no', $s_parent_code_no)->findAll();
            $dp = $row_category[0]["depth"] ?? 0;
            $depth = $dp + 1;
            $query = $this->category->select('IFNULL(MAX(code_no), "' . $s_parent_code_no . '00") + 1 AS code_no')
                                    ->where('parent_code_no', $s_parent_code_no)->get();
            $row = $query->getRow();
            $code_no = $row->code_no;    
            $data["c_idx"] = "";
            $data["code_name"] = "";
            $data["status"] = "";
            $data["contents"] = "";
            $data["depth"] = $depth;
            $data["code_no"] = $code_no;
            $data["onum"] = 0;
            $data["ufile1"] = "";
            $data["rfile1"] = "";
            $data["s_parent_code_no"] = $s_parent_code_no;
        }

        return view('admin/category/write', $data);
    }

    public function save()
    {
        $s_parent_code_no = $this->request->getPost("parent_code_no");
        $c_idx = $this->request->getPost("c_idx");
        $data = $this->request->getPost();
        $del_img = $this->request->getPost("del_img");
        $file = $this->request->getFile('ufile1');

        $uploadPath = $this->uploadPath;
        if(!is_dir($uploadPath)){
            mkdir($uploadPath, 0755, true);
        }

        if(!empty($c_idx)){
            $result = $this->category->update($c_idx, $data);
            $category = $this->category->find($c_idx);
            if(!empty($del_img) && $del_img == 'Y'){
                if($category["ufile1"]){
                    $filePath = $uploadPath . $category["ufile1"];
                    if(file_exists($filePath)){
                        unlink($filePath);
                    }
                    $this->category->update($c_idx, [
                        "ufile1" => "",
                        "rfile1" => ""
                    ]);
                }
            }

            if($file->isValid() && !$file->hasMoved()){
                if($category["ufile1"]){
                    $filePath = $uploadPath . $category["ufile1"];
                    if(file_exists($filePath)){
                        unlink($filePath);
                    }
                }
                $newName = $file->getRandomName();
                $oldName = $file->getClientName();
                if($newName){
                    $file->move($uploadPath, $newName);
                }
                $data_file = [
                    "ufile1" => $newName,
                    "rfile1" => $oldName
                ];
                $this->category->update($c_idx, $data_file);
            }

            if($result) {
                $resultArr['result'] = true;
                $resultArr['message'] = "Cập nhật thành công!";
            }else{
                $resultArr['result'] = false;
                $resultArr['message'] = "Cập nhật thất bại!";
            }
            $resultArr['c_idx'] = $c_idx;
        }else{
            $id = $this->category->insert($data);

            if($file->isValid() && !$file->hasMoved()){
                $newName = $file->getRandomName();
                $oldName = $file->getClientName();
                if($newName){
                    $file->move($uploadPath, $newName);
                }
                $data_file = [
                    "ufile1" => $newName,
                    "rfile1" => $oldName
                ];
                $this->category->update($id, $data_file);
            }

            if($id) {
                $resultArr['result'] = true;
                $resultArr['message'] = "Thêm mới thành công!";
            }else{
                $resultArr['result'] = false;
                $resultArr['message'] = "Thêm mới thất bại!";
            }
        }

        $resultArr['parent_code'] = $s_parent_code_no;
        return $this->response->setJSON($resultArr);
    }
}
