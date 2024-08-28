<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class AdminHomeController extends BaseController
{
    private $uploadPath = FCPATH ."uploads/users/";
    protected $userModel;
    protected $orderModel;
    public function __construct()
    {
        $this->userModel = model('User');
        $this->orderModel = model('OrdersModel');
    }
    public function index()
    {
        $orders = $this->orderModel
        ->select('order_id, order_date, total_payment, customer_id, status_id, status_code')
        ->where('status_id', '4')
        ->findAll();
        $yesterdayData = $this->orderModel
        ->select('order_id, order_date, total_payment, customer_id, status_id, status_code')
        ->where('status_id', '4')
        ->where('order_date', date('Y-m-d', strtotime('-1 days')))
        ->findAll();
        $todayData = $this->orderModel
        ->select('order_id, order_date, total_payment, customer_id, status_id, status_code')
        ->where('status_id', '4')
        ->where('order_date', date('Y-m-d'))
        ->findAll();
        $lastMonthData = $this->orderModel
        ->select('order_id, order_date, total_payment, customer_id, status_id, status_code')
        ->where('status_id', '4')
        ->where('order_date', date('Y-m', strtotime('-1 month')))
        ->findAll();
        $thisMonthData = $this->orderModel
        ->select('order_id, order_date, total_payment, customer_id, status_id, status_code')
        ->where('status_id', '4')
        ->where('order_date', date('Y-m'))
        ->findAll();
        $yesterdayOrderCnt = count($yesterdayData);
        $todayOrderCnt = count($todayData);
        $increateOrderCnt = $todayOrderCnt - $yesterdayOrderCnt;
        $increaseOrderPercent = $todayOrderCnt == 0 ? 0 : round($increateOrderCnt / $yesterdayOrderCnt * 100, 2);
        $lastMonthOrderCnt = count($lastMonthData);
        $thisMonthOrderCnt = count($thisMonthData);
        $lastMonthOrderMoney = 0;
        $thisMonthOrderMoney = 0;
        foreach ($lastMonthData as $key => $value) {
            $lastMonthOrderMoney += $value['total_payment'];
        }
        foreach ($thisMonthData as $key => $value) {
            $thisMonthOrderMoney += $value['total_payment'];
        }
        $monthDataIncreasePercent = $lastMonthOrderCnt == 0 ? 0 : round($thisMonthOrderCnt / $lastMonthOrderCnt * 100, 2);
        return view('admin/dashboard', [
            'todayOrderCnt' => $todayOrderCnt,
            'increaseOrderPercent' => $increaseOrderPercent,
            'thisMonthOrderMoney' => $thisMonthOrderMoney,
            'monthDataIncreasePercent' => $monthDataIncreasePercent
        ]);
    }
    public function users_profile()
    {
        $data['user'] = $this->userModel->find(session()->get('user.id'));
        return view('admin/account/users_profile', $data);
    }
    public function users_profile_update()
    {
        $file = $this->request->getFile('avatar');
        if ($file && $file->isValid() && !$file->hasMoved()) {
            $uploadPath = $this->uploadPath;
            if(!is_dir($uploadPath)){
                mkdir($uploadPath, 0755, true);
            }
            $newName = $file->getRandomName();
            $file->move($uploadPath, $newName);
            $data = [
                'avatar' => $newName
            ];
            $this->userModel->update(session()->get('user.id'), $data);
        }
        $fullName = $this->request->getPost('full_name');
        $email = $this->request->getPost('email');
        $phone = $this->request->getPost('phone');
        $data = [
            'full_name' => $fullName,
            'email' => $email,
            'phone' => $phone
        ];
        $this->userModel->update(session()->get('user.id'), $data);
        return $this->response->setJSON(['result' => true, 'message' => 'Cập nhật thành công!']);
    }
}
