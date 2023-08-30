<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddTableOrderCustomer extends Migration
{
    public function up()
    {
        $db = \Config\Database::connect();
        $sql_1 = "ALTER TABLE `order_customer` ADD `order_customer_table_code` varchar(64)  after `order_customer`, 
        ADD INDEX `order_customer_table_code` (`order_customer_table_code`)";
        $db->query($sql_1);

    }

    public function down()
    {
        //
    }
}
