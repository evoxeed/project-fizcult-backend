<?php

use Illuminate\Support\Facades\Auth;
use App\Models\Specification;

/** @var \Laravel\Lumen\Routing\Router $router */
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



$router->get('/', function () use ($router) {
    return $router->app->version();
});


///Auth///
$router->post('api/login', 'AuthController@login');
$router->post('/api/registration', 'AuthController@registration');

///Attribute///
$router->post('/api/addAttribute', 'AttributeController@addAttribute');
$router->delete('/api/deleteAttribute', 'AttributeController@deleteAttribute');
$router->get('/api/getAttributes', 'AttributeController@getAttributes');
$router->get('/api/getAttribute', 'AttributeController@getAttribute');
$router->post('/api/setAttributeName', 'AttributeController@setAttributeName');

///User///
$router->get('/api/getAttributesData', 'UserController@getAttributesData');

$router->post('/api/addLevel', 'ProgramController@addLevel');
