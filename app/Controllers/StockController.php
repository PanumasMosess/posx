<?php

namespace App\Controllers;

date_default_timezone_set('Asia/Jakarta');

use App\Controllers\BaseController;
use Aws\S3\S3Client;

class StockController extends BaseController
{

    public function __construct()
    {
    }

    public function index()
    {
        $data['content'] = 'stock/index';
        $data['title'] = ' สต๊อกสินค้า';
        $data['css_critical'] = '<link rel="stylesheet" href="'. base_url('css/err_style.css') .'" />';
        $data['js_critical'] = ' 
            <script src="' . base_url('/js/stock/stock_index.js?v=' . time()) . '"></script>
        ';
        echo view('/app', $data);
    }

    public function insertproduct()
    {
        $data = $_POST["data"];
        foreach ($data as $singular) {
            // var_dump($singular[0]['productname']. "->" . $singular[0]['category']. "->" . $singular[0]['price']);     
        }
    }
}
