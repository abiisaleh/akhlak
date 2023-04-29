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
$routes->setDefaultController('User');
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
$routes->get('/', 'user::index');
$routes->get('/ruko(:any)', 'user::ruko$1');
$routes->post('/daftar', 'user::daftar');

//admin
$routes->get('admin', 'admin\dashboard::index');

$routes->get('admin/data-master/kriteria', 'admin\datamaster\kriteria::index');
$routes->get('admin/data-master/kriteria/show', 'admin\datamaster\kriteria::show');
$routes->post('admin/data-master/kriteria/save', 'admin\datamaster\kriteria::save');
$routes->post('admin/data-master/kriteria/delete', 'admin\datamaster\kriteria::delete');
$routes->get('api/fkKriteria', 'admin\datamaster\kriteria::getData');

$routes->get('admin/data-master/subkriteria', 'admin\datamaster\subkriteria::index');
$routes->get('admin/data-master/subkriteria/show', 'admin\datamaster\subkriteria::show');
$routes->post('admin/data-master/subkriteria/save', 'admin\datamaster\subkriteria::save');
$routes->post('admin/data-master/subkriteria/delete', 'admin\datamaster\subkriteria::delete');

$routes->get('admin/ruko', 'admin\ruko::index');
$routes->get('admin/ruko/show', 'admin\ruko::show');
$routes->post('admin/ruko/save', 'admin\ruko::save');
$routes->post('admin/ruko/delete', 'admin\ruko::delete');


$routes->resource('admin/api/fasilitas',['controller' => 'admin\fasilitas']);

$routes->post('admin/api/fasilitas/save', 'admin\fasilitas::save');

$routes->get('admin/pesanan', 'admin\pesanan::index');
$routes->get('admin/pesanan/show', 'admin\pesanan::show');
$routes->post('admin/pesanan/save', 'admin\pesanan::save');
$routes->post('admin/pesanan/delete', 'admin\pesanan::delete');

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
