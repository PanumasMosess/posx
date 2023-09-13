<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AlterTableTransectionType2 extends Migration
{
    public function up()
    {
        $db = \Config\Database::connect();
        $sql = "ALTER TABLE `stock_transaction` 
        CHANGE COLUMN `begin` `begin` decimal(10,2) NOT NULL, 
        CHANGE COLUMN `add` `add` decimal(10,2) NOT NULL,
        CHANGE COLUMN `sold` `sold` decimal(10,2) NOT NULL,
        CHANGE COLUMN `adjust` `adjust` decimal(10,2) NOT NULL,
        CHANGE COLUMN `withdraw` `withdraw` decimal(10,2) NOT NULL,
        CHANGE COLUMN `return` `return` decimal(10,2) NOT NULL,
        CHANGE COLUMN `balance` `balance` decimal(10,2) NOT NULL";
        $db->query($sql);
    }

    public function down()
    {
        //
    }
}
