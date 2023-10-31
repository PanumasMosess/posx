<?php

namespace App\Models;

use CodeIgniter\Database\ConnectionInterface;

class TestModel
{

    protected $db;

    public function __construct()
    {
        $db = \Config\Database::connect();
        $this->db = &$db;
    }

    public function getOrderDashboardDetail($title)
    {
        $sql = "
            SELECT * FROM order_customer
            JOIN order ON order_customer. order_code = order.order_code
        ";

        switch($title) {
            case 'Type':
                break;

            case 'Group':
                break;
        }

        $builder = $this->db->query($sql);

        return $builder->getResult();
    }

    public function getOrderDashboardBestSellers($title)
    {
        $sql = "";

        switch($title) {
            case 'Sales':
                break;

            case 'Qty':
                break;

            case 'Group':
                break;
        }

        $builder = $this->db->query($sql);

        return $builder->getResult();
    }


    public function getOrderDashboardVoidItems()
    {
        $sql = "";

        $builder = $this->db->query($sql);

        return $builder->getResult();
    }

}