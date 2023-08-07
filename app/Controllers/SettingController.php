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
        $this->GroupProductModel = new \App\Models\GroupProductModel();
        $data['group_products'] = $this->GroupProductModel->getGroupProductAll();

        $data['content'] = 'setting/group_product';
        $data['title'] = 'หมวดสินค้า';
        $data['js_critical'] = '<script src="' . base_url('/js/setting/group_product.js?v=' . time()) . '"></script>';
        echo view('/app', $data);
    }

    // addSupplier data 
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
                'created_by' => 'ทดสอบ',
                'updated_by' => '',

            ]);
            // return redirect()->to('/employee/list');
            if ($create) {
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
    //edit Supplier
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

    //updateSupplier
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

    // delete Branch
    public function deleteGroupProduct($id = null)
    {
        $this->GroupProductModel = new \App\Models\GroupProductModel();
        $this->GroupProductModel->updateGroupProductByID($id, [
            'deleted_at' => date('Y-m-d H:i:s')
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

    public function supplier()
    {
        $this->SupplierModel = new \App\Models\SupplierModel();
        $data['suppliers'] = $this->SupplierModel->getSupplierAll();

        $data['content'] = 'setting/supplier';
        $data['title'] = 'supplier';
        $data['js_critical'] = '<script src="' . base_url('/js/setting/supplier.js?v=' . time()) . '"></script>';
        echo view('/app', $data);
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
                'created_by' => 'Test',
                'updated_by' => '',

            ]);
            // return redirect()->to('/employee/list');
            if ($create) {
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

    // delete Branch
    public function deleteSupplier($id = null)
    {
        $this->SupplierModel = new \App\Models\SupplierModel();
        $this->SupplierModel->updateSupplierByID($id, [
            'deleted_at' => date('Y-m-d H:i:s')
        ]);
    }
}
