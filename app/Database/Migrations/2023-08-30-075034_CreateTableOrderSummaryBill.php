<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateTableOrderSummaryBill extends Migration
{
    public function up()
    {
        $db = \Config\Database::connect();
        $sql_packet_posx = "CREATE TABLE 
        `order_summary` (`id` INT NOT NULL AUTO_INCREMENT ,
        `order_code` TEXT NULL ,
        `order_table_code` TEXT NULL, 
        `order_price_sum` decimal(10,2), 
        `order_service` decimal(10,2), 
        `order_service_type` TEXT NULL, 
        `order_discount` decimal(10,2), 
        `order_discount_type` TEXT NULL, 
        `order_vat`  INT , 
        `order_time` DATETIME NULL , 
        `created_by` TEXT NULL ,  
        `updated_by` TEXT NULL ,
        `created_at` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP , 
        `updated_at` DATETIME NULL , 
        `deleted_at` DATETIME NULL ,
        PRIMARY KEY (`id`), 
        INDEX (`id`))ENGINE = InnoDB";
        $db->query($sql_packet_posx);
    }

    public function down()
    {
        //
    }
}
