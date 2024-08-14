<?php

namespace App\Controllers;
use App\Models\ContactModel;
class ContactController extends BaseController
{

    public function __construct()
    {
        $this->db = db_connect();
        $this->Contact = model("ContactModel");
    }

    public function index() {
        return view('contact/index');
    }

    public function save()
    {
        $session = session();
        $model = new ContactModel();

        $name = $this->request->getPost('name');
        $phone = $this->request->getPost('phone');
        $email = $this->request->getPost('email');
        $note = $this->request->getPost('note');

        $data = [
            'name'     => $name,
            'phone'    => $phone,
            'email'    => $email,
            'note'     => $note,
            'created_at'     => date('Y-m-d H:i:s'),
        ];

        $data['r_date'] = date('Y-m-d H:i:s');
        $model->insert($data);

        return redirect()->to('/contact/index')->with('message', 'Đăng ký thành công.');
    }

}