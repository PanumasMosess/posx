<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AlterTablePackage extends Migration
{
    public function up()
    {
        //
        $db = \Config\Database::connect();
        $sql = "ALTER TABLE `companies` ADD `packet_exp_date` DATETIME NULL DEFAULT NULL AFTER `packet_id`";
        $db->query($sql);
    }

    public function down()
    {
        //
    }
}
