<?php

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
    return "Sistema de Gestão Comercial";
});

$router->group(['prefix' => 'api'], function () use ($router) {

    $router->post('authentication', ['middleware' => ['cors'], 'uses' => 'Authentication@auth']);
    $router->get('message', ['middleware' => ['cors', 'auth'], 'uses' => 'Product@message']);

    $router->group(['prefix' => 'product'], function () use ($router) {
        $router->get('/', ['middleware' => ['cors', 'auth'], 'uses' => 'Product@getAll']);
        $router->get('/{id}', ['middleware' => ['cors', 'auth'], 'uses' => 'Product@getOne']);
        $router->post('/', ['middleware' => ['cors', 'auth'], 'uses' => 'Product@create']);
        $router->put('/{id}', ['middleware' => ['cors', 'auth'], 'uses' => 'Product@update']);
        $router->delete('/{id}', ['middleware' => ['cors', 'auth'], 'uses' => 'Product@delete']);
    });
    
    $router->group(['prefix' => 'sale'], function () use ($router) {
        $router->get('/', ['middleware' => ['cors', 'auth'], 'uses' => 'Sale@getAll']);
        $router->get('/{id}', ['middleware' => ['cors', 'auth'], 'uses' => 'Sale@getOne']);
        $router->post('/', ['middleware' => ['cors', 'auth'], 'uses' => 'Sale@create']);
        $router->put('/{id}', ['middleware' => ['cors', 'auth'], 'uses' => 'Sale@update']);
        $router->delete('/{id}', ['middleware' => ['cors', 'auth'], 'uses' => 'Sale@delete']);
        
        $router->group(['prefix' => 'item'], function () use ($router) {
            $router->post('/', ['middleware' => ['cors', 'auth'], 'uses' => 'Sale@createItem']);
            $router->get('/', ['middleware' => ['cors', 'auth'], 'uses' => 'Sale@getAllItem']);
            $router->put('/{id}', ['middleware' => ['cors', 'auth'], 'uses' => 'Sale@updateItem']);
            $router->delete('/{id}', ['middleware' => ['cors', 'auth'], 'uses' => 'Sale@deleteItem']);
        });
    });
});
