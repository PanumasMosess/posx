<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AlterTableRenameCompanies extends Migration
{
    public function up()
    {
        $db = \Config\Database::connect();
        $sql_stock1 = "ALTER TABLE `table_companies` RENAME TO `companies`";
        $db->query($sql_stock1);
    }

    public function down()
    {
        //
    }
}
