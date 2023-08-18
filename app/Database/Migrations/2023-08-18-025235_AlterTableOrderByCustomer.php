<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AlterTableOrderByCustomer extends Migration
{
    public function up()
    {
        $db = \Config\Database::connect();
        $sql_stock1 = "ALTER TABLE `order_customer` 
         CHANGE COLUMN `order_customer_name` `order_customer_ordername` varchar(64)";
        $db->query($sql_stock1);
    }

    public function down()
    {
        //
    }
}
