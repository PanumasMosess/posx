<?php

namespace App\Controllers;

date_default_timezone_set('Asia/Jakarta');

use App\Controllers\BaseController;
use Aws\S3\S3Client;

class SettingController extends BaseController
{

    public function __construct()
    {
        
    }

    public function group_product()
    {
        $data['content'] = 'setting/group_product';
        $data['title'] = 'หมวดสินค้า';
        $data['js_critical'] = ' 
        <script src="' . base_url('/js/setting/group_product.js?v=' . time()) . '"></script>
    ';
        echo view('/app', $data);
    }

    public function insertgroupproduct()
    {
        $buffer_datetime = date("Y-m-d H:i:s");
        $datas = $_POST["data"];
        $count_cycle = 0;

        $check_arr_count = count($datas);

        foreach ($datas as $data) {

            //data group product table
            $data_group_product = [
                'name' => $data[0]['category_name'],
                'unit' => $data[0]['productunit'],
                'created_by' => 'Admin',
                'updated_by' => ''
            ];
            $this->GroupProductModel = new \App\Models\GroupProductModel();
            $create_new = $this->GroupProductModel->insertGroupProduct($data_group_product);

            if ($create_new) {
                $count_cycle++;
            } else {
                return $this->response->setJSON([
                    'status' => 200,
                    'error' => true,
                    'message' => 'เพิ่มไม่สำเร็จ'
                ]);
            }
        }

        if ($check_arr_count == $count_cycle) {
            return $this->response->setJSON([
                'status' => 200,
                'error' => false,
                'message' => 'เพิ่มรายการสำเร็จ'
            ]);
        } else {
            //  ว่าง
        }
    }

}