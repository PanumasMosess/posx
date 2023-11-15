<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreartTablePosxTVSetting extends Migration
{
    public function up()
    {
        //
        $db = \Config\Database::connect();
        $sql = "CREATE TABLE `posx_tv_setting` (`id` INT NOT NULL AUTO_INCREMENT , `tv_time` VARCHAR(20) NOT NULL , `companies_id` INT NOT NULL , `created_by` TEXT NULL , `updated_by` TEXT NULL , `created_at` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP , `updated_at` DATETIME NULL DEFAULT NULL , PRIMARY KEY (`id`)) ENGINE = InnoDB;";
        $db->query($sql);
    }

    public function down()
    {
        //
    }
}
