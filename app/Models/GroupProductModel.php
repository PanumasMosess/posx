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

    // public function getGroupProductAll()
    // {
    //     $builder = $this->db->table('group_product');
    //     return $builder->get()->getResult();
    // }

    public function getGroupProductAll()
    {
        // $builder = $this->db->table('group_product');

        $sql = "SELECT * FROM group_product WHERE deleted_at IS NULL;";
        $builder = $this->db->query($sql);
        return $builder->getResult();

        // return $builder
        //     ->get()
        //     ->getResult();
    }

    public function getGroupProductByID($id)
    {
        $builder = $this->db->table('group_product');

        return $builder->where('id', $id)->get()->getRow();
    }

    public function insertGroupProduct($data)
    {
        $builder = $this->db->table('group_product');

        return $builder->insert($data) ? $this->db->insertID() : false;
    }

    public function updateGroupProductByID($id, $data)
    {
        $builder = $this->db->table('group_product');

        return $builder->where('id', $id)->update($data);
    }

    public function deleteGroupProductByID($id)
    {
        $sql = "DELETE FROM group_product WHERE id = $id";

        $builder = $this->db->query($sql);

        return $builder;
    }

    // public function insertGroupProduct($GroupProduct)
    // {
    //     $builder_group = $this->db->table('group_product');
    //     $builder_group_product = $builder_group->insert($GroupProduct);

    //     return ($builder_group_product) ? true : false;
    // }


}
