<?php

namespace App\Controllers;

date_default_timezone_set('Asia/Jakarta');

use App\Controllers\BaseController;

class OrderPosController extends BaseController
{

    public function __construct()
    {
        // Model Order
        $this->OrderModel = new \App\Models\OrderModel();
        // Model Stock
        $this->StockModel = new \App\Models\StockModel();
    }

    public function index()
    {
        $data['content'] = 'order/order_pos';
        $data['title'] = 'สั่งสินค้า';
        $data['css_critical'] = '
        <link rel="stylesheet" href="' . base_url('css/err_style.css') . '" />
        <link rel="stylesheet" href="' . base_url('css/tableStyle.css') . '" />
        ';
        $data['js_critical'] = '    
            <script src="' . base_url('/js/notify/js/notifIt.js') . '"></script> 
            <script src="' . base_url('/js/base64/jquery.base64.min.js') . '"></script>   
            <script src="' . base_url('/js/interact.min.js') . '"></script>   
            <script src="' . base_url('/js/orders/order_pos.js?v=' . time()) . '"></script>    
        ';
        echo view('/app', $data);
    }
}
