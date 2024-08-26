<?php

namespace App\Models;

use CodeIgniter\Model;

class ProductCarBrandsModel extends Model
{
    protected $table = 'product_car_brands';
    protected $primaryKey = 'id';

    protected $useAutoIncrement = true;
    protected $allowedFields = [
        'product_id',
        'category_id',
    ];

}
