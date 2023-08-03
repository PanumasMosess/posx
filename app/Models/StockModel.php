<?php

namespace App\Models;

use CodeIgniter\Database\ConnectionInterface;

class StockModel
{
    protected $db;
    public function __construct()
    {
        $db = \Config\Database::connect();
        $this->db = &$db;

        // Set orderable column fields
        $this->column_order = [
            'stock_code',
            'name',
            'group_id',
            'pcs',
            'MIN',
            'price',
            'updated_at',
            null,
            null
        ];

        // Set searchable column fields
        $this->column_search = [
            'stock_code',
            'name',
            'group_id',
            'MAX',
            'MIN',
            'price',
            'pcs',
            'status_stock',
            'created_by',
            'created_at'
        ];

        // Set default order
        $this->order = array('stock_code' => 'DESC');
    }

    public function getCodeStock()
    {
        $sql = "SELECT SUBSTRING(stock_code, 5,8) as substr_stock_code  FROM stock_running order by id desc LIMIT 1";
        $builder = $this->db->query($sql);
        return $builder->getResult();
    }

    public function insertStock($stock, $running_code)
    {
        $builder_stock = $this->db->table('stock_posx');
        $builder_stock_status = $builder_stock->insert($stock);

        $builder_running = $this->db->table('stock_running');
        $builder_running_status = $builder_running->insert($running_code);

        return ($builder_stock_status && $builder_running_status) ? true : false;
    }


    public function _getAllDataStock($post_data)
    {
        // ***************************
        // ดึงข้อมูลตามเงื่อนไข
        // - Search
        // - OrderBy

        $builder = $this->DataStockQuery($post_data);

        // นำ Builder ที่ได้มาลิมิต จาก Length ของ Datable ที่ส่งมา
        if ($post_data['length'] != -1) {
            $builder->limit($post_data['length'], $post_data['start']);
        }

        // ส่งข้อมูลออกไป
        return $builder->get()->getResult();
    }

    private function DataStockQuery($post_data)
    {

        $builder = $this->db->table('stock_posx');

        $builder->select("
        stock_code, 
        name, 
        group_id, 
        MAX, 
        MIN, 
        price,
        pcs,
        status_stock,
        supplier_id,
        barcode, 
        src_picture,
        created_by,
        updated_by,
        created_at, 
        updated_at, 
        deleted_at
       ");

        // $builder->join('car_stock_detail_buy', 'car_stock_detail_buy.car_stock_detail_buy_code = car_stock.car_stock_code', 'left');
        // $builder->join('car_stock_owner', 'car_stock_owner.car_stock_owner_code = car_stock.car_stock_code', 'left');
        // $builder->join('car_stock_finance', 'car_stock_finance.car_stock_finance_code = car_stock.car_stock_code', 'left');
        // $builder->where("car_stock_detail_buy_car_build_status not in ('ยกเลิก','ตัดปล่อยรถ')");

        $i = 0;
        // loop searchable columns
        foreach ($this->column_search as $item) {

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
                if (count($this->column_search) - 1 == $i) {
                    $builder->like($item, $post_data['search']['value']);
                    // close bracket
                    $builder->groupEnd();
                }
            }

            $i++;
        }

        // มีการ order เข้ามา
        if (isset($post_data['order'])) {
            $builder->orderBy($this->column_order[$post_data['order']['0']['column']], $post_data['order']['0']['dir']);
        }

        // Default
        else if (isset($this->order)) {
            $order = $this->order;
            $builder->orderBy(key($order), $order[key($order)]);
        }

        // Debug คิวรี่ที่ได้
        // px($builder->getCompiledSelect());

        return $builder;
    }

    public function getAllDataStockFilter()
    {

        $sql = "            
        SELECT
        stock_code, 
        name, 
        group_id, 
        MAX, 
        MIN, 
        price,
        pcs,
        status_stock,
        supplier_id,
        barcode, 
        src_picture,
        created_by,
        updated_by,
        created_at, 
        updated_at, 
        deleted_at
        FROM stock_posx
        ORDER BY stock_code DESC
        ";

        $builder = $this->db->query($sql);
        return $builder->getResult();
    }

    public function countAllDataStock()
    {

        $sql = "
        SELECT COUNT(a.id) 
        AS count_data
       FROM stock_posx  a  
       ORDER BY stock_code DESC
        ";

        $builder = $this->db->query($sql);
        return $builder->getResult();
    }
}
