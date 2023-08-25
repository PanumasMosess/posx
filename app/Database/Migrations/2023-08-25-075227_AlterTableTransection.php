<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AlterTableTransection extends Migration
{
    public function up()
    {
        $db = \Config\Database::connect();
        $sql_1 = "ALTER TABLE `stock_transaction` ADD `companies_id` int(11)  after `created_at`, ADD INDEX `companies_id` (`companies_id`)";
        $db->query($sql_1);
    }

    public function down()
    {
        //
    }
}
