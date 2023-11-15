<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AlterTableOrderCustomer2210923 extends Migration
{
    public function up()
    {
        $db = \Config\Database::connect();
        $sql = "ALTER TABLE `order_customer` 
        add `discount_type_by_order` TEXT null AFTER `order_customer_table_code`";
        $db->query($sql);
    }

    public function down()
    {
        //
    }
}
