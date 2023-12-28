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
        $data['css_critical'] = '
        
        <link rel="stylesheet" href="' . base_url('vendors/datepicker/date-picker.css').'" />
        <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/flatpickr@4.6.6/dist/flatpickr.min.css"/>
        ';
        $data['js_critical'] = '
        <script src="' . base_url('/js/expense/index.js?v=' . time()) . '"></script>
        <script src="' . base_url('vendors/datepicker/datepicker.js').'"></script>
        <script src="' . base_url('vendors/datepicker/datepicker.en.js').'"></script>
        <script src="' . base_url('vendors/datepicker/datepicker.custom.js').'"></script>
        <script src="https://cdn.jsdelivr.net/npm/flatpickr@4.6.6/dist/flatpickr.min.js"></script>
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

    // addExpenseDate
    public function addExpenseDate()
    {
        $this->ExpenseModel = new \App\Models\ExpenseModel();
        $param['date'] = $_REQUEST['date'];
        $param['rowsWithAmountss'] = $_REQUEST['rowsWithAmountss'];
        try {
            // SET CONFIG
            $status = 500;
            $response['success'] = 0;
            $response['message'] = '';

            // HANDLE REQUEST

            foreach ($param['rowsWithAmountss'] as $row) {
                $create = $this->ExpenseModel->insertExpense([
                    'expense_date' => $param['date'],
                    'expense_group_id' => $row['group'],
                    'sub_expense_group_id' => $row['title'],
                    'amount' => $row['amount'],
                    'comment' => $row['comment'],
                    'created_by' => session()->get('username'),
                    'companies_id' => session()->get('companies_id')
                ]);
            }

            if ($create) {
                logger_store([
                    'employee_id' => session()->get('employeeID'),
                    'username' => session()->get('username'),
                    'event' => 'เพิ่ม',
                    'detail' => '[เพิ่ม] Expense',
                    'ip' => $this->request->getIPAddress()
                ]);

                $status = 200;
                $response['success'] = 1;
                $response['message'] = 'เพิ่ม Expense สำเร็จ';
            } else {
                $status = 200;
                $response['success'] = 0;
                $response['message'] = 'เพิ่ม Expense ไม่สำเร็จ';
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

    //getSubGroup
    public function getSubGroup($id = null)
    {
        $this->ExpenseSubGroupModel = new \App\Models\ExpenseSubGroupModel();
        $data['ExpenseSubGroupByGroupID'] = $this->ExpenseSubGroupModel->getExpenseSubGroupByGroupID($id);

        $status = 200;
        $response['success'] = 1;
        $response['data'] = $data['ExpenseSubGroupByGroupID'];

        return $this->response
            ->setStatusCode($status)
            ->setContentType('application/json')
            ->setJSON($response);
    }

    //getSubGroup
    public function getGroup()
    {
        $this->ExpenseGroupModel = new \App\Models\ExpenseGroupModel();
        $data['Groups'] = $this->ExpenseGroupModel->getExpenseGroupAll();

        $status = 200;
        $response['success'] = 1;
        $response['data'] = $data['Groups'];

        return $this->response
            ->setStatusCode($status)
            ->setContentType('application/json')
            ->setJSON($response);
    }

    //ajaxDataTablesExpense
    public function ajaxDataTablesExpense()
    {
        $ExpenseModel = new \App\Models\ExpenseModel();

        // $param['search_value'] = $_REQUEST['search']['value'];
        $param['draw'] = $_REQUEST['draw'];
        $param['start'] = $_REQUEST['start'];
        $param['length'] = $_REQUEST['length'];
        $param['date'] = $_REQUEST['date'];

        // if (!empty($param['search_value'])) {
        //     // count all data
        //     $total_count = $ExpenseModel->getTableExpenseSearchcount($param);
        //     $data = $ExpenseModel->getTableExpenseSearch($param);
        // } else {
        // count all data
        $total_count = $ExpenseModel->getTableExpensecount($param);
        // get per page data
        $data = $ExpenseModel->getTableExpense($param);
        // }

        $json_data = array(
            "draw" => intval($param['draw']),
            "recordsTotal" => count($total_count),
            "recordsFiltered" => count($total_count),
            "data" => $data   // total data array
        );

        echo json_encode($json_data);
    }

    public function ajaxTotalExpenses()
    {
        try {
            $param['date'] = $_REQUEST['date'];
            // SET CONFIG
            $status = 500;
            $response['success'] = 0;
            $response['message'] = '';

            $ExpenseModel = new \App\Models\ExpenseModel();
            $Expenses = $ExpenseModel->getTotalExpense($param);
            $Total = 0;
            foreach ($Expenses as $expense) {
                $Total = $Total + $expense->amount;
            }

            $html =
                '<h4>Total expenses : <span style="font-weight: bold">' . number_format($Total, 2) . '</span></h4>';

            $response['data'] = $html;

            $status = 200;
            $response['success'] = 1;
            $response['message'] = '';

            return $this->response
                ->setStatusCode($status)
                ->setContentType('application/json')
                ->setJSON($response);
        } catch (\Exception $e) {
            echo $e->getMessage() . ' ' . $e->getLine();
        }
    }

    // deleteExpenseList
    public function deleteExpenseList($id = null)
    {
        $this->ExpenseModel = new \App\Models\ExpenseModel();
        $this->ExpenseModel->deleteExpenseByID($id);

        logger_store([
            'employee_id' => session()->get('employeeID'),
            'username' => session()->get('username'),
            'event' => 'ลบ',
            'detail' => '[ลบ] Expense',
            'ip' => $this->request->getIPAddress()
        ]);
    }

    public function ajaxExpenses()
    {
        try {
            // SET CONFIG
            $status = 500;
            $response['success'] = 0;
            $response['message'] = '';
            $param['date'] = $_REQUEST['date'];

            $ExpenseGroupModel = new \App\Models\ExpenseGroupModel();
            $ExpenseGroups = $ExpenseGroupModel->getExpenseGroupAll();

            $ExpenseModel = new \App\Models\ExpenseModel();
            $Expenses = $ExpenseModel->getTableExpenseList($param);

            

            $html = '';
            $html .= '<table class="table table-striped table-bordered group mt-3" id="tablegroups" style="margin-bottom: 20px; cursor: pointer;">';
            foreach ($ExpenseGroups as $ExpenseGroup) {
                $g = 0;
                foreach ($Expenses as $ExpenseList) {
                    if($ExpenseGroup->id == $ExpenseList->expense_group_id){
                        $g++;
                    }
                }
                if($g != 0){
                    $n = '';
                }else{
                    $n = '<span style="color: lightgray; margin-left: 20px; font-style: italic">(ไม่มีรายการจ่าย)</span>';
                }
                $html .=
                    '<thead style="color: black">
                        <tr>
                            <th style="width: 100%" colspan="6">
                                <span style="padding-left: 10px" data-bind=""> </span>
                                <span>' . $ExpenseGroup->expense_name . '</span>
                                <span style="font-style: italic; padding-left: 10px">(' . $g . ')</span>
                                ' . $n . '
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                    '
                ;
                $i = 0;
                foreach ($Expenses as $Expense) {
                    if($ExpenseGroup->id == $Expense->expense_group_id){
                        $i++;
                        $html .= '
                        <tr>
                            <td style="width: 5%;text-align: center;padding-top: 17px;">' . $i . '</td>
                            <td style="width: 10%;padding-top: 17px;">' . $Expense->expense_name . '</td>
                            <td style="width: 20%;padding-top: 17px;">' . $Expense->sub_expense_name . '</td>
                            <td style="width: 15%;padding-top: 17px;text-align: right;">' . number_format($Expense->amount, 2) . '</td>
                            <td style="width: 30%;text-align: center;padding-top: 17px;">' . $Expense->comment . '</td>
                            <td style="width: 10%;">
                                <div class="action_btns d-flex" style="justify-content: center;"><a href="#" class="action_btn btnDeleteExpenseList" data-id="' . $Expense->id . '"> <i class="fas fa-trash"></i> </a></div>
                            </td>
                        </tr>
                        ';
                    }
                }
                $html .= '</tbody>';
            }
            $html .= '</table>';

            $response['data'] = $html;

            $status = 200;
            $response['success'] = 1;
            $response['message'] = '';

            return $this->response
                ->setStatusCode($status)
                ->setContentType('application/json')
                ->setJSON($response);
        } catch (\Exception $e) {
            echo $e->getMessage() . ' ' . $e->getLine();
        }
    }
}
