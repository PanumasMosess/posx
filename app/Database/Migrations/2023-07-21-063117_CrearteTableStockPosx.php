<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CrearteTableStockPosx extends Migration
{
    public function up()
    {
       $db = \Config\Database::connect();
       $sql_stock_posx = "CREATE TABLE `stock_posx` (`id` INT NOT NULL AUTO_INCREMENT , `stock_code` TEXT NULL , `name` TEXT NULL , `group_id` INT NULL , `MAX` INT NULL , `MIN` INT NOT NULL DEFAULT 0 ,`price` decimal(10,2) NOT NULL DEFAULT 0.00 , `pcs` INT NOT NULL DEFAULT 0, `status_stock` VARCHAR(255) NULL , `src_picture` TEXT NULL, `created_by` TEXT NULL , `updated_by` TEXT NULL ,`created_at` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP , `updated_at` DATETIME NULL , `deleted_at` DATETIME NULL , PRIMARY KEY (`id`), INDEX (`id`), INDEX (`stock_code`), INDEX (`group_id`)) ENGINE = InnoDB";
       $db->query($sql_stock_posx);
    }

    public function down()
    {
        //
    }
}
