<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

// ======================
// ROUTE UTAMA
// ======================
$routes->get('/', 'Home::index');


// ======================
// ROUTE HALAMAN STATIS
// ======================
$routes->get('about', 'Page::about');
$routes->get('contact', 'Page::contact');
$routes->get('faqs', 'Page::faqs');


// ======================
// ROUTE LOGIN & LOGOUT (USER)
// ======================
$routes->get('user/login', 'User::login');
$routes->post('user/login', 'User::login');
$routes->get('user/logout', 'User::logout');


// ======================
// ROUTE AJAX (MODUL 8)
// ======================
/**
 * Rute ini digunakan untuk fitur AJAX Modul 8.
 * Menangani pengambilan data secara asynchronous dan penghapusan data tanpa reload.
 */
$routes->get('ajax', 'AjaxController::index');       // Menampilkan View utama AJAX
$routes->get('ajax/getData', 'AjaxController::getData'); // Endpoint untuk mengambil data JSON
$routes->delete('ajax/delete/(:num)', 'AjaxController::delete/$1'); // Endpoint hapus data[cite: 1]


// ======================
// ROUTE ADMIN (DENGAN FILTER AUTH)
// ======================
$routes->group('admin', ['filter' => 'auth'], function($routes) {
    $routes->get('artikel', 'Artikel::admin_index');
    $routes->get('artikel/add', 'Artikel::add');
    $routes->post('artikel/add', 'Artikel::add');
    $routes->get('artikel/edit/(:num)', 'Artikel::edit/$1');
    $routes->post('artikel/edit/(:num)', 'Artikel::edit/$1');
    $routes->get('artikel/delete/(:num)', 'Artikel::delete/$1');
});


// ======================
// ROUTE ARTIKEL (PUBLIK)
// ======================
$routes->get('artikel', 'Artikel::index');
$routes->get('artikel/(:segment)', 'Artikel::view/$1');