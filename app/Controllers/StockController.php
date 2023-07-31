<?php

namespace App\Controllers;

date_default_timezone_set('Asia/Jakarta');

use App\Controllers\BaseController;
use Aws\S3\S3Client;

class StockController extends BaseController
{

    public function __construct()
    {
        // Model
        $this->StockModel = new \App\Models\StockModel();;
    }

    public function index()
    {
        $data['content'] = 'stock/index';
        $data['title'] = ' สต๊อกสินค้า';
        $data['css_critical'] = '<link rel="stylesheet" href="' . base_url('css/err_style.css') . '" />';
        $data['js_critical'] = ' 
            <script src="' . base_url('/js/notify/js/notifIt.js') . '"></script>
            <script src="' . base_url('/js/stock/stock_index.js?v=' . time()) . '"></script>
        ';
        echo view('/app', $data);
    }

    public function insertproduct()
    {
        $buffer_datetime = date("Y-m-d H:i:s");
        $datas = $_POST["data"];
        $count_cycle = 0;

        $check_arr_count = count($datas);

        foreach ($datas as $data) {
            // var_dump($data[0]['productname']. "->" . $data[0]['category']. "->" . $data[0]['price']);    
            $stock_running_code = '';
            $buffer_stock_code = 0;
            $new_running_codes = $this->StockModel->getCodeStock();

            foreach ($new_running_codes as $running_code) {
                $buffer_stock_code = (int)$running_code->substr_stock_code;
            }

            $sum_stock_code = $buffer_stock_code + 1;
            $sprintf_stock_code = sprintf("%08d", $sum_stock_code);
            $stock_running_code = "POXS" . $sprintf_stock_code;

            //data stock table
            $data_stock = [
                'stock_code' => $stock_running_code,
                'name' => $data[0]['productname'],
                'MAX' => $data[0]['max'],
                'MIN' => $data[0]['min'],
                'price' =>  $data[0]['price'],
                'pcs' =>  $data[0]['pcs'],
                'status_stock' => 'IN_STOCK',
                'src_picture' => '',
                'created_by' => 'Admin'
            ];

            $data_stock_runing = [
                'stock_code' => $stock_running_code
            ];

            $create_new = $this->StockModel->insertStock($data_stock, $data_stock_runing);

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
