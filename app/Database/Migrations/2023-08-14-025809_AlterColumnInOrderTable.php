<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AlterColumnInOrderTable extends Migration
{
    public function up()
    {
        $db = \Config\Database::connect();
        $sql_stock1 = "ALTER TABLE `order` 
         CHANGE COLUMN `menu_code` `order_code` varchar(64),
         CHANGE COLUMN `menu_name` `order_name`TEXT ,
         CHANGE COLUMN `menu_des` `order_des` TEXT,
         CHANGE COLUMN `menu_price` `order_price` decimal(10,2),
         CHANGE COLUMN `menu_pcs` `order_pcs` int(11),
         CHANGE COLUMN `src_menu_picture` `src_order_picture` TEXT";
        $db->query($sql_stock1);

        $sql_stock7 = "ALTER TABLE `order_running` CHANGE COLUMN `menu_code` `order_code` varchar(64)";
        $db->query($sql_stock7);
    }

    public function down()
    {
        //
    }
}
