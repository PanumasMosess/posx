<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AlterTableOrderSummary extends Migration
{
    public function up()
    {
        $db = \Config\Database::connect();
        $sql = "ALTER TABLE `order_summary` ADD `order_card_charge` INT NOT NULL AFTER `order_discount_type`,  ADD `order_card_charge_type` INT NOT NULL AFTER `order_card_charge`,  ADD `order_vat_type` INT NOT NULL AFTER `order_card_charge_type`";
        $db->query($sql);
    }

    public function down()
    {
        //
    }
}
