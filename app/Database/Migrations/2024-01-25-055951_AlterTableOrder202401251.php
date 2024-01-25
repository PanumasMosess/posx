<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AlterTableOrder202401251 extends Migration
{
    public function up()
    {
        $db = \Config\Database::connect();

        $sql_1 = "ALTER TABLE `order` ADD `order_menu_recommended` int(5) NOT NULL after `order_promotion`";
        $db->query($sql_1);
    }

    public function down()
    {
        //
    }
}
