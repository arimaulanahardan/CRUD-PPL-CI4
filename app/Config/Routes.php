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

$routes->get('/', 'c_auth::index');
$routes->post('/', 'c_auth::login');
$routes->get('info', "c_info::informasi", ['filter' => 'auth']);

$routes->get('home', 'c_home::home', ['filter' => 'auth']);
$routes->get('logout', 'c_auth::logout');

// #----> sebelum menggunakan resource
$routes->group('/' , ['filter' => 'auth'],  function ($routes) {
    $routes->get('mahasiswa', "c_mahasiswa::index");
    $routes->get('create', "c_mahasiswa::create");
    $routes->post('store', "c_mahasiswa::create");
    $routes->get('detail/(:num)', "c_mahasiswa::show/$1");
    $routes->get('edit/(:num)', "c_mahasiswa::edit/$1");
    $routes->post('update/(:num)', "c_mahasiswa::update/$1");
    $routes->delete('delete/(:num)', "c_mahasiswa::delete/$1");
});

// #----> setelah menggunakan resource (gunakan php spark routes pada terminal untuk melihat perbedaannya)
// $routes->resource('mahasiswa', ['filter' => 'auth'], ['controller' => 'c_mahasiswa']);


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