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
    public function getPosition($param)
    {
        $start = $param['start'];
        $length = $param['length'];

        $sql = "SELECT *, CONCAT(DATE_FORMAT(position.created_at, '%d-%m-'), YEAR(position.created_at)+543) as date_created,CONCAT(DATE_FORMAT(position.updated_at, '%d-%m-'), YEAR(position.updated_at)+543) as date_updated
                FROM position 
                WHERE deleted_at IS NULL
                LIMIT $start, $length";
        $builder = $this->db->query($sql);

        return $builder->getResult();
    }

    public function getPositioncount()
    {
        $sql = "SELECT * from position WHERE deleted_at IS NULL
                    ";
        $builder = $this->db->query($sql);

        return $builder->getResult();
    }
    
    public function getPositionSearch($param)
    {
        $search_value = $param['search_value'];
        $start = $param['start'];
        $length = $param['length'];

        $sql = "SELECT *, CONCAT(DATE_FORMAT(position.created_at, '%d-%m-'), YEAR(position.created_at)+543) as date_created,CONCAT(DATE_FORMAT(position.updated_at, '%d-%m-'), YEAR(position.updated_at)+543) as date_updated
            from position 
            WHERE deleted_at IS NULL AND ((position.position_name like '%" . $search_value . "%') OR (created_at like '%" . $search_value . "%') OR (updated_at like '%" . $search_value . "%'))
            limit $start, $length
            ";
        $builder = $this->db->query($sql);

        return $builder->getResult();
    }

    public function getPositionSearchcount($param)
    {
        $search_value = $param['search_value'];

        $sql = "SELECT *, CONCAT(DATE_FORMAT(position.created_at, '%d-%m-'), YEAR(position.created_at)+543) as date_created,CONCAT(DATE_FORMAT(position.updated_at, '%d-%m-'), YEAR(position.updated_at)+543) as date_updated
            from position 
            WHERE deleted_at IS NULL AND ((position.position_name like '%" . $search_value . "%') OR (created_at like '%" . $search_value . "%') OR (updated_at like '%" . $search_value . "%'))
            ";
        $builder = $this->db->query($sql);

        return $builder->getResult();
    }
}
