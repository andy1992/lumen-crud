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

//$router->group(['middleware' => 'auth', 'prefix' => 'v1'], function() use ($router) {
$router->group(['prefix' => 'v1', 'middleware' => ['cors']], function() use ($router) {

    // Products data CRUD
    $router->get('/products', 'ProductsController@index');
    $router->get('/products/paginate/{page}/{item_per_page}', 'ProductsController@paginate');
    $router->get('/products/{id}', 'ProductsController@show');
    $router->post('/products', 'ProductsController@store');
    $router->put('/products/{id}', 'ProductsController@update');
    $router->delete('/products/{id}', 'ProductsController@delete');
    $router->get('/products/count', 'ProductsController@count');
});

$router->group(['prefix' => 'v1'], function() use ($router){
    $router->post('/login', 'LoginController@index');
    $router->post('/register', 'UserController@register');
    $router->get('/user/{id}', ['middleware' => 'auth', 'uses' => 'UserController@getUser']);
});
