<?php

namespace Config;

$routes = Services::routes();

if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
};

// ========== AUTH ROUTES ==========
$routes->get('/', 'Auth::login');
$routes->get('/login', 'Auth::login');
$routes->post('/login', 'Auth::doLogin');
$routes->get('/register', 'Auth::register');
$routes->post('/register', 'Auth::doRegister');
$routes->get('/logout', 'Auth::logout');

// ========== DASHBOARD & CRUD ROUTES ==========
$routes->get('/dashboard', 'Product::dashboard');
$routes->get('/get-data', 'Product::getData');
$routes->post('/save', 'Product::save');
$routes->delete('/delete/(:num)', 'Product::delete/$1');
$routes->get('/chart-data', 'Product::getChartData');


if (file_exists(APPPATH . 'Config/Routes.php')) {
}