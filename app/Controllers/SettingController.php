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

    // delete Branch
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

    // Position
    public function position()
    {
        $this->PositionModel = new \App\Models\PositionModel();
        $data['positions'] = $this->PositionModel->getPositionAll();

        $data['content'] = 'setting/position';
        $data['title'] = 'ตำแหน่ง';
        $data['js_critical'] = '<script src="' . base_url('/js/setting/position.js?v=' . time()) . '"></script>';
        echo view('/app', $data);
    }

    // addPosition data 
    public function addPosition()
    {
        $this->PositionModel = new \App\Models\PositionModel();
        try {
            // SET CONFIG
            $status = 500;
            $response['success'] = 0;
            $response['message'] = '';

            // HANDLE REQUEST
            $create = $this->PositionModel->insertPosition([
                'position_name' => $this->request->getVar('position_name'),
                'created_by' => session()->get('username'),

            ]);
            // return redirect()->to('/employee/list');
            if ($create) {

                logger_store([
                    'employee_id' => session()->get('employeeID'),
                    'username' => session()->get('username'),
                    'event' => 'เพิ่ม',
                    'detail' => '[เพิ่ม] ตำแหน่ง',
                    'ip' => $this->request->getIPAddress()
                ]);

                $status = 200;
                $response['success'] = 1;
                $response['message'] = 'เพิ่ม ตำแหน่ง สำเร็จ';
            } else {
                $status = 200;
                $response['success'] = 0;
                $response['message'] = 'เพิ่ม ตำแหน่ง ไม่สำเร็จ';
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
    //edit Position
    public function editPosition($id = null)
    {
        $this->PositionModel = new \App\Models\PositionModel();
        $data = $this->PositionModel->getPositionByID($id);

        if ($data) {
            echo json_encode(array("status" => true, 'data' => $data));
        } else {
            echo json_encode(array("status" => false));
        }
    }

    //updatePosition
    public function updatePosition()
    {
        $this->PositionModel = new \App\Models\PositionModel();

        try {
            // SET CONFIG
            $status = 500;
            $response['success'] = 0;
            $response['message'] = '';
            $id = $this->request->getVar('PositionId');

            // HANDLE REQUEST
            $update = $this->PositionModel->updatePositionByID($id, [
                'position_name' => $this->request->getVar('position_name'),
                'updated_by' => session()->get('username'),
                'updated_at' => date('Y-m-d H:i:s')
            ]);

            if ($update) {

                logger_store([
                    'employee_id' => session()->get('employeeID'),
                    'username' => session()->get('username'),
                    'event' => 'อัพเดท',
                    'detail' => '[อัพเดท] ตำแหน่ง',
                    'ip' => $this->request->getIPAddress()
                ]);

                $status = 200;
                $response['success'] = 1;
                $response['message'] = 'แก้ไข ตำแหน่ง สำเร็จ';
            } else {
                $status = 200;
                $response['success'] = 0;
                $response['message'] = 'แก้ไข ตำแหน่ง ไม่สำเร็จ';
            }

            return $this->response
                ->setStatusCode($status)
                ->setContentType('application/json')
                ->setJSON($response);
        } catch (\Exception $e) {
            echo $e->getMessage() . ' ' . $e->getLine();
        }
    }

    // delete Position
    public function deletePosition($id = null)
    {
        $this->PositionModel = new \App\Models\PositionModel();
        $this->PositionModel->updatePositionByID($id, [
            'deleted_by' => session()->get('username'),
            'deleted_at' => date('Y-m-d H:i:s')
        ]);

        logger_store([
            'employee_id' => session()->get('employeeID'),
            'username' => session()->get('username'),
            'event' => 'ลบ',
            'detail' => '[ลบ] ตำแหน่ง',
            'ip' => $this->request->getIPAddress()
        ]);
    }
    //Branch
    public function branch()
    {
        $this->BranchModel = new \App\Models\BranchModel();
        $data['branchs'] = $this->BranchModel->getBranchAll();

        $data['content'] = 'setting/branch';
        $data['title'] = 'สาขา';
        $data['js_critical'] = '<script src="' . base_url('/js/setting/branch.js?v=' . time()) . '"></script>';
        echo view('/app', $data);
    }

    // addBranch data 
    public function addBranch()
    {
        $this->BranchModel = new \App\Models\BranchModel();
        try {
            // SET CONFIG
            $status = 500;
            $response['success'] = 0;
            $response['message'] = '';

            // HANDLE REQUEST
            $create = $this->BranchModel->insertBranch([
                'branch_name' => $this->request->getVar('branch_name'),
                'created_by' => session()->get('username'),

            ]);
            // return redirect()->to('/employee/list');
            if ($create) {

                logger_store([
                    'employee_id' => session()->get('employeeID'),
                    'username' => session()->get('username'),
                    'event' => 'เพิ่ม',
                    'detail' => '[เพิ่ม] สาขา',
                    'ip' => $this->request->getIPAddress()
                ]);

                $status = 200;
                $response['success'] = 1;
                $response['message'] = 'เพิ่ม สาขา สำเร็จ';
            } else {
                $status = 200;
                $response['success'] = 0;
                $response['message'] = 'เพิ่ม สาขา ไม่สำเร็จ';
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
    //edit Branch
    public function editBranch($id = null)
    {
        $this->BranchModel = new \App\Models\BranchModel();
        $data = $this->BranchModel->getBranchByID($id);

        if ($data) {
            echo json_encode(array("status" => true, 'data' => $data));
        } else {
            echo json_encode(array("status" => false));
        }
    }

    //updateBranch
    public function updateBranch()
    {
        $this->BranchModel = new \App\Models\BranchModel();

        try {
            // SET CONFIG
            $status = 500;
            $response['success'] = 0;
            $response['message'] = '';
            $id = $this->request->getVar('BranchId');

            // HANDLE REQUEST
            $update = $this->BranchModel->updateBranchByID($id, [
                'branch_name' => $this->request->getVar('branch_name'),
                'updated_by' => session()->get('username'),
                'updated_at' => date('Y-m-d H:i:s')
            ]);

            if ($update) {

                logger_store([
                    'employee_id' => session()->get('employeeID'),
                    'username' => session()->get('username'),
                    'event' => 'อัพเดท',
                    'detail' => '[อัพเดท] สาขา',
                    'ip' => $this->request->getIPAddress()
                ]);

                $status = 200;
                $response['success'] = 1;
                $response['message'] = 'แก้ไข สาขา สำเร็จ';
            } else {
                $status = 200;
                $response['success'] = 0;
                $response['message'] = 'แก้ไข สาขา ไม่สำเร็จ';
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
    public function deleteBranch($id = null)
    {
        $this->BranchModel = new \App\Models\BranchModel();
        $this->BranchModel->updateBranchByID($id, [
            'deleted_by' => session()->get('username'),
            'deleted_at' => date('Y-m-d H:i:s')
        ]);

        logger_store([
            'employee_id' => session()->get('employeeID'),
            'username' => session()->get('username'),
            'event' => 'ลบ',
            'detail' => '[ลบ] สาขา',
            'ip' => $this->request->getIPAddress()
        ]);
    }
}
