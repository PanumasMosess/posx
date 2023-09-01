<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateActivityLogsTable extends Migration
{
    public function up()
    {
        $db = \Config\Database::connect();

        $db->query("
            CREATE TABLE `posx`.`activity_logs` (`id` INT NOT NULL AUTO_INCREMENT , `action` VARCHAR(40) NOT NULL , `refer` VARCHAR(40) NULL , `message` TEXT NULL , `value` DECIMAL(10,2) NULL , `by` VARCHAR(40) NOT NULL , `created_at` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP , `updated_at` DATETIME NULL , `deleted_at` DATETIME NULL , PRIMARY KEY (`id`)) ENGINE = InnoDB;
        ");
    }

    public function down()
    {
        //
    }
}
