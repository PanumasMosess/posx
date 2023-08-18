<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AlterTableOrderAndOrderCustomer extends Migration
{
    public function up()
    {
        $db = \Config\Database::connect();
        $sql_stock1 = "ALTER TABLE `order_customer` 
         ADD `order_customer_status` TEXT NULL AFTER `order_customer_pcs`, ADD  `order_code` VARCHAR(64) NULL AFTER `order_customer_pcs`";
        $db->query($sql_stock1);

        $db = \Config\Database::connect();
        $sql_stock2 = "ALTER TABLE `order` 
         ADD `order_status` TEXT NULL AFTER `order_pcs`";
        $db->query($sql_stock2);
    }

    public function down()
    {
        //
    }
}
