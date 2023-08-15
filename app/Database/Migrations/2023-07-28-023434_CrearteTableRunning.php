<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CrearteTableRunning extends Migration
{
    public function up()
    {
        $db = \Config\Database::connect();
        $sql_stock_running = "CREATE TABLE `stock_running` (`id` INT NOT NULL AUTO_INCREMENT , `stock_code` varchar(64) NULL ,`created_at` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP, PRIMARY KEY (`id`), INDEX (`id`), INDEX (`stock_code`)) ENGINE = InnoDB";
        $db->query($sql_stock_running);

        $sql_menu_running = "CREATE TABLE `menu_running` (`id` INT NOT NULL AUTO_INCREMENT , `menu_code` varchar(64) NULL ,`created_at` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP  , PRIMARY KEY (`id`), INDEX (`id`), INDEX (`menu_code`)) ENGINE = InnoDB";
        $db->query($sql_menu_running);
    }

    public function down()
    {
        //
    }
}
