<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AlterTableGroupProductPriterSetting extends Migration
{
    public function up()
    {
        $db = \Config\Database::connect();
        $sql = "
            ALTER TABLE `group_product` 
            ADD `printer_name` VARCHAR(50) NULL AFTER `unit`
        ";
        $db->query($sql);
    }

    public function down()
    {
        //
    }
}
