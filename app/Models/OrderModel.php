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


}
