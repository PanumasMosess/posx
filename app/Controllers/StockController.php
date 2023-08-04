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
        $this->StockModel = new \App\Models\StockModel();
    }

    public function index()
    {
        $data['content'] = 'stock/index';
        $data['title'] = ' สต๊อกสินค้า';
        $data['css_critical'] = '<link rel="stylesheet" href="' . base_url('css/err_style.css') . '" />';
        $data['js_critical'] = ' 
            <script src="' . base_url('/js/notify/js/notifIt.js') . '"></script>
            <script src="' . base_url('/js/base64/jquery.base64.min.js') . '"></script>
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

            $file = $data[0]['src_picture'];

            $new_file = explode(";", $file);
            $new_file_move = explode(",", $file);
            $type = $new_file[0];
            $type_real = explode("/", $type);

            // var_dump($type_real[1]);
            // exit;

            file_put_contents('uploads/temps_stock/' . $stock_running_code . '.' . $type_real[1], base64_decode($new_file_move[1]));

            //data stock table
            $data_stock = [
                'stock_code' => $stock_running_code,
                'name' => $data[0]['name'],
                'MAX' => $data[0]['MAX'],
                'MIN' => $data[0]['MIN'],
                'price' =>  $data[0]['price'],
                'pcs' =>  $data[0]['pcs'],
                'status_stock' => 'IN_STOCK',
                'src_picture' => 'uploads/temps_stock/' . $stock_running_code . '.' . $type_real[1],
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

    public function fetchDataStock()
    {
        $datas_stock = $this->StockModel->_getAllDataStock($_POST);

        $datas_count = $this->StockModel->countAllDataStock();

        $filter = $this->StockModel->getAllDataStockFilter();

        $total_records = $datas_count;

        return $this->response->setJSON([
            'draw' => $_POST['draw'],
            'recordsTotal' => $total_records,
            'recordsFiltered' => count($filter),
            "data" => $datas_stock,
        ]);
    }

    public function fetchDataStockOffline()
    {
        $datas_stock = $this->StockModel->getAllDataStockFilter();
        return $this->response->setJSON([
            "data" => $datas_stock,
        ]);
    }

    public function fetchUpdateStock($id = null)
    {
        $look_data = $this->StockModel->getDataUpdate($id);

        return $this->response->setJSON([
            'status' => 200,
            'error' => false,
            'data' => $look_data
        ]);
    }

    public function updateproduct()
    {
        $buffer_datetime = date("Y-m-d H:i:s");
        $datas = $_POST["data"];
        $count_cycle = 0;

        $check_arr_count = count($datas);

        foreach ($datas as $data) {

            // var_dump($data[0]['src_picture']);    
            // exit;
            $stock_running_code = '';
            $stock_running_code = $this->StockModel->getDataUpdate($data[0]['id']);


            $file = $data[0]['src_picture'];

            if ($file !== "") {
                $new_file = explode(";", $file);
                $new_file_move = explode(",", $file);
                $type = $new_file[0];
                $type_real = explode("/", $type);

                //data stock table
                $data_stock = [
                    'stock_code' => $stock_running_code->stock_code,
                    'name' => $data[0]['name'],
                    'MAX' => $data[0]['MAX'],
                    'MIN' => $data[0]['MIN'],
                    'price' =>  $data[0]['price'],
                    'pcs' =>  $data[0]['pcs'],
                    'src_picture' => 'uploads/temps_stock/' . $stock_running_code->stock_code . '.' . $type_real[1],
                    'updated_by' => 'Admin',
                    'updated_at' => $buffer_datetime
                ];

                unlink($data[0]['old_src_picture']);
                file_put_contents('uploads/temps_stock/' . $stock_running_code->stock_code . '.' . $type_real[1], base64_decode($new_file_move[1]));
            } else {
                //data stock table
                $data_stock = [
                    'stock_code' => $stock_running_code->stock_code,
                    'name' => $data[0]['name'],
                    'MAX' => $data[0]['MAX'],
                    'MIN' => $data[0]['MIN'],
                    'price' =>  $data[0]['price'],
                    'pcs' =>  $data[0]['pcs'],
                    'updated_by' => 'Admin',
                    'updated_at' =>  $buffer_datetime
                ];
            }



            $update_new = $this->StockModel->updateStock($data_stock, $data[0]['id']);

            if ($update_new) {
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
                'message' => 'แก้ไขรายการสำเร็จ'
            ]);
        } else {
            //  ว่าง
        }
    }
}
