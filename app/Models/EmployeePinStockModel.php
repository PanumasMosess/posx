<?php

namespace App\Models;

use CodeIgniter\Database\ConnectionInterface;

class EmployeePinStockModel
{

    protected $db;

    public function __construct()
    {
        $db = \Config\Database::connect();
        $this->db = &$db;
    }

    public function getEmployeePinStockAll()
    {
        // $builder = $this->db->table('employee_pin_stock');
        $companies_id = session()->get('companies_id');
        $sql = "SELECT * FROM employee_pin_stock WHERE (deleted_at IS NULL and companies_id = $companies_id);";
        $builder = $this->db->query($sql);
        return $builder->getResult();



        // return $builder
        //     ->get()
        //     ->getResult();
    }

    public function getEmployeePinStockByID($id)
    {
        $builder = $this->db->table('employee_pin_stock');

        return $builder->where('id', $id)->get()->getRow();
    }

    public function insertEmployeePinStock($data)
    {
        $builder = $this->db->table('employee_pin_stock');

        return $builder->insert($data) ? $this->db->insertID() : false;
    }

    public function updateEmployeePinStockByID($id, $data)
    {
        $builder = $this->db->table('employee_pin_stock');

        return $builder->where('id', $id)->update($data);
    }

    public function deleteEmployeePinStockByID($id)
    {
        $sql = "DELETE FROM employee_pin_stock WHERE id = $id";

        $builder = $this->db->query($sql);

        return $builder;
    }
    
    public function getEmployeePinStock($param)
    {
        $start = $param['start'];
        $length = $param['length'];
        $companies_id = session()->get('companies_id');

        $sql = "SELECT *
                FROM employee_pin_stock
                WHERE companies_id = $companies_id
                LIMIT $start, $length";
        $builder = $this->db->query($sql);

        return $builder->getResult();
    }

    public function getEmployeePinStockcount()
    {
        $companies_id = session()->get('companies_id');
        $sql = "SELECT * from employee_pin_stock WHERE companies_id = $companies_id";
        $builder = $this->db->query($sql);

        return $builder->getResult();
    }
    
    public function getEmployeePinStockSearch($param)
    {
        $search_value = $param['search_value'];
        $start = $param['start'];
        $length = $param['length'];
        $companies_id = session()->get('companies_id');

        $sql = "SELECT *
            from employee_pin_stock 
            WHERE companies_id = $companies_id AND (employee_pin_stock.username like '%" . $search_value . "%')
            limit $start, $length
            ";
        $builder = $this->db->query($sql);

        return $builder->getResult();
    }

    public function getEmployeePinStockSearchcount($param)
    {
        $search_value = $param['search_value'];
        $companies_id = session()->get('companies_id');

        $sql = "SELECT *
            from employee_pin_stock 
            WHERE companies_id = $companies_id AND (employee_pin_stock.username like '%" . $search_value . "%')
            ";
        $builder = $this->db->query($sql);

        return $builder->getResult();
    }
}
