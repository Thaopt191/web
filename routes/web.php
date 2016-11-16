<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});



Route::get('/upload','dtbController@upload');

Route::get('/create','dtbController@create');

Route::get('/activation','dtbController@activation');

Route::post('/upload','dtbController@excelSend');

Route::post('/create','dtbController@store');

Route::get('/update','dtbController@update');

Route::post('/update','dtbController@edit');

Route::get('/signin', 'dtbController@signin');

Route::post('/signin', 'dtbController@checkSignin');

Route::get('/logout', 'dtbController@logout');




