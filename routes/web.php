<?php

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
    // return $router->app->version();
    return "aaaaaaaaaa";
});

// $router->post('authors', ['uses' => 'AuthorController@create']);

$router->post('login/','UserController@authenticate');

$router->group(['middleware' => 'auth'], function () use ($router) {

    $router->post('getUsers/','UserController@getUsers');
});


$router->post('auth', ['uses' => 'AuthController@createUser']);