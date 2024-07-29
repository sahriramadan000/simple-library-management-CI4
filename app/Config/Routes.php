<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'AnggotaController::index');

$routes->get('/peminjaman-buku', 'PeminjamanBukuController::index');
$routes->get('/peminjaman-buku/create', 'PeminjamanBukuController::create');
$routes->post('/peminjaman-buku/store', 'PeminjamanBukuController::store');
$routes->post('/peminjaman-buku/delete/(:num)', 'PeminjamanBukuController::delete/$1');

// Routes untuk Anggota
$routes->get('/anggota', 'AnggotaController::index');
$routes->get('/anggota/create', 'AnggotaController::create');
$routes->post('/anggota/store', 'AnggotaController::store');
$routes->get('/anggota/edit/(:num)', 'AnggotaController::edit/$1');
$routes->post('/anggota/update/(:num)', 'AnggotaController::update/$1');
$routes->post('/anggota/delete/(:num)', 'AnggotaController::delete/$1');

// Routes untuk Buku
$routes->get('/buku', 'BukuController::index');
$routes->get('/buku/create', 'BukuController::create');
$routes->post('/buku/store', 'BukuController::store');
$routes->get('/buku/edit/(:num)', 'BukuController::edit/$1');
$routes->post('/buku/update/(:num)', 'BukuController::update/$1');
$routes->post('/buku/delete/(:num)', 'BukuController::delete/$1');
