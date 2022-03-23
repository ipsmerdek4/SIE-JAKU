<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}

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
$routes->setAutoRoute(true);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Home::index',['filter' => 'auth']);
$routes->match(['get','post'],'/home', 'Home::index',['filter' => 'auth']);

$routes->get('/login', 'Login::index');
$routes->post('/login/process', 'Login::process');


$routes->get('/userlogin', 'UserLogin::index',['filter' => 'auth']);
//$routes->post('/userlogin/getdata', 'UserLogin::getdata',['filter' => 'auth']);

//create userdata
$routes->get('/userlogin/useradd/', 'UserLogin::useradd',['filter' => 'auth']);
$routes->post('/userlogin/useradd/p/', 'UserLogin::process',['filter' => 'auth']); 
//delete userdata
$routes->get('/userlogin/d/(:any)', 'UserLogin::deletedata/$1',['filter' => 'auth']);
//update userdata
$routes->get('/userlogin/(:any)', 'UserLogin::editdata/$1',['filter' => 'auth']);
$routes->post('/userlogin/u/(:any)', 'UserLogin::updatedata/$1',['filter' => 'auth']);


$routes->get('/logout', 'Home::logout');
 
 
$routes->get('/customers', 'Customers::index',['filter' => 'auth']);
//create customer
$routes->get('/customers/add', 'Customers::customeradd',['filter' => 'auth']);
$routes->post('/customers/p', 'Customers::process',['filter' => 'auth']);
//load data prov, kabu, kecamat, desa
$routes->get('/customers/add_ajax_kab/(:any)', 'Customers::add_ajax_kab/$1',['filter' => 'auth']);
$routes->get('/customers/add_ajax_kec/(:any)', 'Customers::add_ajax_kec/$1',['filter' => 'auth']);
$routes->get('/customers/add_ajax_desa/(:any)', 'Customers::add_ajax_desa/$1',['filter' => 'auth']); 
//delete customer
$routes->get('/customers/d/(:any)', 'Customers::deletedata/$1',['filter' => 'auth']); 
//edit customer
$routes->get('/customers/(:any)', 'Customers::customeredit/$1',['filter' => 'auth']); 
$routes->post('/customers/u/(:any)', 'Customers::customerprosess/$1',['filter' => 'auth']);

//jenis kayu
$routes->get('/jenis-kayu', 'Stock::jenis',['filter' => 'auth']);

//tipe kayu
$routes->get('/tipe-kayu', 'Stock::tipe',['filter' => 'auth']);

//ukuran kayu
$routes->get('/ukuran-kayu', 'Stock::ukuran',['filter' => 'auth']);

//persediaan kayu
$routes->get('/persediaan-kayu', 'Stock::persediaan',['filter' => 'auth']);


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
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
