<?php

namespace App\Models;

use CodeIgniter\Database\ConnectionInterface;

class MobileModel
{

    protected $db;

    public function __construct()
    {
        $db = \Config\Database::connect();
        $this->db = &$db;
    }

    public function getMobileAll()
    {
        // $builder = $this->db->table('mobile');
        $companies_id = session()->get('companies_id');
        $sql = "SELECT * FROM mobile WHERE (deleted_at IS NULL and companies_id = $companies_id);";
        $builder = $this->db->query($sql);
        return $builder->getResult();



        // return $builder
        //     ->get()
        //     ->getResult();
    }

    public function getMobileByID($id)
    {
        $builder = $this->db->table('mobile');

        return $builder->where('id', $id)->get()->getRow();
    }

    public function insertMobile($data)
    {
        $builder = $this->db->table('mobile');

        return $builder->insert($data) ? $this->db->insertID() : false;
    }

    public function updateMobileByID($id, $data)
    {
        $builder = $this->db->table('mobile');

        return $builder->where('id', $id)->update($data);
    }

    public function deleteMobileByID($id)
    {
        $sql = "DELETE FROM mobile WHERE id = $id";

        $builder = $this->db->query($sql);

        return $builder;
    }
    
    public function getMobile($param)
    {
        $start = $param['start'];
        $length = $param['length'];
        $companies_id = session()->get('companies_id');

        $sql = "SELECT *
                FROM mobile
                WHERE companies_id = $companies_id
                LIMIT $start, $length";
        $builder = $this->db->query($sql);

        return $builder->getResult();
    }

    public function getMobilecount()
    {
        $companies_id = session()->get('companies_id');
        $sql = "SELECT * from mobile WHERE companies_id = $companies_id";
        $builder = $this->db->query($sql);

        return $builder->getResult();
    }
    
    public function getMobileSearch($param)
    {
        $search_value = $param['search_value'];
        $start = $param['start'];
        $length = $param['length'];
        $companies_id = session()->get('companies_id');

        $sql = "SELECT *
            from mobile 
            WHERE companies_id = $companies_id AND (mobile.device_id like '%" . $search_value . "%')
            limit $start, $length
            ";
        $builder = $this->db->query($sql);

        return $builder->getResult();
    }

    public function getMobileSearchcount($param)
    {
        $search_value = $param['search_value'];
        $companies_id = session()->get('companies_id');

        $sql = "SELECT *
            from mobile 
            WHERE companies_id = $companies_id AND (mobile.device_id like '%" . $search_value . "%')
            ";
        $builder = $this->db->query($sql);

        return $builder->getResult();
    }
}
