<?php

namespace App\Models;

use CodeIgniter\Model;

class ContactModel extends Model
{
    protected $table = 'contact';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'name', 'phone', 'email', 'note', 'type', 'created_at', 'deleted_at' 
    ];

}