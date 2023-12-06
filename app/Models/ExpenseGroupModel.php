<?php

namespace App\Models;

use CodeIgniter\Database\ConnectionInterface;

class ExpenseGroupModel
{

    protected $db;

    public function __construct()
    {
        $db = \Config\Database::connect();
        $this->db = &$db;
    }

    public function getExpenseGroupAll()
    {
        $companies_id = session()->get('companies_id');
        $sql = "SELECT * FROM expense_group WHERE companies_id = $companies_id;";
        $builder = $this->db->query($sql);
        return $builder->getResult();
    }

    public function getExpenseGroup()
    {
        $builder = $this->db->table('expense_group');

        return $builder
            ->where('companies_id', session()->get('companies_id'))
            ->orderBy('created_at', 'DESC')
            ->get()
            ->getRow();
    }

    public function getExpenseGroupByID($id)
    {
        $builder = $this->db->table('expense_group');

        return $builder->where('id', $id)->get()->getRow();
    }

    public function insertExpenseGroup($data)
    {
        $builder = $this->db->table('expense_group');

        return $builder->insert($data) ? $this->db->insertID() : false;
    }

    public function updateExpenseGroupByID($id, $data)
    {
        $builder = $this->db->table('expense_group');

        return $builder->where('id', $id)->update($data);
    }

    public function deleteExpenseGroupByID($id)
    {
        $sql = "DELETE FROM expense_group WHERE id = $id";

        $builder = $this->db->query($sql);

        return $builder;
    }
}
