<?php

use CodeIgniter\Router\RouteCollection;

/** @var RouteCollection $routes */
$routes->get('/', 'home::index');
$routes->get('prestamos', 'DetallePrestamosController::index');
$routes->post('agregar_prestamos', 'DetallePrestamosController::insertar');
$routes->get('eliminar_prestamos/(:num)', 'DetallePrestamosController::eliminar/$1');
$routes->get('buscar_prestamos/(:num)', 'DetallePrestamosController::buscar/$1');
$routes->post('modificar_detallePrestamos', 'DetallePrestamosController::modificar');