<?php

namespace App\Models;

use CodeIgniter\Database\ConnectionInterface;

class PaymentTypeModel
{

    protected $db;

    public function __construct()
    {
        $db = \Config\Database::connect();
        $this->db = &$db;
    }

    public function getPaymentTypeAll()
    {
        // $builder = $this->db->table('payment_type');
        $companies_id = session()->get('companies_id');
        $sql = "SELECT * FROM payment_type WHERE (deleted_at IS NULL and companies_id = $companies_id);";
        $builder = $this->db->query($sql);
        return $builder->getResult();



        // return $builder
        //     ->get()
        //     ->getResult();
    }

    public function getPaymentTypeByID($id)
    {
        $builder = $this->db->table('payment_type');

        return $builder->where('id', $id)->get()->getRow();
    }

    public function insertPaymentType($data)
    {
        $builder = $this->db->table('payment_type');

        return $builder->insert($data) ? $this->db->insertID() : false;
    }

    public function updatePaymentTypeByID($id, $data)
    {
        $builder = $this->db->table('payment_type');

        return $builder->where('id', $id)->update($data);
    }

    public function deletePaymentTypeByID($id)
    {
        $sql = "DELETE FROM payment_type WHERE id = $id";

        $builder = $this->db->query($sql);

        return $builder;
    }
    
    public function getPaymentType($param)
    {
        $start = $param['start'];
        $length = $param['length'];
        $companies_id = session()->get('companies_id');

        $sql = "SELECT *
                FROM payment_type
                WHERE companies_id = $companies_id
                LIMIT $start, $length";
        $builder = $this->db->query($sql);

        return $builder->getResult();
    }

    public function getPaymentTypecount()
    {
        $companies_id = session()->get('companies_id');
        $sql = "SELECT * from payment_type WHERE companies_id = $companies_id";
        $builder = $this->db->query($sql);

        return $builder->getResult();
    }
    
    public function getPaymentTypeSearch($param)
    {
        $search_value = $param['search_value'];
        $start = $param['start'];
        $length = $param['length'];
        $companies_id = session()->get('companies_id');

        $sql = "SELECT *
            from payment_type 
            WHERE companies_id = $companies_id AND (payment_type.type like '%" . $search_value . "%')
            limit $start, $length
            ";
        $builder = $this->db->query($sql);

        return $builder->getResult();
    }

    public function getPaymentTypeSearchcount($param)
    {
        $search_value = $param['search_value'];
        $companies_id = session()->get('companies_id');

        $sql = "SELECT *
            from payment_type 
            WHERE companies_id = $companies_id AND (payment_type.type like '%" . $search_value . "%')
            ";
        $builder = $this->db->query($sql);

        return $builder->getResult();
    }
}
