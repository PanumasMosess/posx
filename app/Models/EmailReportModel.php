<?php
namespace App\Models;

use CodeIgniter\Database\ConnectionInterface;

class EmailReportModel
{

    protected $db;

    public function __construct()
    {
        $db = \Config\Database::connect();
        $this->db = &$db;
    }

    public function getEmailReportAll()
    {
        $sql = "SELECT * FROM email_report WHERE deleted_at IS NULL;"
            ;
        $builder = $this->db->query($sql);
        return $builder->getResult();
    }

    public function getEmailReportByID($id)
    {
        $builder = $this->db->table('email_report');

        return $builder->where('id', $id)->get()->getRow();
    }

    public function insertEmailReport($data)
    {
        $builder = $this->db->table('email_report');

        return $builder->insert($data) ? $this->db->insertID() : false;
    }

    public function updateEmailReportByID($id, $data)
    {
        $builder = $this->db->table('email_report');

        return $builder->where('id', $id)->update($data);
    }

    public function deleteEmailReportByID($id)
    {
        $sql = "DELETE FROM email_report WHERE id = $id";

        $builder = $this->db->query($sql);

        return $builder;
    }
}
