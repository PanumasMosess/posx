<?php

namespace App\Models;

use CodeIgniter\Database\ConnectionInterface;

class EmployeePinPosModel
{

    protected $db;

    public function __construct()
    {
        $db = \Config\Database::connect();
        $this->db = &$db;
    }

    public function getEmployeePinPosAll()
    {
        // $builder = $this->db->table('employee_pin_pos');
        $companies_id = session()->get('companies_id');
        $sql = "SELECT * FROM employee_pin_pos WHERE (deleted_at IS NULL and companies_id = $companies_id);";
        $builder = $this->db->query($sql);
        return $builder->getResult();



        // return $builder
        //     ->get()
        //     ->getResult();
    }

    public function getEmployeePinPosByID($id)
    {
        $builder = $this->db->table('employee_pin_pos');

        return $builder->where('id', $id)->get()->getRow();
    }

    public function insertEmployeePinPos($data)
    {
        $builder = $this->db->table('employee_pin_pos');

        return $builder->insert($data) ? $this->db->insertID() : false;
    }

    public function updateEmployeePinPosByID($id, $data)
    {
        $builder = $this->db->table('employee_pin_pos');

        return $builder->where('id', $id)->update($data);
    }

    public function deleteEmployeePinPosByID($id)
    {
        $sql = "DELETE FROM employee_pin_pos WHERE id = $id";

        $builder = $this->db->query($sql);

        return $builder;
    }
    
    public function getEmployeePinPos($param)
    {
        $start = $param['start'];
        $length = $param['length'];
        $companies_id = session()->get('companies_id');

        $sql = "SELECT *
                FROM employee_pin_pos
                WHERE companies_id = $companies_id
                LIMIT $start, $length";
        $builder = $this->db->query($sql);

        return $builder->getResult();
    }

    public function getEmployeePinPoscount()
    {
        $companies_id = session()->get('companies_id');
        $sql = "SELECT * from employee_pin_pos WHERE companies_id = $companies_id";
        $builder = $this->db->query($sql);

        return $builder->getResult();
    }
    
    public function getEmployeePinPosSearch($param)
    {
        $search_value = $param['search_value'];
        $start = $param['start'];
        $length = $param['length'];
        $companies_id = session()->get('companies_id');

        $sql = "SELECT *
            from employee_pin_pos 
            WHERE companies_id = $companies_id AND (employee_pin_pos.username like '%" . $search_value . "%')
            limit $start, $length
            ";
        $builder = $this->db->query($sql);

        return $builder->getResult();
    }

    public function getEmployeePinPosSearchcount($param)
    {
        $search_value = $param['search_value'];
        $companies_id = session()->get('companies_id');

        $sql = "SELECT *
            from employee_pin_pos 
            WHERE companies_id = $companies_id AND (employee_pin_pos.username like '%" . $search_value . "%')
            ";
        $builder = $this->db->query($sql);

        return $builder->getResult();
    }
}
