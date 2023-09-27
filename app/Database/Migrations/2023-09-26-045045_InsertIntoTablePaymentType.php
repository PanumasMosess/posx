<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class InsertIntoTablePaymentType extends Migration
{
    public function up()
    {
        //
        $db = \Config\Database::connect();
        $sql = "INSERT INTO `payment_type` (`id`, `type`, `credit_card`, `entertain`, `companies_id`, `created_by`, `updated_by`, `created_at`, `updated_at`, `deleted_at`) VALUES (NULL, 'Cash', '0', '0', '1', NULL, NULL, CURRENT_TIMESTAMP, NULL, NULL)";
        $db->query($sql);
    }

    public function down()
    {
        //
    }
}
