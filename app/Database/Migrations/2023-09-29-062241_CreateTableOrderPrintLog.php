<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateTableOrderPrintLog extends Migration
{
    public function up()
    {
        $db = \Config\Database::connect();
        $sql = "CREATE TABLE `order_print_log` (`id` INT NOT NULL AUTO_INCREMENT , 
        `order_customer_code` VARCHAR(64) NOT NULL , 
        `order_code` VARCHAR(64) NOT NULL , 
        `order_table_code` VARCHAR(64) NOT NULL ,   
        `order_customer_ordername` TEXT NULL ,
        `order_customer_pcs` TEXT NULL ,
        `order_print_status` TEXT NULL ,
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
