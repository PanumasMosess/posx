<?php

namespace App\Models;

use CodeIgniter\Database\ConnectionInterface;

class SupplierModel
{

    protected $db;

    public function __construct()
    {
        $db = \Config\Database::connect();
        $this->db = &$db;
    }

    public function getSupplierAll()
    {
        // $builder = $this->db->table('supplier');
        $companies_id = session()->get('companies_id');
        $sql = "SELECT * FROM supplier WHERE (deleted_at IS NULL and companies_id = $companies_id);";
        $builder = $this->db->query($sql);
        return $builder->getResult();

        // return $builder
        //     ->get()
        //     ->getResult();
    }

    public function getSupplierByID($id)
    {
        $builder = $this->db->table('supplier');

        return $builder->where('id', $id)->get()->getRow();
    }

    public function insertSupplier($data)
    {
        $builder = $this->db->table('supplier');

        return $builder->insert($data) ? $this->db->insertID() : false;
    }

    public function updateSupplierByID($id, $data)
    {
        $builder = $this->db->table('supplier');

        return $builder->where('id', $id)->update($data);
    }

    public function deleteSupplierByID($id)
    {
        $sql = "DELETE FROM supplier WHERE id = $id";

        $builder = $this->db->query($sql);

        return $builder;
    }
}
