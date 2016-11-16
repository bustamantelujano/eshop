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


/*
Route::get('/',[
	'uses' => 'ProductosController@getIndex',
	'as' => 'producto.index'
	]);
*/
Route::get('/agregarCarrito/{id}',[
	'uses' => 'ProductosController@getAgregaCarrito',
	'as' => 'producto.agregaCarrito'
	]);

Route::get('/compra-carrito',[
	'uses' => 'ProductosController@getCarrito',
	'as' => 'producto.compraCarrito'
	]);

Route::get('/remove/{id}', [
    'uses' => 'ProductosController@getRemoveItem',
    'as' => 'product.remove'
]);


Route::get('/reduce/{id}', [
    'uses' => 'ProductosController@getReduceByOne',
    'as' => 'product.reduceByOne'
]);
