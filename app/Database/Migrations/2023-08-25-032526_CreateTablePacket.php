<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateTablePacket extends Migration
{
    public function up()
    {
        $db = \Config\Database::connect();
        $sql_packet_posx = "CREATE TABLE 
        `table_companies` (`id` INT NOT NULL AUTO_INCREMENT ,
        `companies_name` TEXT NULL ,
        `companies_user` TEXT NULL, 
        `companies_password` TEXT NULL, 
        `packet_id` TEXT NULL, 
        `companies_status` TEXT NULL, 
        `created_by` TEXT NULL , 
        `updated_by` TEXT NULL ,
        `created_at` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP , 
        `updated_at` DATETIME NULL , 
        `deleted_at` DATETIME NULL ,
        PRIMARY KEY (`id`), 
        INDEX (`id`))ENGINE = InnoDB";
        $db->query($sql_packet_posx);      
    }

    public function down()
    {
        //
    }
}
