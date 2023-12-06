<?php

namespace App\Controllers;

date_default_timezone_set('Asia/Jakarta');

use App\Controllers\BaseController;
use Aws\S3\S3Client;

class OrderController extends BaseController
{

    public function __construct()
    {
        // Model Order
        $this->OrderModel = new \App\Models\OrderModel();
        // Model Stock
        $this->StockModel = new \App\Models\StockModel();

        $this->s3_bucket = getenv('S3_BUCKET');
        $this->s3_secret_key = getenv('SECRET_KEY');
        $this->s3_key = getenv('KEY');
        $this->s3_endpoint = getenv('ENDPOINT');
        $this->s3_region = getenv('REGION');
        $this->s3_cdn_img = getenv('CDN_IMG');
    }

    public function index()
    {
        $data['content'] = 'order/order_manage';
        $data['title'] = ' รายการสินค้า';
        $data['css_critical'] = '<link rel="stylesheet" href="' . base_url('css/err_style.css') . '" />';
        $data['js_critical'] = ' 
            <script src="' . base_url('/js/notify/js/notifIt.js') . '"></script>
            <script src="' . base_url('/js/base64/jquery.base64.min.js') . '"></script>
            <script src="' . base_url('/js/orders/order_manage.js?v=' . time()) . '"></script>    
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
            $order_running_code = '';
            $buffer_order_code = 0;
            $new_running_codes = $this->OrderModel->getCodeOrder();

            foreach ($new_running_codes as $running_code) {
                $buffer_order_code = (int)$running_code->substr_order_code;
            }

            $sum_order_code = $buffer_order_code + 1;
            $sprintf_order_code = sprintf("%08d", $sum_order_code);
            $order_running_code = "POXO" . $sprintf_order_code;

            $file = $data[0]['src_order_picture'];

            $new_file = explode(";", $file);
            $new_file_move = explode(",", $file);
            $type = $new_file[0];
            $type_real = explode("/", $type);

            // var_dump($type_real[1]);
            // exit;

            file_put_contents('uploads/temps_order/' . $order_running_code . '.' . $type_real[1], base64_decode($new_file_move[1]));

            $file_Path_re = 'uploads/temps_order/' . $order_running_code . '.' . $type_real[1];
            $file_name = $order_running_code . '.' . $type_real[1];

            $s3Client = new S3Client([
                'version' => 'latest',
                'region'  => $this->s3_region,
                'endpoint' => $this->s3_endpoint,
                'use_path_style_endpoint' => false,
                'credentials' => [
                    'key'    => $this->s3_key,
                    'secret' => $this->s3_secret_key
                ]
            ]);

            $result_re = $s3Client->putObject([
                'Bucket' => $this->s3_bucket,
                'Key'    => 'uploads/temps_order/' . $file_name,
                'Body'   => fopen($file_Path_re, 'r'),
                'ACL'    => 'public-read', // make file 'public'
            ]);

            if ($result_re['ObjectURL'] != "") {
                unlink('uploads/temps_order/' . $file_name);
            }

            //data order table
            $data_order = [
                'order_code'  => $order_running_code,
                'order_name' => $data[0]['order_name'],
                'order_des' => $data[0]['order_des'],
                'order_price' => $data[0]['order_price'],
                'order_pcs' => '',
                'order_status' => 'IN_ORDER',
                'src_order_picture' =>  $order_running_code . '.' . $type_real[1],
                'group_id' => $data[0]['group_id'],
                'created_by'  => session()->get('username'),
                'companies_id'  => session()->get('companies_id'),
                'created_at' => $buffer_datetime   
            ];

            $order_running_code = [
                'order_code' => $order_running_code
            ];

            $create_new = $this->OrderModel->insertOrder($data_order, $order_running_code);

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

    public function fetchDataOrder()
    {
        $datas_order = $this->OrderModel->_getAllDataOrder($_POST);

        $filter = $this->OrderModel->getAllDataOrderFilter();

        return $this->response->setJSON([
            'draw' => $_POST['draw'],
            'recordsTotal' => count($filter),
            'recordsFiltered' => count($filter),
            "data" => $datas_order,
        ]);
    }


    public function fetchTempOfflineOrder()
    {
        $datas_order = $this->OrderModel->getAllDataOrderFilter();
        return $this->response->setJSON([
            "data" => $datas_order
        ]);
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

    public function fetchUpdateOrder($id = null)
    {
        $look_data = $this->OrderModel->getDataUpdate($id);

        return $this->response->setJSON([
            'status' => 200,
            'error' => false,
            'data' => $look_data
        ]);
    }

    public function updateOrder()
    {
        $buffer_datetime = date("Y-m-d H:i:s");
        $datas = $_POST["data"];
        $count_cycle = 0;

        $check_arr_count = count($datas);

        foreach ($datas as $data) {

            // var_dump($data[0]['src_picture']);    
            // exit;
            $order_running_code = '';
            $order_running_code = $this->OrderModel->getDataUpdate($data[0]['id']);


            $file = $data[0]['src_order_picture'];

            if ($file !== "") {
                $new_file = explode(";", $file);
                $new_file_move = explode(",", $file);
                $type = $new_file[0];
                $type_real = explode("/", $type);

                //data stock table
                $data_order = [
                    'order_name' => $data[0]['order_name'],
                    'order_des' => $data[0]['order_des'],
                    'order_price' => $data[0]['order_price'],
                    'order_status' => 'IN_ORDER',
                    'src_order_picture' =>  $order_running_code->order_code . '.' . $type_real[1],
                    'group_id' => $data[0]['group_id'],
                    'updated_by' => session()->get('username'),
                    'updated_at' => $buffer_datetime
                ];

                // unlink('uploads/temps_order/'. $data[0]['old_src_order_picture']);
                file_put_contents('uploads/temps_order/' . $order_running_code->order_code . '.' . $type_real[1], base64_decode($new_file_move[1]));

                $file_Path_re = 'uploads/temps_order/' . $order_running_code->order_code  . '.' . $type_real[1];
                $file_name = $order_running_code->order_code  . '.' . $type_real[1];
    
                $s3Client = new S3Client([
                    'version' => 'latest',
                    'region'  => $this->s3_region,
                    'endpoint' => $this->s3_endpoint,
                    'use_path_style_endpoint' => false,
                    'credentials' => [
                        'key'    => $this->s3_key,
                        'secret' => $this->s3_secret_key
                    ]
                ]);
    
                $result_re = $s3Client->putObject([
                    'Bucket' => $this->s3_bucket,
                    'Key'    => 'uploads/temps_order/' . $file_name,
                    'Body'   => fopen($file_Path_re, 'r'),
                    'ACL'    => 'public-read', // make file 'public'
                ]);
    
                if ($result_re['ObjectURL'] != "") {
                    unlink('uploads/temps_order/' . $file_name);
                }

            } else {

                $data_order = [
                    'order_name' => $data[0]['order_name'],
                    'order_des' => $data[0]['order_des'],
                    'order_price' => $data[0]['order_price'],
                    'order_status' => 'IN_ORDER',
                    'group_id' => $data[0]['group_id'],
                    'updated_by' => session()->get('username'),
                    'updated_at' => $buffer_datetime
                ];
            }



            $update_new = $this->OrderModel->updateOrder($data_order, $data[0]['id']);

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

    public function deleteOrder()
    {
        $buffer_datetime = date("Y-m-d H:i:s");
        $datas = $_POST["data"];
        $count_cycle = 0;

        $check_arr_count = count($datas);

        foreach ($datas as $data) {

            $order_data = $this->OrderModel->getDataUpdate($data[0]['id']);

            $data_order = [
                'order_status' => 'CANCEL_ORDER',
                'updated_by' => 'Admin',
                'deleted_at' => $buffer_datetime
            ];


            $s3Client = new S3Client([
                'version' => 'latest',
                'region'  => $this->s3_region,
                'endpoint' => $this->s3_endpoint,
                'use_path_style_endpoint' => false,
                'credentials' => [
                    'key'    => $this->s3_key,
                    'secret' => $this->s3_secret_key
                ]
            ]);

            $result_img_old = $s3Client->deleteObject([
                'Bucket' => $this->s3_bucket,
                'Key'    => 'uploads/temps_order/' . $order_data->src_order_picture,
            ]);


            // unlink('uploads/temps_order/'. $order_data->src_order_picture);
            $update_new = $this->OrderModel->deleteOrder($data_order, $data[0]['id']);

            if ($update_new && $result_img_old) {
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
}
