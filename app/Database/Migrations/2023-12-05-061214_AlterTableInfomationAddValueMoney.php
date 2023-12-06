<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AlterTableInfomationAddValueMoney extends Migration
{
    public function up()
    {
        $db = \Config\Database::connect();
        $sql = "
            ALTER TABLE `information` 
            ADD `valueMoney` VARCHAR(40) NULL AFTER `companies_id`, 
            ADD `symbolValueMoney` VARCHAR(40) NULL AFTER `valueMoney`
        ";
        $db->query($sql);
    }

    public function down()
    {
        //
    }
}
