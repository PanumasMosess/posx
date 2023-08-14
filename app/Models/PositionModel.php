<?php
namespace App\Models;

use CodeIgniter\Database\ConnectionInterface;

class PositionModel
{

    protected $db;

    public function __construct()
    {
        $db = \Config\Database::connect();
        $this->db = &$db;
    }

    public function getPositionAll()
    {
        $sql = "SELECT * FROM position WHERE deleted_at IS NULL;"
            ;
        $builder = $this->db->query($sql);
        return $builder->getResult();
    }

    public function getPositionByID($id)
    {
        $builder = $this->db->table('position');

        return $builder->where('id', $id)->get()->getRow();
    }

    public function insertPosition($data)
    {
        $builder = $this->db->table('position');

        return $builder->insert($data) ? $this->db->insertID() : false;
    }

    public function updatePositionByID($id, $data)
    {
        $builder = $this->db->table('position');

        return $builder->where('id', $id)->update($data);
    }

    public function deletePositionByID($id)
    {
        $sql = "DELETE FROM position WHERE id = $id";

        $builder = $this->db->query($sql);

        return $builder;
    }
}
