<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class ErrorController extends BaseController
{
    public function pageNotFound()
    {
        return view('errors/404');
    }

    public function forbidden()
    {
        return view('errors/403');
    }

    public function unauthorized()
    {
        return view('errors/401');
    }
}
