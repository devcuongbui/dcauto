<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index', ['as' => 'home']);

$routes->set404Override(function () {
    echo view('errors/404');
});


$routes->group("admin", static function ($routes) {
    $routes->get('login', 'AuthController::login', ['as' => 'auth.login']);
    $routes->post('login', 'AuthController::handleLogin', ['as' => 'auth.handle.login']);
    $routes->get('logout', 'AuthController::logout', ['as' => 'auth.logout']);
});

$routes->group("cart", static function ($routes) {
    $routes->get('list', 'CartController::list', ['as' => 'cart.list']);
    $routes->post('add', 'CartController::add', ['as' => 'cart.add']);
    $routes->post('remove', 'CartController::remove', ['as' => 'cart.remove']);
    $routes->post('update', 'CartController::update', ['as' => 'cart.update']);
    $routes->get('checkout', 'CartController::checkout', ['as' => 'cart.checkout']);
});

//$routes->group("admin", static function ($routes) {
//    $routes->get('dashboard', 'Admin\AdminHomeController::index', ['as' => 'home.admin']);
//});

$routes->group("errors", static function ($routes) {
    $routes->get('not-found', 'ErrorController::pageNotFound', ['as' => 'page.notfound']);
    $routes->get('forbidden', 'ErrorController::forbidden', ['as' => 'page.forbidden']);
    $routes->get('unauthorized', 'ErrorController::unauthorized', ['as' => 'page.unauthorized']);
});

$routes->group('', ['filter' => 'auth'], function ($routes) {
    require_once __DIR__ . '/routes/auth.php';
});

$routes->group('admin', ['filter' => 'admin'], function ($routes) {
    require_once __DIR__ . '/routes/admin.php';
});
