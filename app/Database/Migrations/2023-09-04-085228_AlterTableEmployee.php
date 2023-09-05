<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AlterTableEmployee extends Migration
{
    public function up()
    {
        //
        $db = \Config\Database::connect();
        $sql = "ALTER TABLE `employees` ADD `roles` INT NOT NULL AFTER `employee_email`, ADD `setting_pos` INT NOT NULL AFTER `roles`, ADD `setting_report` INT NOT NULL AFTER `setting_pos`, ADD `setting_menu` INT NOT NULL AFTER `setting_report`, ADD `setting_expense` INT NOT NULL AFTER `setting_menu`, ADD `setting_stock` INT NOT NULL AFTER `setting_expense`, ADD `setting_setting` INT NOT NULL AFTER `setting_stock`";
        $db->query($sql);
    }

    public function down()
    {
        //
    }
}
