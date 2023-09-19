<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AlterTableOrderCustomerSummary1 extends Migration
{
    public function up()
    {
        
        $db = \Config\Database::connect();
        $sql = "ALTER TABLE `order_summary` 
        CHANGE COLUMN `order_code` `order_customer_code` varchar(64) NULL";
        $db->query($sql);
    }

    public function down()
    {
        //
    }
}
