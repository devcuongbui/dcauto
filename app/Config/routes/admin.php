<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

$routes->get('dashboard', 'Admin\AdminHomeController::index', ['as' => 'home.admin']);