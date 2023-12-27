<?php

namespace App\Models;

use CodeIgniter\Database\ConnectionInterface;

class ExpenseModel
{

    protected $db;

    public function __construct()
    {
        $db = \Config\Database::connect();
        $this->db = &$db;
    }

    public function getExpenseAll()
    {
        $companies_id = session()->get('companies_id');
        $sql = "SELECT * FROM expense WHERE companies_id = $companies_id;";
        $builder = $this->db->query($sql);
        return $builder->getResult();
    }

    public function getExpense()
    {
        $builder = $this->db->table('expense');

        return $builder
            ->where('companies_id', session()->get('companies_id'))
            ->orderBy('created_at', 'DESC')
            ->get()
            ->getRow();
    }

    public function getExpenseByID($id)
    {
        $builder = $this->db->table('expense');

        return $builder->where('id', $id)->get()->getRow();
    }

    public function insertExpense($data)
    {
        $builder = $this->db->table('expense');

        return $builder->insert($data) ? $this->db->insertID() : false;
    }

    public function updateExpenseByID($id, $data)
    {
        $builder = $this->db->table('expense');

        return $builder->where('id', $id)->update($data);
    }

    public function deleteExpenseByID($id)
    {
        $sql = "DELETE FROM expense WHERE id = $id";

        $builder = $this->db->query($sql);

        return $builder;
    }

    public function getTableExpense($param)
    {
        $date = $param['date'];
        $start = $param['start'];
        $length = $param['length'];
        $companies_id = session()->get('companies_id');

        $sql = "SELECT expense.id,expense.expense_date,expense.amount,expense.comment,expense_group.expense_name,sub_expense_group.sub_expense_name
                FROM expense 
                left join expense_group on expense_group.id = expense.expense_group_id
                left join sub_expense_group on sub_expense_group.id = expense.sub_expense_group_id
                WHERE expense.expense_date = '$date' AND expense.companies_id = $companies_id
                LIMIT $start, $length";
        $builder = $this->db->query($sql);

        return $builder->getResult();
    }

    public function getTableExpensecount($param)
    {
        $date = $param['date'];
        $companies_id = session()->get('companies_id');

        $sql = "SELECT expense.id,expense.expense_date,expense.amount,expense.comment,expense_group.expense_name,sub_expense_group.sub_expense_name
                    from expense 
                    left join expense_group on expense_group.id = expense.expense_group_id
                    left join sub_expense_group on sub_expense_group.id = expense.sub_expense_group_id
                    WHERE expense.expense_date = '$date' AND expense.companies_id = $companies_id
                    ";
        $builder = $this->db->query($sql);

        return $builder->getResult();
    }

    // public function getTableExpenseSearch($param)
    // {
    //     $date = $param['date'];
    //     $search_value = $param['search_value'];
    //     $start = $param['start'];
    //     $length = $param['length'];
    //     $companies_id = session()->get('companies_id');

    //     $sql = "SELECT expense.id,expense.expense_date,expense.amount,expense.comment,expense_group.expense_name,sub_expense_group.sub_expense_name
    //         from expense
    //         left join expense_group on expense_group.id = expense.expense_group_id
    //         left join sub_expense_group on sub_expense_group.id = expense.sub_expense_group_id
    //         WHERE expense.expense_date = '$date' AND expense.companies_id = $companies_id AND ((expense.amount like '%" . $search_value . "%') OR (expense.comment like '%" . $search_value . "%') OR (expense_group.expense_name like '%" . $search_value . "%') OR (sub_expense_group.sub_expense_name like '%" . $search_value . "%'))
    //         limit $start, $length
    //         ";
    //     $builder = $this->db->query($sql);

    //     return $builder->getResult();
    // }

    // public function getTableExpenseSearchcount($param)
    // {
    //     $date = $param['date'];
    //     $search_value = $param['search_value'];
    //     $companies_id = session()->get('companies_id');

    //     $sql = "SELECT expense.id,expense.expense_date,expense.amount,expense.comment,expense_group.expense_name,sub_expense_group.sub_expense_name
    //         from expense
    //         left join expense_group on expense_group.id = expense.expense_group_id
    //         left join sub_expense_group on sub_expense_group.id = expense.sub_expense_group_id
    //         WHERE expense.expense_date = '$date' AND expense.companies_id = $companies_id AND ((expense.amount like '%" . $search_value . "%') OR (expense.comment like '%" . $search_value . "%') OR (expense_group.expense_name like '%" . $search_value . "%') OR (sub_expense_group.sub_expense_name like '%" . $search_value . "%'))
    //         ";
    //     $builder = $this->db->query($sql);

    //     return $builder->getResult();
    // }
    public function getTotalExpense($param)
    {
        $date = $param['date'];
        $companies_id = session()->get('companies_id');

        $sql = "SELECT expense.amount
                FROM expense 
                left join expense_group on expense_group.id = expense.expense_group_id
                left join sub_expense_group on sub_expense_group.id = expense.sub_expense_group_id
                WHERE expense.expense_date = '$date' AND expense.companies_id = $companies_id";
        $builder = $this->db->query($sql);

        return $builder->getResult();
    }

    public function getTableExpenseList($param)
    {
        $date = $param['date'];
        $companies_id = session()->get('companies_id');

        $sql = "SELECT expense.id,expense.expense_date,expense.amount,expense.comment,expense_group.expense_name,sub_expense_group.sub_expense_name,expense_group.id as expense_group_id 
                FROM expense 
                left join expense_group on expense_group.id = expense.expense_group_id
                left join sub_expense_group on sub_expense_group.id = expense.sub_expense_group_id
                WHERE expense.expense_date = '$date' AND expense.companies_id = $companies_id";
        $builder = $this->db->query($sql);

        return $builder->getResult();
    }
}
