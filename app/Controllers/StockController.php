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
        echo view('/app', $data);
    }

}