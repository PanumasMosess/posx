<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CrearteTableTransection extends Migration
{
    public function up()
    {
        $db = \Config\Database::connect();
        $sql_stock_posx = "CREATE TABLE `stock_transaction` (`id` INT NOT NULL AUTO_INCREMENT , `stock_code` varchar(64) NULL , `begin` INT NOT NULL DEFAULT 0 , `add` INT NOT NULL DEFAULT 0 , `sold` INT NOT NULL DEFAULT 0 , `adjust` INT NOT NULL DEFAULT 0 , `withdraw` INT NOT NULL DEFAULT 0 , `return` INT NOT NULL DEFAULT 0 , `balance` INT NOT NULL DEFAULT 0  , `created_at` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP , PRIMARY KEY (`id`), INDEX (`id`), INDEX (`stock_code`)) ENGINE = InnoDB";
        $db->query($sql_stock_posx);
    }

    public function down()
    {
        //
    }
}
