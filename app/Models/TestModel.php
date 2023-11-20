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
        switch($title) {
            case 'Type':
                $sql = '
                    SELECT 
                    tbl1.order_name,
                    COUNT(1) AS total, 
                    COUNT(1) / t.cnt * 100 AS percentage,
                    SUM(price_total)AS SUM_PRICE
                    FROM (
                        SELECT 
                            od.order_name AS order_name,
                            group_product.name AS product_group_name,
                            order_customer.order_customer_pcs AS pcs,
                            (order_customer.order_customer_price * order_customer.order_customer_pcs) AS price_total
                        FROM order_customer
                        JOIN `order` od ON order_customer.order_code = od.order_code
                        JOIN group_product ON od.group_id = group_product.id
                        WHERE DATE(order_customer.created_at) = CURDATE()
                    ) tbl1 
                    CROSS JOIN (SELECT COUNT(1) AS cnt FROM order_customer) t
                    GROUP BY tbl1.order_name, t.cnt;
                ';
                break;

            case 'Group':
                $sql = '
                    SELECT 
                    tbl1.order_name,
                    COUNT(1) AS total, 
                    COUNT(1) / t.cnt * 100 AS percentage,
                    SUM(price_total)AS SUM_PRICE
                    FROM (
                        SELECT 
                            od.order_name AS order_name,
                            group_product.name AS product_group_name,
                            order_customer.order_customer_pcs AS pcs,
                            (order_customer.order_customer_price * order_customer.order_customer_pcs) AS price_total
                        FROM order_customer
                        JOIN `order` od ON order_customer.order_code = od.order_code
                        JOIN group_product ON od.group_id = group_product.id
                        WHERE DATE(order_customer.created_at) = CURDATE()
                    ) tbl1 
                    CROSS JOIN (SELECT COUNT(1) AS cnt FROM order_customer) t
                    GROUP BY tbl1.order_name, t.cnt;
                ';
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
        $sql = "
            SELECT *
            FROM `order_customer` 
            WHERE order_customer_status = 'CANCEL' AND DATE(created_at) = CURDATE() 
            ORDER BY created_at DESC
        ";

        $builder = $this->db->query($sql);

        return $builder->getResult();
    }

}