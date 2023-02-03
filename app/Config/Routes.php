<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (is_file(SYSTEMPATH . 'Config/Routes.php')) {
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
//$routes->get('/', 'Home::index');
$routes->get('/admin/dashboard', 'Admin\Dashboard::index');

$routes->get('email/send', 'Email::send');
$routes->post('email/send', 'Email::send');
$routes->post('whatsapp/send', 'Whatsapp::send');

$routes->group("admin", ["namespace" => "App\Controllers\Admin"], function ($routes) {
    $routes->resource('dashboard');
    $routes->resource('arsip-primer', ['controller' => 'ArsipPrimer'], ['except' => 'show, new, edit, delete']);
    $routes->resource('arsip-sekunder', ['controller' => 'ArsipSekunder']);
    $routes->resource('arsip-tersier', ['controller' => 'ArsipTersier']);
    $routes->resource('unit-kerja', ['controller' => 'UnitKerja']);
    $routes->resource('surat-masuk', ['controller' => 'SuratMasuk']);
    $routes->resource('surat-keluar', ['controller' => 'SuratKeluar']);

    $routes->get('disposisi/(:num)', 'Disposisi::index/$1');
    $routes->resource('disposisi', ['controller' => 'Disposisi']);

    $routes->resource('unit-kerja', ['controller' => 'UnitKerja']);
    $routes->resource('bidang', ['controller' => 'Bidang']);

    $routes->get('pengaturan', 'Pengaturan::index');
    $routes->post('pengaturan', 'Pengaturan::index');
    $routes->get('pengaturan/email', 'Pengaturan::email');
    $routes->post('pengaturan/email', 'Pengaturan::email');
    $routes->get('pengaturan/wa', 'Pengaturan::wa');
    $routes->post('pengaturan/wa', 'Pengaturan::wa');

    $routes->get('laporan/sm', 'Laporan::sm');
    $routes->post('laporan/sm', 'Laporan::sm');

    $routes->get('laporan/sk', 'Laporan::sk');
    $routes->post('laporan/sk', 'Laporan::sk');

    $routes->get('laporan/disposisi', 'Laporan::disposisi');
    $routes->post('laporan/disposisi', 'Laporan::disposisi');
});

$routes->group("pimpinan", ["namespace" => "App\Controllers\Pimpinan"], function ($routes) {
    $routes->resource('dashboard');
    $routes->resource('disposisi');
});

$routes->group("bid", ["namespace" => "App\Controllers\bid"], function ($routes) {
    $routes->resource('dashboard');
    $routes->resource('disposisi');
});

$routes->group("sekretaris", ["namespace" => "App\Controllers\Sekretaris"], function ($routes) {
    $routes->resource('dashboard');
    $routes->resource('surat-masuk', ['controller' => 'SuratMasuk']);
    $routes->resource('surat-keluar', ['controller' => 'SuratKeluar']);
    $routes->resource('disposisi');
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
