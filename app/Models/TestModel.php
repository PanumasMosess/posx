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
        $companies_id = session()->get('companies_id');
        switch($title) {
            case 'Type':
                $sql = "
                SELECT 
                tbl1.order_name AS title,
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
                    AND order_customer.companies_id = $companies_id
                ) tbl1 
                CROSS JOIN (SELECT COUNT(1) AS cnt FROM order_customer) t
                GROUP BY tbl1.order_name, t.cnt;
            ";
            break;

            case 'Group':
                $sql = "
                    SELECT 
                    tbl1.product_group_name AS title,
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
                        AND order_customer.companies_id = $companies_id
                    ) tbl1 
                    CROSS JOIN (SELECT COUNT(1) AS cnt FROM order_customer) t
                    GROUP BY tbl1.product_group_name, t.cnt;
                ";
                break;
        }

        $builder = $this->db->query($sql);

        return $builder->getResult();
    }

    public function getOrderDashboardBestSellers($title)
    {
        $companies_id = session()->get('companies_id');
        $sql = "";

        switch($title) {
            case 'Sales':
                $sql = "
                    SELECT 
                        order_customer_ordername,
                        SUM(order_customer_price * order_customer_pcs) AS price
                    FROM `order_customer`
                    WHERE DATE(created_at) = CURDATE() AND companies_id = $companies_id
                    GROUP BY order_customer_ordername
                    ORDER BY price DESC;
                ";
                break;

            case 'Qty':
                $sql = "
                    SELECT 
                        order_customer_ordername,
                        SUM(order_customer_pcs) AS psc
                    FROM `order_customer`
                    WHERE DATE(created_at) = CURDATE() AND companies_id = $companies_id
                    GROUP BY order_customer_ordername
                    ORDER BY psc DESC;
                ";
                break;

            case 'Group':
                $sql = "";
                break;
        }

        $builder = $this->db->query($sql);

        return $builder->getResult();
    }

    public function getOrderDashboardVoidItems()
    {
        $companies_id = session()->get('companies_id');
        $sql = "
            SELECT *
            FROM `order_customer` 
            WHERE order_customer_status = 'CANCEL' AND DATE(created_at) = CURDATE() AND companies_id = $companies_id
            ORDER BY created_at DESC
        ";

        $builder = $this->db->query($sql);

        return $builder->getResult();
    }

    public function getOrderDashboardBestSellersTopGroup()
    {
        $companies_id = session()->get('companies_id');
        $sql = "
            SELECT 
                group_product.name AS group_name,
                order_customer.order_customer_ordername,
                SUM(order_customer.order_customer_pcs) AS pcs,
                SUM(order_customer.order_customer_pcs * order_customer.order_customer_price) AS price
            FROM order_customer
            JOIN `order` od ON order_customer.order_code = od.order_code
            JOIN group_product ON od.group_id = group_product.id
            WHERE DATE(order_customer.created_at) = CURDATE() AND order_customer.companies_id = $companies_id
            GROUP BY order_customer.order_customer_ordername
            ORDER BY order_customer.order_customer_pcs DESC;
        ";

        $builder = $this->db->query($sql);

        return $builder->getResult();
    }
}