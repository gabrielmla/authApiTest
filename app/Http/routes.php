<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::post('/auth/login/', ['as' => 'api.user.authenticate', 'uses' => 'UserController@authenticate']);

Route::post('/auth/register', ['as' => 'api.user.register', 'uses' => 'UserController@store']);
