<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class EmployeeLogs extends Migration
{
    public function up()
    {
        //
        $db = \Config\Database::connect();
        $sql = "CREATE TABLE `employee_logs` (
            `id` int NOT NULL AUTO_INCREMENT,
            `event_id` int NOT NULL,
            `detail` mediumtext CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
            `employee_id` int NOT NULL,
            `ip` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
            `username` mediumtext CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
            `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
            `updated_at` datetime DEFAULT NULL,
            `deleted_at` datetime DEFAULT NULL,
            PRIMARY KEY (`id`)
          ) ENGINE=InnoDB";
        $db->query($sql);
    }

    public function down()
    {
        //
    }
}
