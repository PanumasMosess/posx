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
    $routes->get('group_product', 'SettingController::group_product');
    $routes->post('addGroupProduct', 'SettingController::addGroupProduct');
    $routes->get('editGroupProduct/(:num)', 'SettingController::editGroupProduct/$1');
    $routes->post('updateGroupProduct', 'SettingController::updateGroupProduct');
    $routes->get('deleteGroupProduct/(:num)', 'SettingController::deleteGroupProduct/$1');
    // $routes->post('insertGroupProduct', 'SettingController::insertgroupproduct');

    $routes->get('supplier', 'SettingController::supplier');
    $routes->post('addSupplier', 'SettingController::addSupplier');
    $routes->get('editSupplier/(:num)', 'SettingController::editSupplier/$1');
    $routes->post('updateSupplier', 'SettingController::updateSupplier');
    $routes->get('deleteSupplier/(:num)', 'SettingController::deleteSupplier/$1');
    
    $routes->get('position', 'SettingController::position');
    $routes->post('addPosition', 'SettingController::addPosition');
    $routes->get('editPosition/(:num)', 'SettingController::editPosition/$1');
    $routes->post('updatePosition', 'SettingController::updatePosition');
    $routes->get('deletePosition/(:num)', 'SettingController::deletePosition/$1');

    $routes->get('branch', 'SettingController::branch');
    $routes->post('addBranch', 'SettingController::addBranch');
    $routes->get('editBranch/(:num)', 'SettingController::editBranch/$1');
    $routes->post('updateBranch', 'SettingController::updateBranch');
    $routes->get('deleteBranch/(:num)', 'SettingController::deleteBranch/$1');

});

// stock management
$routes->group('stock', ['filter' => 'employeeAuth'] ,
// ['filter' => 'employeeAuth'],
function ($routes) {
    $routes->get('index', 'StockController::index');
    $routes->post('insertProduct', 'StockController::insertproduct');
    $routes->post('dataStock', 'StockController::fetchDataStock');  
    $routes->get('getTempOffline', 'StockController::fetchDataStockOffline'); 
    $routes->get('getTempUpdate/(:any)', 'StockController::fetchUpdateStock/$1');  
    $routes->get('getTempAdjust/(:any)', 'StockController::fetchUpdateStock/$1');  
    $routes->get('groupData', 'StockController::fetchGroupData');  
    $routes->post('updateProduct', 'StockController::updateproduct'); 
    $routes->post('deleteProduct', 'StockController::deleteproduct');    
    $routes->post('updateAdjust', 'StockController::updateAdjust'); 
    $routes->get('listTransection/(:any)', 'StockController::getTransectionByStockCode/$1');
    $routes->get('pageTransection/(:any)', 'StockController::getTableTransectionByStockCode/$1');   
    $routes->get('orderData', 'StockController::getOrder'); 
    $routes->post('dataStockFormular', 'StockController::fetchDataStockFormular');    
    $routes->post('insertFormular', 'StockController::insertFormular');  
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
