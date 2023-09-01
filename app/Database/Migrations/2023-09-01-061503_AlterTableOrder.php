<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AlterTableOrder extends Migration
{
    public function up()
    {
        $db = \Config\Database::connect();
        $sql_stock7 = "ALTER TABLE `order` ADD `order_promotion` text after `group_id`, ADD `order_promotion_detail` text after `group_id`";
        $db->query($sql_stock7);
    }

    public function down()
    {
        //
    }
}
