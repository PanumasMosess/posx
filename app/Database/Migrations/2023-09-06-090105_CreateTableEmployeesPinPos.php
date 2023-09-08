<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateTableEmployeesPinPos extends Migration
{
    public function up()
    {
        //
        $db = \Config\Database::connect();
        $sql = "CREATE TABLE `employee_pin_pos` (`id` INT NOT NULL AUTO_INCREMENT , `username` VARCHAR(100) NOT NULL , `pin_pos` TEXT NOT NULL , `pin_pos_all` INT NOT NULL , `pin_pos_move` INT NOT NULL , `pin_pos_discount` INT NOT NULL , `pin_pos_set_price` INT NOT NULL , `pin_pos_void` INT NOT NULL , `pin_pos_hide_cahsier` INT NOT NULL , `companies_id` INT NOT NULL , `created_by` TEXT NULL , `updated_by` TEXT NULL , `created_at` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP , `updated_at` DATETIME NULL DEFAULT NULL , `deleted_at` DATETIME NULL DEFAULT NULL , PRIMARY KEY (`id`)) ENGINE = InnoDB";
        $db->query($sql);
    }

    public function down()
    {
        //
    }
}
