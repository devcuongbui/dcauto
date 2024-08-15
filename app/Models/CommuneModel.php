<?php

namespace App\Models;

use CodeIgniter\Model;

class CommuneModel extends Model
{
    protected $table = 'commune';
    protected $primaryKey = 'commune_id';
    protected $allowedFields = [
        'commune_name', 'commune_code', 'district_id', 'created_at', 'updated_at', 'deleted_at'
    ];
    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';
}
