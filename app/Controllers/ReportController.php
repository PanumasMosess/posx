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
        $data['css_critical'] = '';
        $data['js_critical'] = '
            <script src="' . base_url('/js/report/index.js') . '"></script>
            <script src="' . base_url('/js/report/BillSales.js') . '"></script>
        ';

        echo view('/app', $data);
    }

    public function Product()
    {
        $data['content'] = 'report/Product';
        $data['title'] = ' สินค้า';
        $data['css_critical'] = '';
        $data['js_critical'] = '
            <script src="' . base_url('/js/report/index.js') . '"></script>
            <script src="' . base_url('/js/report/Product.js') . '"></script>
        ';

        echo view('/app', $data);
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
        $data['css_critical'] = '';
        $data['js_critical'] = '
            <script src="' . base_url('/js/report/index.js') . '"></script>
            <script src="' . base_url('/js/report/Cancel.js') . '"></script>
        ';

        echo view('/app', $data);
    }

    public function Activity()
    {
        $data['content'] = 'report/Activity';
        $data['title'] = ' Activity';
        $data['css_critical'] = '';
        $data['js_critical'] = '
            <script src="' . base_url('/js/report/index.js') . '"></script>
            <script src="' . base_url('/js/report/Activity.js') . '"></script>
        ';

        echo view('/app', $data);
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
