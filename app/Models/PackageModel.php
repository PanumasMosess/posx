<?php
namespace App\Models;

use CodeIgniter\Database\ConnectionInterface;

class PackageModel
{

    protected $db;

    public function __construct()
    {
        $db = \Config\Database::connect();
        $this->db = &$db;
    }

    public function getPackageModelAll()
    {
        $builder = $this->db->table('package');

        return $builder
            ->get()
            ->getResult();
    }

    public function getPackageModelByID($id)
    {
        $builder = $this->db->table('package');

        return $builder->where('id', $id)->get()->getRow();
    }

    public function insertPackageModel($data)
    {
        $builder = $this->db->table('package');

        return $builder->insert($data) ? $this->db->insertID() : false;
    }

    public function updatePackageModelByID($id, $data)
    {
        $builder = $this->db->table('package');

        return $builder->where('id', $id)->update($data);
    }

    public function deletePackageModelByID($id)
    {
        $sql = "DELETE FROM package WHERE id = $id";

        $builder = $this->db->query($sql);

        return $builder;
    }
}
