<?php

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index');
Route::get('/', 'HomeController@index');

Route::get('/profile', 'UserController@profile');

Route::post('/profile','UserController@update_avatar');

Route::get('/editprofile', 'UserController@editprofile');

Route::post('/editprofile','UserController@update_datos');

Route::get('/carrito', 'UserController@carrito');

Route::post('/carrito', 'UserController@addCarrito');
