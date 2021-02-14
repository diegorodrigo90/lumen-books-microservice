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

$router->get('/books', 'BookController@index');
$router->get('/books/{bookId}', 'BooKController@show');
$router->post('/books', 'BooKController@store');
$router->put('/books/{bookId}', 'BooKController@update');
$router->patch('/books/{bookId}', 'BooKController@update');
$router->delete('/books/{bookId}', 'BooKController@destroy');
