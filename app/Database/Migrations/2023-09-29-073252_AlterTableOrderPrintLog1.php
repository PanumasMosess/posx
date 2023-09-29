<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AlterTableOrderPrintLog1 extends Migration
{
    public function up()
    {
        $db = \Config\Database::connect();
        $sql = "ALTER TABLE `order_print_log` 
        add `order_comment`  TEXT not null AFTER `order_print_status`";
        $db->query($sql);
    }

    public function down()
    {
        //
    }
}
