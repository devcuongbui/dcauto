<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

$routes->get('dashboard', 'Admin\AdminHomeController::index', ['as' => 'home.admin']);

$routes->group("news", static function ($routes) {
    $routes->get('list', 'Admin\AdminNewsController::list', ['as' => 'admin.news.list']);
    $routes->get('create', 'Admin\AdminNewsController::create', ['as' => 'admin.news.create']);
    $routes->get('detail/(:any)', 'Admin\AdminNewsController::detail/$1', ['as' => 'admin.news.detail']);
    $routes->post('create', 'Admin\AdminNewsController::handleCreate', ['as' => 'admin.news.handleCreate']);
    $routes->put('update/(:any)', 'Admin\AdminNewsController::update/$1', ['as' => 'admin.news.update']);
    $routes->delete('delete/(:any)', 'Admin\AdminNewsController::delete/$1', ['as' => 'admin.news.delete']);
});

$routes->group("contact", static function ($routes) {
    $routes->get('list', 'Admin\AdminContactController::list', ['as' => 'admin.contact.list']);
});

