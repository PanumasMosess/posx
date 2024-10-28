<?php

namespace App\Models;

use CodeIgniter\Database\ConnectionInterface;

class PaymentPackageModel
{

    protected $db;

    public function __construct()
    {
        $db = \Config\Database::connect();
        $this->db = &$db;
    }

    public function getPaymentPackage()
    {
        $companies_id = session()->get('companies_id');
        $sql = "SELECT * FROM payment_package WHERE (companies_id = $companies_id);";
        $builder = $this->db->query($sql);
        return $builder->getRow();
    }

    public function getPaymentPackageByCompanyID($companyID)
    {
        $companies_id = $companyID;
        $sql = "SELECT * FROM payment_package WHERE (companies_id = $companies_id);";
        $builder = $this->db->query($sql);
        return $builder->getRow();
    }

    public function getPaymentPackageByID($id)
    {
        $builder = $this->db->table('payment_package');

        return $builder->where('id', $id)->get()->getRow();
    }

    public function insertPaymentPackage($data)
    {
        $builder = $this->db->table('payment_package');

        return $builder->insert($data) ? $this->db->insertID() : false;
    }

    public function updatePaymentPackageByID($id, $data)
    {
        $builder = $this->db->table('payment_package');

        return $builder->where('companies_id', $id)->update($data);
    }

    public function deletePaymentPackageByID($id)
    {
        $sql = "DELETE FROM payment_package WHERE id = $id";

        $builder = $this->db->query($sql);

        return $builder;
    }
}
