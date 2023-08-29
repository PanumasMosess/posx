<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddTableAerarunning extends Migration
{
    public function up()
    {
        $db = \Config\Database::connect();
        $sql_area_running = "CREATE TABLE `area_running` (`id` INT NOT NULL AUTO_INCREMENT , `area_code` varchar(64) NULL ,`created_at` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP  , PRIMARY KEY (`id`), INDEX (`id`), INDEX (`area_code`)) ENGINE = InnoDB";
        $db->query($sql_area_running);
    }

    public function down()
    {
        //
    }
}
