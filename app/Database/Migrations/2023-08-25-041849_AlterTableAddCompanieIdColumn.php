<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AlterTableAddCompanieIdColumn extends Migration
{
    public function up()
    {
        $db = \Config\Database::connect();
        $sql_1 = "ALTER TABLE `group_product` ADD `companies_id` int(11)  after `deleted_at`, ADD INDEX `companies_id` (`companies_id`)";
        $db->query($sql_1);

        $db = \Config\Database::connect();
        $sql_2 = "ALTER TABLE `supplier` ADD `companies_id` int(11)  after `deleted_at` , ADD INDEX `companies_id` (`companies_id`)";
        $db->query($sql_2);

        
        $db = \Config\Database::connect();
        $sql_3 = "ALTER TABLE `order_customer` ADD `companies_id` int(11)  after `deleted_at` , ADD INDEX `companies_id` (`companies_id`)";
        $db->query($sql_3);

        $db = \Config\Database::connect();
        $sql_3 = "ALTER TABLE `order` ADD `companies_id` int(11)  after `deleted_at` , ADD INDEX `companies_id` (`companies_id`)";
        $db->query($sql_3);

        $db = \Config\Database::connect();
        $sql_4 = "ALTER TABLE `employees` ADD `companies_id` int(11)  after `deleted_at` , ADD INDEX `companies_id` (`companies_id`)";
        $db->query($sql_4);

        $db = \Config\Database::connect();
        $sql_5 = "ALTER TABLE `employee_logs` ADD `companies_id` int(11)  after `deleted_at` , ADD INDEX `companies_id` (`companies_id`)";
        $db->query($sql_5);

        $db = \Config\Database::connect();
        $sql_6 = "ALTER TABLE `branch` ADD `companies_id` int(11)  after `deleted_at` , ADD INDEX `companies_id` (`companies_id`)";
        $db->query($sql_6);

        
        $db = \Config\Database::connect();
        $sql_7 = "ALTER TABLE `position` ADD `companies_id` int(11)  after `deleted_at` , ADD INDEX `companies_id` (`companies_id`)";
        $db->query($sql_7);

        $db = \Config\Database::connect();
        $sql_8 = "ALTER TABLE `stock_formula` ADD `companies_id` int(11)  after `deleted_at` , ADD INDEX `companies_id` (`companies_id`)";
        $db->query($sql_8);

        $db = \Config\Database::connect();
        $sql_9 = "ALTER TABLE `stock_posx` ADD `companies_id` int(11)  after `deleted_at` , ADD INDEX `companies_id` (`companies_id`)";
        $db->query($sql_9);

        $db = \Config\Database::connect();
        $sql_10 = "ALTER TABLE `table_dynamic` ADD `companies_id` int(11)  after `deleted_at` , ADD INDEX `companies_id` (`companies_id`)";
        $db->query($sql_10);
    }

    public function down()
    {
        //
    }
}
