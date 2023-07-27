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
$routes->get('rekomendasi', 'User::rekomendasi');
$routes->get('ruko(:any)', 'User::ruko$1');
$routes->post('daftar', 'User::daftar');
$routes->post('search', 'User::search');
$routes->post('filter', 'User::filter');
$routes->get('pembatalan/(:num)', 'User::pembatalan\$1');

$routes->post('sewa', 'Payment::sewa');
$routes->get('sewa/berhasil', 'Payment::berhasil');
$routes->get('sewa/gagal', 'Payment::gagal');

$routes->get('payment', 'Payment::index');
$routes->get('payout', 'Payment::payout');

//admin
$routes->group('admin', static function ($routes) {
    $routes->get('/', 'admin\Dashboard::index');

    $routes->group('data-master', static function ($routes) {
        $routes->get('kriteria', 'admin\datamaster\Kriteria::index');
        $routes->get('kriteria/show', 'admin\datamaster\Kriteria::show');
        $routes->post('kriteria/save', 'admin\datamaster\Kriteria::save');
        $routes->post('kriteria/delete', 'admin\datamaster\Kriteria::delete');

        $routes->get('subkriteria', 'admin\datamaster\Subkriteria::index');
        $routes->get('subkriteria/show', 'admin\datamaster\Subkriteria::show');
        $routes->post('subkriteria/save', 'admin\datamaster\Subkriteria::save');
        $routes->post('subkriteria/delete', 'admin\datamaster\Subkriteria::delete');
    });

    $routes->get('ruko', 'admin\Ruko::index');
    $routes->get('ruko/(:num)', 'admin\Ruko::create/$1', ['filter' => 'role:pemilik']);
    $routes->get('ruko/edit/(:num)', 'admin\Ruko::edit/$1');
    $routes->get('ruko/show', 'admin\Ruko::show');
    $routes->post('ruko/save', 'admin\Ruko::save');
    $routes->post('ruko/delete', 'admin\Ruko::delete');
    $routes->post('ruko/fasilitas', 'admin\Ruko::fasilitas');

    $routes->get('pesanan', 'admin\Pesanan::index');
    $routes->get('pesanan/show', 'admin\Pesanan::show');
    $routes->post('pesanan/save', 'admin\Pesanan::save');
    $routes->post('pesanan/delete', 'admin\Pesanan::delete');

    $routes->get('laporan', 'admin\Laporan::index');
    $routes->get('laporan/show', 'admin\Laporan::show');
});

$routes->get('api/fkKriteria', 'admin\datamaster\Kriteria::getData');

$routes->resource('admin/api/fasilitas', ['controller' => 'admin\Fasilitas']);
$routes->post('admin/api/fasilitas/save', 'admin\Fasilitas::save');

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
