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
//$routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Home::index');
$routes->get('/productos', 'productos::index');
$routes->get('/unidades', 'Unidades::index');
$routes->get('/unidades/nuevo', 'Unidades::nuevo');
$routes->post('/unidades/insertar', 'Unidades::insertar');
$routes->get('/unidades/editar/(:num)', 'Unidades::editar/$1');
$routes->post('/unidades/actualizar', 'Unidades::actualizar');
$routes->get('/unidades/eliminar/(:num)', 'Unidades::eliminar/$1');
$routes->get('/unidades/eliminados', 'Unidades::eliminados');
$routes->get('/unidades/reingresar/(:num)', 'Unidades::reingresar/$1');
//Categorias
$routes->get('/categorias', 'Categorias::index');
$routes->get('/categorias/nuevo', 'categorias::nuevo');
$routes->post('/categorias/insertar', 'categorias::insertar');
$routes->get('/categorias/editar/(:num)', 'categorias::editar/$1');
$routes->post('/categorias/actualizar', 'categorias::actualizar');
$routes->get('/categorias/eliminar/(:num)', 'categorias::eliminar/$1');
$routes->get('/categorias/eliminados', 'categorias::eliminados');
$routes->get('/categorias/reingresar/(:num)', 'categorias::reingresar/$1');
//Productos
$routes->get('/productos', 'productos::index');
$routes->get('/productos/nuevo', 'productos::nuevo');
$routes->post('/productos/insertar', 'productos::insertar');
$routes->get('/productos/editar/(:num)', 'Productos::editar/$1');
$routes->post('/productos/actualizar', 'productos::actualizar');
$routes->get('/productos/eliminar/(:num)', 'productos::eliminar/$1');
$routes->get('/productos/eliminados', 'productos::eliminados');
$routes->get('/productos/reingresar/(:num)', 'productos::reingresar/$1');
//clientes
$routes->get('/clientes', 'clientes::index');
$routes->get('/clientes/nuevo', 'clientes::nuevo');
$routes->post('/clientes/insertar', 'clientes::insertar');
$routes->get('/clientes/editar/(:num)', 'Clientes::editar/$1');
$routes->post('/clientes/actualizar', 'clientes::actualizar');
$routes->get('/clientes/eliminar/(:num)', 'clientes::eliminar/$1');
$routes->get('/clientes/eliminados', 'clientes::eliminados');
$routes->get('/clientes/reingresar/(:num)', 'clientes::reingresar/$1');
//configuracion
$routes->get('/configuracion', 'configuracion::index');
$routes->post('/configuracion/actualizar', 'configuracion::actualizar');


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
