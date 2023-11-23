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
        $data['js_critical'] = '
            <script src="' . base_url('/js/report/index.js') . '"></script>
        ';

        echo view('/app', $data);
    }

    public function Sales()
    {
        $data['content'] = 'report/Sales';
        $data['title'] = ' ยอดขาย';
        $data['css_critical'] = '';
        $data['js_critical'] = '
            <script src="' . base_url('/js/report/index.js') . '"></script>
            <script src="' . base_url('/js/report/Sales.js') . '"></script>
        ';

        echo view('/app', $data);
    }

    public function BillSales()
    {
        $data['content'] = 'report/BillSales';
        $data['title'] = ' บิลขาย';
        $data['css_critical'] = '';
        $data['js_critical'] = '
            <script src="' . base_url('/js/report/index.js') . '"></script>
            <script src="' . base_url('/js/report/BillSales.js') . '"></script>
        ';

        echo view('/app', $data);
    }

    public function Product()
    {
        $data['content'] = 'report/Product';
        $data['title'] = ' สินค้า';
        $data['css_critical'] = '';
        $data['js_critical'] = '
            <script src="' . base_url('/js/report/index.js') . '"></script>
            <script src="' . base_url('/js/report/Product.js') . '"></script>
        ';

        echo view('/app', $data);
    }

    public function OrderTotal()
    {
        $data['content'] = 'report/OrderTotal';
        $data['title'] = ' ยอดสั่ง';
        $data['css_critical'] = '';
        $data['js_critical'] = '
            <script src="' . base_url('/js/report/index.js') . '"></script>
            <script src="' . base_url('/js/report/OrderTotal.js') . '"></script>
        ';

        echo view('/app', $data);
    }

    public function Expenses()
    {
        $data['content'] = 'report/Expenses';
        $data['title'] = ' รายจ่าย';
        $data['css_critical'] = '';
        $data['js_critical'] = '
            <script src="' . base_url('/js/report/index.js') . '"></script>
            <script src="' . base_url('/js/report/Expenses.js') . '"></script>
        ';

        echo view('/app', $data);
    }

    public function Stock()
    {
        $data['content'] = 'report/Stock';
        $data['title'] = ' สต็อก';
        $data['css_critical'] = '';
        $data['js_critical'] = '
            <script src="' . base_url('/js/report/index.js') . '"></script>
            <script src="' . base_url('/js/report/Stock.js') . '"></script>
        ';

        echo view('/app', $data);
    }

    public function Cancel()
    {
        $data['content'] = 'report/Cancel';
        $data['title'] = ' รายงาน';
        $data['css_critical'] = '';
        $data['js_critical'] = '
            <script src="' . base_url('/js/report/index.js') . '"></script>
            <script src="' . base_url('/js/report/Cancel.js') . '"></script>
        ';

        echo view('/app', $data);
    }

    public function Activity()
    {
        $data['content'] = 'report/Activity';
        $data['title'] = ' Activity';
        $data['css_critical'] = '';
        $data['js_critical'] = '
            <script src="' . base_url('/js/report/index.js') . '"></script>
            <script src="' . base_url('/js/report/Activity.js') . '"></script>
        ';

        echo view('/app', $data);
    }

    public function ProductPriceCorrectionReport()
    {
        $data['content'] = 'report/ProductPriceCorrectionReport';
        $data['title'] = ' รายงานแก้ราคาสินค้า';
        $data['css_critical'] = '';
        $data['js_critical'] = '
            <script src="' . base_url('/js/report/index.js') . '"></script>
            <script src="' . base_url('/js/report/ProductPriceCorrectionReport.js') . '"></script>
        ';

        echo view('/app', $data);
    }

    public function OpenMenu()
    {
        $data['content'] = 'report/OpenMenu';
        $data['title'] = ' OpenMenu';
        $data['css_critical'] = '';
        $data['js_critical'] = '
            <script src="' . base_url('/js/report/index.js') . '"></script>
            <script src="' . base_url('/js/report/OpenMenu.js') . '"></script>
        ';

        echo view('/app', $data);
    }
}
