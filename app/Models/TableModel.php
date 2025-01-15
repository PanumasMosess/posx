<?php

namespace App\Models;

use CodeIgniter\Database\ConnectionInterface;

class TableModel
{

    protected $db;

    public function __construct()
    {
        $db = \Config\Database::connect();
        $this->db = &$db;
    }

    public function getTableAll()
    {
        $builder = $this->db->table('table_dynamic');

        return $builder->orderBy('created_at', 'DESC')->get()->getResult();
    }

    public function getTableByID($id)
    {
        $builder = $this->db->table('table_dynamic');

        return $builder->where('id', $id)->get()->getRow();
    }

    public function insertTable($data)
    {
        $builder = $this->db->table('table_dynamic');

        return $builder->insert($data) ? $this->db->insertID() : false;
    }

    public function updateTableByID($id, $data)
    {
        $builder = $this->db->table('table_dynamic');

        return $builder->where('id', $id)->update($data);
    }

    public function deleteTableByID($id)
    {
        $builder = $this->db->table('table_dynamic');

        return $builder->where('id', $id)->delete();
    }

    public function getCounterTableAvailable()
    {
        $companies_id = session()->get('companies_id');
        $sql = "
            SELECT COUNT(id) AS counter
            FROM table_dynamic
            WHERE table_status = 'USE' AND companies_id = $companies_id
        ";

        $builder = $this->db->query($sql);

        return $builder->getRow()->counter;
    }

    public function getTableCount()
    {
        $companies_id = session()->get('companies_id');

        $sql = "
            SELECT COUNT(table_dynamic.id) AS table_count FROM `table_dynamic` JOIN area_table ON area_table.area_code = table_dynamic.area_code WHERE table_dynamic.companies_id = $companies_id AND area_table.companies_id = $companies_id;
        ";

        $builder = $this->db->query($sql);

        return $builder->getRow();
    }
}