<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class employee extends Migration
{
    public function up()
    {
        //
        $pw = '$2y$10$SBM9WqRRVs8Ln4p0UyTqrO7YLSsQ6FDcHroA9aLGY02TGphJfU/mK';
        //
        $db = \Config\Database::connect();
        $sql = "CREATE TABLE `employees` (
            `id` int NOT NULL AUTO_INCREMENT,
            `username` varchar(40) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
            `password` mediumtext CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
            `login_fail` int DEFAULT NULL,
            `created_by` TEXT NULL , 
            `updated_by` TEXT NULL ,
            `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
            `updated_at` datetime DEFAULT NULL,
            `deleted_at` datetime DEFAULT NULL,
            `branch_id` int DEFAULT NULL,
            `position_id` int DEFAULT NULL,
            `name` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
            `nickname` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
            `phone_number` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
            `thumbnail` mediumtext CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
            `employee_email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
            PRIMARY KEY (`id`)
          ) ENGINE=InnoDB";
        $db->query($sql);
        $db->query("INSERT INTO `employees` (`id`, `username`, `password`, `login_fail`, `created_by`, `updated_by`, `created_at`, `updated_at`, `deleted_at`, `branch_id`, `position_id`, `name`, `nickname`, `phone_number`, `thumbnail`, `employee_email`) VALUES
        (1, 'spadmin', '$pw', NULL, NULL, NULL, '2023-08-09 16:34:54', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);");
    }

    public function down()
    {
        //
    }
}
