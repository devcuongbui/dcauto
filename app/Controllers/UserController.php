<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class UserController extends BaseController
{
    protected $userModel;
    public function __construct()
    {
        $this->userModel = model('User');
    }
    public function index()
    {
        //
    }
    public function change_password()
    {
        $password = $this->request->getPost('password');
        $newPassword = $this->request->getPost('newPassword');
        $reNewPassword = $this->request->getPost('reNewPassword');
        if ($newPassword != $reNewPassword) {
            return $this->response->setStatusCode(ResponseInterface::HTTP_BAD_REQUEST)->setJSON(['result' => false, 'message' => 'Mật khẩu xác nhận không khớp!']);
        }
        $user = $this->userModel->find(session()->get('user.id'));
        if (!password_verify($password, $user['password'])) {
            return $this->response->setStatusCode(ResponseInterface::HTTP_BAD_REQUEST)->setJSON(['result' => false, 'message' => 'Mật khẩu hiện tại không đúng!']);
        }
        $data = [
            'password' => password_hash($newPassword, PASSWORD_DEFAULT)
        ];
        $this->userModel->update(session()->get('user.id'), $data);
        return $this->response->setJSON(['result' => true, 'message' => 'Đổi mật khẩu thành công!']);
    }
}
