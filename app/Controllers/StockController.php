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
                'group_id' => $data[0]['group_id'],
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

        $filter = $this->StockModel->getAllDataStockFilter();

        return $this->response->setJSON([
            'draw' => $_POST['draw'],
            'recordsTotal' => count($filter),
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
                    'group_id' => $data[0]['group_id'],
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
                    'group_id' => $data[0]['group_id'],
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

    public function deleteproduct()
    {
        $buffer_datetime = date("Y-m-d H:i:s");
        $datas = $_POST["data"];
        $count_cycle = 0;

        $check_arr_count = count($datas);

        foreach ($datas as $data) {

            $data_stock = [
                'status_stock' => 'CANCEL_STOCK',
                'updated_by' => 'Admin',
                'deleted_at' => $buffer_datetime
            ];


            $update_new = $this->StockModel->deleteStock($data_stock, $data[0]['id']);

            if ($update_new) {
                $count_cycle++;
            } else {
                return $this->response->setJSON([
                    'status' => 200,
                    'error' => true,
                    'message' => 'ลบไม่สำเร็จ'
                ]);
            }
        }

        if ($check_arr_count == $count_cycle) {
            return $this->response->setJSON([
                'status' => 200,
                'error' => false,
                'message' => 'ลบรายการสำเร็จ'
            ]);
        } else {
            //  ว่าง
        }
    }

    public function fetchGroupData()
    {
        $data = $this->StockModel->getGroupData();

        return $this->response->setJSON([
            'status' => 200,
            'error' => false,
            'data' => $data
        ]);
    }

    public function updateAdjust()
    {
        $buffer_datetime = date("Y-m-d H:i:s");
        $datas = $_POST["data"];
        $count_cycle = 0;

        $check_arr_count = count($datas);

        foreach ($datas as $data) {
            // var_dump($data[0]['productname']. "->" . $data[0]['category']. "->" . $data[0]['price']);    

            $new_stock_codes = $this->StockModel->getDataUpdate($data[0]['id']);

            $id = $new_stock_codes->id;
            $balance_data = 0;
            $add = 0;
            $plus = 0;
            $minus = 0;
            $withdraw = 0;
            $adjust_data = 0;


            if ($data[0]['typeadjust'] == 'add') {
                $add =  $data[0]['pcs'];
                $balance_data =  $data[0]['pcs'] + $new_stock_codes->pcs;
            } else if ($data[0]['typeadjust'] == 'adjustPlus') {
                $plus =  $data[0]['pcs'];
                $adjust_data = $plus;
                $balance_data = $data[0]['pcs'] + $new_stock_codes->pcs;
            } else if ($data[0]['typeadjust'] == 'adjustMinus') {
                $minus =    0 - $data[0]['pcs'];
                $adjust_data = $minus;
                $balance_data =  $new_stock_codes->pcs - $data[0]['pcs'];
            } else {
                $withdraw =  $data[0]['pcs'];
                $balance_data = $new_stock_codes->pcs - $data[0]['pcs'];
            }


            //data stock table
            $data_stock = [
                'pcs' =>  $balance_data,
                'updated_at' => $buffer_datetime,
                'created_by' => 'Admin'
            ];

            $data_stock_transaction = [
                'stock_code' => $new_stock_codes->stock_code,
                'begin' =>  $data[0]['pcs'],
                'add' => $add,
                'adjust' => $adjust_data,
                'withdraw' => $withdraw,
                'balance' =>  $balance_data,
                'created_at' => $buffer_datetime
            ];

            $confirm_new = $this->StockModel->insertAdjust($id, $data_stock, $data_stock_transaction);

            if ($confirm_new) {
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

    public function getTransectionByStockCode($code = null)
    {
        $data['title'] = "Stock Transction.";
        $data['css_critical'] = '';
        $data['js_critical'] = '
        <script src="' . base_url('/js/stock/stock_transections.js?v=' . time()) . '"></script>    
        ';
        $data['codeStock'] = $code;

        echo view('/stock/stock_transection', $data);
    }
}
