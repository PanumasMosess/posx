<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AlterTableStockUnit extends Migration
{
    public function up()
    {
        //
        $db = \Config\Database::connect();
        $sql = "ALTER TABLE `stock_posx` CHANGE `group_id` `stock_unit` VARCHAR(255) NULL DEFAULT NULL";
        $db->query($sql);
    }

    public function down()
    {
        //
    }
}
