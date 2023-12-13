<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AlterTablePrintLogPriterSeting extends Migration
{
    public function up()
    {
        $db = \Config\Database::connect();
        $sql = "
            ALTER TABLE `order_print_log` 
            ADD `printer_name` VARCHAR(50) NULL AFTER `order_comment`
        ";
        $db->query($sql);
    }

    public function down()
    {
        //
    }
}
