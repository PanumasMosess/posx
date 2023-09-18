<?php

namespace App\Models;

use CodeIgniter\Database\ConnectionInterface;

class BranchModel
{

    protected $db;

    public function __construct()
    {
        $db = \Config\Database::connect();
        $this->db = &$db;
    }

    public function getBranchAll()
    {
        // $builder = $this->db->table('branch');
        $companies_id = session()->get('companies_id');
        $sql = "SELECT * FROM branch WHERE (deleted_at IS NULL and companies_id = $companies_id);";
        $builder = $this->db->query($sql);
        return $builder->getResult();



        // return $builder
        //     ->get()
        //     ->getResult();
    }

    public function getBranchByID($id)
    {
        $builder = $this->db->table('branch');

        return $builder->where('id', $id)->get()->getRow();
    }

    public function insertBranch($data)
    {
        $builder = $this->db->table('branch');

        return $builder->insert($data) ? $this->db->insertID() : false;
    }

    public function updateBranchByID($id, $data)
    {
        $builder = $this->db->table('branch');

        return $builder->where('id', $id)->update($data);
    }

    public function deleteBranchByID($id)
    {
        $sql = "DELETE FROM branch WHERE id = $id";

        $builder = $this->db->query($sql);

        return $builder;
    }
    
    public function getBranch($param)
    {
        $start = $param['start'];
        $length = $param['length'];
        $companies_id = session()->get('companies_id');

        $sql = "SELECT *, CONCAT(DATE_FORMAT(branch.created_at, '%d-%m-'), YEAR(branch.created_at)+543) as date_created,CONCAT(DATE_FORMAT(branch.updated_at, '%d-%m-'), YEAR(branch.updated_at)+543) as date_updated
                FROM branch 
                WHERE deleted_at IS NULL AND companies_id = $companies_id
                LIMIT $start, $length";
        $builder = $this->db->query($sql);

        return $builder->getResult();
    }

    public function getBranchcount()
    {
        $companies_id = session()->get('companies_id');

        $sql = "SELECT * from branch WHERE deleted_at IS NULL AND companies_id = $companies_id
                    ";
        $builder = $this->db->query($sql);

        return $builder->getResult();
    }
    
    public function getBranchSearch($param)
    {
        $search_value = $param['search_value'];
        $start = $param['start'];
        $length = $param['length'];
        $companies_id = session()->get('companies_id');

        $sql = "SELECT *, CONCAT(DATE_FORMAT(branch.created_at, '%d-%m-'), YEAR(branch.created_at)+543) as date_created,CONCAT(DATE_FORMAT(branch.updated_at, '%d-%m-'), YEAR(branch.updated_at)+543) as date_updated
            from branch 
            WHERE deleted_at IS NULL AND companies_id = $companies_id AND ((branch.branch_name like '%" . $search_value . "%') OR (created_at like '%" . $search_value . "%') OR (updated_at like '%" . $search_value . "%'))
            limit $start, $length
            ";
        $builder = $this->db->query($sql);

        return $builder->getResult();
    }

    public function getBranchSearchcount($param)
    {
        $search_value = $param['search_value'];
        $companies_id = session()->get('companies_id');

        $sql = "SELECT *, CONCAT(DATE_FORMAT(branch.created_at, '%d-%m-'), YEAR(branch.created_at)+543) as date_created,CONCAT(DATE_FORMAT(branch.updated_at, '%d-%m-'), YEAR(branch.updated_at)+543) as date_updated
            from branch 
            WHERE deleted_at IS NULL AND companies_id = $companies_id AND ((branch.branch_name like '%" . $search_value . "%') OR (created_at like '%" . $search_value . "%') OR (updated_at like '%" . $search_value . "%'))
            ";
        $builder = $this->db->query($sql);

        return $builder->getResult();
    }
}
