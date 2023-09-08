<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AlterTableOrderSummary4 extends Migration
{
    public function up()
    {
        $db = \Config\Database::connect();
        $sql = "ALTER TABLE `order_summary` 
        add `companies_id`  int(10) null AFTER `deleted_at`";
        $db->query($sql);
    }

    public function down()
    {
        //
    }
}
