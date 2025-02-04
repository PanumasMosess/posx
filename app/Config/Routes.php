<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
// $routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
// The Auto Routing (Legacy) is very dangerous. It is easy to create vulnerable apps
// where controller filters or CSRF protection are bypassed.
// If you don't want to define all routes, please use the Auto Routing (Improved).
// Set `$autoRoutesImproved` to true in `app/Config/Feature.php` and set the following to true.
// $routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.

// Authentication
$routes->get('/', 'Home::index', ['filter' => 'employeeNoAuth']);
$routes->get('register', 'Home::Register', ['filter' => 'employeeNoAuth']);
$routes->match(['get', 'post'], 'login', 'Authentication::login', ['filter' => 'employeeNoAuth']);
$routes->get('logout', 'Authentication::logout', ['filter' => 'employeeAuth']);
$routes->post('user-register', 'Register::UserRegister', ['filter' => 'employeeNoAuth']);

// $routes->get('/', 'Home::index');
// $routes->get('/', 'Dashboard::index', ['filter' => 'employeeNoAuth']);

$routes->get('/dashboard', 'Dashboard::index', ['filter' => 'employeeAuth']);

$routes->get('pdf_bill/(:any)', 'PdfController::pdf_Bill/$1', ['filter' => 'employeeAuth']);
$routes->get('pdf_receipt/(:any)', 'PdfController::pdf_Receipt/$1', ['filter' => 'employeeAuth']);
$routes->get('unlink_pdf/(:any)', 'PdfController::unlink_pdf/$1');
$routes->post('pdf_BillOrder', 'PdfController::pdf_BillOrder', ['filter' => 'employeeAuth']);
$routes->get('pdf_CancelledBillOrder/(:any)', 'PdfController::pdf_CancelledBillOrder/$1', ['filter' => 'employeeAuth']);  
$routes->get('get_print_mobile', 'PdfController::load_mobile_print', ['filter' => 'employeeAuth']);  





$routes->get('order_menu/', 'OrderPosController::menulink');

$routes->get('pdf_QR_Code', 'PdfController::pdf_QR', ['filter' => 'employeeAuth']);

$routes->group('setting', ['filter' => 'employeeAuth'],  function ($routes) {
    $routes->get('index', 'SettingController::index');
    // $routes->post('ajax-datatablePosition', 'SettingController::ajaxDataTablesPosition');
    // $routes->post('addPosition', 'SettingController::addPosition');
    // $routes->get('editPosition/(:num)', 'SettingController::editPosition/$1');
    // $routes->post('updatePosition', 'SettingController::updatePosition');
    // $routes->get('deletePosition/(:num)', 'SettingController::deletePosition/$1');

    // $routes->post('ajax-datatableBranch', 'SettingController::ajaxDataTablesBranch');
    // $routes->post('addBranch', 'SettingController::addBranch');
    // $routes->get('editBranch/(:num)', 'SettingController::editBranch/$1');
    // $routes->post('updateBranch', 'SettingController::updateBranch');
    // $routes->get('deleteBranch/(:num)', 'SettingController::deleteBranch/$1');

    $routes->get('information', 'SettingController::information');
    $routes->post('updateInformation', 'SettingController::updateInformation');
    $routes->post('updatePasswordCompanies', 'SettingController::updatePasswordCompanies');
    $routes->post('addEmail', 'SettingController::addEmail');
    $routes->get('deleteEmail', 'SettingController::deleteEmail');

    $routes->post('addNewUser', 'SettingController::addNewUser');
    $routes->get('editUser/(:num)', 'SettingController::editUser/$1');
    $routes->post('updateUser', 'SettingController::updateUser');
    $routes->get('deleteUser/(:num)', 'SettingController::deleteUser/$1');

    $routes->post('ajax-datatableEmployeePinPos', 'SettingController::ajaxDataTablesEmployeePinPos');
    $routes->post('addEmployeePinPos', 'SettingController::addEmployeePinPos');
    $routes->post('updateEmployeePinPos', 'SettingController::updateEmployeePinPos');
    $routes->get('deleteEmployeePinPos/(:num)', 'SettingController::deleteEmployeePinPos/$1');

    $routes->post('ajax-datatableEmployeePinStock', 'SettingController::ajaxDataTablesEmployeePinStock');
    $routes->post('addEmployeePinStock', 'SettingController::addEmployeePinStock');
    $routes->post('updateEmployeePinStock', 'SettingController::updateEmployeePinStock');
    $routes->get('deleteEmployeePinStock/(:num)', 'SettingController::deleteEmployeePinStock/$1');

    $routes->post('ajax-datatableMobile', 'SettingController::ajaxDataTablesMobile');
    $routes->post('addMobile', 'SettingController::addMobile');
    $routes->get('deleteMobile/(:num)', 'SettingController::deleteMobile/$1');

    $routes->post('ajax-datatablePaymentType', 'SettingController::ajaxDataTablesPaymentType');
    $routes->post('addPaymentType', 'SettingController::addPaymentType');
    // $routes->post('updatePaymentType', 'SettingController::updatePaymentType');
    $routes->get('deletePaymentType/(:num)', 'SettingController::deletePaymentType/$1');
    $routes->post('updateCreditCard', 'SettingController::updateCreditCard');
    $routes->post('updateEntertain', 'SettingController::updateEntertain');
    $routes->get('printersetting', 'SettingController::getprinter');
    $routes->post('printer', 'SettingController::printersetting');
    $routes->post('file_setting', 'SettingController::file_setting');
});
 
$routes->group('payment', ['filter' => 'employeeAuth'] ,function ($routes) {
    $routes->get('index', 'PaymentController::index');
    $routes->post('addPayment', 'PaymentController::addPayment');
});

$routes->group('expense', ['filter' => 'employeeAuth'] ,function ($routes) {
    $routes->get('index', 'ExpenseController::index');
    $routes->post('addExpense', 'ExpenseController::addExpense');
    $routes->get('editExpense/(:num)', 'ExpenseController::editExpense/$1');
    $routes->post('updateExpense', 'ExpenseController::updateExpense');
    $routes->get('deleteExpense/(:num)', 'ExpenseController::deleteExpense/$1');

    $routes->post('addSubExpense', 'ExpenseController::addSubExpense');
    $routes->get('editSubExpense/(:num)', 'ExpenseController::editSubExpense/$1');
    $routes->post('updateSubExpense', 'ExpenseController::updateSubExpense');
    $routes->get('deleteSubExpense/(:num)', 'ExpenseController::deleteSubExpense/$1');

    $routes->post('addExpenseDate', 'ExpenseController::addExpenseDate');
    $routes->get('getSubGroup/(:num)', 'ExpenseController::getSubGroup/$1');
    $routes->get('getGroup', 'ExpenseController::getGroup');
    $routes->post('ajax-datatableExpense', 'ExpenseController::ajaxDataTablesExpense');
    $routes->get('ajax-totalexpenses', 'ExpenseController::ajaxTotalExpenses');
    $routes->get('deleteExpenseList/(:num)', 'ExpenseController::deleteExpenseList/$1');
    $routes->get('ajax-expenses', 'ExpenseController::ajaxExpenses');
});

$routes->group('employee', ['filter' => 'employeeAuth'], function ($routes) {
    $routes->get('index', 'EmployeeController::index');
    $routes->post('addEmployee', 'EmployeeController::addEmployee');
    $routes->get('editPassword/(:num)', 'EmployeeController::editPassword/$1');
    $routes->post('updatePassword', 'EmployeeController::updatePassword');
    $routes->get('editEmployee/(:num)', 'EmployeeController::editEmployee/$1');
    $routes->post('updateEmployee', 'EmployeeController::updateEmployee');
    $routes->get('deleteEmployee/(:num)', 'EmployeeController::deleteEmployee/$1');
});

$routes->group('manager', ['filter' => 'employeeAuth'], function ($routes) {
    $routes->get('index', 'ManagerController::index');

    $routes->post('ajax-datatableGroupProduct', 'ManagerController::ajaxDataTablesGroupProduct');
    $routes->post('addGroupProduct', 'ManagerController::addGroupProduct');
    $routes->get('editGroupProduct/(:num)', 'ManagerController::editGroupProduct/$1');
    $routes->post('updateGroupProduct', 'ManagerController::updateGroupProduct');
    $routes->get('deleteGroupProduct/(:num)', 'ManagerController::deleteGroupProduct/$1');
    // $routes->post('insertGroupProduct', 'SettingController::insertgroupproduct');

    $routes->post('ajax-datatableSupplier', 'ManagerController::ajaxDataTablesSupplier');
    $routes->post('addSupplier', 'ManagerController::addSupplier');
    $routes->get('editSupplier/(:num)', 'ManagerController::editSupplier/$1');
    $routes->post('updateSupplier', 'ManagerController::updateSupplier');
    $routes->get('deleteSupplier/(:num)', 'ManagerController::deleteSupplier/$1');

    $routes->get('setting_tv', 'ManagerController::setting_tv');
    $routes->post('update_piture', 'ManagerController::updatePiture');
    $routes->get('fetchPicture', 'ManagerController::fetchPicture');
    $routes->get('delete_picture/(:any)', 'ManagerController::deletePicture/$1');

    $routes->get('TVSetting', 'ManagerController::TVSetting');
    $routes->post('updateTVSetting', 'ManagerController::updateTVSetting');

    $routes->get('loadQR', 'ManagerController::loadQR');
});

// stock management
$routes->group(
    'stock',
    ['filter' => 'employeeAuth'],
    function ($routes) {
        $routes->get('index', 'StockController::index');
        $routes->post('insertProduct', 'StockController::insertproduct');
        $routes->post('dataStock', 'StockController::fetchDataStock');
        $routes->get('getTempOffline', 'StockController::fetchDataStockOffline');
        $routes->get('getTempUpdate/(:any)', 'StockController::fetchUpdateStock/$1');
        $routes->get('getTempAdjust/(:any)', 'StockController::fetchUpdateStock/$1');
        $routes->get('groupData', 'StockController::fetchGroupData');
        $routes->get('supplierData', 'StockController::fetchSupplierData');
        $routes->post('updateProduct', 'StockController::updateproduct');
        $routes->post('deleteProduct', 'StockController::deleteproduct');
        $routes->post('updateAdjust', 'StockController::updateAdjust');
        $routes->get('listTransection/(:any)', 'StockController::getTransectionByStockCode/$1');
        $routes->get('pageTransection/(:any)', 'StockController::getTableTransectionByStockCode/$1');
        $routes->get('orderData', 'StockController::getOrder');
        $routes->post('dataStockFormular', 'StockController::fetchDataStockFormular');
        $routes->post('insertFormular', 'StockController::insertFormular');
        $routes->post('dataSummaryFormular', 'StockController::getFormularSummary');
        $routes->get('listStockItem/(:any)', 'StockController::getlistStockIteme/$1');
        $routes->get('pageListFomular/(:any)', 'StockController::getTablepageListFomular/$1');
        $routes->post('dataSummaryTransection', 'StockController::getSummaryTransection');
        $routes->post('deleteFormularbyOrder', 'StockController::deleteFormularbyOrder');
        $routes->post('deleteFormularbyId', 'StockController::deleteFormularbyId');
    }
);

// orders management
$routes->group(
    'order',
    ['filter' => 'employeeAuth'],
    function ($routes) {
        $routes->get('order_manage', 'OrderController::index');
        $routes->post('dataOrder', 'OrderController::fetchDataOrder');
        $routes->get('getTempOfflineOrder', 'OrderController::fetchTempOfflineOrder');
        $routes->post('insertOrder', 'OrderController::insertproduct');
        $routes->post('updateOrder', 'OrderController::updateOrder');
        $routes->post('deleteOrder', 'OrderController::deleteOrder');
        $routes->get('getTempUpdate/(:any)', 'OrderController::fetchUpdateOrder/$1');

        //Routes POS
        $routes->get('order_pos', 'OrderPosController::index');
        $routes->get('getTempUpdateArea/(:any)', 'OrderPosController::fetchUpdateArea/$1');
        $routes->post('dataArea', 'OrderPosController::dataAreaTable');
        $routes->post('insertArea', 'OrderPosController::insertArea');
        $routes->post('updateArea', 'OrderPosController::updateAear');
        $routes->post('deleteArea', 'OrderPosController::deleteArea');
        $routes->get('pageArea/(:any)', 'OrderPosController::getPageAddTableInArea/$1');
        $routes->post('floorplansave', 'OrderPosController::insertTable');
        $routes->get('getTableInArea/(:any)', 'OrderPosController::getTableInArea/$1');
        $routes->get('getTempUpdateTable/(:any)', 'OrderPosController::getTempUpdateTable/$1');
        $routes->post('deleteTable', 'OrderPosController::deleteTable');
        $routes->post('updateDetailTable', 'OrderPosController::updateDetailTable');
        $routes->get('areaData', 'OrderPosController::loadtoSelectAreaData');
        $routes->get('order_list_customer/(:any)', 'OrderPosController::getPageOrderCustomer/$1');
        $routes->get('getTableDetalByCode/(:any)', 'OrderPosController::getTableDetailByCode/$1');
        $routes->post('getDetailCard', 'OrderPosController::getDataOrderCard');
        $routes->get('areaData', 'OrderPosController::loadtoSelectAreaData');
        $routes->post('addOrderCustomer', 'OrderPosController::insertOrderCustomer');
        $routes->get('getSummaryData/(:any)', 'OrderPosController::getSummaryData/$1');
        $routes->get('getTableByArea/(:any)', 'OrderPosController::getTableInArea/$1');
        $routes->post('updateMoveTable', 'OrderPosController::updateMoveTable');
        $routes->post('updateVoidOrderTable', 'OrderPosController::updateVoidOrderTable');
        $routes->get('outofstock/(:any)', 'OrderPosController::outofstock/$1');
        $routes->post('loadTableOrderList', 'OrderPosController::loadTableOrderList');
        $routes->post('updateDiscount', 'OrderPosController::updateDiscount');
        $routes->post('paymentStore', 'OrderPosController::paymentStore');
        $routes->get('order_summary_update', 'OrderPosController::orderSummaryUpdate');
        $routes->post('updatePcsSummary', 'OrderPosController::updatePcsSummary');
        $routes->post('delete_list_order_customer', 'OrderPosController::deleteListOrderCustomer');
        $routes->post('update_order_print_log', 'OrderPosController::updateOrderPrintLog');
        $routes->get('getTypePlayMent', 'OrderPosController::getTypePlayMent');  
        $routes->get('update_order_print_mobile/(:any)', 'OrderPosController::update_order_print_mobile/$1');  
        $routes->get('check_printer_order/(:any)', 'OrderPosController::fetchLogPrinter/$1');
        $routes->get('check_printer_order_by_table/(:any)', 'OrderPosController::fetchLogPrinterByTable/$1');
        $routes->get('CancelBookingTable/(:any)', 'OrderPosController::CancelBookingTable/$1');
        $routes->get('bookingTable/(:any)', 'OrderPosController::bookingTable/$1');

    /*
    * --------------------------------------------------------------------
    * TAB DASHBAORD
    * --------------------------------------------------------------------
    */


    $routes->post('sumOrderItems', 'TabOrderPos::sumOrderItems'); // Summary Tab แดชบอร์ด: Sum
    $routes->post('getLiveData', 'TabOrderPos::getLiveData'); // Summary Tab แดชบอร์ด: Live Data
    
    $routes->post('getDataDashboard', 'TabOrderPos::getDataDashboard'); // Summary Tab แดชบอร์ด: Receipt
    $routes->get('orderDetail/(:any)', 'TabOrderPos::getOrderDetail/$1'); // Summary Tab แดชบอร์ด: Receipt Detail
    $routes->get('view/(:any)', 'TabOrderPos::view/$1'); // Summary Tab แดชบอร์ด: Receipt นับ
    $routes->post('update-status', 'TabOrderPos::updateStatus'); // Summary Tab แดชบอร์ด: อัพเดทสถานะ Receipt

    $routes->post('orderDashboard/detail', 'TabOrderPos::orderDashboardDetail');
    $routes->post('orderDashboard/testDetail', 'TabOrderPos::orderDashboardTestDetail');
    $routes->post('orderDashboard/bestSellers', 'TabOrderPos::orderDashboardBestSellers');
    $routes->post('orderDashboard/voidItems', 'TabOrderPos::orderDashboardVoidItems');

//         $routes->post('sumOrderItems', 'Test::sumOrderItems'); // Summary Tab แดชบอร์ด: Sum
//         $routes->post('getLiveData', 'Test::getLiveData'); // Summary Tab แดชบอร์ด: Live Data

//         $routes->post('getDataDashboard', 'Test::getDataDashboard'); // Summary Tab แดชบอร์ด: Receipt
//         $routes->get('orderDetail/(:any)', 'Test::getOrderDetail/$1'); // Summary Tab แดชบอร์ด: Receipt Detail
//         $routes->get('view/(:any)', 'Test::view/$1'); // Summary Tab แดชบอร์ด: Receipt นับ
//         $routes->post('update-status', 'Test::updateStatus'); // Summary Tab แดชบอร์ด: อัพเดทสถานะ Receipt

//         $routes->post('orderDashboard/detail', 'Test::orderDashboardDetail');
//         $routes->post('orderDashboard/testDetail', 'Test::orderDashboardTestDetail');
//         $routes->post('orderDashboard/bestSellers', 'Test::orderDashboardBestSellers');
//         $routes->post('orderDashboard/voidItems', 'Test::orderDashboardVoidItems');


        /*
    * --------------------------------------------------------------------
    * TAB ACTIVITY
    * --------------------------------------------------------------------
    */


  $routes->get('activity', 'TabOrderPos::activity'); // Log Tab Activity
});
//         $routes->get('activity', 'Test::activity'); // Log Tab Activity
//     }
// );

$routes->group('report', ['filter' => 'employeeAuth'], function ($routes) {

    $routes->get('', 'ReportController::index');

    /*
    * --------------------------------------------------------------------
    * Sales
    * --------------------------------------------------------------------
    */

    $routes->get('Sales', 'ReportController::Sales');
    $routes->post('incomeSummary', 'ReportController::incomeSummary');

    /*
    * --------------------------------------------------------------------
    * BillSales
    * --------------------------------------------------------------------
    */

    $routes->get('BillSales', 'ReportController::BillSales');
    $routes->post('SalesByOrder', 'ReportController::SalesByOrder');
    
    /*
    * --------------------------------------------------------------------
    * Product
    * --------------------------------------------------------------------
    */

    $routes->get('Product', 'ReportController::Product');
    $routes->post('SumOrderItems', 'ReportController::SumOrderItems');

    /*
    * --------------------------------------------------------------------
    * OrderTotal
    * --------------------------------------------------------------------
    */
    
    $routes->get('OrderTotal', 'ReportController::OrderTotal');

    /*
    * --------------------------------------------------------------------
    * Expenses
    * --------------------------------------------------------------------
    */

    $routes->get('Expenses', 'ReportController::Expenses');

    /*
    * --------------------------------------------------------------------
    * Stock
    * --------------------------------------------------------------------
    */

    $routes->get('Stock', 'ReportController::Stock');

    /*
    * --------------------------------------------------------------------
    * Cancel
    * --------------------------------------------------------------------
    */

    $routes->get('Cancel', 'ReportController::Cancel');
    $routes->post('CancelItem', 'ReportController::CancelItem');

    /*
    * --------------------------------------------------------------------
    * Activity
    * --------------------------------------------------------------------
    */

    $routes->get('Activity', 'ReportController::Activity');
    $routes->post('ActivityLogs', 'ReportController::ActivityLogs');

    /*
    * --------------------------------------------------------------------
    * ProductPriceCorrectionReport
    * --------------------------------------------------------------------
    */

    $routes->get('ProductPriceCorrectionReport', 'ReportController::ProductPriceCorrectionReport');
   
    /*
    * --------------------------------------------------------------------
    * OpenMenu
    * --------------------------------------------------------------------
    */

    $routes->get('OpenMenu', 'ReportController::OpenMenu');
});

/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (is_file(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
