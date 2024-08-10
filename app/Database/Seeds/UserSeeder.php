<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'username' => 'admin',
                'email'    => 'admin@example.com',
                'password' => password_hash('123456', PASSWORD_DEFAULT),
                'role'     => 'ADMIN',
            ],
            [
                'username' => 'user',
                'email'    => 'user@example.com',
                'password' => password_hash('123456', PASSWORD_DEFAULT),
                'role'     => 'USER',
            ],
        ];

        // Chèn dữ liệu vào bảng 'users'
        $this->db->table('users')->insertBatch($data);
    }
}
