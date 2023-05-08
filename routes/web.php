<?php

/** @var Router $router */

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

use App\Http\Middleware\Authenticate;
use App\Http\Middleware\CorsMiddleware;
use Laravel\Lumen\Routing\Router;

$router->get('/', function () use ($router) {
    return $router->app->version();
});

$router->group(['middleware' => CorsMiddleware::class], static function (Router $router) {
    $router->group(['middleware' => Authenticate::class], static function (Router $router) {
        $router->get('test', 'TestController@test');
    });

    $router->post('login', 'SignInController@signIn');
    $router->post('registration', 'RegistrationController@register');
});
