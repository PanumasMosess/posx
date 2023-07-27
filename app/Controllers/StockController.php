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
        $data['css_critical'] = '';
        $data['js_critical'] = ' 
            <script src="' . base_url('/js/stock/stock_index.js?v=' . time()) . '"></script>
        ';
        echo view('/app', $data);
    }

    public function insertproduct()
    {


        $data = $_POST["data"];
        foreach ($data as $singular) {
            echo "<pre>";
            var_dump($singular[0]['name']. "->" . $singular[0]['price']. "->" . $singular[0]['unit']);
            echo "</pre>";
        }
    }
}
