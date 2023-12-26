<?php

namespace App\Models;

use CodeIgniter\Database\ConnectionInterface;

class OrderModel
{
    protected $db;
    public function __construct()
    {
        $db = \Config\Database::connect();
        $this->db = &$db;

        // Set orderable column fields
        $this->column_order_order = [
            'order.order_code',
            'order.order_name',
            'group_product.name',
            'order.order_price',
            'order.updated_at',
            null
        ];

        // Set searchable column fields
        $this->column_search_order = [
            'order.order_code',
            'order.order_name',
            'group_product.name',
            'order.order_price',
            'order.updated_at',
            'order.order_name'
        ];

        // Set default order
        $this->order_order = array('order.order_code' => 'DESC');

        ################################################################

        // Set orderable column fields
        $this->column_order_Area = [
            'area_table.area_code',
            'area_table.area_name',
            'area_table.updated_at',
            null
        ];

        // Set searchable column fields
        $this->column_search_Area = [
            'area_table.area_code',
            'area_table.order_name',
            'area_table.updated_at',
            'area_table.area_name'
        ];

        // Set default order
        $this->order_Area = array('area_table.area_code' => 'DESC');

        ##############################################################

        // Set orderable column fields
        $this->column_order_customer = [
            'order.order_code',
            'order.order_name',
            'group_product.name',
            'order.order_price'
        ];

        // Set searchable column fields
        $this->column_search_customer = [
            'order.order_code',
            'order.order_name',
            'group_product.name',
            'order.order_price'
        ];

        // Set default order
        $this->order_customer = array('order.order_code' => 'DESC');

        ##############################################################

    }

    public function _getAllDataOrder($post_data)
    {
        // ***************************
        // ดึงข้อมูลตามเงื่อนไข
        // - Search
        // - OrderBy

        $builder = $this->DataOrderQuery($post_data);

        // นำ Builder ที่ได้มาลิมิต จาก Length ของ Datable ที่ส่งมา
        if ($post_data['length'] != -1) {
            $builder->limit($post_data['length'], $post_data['start']);
        }

        // ส่งข้อมูลออกไป
        return $builder->get()->getResult();
    }

    private function DataOrderQuery($post_data)
    {

        $builder = $this->db->table('order');

        $builder->select("
        order.id,
        order.order_code, 
        order.order_name, 
        order.order_des, 
        order.order_price, 
        order.order_pcs, 
        order.order_status,
        order.src_order_picture,
        order.group_id, 
        order.created_by,
        order.updated_by,
        order.created_at, 
        order.updated_at, 
        order.deleted_at,
        group_product.name as group_name,
        group_product.unit
       ");

        $builder->join('group_product', 'group_product.id = order.group_id', 'left');
        // $builder->join('car_stock_owner', 'car_stock_owner.car_stock_owner_code = car_stock.car_stock_code', 'left');
        // $builder->join('car_stock_finance', 'car_stock_finance.car_stock_finance_code = car_stock.car_stock_code', 'left');
        $builder->where("order.order_status not in ('CANCEL_ORDER')");

        $i = 0;
        // loop searchable columns
        foreach ($this->column_search_order as $item) {

            // if datatable send POST for search
            if ($post_data['search']['value']) {

                // first loop
                if ($i === 0) {
                    // open bracket
                    $builder->groupStart();
                    $builder->like($item, $post_data['search']['value']);
                } else {
                    $builder->orLike($item, $post_data['search']['value']);
                }

                // last loop
                if (count($this->column_search_order) - 1 == $i) {
                    $builder->like($item, $post_data['search']['value']);
                    // close bracket
                    $builder->groupEnd();
                }
            }

            $i++;
        }

        // มีการ order เข้ามา
        if (isset($post_data['order'])) {
            $builder->orderBy($this->column_order_order[$post_data['order']['0']['column']], $post_data['order']['0']['dir']);
        }

        // Default
        else if (isset($this->order_order)) {
            $order = $this->order_order;
            $builder->orderBy(key($order), $order[key($order)]);
        }

        // Debug คิวรี่ที่ได้
        // px($builder->getCompiledSelect());

        return $builder;
    }

    public function getAllDataOrderFilter()
    {

        $sql = "            
        SELECT
        `order`.id,
        `order`.order_code,
        `order`.order_name, 
        `order`.order_des,
        `order`.order_price, 
        `order`.order_pcs, 
        `order`.order_status,
        `order`.src_order_picture,
        `order`.created_by,
        `order`.updated_by,
        `order`.created_at, 
        `order`.updated_at, 
        `order`.deleted_at,
        `order`.group_id,
        group_product.name as group_name,
        group_product.unit
        FROM `order`
        left join group_product
        on group_product.id = `order`.group_id
        where `order`.order_status not in ('CANCEL_ORDER')
        ORDER BY `order`.order_code DESC
        ";

        $builder = $this->db->query($sql);
        return $builder->getResult();
    }

    public function getCodeOrder()
    {
        $sql = "SELECT SUBSTRING(order_code, 5,8) as substr_order_code  FROM order_running order by id desc LIMIT 1";
        $builder = $this->db->query($sql);
        return $builder->getResult();
    }

    public function insertOrder($data_order, $order_running)
    {
        $builder_order = $this->db->table('order');
        $builder_order_status = $builder_order->insert($data_order);

        $builder_running = $this->db->table('order_running');
        $builder_running_status = $builder_running->insert($order_running);

        return ($builder_order_status && $builder_running_status) ? true : false;
    }

    public function getDataUpdate($id)
    {
        $sql = "SELECT * FROM `order` where id = '$id'";

        $builder = $this->db->query($sql);
        return $builder->getRow();
    }

    public function updateOrder($data, $id)
    {
        $builder = $this->db->table('order');

        return $builder->where('id', $id)->update($data);
    }

    public function deleteOrder($data, $id)
    {
        $builder = $this->db->table('order');

        return $builder->where('id', $id)->update($data);
    }


    public function _getAllDataArea($post_data)
    {
        // ***************************
        // ดึงข้อมูลตามเงื่อนไข
        // - Search
        // - OrderBy

        $builder = $this->DataAreaQuery($post_data);

        // นำ Builder ที่ได้มาลิมิต จาก Length ของ Datable ที่ส่งมา
        if ($post_data['length'] != -1) {
            $builder->limit($post_data['length'], $post_data['start']);
        }

        // ส่งข้อมูลออกไป
        return $builder->get()->getResult();
    }

    private function DataAreaQuery($post_data)
    {

        $builder = $this->db->table('area_table');

        $builder->select("
        area_table.id, 
        area_table.area_code ,
        area_table.area_name , 
        area_table.created_by  ,
        area_table.updated_by , 
        area_table.created_at , 
        area_table.updated_at , 
        area_table.deleted_at,  
        area_table.companies_id 
       ");

        // $builder->join('group_product', 'group_product.id = order.group_id', 'left');
        // $builder->join('car_stock_owner', 'car_stock_owner.car_stock_owner_code = car_stock.car_stock_code', 'left');
        // $builder->join('car_stock_finance', 'car_stock_finance.car_stock_finance_code = car_stock.car_stock_code', 'left');
        $builder->where("area_table.deleted_at is null");

        $i = 0;
        // loop searchable columns
        foreach ($this->column_search_Area as $item) {

            // if datatable send POST for search
            if ($post_data['search']['value']) {

                // first loop
                if ($i === 0) {
                    // open bracket
                    $builder->groupStart();
                    $builder->like($item, $post_data['search']['value']);
                } else {
                    $builder->orLike($item, $post_data['search']['value']);
                }

                // last loop
                if (count($this->column_search_Area) - 1 == $i) {
                    $builder->like($item, $post_data['search']['value']);
                    // close bracket
                    $builder->groupEnd();
                }
            }

            $i++;
        }

        // มีการ order เข้ามา
        if (isset($post_data['order'])) {
            $builder->orderBy($this->column_order_Area[$post_data['order']['0']['column']], $post_data['order']['0']['dir']);
        }

        // Default
        else if (isset($this->order_Arae)) {
            $order = $this->order_Arae;
            $builder->orderBy(key($order), $order[key($order)]);
        }

        // Debug คิวรี่ที่ได้
        // px($builder->getCompiledSelect());

        return $builder;
    }

    public function getAllDataAreaFilter()
    {

        $sql = "            
        SELECT 
         area_table.id, 
         area_table.area_code, 
         area_table.area_name,
         area_table.created_by, 
         area_table.updated_by ,
         area_table.created_at,  
         area_table.updated_at,  
         area_table.deleted_at,  
         area_table.companies_id
         FROM area_table
         WHERE area_table.deleted_at is null
        ";

        $builder = $this->db->query($sql);
        return $builder->getResult();
    }

    public function getCodeArea()
    {
        $sql = "SELECT SUBSTRING(area_code, 5,8) as substr_area_code  FROM area_running order by id desc LIMIT 1";
        $builder = $this->db->query($sql);
        return $builder->getResult();
    }

    public function insertArea($data_area, $area_running)
    {
        $builder_area = $this->db->table('area_table');
        $builder_area_status = $builder_area->insert($data_area);

        $builder_running = $this->db->table('area_running');
        $builder_running_status = $builder_running->insert($area_running);

        return ($builder_area_status && $builder_running_status) ? true : false;
    }

    public function getDataUpdateArea($id = null)
    {
        $sql = "SELECT * FROM `area_table` where id = '$id'";

        $builder = $this->db->query($sql);
        return $builder->getRow();
    }

    public function updateAere($data, $id)
    {
        $builder = $this->db->table('area_table');

        return $builder->where('id', $id)->update($data);
    }

    public function deleteArea($id)
    {
        $builder = $this->db->table('area_table');

        return $builder->where('id', $id)->delete();
    }

    public function getCodeTable()
    {
        $sql = "SELECT SUBSTRING(table_code, 5,8) as substr_table_code  FROM table_dynamic_running order by id desc LIMIT 1";
        $builder = $this->db->query($sql);
        return $builder->getResult();
    }

    public function insertTable($data_table, $table_running)
    {
        $builder_table = $this->db->table('table_dynamic');
        $builder_table_status = $builder_table->insert($data_table);

        $builder_running = $this->db->table('table_dynamic_running');
        $builder_running_status = $builder_running->insert($table_running);

        return ($builder_table_status && $builder_running_status) ? true : false;
    }

    public function getTableInArea($code_area)
    {
        $sql = "SELECT * FROM `table_dynamic` where area_code = '$code_area'";

        $builder = $this->db->query($sql);
        return $builder->getResult();
    }

    public function checkIDUpdateTable($id_div)
    {
        $sql = "SELECT div_id FROM `table_dynamic` where div_id = '$id_div'";
        $builder = $this->db->query($sql);
        return $builder->getRow();
    }

    public function updatePositionTable($data, $id_div)
    {
        $builder = $this->db->table('table_dynamic');

        return $builder->where('div_id', $id_div)->update($data);
    }

    public function deleteTable($id, $code)
    {
        $builder = $this->db->table('table_dynamic');
        $array = array('div_id' => $id, 'area_code' => $code);

        return $builder->where($array)->delete();
    }

    public function getDataUpdateTable($id_div)
    {
        $sql = "SELECT * FROM `table_dynamic` where div_id = '$id_div'";

        $builder = $this->db->query($sql);
        return $builder->getRow();
    }

    public function updateTableDetail($data, $id_div, $area_id)
    {
        $builder = $this->db->table('table_dynamic');
        $array = array('div_id' => $id_div, 'area_code' => $area_id);

        return $builder->where($array)->update($data);
    }

    public function getTableDetailByCode($tableCode = null)
    {
        $sql = "SELECT * FROM `table_dynamic` where table_code = '$tableCode'";

        $builder = $this->db->query($sql);
        return $builder->getRow();
    }

    public function _getAllDataOrderCustomer($post_data)
    {
        $builder = $this->DataOrderCustomerQuery($post_data);

        // นำ Builder ที่ได้มาลิมิต จาก Length ของ Datable ที่ส่งมา
        if ($post_data['length'] != -1) {
            $builder->limit($post_data['length'], $post_data['start']);
        }

        // ส่งข้อมูลออกไป
        return $builder->get()->getResult();
    }

    private function DataOrderCustomerQuery($post_data)
    {

        $builder = $this->db->table('order');

        $builder->select("
        order.id, 
        order.order_code,
        order.order_name, 
        order.order_price ,
        order.order_status,
        order.src_order_picture , 
        order.group_id , 
        order.companies_id ,
        group_product.name,
        group_product.printer_name,
        order.order_promotion,
        order.order_pcs
       ");

        // $builder->join('stock_formula', 'order.order_code = stock_formula.order_code', 'right');
        $builder->join('group_product', 'order.group_id = group_product.id', 'left');
        // $builder->join('car_stock_finance', 'car_stock_finance.car_stock_finance_code = car_stock.car_stock_code', 'left');
        // $builder->groupBy("stock_formula.order_code");
        $builder->where('order_status !=', 'CANCEL_ORDER');

        $i = 0;
        $i2 = 0;
        // loop searchable columns
        foreach ($this->column_search_customer as $item) {

            // if datatable send POST for search
            if ($post_data['search']['value']) {

                // first loop
                if ($i === 0) {
                    // open bracket
                    $builder->groupStart();
                    $builder->like($item, $post_data['search']['value']);
                } else {
                    $builder->orLike($item, $post_data['search']['value']);
                }

                // last loop
                if (count($this->column_search_customer) - 1 == $i) {
                    $builder->like($item, $post_data['search']['value']);
                    // close bracket
                    $builder->groupEnd();
                }
            }

            $i++;


            // if datatable send POST for search
            if ($post_data['columns'][2]['search']['value']) {

                // first loop
                if ($i2 === 0) {
                    // open bracket
                    $builder->groupStart();
                    $builder->like($item, $post_data['columns'][2]['search']['value']);
                } else {
                    $builder->orLike($item, $post_data['columns'][2]['search']['value']);
                }

                // last loop
                if (count($this->column_search_customer) - 1 == $i2) {
                    $builder->like($item, $post_data['columns'][2]['search']['value']);
                    // close bracket
                    $builder->groupEnd();
                }
            }

            $i2++;
        }

        // มีการ order เข้ามา
        if (isset($post_data['order'])) {
            $builder->orderBy($this->column_order_customer[$post_data['order']['0']['column']], $post_data['order']['0']['dir']);
        }

        // Default
        else if (isset($this->order_customer)) {
            $order = $this->order_customer;
            $builder->orderBy(key($order), $order[key($order)]);
        }

        // Debug คิวรี่ที่ได้
        // px($builder->getCompiledSelect());

        return $builder;
    }

    public function getAllDataOrderCustomerFilter()
    {

        // $sql = "            
        // select
        // a.id, 
        // a.order_code ,
        // a.order_name , 
        // a.order_price  ,
        // a.src_order_picture , 
        // a.order_status,
        // a.group_id , 
        // a.companies_id ,
        // a.order_promotion,
        // a.order_pcs,
        // c.`name`
        // from `order` a 
        // right join stock_formula b  on 
        // a.order_code = b.order_code 
        // left join group_product c on  
        // a.group_id = c.id
        // group by b.order_code
        // ";

        $sql = "            
        select
        a.id, 
        a.order_code ,
        a.order_name , 
        a.order_price  ,
        a.src_order_picture , 
        a.order_status,
        a.group_id , 
        a.companies_id ,
        a.order_promotion,
        a.order_pcs,
        c.`name`,
        c.printer_name
        from `order` a 
        left join group_product c on  
        a.group_id = c.id 
        WHERE a.order_status != 'CANCEL_ORDER'
        ";

        $builder = $this->db->query($sql);
        return $builder->getResult();
    }


    public function getOrderCustomersToday($type)
    {
        $sql = "
            SELECT *
            FROM `order_customer` 
            WHERE DATE(created_at) = CURDATE()
            ORDER BY created_at DESC
        ";

        $builder = $this->db->query($sql);

        return $builder->getResult();
    }

    public function getOrderCustomersSummaryToday()
    {
        $sql = "
            SELECT *
            FROM `order_summary` 
            WHERE DATE(created_at) = CURDATE()
            ORDER BY created_at DESC
        ";

        $builder = $this->db->query($sql);

        return $builder->getResult();
    }

    public function getOrderCustomersSummaryTodayByOrderStatus($orderStatus)
    {
        $condition = " AND order_status != 'CANCEL'";

        if ($orderStatus != NULL) {
            $condition = " AND order_status = '$orderStatus'";
        }

        $sql = "
            SELECT *
            FROM `order_summary` 
            WHERE DATE(created_at) = CURDATE() $condition
            ORDER BY created_at DESC
        ";

        $builder = $this->db->query($sql);

        return $builder->getResult();
    }

    public function getDataSummaryToday()
    {
        $sql = "
            SELECT 
                SUM(order_price_sum) AS TOTAL,
                SUM(order_discount) AS DISCOUNT_ITEMS,
                SUM(order_service) AS SERVICE,
                0 AS DISCOUNT_BILL,
                SUM(order_card_charge) AS CREDITCARD_CHARGE,
                SUM(order_vat) AS VAT
            FROM `order_summary` 
            WHERE DATE(created_at) = CURDATE()
            ORDER BY created_at DESC
        ";

        $builder = $this->db->query($sql);

        return $builder->getRow();
    }

    public function getFormulaTransectionByOrder()
    {
    }

    public function getStockTransectionByOrder()
    {
    }

    public function insertOrderCustomer($data, $running, $datacount = null, $status)
    {
        $builder_table = $this->db->table('order_customer');
        $builder_table_status = $builder_table->insert($data);

        if (($datacount == 0) && ($status == null)) {
            $builder_running = $this->db->table('order_customer_running');
            $builder_running_status = $builder_running->insert($running);
        }


        return ($builder_table_status) ? true : false;
    }

    public function insertOrderCustomerCaseComment($data)
    {
        $builder_table = $this->db->table('order_customer');
        $builder_table_status = $builder_table->insert($data);

        return ($builder_table_status) ? true : false;
    }

    public function insertOrderPrintLog($data)
    {
        $builder_print = $this->db->table('order_print_log');
        $builder_print_status = $builder_print->insert($data);

        return ($builder_print_status) ? true : false;
    }

    public function insertOrderCustomerSummary($data, $table, $table_code)
    {
        $builder_summary = $this->db->table('order_summary');
        $builder_summary_status = $builder_summary->insert($data);

        $builder_table = $this->db->table('table_dynamic');
        $builder_table_status =  $builder_table->where('table_code', $table_code)->update($table);

        return ($builder_summary_status && $builder_table_status)  ? true : false;
    }

    public function getCodeCustomerOrder()
    {
        $sql = "SELECT SUBSTRING(order_customer_code, 5,8) as substr_order_cus_code  FROM order_customer_running order by id desc LIMIT 1";
        $builder = $this->db->query($sql);
        return $builder->getResult();
    }

    public function getSummayByTable($code)
    {
        $sql = "SELECT * FROM `order_summary` where order_table_code = '$code' and order_status = 'IN_KITCHEN'";
        $builder = $this->db->query($sql);
        return $builder->getRow();
    }

    public function updateTableMove($detail = null, $detail_sum = null, $table_old = null, $table_new = null, $code_old = null, $code_new = null)
    {
        $builder = $this->db->table('order_customer');
        $array_order = array('order_customer_table_code' => $code_old, 'order_customer_status' => 'IN_KITCHEN');
        $builder_status = $builder->where($array_order)->update($detail);

        $builder_summary = $this->db->table('order_summary');
        $array_summary = array('order_table_code' => $code_old, 'order_status' => 'IN_KITCHEN');
        $builder_summary_status = $builder_summary->where($array_summary)->update($detail_sum);

        $builder_table_dynamic_old = $this->db->table('table_dynamic');
        $array_table_dynamic_old = array('table_code' => $code_old, 'table_status' => 'USE');
        $builder_table_dynamic_old_status = $builder_table_dynamic_old->where($array_table_dynamic_old)->update($table_old);

        $builder_table_dynamic_new = $this->db->table('table_dynamic');
        $array_table_dynamic_new = array('table_code' => $code_new);
        $builder_table_dynamic_new_status = $builder_table_dynamic_new->where($array_table_dynamic_new)->update($table_new);

        return ($builder_status && $builder_summary_status && $builder_table_dynamic_old_status && $builder_table_dynamic_new_status) ? true : false;
    }

    public function updateOrderCencel($detail = null, $detail_sum = null, $table = null, $code_table = null)
    {
        $builder = $this->db->table('order_customer');
        $array_order = array('order_customer_table_code' => $code_table, 'order_customer_status' => 'IN_KITCHEN');
        $builder_status = $builder->where($array_order)->update($detail);

        $builder_summary = $this->db->table('order_summary');
        $array_summary = array('order_table_code' => $code_table, 'order_status' => 'IN_KITCHEN');
        $builder_summary_status = $builder_summary->where($array_summary)->update($detail_sum);

        $builder_table_dynamic_new = $this->db->table('table_dynamic');
        $array_table_dynamic_new = array('table_code' => $code_table, 'table_status' => 'USE');
        $builder_table_dynamic_new_status = $builder_table_dynamic_new->where($array_table_dynamic_new)->update($table);

        return ($builder_status && $builder_summary_status  && $builder_table_dynamic_new_status) ? true : false;
    }

    public function getOutofstock($code = null)
    {
        $sql = "SELECT * FROM stock_formula 
        where order_code = '$code'
        ORDER BY order_code DESC
        ";
        $builder = $this->db->query($sql);
        return $builder->getResult();
    }

    public function getStockTransectionUpdate($stock_code = null)
    {
        $sql = "SELECT * FROM stock_posx 
        where stock_code = '$stock_code'
        ORDER BY stock_code DESC
        ";
        $builder = $this->db->query($sql);
        return $builder->getRow();
    }

    public function updateTransectionSold($stock_code, $data_trans, $stock_pcs)
    {

        $builder_stock_transaction = $this->db->table('stock_transaction');
        $builder_stock_transaction_status = $builder_stock_transaction->insert($data_trans);

        $builder_stock_pcs = $this->db->table('stock_posx');
        $array_stock_pcs = array('stock_code' => $stock_code, 'status_stock' => 'IN_STOCK');
        $builder_stock_pcs_status = $builder_stock_pcs->where($array_stock_pcs)->update($stock_pcs);


        return ($builder_stock_pcs_status && $builder_stock_transaction_status) ? true : false;
    }

    public function getOrderListByTable($table_code = null)
    {
        $sql = "SELECT *, a.id as id_order, b.id as id_table FROM order_customer as a
        left join `order` as b
        on a.order_code = b.order_code
        where order_customer_table_code = '$table_code' and a.order_customer_status = 'IN_KITCHEN'
        ORDER BY a.order_code DESC
        ";
        $builder = $this->db->query($sql);
        return $builder->getResult();
    }

    public function getStatusOrderRunning($order_code, $order_customer_table_code)
    {
        $sql = "SELECT (IF(EXISTS(SELECT * FROM order_customer 
        WHERE  order_code ='$order_code' and  order_customer_status = 'IN_KITCHEN'
        and order_customer_table_code = '$order_customer_table_code'),'true','false' ))  
        AS result";

        $builder = $this->db->query($sql);
        return $builder->getRow();
    }

    public function getStatusOrderSummary($order_customer_table_code)
    {
        $sql = "SELECT (IF(EXISTS(SELECT * FROM order_summary 
        WHERE  order_status = 'IN_KITCHEN'
        and order_table_code = '$order_customer_table_code'), 'true','false' ))  
        AS result";

        $builder = $this->db->query($sql);
        return $builder->getRow();
    }

    public function getOrderRunning($order_code, $order_customer_table_code)
    {
        $sql = "SELECT * FROM order_customer  WHERE 
        order_code ='$order_code' and  
        order_customer_status = 'IN_KITCHEN' and 
        order_customer_table_code = '$order_customer_table_code'";

        $builder = $this->db->query($sql);
        return $builder->getRow();
    }

    public function getOrderSummaryRuning($order_customer_table_code)
    {
        $sql = "SELECT * FROM order_summary  WHERE 
        order_status = 'IN_KITCHEN' and 
        order_table_code = '$order_customer_table_code'";

        $builder = $this->db->query($sql);
        return $builder->getRow();
    }

    public function getOrderByOrderCustomerCode($order_customer_code)
    {
        $sql = "SELECT * FROM order_customer   as a
        left join `order` as b
        on a.order_code = b.order_code  WHERE 
        a.order_customer_status = 'IN_KITCHEN' and 
        a.order_customer_code = '$order_customer_code'";

        $builder = $this->db->query($sql);
        return $builder->getResult();
    }

    public function updateOrderCustomer($data_order, $order_code,  $order_customer_table_code)
    {
        $builder_order_update = $this->db->table('order_customer');
        $array_order_update = array('order_code' => $order_code, 'order_customer_status' => 'IN_KITCHEN', 'order_customer_table_code' => $order_customer_table_code, 'order_customer_des' => '');
        $builder_order_update_status = $builder_order_update->where($array_order_update)->update($data_order);
        return ($builder_order_update_status) ? true : false;
    }

    public function updateOrderCustomerPCS($data_order, $id_code)
    {
        $builder_order_update = $this->db->table('order_customer');
        $array_order_update = array('order_customer_status' => 'IN_KITCHEN', 'id' => $id_code);
        $builder_order_update_status = $builder_order_update->where($array_order_update)->update($data_order);
        return ($builder_order_update_status) ? true : false;
    }

    public function updateOrderCustomerCancel($data_order, $id_code)
    {
        $builder_order_update = $this->db->table('order_customer');
        $array_order_update = array('order_customer_status' => 'IN_KITCHEN', 'id' => $id_code);
        $builder_order_update_status = $builder_order_update->where($array_order_update)->update($data_order);
        return ($builder_order_update_status) ? true : false;
    }

    public function updateOrderCustomerSummary($data_order, $order_customer_table_code)
    {
        $builder_order_sum_update = $this->db->table('order_summary');
        $array_order_sum_update = array('order_status' => 'IN_KITCHEN', 'order_table_code' => $order_customer_table_code);
        $builder_order_sum_update_status = $builder_order_sum_update->where($array_order_sum_update)->update($data_order);
        return ($builder_order_sum_update_status) ? true : false;
    }


    public function updateOrderCustomerSummaryPCS($data_order, $order_customer_code)
    {
        $builder_order_sum_update = $this->db->table('order_summary');
        $array_order_sum_update = array('order_status' => 'IN_KITCHEN', 'order_customer_code' => $order_customer_code);
        $builder_order_sum_update_status = $builder_order_sum_update->where($array_order_sum_update)->update($data_order);
        return ($builder_order_sum_update_status) ? true : false;
    }


    public function getOrderByOrderCode($orderCode)
    {
        $builder = $this->db->table('order_customer');

        return $builder
            ->where('order_customer_code', $orderCode)
            ->orderBy('created_at', 'DESC')
            ->get()
            ->getResult();
    }

    public function getOrderSummaryByOrderCode($orderCode)
    {
        $builder = $this->db->table('order_summary');

        return $builder
            ->where('order_customer_code', $orderCode)
            ->get()
            ->getRow();
    }

    public function getOrderByType($type)
    {

        switch ($type) {
            case 'NORMAL':
                $sql = "
                    SELECT *
                    FROM `order_summary` 
                    WHERE DATE(created_at) = CURDATE() AND order_status != 'CANCEL'
                    ORDER BY created_at DESC
                ";
                break;

            case 'CANCEL':
                $sql = "
                    SELECT *
                    FROM `order_summary` 
                    WHERE DATE(created_at) = CURDATE() AND order_status = 'CANCEL'
                    ORDER BY created_at DESC
                ";
                break;
        }

        $builder = $this->db->query($sql);

        return $builder->getResult();
    }

    public function updateOrderCustomerByOrderCustomerCode($orderCustomerCode, $data)
    {
        $builder = $this->db->table('order_customer');

        return $builder->where('order_customer_code', $orderCustomerCode)->update($data);
    }

    public function updateOrderSummaryByOrderCustomerCode($orderCustomerCode, $data)
    {
        $builder = $this->db->table('order_summary');

        return $builder->where('order_customer_code', $orderCustomerCode)->update($data);
    }

    public function getTypePlayMentModel()
    {
        $sql = "SELECT * FROM payment_type ORDER BY id DESC";
        $builder = $this->db->query($sql);
        return $builder->getResult();
    }

    public function insertNewPaymentLog($data_detail, $custome_code, $table_code)
    {

        $buffer_datetime = date("Y-m-d H:i:s");

        $builder_insert_payment = $this->db->table('payment_log');
        $builder_insert_payment_status = $builder_insert_payment->insert($data_detail);

        $data_order = [
            'order_customer_status' => 'FINISH',
            'updated_at' => $buffer_datetime,
            'updated_by' => session()->get('username')
        ];

        $builder_order_update = $this->db->table('order_customer');
        $array_order_update = array('order_customer_code' => $custome_code, 'order_customer_status' => 'IN_KITCHEN', 'order_customer_table_code' => $table_code);
        $builder_order_update_status = $builder_order_update->where($array_order_update)->update($data_order);


        $data_order_summary = [
            'order_status' => 'FINISH',
            'updated_at' => $buffer_datetime,
            'updated_by' => session()->get('username')
        ];

        $builder_order_sum_update = $this->db->table('order_summary');
        $array_order_sum_update = array('order_customer_code' => $custome_code, 'order_status' => 'IN_KITCHEN', 'order_table_code' => $table_code);
        $builder_order_sum_update_status = $builder_order_sum_update->where($array_order_sum_update)->update($data_order_summary);


        $data_table = [
            'table_status' => 'FINISH',
            'updated_at' => $buffer_datetime,
            'updated_by' => session()->get('username')
        ];

        $builder_table_update = $this->db->table('table_dynamic');
        $array_table = array('table_status' => 'USE', 'table_code' => $table_code);
        $builder_table_update_status = $builder_table_update->where($array_table)->update($data_table);


        return ($builder_insert_payment_status && $builder_order_update_status && $builder_order_sum_update_status && $builder_table_update_status) ? true : false;
    }

    public function getTableByTableCode($code)
    {
        $companies_id = session()->get('companies_id');
        $sql = "SELECT * FROM table_dynamic WHERE table_code = '$code' AND companies_id = $companies_id";
        $builder = $this->db->query($sql);
        return $builder->getRow();
    }

    public function getOrderPrintLogByOrderCustomerCode($code, $printer_name)
    {
        $companies_id = session()->get('companies_id');
        $sql = "SELECT * FROM order_print_log WHERE order_customer_code = '$code' AND companies_id = $companies_id AND order_print_status = 'WAIT_PRINT' AND printer_name = '$printer_name'";
        $builder = $this->db->query($sql);
        return $builder->getResult();
    }

    public function updateOrderPrintLogByOrderCustomerCode($id, $data, $printer)
    {

        $builder = $this->db->table('order_print_log');

        $builder->where('order_customer_code', $id);
        $builder->where('order_print_status', 'WAIT_PRINT'); // เพิ่มเงื่อนไข WHERE ใหม่
        $builder->where('printer_name', $printer);

        // ทำการอัปเดตข้อมูล
        return $builder->update($data);
    }

    public function getPaymentLogByOrderCustomerCode($order_customer_code)
    {
        $companies_id = session()->get('companies_id');
        $sql = "SELECT * FROM payment_log WHERE order_customer_code = '$order_customer_code' AND companies_id = $companies_id";
        $builder = $this->db->query($sql);
        return $builder->getRow();
    }

    public function getOrderSummaryFinish($order_customer_code)
    {
        $sql = "SELECT * FROM order_summary  WHERE order_customer_code = '$order_customer_code'";
        $builder = $this->db->query($sql);
        return $builder->getRow();
    }

    public function getOrderListByFinish($order_customer_code = null)
    {
        $sql = "SELECT *, a.id as id_order, b.id as id_table FROM order_customer as a
        left join `order` as b
        on a.order_code = b.order_code
        where order_customer_code = '$order_customer_code' and a.order_customer_status = 'FINISH'
        ORDER BY a.order_code DESC
        ";
        $builder = $this->db->query($sql);
        return $builder->getResult();
    }

    public function getStatusPrintMoblie()
    {
        $companies_id = session()->get('companies_id');

        $sql = "SELECT * FROM posx_mobile_status_print
        WHERE status = 'WAIT_PRINT' and companies_id = '$companies_id'
        ORDER BY id ASC LIMIT 1
        ";

        $builder = $this->db->query($sql);
        return $builder->getRow();
    }

    public function getPrintBuyTableCode($table_code = null)
    {
        $companies_id = session()->get('companies_id');

        $sql = "SELECT * FROM order_print_log
        WHERE order_table_code = '$table_code' and companies_id = '$companies_id' and order_print_status = 'WAIT_PRINT'
        ";

        $builder = $this->db->query($sql);
        return $builder->getRow();
    }

    public function updateWaitPrintMobile($data, $table_code)
    {

        $companies_id = session()->get('companies_id');

        $builder = $this->db->table('posx_mobile_status_print');

        $builder->where('order_customer_table_code', $table_code);
        $builder->where('status', 'WAIT_PRINT'); // เพิ่มเงื่อนไข WHERE ใหม่
        $builder->where('companies_id', $companies_id);

        // ทำการอัปเดตข้อมูล
        return $builder->update($data);
    }

    public function getDataPrintterName($order_code)
    {
        $companies_id = session()->get('companies_id');

        $sql = "SELECT printer_name FROM order_print_log where companies_id = '$companies_id' 
        and order_customer_code = '$order_code' and order_print_status = 'WAIT_PRINT' 
        group by printer_name";

        $builder = $this->db->query($sql);
        return $builder->getResult();
    }

}
