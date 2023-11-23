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
        $this->ActivityLogModel = new \App\Models\ActivityLogModel();
        $this->TableModel = new \App\Models\TableModel();
        $this->OrderModel = new \App\Models\OrderModel();
        $this->TestModel = new \App\Models\TestModel();
    }

    public function index()
    {
        $data['content'] = 'report/index';
        $data['title'] = ' รายงาน';
        $data['css_critical'] = '';
        $data['js_critical'] = ' ';

        echo view('/app', $data);
    }
}
