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
        $sql = "
            SELECT COUNT(id) AS counter
            FROM table_dynamic
            WHERE table_status = 'USE'
        ";

        $builder = $this->db->query($sql);

        return $builder->getRow()->counter;
    }
}