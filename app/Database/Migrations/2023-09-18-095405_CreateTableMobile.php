<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateTableMobile extends Migration
{
    public function up()
    {
        //
        $db = \Config\Database::connect();
        $sql = "CREATE TABLE `mobile` (`id` INT NOT NULL AUTO_INCREMENT , `device_id` VARCHAR(100) NOT NULL , `companies_id` INT NOT NULL , `created_by` TEXT NULL , `updated_by` TEXT NULL , `created_at` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP , `updated_at` DATETIME NULL DEFAULT NULL , `deleted_at` DATETIME NULL DEFAULT NULL , PRIMARY KEY (`id`)) ENGINE = InnoDB";
        $db->query($sql);
    }

    public function down()
    {
        //
    }
}