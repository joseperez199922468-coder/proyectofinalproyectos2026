<?php

use CodeIgniter\Router\RouteCollection;

/** @var RouteCollection $routes */
$routes->get('/', 'Home::index');
$routes->post('login', 'Home::login', ['filter' => 'csrf']);
$routes->get('prestamos', 'PrestamosController::index');
$routes->post('prestamos/crear', 'PrestamosController::crear', ['filter' => 'csrf']);
$routes->post('prestamos/actualizar/(:num)', 'PrestamosController::actualizar/$1', ['filter' => 'csrf']);
$routes->post('prestamos/eliminar/(:num)', 'PrestamosController::eliminar/$1', ['filter' => 'csrf']);