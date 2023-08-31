<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateTableInformation extends Migration
{
    public function up()
    {
        //
        $db = \Config\Database::connect();
        $sql = "CREATE TABLE `information` (`id` INT NOT NULL AUTO_INCREMENT , `shopname` VARCHAR(100) NULL , `service_charge` DECIMAL(10,2) NOT NULL DEFAULT '0.00' , `discount` DECIMAL(10,2) NOT NULL DEFAULT '0.00' , `discount_mode` INT NOT NULL , `taxstatus` INT NOT NULL , `taxid` VARCHAR(100) NULL , `taxmode` INT NOT NULL , `taxrate` DECIMAL(10,2) NOT NULL DEFAULT '0.00' , `updated_by` TEXT NULL , `created_at` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP , `updated_at` DATETIME NULL DEFAULT NULL , `deleted_at` DATETIME NULL DEFAULT NULL , `companies_id` INT NOT NULL , PRIMARY KEY (`id`)) ENGINE = InnoDB";
        $db->query($sql);
    }

    public function down()
    {
        //
    }
}
