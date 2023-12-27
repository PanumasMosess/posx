<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateTableExpenses extends Migration
{
    public function up()
    {
        //
        $db = \Config\Database::connect();
        $sql = "CREATE TABLE `expense` (`id` INT NOT NULL AUTO_INCREMENT , `expense_date` DATE NOT NULL , `expense_group_id` INT NOT NULL , `sub_expense_group_id` INT NOT NULL , `amount` DECIMAL(10,2) NOT NULL , `comment` TEXT NULL , `created_by` TEXT NOT NULL , `created_at` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP , `companies_id` INT NOT NULL , PRIMARY KEY (`id`)) ENGINE = InnoDB";
        $db->query($sql);
    }

    public function down()
    {
        //
    }
}
