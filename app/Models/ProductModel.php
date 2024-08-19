<?php

namespace App\Models;

use CodeIgniter\Model;

class ProductModel extends Model
{
    protected $table = 'products';
    protected $primaryKey = 'product_id';

    protected $useAutoIncrement = true;

    protected $returnType = 'array';
    protected $useSoftDeletes = true;
    protected $protectFields = false; //if true is default

    protected $allowedFields = [
        'product_name',
        'product_code',
        'description',
        'init_price',
        'sell_price',
        'quantity',
        'product_image',
        'category_id',
        'created_at',
        'updated_at',
        'deleted_at',
        'sale_date',
        'sale_end_date',
        'price_on_sale_date',
        'is_big_sale',
        'is_best',
        'is_new',
        'pot_id',
        'brand_id',
        'slug'
    ];

    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;
}
