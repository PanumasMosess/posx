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

    public function index()
    {
        $this->EmailReportModel = new \App\Models\EmailReportModel();
        $data['email_reports'] = $this->EmailReportModel->getEmailReportAll();

        $this->EmployeeModel = new \App\Models\EmployeeModel();
        $data['companies'] = $this->EmployeeModel->getCompanies();

        $data['employees'] = $this->EmployeeModel->getEmployeeByCompanieID();

        $data['content'] = 'setting/index';
        $data['title'] = 'ตั้งค่า';
        $data['js_critical'] = '
        <script src="' . base_url('/js/setting/group_product.js?v=' . time()) . '"></script>
        <script src="' . base_url('/js/setting/supplier.js?v=' . time()) . '"></script>
        <script src="' . base_url('/js/setting/position.js?v=' . time()) . '"></script>
        <script src="' . base_url('/js/setting/branch.js?v=' . time()) . '"></script>
        <script src="' . base_url('/js/setting/information.js?v=' . time()) . '"></script>
        <script src="' . base_url('/js/setting/user_accounts.js?v=' . time()) . '"></script>
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

    // Position
    public function ajaxDataTablesPosition()
    {
        $PositionModel = new \App\Models\PositionModel();
        $param['search_value'] = $_REQUEST['search']['value'];
        $param['draw'] = $_REQUEST['draw'];
        $param['start'] = $_REQUEST['start'];
        $param['length'] = $_REQUEST['length'];

        if (!empty($param['search_value'])) {
            // count all data
            $total_count = $PositionModel->getPositionSearchcount($param);
            $data = $PositionModel->getPositionSearch($param);
        } else {
            // count all data
            $total_count = $PositionModel->getPositioncount();
            // get per page data
            $data = $PositionModel->getPosition($param);
        }

        $json_data = array(
            "draw" => intval($param['draw']),
            "recordsTotal" => count($total_count),
            "recordsFiltered" => count($total_count),
            "data" => $data   // total data array
        );

        echo json_encode($json_data);
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
    public function ajaxDataTablesBranch()
    {
        $BranchModel = new \App\Models\BranchModel();
        $param['search_value'] = $_REQUEST['search']['value'];
        $param['draw'] = $_REQUEST['draw'];
        $param['start'] = $_REQUEST['start'];
        $param['length'] = $_REQUEST['length'];

        if (!empty($param['search_value'])) {
            // count all data
            $total_count = $BranchModel->getBranchSearchcount($param);
            $data = $BranchModel->getBranchSearch($param);
        } else {
            // count all data
            $total_count = $BranchModel->getBranchcount();
            // get per page data
            $data = $BranchModel->getBranch($param);
        }

        $json_data = array(
            "draw" => intval($param['draw']),
            "recordsTotal" => count($total_count),
            "recordsFiltered" => count($total_count),
            "data" => $data   // total data array
        );

        echo json_encode($json_data);
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
                'companies_id' => session()->get('companies_id')

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

    // update password data
    public function updatePasswordCompanies()
    {
        $this->EmployeeModel = new \App\Models\EmployeeModel();
        try {
            // SET CONFIG
            $status = 500;
            $response['success'] = 0;
            $response['message'] = '';

            $id = session()->get('companies_id');
            $password = $this->request->getVar('new_password');
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);

            // HANDLE REQUEST
            $update = $this->EmployeeModel->updateCompaniesByID($id, [
                'companies_password' => $hashed_password,
                'updated_by' => session()->get('username'),
                'updated_at' => date('Y-m-d H:i:s')
            ]);

            if ($update) {
                logger_store([
                    'employee_id' => session()->get('employeeID'),
                    'username' => session()->get('username'),
                    'event' => 'อัพเดท',
                    'detail' => '[อัพเดท] รหัสผ่าน',
                    'ip' => $this->request->getIPAddress()
                ]);
                $status = 200;
                $response['success'] = 1;
                $response['message'] = 'แก้ไข รหัสผ่าน สำเร็จ';
            } else {
                $status = 200;
                $response['success'] = 0;
                $response['message'] = 'แก้ไข รหัสผ่าน ไม่สำเร็จ';
            }

            return $this->response
                ->setStatusCode($status)
                ->setContentType('application/json')
                ->setJSON($response);
        } catch (\Exception $e) {
            echo $e->getMessage() . ' ' . $e->getLine();
        }
    }

    // addEmail data 
    public function addEmail()
    {
        $this->EmailReportModel = new \App\Models\EmailReportModel();

        $param['email'] = $_REQUEST['email'];
        try {
            // SET CONFIG
            $status = 500;
            $response['success'] = 0;
            $response['message'] = '';

            // pr($param['data']);
            // HANDLE REQUEST
            $create = $this->EmailReportModel->insertEmailReport([
                'email' => $param['email'],
                'created_by' => session()->get('username'),
                'companies_id' => session()->get('companies_id')
            ]);
            if ($create) {
                logger_store([
                    'employee_id' => session()->get('employeeID'),
                    'username' => session()->get('username'),
                    'event' => 'เพิ่ม',
                    'detail' => '[เพิ่ม] EmailReport',
                    'ip' => $this->request->getIPAddress()
                ]);

                $status = 200;
                $response['success'] = 1;
                $response['message'] = 'เพิ่ม EmailReport สำเร็จ';
            } else {
                $status = 200;
                $response['success'] = 0;
                $response['message'] = 'เพิ่ม EmailReport ไม่สำเร็จ';
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

    // delete Email
    public function deleteEmail()
    {
        $this->EmailReportModel = new \App\Models\EmailReportModel();
        $param['id'] = $_REQUEST['id'];

        $this->EmailReportModel->updateEmailReportByID($param['id'], [
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

    //information
    public function information()
    {
        $this->InformationModel = new \App\Models\InformationModel();
        $data = $this->InformationModel->getInformation();

        if ($data) {
            echo json_encode(array("status" => true, 'data' => $data));
        } else {
            echo json_encode(array("status" => false));
        }
    }

    //updateBranch
    public function updateInformation()
    {
        $this->InformationModel = new \App\Models\InformationModel();
        $data = $this->InformationModel->getInformation();

        $param['shopname'] = $_REQUEST['shopname'];
        $param['service_charge'] = $_REQUEST['service_charge'];
        $param['discount'] = $_REQUEST['discount'];
        $param['discount_mode'] = $_REQUEST['discount_mode'];
        $param['taxStatus'] = $_REQUEST['taxStatus'];
        $param['taxId'] = $_REQUEST['taxId'];
        $param['taxMode'] = $_REQUEST['taxMode'];
        $param['taxRate'] = $_REQUEST['taxRate'];

        try {
            // SET CONFIG
            $status = 500;
            $response['success'] = 0;
            $response['message'] = '';

            // HANDLE REQUEST
            if ($data != null) {
                $update = $this->InformationModel->updateInformationByID(session()->get('companies_id'), [
                    'shopname' => $param['shopname'],
                    'service_charge' => $param['service_charge'],
                    'discount' => $param['discount'],
                    'discount_mode' => $param['discount_mode'],
                    'taxstatus' => $param['taxStatus'],
                    'taxid' => $param['taxId'],
                    'taxmode' => $param['taxMode'],
                    'taxrate' => $param['taxRate'],
                    'updated_by' => session()->get('username'),
                    'updated_at' => date('Y-m-d H:i:s')
                ]);
            } else {
                $update = $this->InformationModel->insertInformation([
                    'shopname' => $param['shopname'],
                    'service_charge' => $param['service_charge'],
                    'discount' => $param['discount'],
                    'discount_mode' => $param['discount_mode'],
                    'taxstatus' => $param['taxStatus'],
                    'taxid' => $param['taxId'],
                    'taxmode' => $param['taxMode'],
                    'taxrate' => $param['taxRate'],
                    'companies_id' => session()->get('companies_id')
                ]);
            }
            if ($update) {
                logger_store([
                    'employee_id' => session()->get('employeeID'),
                    'username' => session()->get('username'),
                    'event' => 'อัพเดท',
                    'detail' => '[อัพเดท] Information',
                    'ip' => $this->request->getIPAddress()
                ]);
                $status = 200;
                $response['success'] = 1;
                $response['message'] = 'แก้ไข Information สำเร็จ';
            } else {
                $status = 200;
                $response['success'] = 0;
                $response['message'] = 'แก้ไข Information ไม่สำเร็จ';
            }
            return $this->response
                ->setStatusCode($status)
                ->setContentType('application/json')
                ->setJSON($response);
        } catch (\Exception $e) {
            echo $e->getMessage() . ' ' . $e->getLine();
        }
    }

    // addNewUser data 
    public function addNewUser()
    {
        $this->EmployeeModel = new \App\Models\EmployeeModel();

        $param['username'] = $_REQUEST['username'];
        $param['user_password'] = $_REQUEST['user_password'];
        $param['name_userlogin'] = $_REQUEST['name_userlogin'];
        $param['roles'] = $_REQUEST['roles'];
        $param['Pos'] = $_REQUEST['Pos'];
        $param['Report'] = $_REQUEST['Report'];
        $param['Menu'] = $_REQUEST['Menu'];
        $param['Expense'] = $_REQUEST['Expense'];
        $param['Stock'] = $_REQUEST['Stock'];
        $param['Setting'] = $_REQUEST['Setting'];

        if ($param['roles'] != 1) {

            if ($param['Pos'] != 'false') {
                $Pos = 1;
            } else {
                $Pos = 0;
            }

            if ($param['Report'] != 'false') {
                $Report = 1;
            } else {
                $Report = 0;
            }

            if ($param['Menu'] != 'false') {
                $Menu = 1;
            } else {
                $Menu = 0;
            }

            if ($param['Expense'] != 'false') {
                $Expense = 1;
            } else {
                $Expense = 0;
            }

            if ($param['Stock'] != 'false') {
                $Stock = 1;
            } else {
                $Stock = 0;
            }

            if ($param['Setting'] != 'false') {
                $Setting = 1;
            } else {
                $Setting = 0;
            }
        } else {
            $Pos = 1;
            $Report = 1;
            $Menu = 1;
            $Expense = 1;
            $Stock = 1;
            $Setting = 1;
        }

        try {
            // SET CONFIG
            $status = 500;
            $response['success'] = 0;
            $response['message'] = '';

            $password = $param['user_password'];
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);

            // HANDLE REQUEST
            $create = $this->EmployeeModel->insertEmployee([
                'username' => $param['username'],
                'password' => $hashed_password,
                'name' => $param['name_userlogin'],
                'roles' => $param['roles'],
                'setting_pos' => $Pos,
                'setting_report' => $Report,
                'setting_menu' => $Menu,
                'setting_expense' => $Expense,
                'setting_stock' => $Stock,
                'setting_setting' => $Setting,
                'created_by' => session()->get('username'),
                'companies_id' => session()->get('companies_id')
            ]);
            if ($create) {
                $data['employee'] = $this->EmployeeModel->getByEmployeeID();

                logger_store([
                    'employee_id' => session()->get('employeeID'),
                    'username' => session()->get('username'),
                    'event' => 'เพิ่ม',
                    'detail' => '[เพิ่ม] UserLogin',
                    'ip' => $this->request->getIPAddress()
                ]);

                $status = 200;
                $response['success'] = 1;
                $response['message'] = 'เพิ่ม UserLogin สำเร็จ';
                $response['employeeID'] = $data['employee'];
            } else {
                $status = 200;
                $response['success'] = 0;
                $response['message'] = 'เพิ่ม UserLogin ไม่สำเร็จ';
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

    //editUser
    public function editUser($id = null)
    {
        $this->EmployeeModel = new \App\Models\EmployeeModel();
        $data = $this->EmployeeModel->getEmployeeByID($id);

        if ($data) {
            echo json_encode(array("status" => true, 'data' => $data));
        } else {
            echo json_encode(array("status" => false));
        }
    }

    //updateUser
    public function updateUser()
    {
        $this->EmployeeModel = new \App\Models\EmployeeModel();

        try {
            // SET CONFIG
            $status = 500;
            $response['success'] = 0;
            $response['message'] = '';

            $param['editUserID'] = $_REQUEST['editUserID'];
            $param['name_userlogin'] = $_REQUEST['name_userlogin'];
            $param['roles'] = $_REQUEST['roles'];
            $param['Pos'] = $_REQUEST['Pos'];
            $param['Report'] = $_REQUEST['Report'];
            $param['Menu'] = $_REQUEST['Menu'];
            $param['Expense'] = $_REQUEST['Expense'];
            $param['Stock'] = $_REQUEST['Stock'];
            $param['Setting'] = $_REQUEST['Setting'];

            if ($param['roles'] != 1) {

                if ($param['Pos'] != 'false') {
                    $Pos = 1;
                } else {
                    $Pos = 0;
                }
    
                if ($param['Report'] != 'false') {
                    $Report = 1;
                } else {
                    $Report = 0;
                }
    
                if ($param['Menu'] != 'false') {
                    $Menu = 1;
                } else {
                    $Menu = 0;
                }
    
                if ($param['Expense'] != 'false') {
                    $Expense = 1;
                } else {
                    $Expense = 0;
                }
    
                if ($param['Stock'] != 'false') {
                    $Stock = 1;
                } else {
                    $Stock = 0;
                }
    
                if ($param['Setting'] != 'false') {
                    $Setting = 1;
                } else {
                    $Setting = 0;
                }
            } else {
                $Pos = 1;
                $Report = 1;
                $Menu = 1;
                $Expense = 1;
                $Stock = 1;
                $Setting = 1;
            }

            // HANDLE REQUEST
            $update = $this->EmployeeModel->updateEmployeeByID($param['editUserID'], [
                'name' => $param['name_userlogin'],
                'roles' => $param['roles'],
                'setting_pos' => $Pos,
                'setting_report' => $Report,
                'setting_menu' => $Menu,
                'setting_expense' => $Expense,
                'setting_stock' => $Stock,
                'setting_setting' => $Setting,
                'updated_at' => date('Y-m-d H:i:s')
            ]);

            if ($update) {

                logger_store([
                    'employee_id' => session()->get('employeeID'),
                    'username' => session()->get('username'),
                    'event' => 'อัพเดท',
                    'detail' => '[อัพเดท] UserLogin',
                    'ip' => $this->request->getIPAddress()
                ]);

                $status = 200;
                $response['success'] = 1;
                $response['message'] = 'แก้ไข UserLogin สำเร็จ';
            } else {
                $status = 200;
                $response['success'] = 0;
                $response['message'] = 'แก้ไข UserLogin ไม่สำเร็จ';
            }

            return $this->response
                ->setStatusCode($status)
                ->setContentType('application/json')
                ->setJSON($response);
        } catch (\Exception $e) {
            echo $e->getMessage() . ' ' . $e->getLine();
        }
    }
}
