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
    $routes->group("category", static function ($routes) {
        $routes->get('list', 'CategoryController::list', ['as' => 'admin.category.list']);
        $routes->post('write', 'CartController::write', ['as' => 'admin.category.write']);
    });

});

$routes->group("contact", static function ($routes) {
    $routes->get('index', 'ContactController::index',['as' => 'contact.index']);
    $routes->post('save', 'ContactController::save',['as' => 'contact.save']);
});


$routes->group("cart", static function ($routes) {
    $routes->get('list', 'CartController::list', ['as' => 'cart.list']);
    $routes->post('add', 'CartController::add', ['as' => 'cart.add']);
    $routes->post('remove', 'CartController::remove', ['as' => 'cart.remove']);
    $routes->post('update', 'CartController::update', ['as' => 'cart.update']);
    $routes->post('select', 'CartController::select', ['as' => 'cart.select']);
    $routes->post('select_all', 'CartController::selectAll', ['as' => 'cart.select_all']);
    $routes->post('submit', 'CartController::submit', ['as' => 'cart.submit']);
    $routes->get('payment', 'CartController::payment', ['as' => 'cart.payment']);
});

$routes->group("orders", static function ($routes) {
    $routes->post('add', 'OrdersController::add', ['as' => 'orders.add']);
    $routes->get('(:segment)', 'OrdersController::preview/$1', ['as' => 'orders.preview']);
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
