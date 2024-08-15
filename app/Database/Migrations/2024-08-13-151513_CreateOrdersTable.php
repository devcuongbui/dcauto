<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateOrdersTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'order_id' => [
                'type' => 'INT',
                'auto_increment' => true,
                'unsigned' => true,
            ],
            'orders_code' => [
                'type' => 'VARCHAR',
                'constraint' => '225',
            ],
            'customer_id' => [
                'type' => 'INT',
                'null' => true,
                'unsigned' => true,
            ],
            'order_date' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
            'total_amount' => [
                'type' => 'DECIMAL',
                'constraint' => '10,2',
            ],
            'delivery_fee' => [
                'type' => 'DECIMAL',
                'constraint' => '10,2',
                'null' => true,
            ],
            'total_payment' => [
                'type' => 'DECIMAL',
                'constraint' => '10,2',
                'null' => true,
            ],
            'created_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
            'updated_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
            'deleted_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
            'status_id' => [
                'type' => 'INT',
                'unsigned' => true,
            ],
            'status_code' => [
                'type' => 'VARCHAR',
                'constraint' => '45',
                'null' => true,
            ],
            'order_phone' => [
                'type' => 'VARCHAR',
                'constraint' => '45',
                'null' => true,
            ],
            'order_email' => [
                'type' => 'VARCHAR',
                'constraint' => '45',
                'null' => true,
            ],
            'order_basic_address' => [
                'type' => 'VARCHAR',
                'constraint' => '500',
                'null' => true,
            ],
            'order_detail_address' => [
                'type' => 'VARCHAR',
                'constraint' => '500',
                'null' => true,
            ],
            'pay_method_id' => [
                'type' => 'INT',
                'null' => true,
                'unsigned' => true,
            ],
            'shipping_form_id' => [
                'type' => 'INT',
                'null' => true,
                'unsigned' => true,
            ],
            'note' => [
                'type' => 'TEXT',
                'null' => true,
            ],
            'customer_note' => [
                'type' => 'TEXT',
                'null' => true,
            ],
            'reciever_name' => [
                'type' => 'VARCHAR',
                'constraint' => '225',
                'null' => true,
            ],
            'province_id' => [
                'type' => 'INT',
                'null' => true,
                'unsigned' => true,
            ],
            'district_id' => [
                'type' => 'INT',
                'null' => true,
                'unsigned' => true,
            ],
            'commune_id' => [
                'type' => 'INT',
                'null' => true,
                'unsigned' => true,
            ],
            'country_id' => [
                'type' => 'INT',
                'null' => true,
                'unsigned' => true,
            ],
            'invoice_required' => [
                'type' => 'CHAR',
                'constraint' => '1',
                'null' => true,
            ],
            'company_name' => [
                'type' => 'VARCHAR',
                'constraint' => '1000',
                'null' => true,
            ],
            'tax_number' => [
                'type' => 'VARCHAR',
                'constraint' => '200',
                'null' => true,
            ],
            'invoice_address' => [
                'type' => 'VARCHAR',
                'constraint' => '1000',
                'null' => true,
            ],
            'invoice_note' => [
                'type' => 'VARCHAR',
                'constraint' => '5000',
                'null' => true,
            ],
        ]);

        $this->forge->addKey('order_id', true);

        $this->forge->createTable('orders');
    }

    public function down()
    {
        $this->forge->dropTable('orders');
    }
}
