<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use GuzzleHttp\Client;

class Test extends BaseController
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
        $this->ActivityLogModel = new \App\Models\ActivityLogModel();
        $this->TableModel = new \App\Models\TableModel();
        $this->OrderModel = new \App\Models\OrderModel();
    }

    public function updateStatus()
    {
        try {

            $status = 500;
            $response['success'] = 0;
            $response['messages'] = '';

            // HANDLE REQUEST
            $requestPayload = $this->request->getJSON();
            $order = $requestPayload->order;
            $orderCustomerCode = $order->orderCustomerCode;
            $status = $order->status;
            $description = $order->description;

            // อัพเดทสถานะที่ตาราง order_summary
            $updateOrderSummary = $this->OrderModel->updateOrderSummaryByOrderCustomerCode($orderCustomerCode, [
                'order_status' => $status
            ]);

            // อัพเดทสถานะที่ตาราง order_customer
            $updateOrderCustomer = $this->OrderModel->updateOrderCustomerByOrderCustomerCode($orderCustomerCode, [
                'order_customer_status' => $status
            ]);

            if ($updateOrderSummary && $updateOrderCustomer) {
                $status = 200;
                $response['success'] = 1;
                $response['messages'] = 'สำเร็จ';
            }

            return $this->response
                ->setStatusCode($status)
                ->setContentType('application/json')
                ->setJSON($response);

        } catch (\Exception $e) {

            $status = 500;
            $response['success'] = 0;
            $response['messages'] = '';

            return $this->response
                ->setStatusCode($status)
                ->setContentType('application/json')
                ->setJSON($response);
        }
    }

    public function view($viewType)
    {
        $status = 500;
        $response['success'] = 0;
        $response['message'] = '';

        try {

            // HANDLE REQUEST
            $requestPayload = $this->request->getJSON();
           
            switch($viewType) {

                case 'Bills':
                    $receipt = $this->OrderModel->getOrderByType('NORMAL');
                    $voidReceipt = $this->OrderModel->getOrderByType('CANCEL');
                    break;

                case 'Detail':
                    break;
            }

            $status = 200;
            $response['success'] = 1;

            $response['data']['receipt'] = $receipt;
            $response['data']['voidReceipt'] = $voidReceipt;

        } catch (\Exception $e) {
            
        }

        return $this->response
            ->setStatusCode($status)
            ->setContentType('application/json')
            ->setJSON($response);
    }

    public function getOrderDetail($orderCode)
    {
        $status = 500;
        $response['success'] = 0;
        $response['message'] = '';

        try {

            // HANDLE REQUEST

            $orderSummary = $this->OrderModel->getOrderSummaryByOrderCode($orderCode);
            $orders = $this->OrderModel->getOrderByOrderCode($orderCode);

            $html = '
                <div class="row">
            ';

            $html .= '
                <div class="col-md-5">
                    <div class="white_card card_height_100 mb_30">
                        <div class="white_card_body" style="position: relative;">
                            <div class="monthly_plan_wraper">
                                <div class="single_plan d-flex align-items-center justify-content-between">
                                    <div class="plan_left d-flex align-items-center">
                                        <div class="thumb">
                                            <i class="fas fa-table"></i>
                                        </div>
                                        <div>
                                            <h5>Reference</h5>
                                            <span>' . $orderSummary->order_table_code . '</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="single_plan d-flex align-items-center justify-content-between">
                                    <div class="plan_left d-flex align-items-center">
                                        <div class="thumb">
                                            <i class="fas fa-money-bill-wave-alt"></i>
                                        </div>
                                        <div>
                                            <h5>Payment Type</h5>
                                            <span>_____</span>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <div class="single_plan d-flex align-items-center justify-content-between">
                                    <div class="plan_left d-flex align-items-center">
                                        <div class="thumb">
                                            <i class="fas fa-dollar-sign"></i>
                                        </div>
                                        <div>
                                            <h5>Total</h5>
                                            <span>' . $orderSummary->order_price_sum . '</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="single_plan d-flex align-items-center justify-content-between">
                                    <div class="plan_left d-flex align-items-center">
                                        <div class="thumb">
                                            <i class="fas fa-percentage"></i>
                                        </div>
                                        <div>
                                            <h5>Items Discount</h5>
                                            <span>' . $orderSummary->order_discount . '</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="single_plan d-flex align-items-center justify-content-between">
                                    <div class="plan_left d-flex align-items-center">
                                        <div class="thumb">
                                            <i class="fas fa-concierge-bell"></i>
                                        </div>
                                        <div>
                                            <h5>Service</h5>
                                            <span>' . $orderSummary->order_service . '</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="single_plan d-flex align-items-center justify-content-between">
                                    <div class="plan_left d-flex align-items-center">
                                        <div class="thumb">
                                            <i class="fas fa-percentage"></i>
                                        </div>
                                        <div>
                                            <h5>Additional Discount</h5>
                                            <span>_____</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="single_plan d-flex align-items-center justify-content-between">
                                    <div class="plan_left d-flex align-items-center">
                                        <div class="thumb">
                                        <i class="fas fa-credit-card"></i>
                                        </div>
                                        <div>
                                            <h5>CreditCard Charge</h5>
                                            <span>' . $orderSummary->order_card_charge . '</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="single_plan d-flex align-items-center justify-content-between">
                                    <div class="plan_left d-flex align-items-center">
                                        <div class="thumb">
                                            <i class="fas fa-tag"></i>
                                        </div>
                                        <div>
                                            <h5>VAT</h5>
                                            <span>' . $orderSummary->order_vat . '</span>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <div class="single_plan d-flex align-items-center justify-content-between">
                                    <div class="plan_left d-flex align-items-center">
                                        <div class="thumb">
                                            <i class="fas fa-dollar-sign"></i>
                                        </div>
                                        <div>
                                            <h5>GrandTotal</h5>
                                            <span>' . (($orderSummary->order_price_sum + $orderSummary->order_price_sum + $orderSummary->order_card_charge + $orderSummary->order_vat) - $orderSummary->order_discount) - 0 . '</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="resize-triggers">
                                <div class="expand-trigger">
                                    <div style="width: 384px; height: 377px;"></div>
                                </div>
                                <div class="contract-trigger"></div>
                            </div>
                        </div>
                    </div>
                </div>
            ';

            $html .= '
                <div class="col-md-7">
                    <div class="col-12 QA_section">
                        <div class="card QA_table ">
                            <div class="card-header">
                                Item list
                                <!-- <strong>15/08/2020</strong> -->
                                <!-- <span class="float-end"> <strong>Status:</strong> Pending</span> -->
                            </div>
                            <div class="card-body">
                                <div class="table-responsive-sm">
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th class="center">#</th>
                                                <th>Product</th>
                                                <th class="center">Qty</th>
                                                <th class="right">Price</th>
                                                <th class="right">Total</th>
                                            </tr>
                                        </thead>
                                        <tbody>
            ';

            foreach ($orders as $data) {
                $html .= '
                    <tr>
                        <td class="center">' . $data->id . '</td>
                        <td class="left strong">' . $data->order_customer_ordername . '</td>
                        <td class="center">' . $data->order_customer_pcs . '</td>
                        <td class="right">' . $data->order_customer_price . '</td>
                        <td class="right">' . ($data->order_customer_pcs * $data->order_customer_price) . '</td>
                    </tr>
                ';
            }

            $html .= '
                </tbody>
                        </table>
                    </div>
                    <div class="row">
                        <div class="col-lg-4 col-sm-5">
                        </div>
                        <div class="col-lg-4 col-sm-5 ms-auto QA_section">
                            <table class="table table-clear QA_table">
                                <tbody>
                                    <!-- <tr>
                                        <td class="left">
                                            <strong>Shift: </strong>
                                        </td>
                                        <td class="right">Shift 1</td>
                                    </tr> -->
                                    <!-- <tr>
                                        <td class="left">
                                            <strong>Cashier: </strong>
                                        </td>
                                        <td class="right">เจส</td>
                                    </tr> -->
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            </div>
            </div>
            ';

            $html .= '</div>';

            $status = 200;
            $response['success'] = 1;

            $response['data']['order_code'] = $orderCode;
            $response['data']['html'] = $html;

        } catch (\Exception $e) {
            
        }

        return $this->response
            ->setStatusCode($status)
            ->setContentType('application/json')
            ->setJSON($response);
    }

    public function getDataDashboard()
    {
        $status = 500;
        $response['success'] = 0;
        $response['message'] = '';

        try {

            // HANDLE REQUEST
            $requestPayload = $this->request->getJSON();
            $type = $requestPayload->type;

            $orderStatus = NULL;

            if ($type == 'Voided Receipt') $orderStatus = 'CANCEL';

            $orderCustomersSummaryToday = $this->OrderModel->getOrderCustomersSummaryTodayByOrderStatus($orderStatus);

            $html = '
                <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper no-footer">
                    <table class="table lms_table_active dataTable no-footer dtr-inline" id="DataTables_Table_0" role="grid" aria-describedby="DataTables_Table_0_info" style="width: 836px;">
                        <thead>
                            <tr role="row">
                                <!-- <th scope="col" class="sorting_desc" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 22.2px;" aria-label=": activate to sort column ascending" aria-sort="descending">
                                    <label class="form-label primary_checkbox d-flex me-12 ">
                                        <input type="checkbox">
                                        <span class="checkmark"></span>&nbsp; #ID
                                    </label>
                                </th> -->
                                <th scope="col" class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="" aria-label="name: activate to sort column ascending">Date</th>
                                <th scope="col" class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="" aria-label="status: activate to sort column ascending">GrandTotal</th>
                                <th scope="col" class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="" aria-label="details: activate to sort column ascending">Type</th>
                                <th scope="col" class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="" aria-label="Date: activate to sort column ascending">From</th>
                                <th scope="col" class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="" aria-label="Date: activate to sort column ascending">Shift</th>
                                <th scope="col" class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="" aria-label="Date: activate to sort column ascending">By</th>
                                <th scope="col" class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="" aria-label="Date: activate to sort column ascending"></th>
                            </tr>
                        </thead>
                        <tbody>
            ';

            if ($orderCustomersSummaryToday) {
                foreach($orderCustomersSummaryToday as $data) {
                    $html .= '
                        <tr role="row" data-order-code="' . $data->order_customer_code  . '">
                            <!-- <th scope="row" tabindex="0" class="sorting_1">
                                <label class="form-label primary_checkbox d-flex me-12 ">
                                    <input type="checkbox">
                                    <span class="checkmark"></span>
                                </label>
                            </th> -->
                            <td>' . $data->created_at . '</td>
                            <td>' . $data->order_price_sum . '</td>
                            <td>' . $data->order_service_type . '</td>
                            <td>' . $data->order_table_code . '</td>
                            <td></td>
                            <td>' . $data->created_by . '</td>
                            <td>
                                <button class="btn btn-info btn-sm btnLookupOrderDetail" data-bs-toggle="modal" data-bs-target="#orderDetailModal" data-order-code="' . $data->order_customer_code  . '"> <i class="far fa-edit"></i> View</button>
                                <button class="btn btn-danger btn-sm btnLookupOrderVoide" data-status="ยกเลิก" data-order-customer-code="' . $data->order_customer_code  . '"> <i class="fas fa-trash"></i> Voide Bills</button>
                            </td>
                        </tr>
                    ';
                }
            } else {
                $html = 'NO DATA';
            }

            $html .= '
                                    </tbody>
                    </table>
                </div>
            ';

            $status = 200;
            $response['success'] = 1;

            $response['data']['html'] = $html;

        } catch (\Exception $e) {
            echo  $e->getMessage() . $e->getLine();
        }

        return $this->response
            ->setStatusCode($status)
            ->setContentType('application/json')
            ->setJSON($response);
    }

    public function sumOrderItems()
    {
        $status = 500;
        $response['success'] = 0;
        $response['message'] = '';

        try {

            // HANDLE REQUEST
            $requestPayload = $this->request->getJSON();
            // $businessMode = $requestPayload->businessMode ?? null;

            $data = $this->OrderModel->getDataSummaryToday();

            $TOTAL = $data->TOTAL;
            $DISCOUNT_ITEMS = $data->DISCOUNT_ITEMS;
            $SERVICE = $data->SERVICE;
            $DISCOUNT_BILL = $data->DISCOUNT_BILL;
            $CREDITCARD_CHARGE = $data->CREDITCARD_CHARGE;
            $VAT = $data->VAT;
            $GRAND_TOTAL = ($TOTAL - $DISCOUNT_ITEMS) + $SERVICE + $DISCOUNT_BILL + $CREDITCARD_CHARGE + $VAT;

            $status = 200;
            $response['success'] = 1;

            $response['data'] = [
                number_format($TOTAL, 2),
                number_format($DISCOUNT_ITEMS, 2),
                number_format($SERVICE, 2),
                number_format($DISCOUNT_BILL, 2),
                number_format($CREDITCARD_CHARGE, 2),
                number_format($VAT, 2),
                number_format($GRAND_TOTAL, 2),
            ];

        } catch (\Exception $e) {
            
        }

        return $this->response
            ->setStatusCode($status)
            ->setContentType('application/json')
            ->setJSON($response);
    }

    public function getLiveData()
    {
        $status = 500;
        $response['success'] = 0;
        $response['message'] = '';

        try {

            // HANDLE REQUEST
            $requestPayload = $this->request->getJSON();
    
            $counterLiveTables = $this->TableModel->getCounterTableAvailable();
            $counterLiveToGo = 0;
            $counterLiveDelivery = 0;

            $sum = $counterLiveTables + $counterLiveToGo + $counterLiveDelivery;

            $status = 200;
            $response['success'] = 1;

            $response['data'] = [
                $counterLiveTables,
                0, // 'LIVE TOGO' => '1.11',
                0, // 'LIVE DELIVERY' => '2.22',
                $sum
            ];

        } catch (\Exception $e) {
            
        }

        return $this->response
            ->setStatusCode($status)
            ->setContentType('application/json')
            ->setJSON($response);
    }

    public function activity()
    {
        try {

            // SET CONFIG
            $status = 500;
            $response['success'] = 0;
            $response['messages'] = '';
            

            $activityLogs = $this->ActivityLogModel->getActivityLogToday();

            $html = '
                <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper no-footer">
                    <table class="table lms_table_active2 p-0 dataTable no-footer dtr-inline" id="DataTables_Table_0" role="grid" style="width: 542px;">
                        <thead>
                            <tr role="row">
                                <th scope="col" class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 64px;" aria-label="Timestamp: activate to sort column ascending">Timestamp</th>
                                <th scope="col" class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 50px;" aria-label="Refer: activate to sort column ascending">Refer</th>
                                <th scope="col" class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 81px;" aria-label="Action: activate to sort column ascending">Action</th>
                                <th scope="col" class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 45px;" aria-label="Message: activate to sort column ascending">Message</th>
                                <th scope="col" class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 64px;" aria-label="Value: activate to sort column ascending">Value</th>
                                <th scope="col" class="sorting_asc" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 150px;" aria-sort="ascending" aria-label="By: activate to sort column descending">By</th>
                            </tr>
                        </thead>
                        <tbody>
            ';

            foreach ($activityLogs as $activityLog) {

                $strTomTimeDate = strtotime($activityLog->created_at);
                $time = date('H:i:s', $strTomTimeDate);

                $html .= '
                    <tr role="row" class="odd" style="cursor: pointer;">
                        <td class="f_s_12 f_w_400"><a href="#" class="text_color_3">' . $time . ' (' . datetime_compare($activityLog->created_at) . ')' .'</a></td>
                        <td class="f_s_12 f_w_400 color_text_6">' . $activityLog->refer . '</td>
                        <td class="f_s_12 f_w_400 color_text_7">' . $activityLog->action . '</td>
                        <td class="f_s_12 f_w_400 color_text_6">' . $activityLog->message . '</td>
                        <td class="f_s_12 f_w_400 color_text_6">' . $activityLog->value . '</td>
                        <td tabindex="0" class="sorting_1">
                            <div class="customer d-flex align-items-center">
                                <div class="thumb_34 mr_15 mt-0"><img class="img-fluid radius_50" src="https://demo.dashboardpack.com/user-management-html/img/customers/1.png" alt=""></div>
                                <span class="f_s_12 f_w_600 color_text_5">' . $activityLog->by . '</span>
                            </div>
                        </td>
                    </tr>
                ';
            }


            $html .= '
                    </tbody>
                    </table>
                </div>
            ';

            $response['data']['html'] = $html;

            $status = 200;
            $response['success'] = 1;
            $response['messages'] = '';

            return $this->response
            ->setStatusCode($status)
            ->setContentType('application/json')
            ->setJSON($response);

        } catch (\Exception $e) {
            echo $e->getMessage() . ' ' . $e->getLine();
        }
    }
}
