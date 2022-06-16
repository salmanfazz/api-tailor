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
    return $router->app->version();
});

Route::group(['prefix' => 'api'], function ($router) {
    //Auth
    Route::post('/register', 'AuthController@register');
    Route::post('/login', 'AuthController@login');
    Route::post('/logout', 'AuthController@logout');
    Route::post('/refresh', 'AuthController@refresh');
    Route::post('/profile', 'AuthController@me');

    //Pesanan
    Route::get('/pesanan', 'PesananController@index');
    Route::get('/pesanan/{id_pesanans}', 'PesananController@show');
    Route::post('/pesanan/create', 'PesananController@store');
    Route::put('/pesanan/update/{id_pesanans}', 'PesananController@update');
    Route::delete('/pesanan/delete/{id_pesanans}', 'PesananController@destroy');
});
