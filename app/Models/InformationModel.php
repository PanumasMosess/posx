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

    public function getInformationByCompanyID($companyID)
    {
        $companies_id = $companyID;
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

    public function get_printer()
    {
        $companies_id = session()->get('companies_id');
        $sql = "SELECT * FROM printer_setting WHERE (companies_id = $companies_id);";
        $builder = $this->db->query($sql);
        return $builder->getRow();
    }

    public function insertPrinter($data)
    {
        $builder = $this->db->table('printer_setting');
        return $builder->insert($data) ? true : false;
    }

    public function updatePrinter($data, $id)
    {
        $builder = $this->db->table('printer_setting');

        return $builder->where('id', $id)->update($data);
    }
}
