<?php

namespace App\Models;

use CodeIgniter\Model;

class Category extends Model
{
    protected $table = 'category';
    protected $primaryKey = 'c_idx';

    protected $useAutoIncrement = true;
    protected $allowedFields = [
        'code_no',
        'code_name',
        'parent_code_no',
        'depth',
        'status',
        'contents',
        'onum',
        'slug'
    ];
}
