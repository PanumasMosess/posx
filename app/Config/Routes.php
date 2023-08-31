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
$routes->setDefaultMethod('index');
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
$routes->match(['get', 'post'], 'login', 'Authentication::login', ['filter' => 'employeeNoAuth']);
$routes->get('logout', 'Authentication::logout', ['filter' => 'employeeAuth']);

// $routes->get('/', 'Home::index');
// $routes->get('/', 'Dashboard::index', ['filter' => 'employeeNoAuth']);

$routes->get('/dashboard', 'Dashboard::index', ['filter' => 'employeeAuth']);

$routes->group('setting', ['filter' => 'employeeAuth'] ,  function ($routes) {
    $routes->get('index', 'SettingController::index');
    $routes->post('ajax-datatableGroupProduct', 'SettingController::ajaxDataTablesGroupProduct');
    $routes->post('addGroupProduct', 'SettingController::addGroupProduct');
    $routes->get('editGroupProduct/(:num)', 'SettingController::editGroupProduct/$1');
    $routes->post('updateGroupProduct', 'SettingController::updateGroupProduct');
    $routes->get('deleteGroupProduct/(:num)', 'SettingController::deleteGroupProduct/$1');
    // $routes->post('insertGroupProduct', 'SettingController::insertgroupproduct');

    $routes->post('ajax-datatableSupplier', 'SettingController::ajaxDataTablesSupplier');
    $routes->post('addSupplier', 'SettingController::addSupplier');
    $routes->get('editSupplier/(:num)', 'SettingController::editSupplier/$1');
    $routes->post('updateSupplier', 'SettingController::updateSupplier');
    $routes->get('deleteSupplier/(:num)', 'SettingController::deleteSupplier/$1');

    $routes->post('ajax-datatablePosition', 'SettingController::ajaxDataTablesPosition');
    $routes->post('addPosition', 'SettingController::addPosition');
    $routes->get('editPosition/(:num)', 'SettingController::editPosition/$1');
    $routes->post('updatePosition', 'SettingController::updatePosition');
    $routes->get('deletePosition/(:num)', 'SettingController::deletePosition/$1');

    $routes->post('ajax-datatableBranch', 'SettingController::ajaxDataTablesBranch');
    $routes->post('addBranch', 'SettingController::addBranch');
    $routes->get('editBranch/(:num)', 'SettingController::editBranch/$1');
    $routes->post('updateBranch', 'SettingController::updateBranch');
    $routes->get('deleteBranch/(:num)', 'SettingController::deleteBranch/$1');

});

$routes->group('employee', ['filter' => 'employeeAuth'] ,function ($routes) {
    $routes->get('index', 'EmployeeController::index');
    $routes->post('addEmployee', 'EmployeeController::addEmployee');
    $routes->get('editPassword/(:num)', 'EmployeeController::editPassword/$1');
    $routes->post('updatePassword', 'EmployeeController::updatePassword');
    $routes->get('editEmployee/(:num)', 'EmployeeController::editEmployee/$1');
    $routes->post('updateEmployee', 'EmployeeController::updateEmployee');
    $routes->get('deleteEmployee/(:num)', 'EmployeeController::deleteEmployee/$1');
});

// stock management
$routes->group('stock', ['filter' => 'employeeAuth'] ,
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
    });

// orders management
$routes->group('order', ['filter' => 'employeeAuth'] ,
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
    $routes->get('order_customer_list/(:any)', 'OrderPosController::getPageOrderCustomer/$1');   
    $routes->get('getTableDetalByCode/(:any)', 'OrderPosController::getTableDetailByCode/$1'); 
    $routes->post('getDetailCard', 'OrderPosController::getDataOrderCard');
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
