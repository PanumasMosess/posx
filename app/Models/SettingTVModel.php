<?php
namespace App\Models;

use CodeIgniter\Database\ConnectionInterface;

class SettingTVModel
{

    protected $db;

    public function __construct()
    {
        $db = \Config\Database::connect();
        $this->db = &$db;
    }

    public function insertPiture($data_picture)
    {
        $builder_Picture = $this->db->table('posx_tv_background');
        $builder_Picture_status = $builder_Picture->insert($data_picture);

        return ($builder_Picture_status) ? true : false;
    }

    public function getPiture()
    {
        $companies_id = session()->get('companies_id');
        $sql = "SELECT * FROM  posx_tv_background WHERE (companies_id = $companies_id)";

        $builder = $this->db->query($sql);
        return $builder->getResult();
    }

    public function getPitureByID($id)
    {
        $builder = $this->db->table('posx_tv_background');

        return $builder->where('id', $id)->get()->getRow();
    }

    public function deletePiture($id)
    {
        $sql = "DELETE FROM posx_tv_background WHERE id = $id";
        $builder = $this->db->query($sql);
        return $builder;
    }

    public function getTVSetting()
    {
        $companies_id = session()->get('companies_id');
        $sql = "SELECT * FROM posx_tv_setting WHERE (companies_id = $companies_id);";
        $builder = $this->db->query($sql);
        return $builder->getRow();
    }

    public function updateTVSettingByID($id, $data)
    {
        $builder = $this->db->table('posx_tv_setting');

        return $builder->where('companies_id', $id)->update($data);
    }

    public function insertTVSetting($data)
    {
        $builder = $this->db->table('posx_tv_setting');

        return $builder->insert($data) ? $this->db->insertID() : false;
    }

    public function getQrData()
    {
        $companies_id = session()->get('companies_id');
        $sql = "SELECT * FROM  table_dynamic JOIN area_table ON area_table.area_code = table_dynamic.area_code WHERE table_dynamic.companies_id = $companies_id AND area_table.companies_id = $companies_id;";

        $builder = $this->db->query($sql);
        return $builder->getResult();
    }


}
