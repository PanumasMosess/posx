<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateTableOrderByCustomer extends Migration
{
    public function up()
    {
        $db = \Config\Database::connect();
        $sql_order_customer_posx = "CREATE TABLE `order_customer` (`id` INT NOT NULL AUTO_INCREMENT , `order_customer_code` varchar(64) NULL , `order_customer_name` TEXT NULL ,`order_customer_des` TEXT NULL,`order_customer_price` decimal(10,2) NOT NULL DEFAULT 0.00 , `order_customer_pcs` INT NOT NULL DEFAULT 0, `order_customer` TEXT NULL, `created_by` TEXT NULL , `updated_by` TEXT NULL ,`created_at` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP , `updated_at` DATETIME NULL , `deleted_at` DATETIME NULL , PRIMARY KEY (`id`), INDEX (`id`), INDEX (`order_customer_code`)) ENGINE = InnoDB";
        $db->query($sql_order_customer_posx);

        $sql_menu_running = "CREATE TABLE `order_customer_running` (`id` INT NOT NULL AUTO_INCREMENT , `order_customer_code` varchar(64) NULL ,`created_at` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP  , PRIMARY KEY (`id`), INDEX (`id`), INDEX (`order_customer_code`)) ENGINE = InnoDB";
        $db->query($sql_menu_running);
    }

    public function down()
    {
        //
    }
}
