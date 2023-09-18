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

    public function getSupplier($param)
    {
        $start = $param['start'];
        $length = $param['length'];
        $companies_id = session()->get('companies_id');

        $sql = "SELECT *, CONCAT(DATE_FORMAT(supplier.created_at, '%d-%m-'), YEAR(supplier.created_at)+543) as date_created,CONCAT(DATE_FORMAT(supplier.updated_at, '%d-%m-'), YEAR(supplier.updated_at)+543) as date_updated
                FROM supplier 
                WHERE deleted_at IS NULL AND companies_id = $companies_id
                LIMIT $start, $length";
        $builder = $this->db->query($sql);

        return $builder->getResult();
    }

    public function getSuppliercount()
    {
        $companies_id = session()->get('companies_id');

        $sql = "SELECT * from supplier WHERE deleted_at IS NULL AND companies_id = $companies_id
                    ";
        $builder = $this->db->query($sql);

        return $builder->getResult();
    }
    
    public function getSupplierSearch($param)
    {
        $search_value = $param['search_value'];
        $start = $param['start'];
        $length = $param['length'];
        $companies_id = session()->get('companies_id');

        $sql = "SELECT *, CONCAT(DATE_FORMAT(supplier.created_at, '%d-%m-'), YEAR(supplier.created_at)+543) as date_created,CONCAT(DATE_FORMAT(supplier.updated_at, '%d-%m-'), YEAR(supplier.updated_at)+543) as date_updated
            from supplier 
            WHERE deleted_at IS NULL AND companies_id = $companies_id AND ((supplier.name like '%" . $search_value . "%') OR (created_at like '%" . $search_value . "%') OR (updated_at like '%" . $search_value . "%'))
            limit $start, $length
            ";
        $builder = $this->db->query($sql);

        return $builder->getResult();
    }

    public function getSupplierSearchcount($param)
    {
        $search_value = $param['search_value'];
        $companies_id = session()->get('companies_id');

        $sql = "SELECT *, CONCAT(DATE_FORMAT(supplier.created_at, '%d-%m-'), YEAR(supplier.created_at)+543) as date_created,CONCAT(DATE_FORMAT(supplier.updated_at, '%d-%m-'), YEAR(supplier.updated_at)+543) as date_updated
            from supplier 
            WHERE deleted_at IS NULL AND companies_id = $companies_id AND ((supplier.name like '%" . $search_value . "%') OR (created_at like '%" . $search_value . "%') OR (updated_at like '%" . $search_value . "%'))
            ";
        $builder = $this->db->query($sql);

        return $builder->getResult();
    }
}
