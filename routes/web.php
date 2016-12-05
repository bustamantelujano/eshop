<?php


Auth::routes();
//RUTAS PUBLICAS
Route::get('/home', 'HomeController@index');
Route::get('/', 'HomeController@index');
Route::get('producto/{clave}', 'ProductosController@detalleProducto');

Route::group(['middleware' => ['auth','web']], function () { // Aquí se ponen las rutas que solo pueden ser accesadas por usuarios registrados
  
	// Rutas de usuario REGISTRADO
	Route::get   ('/user', 'UserController@getperfilusuario');
	Route::post  ('/user', 'UserController@update_datos');
	Route::post('/user/delete', 'UserController@destroy');

	Route::get   ('/user/editar', 'UserController@editprofile');
	Route::post  ('/user/image','UserController@update_avatar');

	//Route::post('/editprofile','UserController@update_datos');

	Route::get   ('/carrito','CarritoController@getitems');
	Route::post  ('/carrito','CarritoController@additem');
	Route::post  ('/carrito/delete','CarritoController@deleteitem');
	Route::delete  ('/carrito','CarritoController@deleteitem');

	Route::post('/checkout','CarritoController@chechout');


});
	Route::get('/401','UserController@error401');

//	Route::get('/agregarCarrito/{id}',['uses' => 'ProductosController@getAgregaCarrito','as' => 'producto.agregaCarrito']);
//	Route::post('/deleteItem','UserController@deleteItemFromCarrito');



//RUTAS DE ADMINISTRADOR


Route::group(['middleware' => ['auth','admin']], function () { // Aquí se ponen las rutas que solo pueden ser accesadas por usuarios registrados
	Route::get ('/admin/dashboard', 'UserController@getAdminDashboard');

	return "this page requires that you be logged in and an Admin"; 
});





