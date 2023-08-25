<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddTableAear extends Migration
{
    public function up()
    {
        $db = \Config\Database::connect();

        $sql_1 = "ALTER TABLE `table_dynamic` ADD `width_div` int(11)  after `y`";
        $db->query($sql_1);

        $sql_2 = "CREATE TABLE `area_table` 
        (`id` INT NOT NULL AUTO_INCREMENT , 
        `area_code` varchar(64) NULL , 
        `area_name` TEXT NULL , 
        `created_by` TEXT NULL , 
        `updated_by` TEXT NULL ,
        `created_at` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP , 
        `updated_at` DATETIME NULL , 
        `deleted_at` DATETIME NULL , 
        `companies_id` int(11),
        PRIMARY KEY (`id`), INDEX (`id`), INDEX (`area_code`),  INDEX (`companies_id`)) ENGINE = InnoDB";
        $db->query($sql_2);

        $sql_3 = "ALTER TABLE `table_dynamic` ADD `hight_div` int(11) after `width_div`";
        $db->query($sql_3);
    }

    public function down()
    {
        //
    }
}
