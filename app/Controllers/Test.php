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

    public function deposit()
    {
        $data['content'] = '/report/deposit';
        $data['title'] = 'ฝากเงิน';
        $data['css_critical'] = '
            <!--datatable css-->
            <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css" />
            <!--datatable responsive css-->
            <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.bootstrap.min.css" />
            
            <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.2.2/css/buttons.dataTables.min.css">
        ';
        $data['js_critical'] = '
            <!--datatable js-->
            <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
            <script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>
            <script src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js"></script>
            
            <script src="https://cdn.datatables.net/buttons/2.2.2/js/dataTables.buttons.min.js"></script>
            <script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.print.min.js"></script>
            <script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.html5.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
            
            <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
            
            <script src="' . base_url('/assets/js/sweetalert.min.js') . '"></script>
            <script src="' . base_url('/assets/js/apps/report/deposit.js') . '"></script>
        ';
        $data['website'] = $this->WebsiteModel->getWebsiteByID(1);

        echo view('app', $data);
    }

    public function getListsDeposit()
    {
        try {
            $data = $row = array();

            // Fetch member's records
            $memData = $this->DepositModel->getRows($_POST);

            $i = $_POST['start'];

            foreach ($memData as $deposit) {
                $i++;

                $deposit->promotion = '-';

                if ($deposit->promotion_member_id) {
                    $promotion = $this->PromotionMemberModel->getPromotionMemberJoinPromotionByID($deposit->promotion_member_id);
                    if ($promotion) {
                        $lang = isBankLaos($deposit->bank_id) ? 'la' : 'th';
                        $deposit->promotion = unserialize($promotion->description)[$lang];
                    }
                }

                $member = $this->MemberModel->getMemberByID($deposit->member_id);
                $colColAc = '';
                $colUsername = '';
                $colManage = '-';
                if ($member) {
                    $colColAc = '<img src="' . base_url('/assets/img/banks/' . $deposit->bank_icon) . '" class="avatar-xs me-3 rounded" alt="">' . $deposit->bank_account_no;
                    $colUsername = '<a target="_blank" href="' . base_url('/member/show/' . hashidsEncrypt($deposit->member_id)) . '">' . $deposit->username . '</a>';
                    $colManage = '
                        <button title="รายละเอียดเครดิต" class="btn btn-info btn-sm mx-1 btnShowCreditDetail" style="padding: .25rem .5rem;" data-bs-toggle="modal" data-bs-target="#modalShowCreditDetail" data-temp-transaction-id="'. hashidsEncrypt($deposit->temp_transaction_id) .'">
                            <i class="fas fa-credit-card" style="padding: 0;"></i>
                        </button>
                        <!-- <button title="เทิร์นโอเวอร์ตามเกม" class="btn btn-danger btn-sm mx-1 btnShowWinLoseReport" style="padding: .25rem .5rem;" data-bs-toggle="modal" data-bs-target="#modalShowWinLoseReport" data-temp-transaction-id="'. hashidsEncrypt($deposit->temp_transaction_id) .'">
                            <i class="fas fa-file-alt" style="padding: 0;"></i>
                        </button> -->
                    ';
                } else {
                    $colColAc = '<img src="' . base_url('/assets/img/banks/' . $deposit->bank_icon) . '" class="avatar-xs me-3 rounded" alt="">' . '/X' . $deposit->bank_account_no;
                    $colUsername = 'ไม่พบยูสในระบบ';
                }

                $data[] = array(
                    $i,
                    $colColAc,
                    $deposit->fullname,
                    $colUsername,
                    $deposit->credit,
                    $deposit->promotion,
                    $deposit->status,
                    '
                    <img src="' . ($deposit->web_bank_id != 0 ? base_url('/assets/img/banks/' . $deposit->web_bank_icon) : base_url('/assets/img/banks/bank.jpg')) . '" class="avatar-xs me-3 rounded" alt="">
                    ' . $deposit->web_bank_no . ' | ' . $deposit->web_bank_name . '
                    ',
                    $colManage,
                    $deposit->created_at,
                    $deposit->action_by
                );
            }

            $output = array(
                "draw" => $_POST['draw'],
                "recordsTotal" => $this->DepositModel->countAll(),
                "recordsFiltered" => $this->DepositModel->countFiltered($_POST),
                "data" => $data,
            );

            // Output to JSON format
            echo json_encode($output);
        } catch (\Exception $e) {
            echo $e->getMessage() . ' ' . $e->getLine();
        }
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
