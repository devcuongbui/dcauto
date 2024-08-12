<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\User;
use CodeIgniter\HTTP\ResponseInterface;

class AuthController extends BaseController
{
    public function login()
    {
        return view('auth/login');
    }

    public function register()
    {
        return view('auth/register');
    }

    public function handleLogin()
    {
        try {
            $username = $this->request->getPost('username');
            $password = $this->request->getPost('password');

            $model = new User();

            $user = $model->where('username', $username)->first();

            if (!$user) {
                return view('auth/login', ['error' => 'User not found']);
            }

            if (!password_verify($password, $user['password'])) {
                return view('auth/login', ['error' => 'Wrong password']);
            }

            $is_admin = false;
            if ($user['role'] == 'ADMIN') {
                $is_admin = true;
            }
            $user['is_admin'] = $is_admin;
            if ($user['is_admin']) {
                session()->set('user', $user);
                return redirect()->to('/admin/dashboard', );
            } else {
                return view('auth/login', ['error' => 'Login failed']);
            }

        } catch (\Exception $e) {
            return view('auth/login', ['error' => $e->getMessage()]);
        }
    }

    public function handleRegister()
    {

    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/');
    }
}
