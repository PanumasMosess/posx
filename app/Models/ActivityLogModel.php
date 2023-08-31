<?php

namespace App\Models;

use CodeIgniter\Database\ConnectionInterface;

class ActivityLogModel
{

    protected $db;

    public function __construct()
    {
        $db = \Config\Database::connect();
        $this->db = &$db;
    }

    public function getActivityLogAll()
    {
        $builder = $this->db->table('activity_logs');

        return $builder->orderBy('created_at', 'DESC')->get()->getResult();
    }

    public function getActivityLogByID($id)
    {
        $builder = $this->db->table('activity_logs');

        return $builder->where('id', $id)->get()->getRow();
    }

    public function insertActivityLog($data)
    {
        $builder = $this->db->table('activity_logs');

        return $builder->insert($data) ? $this->db->insertID() : false;
    }

    public function updateActivityLogByID($id, $data)
    {
        $builder = $this->db->table('activity_logs');

        return $builder->where('id', $id)->update($data);
    }

    public function deleteActivityLogByID($id)
    {
        $builder = $this->db->table('activity_logs');

        return $builder->where('id', $id)->delete();
    }

    public function getActivityLogToday()
    {
        $sql = "
            SELECT *
            FROM activity_logs
            WHERE DATE(created_at) = CURDATE()
            ORDER BY created_at DESC
        ";

        $builder = $this->db->query($sql);

        return $builder->getResult();
    }
}