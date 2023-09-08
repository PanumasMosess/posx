<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AlterTableOrderSummary3 extends Migration
{
    public function up()
    {
        $db = \Config\Database::connect();
        $sql = "ALTER TABLE `order_summary` 
        CHANGE COLUMN `order_vat` `order_vat` decimal(10,2), 
        CHANGE COLUMN `order_vat_type` `order_vat_type` TEXT NULL";
        $db->query($sql);
    }

    public function down()
    {
        //
    }
}
