<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

$routes->get('/', 'Quiz::index');
$routes->get('/mhs', 'Mahasiswa::index');
$routes->get('/bayar', 'Makanan::index');
$routes->get('/bayar', 'Makanan::index');

$routes->setAutoRoute(true);