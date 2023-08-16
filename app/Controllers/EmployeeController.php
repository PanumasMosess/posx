<?php

namespace App\Controllers;

date_default_timezone_set('Asia/Jakarta');

use App\Controllers\BaseController;
use Aws\S3\S3Client;

class EmployeeController extends BaseController
{

    public function __construct()
    {
    }

    //Employee
    public function index()
    {
        $this->EmployeeModel = new \App\Models\EmployeeModel();
        $this->BranchModel = new \App\Models\BranchModel();
        $this->PositionModel = new \App\Models\PositionModel();

        $data['employees'] = $this->EmployeeModel->getEmployeeAllWithJoin();
        $data['branchs'] = $this->BranchModel->getBranchAll();
        $data['positions'] = $this->PositionModel->getPositionAll();

        $data['content'] = 'employee/index';
        $data['title'] = 'พนักงาน';
        $data['js_critical'] = '<script src="' . base_url('/js/employee/index.js?v=' . time()) . '"></script>';
        echo view('/app', $data);
    }

    // addEmployee data 
    public function addEmployee()
    {
        $this->EmployeeModel = new \App\Models\EmployeeModel();
        try {
            // SET CONFIG
            $status = 500;
            $response['success'] = 0;
            $response['message'] = '';

            // HANDLE REQUEST
            $password = $this->request->getVar('password');
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);
            $thumbnail = '';

            if (isset($_FILES['thumbnail']) && $_FILES['thumbnail']['name'] != '') {
                $thumbnail = $this->ddoo_upload_img($this->request->getFile('thumbnail'));
            } else {
                $thumbnail = $this->request->getVar('avatar_Thumbnail');
            }

            $create = $this->EmployeeModel->insertEmployee([
                'name' => $this->request->getVar('name'),
                'nickname' => $this->request->getVar('nickname'),
                'phone_number' => $this->request->getVar('phone_number'),
                'employee_email' => $this->request->getVar('employee_email'),
                'branch_id' => $this->request->getVar('branch_id'),
                'position_id' => $this->request->getVar('position_id'),
                'username' => $this->request->getVar('username'),
                'password' => $hashed_password,
                'thumbnail' => $thumbnail,
                'created_by' => session()->get('username'),
            ]);
            // return redirect()->to('/employee/list');
            if ($create) {

                logger_store([
                    'employee_id' => session()->get('employeeID'),
                    'username' => session()->get('username'),
                    'event' => 'เพิ่ม',
                    'detail' => '[เพิ่ม] พนักงาน',
                    'ip' => $this->request->getIPAddress()
                ]);

                $status = 200;
                $response['success'] = 1;
                $response['message'] = 'เพิ่ม พนักงาน สำเร็จ';
            } else {
                $status = 200;
                $response['success'] = 0;
                $response['message'] = 'เพิ่ม พนักงาน ไม่สำเร็จ';
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
    //edit Employee
    public function editEmployee($id = null)
    {
        // $this->BranchModel = new \App\Models\BranchModel();
        // $data = $this->BranchModel->getBranchByID($id);

        // if ($data) {
        //     echo json_encode(array("status" => true, 'data' => $data));
        // } else {
        //     echo json_encode(array("status" => false));
        // }
    }

    //updateEmployee
    public function updateEmployee()
    {
        // $this->BranchModel = new \App\Models\BranchModel();

        // try {
        //     // SET CONFIG
        //     $status = 500;
        //     $response['success'] = 0;
        //     $response['message'] = '';
        //     $id = $this->request->getVar('BranchId');

        //     // HANDLE REQUEST
        //     $update = $this->BranchModel->updateBranchByID($id, [
        //         'branch_name' => $this->request->getVar('branch_name'),
        //         'updated_by' => session()->get('username'),
        //         'updated_at' => date('Y-m-d H:i:s')
        //     ]);

        //     if ($update) {

        //         logger_store([
        //             'employee_id' => session()->get('employeeID'),
        //             'username' => session()->get('username'),
        //             'event' => 'อัพเดท',
        //             'detail' => '[อัพเดท] พนักงาน',
        //             'ip' => $this->request->getIPAddress()
        //         ]);

        //         $status = 200;
        //         $response['success'] = 1;
        //         $response['message'] = 'แก้ไข พนักงาน สำเร็จ';
        //     } else {
        //         $status = 200;
        //         $response['success'] = 0;
        //         $response['message'] = 'แก้ไข พนักงาน ไม่สำเร็จ';
        //     }

        //     return $this->response
        //         ->setStatusCode($status)
        //         ->setContentType('application/json')
        //         ->setJSON($response);
        // } catch (\Exception $e) {
        //     echo $e->getMessage() . ' ' . $e->getLine();
        // }
    }

    // delete Employee
    public function deleteEmployee($id = null)
    {
        // $this->BranchModel = new \App\Models\BranchModel();
        // $this->BranchModel->updateBranchByID($id, [
        //     'deleted_by' => session()->get('username'),
        //     'deleted_at' => date('Y-m-d H:i:s')
        // ]);

        // logger_store([
        //     'employee_id' => session()->get('employeeID'),
        //     'username' => session()->get('username'),
        //     'event' => 'ลบ',
        //     'detail' => '[ลบ] พนักงาน',
        //     'ip' => $this->request->getIPAddress()
        // ]);
    }

    // โหลด img
    private function ddoo_upload_img($file)
    {
        $allowMimeTypes = ['image/jpeg', 'image/png', 'image/gif', 'image/webp'];
        $mimeType = $file->getClientMimeType();

        if (!in_array($mimeType, $allowMimeTypes)) throw new \Exception();

        $newName = $file->getRandomName();
        $file->move(ROOTPATH . 'public/uploads/img/', $newName);

        return $file->getName();
    }
}
