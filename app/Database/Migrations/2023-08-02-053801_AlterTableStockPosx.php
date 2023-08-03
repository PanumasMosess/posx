<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AlterTableStockPosx extends Migration
{
    public function up()
    {
        $db = \Config\Database::connect();
        $sql_stock1 = "ALTER TABLE `stock_posx` ADD `supplier_id` TEXT NULL AFTER `status_stock`";
        $db->query($sql_stock1);

        $sql_stock2 = "ALTER TABLE `stock_posx` ADD `barcode` TEXT NULL AFTER `supplier_id`";
        $db->query($sql_stock2);
    }

    public function down()
    {
        //
    }
}
