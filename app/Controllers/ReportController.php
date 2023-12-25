<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use GuzzleHttp\Client;

class ReportController extends BaseController
{

    public function __construct()
    {
        /*
        | -------------------------------------------------------------------------
        | SET ENVIRONMENT
        | -------------------------------------------------------------------------
        */

        //

        /*
        | -------------------------------------------------------------------------
        | SET UTILITIES
        | -------------------------------------------------------------------------
        */

        // Model
        $this->ReportModel = new \App\Models\ReportModel();
    }

    public function index()
    {
        $data['content'] = 'report/index';
        $data['title'] = ' รายงาน';
        $data['css_critical'] = '';
        $data['js_critical'] = '
            <script src="' . base_url('/js/report/index.js') . '"></script>
        ';

        echo view('/app', $data);
    }

    public function Sales()
    {
        $data['content'] = 'report/Sales';
        $data['title'] = ' ยอดขาย';
        $data['css_critical'] = '
            <link rel="stylesheet" type="text/css" href="https://app.niceloop.com/Content/page/fullcalendar.css" />
            <link rel="stylesheet" type="text/css" href="https://app.niceloop.com/Content/page/fullcalendar_custom.css" />
        ';
        $data['js_critical'] = '
            <script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
            <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
            <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
            <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />

            <script src="https://cdnjs.cloudflare.com/ajax/libs/accounting.js/0.3.2/accounting.min.js" integrity="sha512-YNMslbJPIU0RfktNM8oFTZj1O/tGZqCFnwm5fAVj3tny61/BE7929jwg/nzQG6NZoMxZMcsd+DmW890nQ8x68w==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
            <script type="text/javascript" src=
        "https://cdnjs.cloudflare.com/ajax/libs/underscore.js/1.9.1/underscore.js">
        </script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/highcharts/4.2.3/highcharts.js"></script>

            <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.0.0/fullcalendar.min.js" integrity="sha512-H3yYEJIf4t7HMbZ1xF9udh2CorEbHYEPAAc5nCMYwIBpNue4K+DmQFXXNtFfQf4uPzoVJBthlsSaodBhY0HAmQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
            <script src="' . base_url('/js/report/index.js') . '"></script>
            <script src="' . base_url('/js/report/Sales.js') . '"></script>
        ';

        echo view('/app', $data);
    }

    public function incomeSummary() 
    {
        $status = 500;
        $response['success'] = 0;
        $response['message'] = '';

        try {

            // HANDLE REQUEST
            $requestPayload = $this->request->getJSON();
            $businessMode = $requestPayload->businessMode;
            $customerId = $requestPayload->customerId;
            $customerMode = $requestPayload->customerMode;
            $from = $requestPayload->from;
            $pattern = $requestPayload->pattern;
            $shopname = $requestPayload->shopname;
            $to = $requestPayload->to;

            $companyID = 1;

            $getIncomeSummary = $this->ReportModel->getIncomeSummaryByDate($from, $to, $companyID);

            $bundle = [];
            $all = [
                'Date' => 'all',
                'Bills' => 0,
                'Discount' => 0,
                'GrandTotal' => 0,
                'PaymentList' => [],
                'SubTotal' => 0,
                'Expense' => 0
            ];
            foreach($getIncomeSummary as $data) {

                $date = $data->Date;

                $data->CustomerCount = 0;
                $data->Expense = 0;

                $bundle[$date] = (array) $data;
                $bundle[$date]['PaymentList'] = [];

                $payments = $this->ReportModel->getIncomeSummaryPaymentByDate($date, $companyID);

                if ($payments) {

                    foreach($payments as $payment) {

                        $paymentName = $payment->name;

                        $bundle[$date]['PaymentList'][$paymentName] = $payment;

                        if (!array_key_exists($paymentName, $all['PaymentList'])) {

                            $arr = [
                                'name' => $payment->name,
                                'bills' => $payment->bills,
                                'amount' => $payment->amount,
                                'amount_free' => $payment->amount_free,
                            ];

                            $all['PaymentList'][$paymentName] = $arr;
                        }
                        else {
                            $all['PaymentList'][$paymentName]['bills'] += $payment->bills;
                            $all['PaymentList'][$paymentName]['amount'] += $payment->amount;
                            $all['PaymentList'][$paymentName]['amount_free'] += $payment->amount_free;
                        }
                    }
                }
                
                $all['Bills'] += $data->Bills;
                $all['Discount'] += $data->Discount;
                $all['GrandTotal'] += $data->GrandTotal;
                $all['SubTotal'] += $data->SubTotal;
            }

            $bundle['all'] = $all;
            $status = 200;
            $response['success'] = 1;
            $response['data'] = $bundle;

        } catch (\Exception $e) {
            
        }

        return $this->response
            ->setStatusCode($status)
            ->setContentType('application/json')
            ->setJSON($response);
    }

    public function BillSales()
    {
        $data['content'] = 'report/BillSales';
        $data['title'] = ' บิลขาย';
        $data['css_critical'] = '
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.css">
        ';
        $data['js_critical'] = '
            <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.js"></script>
            <script src="' . base_url('/js/report/index.js') . '"></script>
            <script src="' . base_url('/js/report/BillSales.js') . '"></script>
        ';

        echo view('/app', $data);
    }

    public function SalesByOrder() 
    {
        $status = 500;
        $response['success'] = 0;
        $response['message'] = '';

        try {

            // HANDLE REQUEST
            $requestPayload = $this->request->getJSON();
            $from = $requestPayload->from;
            $to = $requestPayload->to;

            $date = $from;

            $companyID = 1;
            $getSalesByOrder = $this->ReportModel->getSalesByOrderByDate($date, $companyID);

            $bundle = [
                'CardCharge' => 0,
                'Change' => 0,
                'CustomerCount' => 0,
                'DeletedGrandTotal' => 0,
                'DeletedOrders' => 0,
                'Discount' => 0,
                'GrandTotal' => 0,
                'ItemDiscount' => 0,
                'Orders' => $getSalesByOrder,
                'PaymentMethod' => 0,
                'Received' => 0,
                'ReportDate' => 0,
                'Rounding' => 0,
                'ServiceCharge' => 0,
                'ServiceChargeIncluded' => 0,
                'SubTotal' => 0,
                'SummaryPaymentType' => [],
                'Vat' => 0
            ];

            foreach($getSalesByOrder as $data) {

                $data->type = '';
                $data->shift = '';
                $data->grandTotal = $data->order_price_sum - $data->order_discount;
                $data->remark = '';

                $bundle['CardCharge'] += $data->order_card_charge;
                $bundle['Change'] += 0; // $data->order_card_charge;
                $bundle['CustomerCount'] += 0; // $data->CustomerCount;
                $bundle['DeletedGrandTotal'] += 0; // $data->DeletedGrandTotal;
                $bundle['DeletedOrders'] += 0; // $data->DeletedOrders;
                $bundle['Discount'] += $data->order_discount;
                $bundle['GrandTotal'] += $data->order_price_sum - $data->order_discount;
                // $bundle['ItemDiscount'] += $data->ItemDiscount;
                // $bundle['PaymentMethod'] += $data->PaymentMethod;
                // $bundle['Received'] += $data->Received;
                // $bundle['ReportDate'] += $data->ReportDate;
                // $bundle['Rounding'] += $data->Rounding;
                $bundle['ServiceCharge'] += $data->order_service;
                $bundle['ServiceChargeIncluded'] += 0; // $data->ServiceChargeIncluded;
                $bundle['SubTotal'] += 0; //$data->SubTotal;
                $bundle['Vat'] += $data->order_vat;
            }

            $payments = $this->ReportModel->getIncomeSummaryPaymentByDate($date, $companyID);
            foreach($payments as $payment) {
                $paymentName = $payment->name;
                $bundle['SummaryPaymentType'][$paymentName] = $payment;
                $bundle['SummaryPaymentType'][$paymentName] = [
                    'name' => $payment->name,
                    'bills' => $payment->bills,
                    'amount' => $payment->amount,
                    'amount_free' => $payment->amount_free,
                ];
            }

            $status = 200;
            $response['success'] = 1;
            $response['data'] = $bundle;

        } catch (\Exception $e) {
            px($e->getMessage());
        }

        return $this->response
            ->setStatusCode($status)
            ->setContentType('application/json')
            ->setJSON($response);
    }

    public function Product()
    {
        $data['content'] = 'report/Product';
        $data['title'] = ' สินค้า';
        $data['css_critical'] = '';
        $data['js_critical'] = '
            <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
        ';
        $data['js_critical'] = '
        <script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
        <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
        <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
        <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
            <script src="' . base_url('/js/report/index.js') . '"></script>
            <script src="' . base_url('/js/report/Product.js') . '"></script>
        ';

        echo view('/app', $data);
    }

    public function SumOrderItems() 
    {
        $status = 500;
        $response['success'] = 0;
        $response['message'] = '';

        try {

            // HANDLE REQUEST
            $requestPayload = $this->request->getJSON();
            $businessMode = $requestPayload->businessMode;
            $customerId = $requestPayload->customerId;
            $customerMode = $requestPayload->customerMode;
            $from = $requestPayload->from;
            $pattern = $requestPayload->pattern;
            $shopname = $requestPayload->shopname;
            $to = $requestPayload->to;

            $companyID = 1;

            // $getSumOrderItems = $this->ReportModel->getSumOrderItemsByDate($from, $to, $companyID);

            // px($getSumOrderItems);

            $bundle = [];
            $all = [
                'Amount' => 0,
                'Catalogs' => [],
                'DeletedMenu' => [],
                'From' => $from,
                'ItemLines' => [],
                'Quantity' => 0,
                'SummaryType' => [
                    'DeletedMenu' => 0,
                    'Drink' => 0,
                    'Food' => 0,
                    'Other' => 1200
                ],
                'To' => $to,
                'ToppingGroups' => []
            ];

            $status = 200;
            $response['success'] = 1;
            $response['data'] = $all;

        } catch (\Exception $e) {
            
        }

        return $this->response
            ->setStatusCode($status)
            ->setContentType('application/json')
            ->setJSON($response);
    }

    public function OrderTotal()
    {
        $data['content'] = 'report/OrderTotal';
        $data['title'] = ' ยอดสั่ง';
        $data['css_critical'] = '';
        $data['js_critical'] = '
            <script src="' . base_url('/js/report/index.js') . '"></script>
            <script src="' . base_url('/js/report/OrderTotal.js') . '"></script>
        ';

        echo view('/app', $data);
    }

    public function Expenses()
    {
        $data['content'] = 'report/Expenses';
        $data['title'] = ' รายจ่าย';
        $data['css_critical'] = '';
        $data['js_critical'] = '
            <script src="' . base_url('/js/report/index.js') . '"></script>
            <script src="' . base_url('/js/report/Expenses.js') . '"></script>
        ';

        echo view('/app', $data);
    }

    public function Stock()
    {
        $data['content'] = 'report/Stock';
        $data['title'] = ' สต็อก';
        $data['css_critical'] = '';
        $data['js_critical'] = '
            <script src="' . base_url('/js/report/index.js') . '"></script>
            <script src="' . base_url('/js/report/Stock.js') . '"></script>
        ';

        echo view('/app', $data);
    }

    public function Cancel()
    {
        $data['content'] = 'report/Cancel';
        $data['title'] = ' รายงาน';
        $data['css_critical'] = '
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.css">
        ';
        $data['js_critical'] = '
            <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.js"></script>
            <script src="' . base_url('/js/report/index.js') . '"></script>
            <script src="' . base_url('/js/report/Cancel.js') . '"></script>
        ';

        echo view('/app', $data);
    }

    public function CancelItem() 
    {
        $status = 500;
        $response['success'] = 0;
        $response['message'] = '';

        try {

            // HANDLE REQUEST
            $requestPayload = $this->request->getJSON();
            $from = $requestPayload->from;
            $to = $requestPayload->to;

            $date = $from;
            $companyID = 1;

            $getCancelItems = $this->ReportModel->getCancelItemsByDate($date, $companyID);

            $bundle = [
                'date' => $date,
                'totalPrice' => 0,
                'totalPcs' => 0,
                'data' => $getCancelItems,
            ];
            
            foreach ($getCancelItems as $data) {
                $bundle['totalPrice'] += $data->order_customer_pcs * $data->order_customer_price;
                $bundle['totalPcs'] += $data->order_customer_pcs;
            }

            $status = 200;
            $response['success'] = 1;
            $response['data'] = $bundle;

        } catch (\Exception $e) {
            
        }

        return $this->response
            ->setStatusCode($status)
            ->setContentType('application/json')
            ->setJSON($response);
    }

    public function Activity()
    {
        $data['content'] = 'report/Activity';
        $data['title'] = ' Activity';
        $data['css_critical'] = '
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.css">
        ';
        $data['js_critical'] = '
            <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.js"></script>
            <script src="' . base_url('/js/report/index.js') . '"></script>
            <script src="' . base_url('/js/report/Activity.js') . '"></script>
        ';

        echo view('/app', $data);
    }

    public function ActivityLogs() 
    {
        $status = 500;
        $response['success'] = 0;
        $response['message'] = '';

        try {

            // HANDLE REQUEST
            $requestPayload = $this->request->getJSON();
            $from = $requestPayload->from;
            $to = $requestPayload->to;

            $date = $from;
            $companyID = 1;

            $getActivityLogs = $this->ReportModel->ActivityLogByDate($date, $companyID);

            $bundle = [
                'date' => $date,
                'data' => $getActivityLogs,
            ];

            $status = 200;
            $response['success'] = 1;
            $response['data'] = $bundle;

        } catch (\Exception $e) {
            
        }

        return $this->response
            ->setStatusCode($status)
            ->setContentType('application/json')
            ->setJSON($response);
    }

    public function ProductPriceCorrectionReport()
    {
        $data['content'] = 'report/ProductPriceCorrectionReport';
        $data['title'] = ' รายงานแก้ราคาสินค้า';
        $data['css_critical'] = '';
        $data['js_critical'] = '
            <script src="' . base_url('/js/report/index.js') . '"></script>
            <script src="' . base_url('/js/report/ProductPriceCorrectionReport.js') . '"></script>
        ';

        echo view('/app', $data);
    }

    public function OpenMenu()
    {
        $data['content'] = 'report/OpenMenu';
        $data['title'] = ' OpenMenu';
        $data['css_critical'] = '';
        $data['js_critical'] = '
            <script src="' . base_url('/js/report/index.js') . '"></script>
            <script src="' . base_url('/js/report/OpenMenu.js') . '"></script>
        ';

        echo view('/app', $data);
    }
}
