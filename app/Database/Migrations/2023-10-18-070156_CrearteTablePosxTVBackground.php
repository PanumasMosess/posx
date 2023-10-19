<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CrearteTablePosxTVBackground extends Migration
{
    public function up()
    {
        //
        $db = \Config\Database::connect();
        $sql = "CREATE TABLE `posx_tv_background` (`id` INT NOT NULL AUTO_INCREMENT , `companies_id` INT NOT NULL , `picture_src` MEDIUMTEXT NULL , `created_by` TEXT NULL , `picture_created_at` DATETIME NULL , PRIMARY KEY (`id`)) ENGINE = InnoDB";
        $db->query($sql);
    }

    public function down()
    {
        //
    }
}
