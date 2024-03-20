<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('chanolja_mng/', 'Home::index');
$routes->get('(:segment)', 'Pages::view/$1');


