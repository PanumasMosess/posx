<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class EmployeeLoginDetail extends Migration
{
    public function up()
    {
        //
        $db = \Config\Database::connect();
        $sql = "CREATE TABLE `employee_login_details` (
            `id` int NOT NULL AUTO_INCREMENT,
            `employee_id` int NOT NULL,
            `active` enum('0','1') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT '1',
            `last_activity` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
            PRIMARY KEY (`id`)
          ) ENGINE=InnoDB";
        $db->query($sql);
    }

    public function down()
    {
        //
    }
}
