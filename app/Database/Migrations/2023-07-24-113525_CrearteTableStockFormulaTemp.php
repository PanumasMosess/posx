<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CrearteTableStockFormulaTemp extends Migration
{
    public function up()
    {
        $db = \Config\Database::connect();
        $sql_stock_posx = "CREATE TABLE `stock_formula_temp` (`id` INT NOT NULL AUTO_INCREMENT , `menu_code` TEXT(512) NULL ,`stock_code` TEXT(512) NULL ,`formula_des` TEXT NULL , `formula_pcs` INT NOT NULL DEFAULT 0, `created_by` TEXT NULL ,`created_at` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP  , PRIMARY KEY (`id`), INDEX (`id`), INDEX (`stock_code`), INDEX (`menu_code`)) ENGINE = InnoDB";
        $db->query($sql_stock_posx);
    }

    public function down()
    {
        //
    }
}
