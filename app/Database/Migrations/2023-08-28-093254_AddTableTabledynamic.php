<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddTableTabledynamic extends Migration
{
    public function up()
    {
        $db = \Config\Database::connect();
        $sql_1 = "ALTER TABLE `table_dynamic` ADD `div_id` TEXT NULL after `width`";
        $db->query($sql_1);

        $db = \Config\Database::connect();
        $sql_2 = "ALTER TABLE `table_dynamic` ADD `area_code` TEXT NULL after `div_id`";
        $db->query($sql_2);

        $db = \Config\Database::connect();
        $sql_3 = "ALTER TABLE `table_dynamic` ADD `rounded` TEXT NULL after `area_code`";
        $db->query($sql_3);

        $db = \Config\Database::connect();
        $sql_4 = "ALTER TABLE `table_dynamic` CHANGE COLUMN `width` `size_table` int(11)";
        $db->query($sql_4);
    }

    public function down()
    {
        //
    }
}
