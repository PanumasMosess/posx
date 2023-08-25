<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddData extends Migration
{
    public function up()
    {
        //
        $pw = '$2y$10$SBM9WqRRVs8Ln4p0UyTqrO7YLSsQ6FDcHroA9aLGY02TGphJfU/mK';
        //
        $db = \Config\Database::connect();
        $sql_add = ("INSERT INTO `companies` (`companies_name`, `companies_user`, `companies_password`, `companies_status`) VALUES
        ('POSX', 'spadmin','$pw', 'Active');");
        $db->query($sql_add);
        $db->query(
            "UPDATE employees SET companies_id = '1' WHERE id = 1;"
        );
    }

    public function down()
    {
        //
    }
}
