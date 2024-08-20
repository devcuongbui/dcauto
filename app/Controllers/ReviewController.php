<?php

namespace App\Controllers;

use App\Models\ReviewModel;

class ReviewController extends BaseController
{
    public function list()
    {
        $model = new ReviewModel();
        $data['reviews'] = $model->findAll();
        return view('reviews_view', $data);
    }

    public function create()
    {
        $model = new ReviewModel();
        $data = [
            'user_name' => 'Jane Doe',
            'user_id' => 2,
            'product_id' => 'P002',
            'review_type' => 'Neutral',
            'title' => 'Okay Product',
            'review_des' => 'The product was okay, but it didn’t meet my expectations.',
            'post' => 'Y',
            'img1' => 'image6.jpg',
            'file_name1' => 'image6',
            'start' => 0,
            'reply' => 'We appreciate your feedback.',
        ];
        $model->save($data);
        return "OK";
    }
}
