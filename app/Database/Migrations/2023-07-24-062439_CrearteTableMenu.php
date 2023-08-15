<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CrearteTableMenu extends Migration
{
    public function up()
    {
        $db = \Config\Database::connect();
        $sql_stock_posx = "CREATE TABLE `menu` (`id` INT NOT NULL AUTO_INCREMENT , `menu_code` TEXT(512) NULL , `menu_name` TEXT NULL ,`menu_des` TEXT NULL,`menu_price` decimal(10,2) NOT NULL DEFAULT 0.00 , `menu_pcs` INT NOT NULL DEFAULT 0, `src_menu_picture` TEXT NULL, `created_by` TEXT NULL , `updated_by` TEXT NULL ,`created_at` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP , `updated_at` DATETIME NULL , `deleted_at` DATETIME NULL , PRIMARY KEY (`id`), INDEX (`id`), INDEX (`menu_code`)) ENGINE = InnoDB";
        $db->query($sql_stock_posx);
    }

    public function down()
    {
        //
    }
}
