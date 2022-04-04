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

$routes->get('/jenis-kayu/add', 'Stock::add_jenis_kayu',['filter' => 'auth']);
$routes->post('/jenis-kayu/add/p', 'Stock::process',['filter' => 'auth']);

$routes->get('/jenis-kayu/d/(:any)', 'Stock::deletedata/$1',['filter' => 'auth']); 

$routes->get('/jenis-kayu/(:any)', 'Stock::edit/$1',['filter' => 'auth']); 
$routes->post('/jenis-kayu/e/(:any)', 'Stock::editproses/$1',['filter' => 'auth']);
 

//tipe kayu
$routes->get('/tipe-kayu', 'Stock::tipe',['filter' => 'auth']);

$routes->get('/tipe-kayu/add', 'Stock::add_tipe_kayu',['filter' => 'auth']);
$routes->post('/tipe-kayu/add/p', 'Stock::tipe_process',['filter' => 'auth']);

$routes->get('/tipe-kayu/d/(:any)', 'Stock::tipe_deletedata/$1',['filter' => 'auth']); 

$routes->get('/tipe-kayu/(:any)', 'Stock::tipe_edit/$1',['filter' => 'auth']); 
$routes->post('/tipe-kayu/e/(:any)', 'Stock::tipe_editproses/$1',['filter' => 'auth']);
 



//ukuran kayu
$routes->get('/ukuran-kayu', 'Stock::ukuran',['filter' => 'auth']);

$routes->get('/ukuran-kayu/g-tipe-kayu/(:any)', 'Stock::add_ajax_tkayu/$1',['filter' => 'auth']);

$routes->get('/ukuran-kayu/add', 'Stock::add_ukuran_kayu',['filter' => 'auth']);
$routes->post('/ukuran-kayu/add/p', 'Stock::ukuran_process',['filter' => 'auth']);

$routes->get('/ukuran-kayu/d/(:any)', 'Stock::ukuran_deletedata/$1',['filter' => 'auth']); 

$routes->get('/ukuran-kayu/(:any)', 'Stock::ukuran_edit/$1',['filter' => 'auth']); 
$routes->post('/ukuran-kayu/e/(:any)', 'Stock::ukuran_editproses/$1',['filter' => 'auth']);
 

//harga kayu
 
$routes->get('/harga-kayu', 'Stock::harga',['filter' => 'auth']); 


$routes->get('/harga-kayu/g-tipe-kayu/(:any)', 'Stock::add_ajax_tkayu/$1',['filter' => 'auth']);
$routes->get('/harga-kayu/g-ukuran-kayu/(:any)', 'Stock::add_ajax_ukayu/$1',['filter' => 'auth']); 


$routes->get('/harga-kayu/add', 'Stock::add_harga_kayu',['filter' => 'auth']);
$routes->post('/harga-kayu/add/p', 'Stock::harga_process',['filter' => 'auth']);

$routes->get('/harga-kayu/d/(:any)', 'Stock::harga_deletedata/$1',['filter' => 'auth']); 


$routes->get('/harga-kayu/(:any)', 'Stock::harga_edit/$1',['filter' => 'auth']); 
$routes->post('/harga-kayu/e/(:any)', 'Stock::harga_editproses/$1',['filter' => 'auth']);

 

//persediaan kayu
$routes->get('/persediaan-kayu', 'Stock::persediaan',['filter' => 'auth']);

$routes->get('/persediaan-kayu/add', 'Stock::add_persediaan_kayu',['filter' => 'auth']);
$routes->post('/persediaan-kayu/add/p', 'Stock::persediaan_process',['filter' => 'auth']);

$routes->get('/persediaan-kayu/g-tipe-kayu/(:any)', 'Stock::add_ajax_tkayu/$1',['filter' => 'auth']);
$routes->get('/persediaan-kayu/g-ukuran-kayu/(:any)', 'Stock::add_ajax_ukayu/$1',['filter' => 'auth']);
$routes->get('/persediaan-kayu/g-harga-kayu/(:any)', 'Stock::add_ajax_hargakayu/$1',['filter' => 'auth']);

$routes->get('/persediaan-kayu/d/(:any)', 'Stock::persediaan_deletedata/$1',['filter' => 'auth']); 

$routes->get('/persediaan-kayu/(:any)', 'Stock::persediaan_edit/$1',['filter' => 'auth']); 
$routes->post('/persediaan-kayu/e/(:any)', 'Stock::persediaan_editproses/$1',['filter' => 'auth']);
 








//transaksi 
$routes->get('/transaksi', 'Transaksi::index',['filter' => 'auth']);

$routes->get('/transaksi/add', 'Transaksi::add_transaksi',['filter' => 'auth']); 
$routes->post('/transaksi/add/p', 'Transaksi::transaksi_process',['filter' => 'auth']);


$routes->get('/transaksi/g-tipe-kayu/(:any)', 'Transaksi::add_ajax_tkayu/$1',['filter' => 'auth']);
$routes->get('/transaksi/g-ukuran-kayu/(:any)', 'Transaksi::add_ajax_ukayu/$1',['filter' => 'auth']);
$routes->get('/transaksi/g-jmlp-kayu/(:any)', 'Transaksi::add_ajax_jmlp/$1',['filter' => 'auth']);
$routes->get('/transaksi/g-persediaan-kayu/(:any)', 'Transaksi::add_ajax_persediaan/$1',['filter' => 'auth']);
$routes->get('/transaksi/g-gharga-kayu/(:any)', 'Transaksi::add_ajax_gharga/$1',['filter' => 'auth']);


$routes->get('/transaksi/d/(:any)', 'Transaksi::transaksi_deletedata/$1',['filter' => 'auth']); 

$routes->get('/transaksi/view/(:any)', 'Transaksi::cetak_transaksi/$1',['filter' => 'auth']);





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
