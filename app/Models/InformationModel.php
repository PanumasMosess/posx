<?php

namespace App\Models;

use CodeIgniter\Database\ConnectionInterface;

class InformationModel
{

    protected $db;

    public function __construct()
    {
        $db = \Config\Database::connect();
        $this->db = &$db;
    }

    public function getInformation()
    {
        $companies_id = session()->get('companies_id');
        $sql = "SELECT * FROM information WHERE (companies_id = $companies_id);";
        $builder = $this->db->query($sql);
        return $builder->getRow();
    }

    public function getInformationByID($id)
    {
        $builder = $this->db->table('information');

        return $builder->where('id', $id)->get()->getRow();
    }

    public function insertInformation($data)
    {
        $builder = $this->db->table('information');

        return $builder->insert($data) ? $this->db->insertID() : false;
    }

    public function updateInformationByID($id, $data)
    {
        $builder = $this->db->table('information');

        return $builder->where('companies_id', $id)->update($data);
    }

    public function deleteInformationByID($id)
    {
        $sql = "DELETE FROM information WHERE id = $id";

        $builder = $this->db->query($sql);

        return $builder;
    }
}