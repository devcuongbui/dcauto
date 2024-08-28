<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

$routes->get('dashboard', 'Admin\AdminHomeController::index', ['as' => 'home.admin']);
$routes->get('users-profile', 'Admin\AdminHomeController::users_profile', ['as' => 'home.users_profile']);
$routes->post('users-profile', 'Admin\AdminHomeController::users_profile_update', ['as' => 'home.users_profile_update']);

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
    $routes->delete('delete/(:any)', 'Admin\AdminOrdersController::delete/$1', ['as' => 'admin.orders.delete']);
});

$routes->group("contact", static function ($routes) {
    $routes->get('list', 'Admin\AdminContactController::list', ['as' => 'admin.contact.list']);
    $routes->get('detail/(:any)', 'Admin\AdminContactController::detail/$1', ['as' => 'admin.contact.detail']);
    $routes->delete('delete/(:any)', 'Admin\AdminContactController::delete/$1', ['as' => 'admin.contact.delete']);
});

$routes->group("comment", static function ($routes) {
    $routes->get('list', 'Admin\AdminReviewController::list', ['as' => 'admin.comment.list']);
    $routes->post('update', 'Admin\AdminReviewController::update', ['as' => 'admin.comment.update']);
    $routes->delete('delete/(:any)', 'Admin\AdminReviewController::delete/$1', ['as' => 'admin.comment.delete']);
});

$routes->group("products", static function ($routes) {
    $routes->get('list', 'Admin\AdminProductController::list', ['as' => 'admin.products.list']);
    $routes->get('create', 'Admin\AdminProductController::create', ['as' => 'admin.products.create']);
    $routes->get('detail/(:any)', 'Admin\AdminProductController::detail/$1', ['as' => 'admin.products.detail']);
    $routes->post('create', 'Admin\AdminProductController::store', ['as' => 'admin.products.store']);
    $routes->post('update/(:any)', 'Admin\AdminProductController::update/$1', ['as' => 'admin.products.update']);
    $routes->post('create-image/(:any)', 'Admin\AdminProductController::createImage/$1', ['as' => 'admin.products.gallery.create']);
    $routes->post('create-attribute/(:any)', 'Admin\AdminProductController::createAttribute/$1', ['as' => 'admin.products.properties.create']);
    $routes->post('update-image/(:any)', 'Admin\AdminProductController::updateImage/$1', ['as' => 'admin.products.gallery.update']);
    $routes->post('update-attribute/(:any)', 'Admin\AdminProductController::updateAttribute/$1', ['as' => 'admin.products.properties.update']);
    $routes->delete('delete/(:any)', 'Admin\AdminProductController::delete/$1', ['as' => 'admin.products.delete']);
    $routes->delete('delete-image/(:any)', 'Admin\AdminProductController::deleteImage/$1', ['as' => 'admin.products.gallery.delete']);
    $routes->delete('delete-attribute/(:any)', 'Admin\AdminProductController::deleteAttribute/$1', ['as' => 'admin.products.properties.delete']);
});
