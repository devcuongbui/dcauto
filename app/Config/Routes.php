<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index', ['as' => 'home']);

$routes->set404Override(function () {
    echo view('errors/404');
});


$routes->group("auth", static function ($routes) {
    $routes->get('login', 'AuthController::login', ['as' => 'auth.login']);
    $routes->get('register', 'AuthController::register', ['as' => 'auth.register']);
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
