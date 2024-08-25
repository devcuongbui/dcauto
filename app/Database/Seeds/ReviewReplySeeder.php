<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class ReviewReplySeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'review_id'   => 1,
                'product_id'  => 'P001',
                'combo_id'    => 'C001',
                'reply_des'   => 'Thank you for your feedback!',
                'created_at'  => date('Y-m-d H:i:s'),
            ],
            [
                'review_id'   => 2,
                'product_id'  => 'P002',
                'combo_id'    => 'C002',
                'reply_des'   => 'We appreciate your review!',
                'created_at'  => date('Y-m-d H:i:s'),
            ],
        ];

        // Using Query Builder
        $this->db->table('review_reply')->insertBatch($data);
    }
}
