<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AlterTableOrderSummary extends Migration
{
    public function up()
    {
        $db = \Config\Database::connect();
        $sql_1 = "ALTER TABLE `order_summary` ADD `order_status` varchar(64)  after `order_time`";
        $db->query($sql_1);
    }

    public function down()
    {
        //
    }
}
