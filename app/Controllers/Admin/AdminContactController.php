<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class AdminContactController extends BaseController
{

    public function __construct()
    {
        $this->db = db_connect();
    }

    public function list()
    {
        $sql = " select * from contact order by created_at desc";
        $list = $this->db->query($sql)->getResultArray();

        return view("admin/contact/list", [
            "list" => $list,
        ]);
    }
}
