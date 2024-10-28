<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateTablePaymentPackage extends Migration
{
    public function up()
    {
        //
        $db = \Config\Database::connect();
        $sql = "CREATE TABLE `payment_package` (`id` INT NOT NULL AUTO_INCREMENT , `package_id` INT NOT NULL , `payment_type` INT NOT NULL , `payment_month` INT NOT NULL , `payment_amount` DECIMAL(10,2) NOT NULL  , `payment_date` DATE NOT NULL ,`payment_time` TIME NOT NULL , `bank` INT NOT NULL ,  `transfer_money` DECIMAL(10,2) NOT NULL ,  `payment_status` TEXT NULL, `comment` TEXT NULL , `created_by` TEXT NOT NULL , `created_at` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP , `updated_at` DATETIME NULL DEFAULT NULL ,`companies_id` INT NOT NULL, PRIMARY KEY (`id`)) ENGINE = InnoDB";
        $db->query($sql);
    }

    public function down()
    {
        //
    }
}
