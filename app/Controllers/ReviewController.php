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

    public function save()
    {
        $model = new ReviewModel();
        $content = $this->request->getPost('content');
        $name = $this->request->getPost('name');
        $phone = $this->request->getPost('phone');
        $address = $this->request->getPost('address');
        $product_id = $this->request->getPost('product_id');
        $rate = $this->request->getPost('rate');
        $data = [
            'user_name' => $name,
            'user_id' => null,
            'product_id' => $product_id,
            'review_type' => 'product',
            'title' => null,
            'review_des' => $content,
            'post_status' => 'N',
            'phone' => $phone,
            'address' => $address,
            'star' => $rate
        ];
        $model->save($data);
        return $this->response->setJSON(['msg' => 'Cảm ơn bạn đã gửi cảm nhận! \\n Hệ thống sẽ kiểm duyệt đánh giá của bạn và đăng lên sau 24h nếu phù hợp']);
    }
}
