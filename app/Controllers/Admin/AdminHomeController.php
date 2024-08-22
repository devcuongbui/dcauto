<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class AdminHomeController extends BaseController
{
    private $uploadPath = FCPATH ."uploads/users/";
    protected $userModel;
    public function __construct()
    {
        $this->userModel = model('User');
    }
    public function index()
    {
        return view('admin/dashboard');
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
