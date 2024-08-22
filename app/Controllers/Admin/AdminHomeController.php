<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class AdminHomeController extends BaseController
{
    public function index()
    {
        return view('admin/dashboard');
    }
    public function users_profile()
    {
        return view('admin/account/users_profile');
    }
}
