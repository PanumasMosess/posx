<?php

namespace App\Controllers;

date_default_timezone_set('Asia/Jakarta');

use App\Controllers\BaseController;
use Aws\S3\S3Client;

class OrderController extends BaseController
{

    public function __construct()
    {
        // Model
        $this->OrderModel = new \App\Models\OrderModel();
    }

    public function index()
    {
        $data['content'] = 'order/order_manage';
        $data['title'] = ' รายการสินค้า';
        $data['css_critical'] = '<link rel="stylesheet" href="' . base_url('css/err_style.css') . '" />';
        $data['js_critical'] = ' 
            <script src="' . base_url('/js/notify/js/notifIt.js') . '"></script>
            <script src="' . base_url('/js/base64/jquery.base64.min.js') . '"></script>
            <script src="' . base_url('/js/orders/order_manage.js?v=' . time()) . '"></script>    
        ';
        echo view('/app', $data);
    }

    public function fetchDataOrder()
    {
        $datas_order = $this->OrderModel->_getAllDataOrder($_POST);

        $filter = $this->OrderModel->getAllDataOrderFilter();

        return $this->response->setJSON([
            'draw' => $_POST['draw'],
            'recordsTotal' => count($filter),
            'recordsFiltered' => count($filter),
            "data" => $datas_order,
        ]);
    }

   
}
