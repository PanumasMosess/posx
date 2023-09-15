<?php

namespace App\Controllers;

date_default_timezone_set('Asia/Jakarta');

use App\Controllers\BaseController;
use Aws\S3\S3Client;

class ManagerController extends BaseController
{

    public function __construct()
    {
    }

    public function index()
    {
        $data['content'] = 'manager/index';
        $data['title'] = 'ตั้งค่า';
        $data['js_critical'] = '
        <script src="' . base_url('/js/manager/group_product.js?v=' . time()) . '"></script>
        <script src="' . base_url('/js/manager/supplier.js?v=' . time()) . '"></script>
        ';

        echo view('/app', $data);
    }

    //getajaxDataTablesGroupProduct
    public function ajaxDataTablesGroupProduct()
    {
        $GroupProductModel = new \App\Models\GroupProductModel();

        $param['search_value'] = $_REQUEST['search']['value'];
        $param['draw'] = $_REQUEST['draw'];
        $param['start'] = $_REQUEST['start'];
        $param['length'] = $_REQUEST['length'];

        if (!empty($param['search_value'])) {
            // count all data
            $total_count = $GroupProductModel->getGroupProductSearchcount($param);
            $data = $GroupProductModel->getGroupProductSearch($param);
        } else {
            // count all data
            $total_count = $GroupProductModel->getGroupProductcount();
            // get per page data
            $data = $GroupProductModel->getGroupProduct($param);
        }

        $json_data = array(
            "draw" => intval($param['draw']),
            "recordsTotal" => count($total_count),
            "recordsFiltered" => count($total_count),
            "data" => $data   // total data array
        );

        echo json_encode($json_data);
    }

    // addGroupProduct data 
    public function addGroupProduct()
    {
        $this->GroupProductModel = new \App\Models\GroupProductModel();
        try {
            // SET CONFIG
            $status = 500;
            $response['success'] = 0;
            $response['message'] = '';

            // HANDLE REQUEST
            $create = $this->GroupProductModel->insertGroupProduct([
                'name' => $this->request->getVar('category_name'),
                'unit' => $this->request->getVar('productunit'),
                'updated_by' => '',
                'created_by' => session()->get('username'),
                'companies_id' => session()->get('companies_id')

            ]);
            // return redirect()->to('/employee/list');
            if ($create) {

                logger_store([
                    'employee_id' => session()->get('employeeID'),
                    'username' => session()->get('username'),
                    'event' => 'เพิ่ม',
                    'detail' => '[เพิ่ม] GroupProduct',
                    'ip' => $this->request->getIPAddress()
                ]);

                $status = 200;
                $response['success'] = 1;
                $response['message'] = 'เพิ่ม GroupProduct สำเร็จ';
            } else {
                $status = 200;
                $response['success'] = 0;
                $response['message'] = 'เพิ่ม GroupProduct ไม่สำเร็จ';
            }
            // print_r($response['success']);
            // exit();
            return $this->response
                ->setStatusCode($status)
                ->setContentType('application/json')
                ->setJSON($response);
        } catch (\Exception $e) {
            echo $e->getMessage() . ' ' . $e->getLine();
        }
    }
    //edit editGroupProduct
    public function editGroupProduct($id = null)
    {
        $this->GroupProductModel = new \App\Models\GroupProductModel();
        $data = $this->GroupProductModel->getGroupProductByID($id);

        if ($data) {
            echo json_encode(array("status" => true, 'data' => $data));
        } else {
            echo json_encode(array("status" => false));
        }
    }

    //updateGroupProduct
    public function updateGroupProduct()
    {
        $this->GroupProductModel = new \App\Models\GroupProductModel();

        try {
            // SET CONFIG
            $status = 500;
            $response['success'] = 0;
            $response['message'] = '';
            $id = $this->request->getVar('GroupProductId');

            // HANDLE REQUEST
            $update = $this->GroupProductModel->updateGroupProductByID($id, [
                'name' => $this->request->getVar('category_name'),
                'unit' => $this->request->getVar('productunit'),
                'updated_at' => date('Y-m-d H:i:s')
            ]);

            if ($update) {

                logger_store([
                    'employee_id' => session()->get('employeeID'),
                    'username' => session()->get('username'),
                    'event' => 'อัพเดท',
                    'detail' => '[อัพเดท] GroupProduct',
                    'ip' => $this->request->getIPAddress()
                ]);

                $status = 200;
                $response['success'] = 1;
                $response['message'] = 'แก้ไข GroupProduct สำเร็จ';
            } else {
                $status = 200;
                $response['success'] = 0;
                $response['message'] = 'แก้ไข GroupProduct ไม่สำเร็จ';
            }

            return $this->response
                ->setStatusCode($status)
                ->setContentType('application/json')
                ->setJSON($response);
        } catch (\Exception $e) {
            echo $e->getMessage() . ' ' . $e->getLine();
        }
    }

    // delete deleteGroupProduct
    public function deleteGroupProduct($id = null)
    {
        $this->GroupProductModel = new \App\Models\GroupProductModel();
        $this->GroupProductModel->updateGroupProductByID($id, [
            'deleted_at' => date('Y-m-d H:i:s')
        ]);

        logger_store([
            'employee_id' => session()->get('employeeID'),
            'username' => session()->get('username'),
            'event' => 'ลบ',
            'detail' => '[ลบ] GroupProduct',
            'ip' => $this->request->getIPAddress()
        ]);
    }

    // public function insertgroupproduct()
    // {
    //     $buffer_datetime = date("Y-m-d H:i:s");
    //     $datas = $_POST["data"];
    //     $count_cycle = 0;

    //     $check_arr_count = count($datas);

    //     foreach ($datas as $data) {

    //         //data group product table
    //         $data_group_product = [
    //             'name' => $data[0]['category_name'],
    //             'unit' => $data[0]['productunit'],
    //             'created_by' => 'Admin',
    //             'updated_by' => ''
    //         ];
    //         $this->GroupProductModel = new \App\Models\GroupProductModel();
    //         $create_new = $this->GroupProductModel->insertGroupProduct($data_group_product);

    //         if ($create_new) {
    //             $count_cycle++;
    //         } else {
    //             return $this->response->setJSON([
    //                 'status' => 200,
    //                 'error' => true,
    //                 'message' => 'เพิ่มไม่สำเร็จ'
    //             ]);
    //         }
    //     }

    //     if ($check_arr_count == $count_cycle) {
    //         return $this->response->setJSON([
    //             'status' => 200,
    //             'error' => false,
    //             'message' => 'เพิ่มรายการสำเร็จ'
    //         ]);
    //     } else {
    //         //  ว่าง
    //     }
    // }

    public function ajaxDataTablesSupplier()
    {
        $SupplierModel = new \App\Models\SupplierModel();
        $param['search_value'] = $_REQUEST['search']['value'];
        $param['draw'] = $_REQUEST['draw'];
        $param['start'] = $_REQUEST['start'];
        $param['length'] = $_REQUEST['length'];

        if (!empty($param['search_value'])) {
            // count all data
            $total_count = $SupplierModel->getSupplierSearchcount($param);
            $data = $SupplierModel->getSupplierSearch($param);
        } else {
            // count all data
            $total_count = $SupplierModel->getSuppliercount();
            // get per page data
            $data = $SupplierModel->getSupplier($param);
        }

        $json_data = array(
            "draw" => intval($param['draw']),
            "recordsTotal" => count($total_count),
            "recordsFiltered" => count($total_count),
            "data" => $data   // total data array
        );

        echo json_encode($json_data);
    }

    // addSupplier data 
    public function addSupplier()
    {
        $this->SupplierModel = new \App\Models\SupplierModel();
        try {
            // SET CONFIG
            $status = 500;
            $response['success'] = 0;
            $response['message'] = '';

            // HANDLE REQUEST
            $create = $this->SupplierModel->insertSupplier([
                'supplier_name' => $this->request->getVar('supplier_name'),
                'created_by' => session()->get('username'),
                'companies_id' => session()->get('companies_id'),
                'updated_by' => '',

            ]);
            // return redirect()->to('/employee/list');
            if ($create) {

                logger_store([
                    'employee_id' => session()->get('employeeID'),
                    'username' => session()->get('username'),
                    'event' => 'เพิ่ม',
                    'detail' => '[เพิ่ม] Supplier',
                    'ip' => $this->request->getIPAddress()
                ]);

                $status = 200;
                $response['success'] = 1;
                $response['message'] = 'เพิ่ม Supplier สำเร็จ';
            } else {
                $status = 200;
                $response['success'] = 0;
                $response['message'] = 'เพิ่ม Supplier ไม่สำเร็จ';
            }
            // print_r($response['success']);
            // exit();
            return $this->response
                ->setStatusCode($status)
                ->setContentType('application/json')
                ->setJSON($response);
        } catch (\Exception $e) {
            echo $e->getMessage() . ' ' . $e->getLine();
        }
    }
    //edit Supplier
    public function editSupplier($id = null)
    {
        $this->SupplierModel = new \App\Models\SupplierModel();
        $data = $this->SupplierModel->getSupplierByID($id);

        if ($data) {
            echo json_encode(array("status" => true, 'data' => $data));
        } else {
            echo json_encode(array("status" => false));
        }
    }

    //updateSupplier
    public function updateSupplier()
    {
        $this->SupplierModel = new \App\Models\SupplierModel();

        try {
            // SET CONFIG
            $status = 500;
            $response['success'] = 0;
            $response['message'] = '';
            $id = $this->request->getVar('SupplierId');

            // HANDLE REQUEST
            $update = $this->SupplierModel->updateSupplierByID($id, [
                'supplier_name' => $this->request->getVar('supplier_name'),
                'updated_at' => date('Y-m-d H:i:s')
            ]);

            if ($update) {

                logger_store([
                    'employee_id' => session()->get('employeeID'),
                    'username' => session()->get('username'),
                    'event' => 'อัพเดท',
                    'detail' => '[อัพเดท] Supplier',
                    'ip' => $this->request->getIPAddress()
                ]);

                $status = 200;
                $response['success'] = 1;
                $response['message'] = 'แก้ไข Supplier สำเร็จ';
            } else {
                $status = 200;
                $response['success'] = 0;
                $response['message'] = 'แก้ไข Supplier ไม่สำเร็จ';
            }

            return $this->response
                ->setStatusCode($status)
                ->setContentType('application/json')
                ->setJSON($response);
        } catch (\Exception $e) {
            echo $e->getMessage() . ' ' . $e->getLine();
        }
    }

    // delete Supplier
    public function deleteSupplier($id = null)
    {
        $this->SupplierModel = new \App\Models\SupplierModel();
        $this->SupplierModel->updateSupplierByID($id, [
            'deleted_at' => date('Y-m-d H:i:s')
        ]);

        logger_store([
            'employee_id' => session()->get('employeeID'),
            'username' => session()->get('username'),
            'event' => 'ลบ',
            'detail' => '[ลบ] Supplier',
            'ip' => $this->request->getIPAddress()
        ]);
    }
}
