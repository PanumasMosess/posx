<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreartTableSupplier extends Migration
{
    public function up()
    {
        $db = \Config\Database::connect();
        $sql_posx = "CREATE TABLE `supplier` (`id` INT NOT NULL AUTO_INCREMENT , `supplier_name` TEXT NULL , `created_by` TEXT NULL , `updated_by` TEXT NULL ,`created_at` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP , `updated_at` DATETIME NULL , `deleted_at` DATETIME NULL , PRIMARY KEY (`id`), INDEX (`id`)) ENGINE = InnoDB";
        $db->query($sql_posx);
    }

    public function down()
    {
        //
    }
}
