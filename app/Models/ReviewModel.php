<?php

namespace App\Models;

use CodeIgniter\Model;

class ReviewModel extends Model
{
    protected $table = 'review';
    protected $primaryKey = 'review_id';

    protected $allowedFields = [
        'user_name', 'user_id', 'product_id', 'review_type', 'title',
        'review_des', 'post', 'img1', 'file_name1', 'img2', 'file_name2',
        'img3', 'file_name3', 'img4', 'file_name4', 'img5', 'file_name5',
        'star', 'reply', 'created_at', 'updated_at', 'deleted_at', 'phone', 'address'
    ];

    protected $useTimestamps = true;
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';
    protected $deletedField = 'deleted_at';
}
