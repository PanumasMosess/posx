<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateTableEmailReport extends Migration
{
    public function up()
    {
        //
        $db = \Config\Database::connect();
        $sql = "CREATE TABLE `email_report` (`id` INT NOT NULL AUTO_INCREMENT , `email` TEXT NOT NULL , `created_by` TEXT NULL DEFAULT NULL , `deleted_by` TEXT NULL DEFAULT NULL , `created_at` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP , `updated_at` DATETIME NULL DEFAULT NULL , `deleted_at` DATETIME NULL DEFAULT NULL , `companies_id` INT NULL DEFAULT NULL , PRIMARY KEY (`id`)) ENGINE = InnoDB";
        $db->query($sql);
    }

    public function down()
    {
        //
    }
}
