<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AlterTableOrderSummary2 extends Migration
{
    public function up()
    {
        $db = \Config\Database::connect();
        $sql = "ALTER TABLE `order_summary` 
        CHANGE COLUMN `order_card_charge` `order_card_charge` decimal(10,2),
        CHANGE COLUMN `order_card_charge_type` `order_card_charge_type` TEXT NULL,
        CHANGE COLUMN `order_vat_type` `order_vat_type` decimal(10,2)";
        $db->query($sql);
    }

    public function down()
    {
        //
    }
}
