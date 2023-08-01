<?php

namespace App\Models;

use CodeIgniter\Database\ConnectionInterface;

class GroupProductModel
{
    protected $db;
    public function __construct()
    {
        $db = \Config\Database::connect();
        $this->db = &$db;
    }

    public function getGroupProductAll()
    {
        $builder = $this->db->table('group_product');
        return $builder->get()->getResult();
    }

    public function insertGroupProduct($GroupProduct)
    {
        $builder_group = $this->db->table('group_product');
        $builder_group_product = $builder_group->insert($GroupProduct);

        return ($builder_group_product) ? true : false;
    }


}
