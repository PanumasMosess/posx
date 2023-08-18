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
            'stock_posx.stock_code',
            'stock_posx.name',
            'group_product.name',
            'stock_posx.pcs',
            'stock_posx.MIN',
            'stock_posx.price',
            'stock_posx.updated_at',
            null,
            null
        ];

        // Set searchable column fields
        $this->column_search = [
            'stock_posx.stock_code',
            'stock_posx.name',
            'group_product.name',
            'stock_posx.pcs',
            'stock_posx.MIN',
            'stock_posx.price',
            'stock_posx.updated_at'
        ];

        // Set default order
        $this->order = array('stock_posx.stock_code' => 'DESC');

        //=-====================================================================
        /////Stock Formular//////
        // Set orderable column fields
        $this->column_order_formular = [
            'stock_posx.stock_code',
            'stock_posx.name',
            'stock_posx.pcs',
        ];

        // Set searchable column fields
        $this->column_search_formular = [
            'stock_posx.stock_code',
            'stock_posx.name',
            'stock_posx.pcs',
        ];

        // Set default order
        $this->order_formular = array('stock_posx.stock_code' => 'DESC');
        // ========================================================================
        /////Stock Formular Summary//////
        // Set orderable column fields
        $this->column_order_formular_summary = [
            'order.order_name',
            'order.order_name',
            'order.order_name',
            null
        ];

        // Set searchable column fields
        $this->column_search_formular_summary = [
            'order.order_name',
            'order.order_name',
            'order.order_name',
            'order.order_name'
        ];

        // Set default order
        $this->order_formular_summary = array('order.id' => 'DESC');

        // =================================================================================
        /////Stock Transection Summary//////
        // Set orderable column fields
        $this->column_order_transection_summary = [
            'stock_transaction.stock_code',
            'stock_posx.name',
            'stock_transaction.begin',
            'stock_transaction.add',
            'stock_transaction.sold',
            'stock_transaction.adjust',
            'stock_transaction.withdraw ',
            'stock_transaction.return',
            'stock_transaction.balance',
            'stock_transaction.created_at',
        ];

        // Set searchable column fields
        $this->column_search_transection_summary = [
            'stock_transaction.stock_code',
            'stock_transaction.begin',
            'stock_transaction.add',
            'stock_transaction.sold',
            'stock_transaction.adjust',
            'stock_transaction.withdraw ',
            'stock_transaction.return',
            'stock_transaction.balance',
            'stock_transaction.created_at',
            'stock_posx.name',
        ];

        // Set default order
        $this->order_transection_summary = array('stock_transaction.id' => 'DESC');
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
        stock_posx.id,
        stock_posx.stock_code, 
        stock_posx.name, 
        stock_posx.group_id, 
        stock_posx.MAX, 
        stock_posx.MIN, 
        stock_posx.price,
        stock_posx.pcs,
        stock_posx.status_stock,
        stock_posx.supplier_id,
        stock_posx.barcode, 
        stock_posx.src_picture,
        stock_posx.created_by,
        stock_posx.updated_by,
        stock_posx.created_at, 
        stock_posx.updated_at, 
        stock_posx.deleted_at,
        group_product.name as group_name,
        group_product.unit
       ");

        $builder->join('group_product', 'group_product.id = stock_posx.group_id', 'left');
        // $builder->join('car_stock_owner', 'car_stock_owner.car_stock_owner_code = car_stock.car_stock_code', 'left');
        // $builder->join('car_stock_finance', 'car_stock_finance.car_stock_finance_code = car_stock.car_stock_code', 'left');
        $builder->where("status_stock not in ('CANCEL_STOCK')");

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
        stock_posx.id,
        stock_posx.stock_code, 
        stock_posx.name, 
        stock_posx.group_id, 
        stock_posx.MAX, 
        stock_posx.MIN, 
        stock_posx.price,
        stock_posx.pcs,
        stock_posx.status_stock,
        stock_posx.supplier_id,
        stock_posx.barcode, 
        stock_posx.src_picture,
        stock_posx.created_by,
        stock_posx.updated_by,
        stock_posx.created_at, 
        stock_posx.updated_at, 
        stock_posx.deleted_at,
        group_product.name as group_name,
        group_product.unit
        FROM stock_posx
        left join group_product on 
        group_product.id = stock_posx.group_id
        where stock_posx.status_stock not in ('CANCEL_STOCK')
        ORDER BY stock_posx.stock_code DESC
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
       left join group_product b 
       on  b.id = a.group_id
       where a.status_stock not in ('CANCEL_STOCK')
       ORDER BY a.stock_code DESC
        ";

        $builder = $this->db->query($sql);
        return $builder->getResult();
    }

    public function getDataUpdate($id)
    {
        $sql = "SELECT * FROM stock_posx where id = '$id'";

        $builder = $this->db->query($sql);
        return $builder->getRow();
    }

    public function updateStock($stock_data, $id)
    {
        $builder = $this->db->table('stock_posx');

        return $builder->where('id', $id)->update($stock_data);
    }

    public function deleteStock($stock_data, $id)
    {
        $builder = $this->db->table('stock_posx');

        return $builder->where('id', $id)->update($stock_data);
    }

    public function getGroupData()
    {
        $sql = "SELECT * FROM group_product order by id asc";

        $builder = $this->db->query($sql);
        return $builder->getResult();
    }
    public function getSupplierData()
    {
        $sql = "SELECT * FROM supplier order by id asc";

        $builder = $this->db->query($sql);
        return $builder->getResult();
    }

    

    public function insertAdjust($id, $data_stock, $data_stock_transaction)
    {
        $builder_stock = $this->db->table('stock_posx');
        $builder_stock_status = $builder_stock->where('id', $id)->update($data_stock);

        $builder_running = $this->db->table('stock_transaction');
        $builder_running_status = $builder_running->insert($data_stock_transaction);

        return ($builder_stock_status && $builder_running_status) ? true : false;
    }


    public function getTransectionByCode($code)
    {
        $sql = "SELECT 
        a.id ,
        a.stock_code ,
        a.begin ,
        a.add ,
        a.sold, 
        a.adjust, 
        a.withdraw ,
        a.return ,
        a.balance, 
        a.created_at, 
        b.name as name_product,
        c.name as name_group
        FROM stock_transaction  a 
        left join stock_posx b 
        on a.stock_code = b.stock_code  
        left join group_product c 
        on b.group_id = c.id
        where a.stock_code = '$code'";

        $builder = $this->db->query($sql);
        return $builder->getResult();
    }

    public function getOrder()
    {
        $sql = "SELECT * FROM `order`  ORDER by order_name DESC";

        $builder = $this->db->query($sql);
        return $builder->getResult();
    }


    public function _getAllDataStockFormular($post_data)
    {
        // ***************************
        // ดึงข้อมูลตามเงื่อนไข
        // - Search
        // - OrderBy

        $builder = $this->DataStockQueryFormular($post_data);

        // นำ Builder ที่ได้มาลิมิต จาก Length ของ Datable ที่ส่งมา
        if ($post_data['length'] != -1) {
            $builder->limit($post_data['length'], $post_data['start']);
        }

        // ส่งข้อมูลออกไป
        return $builder->get()->getResult();
    }

    private function DataStockQueryFormular($post_data)
    {

        $builder = $this->db->table('stock_posx');

        $builder->select("
        stock_posx.id,
        stock_posx.stock_code, 
        stock_posx.name, 
        stock_posx.group_id, 
        stock_posx.MAX, 
        stock_posx.MIN, 
        stock_posx.price,
        stock_posx.pcs,
        stock_posx.status_stock,
        stock_posx.supplier_id,
        stock_posx.barcode, 
        stock_posx.src_picture,
        stock_posx.created_by,
        stock_posx.updated_by,
        stock_posx.created_at, 
        stock_posx.updated_at, 
        stock_posx.deleted_at,
        group_product.name as group_name,
        group_product.unit
       ");

        $builder->join('group_product', 'group_product.id = stock_posx.group_id', 'left');
        // $builder->join('car_stock_owner', 'car_stock_owner.car_stock_owner_code = car_stock.car_stock_code', 'left');
        // $builder->join('car_stock_finance', 'car_stock_finance.car_stock_finance_code = car_stock.car_stock_code', 'left');
        $builder->where("status_stock not in ('CANCEL_STOCK')");

        $i = 0;
        // loop searchable columns
        foreach ($this->column_search_formular as $item) {

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
                if (count($this->column_search_formular) - 1 == $i) {
                    $builder->like($item, $post_data['search']['value']);
                    // close bracket
                    $builder->groupEnd();
                }
            }

            $i++;
        }

        // มีการ order เข้ามา
        if (isset($post_data['order'])) {
            $builder->orderBy($this->column_order_formular[$post_data['order']['0']['column']], $post_data['order']['0']['dir']);
        }

        // Default
        else if (isset($this->order_formular)) {
            $order = $this->order_formular;
            $builder->orderBy(key($order), $order[key($order)]);
        }

        // Debug คิวรี่ที่ได้
        // px($builder->getCompiledSelect());

        return $builder;
    }

    public function getAllDataStockFilterFormular()
    {

        $sql = "            
        SELECT
        stock_posx.id,
        stock_posx.stock_code, 
        stock_posx.name, 
        stock_posx.group_id, 
        stock_posx.MAX, 
        stock_posx.MIN, 
        stock_posx.price,
        stock_posx.pcs,
        stock_posx.status_stock,
        stock_posx.supplier_id,
        stock_posx.barcode, 
        stock_posx.src_picture,
        stock_posx.created_by,
        stock_posx.updated_by,
        stock_posx.created_at, 
        stock_posx.updated_at, 
        stock_posx.deleted_at,
        group_product.name as group_name,
        group_product.unit
        FROM stock_posx
        left join group_product on 
        group_product.id = stock_posx.group_id
        where stock_posx.status_stock not in ('CANCEL_STOCK')
        ORDER BY stock_posx.stock_code DESC
        ";

        $builder = $this->db->query($sql);
        return $builder->getResult();
    }

    public function insertFormular($data_formular)
    {
        $builder = $this->db->table('stock_formula');
        $builder_status = $builder->insert($data_formular);

        return ($builder_status) ? true : false;
    }


    public function _getAllDataStockFormularSummary($post_data)
    {
        // ***************************
        // ดึงข้อมูลตามเงื่อนไข
        // - Search
        // - OrderBy

        $builder = $this->DataStockQueryFormularSummary($post_data);

        // นำ Builder ที่ได้มาลิมิต จาก Length ของ Datable ที่ส่งมา
        if ($post_data['length'] != -1) {
            $builder->limit($post_data['length'], $post_data['start']);
        }

        // ส่งข้อมูลออกไป
        return $builder->get()->getResult();
    }

    private function DataStockQueryFormularSummary($post_data)
    {

        $builder = $this->db->table('stock_formula');

        $builder->select("
        stock_formula.order_code,stock_formula.id as formular_id, stock_formula.stock_code, 
        stock_formula.formula_pcs, stock_formula.created_by, stock_formula.created_at, order.order_name
        ");

        $builder->join('order', 'order.order_code = stock_formula.order_code', 'left');
        $builder->groupBy('order.order_name');
        // $builder->join('car_stock_owner', 'car_stock_owner.car_stock_owner_code = car_stock.car_stock_code', 'left');
        // $builder->join('car_stock_finance', 'car_stock_finance.car_stock_finance_code = car_stock.car_stock_code', 'left');
        // $builder->where("status_stock not in ('CANCEL_STOCK')");

        $i = 0;
        // loop searchable columns
        foreach ($this->column_search_formular_summary as $item) {

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
                if (count($this->column_search_formular) - 1 == $i) {
                    $builder->like($item, $post_data['search']['value']);
                    // close bracket
                    $builder->groupEnd();
                }
            }

            $i++;
        }

        // มีการ order เข้ามา
        if (isset($post_data['order'])) {
            $builder->orderBy($this->column_order_formular_summary[$post_data['order']['0']['column']], $post_data['order']['0']['dir']);
        }

        // Default
        else if (isset($this->order_formular_summary)) {
            $order = $this->order_formular_summary;
            $builder->orderBy(key($order), $order[key($order)]);
        }

        // Debug คิวรี่ที่ได้
        // px($builder->getCompiledSelect());

        return $builder;
    }

    public function getAllDataStockFilterFormularSummary()
    {

        $sql = "            
        SELECT  a.order_code,a.id as formular_id, a.stock_code, a.formula_pcs, a.created_by, a.created_at, c.order_name
        FROM stock_formula a
        left join `order` c
        on c.order_code = a.order_code
        group by c.order_name
        ";

        $builder = $this->db->query($sql);
        return $builder->getResult();
    }

    public function getTitemListFormularByCode($code)
    {
        $sql = "SELECT a.order_code,a.id as formular_id, a.stock_code, a.formula_pcs, 
        a.created_by, a.created_at, c.order_name, b.name, d.unit as name_unit
        FROM stock_formula a
        left join stock_posx b 
        on b.stock_code = a.stock_code 
        left join `order` c
        on c.order_code = a.order_code
        left join group_product d
        on b.group_id = d.id
        where c.order_code = '$code'";

        $builder = $this->db->query($sql);
        return $builder->getResult();
    }


    public function _getAllDataStockTransectionsSummary($post_data)
    {
        // ***************************
        // ดึงข้อมูลตามเงื่อนไข
        // - Search
        // - OrderBy

        $builder = $this->DataStockQueryTransectionsSummary($post_data);

        // นำ Builder ที่ได้มาลิมิต จาก Length ของ Datable ที่ส่งมา
        if ($post_data['length'] != -1) {
            $builder->limit($post_data['length'], $post_data['start']);
        }

        // ส่งข้อมูลออกไป
        return $builder->get()->getResult();
    }

    private function DataStockQueryTransectionsSummary($post_data)
    {

        $builder = $this->db->table('stock_transaction');

        $builder->select("
        stock_transaction.id ,
        stock_transaction.stock_code ,
        stock_transaction.begin ,
        stock_transaction.add ,
        stock_transaction.sold, 
        stock_transaction.adjust, 
        stock_transaction.withdraw ,
        stock_transaction.return ,
        stock_transaction.balance, 
        stock_transaction.created_at, 
        stock_posx.name as name_product,
        group_product.name as name_group
        ");

        $builder->join('stock_posx', 'stock_posx.stock_code = stock_transaction.stock_code', 'left');
        $builder->join('group_product', 'stock_posx.group_id = group_product.id', 'left');
        // $builder->join('car_stock_owner', 'car_stock_owner.car_stock_owner_code = car_stock.car_stock_code', 'left');
        // $builder->join('car_stock_finance', 'car_stock_finance.car_stock_finance_code = car_stock.car_stock_code', 'left');
        // $builder->where("status_stock not in ('CANCEL_STOCK')");

        $i = 0;
        // loop searchable columns
        foreach ($this->column_search_transection_summary as $item) {

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
                if (count($this->column_search_transection_summary) - 1 == $i) {
                    $builder->like($item, $post_data['search']['value']);
                    // close bracket
                    $builder->groupEnd();
                }
            }

            $i++;
        }

        // มีการ order เข้ามา
        if (isset($post_data['order'])) {
            $builder->orderBy($this->column_order_transection_summary[$post_data['order']['0']['column']], $post_data['order']['0']['dir']);
        }

        // Default
        else if (isset($this->order_transection_summary)) {
            $order = $this->order_transection_summary;
            $builder->orderBy(key($order), $order[key($order)]);
        }

        // Debug คิวรี่ที่ได้
        // px($builder->getCompiledSelect());

        return $builder;
    }

    public function getAllDataStockFilterTransectionSummary()
    {

        $sql = "            
        SELECT 
        a.id ,
        a.stock_code ,
        a.begin ,
        a.add ,
        a.sold, 
        a.adjust, 
        a.withdraw ,
        a.return ,
        a.balance, 
        a.created_at, 
        b.name as name_product,
        c.name as name_group
        FROM stock_transaction  a 
        left join stock_posx b 
        on a.stock_code = b.stock_code  
        left join group_product c 
        on b.group_id = c.id
        ";

        $builder = $this->db->query($sql);
        return $builder->getResult();
    }

    public function deleteFormulaByOrderCode($code)
    {
        $sql = "DELETE FROM stock_formula WHERE order_code = '$code'";
        $builder = $this->db->query($sql);
        return $builder;
    }

    public function deleteFormulaByid($id)
    {
        $sql = "DELETE FROM stock_formula WHERE id = '$id'";
        $builder = $this->db->query($sql);
        return $builder;
    }
}
