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


}
