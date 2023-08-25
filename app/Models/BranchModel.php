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
}
