<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateTableTableRunning extends Migration
{
    public function up()
    {
        $db = \Config\Database::connect();
        $sql_stock_running = "CREATE TABLE `table_dynamic_running` (`id` INT NOT NULL AUTO_INCREMENT , `table_code` varchar(64) NULL ,`created_at` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP, PRIMARY KEY (`id`), INDEX (`id`), INDEX (`table_code`)) ENGINE = InnoDB";
        $db->query($sql_stock_running);
    }

    public function down()
    {
        //
    }
}
