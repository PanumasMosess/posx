<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AlterdOrderGroup extends Migration
{
    public function up()
    {
        $db = \Config\Database::connect();
        $sql_stock1 = "ALTER TABLE `order` 
         ADD `group_id` varchar(65) NULL AFTER `src_order_picture`,  ADD INDEX `group_id` (`group_id`)";
        $db->query($sql_stock1);
    }

    public function down()
    {
        //
    }
}
