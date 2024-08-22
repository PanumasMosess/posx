<?php
namespace App\Models;

use CodeIgniter\Database\ConnectionInterface;

class CompaniesModel
{

    protected $db;

    public function __construct()
    {
        $db = \Config\Database::connect();
        $this->db = &$db;
    }

    public function getCompaniesAll()
    {
        $builder = $this->db->table('companies');

        return $builder
            ->get()
            ->getResult();
    }

    public function getCompaniesByID($id)
    {
        $builder = $this->db->table('companies');

        return $builder->where('id', $id)->get()->getRow();
    }

    public function insertCompanies($data)
    {
        $builder = $this->db->table('companies');

        return $builder->insert($data) ? $this->db->insertID() : false;
    }

    public function updateCompaniesByID($id, $data)
    {
        $builder = $this->db->table('companies');

        return $builder->where('id', $id)->update($data);
    }

    public function deleteCompaniesByID($id)
    {
        $sql = "DELETE FROM companies WHERE id = $id";

        $builder = $this->db->query($sql);

        return $builder;
    }
}
