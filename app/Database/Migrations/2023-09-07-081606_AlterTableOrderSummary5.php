<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AlterTableOrderSummary5 extends Migration
{
    public function up()
    {
        $db = \Config\Database::connect();
        $sql = "ALTER TABLE `order_summary` 
        add `order_pcs_sum`  INT(8) AFTER `order_price_sum`";
        $db->query($sql);
    }

    public function down()
    {
        //
    }
}
