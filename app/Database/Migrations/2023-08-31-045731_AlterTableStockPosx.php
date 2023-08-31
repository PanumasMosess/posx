<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AlterTableStockPosx extends Migration
{
    public function up()
    {
        $db = \Config\Database::connect();
        $sql_stock7 = "ALTER TABLE `stock_posx` CHANGE COLUMN `pcs` `pcs` decimal(10,2)";
        $db->query($sql_stock7);
    }

    public function down()
    {
        //
    }
}
