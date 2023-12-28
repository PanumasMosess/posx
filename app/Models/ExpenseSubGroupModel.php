<?php

namespace App\Models;

use CodeIgniter\Database\ConnectionInterface;

class ExpenseSubGroupModel
{

    protected $db;

    public function __construct()
    {
        $db = \Config\Database::connect();
        $this->db = &$db;
    }

    public function getExpenseSubGroupAll()
    {
        $companies_id = session()->get('companies_id');
        $sql = "SELECT * FROM sub_expense_group WHERE companies_id = $companies_id;";
        $builder = $this->db->query($sql);
        return $builder->getResult();
    }

    public function getExpenseSubGroup()
    {
        $builder = $this->db->table('sub_expense_group');

        return $builder
            ->where('companies_id', session()->get('companies_id'))
            ->orderBy('created_at', 'DESC')
            ->get()
            ->getRow();
    }

    public function getExpenseSubGroupByGroupID($id)
    {
        $companies_id = session()->get('companies_id');
        $sql = "SELECT * FROM sub_expense_group WHERE companies_id = $companies_id AND expense_group_id = $id;";
        $builder = $this->db->query($sql);
        return $builder->getResult();
    }

    public function getExpenseSubGroupByID($id)
    {
        $builder = $this->db->table('sub_expense_group');

        return $builder->where('id', $id)->get()->getRow();
    }

    public function insertExpenseSubGroup($data)
    {
        $builder = $this->db->table('sub_expense_group');

        return $builder->insert($data) ? $this->db->insertID() : false;
    }

    public function updateExpenseSubGroupByID($id, $data)
    {
        $builder = $this->db->table('sub_expense_group');

        return $builder->where('id', $id)->update($data);
    }

    public function deleteExpenseSubGroupByID($id)
    {
        $sql = "DELETE FROM sub_expense_group WHERE id = $id";

        $builder = $this->db->query($sql);

        return $builder;
    }
}
