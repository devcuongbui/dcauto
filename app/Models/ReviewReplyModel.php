<?php

namespace App\Models;

use CodeIgniter\Model;

class ReviewReplyModel extends Model
{
    protected $table      = 'review_reply';
    protected $primaryKey = 'reply_id';

    protected $useSoftDeletes = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    protected $allowedFields = [
        'review_id', 
        'product_id', 
        'combo_id', 
        'reply_des',
    ];
    function insertOrUpdate($data) {
        $reply = $this->where('review_id', $data['review_id'])->first();
        if ($reply) {
            $data['updated_at'] = date('Y-m-d H:i:s');
            $this->update($reply['reply_id'], $data);
        } else {
            $data['created_at'] = date('Y-m-d H:i:s');
            $this->insert($data);
        }
    }
}
