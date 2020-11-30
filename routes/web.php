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

use Laravel\Lumen\Routing\Router;

// login
$router->get('/login','AuthController@getLogin');
$router->post('/login','AuthController@postLogin');

// protected with Bearer Token Middleware
//$router->group(['middleware', 'bearerToken'], function () use ($router) {
//    // logout
//    $router->post('/logout','AuthController@postLogout');
//    // home page
//    $router->get('/', 'HomeController@index');
//
//});

$router->get('/', [
    'middleware' => 'bearerToken',
    'uses' => 'HomeController@index'
]);

$router->post('/', [
    'middleware' => 'bearerToken',
    'uses' => 'AuthController@postLogout'
]);
