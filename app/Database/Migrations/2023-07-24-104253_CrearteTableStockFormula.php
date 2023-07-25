<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CrearteTableStockFormula extends Migration
{
    public function up()
    {
        $db = \Config\Database::connect();
        $sql_stock_posx = "CREATE TABLE `stock_formula` (`id` INT NOT NULL AUTO_INCREMENT , `menu_code` TEXT NULL ,`stock_code` TEXT NULL ,`formula_des` TEXT NULL , `formula_pcs` INT NOT NULL DEFAULT 0, `created_by` TEXT NULL , `updated_by` TEXT NULL ,`created_at` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP , `updated_at` DATETIME NULL , `deleted_at` DATETIME NULL , PRIMARY KEY (`id`), INDEX (`id`), INDEX (`stock_code`), INDEX (`menu_code`)) ENGINE = InnoDB";
        $db->query($sql_stock_posx);
    }

    public function down()
    {
        //
    }
}
