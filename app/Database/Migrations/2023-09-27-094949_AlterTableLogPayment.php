<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AlterTableLogPayment extends Migration
{
    public function up()
    {
        $db = \Config\Database::connect();
        $sql = "ALTER TABLE `payment_log` 
        add `note` TEXT null AFTER `entertain`";
        $db->query($sql);
    }

    public function down()
    {
        //
    }
}
