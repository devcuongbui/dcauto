<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class ReviewSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'user_name' => 'John Doe',
                'user_id' => 1,
                'product_id' => 'P001',
                'review_type' => 'Positive',
                'title' => 'Great Product!',
                'review_des' => 'I really enjoyed using this product. It exceeded my expectations.',
                'post' => 'Y',
                'img1' => 'image1.jpg',
                'file_name1' => 'image1',
                'img2' => 'image2.jpg',
                'file_name2' => 'image2',
                'img3' => 'image3.jpg',
                'file_name3' => 'image3',
                'img4' => 'image4.jpg',
                'file_name4' => 'image4',
                'img5' => 'image5.jpg',
                'file_name5' => 'image5',
                'start' => 1,
                'reply' => 'Thank you for your feedback!',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
        ];

        $this->db->table('review')->insertBatch($data);
    }
}
