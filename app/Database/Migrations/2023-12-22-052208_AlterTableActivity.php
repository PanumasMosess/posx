<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AlterTableActivity extends Migration
{
    public function up()
    {
        $db = \Config\Database::connect();
        $sql = "ALTER TABLE `activity_logs` ADD `companies_id` INT NOT NULL AFTER `by`";
        $db->query($sql);
    }

    public function down()
    {
        //
    }
}
