<?php

namespace App\Controllers;

date_default_timezone_set('Asia/Jakarta');

use App\Controllers\BaseController;

class PaymentController extends BaseController
{

    public function __construct() {}

    public function index()
    {
        $this->EmployeeModel = new \App\Models\EmployeeModel();
        $data['companies'] = $this->EmployeeModel->getCompanies();

        $data['content'] = 'payment/index';
        $data['title'] = 'เพิ่มวัน';
        $data['css_critical'] = '
        
        <link rel="stylesheet" href="' . base_url('vendors/datepicker/date-picker.css') . '" />
        <link rel="stylesheet" type="text/css"  href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css"/>
        ';
        $data['js_critical'] = '
        <script src="' . base_url('/js/payment/index.js?v=' . time()) . '"></script>
        <script src="' . base_url('vendors/datepicker/datepicker.js') . '"></script>
        <script src="' . base_url('vendors/datepicker/datepicker.en.js') . '"></script>
        <script src="' . base_url('vendors/datepicker/datepicker.custom.js') . '"></script>
        <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
        ';
        echo view('/app', $data);
    }

    // addPayment
    public function addPayment()
    {
        $this->PaymentPackageModel = new \App\Models\PaymentPackageModel();

        $param['payment_type'] = $_REQUEST['payment_type'];
        $param['months'] = $_REQUEST['months'];
        $param['amount'] = $_REQUEST['amount'];
        $param['payment_date'] = $_REQUEST['payment_date'];
        $param['payment_time'] = $_REQUEST['payment_time'];
        $param['bank'] = $_REQUEST['bank'];
        $param['transfer_money'] = $_REQUEST['transfer_money'];
        $param['remark'] = $_REQUEST['remark'];

        $amount = str_replace(',', '', $param['amount']);

        try {
            // SET CONFIG
            $status = 500;
            $response['success'] = 0;
            $response['message'] = '';
            // HANDLE REQUEST

            $create = $this->PaymentPackageModel->insertPaymentPackage([
                'package_id' => getCompanies()['companies']->packet_id,
                'payment_type' => $param['payment_type'],
                'payment_month' => $param['months'],
                'payment_amount' => $amount,
                'payment_date' => $param['payment_date'],
                'payment_time' => $param['payment_time'],
                'bank' => $param['bank'],
                'transfer_money' => $param['transfer_money'],
                'payment_status' => 'WaitApprove',
                'comment' => $param['remark'],
                'created_by' => session()->get('username'),
                'companies_id' => session()->get('companies_id'),
            ]);

            if ($create) {
                logger_store([
                    'employee_id' => session()->get('employeeID'),
                    'username' => session()->get('username'),
                    'event' => 'เพิ่ม',
                    'detail' => '[เพิ่ม] Payment',
                    'ip' => $this->request->getIPAddress()
                ]);
                $status = 200;
                $response['success'] = 1;
                $response['message'] = 'เพิ่ม Payment สำเร็จ';
            } else {
                $status = 200;
                $response['success'] = 0;
                $response['message'] = 'เพิ่ม Payment ไม่สำเร็จ';
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
