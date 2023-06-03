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
$routes->get('/', 'User::index');
$routes->get('/ruko(:any)', 'User::ruko$1');
$routes->post('/daftar', 'User::daftar');

//admin
$routes->get('admin', 'admin\Dashboard::index');

$routes->get('admin/data-master/kriteria', 'admin\datamaster\Kriteria::index');
$routes->get('admin/data-master/kriteria/show', 'admin\datamaster\Kriteria::show');
$routes->post('admin/data-master/kriteria/save', 'admin\datamaster\Kriteria::save');
$routes->post('admin/data-master/kriteria/delete', 'admin\datamaster\Kriteria::delete');
$routes->get('api/fkKriteria', 'admin\datamaster\Kriteria::getData');

$routes->get('admin/data-master/subkriteria', 'admin\datamaster\Subkriteria::index');
$routes->get('admin/data-master/subkriteria/show', 'admin\datamaster\Subkriteria::show');
$routes->post('admin/data-master/subkriteria/save', 'admin\datamaster\Subkriteria::save');
$routes->post('admin/data-master/subkriteria/delete', 'admin\datamaster\Subkriteria::delete');

$routes->get('admin/ruko', 'admin\Ruko::index');
$routes->get('admin/ruko(:num)', 'admin\Ruko::create$1');
$routes->get('admin/ruko/show', 'admin\Ruko::show');
$routes->post('admin/ruko/save', 'admin\Ruko::save');
$routes->post('admin/ruko/delete', 'admin\Ruko::delete');

$routes->get('admin/laporan', 'admin\Laporan::index');
$routes->get('admin/laporan/show', 'admin\Laporan::show');


$routes->resource('admin/api/fasilitas', ['controller' => 'admin\Fasilitas']);

$routes->post('admin/api/fasilitas/save', 'admin\Fasilitas::save');

$routes->get('admin/pesanan', 'admin\Pesanan::index');
$routes->get('admin/pesanan/show', 'admin\Pesanan::show');
$routes->post('admin/pesanan/save', 'admin\Pesanan::save');
$routes->post('admin/pesanan/delete', 'admin\Pesanan::delete');

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
