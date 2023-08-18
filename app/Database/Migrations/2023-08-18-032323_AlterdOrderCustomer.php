<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AlterdOrderCustomer extends Migration
{
    public function up()
    {
        $db = \Config\Database::connect();
        $sql_stock1 = "ALTER TABLE `order_customer` 
        ADD INDEX `order_code` (`order_code`)";
        $db->query($sql_stock1);
    }

    public function down()
    {
        //
    }
}
