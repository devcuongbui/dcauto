<?php

namespace App\Models;

use CodeIgniter\Model;

class ProductOptionModel extends Model
{
    protected $table = 'product_options';
    protected $primaryKey = 'po_id';

    protected $useAutoIncrement = true;

    protected $returnType = 'array';
    protected $useSoftDeletes = true;
    protected $protectFields = false; //if true is default

    protected $allowedFields = [
//        'product_id',
//        'pot_id',
//        'po_name',
//        'po_description',
//        'po_value',
//        'po_init_price',
//        'po_image',
//        'po_sell_price',
//        'created_at',
//        'updated_at',
//        'deleted_at'
    ];

    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;
}
