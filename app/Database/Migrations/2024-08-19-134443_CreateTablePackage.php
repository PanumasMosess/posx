<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateTablePackage extends Migration
{
    public function up()
    {
        //
        $db = \Config\Database::connect();
        $sql = "CREATE TABLE `package` (`id` INT NOT NULL AUTO_INCREMENT , `package_name` TEXT NOT NULL , `package_price` DECIMAL(10,2) NOT NULL , `created_at` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP , `updated_at` DATETIME NULL DEFAULT NULL , PRIMARY KEY (`id`)) ENGINE = InnoDB";
        $db->query($sql);
        $db->query("INSERT INTO `package` (`id`, `package_name`, `package_price`, `created_at`, `updated_at`) VALUES (NULL, 'Package-590', '590', current_timestamp(), NULL), (NULL, 'Package-890', '890', current_timestamp(), NULL), (NULL, 'Package-1390', '1390', current_timestamp(), NULL)");
    }

    public function down()
    {
        //
    }
}
