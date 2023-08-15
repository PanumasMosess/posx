<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AlterColumnInStockFomular extends Migration
{
    public function up()
    {
        $db = \Config\Database::connect();
        $sql_stock1 = "ALTER TABLE `stock_formula` 
         CHANGE COLUMN `menu_code` `order_code` varchar(64)";
        $db->query($sql_stock1);

        $sql_stock7 = "ALTER TABLE `stock_formula_temp` CHANGE COLUMN `menu_code` `order_code` varchar(64)";
        $db->query($sql_stock7);
    }

    public function down()
    {
        //
    }
}
