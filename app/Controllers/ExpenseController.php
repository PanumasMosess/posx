<?php

namespace App\Controllers;

date_default_timezone_set('Asia/Jakarta');

use App\Controllers\BaseController;

class ExpenseController extends BaseController
{

    public function __construct()
    {
    }

    public function index()
    {
        $this->ExpenseGroupModel = new \App\Models\ExpenseGroupModel();
        $data['ExpenseGroups'] = $this->ExpenseGroupModel->getExpenseGroupAll();

        $this->ExpenseSubGroupModel = new \App\Models\ExpenseSubGroupModel();
        $data['ExpenseSubGroups'] = $this->ExpenseSubGroupModel->getExpenseSubGroupAll();

        $data['content'] = 'expense/index';
        $data['title'] = 'รายจ่าย';
        $data['js_critical'] = '
        <script src="' . base_url('/js/expense/index.js?v=' . time()) . '"></script>
        ';

        echo view('/app', $data);
    }

    // addExpense
    public function addExpense()
    {
        $this->ExpenseGroupModel = new \App\Models\ExpenseGroupModel();
        try {
            // SET CONFIG
            $status = 500;
            $response['success'] = 0;
            $response['message'] = '';

            // HANDLE REQUEST
            $create = $this->ExpenseGroupModel->insertExpenseGroup([
                'expense_name' => $this->request->getVar('expense_name'),
                'created_by' => session()->get('username'),
                'companies_id' => session()->get('companies_id')
            ]);

            if ($create) {
                $data['ExpenseGroup'] = $this->ExpenseGroupModel->getExpenseGroup();

                logger_store([
                    'employee_id' => session()->get('employeeID'),
                    'username' => session()->get('username'),
                    'event' => 'เพิ่ม',
                    'detail' => '[เพิ่ม] Expense Group',
                    'ip' => $this->request->getIPAddress()
                ]);

                $status = 200;
                $response['success'] = 1;
                $response['message'] = 'เพิ่ม Expense Group สำเร็จ';
                $response['ExpenseGroupID'] = $data['ExpenseGroup'];
            } else {
                $status = 200;
                $response['success'] = 0;
                $response['message'] = 'เพิ่ม Expense Group ไม่สำเร็จ';
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

    // addSubExpense
    public function addSubExpense()
    {
        $this->ExpenseSubGroupModel = new \App\Models\ExpenseSubGroupModel();
        try {
            // SET CONFIG
            $status = 500;
            $response['success'] = 0;
            $response['message'] = '';

            // HANDLE REQUEST
            $create = $this->ExpenseSubGroupModel->insertExpenseSubGroup([
                'expense_group_id' => $this->request->getVar('ExpenseId'),
                'sub_expense_name' => $this->request->getVar('expense_sub_name'),
                'created_by' => session()->get('username'),
                'companies_id' => session()->get('companies_id')
            ]);

            if ($create) {
                $data['ExpenseSubGroup'] = $this->ExpenseSubGroupModel->getExpenseSubGroup();

                logger_store([
                    'employee_id' => session()->get('employeeID'),
                    'username' => session()->get('username'),
                    'event' => 'เพิ่ม',
                    'detail' => '[เพิ่ม] Expense Sub Group',
                    'ip' => $this->request->getIPAddress()
                ]);

                $status = 200;
                $response['success'] = 1;
                $response['message'] = 'เพิ่ม Expense Sub Group สำเร็จ';
                $response['ExpenseSubGroupID'] = $data['ExpenseSubGroup'];
            } else {
                $status = 200;
                $response['success'] = 0;
                $response['message'] = 'เพิ่ม Expense Sub Group ไม่สำเร็จ';
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

    //edit Expense
    public function editExpense($id = null)
    {
        $this->ExpenseGroupModel = new \App\Models\ExpenseGroupModel();
        $data = $this->ExpenseGroupModel->getExpenseGroupByID($id);

        if ($data) {
            echo json_encode(array("status" => true, 'data' => $data));
        } else {
            echo json_encode(array("status" => false));
        }
    }

    //editSubExpense
    public function editSubExpense($id = null)
    {
        $this->ExpenseSubGroupModel = new \App\Models\ExpenseSubGroupModel();
        $data = $this->ExpenseSubGroupModel->getExpenseSubGroupByID($id);

        if ($data) {
            echo json_encode(array("status" => true, 'data' => $data));
        } else {
            echo json_encode(array("status" => false));
        }
    }

    //updateExpense
    public function updateExpense()
    {
        $this->ExpenseGroupModel = new \App\Models\ExpenseGroupModel();

        try {
            // SET CONFIG
            $status = 500;
            $response['success'] = 0;
            $response['message'] = '';
            $id = $this->request->getVar('ExpenseId');

            // HANDLE REQUEST
            $update = $this->ExpenseGroupModel->updateExpenseGroupByID($id, [
                'expense_name' => $this->request->getVar('expense_name'),
                'updated_by' => session()->get('username'),
                'updated_at' => date('Y-m-d H:i:s')
            ]);

            if ($update) {

                logger_store([
                    'employee_id' => session()->get('employeeID'),
                    'username' => session()->get('username'),
                    'event' => 'อัพเดท',
                    'detail' => '[อัพเดท] Expense Group',
                    'ip' => $this->request->getIPAddress()
                ]);

                $status = 200;
                $response['success'] = 1;
                $response['message'] = 'แก้ไข Expense Group สำเร็จ';
            } else {
                $status = 200;
                $response['success'] = 0;
                $response['message'] = 'แก้ไข Expense Group ไม่สำเร็จ';
            }

            return $this->response
                ->setStatusCode($status)
                ->setContentType('application/json')
                ->setJSON($response);
        } catch (\Exception $e) {
            echo $e->getMessage() . ' ' . $e->getLine();
        }
    }

    //updateSubExpense
    public function updateSubExpense()
    {
        $this->ExpenseSubGroupModel = new \App\Models\ExpenseSubGroupModel();

        try {
            // SET CONFIG
            $status = 500;
            $response['success'] = 0;
            $response['message'] = '';
            $id = $this->request->getVar('ExpenseId');

            // HANDLE REQUEST
            $update = $this->ExpenseSubGroupModel->updateExpenseSubGroupByID($id, [
                'sub_expense_name' => $this->request->getVar('expense_sub_name'),
                'updated_by' => session()->get('username'),
                'updated_at' => date('Y-m-d H:i:s')
            ]);

            if ($update) {

                logger_store([
                    'employee_id' => session()->get('employeeID'),
                    'username' => session()->get('username'),
                    'event' => 'อัพเดท',
                    'detail' => '[อัพเดท] Expense Sub Group',
                    'ip' => $this->request->getIPAddress()
                ]);

                $status = 200;
                $response['success'] = 1;
                $response['message'] = 'แก้ไข Expense Sub Group สำเร็จ';
            } else {
                $status = 200;
                $response['success'] = 0;
                $response['message'] = 'แก้ไข Expense Sub Group ไม่สำเร็จ';
            }

            return $this->response
                ->setStatusCode($status)
                ->setContentType('application/json')
                ->setJSON($response);
        } catch (\Exception $e) {
            echo $e->getMessage() . ' ' . $e->getLine();
        }
    }

    // deleteExpense
    public function deleteExpense($id = null)
    {
        $this->ExpenseGroupModel = new \App\Models\ExpenseGroupModel();
        $this->ExpenseGroupModel->deleteExpenseGroupByID($id);

        logger_store([
            'employee_id' => session()->get('employeeID'),
            'username' => session()->get('username'),
            'event' => 'ลบ',
            'detail' => '[ลบ] Expense Group',
            'ip' => $this->request->getIPAddress()
        ]);
    }

    // deleteSubExpense
    public function deleteSubExpense($id = null)
    {
        $this->ExpenseSubGroupModel = new \App\Models\ExpenseSubGroupModel();
        $data['ExpenseSubGroup'] = $this->ExpenseSubGroupModel->getExpenseSubGroupByID($id);
        $this->ExpenseSubGroupModel->deleteExpenseSubGroupByID($id);

        logger_store([
            'employee_id' => session()->get('employeeID'),
            'username' => session()->get('username'),
            'event' => 'ลบ',
            'detail' => '[ลบ] Expense Group',
            'ip' => $this->request->getIPAddress()
        ]);

        

        $status = 200;
        $response['success'] = 1;
        $response['message'] = 'ลบ Expense Sub Group สำเร็จ';
        $response['ExpenseSubGroupID'] = $data['ExpenseSubGroup'];

        return $this->response
        ->setStatusCode($status)
        ->setContentType('application/json')
        ->setJSON($response);
    }
}
