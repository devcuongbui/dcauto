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
    $routes->post('update/(:any)', 'Admin\AdminNewsController::update/$1', ['as' => 'admin.news.update']);
    $routes->delete('delete/(:any)', 'Admin\AdminNewsController::delete/$1', ['as' => 'admin.news.delete']);
});

$routes->group("orders", static function ($routes) {
    $routes->get('list', 'Admin\AdminOrdersController::list', ['as' => 'admin.orders.list']);
    $routes->get('detail/(:any)', 'Admin\AdminOrdersController::detail/$1', ['as' => 'admin.orders.detail']);
    $routes->put('update/(:any)', 'Admin\AdminOrdersController::update/$1', ['as' => 'admin.orders.update']);
    $routes->delete('delete/(:any)', 'Admin\AdminOrdersController::delete/$1', ['as' => 'admin.orders.delete']);
});

$routes->group("contact", static function ($routes) {
    $routes->get('list', 'Admin\AdminContactController::list', ['as' => 'admin.contact.list']);
    $routes->get('detail/(:any)', 'Admin\AdminContactController::detail/$1', ['as' => 'admin.contact.detail']);
    $routes->delete('delete/(:any)', 'Admin\AdminContactController::delete/$1', ['as' => 'admin.contact.delete']);
});

$routes->group("products", static function ($routes) {
    $routes->get('list', 'Admin\AdminProductController::list', ['as' => 'admin.products.list']);
    $routes->get('create', 'Admin\AdminProductController::create', ['as' => 'admin.products.create']);
    $routes->get('detail/(:any)', 'Admin\AdminProductController::detail/$1', ['as' => 'admin.products.detail']);
    $routes->post('create', 'Admin\AdminProductController::store', ['as' => 'admin.products.store']);
    $routes->post('update/(:any)', 'Admin\AdminProductController::update/$1', ['as' => 'admin.products.update']);
    $routes->delete('delete/(:any)', 'Admin\AdminProductController::delete/$1', ['as' => 'admin.products.delete']);
});
