<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AlterTableOrderSummary2 extends Migration
{
    public function up()
    {
        $db = \Config\Database::connect();
        $sql_stock7 = "ALTER TABLE `order_summary` CHANGE COLUMN `order_code` `order_code` varchar(64)";
        $db->query($sql_stock7);

        $sql_stock8 = "ALTER TABLE `order_summary` CHANGE COLUMN `order_table_code` `order_table_code` varchar(64)";
        $db->query($sql_stock8);

        $sql_stock9 = "ALTER TABLE `order_summary` ADD INDEX `order_code` (`order_code`), ADD INDEX `order_table_code` (`order_table_code`)";
        $db->query($sql_stock9);
      
    }

    public function down()
    {
        //
    }
}
