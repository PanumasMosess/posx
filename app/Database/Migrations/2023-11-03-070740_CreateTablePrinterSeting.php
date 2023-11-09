<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateTablePrinterSeting extends Migration
{
    public function up()
    {
              //
              $db = \Config\Database::connect();
              $sql = "CREATE TABLE `printer_setting` (`id` INT NOT NULL AUTO_INCREMENT , `printer_order` TEXT  NULL , `printer_order_summary` TEXT  NULL, `printer_bill` TEXT  NULL , `created_by` TEXT NULL , `updated_by` TEXT NULL , `created_at` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP , `updated_at` DATETIME NULL DEFAULT NULL , PRIMARY KEY (`id`)) ENGINE = InnoDB;";
              $db->query($sql);
    }

    public function down()
    {
        //
    }
}
