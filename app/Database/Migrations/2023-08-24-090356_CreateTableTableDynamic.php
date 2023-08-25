<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateTableTableDynamic extends Migration
{
    public function up()
    {
        $db = \Config\Database::connect();
        $sql_order_customer_posx = "CREATE TABLE `table_dynamic` (`id` INT NOT NULL AUTO_INCREMENT , `table_code` varchar(64) NULL , `table_name` TEXT NULL ,`table_customer_booking` TEXT NULL, `x` TEXT NULL, `y` TEXT NULL, `created_by` TEXT NULL , `updated_by` TEXT NULL ,`created_at` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP , `updated_at` DATETIME NULL , `deleted_at` DATETIME NULL , PRIMARY KEY (`id`), INDEX (`id`), INDEX (`table_code`)) ENGINE = InnoDB";
        $db->query($sql_order_customer_posx);
    }

    public function down()
    {
        //
    }
}
