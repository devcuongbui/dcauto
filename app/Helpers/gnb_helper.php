<?php

if (!function_exists('get_category')) {
    function get_category($parentCodeNo){
        $Category = model("Category");
        try {
            $category_arr = $Category->where("parent_code_no", $parentCodeNo)->findAll();
            if(!$category_arr){
                throw new Exception("");
            }
            $resultArr = $category_arr;
        } catch (Exception $err) {
            $resultArr = [];
        } finally {
            return $resultArr;
        }
    }
}