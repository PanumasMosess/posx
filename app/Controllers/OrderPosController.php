<?php

namespace App\Controllers;

date_default_timezone_set('Asia/Jakarta');

use App\Controllers\BaseController;

class OrderPosController extends BaseController
{

    public function __construct()
    {
        // Model Order
        $this->OrderModel = new \App\Models\OrderModel();
        // Model Stock
        $this->StockModel = new \App\Models\StockModel();
    }

    public function index()
    {
        $data['content'] = 'order/order_pos';
        $data['title'] = 'สั่งสินค้า';
        $data['css_critical'] = '
        <link rel="stylesheet" href="' . base_url('css/err_style.css') . '" />
        <link rel="stylesheet" href="' . base_url('css/tableStyle.css') . '" />
        ';
        $data['js_critical'] = '    
            <script src="' . base_url('/js/notify/js/notifIt.js') . '"></script> 
            <script src="' . base_url('/js/base64/jquery.base64.min.js') . '"></script>   
            <script src="' . base_url('/js/interact.min.js') . '"></script>   
            <script src="' . base_url('/js/orders/order_table.js?v=' . time()) . '"></script>      
            <script src="' . base_url('/js/orders/order_order.js?v=' . time()) . '"></script>
            <script src="' . base_url('/js/orders/order_pos.js?v=' . time()) . '"></script>
            <script src="' . base_url('/js/orders/index.js') . '"></script>   
            <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>   
        ';
        echo view('/app', $data);
    }

    public function dataAreaTable()
    {
        $datas_orArea = $this->OrderModel->_getAllDataArea($_POST);

        $filter = $this->OrderModel->getAllDataAreaFilter();

        return $this->response->setJSON([
            'draw' => $_POST['draw'],
            'recordsTotal' => count($filter),
            'recordsFiltered' => count($filter),
            "data" => $datas_orArea,
        ]);
    }

    public function insertArea()
    {
        $buffer_datetime = date("Y-m-d H:i:s");
        $datas = $_POST["data"];
        $count_cycle = 0;

        $check_arr_count = count($datas);

        foreach ($datas as $data) {
            // var_dump($data[0]['productname']. "->" . $data[0]['category']. "->" . $data[0]['price']);    
            $area_running_code = '';
            $buffer_area_code = 0;
            $new_running_codes = $this->OrderModel->getCodeArea();

            foreach ($new_running_codes as $running_code) {
                $buffer_area_code = (int)$running_code->substr_area_code;
            }

            $sum_area_code = $buffer_area_code + 1;
            $sprintf_area_code = sprintf("%08d", $sum_area_code);
            $area_running_code = "POXA" . $sprintf_area_code;


            //data area table
            $data_area = [
                'area_code'  => $area_running_code,
                'area_name' => $data[0]['area_name'],
                'created_by'  => session()->get('username'),
                'companies_id'  => session()->get('companies_id'),
                'created_at' => $buffer_datetime
            ];

            $area_code_data = [
                'area_code' => $area_running_code
            ];

            $create_new = $this->OrderModel->insertArea($data_area, $area_code_data);

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

    public function fetchUpdateArea($id = null)
    {
        $look_data = $this->OrderModel->getDataUpdateArea($id);

        return $this->response->setJSON([
            'status' => 200,
            'error' => false,
            'data' => $look_data
        ]);
    }

    public function updateAear()
    {
        $buffer_datetime = date("Y-m-d H:i:s");
        $datas = $_POST["data"];
        $count_cycle = 0;

        $check_arr_count = count($datas);

        foreach ($datas as $data) {

            $data_area = [
                'area_name' => $data[0]['area_name'],
                'updated_by' => session()->get('username'),
                'updated_at' => $buffer_datetime
            ];


            $update_new = $this->OrderModel->updateAere($data_area, $data[0]['id']);

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

    public function deleteArea()
    {
        $datas = $_POST["data"];
        $count_cycle = 0;

        $check_arr_count = count($datas);

        foreach ($datas as $data) {

            $update_new = $this->OrderModel->deleteArea($data[0]['id']);

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

    public function getPageAddTableInArea($code = null)
    {
        $data['title'] = "Area Table Design.";
        $data['css_critical'] = '
        <link rel="stylesheet" href="' . base_url('css/err_style.css') . '" />
        <link rel="stylesheet" href="' . base_url('css/tableStyle.css') . '" />
        ';
        $data['js_critical'] = '    
            <script src="' . base_url('/js/notify/js/notifIt.js') . '"></script> 
            <script src="' . base_url('/js/base64/jquery.base64.min.js') . '"></script>   
            <script src="' . base_url('/js/interact.min.js') . '"></script> 
            <script src="' . base_url('/js/orders/order_table.js?v=' . time()) . '"></script>     
        ';
        $data['codeArea'] = $code;

        echo view('/order/area_setings.php', $data);
    }

    public function insertTable()
    {
        $buffer_datetime = date("Y-m-d H:i:s");
        $datas = $_POST["data"];
        $count_cycle = 0;


        $check_arr_count = count($datas);

        foreach ($datas as $data) {

            $id_count = $this->OrderModel->checkIDUpdateTable($data[0]['table_id']);

            if ($id_count != null) {

                //data table table
                $data_table = [
                    'table_name' => $data[0]['name'],
                    'x'  => $data[0]['x'],
                    'y' => $data[0]['y'],
                    'width_div'  => $data[0]['w'],
                    'hight_div'  => $data[0]['h'],
                    'size_table' => $data[0]['size'],
                    'rounded'  => $data[0]['rounded'],
                    'updated_by'  => session()->get('username'),
                    'updated_at' => $buffer_datetime
                ];

                $create_new = $this->OrderModel->updatePositionTable($data_table, $data[0]['table_id']);
            } else {
                $table_running_code = '';
                $buffer_table_code = 0;
                $new_running_codes = $this->OrderModel->getCodeTable();

                foreach ($new_running_codes as $running_code) {
                    $buffer_table_code = (int)$running_code->substr_table_code;
                }

                $sum_table_code = $buffer_table_code + 1;
                $sprintf_area_code = sprintf("%08d", $sum_table_code);
                $table_running_code = "POXT" . $sprintf_area_code;


                //data table table
                $data_table = [
                    'table_code'  => $table_running_code,
                    'table_name' => $data[0]['name'],
                    'table_customer_booking'  => '',
                    'x'  => $data[0]['x'],
                    'y' => $data[0]['y'],
                    'width_div'  => $data[0]['w'],
                    'hight_div'  => $data[0]['h'],
                    'size_table' => $data[0]['size'],
                    'div_id' => $data[0]['table_id'],
                    'area_code'  =>  $data[0]['area_code'],
                    'rounded'  => $data[0]['rounded'],
                    'created_by'  => session()->get('username'),
                    'companies_id'  => session()->get('companies_id'),
                    'created_at' => $buffer_datetime
                ];

                $table_code_data = [
                    'table_code' => $table_running_code
                ];

                $create_new = $this->OrderModel->insertTable($data_table, $table_code_data);
            }


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

    public function getTableInArea($code_area)
    {
        $look_data = $this->OrderModel->getTableInArea($code_area);

        return $this->response->setJSON([
            'status' => 200,
            'error' => false,
            'data' => $look_data
        ]);
    }

    public function deleteTable()
    {
        $datas = $_POST["data"];
        $count_cycle = 0;

        $check_arr_count = count($datas);

        foreach ($datas as $data) {

            $update_new = $this->OrderModel->deleteTable($data[0]['div_id'], $data[0]['area_code']);

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

    public function getTempUpdateTable($id_div)
    {
        $look_data = $this->OrderModel->getDataUpdateTable($id_div);

        return $this->response->setJSON([
            'status' => 200,
            'error' => false,
            'data' => $look_data
        ]);
    }

    public function updateDetailTable()
    {
        $buffer_datetime = date("Y-m-d H:i:s");
        $datas = $_POST["data"];
        $count_cycle = 0;

        $check_arr_count = count($datas);

        foreach ($datas as $data) {

            $data_table_detail = [
                'table_name' => $data[0]['table_name'],
                'size_table' => $data[0]['size_table'],
                'rounded' => $data[0]['rounded'],
                'updated_by' => session()->get('username'),
                'updated_at' => $buffer_datetime
            ];


            $update_new = $this->OrderModel->updateTableDetail($data_table_detail, $data[0]['div_id'], $data[0]['area_code']);

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

    public function loadtoSelectAreaData()
    {
        $look_data = $this->OrderModel->getAllDataAreaFilter();

        return $this->response->setJSON([
            'status' => 200,
            'error' => false,
            'data' => $look_data
        ]);
    }

    public function getPageOrderCustomer()
    {
        $data['content'] = 'order/order_list_customer';
        $data['title'] = 'รายการสินค้า';
        $data['css_critical'] = '
        <link rel="stylesheet" href="' . base_url('css/err_style.css') . '" />   
        <link rel="stylesheet" href="' . base_url('css/tableStyle.css') . '" />
        <link rel="stylesheet" href="' . base_url('css/tableCards.css') . '" />
        ';
        $data['js_critical'] = '    
            <script src="' . base_url('/js/notify/js/notifIt.js') . '"></script> 
            <script src="' . base_url('/js/base64/jquery.base64.min.js') . '"></script>   
            <script src="' . base_url('/js/interact.min.js') . '"></script>        
            <script src="' . base_url('/js/orders/order_customer.js?v=' . time()) . '"></script> 
        ';
        echo view('/order/order_list_customer', $data);
    }

    public function getTableDetailByCode($tableCode = null)
    {
        $look_data = $this->OrderModel->getTableDetailByCode($tableCode);

        return $this->response->setJSON([
            'status' => 200,
            'error' => false,
            'data' => $look_data
        ]);
    }

    public function getDataOrderCard()
    {
        $datas_card = $this->OrderModel->_getAllDataOrderCustomer($_POST);

        $filter = $this->OrderModel->getAllDataOrderCustomerFilter();

        return $this->response->setJSON([
            'draw' => $_POST['draw'],
            'recordsTotal' => count($filter),
            'recordsFiltered' => count($filter),
            "data" => $datas_card,
        ]);
    }

    public function insertOrderCustomer()
    {
        $buffer_datetime = date("Y-m-d H:i:s");
        $datas = $_POST["data"];
        $count_cycle = 0;
        $pcs = 0;
        $table_code = null;

        $check_arr_count = count($datas);

        foreach ($datas as $data) {

                $table_running_code = '';
                $buffer_table_code = 0;
                $new_running_codes = $this->OrderModel->getCodeCustomerOrder();

                foreach ($new_running_codes as $running_code) {
                    $buffer_table_code = (int)$running_code->substr_order_cus_code;
                }

                $sum_table_code = $buffer_table_code + 1;
                $sprintf_area_code = sprintf("%08d", $sum_table_code);
                $table_running_code = "POXC" . $sprintf_area_code;


                //data table table
                $data_customer_order = [
                    'order_customer_code'  => $table_running_code,
                    'order_customer_ordername'  => $data[0]['order_customer_ordername'],
                    'order_customer_des'   =>  $data[0]['order_des'],
                    'order_customer_price'   => $data[0]['order_customer_ordername'],
                    'order_customer_pcs'  => $data[0]['order_customer_pcs'],
                    'order_code'   => $data[0]['order_code'],
                    'order_customer_status'   => $data[0]['order_status'],
                    'order_customer'  => '', 
                    'order_customer_table_code' => $data[0]['order_customer_table_code'],                  
                    'created_at' => $buffer_datetime ,                
                    'created_by'  => session()->get('username'),
                    'companies_id'  => session()->get('companies_id')
                
                ];

                $data_code = [
                    'order_customer_code'  => $table_running_code,                
                ];

                $table_code = $data[0]['order_customer_table_code'];

                $data_status_table = [
                    'table_status'  => 'USE',                
                ];

                $pcs += $data[0]['order_customer_pcs'];

                $data_summary = [
                    'order_code' =>  $data[0]['order_code'], 
                    'order_table_code' =>  $data[0]['order_customer_table_code'], 
                    'order_price_sum' =>  $data[0]['order_price_sum'],    
                    'order_pcs_sum' =>  $pcs, 
                    'order_service' =>  $data[0]['order_service'], 
                    'order_service_type' =>  $data[0]['order_service_type'], 
                    'order_discount' =>  $data[0]['order_discount'], 
                    'order_discount_type' =>  $data[0]['order_discount_type'], 
                    'order_card_charge' =>  $data[0]['order_card_charge'], 
                    'order_card_charge_type' =>  $data[0]['order_card_charge_type'], 
                    'order_vat_type' => $data[0]['order_vat_type'] , 
                    'order_vat' =>  $data[0]['order_vat'], 
                    'order_time' =>  $buffer_datetime, 
                    'order_status' =>  $data[0]['order_status'], 
                    'created_by' =>  session()->get('username'), 
                    'created_at' =>  $buffer_datetime,
                    'companies_id'  => session()->get('companies_id')
                    ];

       

                $create_new = $this->OrderModel->insertOrderCustomer($data_customer_order, $data_code);
            }

            if ($create_new) {
                $create_new2 = $this->OrderModel->insertOrderCustomerSummary($data_summary, $data_status_table, $table_code);
                if($create_new2){
                    $count_cycle++;
                }else{
                    return $this->response->setJSON([
                        'status' => 200,
                        'error' => true,
                        'message' => 'เพิ่มไม่สำเร็จ'
                    ]);
                }          
            } else {
                return $this->response->setJSON([
                    'status' => 200,
                    'error' => true,
                    'message' => 'เพิ่มไม่สำเร็จ'
                ]);
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

    public function getSummaryData($table_code = null)
    {
        $look_data = $this->OrderModel->getSummayByTable($table_code);

        return $this->response->setJSON([
            'status' => 200,
            'error' => false,
            'data' => $look_data
        ]);
    }

    public function updateMoveTable()
    {
        $buffer_datetime = date("Y-m-d H:i:s");
        $datas = $_POST["data"];
        $count_cycle = 0;

        $check_arr_count = count($datas);

        foreach ($datas as $data) {

            $data_table_detail = [
                'order_customer_table_code' => $data[0]['new_table'],
                'updated_by' => session()->get('username'),
                'updated_at' => $buffer_datetime
            ];

            $data_table_detail_summary = [
                'order_table_code' => $data[0]['new_table'],
                'updated_by' => session()->get('username'),
                'updated_at' => $buffer_datetime
            ];

            $data_table_old = [
                'table_status' => 'FINISH',
                'updated_by' => session()->get('username'),
                'updated_at' => $buffer_datetime
            ];

            $data_table_new = [
                'table_status' => 'USE',
                'updated_by' => session()->get('username'),
                'updated_at' => $buffer_datetime
            ];


            $update_new = $this->OrderModel->updateTableMove($data_table_detail, $data_table_detail_summary, $data_table_old, $data_table_new ,$data[0]['old_table'], $data[0]['new_table']);

            if ($update_new) {
                $count_cycle++;
            } else {
                return $this->response->setJSON([
                    'status' => 200,
                    'error' => true,
                    'message' => 'ย้ายโต๊ะไม่สำเร็จ'
                ]);
            }
        }

        if ($check_arr_count == $count_cycle) {
            return $this->response->setJSON([
                'status' => 200,
                'error' => false,
                'message' => 'ย้ายโต๊ะสำเร็จ'
            ]);
        } else {
            //  ว่าง
        }
    }
}
