<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
	require SYSTEMPATH . 'Config/Routes.php';
}

/**
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('AuthController');
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
//Auth
$routes->get('/', 'AuthController::index');
$routes->get('login', 'AuthController::login');

//Dashboard
$routes->get('dashboard', 'DashboardController::index');

//Cekin
$routes->get('cekin', 'CekinController::index');
$routes->get('cekin', 'CekinController::create');
$routes->get('cekin/detail/(:segment)', 'CekinController::detail/$1');
$routes->get('cekin/print/(:segment)', 'CekinController::htmlToPDF/$1');
// $routes->get('cekin/vpdf/(:segment)', 'CekinController::vpdf/$1');
$routes->delete('cekin', 'CekinController::delete');

//Cekout
$routes->get('cekout', 'CekoutController::index');
$routes->get('cekout', 'CekoutController::scanner');

//Guru
$routes->get('guru', 'GuruController::index');
$routes->get('guru', 'GuruController::create');
$routes->get('guru', 'GuruController::update');
$routes->delete('guru', 'GuruController::delete');

//Bagian
$routes->get('bagian', 'BagianController::index');
$routes->post('bagian', 'BagianController::create');
$routes->put('bagian', 'BagianController::update');
$routes->delete('bagian', 'BagianController::delete');

//Instansi
$routes->get('instansi', 'InstansiController::index');
$routes->post('instansi', 'InstansiController::create');
$routes->put('instansi', 'InstansiController::update');
$routes->delete('instansi', 'InstansiController::delete');

//Keperluan
$routes->get('keperluan', 'KeperluanController::index');
$routes->post('keperluan', 'KeperluanController::create');
$routes->put('keperluan', 'KeperluanController::update');
$routes->delete('keperluan', 'KeperluanController::delete');

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
