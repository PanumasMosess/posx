<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AlterTablePrinterSetting extends Migration
{
    public function up()
    {
        $db = \Config\Database::connect();
        $sql = "ALTER TABLE `printer_setting` 
        add `companies_id` int(11) null AFTER `updated_at`";
        $db->query($sql);
    }

    public function down()
    {
        //
    }
}
