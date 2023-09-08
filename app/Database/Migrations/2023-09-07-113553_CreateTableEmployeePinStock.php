<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateTableEmployeePinStock extends Migration
{
    public function up()
    {
        //
        $db = \Config\Database::connect();
        $sql = "CREATE TABLE `employee_pin_stock` (`id` INT NOT NULL AUTO_INCREMENT , `username` VARCHAR(100) NOT NULL , `pin_stock` TEXT NOT NULL , `pin_stock_all` INT NOT NULL , `pin_stock_edit_stock` INT NOT NULL , `pin_stock_edit_formula` INT NOT NULL , `pin_stock_transaction_add` INT NOT NULL , `pin_stock_transaction_withdraw` INT NOT NULL , `pin_stock_transaction_adjust` INT NOT NULL , `companies_id` INT NOT NULL , `created_by` TEXT NULL , `updated_by` TEXT NULL , `created_at` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP , `updated_at` DATETIME NULL DEFAULT NULL , `deleted_at` DATETIME NULL DEFAULT NULL , PRIMARY KEY (`id`)) ENGINE = InnoDB";
        $db->query($sql);
    }

    public function down()
    {
        //
    }
}
