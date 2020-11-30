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
$router->get('/login',[
    'as' => 'login',
    'uses' => 'AuthController@getLogin'
]);

$router->post('/login','AuthController@postLogin');

// home
$router->get('/', [
    'middleware' => 'bearerToken',
    'as' => 'home',
    'uses' => 'HomeController@index'
]);

// logout
$router->post('/', [
    'middleware' => 'bearerToken',
    'uses' => 'AuthController@postLogout'
]);
