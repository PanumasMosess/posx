<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AlterTableMenuToOrder extends Migration
{
    public function up()
    {
        $db = \Config\Database::connect();
        $sql_stock1 = "ALTER TABLE `menu` RENAME TO `order`";
        $db->query($sql_stock1);

        $db = \Config\Database::connect();
        $sql_stock1 = "ALTER TABLE `menu_running` RENAME TO `order_running`";
        $db->query($sql_stock1);
    }

    public function down()
    {
        //
    }
}
