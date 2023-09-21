<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AlterTableOrderCustomer1210923 extends Migration
{
    public function up()
    {
        $db = \Config\Database::connect();
        $sql = "ALTER TABLE `order_customer` 
        add `discount_by_order`  decimal(10,2) not null AFTER `order_customer_table_code`";
        $db->query($sql);
    }

    public function down()
    {
        //
    }
}
