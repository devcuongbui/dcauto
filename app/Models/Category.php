<?php

namespace App\Models;

use CodeIgniter\Model;

class Category extends Model
{
    protected $table = 'category';
    protected $primaryKey = 'c_idx';

    protected $useAutoIncrement = true;
    protected $allowedFields = [
        'code_no',
        'code_name',
        'parent_code_no',
        'depth',
        'status',
        'contents',
        'onum',
        'ufile1',
        'rfile1',
        'slug'
    ];

    public function getCategoriesWithSubcategories($parentCodeNo = 0)
    {
        $builder = $this->builder();
        $builder->select('*');
        $builder->orderBy("onum", "desc")->orderBy('c_idx', 'desc');
        $allCategories = $builder->get()->getResultArray();

        $categories = array_filter($allCategories, function($category) use ($parentCodeNo) {
            return $category['parent_code_no'] == $parentCodeNo;
        });

        foreach($categories as &$category) {
            $category['subcategories'] = array_filter($allCategories, function($subcategory) use ($category) {
                return $subcategory['parent_code_no'] == $category['code_no'];
            });
        }

        return $categories;
    }
}
