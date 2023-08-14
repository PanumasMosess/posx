<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class branchs extends Migration
{
    public function up()
    {
        //
        $db = \Config\Database::connect();
        $sql = "CREATE TABLE `branch` (
            `id` int NOT NULL AUTO_INCREMENT,
            `branch_name` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
            `created_by` TEXT NULL , 
            `updated_by` TEXT NULL ,
            `deleted_by` TEXT NULL ,
            `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
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
