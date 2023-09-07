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
    }

    public function sumOrderItems()
    {
        $status = 500;
        $response['success'] = 0;
        $response['message'] = '';

        try {

            // HANDLE REQUEST
            $requestPayload = $this->request->getJSON();
            $businessMode = $requestPayload->businessMode ?? null;
    
            $status = 200;
            $response['success'] = 1;

            // TODO:: HANDLE DATA
            $response['data'] = [
                'TOTAL' => '0.00',
                'DISCOUNT ITEMS' => '1.11',
                'SERVICE' => '2.22',
                'DISCOUNT BILL' => '3.33',
                'CREDITCARD CHARGE' => '4.44',
                'VAT' => '5.55',
                'GRAND TOTAL' => '0.00',
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
    
            $status = 200;
            $response['success'] = 1;

            // TODO:: HANDLE DATA
            $response['data'] = [
                'LIVE TABLES' => '0.00',
                'LIVE TOGO' => '1.11',
                'LIVE DELIVERY' => '2.22',
                'SUM' => '0'
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
