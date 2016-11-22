<?php


Auth::routes();

Route::get('/home', 'HomeController@index');
Route::get('/', 'HomeController@index');



Route::group(['middleware' => 'auth'], function () {
  
	// Aquí se ponen las rutas que solo pueden ser accesadas por usuarios registrados
	
	Route::get('/profile', 'UserController@profile');

	Route::post('/profile','UserController@update_avatar');

	Route::get('/editprofile', 'UserController@editprofile');

	Route::post('/editprofile','UserController@update_datos');

	Route::get('/carrito', 'UserController@getCarrito');

	Route::post('/carrito', 'UserController@addCarrito');

	Route::get('/detalle/{clave}','ProductosController@detalleProducto');

	Route::get('addToCart/{id}','UserController@addToCart');

Route::get('/agregarCarrito/{id}',['uses' => 'ProductosController@getAgregaCarrito','as' => 'producto.agregaCarrito']);

Route::get('/compra-carrito',['uses' => 'ProductosController@getCarrito','as' => 'producto.compraCarrito']);

Route::get('/remove/{id}', ['uses' => 'ProductosController@getRemoveItem','as' => 'producto.remove']);

Route::get('/reduce/{id}', ['uses' => 'ProductosController@getReduceByOne','as' => 'producto.reduceByOne']);

});


Route::get('/',[
	'uses' => 'HomeController@index',
	'as' => 'producto.index'
	]);



Route::get('/checkout', [
    'uses' => 'ProductosController@getCheckout',
    'as' => 'checkout',
    'middleware' => 'auth'
]);

Route::post('/checkout', [
    'uses' => 'ProductosController@postCheckout',
    'as' => 'checkout',
    'middleware' => 'auth'
]);

