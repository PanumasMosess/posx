<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateTableExpenseGroup extends Migration
{
    public function up()
    {
        //
        $db = \Config\Database::connect();
        $sql = "CREATE TABLE `expense_group` (`id` INT NOT NULL AUTO_INCREMENT , `expense_name` TEXT NOT NULL , `created_by` TEXT NULL , `updated_by` TEXT NULL , `created_at` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP , `updated_at` DATETIME NULL DEFAULT NULL , `companies_id` INT NOT NULL , PRIMARY KEY (`id`)) ENGINE = InnoDB";
        $db->query($sql);
    }

    public function down()
    {
        //
    }
}
