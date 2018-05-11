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
$router->get('example/index','ExampleController@index');
$router->get('example/create','ExampleController@create');
$router->post('example/create','ExampleController@create');
$router->get('example/dingtalk','ExampleController@dingtalk');
