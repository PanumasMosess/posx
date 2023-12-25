<?php

namespace App\Models;

use CodeIgniter\Database\ConnectionInterface;

class ReportModel
{

    protected $db;

    public function __construct()
    {
        $db = \Config\Database::connect();
        $this->db = &$db;
    }

    // public function getOrderDashboardDetail($title)
    // {
    //     switch($title) {
    //         case 'Type':
    //             $sql = '
    //                 SELECT 
    //                 tbl1.order_name AS title,
    //                 COUNT(1) AS total, 
    //                 COUNT(1) / t.cnt * 100 AS percentage,
    //                 SUM(price_total)AS SUM_PRICE
    //                 FROM (
    //                     SELECT 
    //                         od.order_name AS order_name,
    //                         group_product.name AS product_group_name,
    //                         order_customer.order_customer_pcs AS pcs,
    //                         (order_customer.order_customer_price * order_customer.order_customer_pcs) AS price_total
    //                     FROM order_customer
    //                     JOIN `order` od ON order_customer.order_code = od.order_code
    //                     JOIN group_product ON od.group_id = group_product.id
    //                     WHERE DATE(order_customer.created_at) = CURDATE()
    //                 ) tbl1 
    //                 CROSS JOIN (SELECT COUNT(1) AS cnt FROM order_customer) t
    //                 GROUP BY tbl1.order_name, t.cnt;
    //             ';
    //             break;

    //         case 'Group':
    //             $sql = '
    //                 SELECT 
    //                 tbl1.product_group_name AS title,
    //                 COUNT(1) AS total, 
    //                 COUNT(1) / t.cnt * 100 AS percentage,
    //                 SUM(price_total)AS SUM_PRICE
    //                 FROM (
    //                     SELECT 
    //                         od.order_name AS order_name,
    //                         group_product.name AS product_group_name,
    //                         order_customer.order_customer_pcs AS pcs,
    //                         (order_customer.order_customer_price * order_customer.order_customer_pcs) AS price_total
    //                     FROM order_customer
    //                     JOIN `order` od ON order_customer.order_code = od.order_code
    //                     JOIN group_product ON od.group_id = group_product.id
    //                     WHERE DATE(order_customer.created_at) = CURDATE()
    //                 ) tbl1 
    //                 CROSS JOIN (SELECT COUNT(1) AS cnt FROM order_customer) t
    //                 GROUP BY tbl1.product_group_name, t.cnt;
    //             ';
    //             break;
    //     }

    //     $builder = $this->db->query($sql);

    //     return $builder->getResult();
    // }

    // public function getOrderDashboardBestSellers($title)
    // {
    //     $sql = "";

    //     switch($title) {
    //         case 'Sales':
    //             $sql = "
    //                 SELECT 
    //                     order_customer_ordername,
    //                     SUM(order_customer_price * order_customer_pcs) AS price
    //                 FROM `order_customer`
    //                 WHERE DATE(created_at) = CURDATE() 
    //                 GROUP BY order_customer_ordername
    //                 ORDER BY price DESC;
    //             ";
    //             break;

    //         case 'Qty':
    //             $sql = "
    //                 SELECT 
    //                     order_customer_ordername,
    //                     SUM(order_customer_pcs) AS psc
    //                 FROM `order_customer`
    //                 WHERE DATE(created_at) = CURDATE() 
    //                 GROUP BY order_customer_ordername
    //                 ORDER BY psc DESC;
    //             ";
    //             break;

    //         case 'Group':
    //             $sql = "";
    //             break;
    //     }

    //     $builder = $this->db->query($sql);

    //     return $builder->getResult();
    // }

    // public function getOrderDashboardVoidItems()
    // {
    //     $sql = "
    //         SELECT *
    //         FROM `order_customer` 
    //         WHERE order_customer_status = 'CANCEL' AND DATE(created_at) = CURDATE() 
    //         ORDER BY created_at DESC
    //     ";

    //     $builder = $this->db->query($sql);

    //     return $builder->getResult();
    // }

    // public function getOrderDashboardBestSellersTopGroup()
    // {
    //     $sql = "
    //         SELECT 
    //             group_product.name AS group_name,
    //             order_customer.order_customer_ordername,
    //             SUM(order_customer.order_customer_pcs) AS pcs,
    //             SUM(order_customer.order_customer_pcs * order_customer.order_customer_price) AS price
    //         FROM order_customer
    //         JOIN `order` od ON order_customer.order_code = od.order_code
    //         JOIN group_product ON od.group_id = group_product.id
    //         WHERE DATE(order_customer.created_at) = CURDATE()
    //         GROUP BY order_customer.order_customer_ordername
    //         ORDER BY order_customer.order_customer_pcs DESC;
    //     ";

    //     $builder = $this->db->query($sql);

    //     return $builder->getResult();
    // }


    public function getIncomeSummaryByDate($from, $to, $companyID)
    {
        $sql = "
            SELECT 
                DATE(created_at) AS Date, 
                COUNT(id) AS Bills,
                SUM(order_discount) AS Discount,
                (SUM(`order_price_sum`) - SUM(order_discount)) AS GrandTotal,
                SUM(`order_price_sum`) AS SubTotal
            FROM order_summary
            WHERE created_at BETWEEN '$from 00:00:00' AND '$to 23:59:59' AND companies_id = $companyID 
            GROUP BY  DATE(created_at)
        ";

        $builder = $this->db->query($sql);

        return $builder->getResult();
    }

    public function getIncomeSummaryPaymentByDate($date, $companyID)
    {
        $sql = "
            SELECT 
                payment_type AS name,
                COUNT(id) AS bills,
                SUM(receive_total) AS amount,
                SUM(change_total) AS amount_free
            FROM `payment_log`
            WHERE created_at BETWEEN '$date 00:00:00' AND '$date 23:59:59' AND companies_id = $companyID
            GROUP BY payment_type
        ";
        $builder = $this->db->query($sql);

        return $builder->getResult();
    }

    public function getSalesByOrderByDate($date, $companyID)
    {
        $sql = "
            SELECT *
            FROM order_summary
            WHERE created_at BETWEEN '$date 00:00:00' AND '$date 23:59:59' AND companies_id = $companyID 
            ORDER BY created_at DESC
        ";

        $builder = $this->db->query($sql);

        return $builder->getResult();
    }

    public function getCancelItemsByDate($date, $companyID)
    {
        $sql = "
            SELECT *
            FROM order_customer
            WHERE created_at BETWEEN '$date 00:00:00' AND '$date 23:59:59' AND companies_id = $companyID AND order_customer_status = 'CANCEL'
            ORDER BY created_at DESC
        ";

        $builder = $this->db->query($sql);

        return $builder->getResult();
    }

    public function ActivityLogByDate($date, $companyID)
    {
        $sql = "
            SELECT *
            FROM activity_logs
            WHERE created_at BETWEEN '$date 00:00:00' AND '$date 23:59:59' AND companies_id = $companyID
            ORDER BY created_at DESC
        ";

        $builder = $this->db->query($sql);

        return $builder->getResult();
    }
}