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

    public function getDataDashboard()
    {
        $status = 500;
        $response['success'] = 0;
        $response['message'] = '';

        try {

            // HANDLE REQUEST
            $requestPayload = $this->request->getJSON();
            $type = $requestPayload->type ?? null;

            $orderCustomersToday = $this->OrderModel->getOrderCustomersToday($type);

            $html = '';

            if ($orderCustomersToday) {
                foreach($orderCustomersToday as $data) {

                    // $html .= '
                    //     <div class="single_user_pil d-flex align-items-center justify-content-between">
                    //         <div class="user_pils_thumb d-flex align-items-center">
                    //             <div class="thumb_34 mr_15 mt-0"><img class="img-fluid radius_50" src="img/customers/1.png" alt=""></div>
                    //                 <span class="f_s_14 f_w_400 text_color_11">Jhon Smith</span>
                    //             </div>
                    //             <div class="user_info">
                    //                 Customer
                    //             </div>
                    //             <div class="action_btns d-flex">
                    //             <a href="#" class="action_btn mr_10"> <i class="far fa-edit"></i> </a>
                    //             <a href="#" class="action_btn"> <i class="fas fa-trash"></i> </a>
                    //         </div>
                    //     </div>
                    // ';

                    $html .= '
                        <div class="single_user_pil d-flex align-items-center justify-content-between">
                            <div class="user_pils_thumb d-flex align-items-center">
                                <div class="thumb_34 mr_15 mt-0">
                                ' . $data->order_customer_code . '
                                </div>
                                <span class="f_s_14 f_w_400 text_color_11">ชื่อ ' . $data->order_customer_ordername . '</span>
                            </div>
                            <div class="user_info">
                                ยอดรวม: ' . $data->order_customer_price . '
                            </div>
                            <div class="action_btns d-flex">
                                <a href="#" class="action_btn mr_10"> <i class="far fa-edit"></i> </a>
                                <a href="#" class="action_btn"> <i class="fas fa-trash"></i> </a>
                            </div>
                        </div>
                    ';
                }
            } else {
                $html = 'NO DATA';
            }


            $status = 200;
            $response['success'] = 1;

            $response['data']['html'] = $html;

        } catch (\Exception $e) {
            
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
