<?php

namespace App\Controllers;

date_default_timezone_set('Asia/Jakarta');

use App\Controllers\BaseController;
use Aws\S3\S3Client;

class SettingController extends BaseController
{

    public function __construct()
    {
        $this->information = new \App\Models\InformationModel();
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
        <script src="' . base_url('/js/notify/js/notifIt.js') . '"></script> 
        <script src="' . base_url('/js/setting/information.js?v=' . time()) . '"></script>
        <script src="' . base_url('/js/setting/user_accounts.js?v=' . time()) . '"></script>
        <script src="' . base_url('/js/setting/employee_pin_pos.js?v=' . time()) . '"></script>
        <script src="' . base_url('/js/setting/employee_pin_stock.js?v=' . time()) . '"></script>
        <script src="' . base_url('/js/setting/mobile.js?v=' . time()) . '"></script>
        <script src="' . base_url('/js/setting/payment_type.js?v=' . time()) . '"></script>
        <script src="' . base_url('/js/setting/printer.js?v=' . time()) . '"></script>
        ';
        // <script src="' . base_url('/js/setting/position.js?v=' . time()) . '"></script>
        // <script src="' . base_url('/js/setting/branch.js?v=' . time()) . '"></script>

        echo view('/app', $data);
    }

    // // Position
    // public function ajaxDataTablesPosition()
    // {
    //     $PositionModel = new \App\Models\PositionModel();
    //     $param['search_value'] = $_REQUEST['search']['value'];
    //     $param['draw'] = $_REQUEST['draw'];
    //     $param['start'] = $_REQUEST['start'];
    //     $param['length'] = $_REQUEST['length'];

    //     if (!empty($param['search_value'])) {
    //         // count all data
    //         $total_count = $PositionModel->getPositionSearchcount($param);
    //         $data = $PositionModel->getPositionSearch($param);
    //     } else {
    //         // count all data
    //         $total_count = $PositionModel->getPositioncount();
    //         // get per page data
    //         $data = $PositionModel->getPosition($param);
    //     }

    //     $json_data = array(
    //         "draw" => intval($param['draw']),
    //         "recordsTotal" => count($total_count),
    //         "recordsFiltered" => count($total_count),
    //         "data" => $data   // total data array
    //     );

    //     echo json_encode($json_data);
    // }

    // // addPosition data 
    // public function addPosition()
    // {
    //     $this->PositionModel = new \App\Models\PositionModel();
    //     try {
    //         // SET CONFIG
    //         $status = 500;
    //         $response['success'] = 0;
    //         $response['message'] = '';

    //         // HANDLE REQUEST
    //         $create = $this->PositionModel->insertPosition([
    //             'position_name' => $this->request->getVar('position_name'),
    //             'created_by' => session()->get('username'),

    //         ]);
    //         // return redirect()->to('/employee/list');
    //         if ($create) {

    //             logger_store([
    //                 'employee_id' => session()->get('employeeID'),
    //                 'username' => session()->get('username'),
    //                 'event' => 'เพิ่ม',
    //                 'detail' => '[เพิ่ม] ตำแหน่ง',
    //                 'ip' => $this->request->getIPAddress()
    //             ]);

    //             $status = 200;
    //             $response['success'] = 1;
    //             $response['message'] = 'เพิ่ม ตำแหน่ง สำเร็จ';
    //         } else {
    //             $status = 200;
    //             $response['success'] = 0;
    //             $response['message'] = 'เพิ่ม ตำแหน่ง ไม่สำเร็จ';
    //         }
    //         // print_r($response['success']);
    //         // exit();
    //         return $this->response
    //             ->setStatusCode($status)
    //             ->setContentType('application/json')
    //             ->setJSON($response);
    //     } catch (\Exception $e) {
    //         echo $e->getMessage() . ' ' . $e->getLine();
    //     }
    // }
    // //edit Position
    // public function editPosition($id = null)
    // {
    //     $this->PositionModel = new \App\Models\PositionModel();
    //     $data = $this->PositionModel->getPositionByID($id);

    //     if ($data) {
    //         echo json_encode(array("status" => true, 'data' => $data));
    //     } else {
    //         echo json_encode(array("status" => false));
    //     }
    // }

    // //updatePosition
    // public function updatePosition()
    // {
    //     $this->PositionModel = new \App\Models\PositionModel();

    //     try {
    //         // SET CONFIG
    //         $status = 500;
    //         $response['success'] = 0;
    //         $response['message'] = '';
    //         $id = $this->request->getVar('PositionId');

    //         // HANDLE REQUEST
    //         $update = $this->PositionModel->updatePositionByID($id, [
    //             'position_name' => $this->request->getVar('position_name'),
    //             'updated_by' => session()->get('username'),
    //             'updated_at' => date('Y-m-d H:i:s')
    //         ]);

    //         if ($update) {

    //             logger_store([
    //                 'employee_id' => session()->get('employeeID'),
    //                 'username' => session()->get('username'),
    //                 'event' => 'อัพเดท',
    //                 'detail' => '[อัพเดท] ตำแหน่ง',
    //                 'ip' => $this->request->getIPAddress()
    //             ]);

    //             $status = 200;
    //             $response['success'] = 1;
    //             $response['message'] = 'แก้ไข ตำแหน่ง สำเร็จ';
    //         } else {
    //             $status = 200;
    //             $response['success'] = 0;
    //             $response['message'] = 'แก้ไข ตำแหน่ง ไม่สำเร็จ';
    //         }

    //         return $this->response
    //             ->setStatusCode($status)
    //             ->setContentType('application/json')
    //             ->setJSON($response);
    //     } catch (\Exception $e) {
    //         echo $e->getMessage() . ' ' . $e->getLine();
    //     }
    // }

    // // delete Position
    // public function deletePosition($id = null)
    // {
    //     $this->PositionModel = new \App\Models\PositionModel();
    //     $this->PositionModel->updatePositionByID($id, [
    //         'deleted_by' => session()->get('username'),
    //         'deleted_at' => date('Y-m-d H:i:s')
    //     ]);

    //     logger_store([
    //         'employee_id' => session()->get('employeeID'),
    //         'username' => session()->get('username'),
    //         'event' => 'ลบ',
    //         'detail' => '[ลบ] ตำแหน่ง',
    //         'ip' => $this->request->getIPAddress()
    //     ]);
    // }
    // //Branch
    // public function ajaxDataTablesBranch()
    // {
    //     $BranchModel = new \App\Models\BranchModel();
    //     $param['search_value'] = $_REQUEST['search']['value'];
    //     $param['draw'] = $_REQUEST['draw'];
    //     $param['start'] = $_REQUEST['start'];
    //     $param['length'] = $_REQUEST['length'];

    //     if (!empty($param['search_value'])) {
    //         // count all data
    //         $total_count = $BranchModel->getBranchSearchcount($param);
    //         $data = $BranchModel->getBranchSearch($param);
    //     } else {
    //         // count all data
    //         $total_count = $BranchModel->getBranchcount();
    //         // get per page data
    //         $data = $BranchModel->getBranch($param);
    //     }

    //     $json_data = array(
    //         "draw" => intval($param['draw']),
    //         "recordsTotal" => count($total_count),
    //         "recordsFiltered" => count($total_count),
    //         "data" => $data   // total data array
    //     );

    //     echo json_encode($json_data);
    // }

    // // addBranch data 
    // public function addBranch()
    // {
    //     $this->BranchModel = new \App\Models\BranchModel();
    //     try {
    //         // SET CONFIG
    //         $status = 500;
    //         $response['success'] = 0;
    //         $response['message'] = '';

    //         // HANDLE REQUEST
    //         $create = $this->BranchModel->insertBranch([
    //             'branch_name' => $this->request->getVar('branch_name'),
    //             'created_by' => session()->get('username'),
    //             'companies_id' => session()->get('companies_id')

    //         ]);
    //         // return redirect()->to('/employee/list');
    //         if ($create) {

    //             logger_store([
    //                 'employee_id' => session()->get('employeeID'),
    //                 'username' => session()->get('username'),
    //                 'event' => 'เพิ่ม',
    //                 'detail' => '[เพิ่ม] สาขา',
    //                 'ip' => $this->request->getIPAddress()
    //             ]);

    //             $status = 200;
    //             $response['success'] = 1;
    //             $response['message'] = 'เพิ่ม สาขา สำเร็จ';
    //         } else {
    //             $status = 200;
    //             $response['success'] = 0;
    //             $response['message'] = 'เพิ่ม สาขา ไม่สำเร็จ';
    //         }
    //         // print_r($response['success']);
    //         // exit();
    //         return $this->response
    //             ->setStatusCode($status)
    //             ->setContentType('application/json')
    //             ->setJSON($response);
    //     } catch (\Exception $e) {
    //         echo $e->getMessage() . ' ' . $e->getLine();
    //     }
    // }
    // //edit Branch
    // public function editBranch($id = null)
    // {
    //     $this->BranchModel = new \App\Models\BranchModel();
    //     $data = $this->BranchModel->getBranchByID($id);

    //     if ($data) {
    //         echo json_encode(array("status" => true, 'data' => $data));
    //     } else {
    //         echo json_encode(array("status" => false));
    //     }
    // }

    // //updateBranch
    // public function updateBranch()
    // {
    //     $this->BranchModel = new \App\Models\BranchModel();

    //     try {
    //         // SET CONFIG
    //         $status = 500;
    //         $response['success'] = 0;
    //         $response['message'] = '';
    //         $id = $this->request->getVar('BranchId');

    //         // HANDLE REQUEST
    //         $update = $this->BranchModel->updateBranchByID($id, [
    //             'branch_name' => $this->request->getVar('branch_name'),
    //             'updated_by' => session()->get('username'),
    //             'updated_at' => date('Y-m-d H:i:s')
    //         ]);

    //         if ($update) {

    //             logger_store([
    //                 'employee_id' => session()->get('employeeID'),
    //                 'username' => session()->get('username'),
    //                 'event' => 'อัพเดท',
    //                 'detail' => '[อัพเดท] สาขา',
    //                 'ip' => $this->request->getIPAddress()
    //             ]);

    //             $status = 200;
    //             $response['success'] = 1;
    //             $response['message'] = 'แก้ไข สาขา สำเร็จ';
    //         } else {
    //             $status = 200;
    //             $response['success'] = 0;
    //             $response['message'] = 'แก้ไข สาขา ไม่สำเร็จ';
    //         }

    //         return $this->response
    //             ->setStatusCode($status)
    //             ->setContentType('application/json')
    //             ->setJSON($response);
    //     } catch (\Exception $e) {
    //         echo $e->getMessage() . ' ' . $e->getLine();
    //     }
    // }

    // // delete Branch
    // public function deleteBranch($id = null)
    // {
    //     $this->BranchModel = new \App\Models\BranchModel();
    //     $this->BranchModel->updateBranchByID($id, [
    //         'deleted_by' => session()->get('username'),
    //         'deleted_at' => date('Y-m-d H:i:s')
    //     ]);

    //     logger_store([
    //         'employee_id' => session()->get('employeeID'),
    //         'username' => session()->get('username'),
    //         'event' => 'ลบ',
    //         'detail' => '[ลบ] สาขา',
    //         'ip' => $this->request->getIPAddress()
    //     ]);
    // }

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
                $data['EmailReportId'] = $this->EmailReportModel->getByEmailReportID();

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
                $response['EmailReportIdID'] = $data['EmailReportId'];
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

        // $this->EmailReportModel->updateEmailReportByID($param['id'], [
        //     'deleted_by' => session()->get('username'),
        //     'deleted_at' => date('Y-m-d H:i:s')
        // ]);

        $this->EmailReportModel->deleteEmailReportByID($param['id']);

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

        $param['valueMoney'] = $_REQUEST['valueMoney'];

        $valueMoney = $_REQUEST['valueMoney'];
        $symbolValueMoney = '';

        switch($valueMoney) {
            case 'THB': $symbolValueMoney = '฿'; break;
            case 'USD': $symbolValueMoney = '$'; break;
            case 'LAK': $symbolValueMoney = 'กีบ'; break;
        }

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
                    'updated_at' => date('Y-m-d H:i:s'),
                    'valueMoney' => $valueMoney,
                    'symbolValueMoney' => $symbolValueMoney
                ]);
            } else {
                $update = $this->InformationModel->insertInformation([
                    'shopname' => $param['shopname'],
                    'valueMoney' => $param['valueMoney'],
                    'service_charge' => $param['service_charge'],
                    'discount' => $param['discount'],
                    'discount_mode' => $param['discount_mode'],
                    'taxstatus' => $param['taxStatus'],
                    'taxid' => $param['taxId'],
                    'taxmode' => $param['taxMode'],
                    'taxrate' => $param['taxRate'],
                    'companies_id' => session()->get('companies_id'),
                    'valueMoney' => $valueMoney,
                    'symbolValueMoney' => $symbolValueMoney
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

    // deleteUser
    public function deleteUser($id = null)
    {
        $this->EmployeeModel = new \App\Models\EmployeeModel();
        $this->EmployeeModel->deleteEmployeeByID($id);

        logger_store([
            'employee_id' => session()->get('employeeID'),
            'username' => session()->get('username'),
            'event' => 'ลบ',
            'detail' => '[ลบ] User',
            'ip' => $this->request->getIPAddress()
        ]);
    }

    //ajaxDataTablesEmployeePinPos
    public function ajaxDataTablesEmployeePinPos()
    {
        $EmployeePinPosModel = new \App\Models\EmployeePinPosModel();

        $param['search_value'] = $_REQUEST['search']['value'];
        $param['draw'] = $_REQUEST['draw'];
        $param['start'] = $_REQUEST['start'];
        $param['length'] = $_REQUEST['length'];

        if (!empty($param['search_value'])) {
            // count all data
            $total_count = $EmployeePinPosModel->getEmployeePinPosSearchcount($param);
            $data = $EmployeePinPosModel->getEmployeePinPosSearch($param);
        } else {
            // count all data
            $total_count = $EmployeePinPosModel->getEmployeePinPoscount();
            // get per page data
            $data = $EmployeePinPosModel->getEmployeePinPos($param);
        }

        $json_data = array(
            "draw" => intval($param['draw']),
            "recordsTotal" => count($total_count),
            "recordsFiltered" => count($total_count),
            "data" => $data   // total data array
        );

        echo json_encode($json_data);
    }

    // addEmployeePinPos data 
    public function addEmployeePinPos()
    {
        $this->EmployeePinPosModel = new \App\Models\EmployeePinPosModel();
        try {
            // SET CONFIG
            $status = 500;
            $response['success'] = 0;
            $response['message'] = '';

            // $password = $this->request->getVar('new_password_employee_pos');
            // $hashed_password = password_hash($password, PASSWORD_DEFAULT);

            // HANDLE REQUEST
            $create = $this->EmployeePinPosModel->insertEmployeePinPos([
                'username' => $this->request->getVar('username_employee_pos'),
                'pin_pos' => $this->request->getVar('new_password_employee_pos'),
                'pin_pos_all' => '0',
                'pin_pos_move' => '0',
                'pin_pos_discount' => '0',
                'pin_pos_set_price' => '0',
                'pin_pos_void' => '0',
                'pin_pos_hide_cahsier' => '0',
                'created_by' => session()->get('username'),
                'companies_id' => session()->get('companies_id')
            ]);
            // return redirect()->to('/employee/list');
            if ($create) {

                logger_store([
                    'employee_id' => session()->get('employeeID'),
                    'username' => session()->get('username'),
                    'event' => 'เพิ่ม',
                    'detail' => '[เพิ่ม] พนักงาน POS',
                    'ip' => $this->request->getIPAddress()
                ]);

                $status = 200;
                $response['success'] = 1;
                $response['message'] = 'เพิ่ม พนักงาน POS สำเร็จ';
            } else {
                $status = 200;
                $response['success'] = 0;
                $response['message'] = 'เพิ่ม พนักงาน POS ไม่สำเร็จ';
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

    //updateEmployeePinPos
    public function updateEmployeePinPos()
    {
        $this->EmployeePinPosModel = new \App\Models\EmployeePinPosModel();

        try {
            // SET CONFIG
            $status = 500;
            $response['success'] = 0;
            $response['message'] = '';

            $param['editUserID'] = $_REQUEST['editUserID'];
            $param['All'] = $_REQUEST['All'];
            $param['Move'] = $_REQUEST['Move'];
            $param['Discount'] = $_REQUEST['Discount'];
            $param['Set_Price'] = $_REQUEST['Set_Price'];
            $param['Void'] = $_REQUEST['Void'];
            $param['Hide_Cahsier'] = $_REQUEST['Hide_Cahsier'];

            if ($param['All'] == 'false') {
                $All = 0;

                if ($param['Move'] != 'false') {
                    $Move = 1;
                } else {
                    $Move = 0;
                }

                if ($param['Discount'] != 'false') {
                    $Discount = 1;
                } else {
                    $Discount = 0;
                }

                if ($param['Set_Price'] != 'false') {
                    $Set_Price = 1;
                } else {
                    $Set_Price = 0;
                }

                if ($param['Void'] != 'false') {
                    $Void = 1;
                } else {
                    $Void = 0;
                }
            } else {
                $All = 1;
                $Move = 1;
                $Discount = 1;
                $Set_Price = 1;
                $Void = 1;
            }

            if ($param['Hide_Cahsier'] != 'false') {
                $Hide_Cahsier = 1;
            } else {
                $Hide_Cahsier = 0;
            }

            // HANDLE REQUEST
            $update = $this->EmployeePinPosModel->updateEmployeePinPosByID($param['editUserID'], [
                'pin_pos_all' => $All,
                'pin_pos_move' => $Move,
                'pin_pos_discount' => $Discount,
                'pin_pos_set_price' => $Set_Price,
                'pin_pos_void' => $Void,
                'pin_pos_hide_cahsier' => $Hide_Cahsier,
                'updated_by' => session()->get('username'),
                'updated_at' => date('Y-m-d H:i:s')
            ]);

            if ($update) {

                logger_store([
                    'employee_id' => session()->get('employeeID'),
                    'username' => session()->get('username'),
                    'event' => 'อัพเดท',
                    'detail' => '[อัพเดท] พนักงาน POS',
                    'ip' => $this->request->getIPAddress()
                ]);

                $status = 200;
                $response['success'] = 1;
                $response['message'] = 'แก้ไข พนักงาน POS สำเร็จ';
            } else {
                $status = 200;
                $response['success'] = 0;
                $response['message'] = 'แก้ไข พนักงาน POS ไม่สำเร็จ';
            }

            return $this->response
                ->setStatusCode($status)
                ->setContentType('application/json')
                ->setJSON($response);
        } catch (\Exception $e) {
            echo $e->getMessage() . ' ' . $e->getLine();
        }
    }

    // deleteUser
    public function deleteEmployeePinPos($id = null)
    {
        $this->EmployeePinPosModel = new \App\Models\EmployeePinPosModel();
        $this->EmployeePinPosModel->deleteEmployeePinPosByID($id);

        logger_store([
            'employee_id' => session()->get('employeeID'),
            'username' => session()->get('username'),
            'event' => 'ลบ',
            'detail' => '[ลบ] พนักงาน POS',
            'ip' => $this->request->getIPAddress()
        ]);
    }

    //ajaxDataTablesEmployeePinStock
    public function ajaxDataTablesEmployeePinStock()
    {
        $EmployeePinStockModel = new \App\Models\EmployeePinStockModel();

        $param['search_value'] = $_REQUEST['search']['value'];
        $param['draw'] = $_REQUEST['draw'];
        $param['start'] = $_REQUEST['start'];
        $param['length'] = $_REQUEST['length'];

        if (!empty($param['search_value'])) {
            // count all data
            $total_count = $EmployeePinStockModel->getEmployeePinStockSearchcount($param);
            $data = $EmployeePinStockModel->getEmployeePinStockSearch($param);
        } else {
            // count all data
            $total_count = $EmployeePinStockModel->getEmployeePinStockcount();
            // get per page data
            $data = $EmployeePinStockModel->getEmployeePinStock($param);
        }

        $json_data = array(
            "draw" => intval($param['draw']),
            "recordsTotal" => count($total_count),
            "recordsFiltered" => count($total_count),
            "data" => $data   // total data array
        );

        echo json_encode($json_data);
    }

    // addEmployeePinStock data
    public function addEmployeePinStock()
    {
        $this->EmployeePinStockModel = new \App\Models\EmployeePinStockModel();
        try {
            // SET CONFIG
            $status = 500;
            $response['success'] = 0;
            $response['message'] = '';

            // $password = $this->request->getVar('new_password_employee_stock');
            // $hashed_password = password_hash($password, PASSWORD_DEFAULT);

            // HANDLE REQUEST
            $create = $this->EmployeePinStockModel->insertEmployeePinStock([
                'username' => $this->request->getVar('username_employee_stock'),
                'pin_stock' => $this->request->getVar('new_password_employee_stock'),
                'pin_stock_all' => '0',
                'pin_stock_edit_stock' => '0',
                'pin_stock_edit_formula' => '0',
                'pin_stock_transaction_add' => '0',
                'pin_stock_transaction_withdraw' => '0',
                'pin_stock_transaction_adjust' => '0',
                'created_by' => session()->get('username'),
                'companies_id' => session()->get('companies_id')
            ]);
            // return redirect()->to('/employee/list');
            if ($create) {

                logger_store([
                    'employee_id' => session()->get('employeeID'),
                    'username' => session()->get('username'),
                    'event' => 'เพิ่ม',
                    'detail' => '[เพิ่ม] พนักงาน Stock',
                    'ip' => $this->request->getIPAddress()
                ]);

                $status = 200;
                $response['success'] = 1;
                $response['message'] = 'เพิ่ม พนักงาน Stock สำเร็จ';
            } else {
                $status = 200;
                $response['success'] = 0;
                $response['message'] = 'เพิ่ม พนักงาน Stock ไม่สำเร็จ';
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

    //updateEmployeePinPos
    public function updateEmployeePinStock()
    {
        $this->EmployeePinStockModel = new \App\Models\EmployeePinStockModel();

        try {
            // SET CONFIG
            $status = 500;
            $response['success'] = 0;
            $response['message'] = '';

            $param['editUserID'] = $_REQUEST['editUserID'];
            $param['Stock_All'] = $_REQUEST['Stock_All'];
            $param['Edit_Stock'] = $_REQUEST['Edit_Stock'];
            $param['Edit_Formula'] = $_REQUEST['Edit_Formula'];
            $param['Transaction_Add'] = $_REQUEST['Transaction_Add'];
            $param['Transaction_Withdraw'] = $_REQUEST['Transaction_Withdraw'];
            $param['Transaction_Adjust'] = $_REQUEST['Transaction_Adjust'];

            if ($param['Stock_All'] == 'false') {
                $Stock_All = 0;

                if ($param['Edit_Stock'] != 'false') {
                    $Edit_Stock = 1;
                } else {
                    $Edit_Stock = 0;
                }

                if ($param['Edit_Formula'] != 'false') {
                    $Edit_Formula = 1;
                } else {
                    $Edit_Formula = 0;
                }

                if ($param['Transaction_Add'] != 'false') {
                    $Transaction_Add = 1;
                } else {
                    $Transaction_Add = 0;
                }

                if ($param['Transaction_Withdraw'] != 'false') {
                    $Transaction_Withdraw = 1;
                } else {
                    $Transaction_Withdraw = 0;
                }

                if ($param['Transaction_Adjust'] != 'false') {
                    $Transaction_Adjust = 1;
                } else {
                    $Transaction_Adjust = 0;
                }
            } else {
                $Stock_All = 1;
                $Edit_Stock = 1;
                $Edit_Formula = 1;
                $Transaction_Add = 1;
                $Transaction_Withdraw = 1;
                $Transaction_Adjust = 1;
            }

            // HANDLE REQUEST
            $update = $this->EmployeePinStockModel->updateEmployeePinStockByID($param['editUserID'], [
                'pin_stock_all' => $Stock_All,
                'pin_stock_edit_stock' => $Edit_Stock,
                'pin_stock_edit_formula' => $Edit_Formula,
                'pin_stock_transaction_add' => $Transaction_Add,
                'pin_stock_transaction_withdraw' => $Transaction_Withdraw,
                'pin_stock_transaction_adjust' => $Transaction_Adjust,
                'updated_by' => session()->get('username'),
                'updated_at' => date('Y-m-d H:i:s')
            ]);

            if ($update) {

                logger_store([
                    'employee_id' => session()->get('employeeID'),
                    'username' => session()->get('username'),
                    'event' => 'อัพเดท',
                    'detail' => '[อัพเดท] พนักงาน Stock',
                    'ip' => $this->request->getIPAddress()
                ]);

                $status = 200;
                $response['success'] = 1;
                $response['message'] = 'แก้ไข พนักงาน Stock สำเร็จ';
            } else {
                $status = 200;
                $response['success'] = 0;
                $response['message'] = 'แก้ไข พนักงาน Stock ไม่สำเร็จ';
            }

            return $this->response
                ->setStatusCode($status)
                ->setContentType('application/json')
                ->setJSON($response);
        } catch (\Exception $e) {
            echo $e->getMessage() . ' ' . $e->getLine();
        }
    }

    // deleteUser
    public function deleteEmployeePinStock($id = null)
    {
        $this->EmployeePinStockModel = new \App\Models\EmployeePinStockModel();
        $this->EmployeePinStockModel->deleteEmployeePinStockByID($id);

        logger_store([
            'employee_id' => session()->get('employeeID'),
            'username' => session()->get('username'),
            'event' => 'ลบ',
            'detail' => '[ลบ] พนักงาน Stock',
            'ip' => $this->request->getIPAddress()
        ]);
    }

    //ajaxDataTablesMobile
    public function ajaxDataTablesMobile()
    {
        $MobileModel = new \App\Models\MobileModel();

        $param['search_value'] = $_REQUEST['search']['value'];
        $param['draw'] = $_REQUEST['draw'];
        $param['start'] = $_REQUEST['start'];
        $param['length'] = $_REQUEST['length'];

        if (!empty($param['search_value'])) {
            // count all data
            $total_count = $MobileModel->getMobileSearchcount($param);
            $data = $MobileModel->getMobileSearch($param);
        } else {
            // count all data
            $total_count = $MobileModel->getMobilecount();
            // get per page data
            $data = $MobileModel->getMobile($param);
        }

        $json_data = array(
            "draw" => intval($param['draw']),
            "recordsTotal" => count($total_count),
            "recordsFiltered" => count($total_count),
            "data" => $data   // total data array
        );

        echo json_encode($json_data);
    }

    // addMobile data 
    public function addMobile()
    {
        $this->MobileModel = new \App\Models\MobileModel();
        try {
            // SET CONFIG
            $status = 500;
            $response['success'] = 0;
            $response['message'] = '';

            // HANDLE REQUEST
            $create = $this->MobileModel->insertMobile([
                'device_id' => $this->request->getVar('device_id'),
                'created_by' => session()->get('username'),
                'companies_id' => session()->get('companies_id')
            ]);
            // return redirect()->to('/employee/list');
            if ($create) {

                logger_store([
                    'employee_id' => session()->get('employeeID'),
                    'username' => session()->get('username'),
                    'event' => 'เพิ่ม',
                    'detail' => '[เพิ่ม] Mobile',
                    'ip' => $this->request->getIPAddress()
                ]);

                $status = 200;
                $response['success'] = 1;
                $response['message'] = 'เพิ่ม Mobile สำเร็จ';
            } else {
                $status = 200;
                $response['success'] = 0;
                $response['message'] = 'เพิ่ม Mobile ไม่สำเร็จ';
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

    // deleteMobile
    public function deleteMobile($id = null)
    {
        $this->MobileModel = new \App\Models\MobileModel();
        $this->MobileModel->deleteMobileByID($id);

        logger_store([
            'employee_id' => session()->get('employeeID'),
            'username' => session()->get('username'),
            'event' => 'ลบ',
            'detail' => '[ลบ] Mobile',
            'ip' => $this->request->getIPAddress()
        ]);
    }

    //ajaxDataTablesPaymentType
    public function ajaxDataTablesPaymentType()
    {
        $PaymentTypeModel = new \App\Models\PaymentTypeModel();

        $param['search_value'] = $_REQUEST['search']['value'];
        $param['draw'] = $_REQUEST['draw'];
        $param['start'] = $_REQUEST['start'];
        $param['length'] = $_REQUEST['length'];

        if (!empty($param['search_value'])) {
            // count all data
            $total_count = $PaymentTypeModel->getPaymentTypeSearchcount($param);
            $data = $PaymentTypeModel->getPaymentTypeSearch($param);
        } else {
            // count all data
            $total_count = $PaymentTypeModel->getPaymentTypecount();
            // get per page data
            $data = $PaymentTypeModel->getPaymentType($param);
        }

        $json_data = array(
            "draw" => intval($param['draw']),
            "recordsTotal" => count($total_count),
            "recordsFiltered" => count($total_count),
            "data" => $data   // total data array
        );

        echo json_encode($json_data);
    }

    // addPaymentType data 
    public function addPaymentType()
    {
        $this->PaymentTypeModel = new \App\Models\PaymentTypeModel();
        try {
            // SET CONFIG
            $status = 500;
            $response['success'] = 0;
            $response['message'] = '';

            // HANDLE REQUEST
            $create = $this->PaymentTypeModel->insertPaymentType([
                'type' => $this->request->getVar('type'),
                'credit_card' => '0',
                'entertain' => '0',
                'created_by' => session()->get('username'),
                'companies_id' => session()->get('companies_id')
            ]);
            // return redirect()->to('/employee/list');
            if ($create) {

                logger_store([
                    'employee_id' => session()->get('employeeID'),
                    'username' => session()->get('username'),
                    'event' => 'เพิ่ม',
                    'detail' => '[เพิ่ม] PaymentType',
                    'ip' => $this->request->getIPAddress()
                ]);

                $status = 200;
                $response['success'] = 1;
                $response['message'] = 'เพิ่ม PaymentType สำเร็จ';
            } else {
                $status = 200;
                $response['success'] = 0;
                $response['message'] = 'เพิ่ม PaymentType ไม่สำเร็จ';
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

    // //updatePaymentType
    // public function updatePaymentType()
    // {
    //     $this->PaymentTypeModel = new \App\Models\PaymentTypeModel();

    //     try {
    //         // SET CONFIG
    //         $status = 500;
    //         $response['success'] = 0;
    //         $response['message'] = '';

    //         $param['PaymentTypeID'] = $_REQUEST['PaymentTypeID'];
    //         $param['Credit_Card'] = $_REQUEST['Credit_Card'];
    //         $param['Entertain'] = $_REQUEST['Entertain'];

    //         if ($param['Credit_Card'] != 'false') {
    //             $Credit_Card = 1;
    //         } else {
    //             $Credit_Card = 0;
    //         }

    //         if ($param['Entertain'] != 'false') {
    //             $Entertain = 1;
    //         } else {
    //             $Entertain = 0;
    //         }

    //         // HANDLE REQUEST
    //         $update = $this->PaymentTypeModel->updatePaymentTypeByID($param['PaymentTypeID'], [
    //             'credit_card' => $Credit_Card,
    //             'entertain' => $Entertain,
    //             'updated_by' => session()->get('username'),
    //             'updated_at' => date('Y-m-d H:i:s')
    //         ]);

    //         if ($update) {

    //             logger_store([
    //                 'employee_id' => session()->get('employeeID'),
    //                 'username' => session()->get('username'),
    //                 'event' => 'อัพเดท',
    //                 'detail' => '[อัพเดท] PaymentType',
    //                 'ip' => $this->request->getIPAddress()
    //             ]);

    //             $status = 200;
    //             $response['success'] = 1;
    //             $response['message'] = 'แก้ไข PaymentType สำเร็จ';
    //         } else {
    //             $status = 200;
    //             $response['success'] = 0;
    //             $response['message'] = 'แก้ไข PaymentType ไม่สำเร็จ';
    //         }

    //         return $this->response
    //             ->setStatusCode($status)
    //             ->setContentType('application/json')
    //             ->setJSON($response);
    //     } catch (\Exception $e) {
    //         echo $e->getMessage() . ' ' . $e->getLine();
    //     }
    // }

    // deletePaymentType
    public function deletePaymentType($id = null)
    {
        $this->PaymentTypeModel = new \App\Models\PaymentTypeModel();
        $this->PaymentTypeModel->deletePaymentTypeByID($id);

        logger_store([
            'employee_id' => session()->get('employeeID'),
            'username' => session()->get('username'),
            'event' => 'ลบ',
            'detail' => '[ลบ] PaymentType',
            'ip' => $this->request->getIPAddress()
        ]);
    }

    public function updateCreditCard()
    {
        try {

            $this->PaymentTypeModel = new \App\Models\PaymentTypeModel();
            $status = 500;
            $response['success'] = 0;

            $update = $this->PaymentTypeModel->updatePaymentTypeByID($this->request->getVar('id'), [
                'credit_card' => $this->request->getVar('status'),
                'updated_by' => session()->get('username'),
                'updated_at' => date('Y-m-d H:i:s')
            ]);

            if ($update) {

                logger_store([
                    'employee_id' => session()->get('employeeID'),
                    'username' => session()->get('username'),
                    'event' => 'อัพเดท',
                    'detail' => '[อัพเดท] PaymentType',
                    'ip' => $this->request->getIPAddress()
                ]);

                $status = 200;
                $response['success'] = 1;
            }

            return $this->response
                ->setStatusCode($status)
                ->setContentType('application/json')
                ->setJSON($response);
        } catch (\Exception $e) {
            echo $e->getMessage() . ' ' . $e->getLine();
        }
    }

    public function updateEntertain()
    {
        try {

            $this->PaymentTypeModel = new \App\Models\PaymentTypeModel();
            $status = 500;
            $response['success'] = 0;

            $update = $this->PaymentTypeModel->updatePaymentTypeByID($this->request->getVar('id'), [
                'entertain' => $this->request->getVar('status'),
                'updated_by' => session()->get('username'),
                'updated_at' => date('Y-m-d H:i:s')
            ]);

            if ($update) {

                logger_store([
                    'employee_id' => session()->get('employeeID'),
                    'username' => session()->get('username'),
                    'event' => 'อัพเดท',
                    'detail' => '[อัพเดท] PaymentType',
                    'ip' => $this->request->getIPAddress()
                ]);

                $status = 200;
                $response['success'] = 1;
            }

            return $this->response
                ->setStatusCode($status)
                ->setContentType('application/json')
                ->setJSON($response);
        } catch (\Exception $e) {
            echo $e->getMessage() . ' ' . $e->getLine();
        }
    }

    public function getprinter()
    {
        $print_list = $this->information->get_printer();
        return $this->response->setJSON([
            'status' => 200,
            'error' => false,
            'data' => $print_list
        ]);
    }

    public function printersetting()
    {
        $buffer_datetime = date("Y-m-d H:i:s");
        $id = $this->request->getPost('id');
        $printer_order = $this->request->getPost('printer_order');
        $printer_summary_order = $this->request->getPost('printer_summary_order');
        $printer_bill = $this->request->getPost('printer_bill');

        if ($id != '') {
            //update
            $data = [
                'printer_order' =>  $printer_order,
                'printer_order_summary' =>  $printer_summary_order,
                'printer_bill' =>   $printer_bill,
                'updated_by' => session()->get('username'),
                'updated_at' => $buffer_datetime,
            ];

            $update = $this->information->updatePrinter($data, $id);

            if ($update) {
                return $this->response->setJSON([
                    'status' => 200,
                    'error' => false,
                    'message' => 'รายการสำเร็จ'
                ]);
            } else {
                return $this->response->setJSON([
                    'status' => 200,
                    'error' => true,
                    'message' => 'ลบไม่สำเร็จ'
                ]);
            }
        } else {
            //insert
            $data = [
                'printer_order' =>  $printer_order,
                'printer_order_summary' =>  $printer_summary_order,
                'printer_bill' =>   $printer_bill,
                'created_by' => session()->get('username'),
                'created_at' => $buffer_datetime,
                'companies_id' => session()->get('companies_id')
            ];

            $new = $this->information->insertPrinter($data);

            if ($new) {
                return $this->response->setJSON([
                    'status' => 200,
                    'error' => false,
                    'message' => 'รายการสำเร็จ'
                ]);
            } else {
                return $this->response->setJSON([
                    'status' => 200,
                    'error' => true,
                    'message' => 'ลบไม่สำเร็จ'
                ]);
            }
        }
    }

    public function file_setting()
    {
        $datas = $_POST["data"];
        foreach ($datas as $data) {

            $file = $data['src_file_setting'];

            $new_file = explode(";", $file);
            $new_file_move = explode(",", $file);
            $type = $new_file[0];
            $type_real = explode("/", $type);

            // var_dump($type);
            // exit;

            if ($type_real[1] == 'plain') {
                file_put_contents('js/QZ_cer/digital-certificate' . session()->get('companies_id') . '.txt', base64_decode($new_file_move[1]));
            } else if ($type_real[1] == 'javascript') {
                file_put_contents('js/QZ_cer/sign-message' . session()->get('companies_id') . '.js', base64_decode($new_file_move[1]));
            }
        }
    }
}
