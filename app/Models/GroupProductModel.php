<?php

namespace App\Models;

use CodeIgniter\Database\ConnectionInterface;

class GroupProductModel
{
    protected $db;
    public function __construct()
    {
        $db = \Config\Database::connect();
        $this->db = &$db;
    }

    // public function getGroupProductAll()
    // {
    //     $builder = $this->db->table('group_product');
    //     return $builder->get()->getResult();
    // }

    public function getGroupProductAll()
    {
        // $builder = $this->db->table('group_product');

        $sql = "SELECT * FROM group_product WHERE deleted_at IS NULL;";
        $builder = $this->db->query($sql);
        return $builder->getResult();

        // return $builder
        //     ->get()
        //     ->getResult();
    }

    public function getGroupProductByID($id)
    {
        $builder = $this->db->table('group_product');

        return $builder->where('id', $id)->get()->getRow();
    }

    public function insertGroupProduct($data)
    {
        $builder = $this->db->table('group_product');

        return $builder->insert($data) ? $this->db->insertID() : false;
    }

    public function updateGroupProductByID($id, $data)
    {
        $builder = $this->db->table('group_product');

        return $builder->where('id', $id)->update($data);
    }

    public function deleteGroupProductByID($id)
    {
        $sql = "DELETE FROM group_product WHERE id = $id";

        $builder = $this->db->query($sql);

        return $builder;
    }

    public function getGroupProduct($param)
    {
        $start = $param['start'];
        $length = $param['length'];
        $companies_id = session()->get('companies_id');

        $sql = "SELECT *, CONCAT(DATE_FORMAT(group_product.created_at, '%d-%m-'), YEAR(group_product.created_at)+543) as date_created,CONCAT(DATE_FORMAT(group_product.updated_at, '%d-%m-'), YEAR(group_product.updated_at)+543) as date_updated
                FROM group_product 
                WHERE deleted_at IS NULL AND companies_id = $companies_id
                LIMIT $start, $length";
        $builder = $this->db->query($sql);

        return $builder->getResult();
    }

    public function getGroupProductcount()
    {
        $companies_id = session()->get('companies_id');

        $sql = "SELECT *
                    from group_product 
                    WHERE deleted_at IS NULL AND companies_id = $companies_id
                    ";
        $builder = $this->db->query($sql);

        return $builder->getResult();
    }
    
    public function getGroupProductSearch($param)
    {
        $search_value = $param['search_value'];
        $start = $param['start'];
        $length = $param['length'];
        $companies_id = session()->get('companies_id');

        $sql = "SELECT *, CONCAT(DATE_FORMAT(group_product.created_at, '%d-%m-'), YEAR(group_product.created_at)+543) as date_created,CONCAT(DATE_FORMAT(group_product.updated_at, '%d-%m-'), YEAR(group_product.updated_at)+543) as date_updated
            from group_product 
            WHERE deleted_at IS NULL AND companies_id = $companies_id AND ((group_product.name like '%" . $search_value . "%') OR (unit like '%" . $search_value . "%') OR (created_at like '%" . $search_value . "%') OR (updated_at like '%" . $search_value . "%'))
            limit $start, $length
            ";
        $builder = $this->db->query($sql);

        return $builder->getResult();
    }

    public function getGroupProductSearchcount($param)
    {
        $search_value = $param['search_value'];
        $companies_id = session()->get('companies_id');

        $sql = "SELECT *, CONCAT(DATE_FORMAT(group_product.created_at, '%d-%m-'), YEAR(group_product.created_at)+543) as date_created,CONCAT(DATE_FORMAT(group_product.updated_at, '%d-%m-'), YEAR(group_product.updated_at)+543) as date_updated
            from group_product 
            WHERE deleted_at IS NULL AND companies_id = $companies_id AND ((group_product.name like '%" . $search_value . "%') OR (unit like '%" . $search_value . "%') OR (created_at like '%" . $search_value . "%') OR (updated_at like '%" . $search_value . "%'))
            ";
        $builder = $this->db->query($sql);

        return $builder->getResult();
    }

}
