<?php

use CodeIgniter\Router\RouteCollection;

/** @var RouteCollection $routes */
$routes->get('/', 'Home::index');

/*usuarios*/
$routes->get('usuarios','UsuariosController::index');
$routes->post('agregar_usuario','UsuariosController::guardar');
$routes->get('eliminar_usuario/(:num)', 'UsuariosController::eliminar/$1');
$routes->get('editar_usuario/(:num)', 'UsuariosController::editar/$1');
$routes->post('actualizar_usuario', 'UsuariosController::actualizar');
/* Inicio */
$routes->get('inicio','InicioController::index');

/* Validación del usuario */
$routes->post('validar_login', 'InicioController::validar_login');

$routes->post('cerrar_sesion', 'InicioController::cerrar_sesion');