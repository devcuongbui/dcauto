<?php

namespace App\Models;

use CodeIgniter\Model;

class ContactModel extends Model
{
    protected $table = 'contact';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'name', 'phone', 'email', 'note', 'created_at' 
    ];

    protected $createdField = 'created_at';
    protected $deletedField = 'deleted_at';
}