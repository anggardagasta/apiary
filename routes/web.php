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
    return $router->app->version();
});

$router->group(['prefix' => 'auth'], function () use ($router) {
    $router->post('login', 'AuthenticationController@login');
    $router->post('signup', 'AuthenticationController@signup');
});

$router->group(['prefix' => 'v1'], function () use ($router) {
    $router->post('products', 'ProductController@create');
    $router->get('products', 'ProductController@get');
    $router->get('products/{id}', 'ProductController@getById');
    $router->put('products/{id}', 'ProductController@update');
    $router->delete('products/{id}', 'ProductController@delete');
});

$router->group(['prefix' => 'v2'], function () use ($router) {
    $router->get('products', 'ProductController@getV2');
});
