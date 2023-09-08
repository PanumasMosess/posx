<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AlterTablleDynamic extends Migration
{
    public function up()
    {
        $db = \Config\Database::connect();
        $sql = "ALTER TABLE `table_dynamic` 
        add `table_status`  TEXT NULL AFTER `table_customer_booking`";
        $db->query($sql);
    }

    public function down()
    {
        //
    }
}
