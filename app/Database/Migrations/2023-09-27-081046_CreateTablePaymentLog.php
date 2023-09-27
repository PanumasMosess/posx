<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateTablePaymentLog extends Migration
{
    public function up()
    {
        $db = \Config\Database::connect();
        $sql = "CREATE TABLE `payment_log` (`id` INT NOT NULL AUTO_INCREMENT , 
        `order_customer_code` VARCHAR(64) NOT NULL , 
        `table_code` VARCHAR(64) NOT NULL , 
        `receive_total` decimal(10,2) NOT NULL ,
        `change_total` decimal(10,2) NOT NULL ,
        `credit_card` INT NOT NULL , 
        `entertain` INT NOT NULL , 
        `companies_id` INT NOT NULL , 
        `created_by` TEXT NULL , 
        `updated_by` TEXT NULL , 
        `created_at` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP , 
        `updated_at` DATETIME NULL DEFAULT NULL , 
        `deleted_at` DATETIME NULL DEFAULT NULL , 
        PRIMARY KEY (`id`)) ENGINE = InnoDB";
        $db->query($sql);
    }

    public function down()
    {
        //
    }
}
