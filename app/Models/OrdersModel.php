<?php

namespace App\Models;

use CodeIgniter\Model;

class OrdersModel extends Model
{
    protected $table = 'orders';
    protected $primaryKey = 'order_id';

    protected $useAutoIncrement = true;

    protected $useSoftDeletes = true;

    protected $allowedFields = [
        'orders_code', 'customer_id', 'order_date', 'total_amount', 'delivery_fee', 
        'total_payment', 'created_at', 'updated_at', 'deleted_at', 'status_id', 
        'status_code', 'order_phone', 'order_email', 'order_basic_address', 
        'order_detail_address', 'pay_method_id', 'shipping_form_id', 'note', 
        'customer_note', 'reciever_name', 'province_id', 'district_id', 
        'commune_id', 'country_id', 'invoice_required', 'company_name', 'tax_number',
        'invoice_address', 'invoice_note', 'bank_type'
    ];

    protected $useTimestamps = false;
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';
    protected $deletedField = 'deleted_at';

    function getOrder($id)
    {
        return $this->where('order_id', $id)->get()->getRowArray();
    }
}
