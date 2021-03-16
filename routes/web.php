<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

///// AUTH /////
Auth::routes(['register' => false]);
Route::get('/registro/email', 'UserController@emailVerify');

///// ADMIN /////
Route::get('/', 'AdminController@index')->name('home');

// Usuarios
Route::get('/usuarios', 'UserController@index')->name('usuarios.index');
Route::post('/usuarios', 'UserController@store')->name('usuarios.store');
Route::get('/usuarios/{slug}', 'UserController@show')->name('usuarios.show');
Route::get('/usuarios/{slug}/editar', 'UserController@edit')->name('usuarios.edit');
Route::put('/usuarios/{slug}', 'UserController@update')->name('usuarios.update');
Route::put('/usuarios/activar/{slug}', 'UserController@activate')->name('usuarios.activate');
Route::put('/usuarios/desactivar/{slug}', 'UserController@deactivate')->name('usuarios.deactivate');
Route::get('/perfil', 'UserController@profile')->name('usuarios.profile');
Route::get('/perfil/editar', 'UserController@profileEdit')->name('usuario.profile.edit');
Route::put('/perfil/{slug}', 'UserController@profileUpdate')->name('usuarios.profile.update');

//Clientes
Route::get('/clientes', 'CustomerController@index')->name('clientes.index');
Route::post('/clientes', 'CustomerController@store')->name('clientes.store');
Route::get('/clientes/{slug}', 'CustomerController@show')->name('clientes.show');
Route::get('/clientes/{slug}/editar', 'CustomerController@edit')->name('clientes.edit');
Route::put('/clientes/{slug}', 'CustomerController@update')->name('clientes.update');
Route::delete('/clientes/{slug}', 'CustomerController@destroy')->name('clientes.destroy');
Route::get('/clientes-desactivados', 'CustomerController@desactivar')->name('clientes.desactivar');
Route::put('/clientes/activar/{slug}', 'CustomerController@activate')->name('clientes.activate');
Route::put('/clientes/desactivar/{slug}', 'CustomerController@deactivate')->name('clientes.deactivate');

//Categorias

Route::get('/categorias', 'CategoryController@index')->name('categorias.index');
Route::post('/categorias', 'CategoryController@store')->name('categorias.store');
Route::get('/categorias/{slug}/editar', 'CategoryController@edit')->name('categorias.edit');
Route::put('/categorias/{slug}', 'CategoryController@update')->name('categorias.update');
Route::delete('/categorias/delete/{slug}', 'CategoryController@destroy')->name('categorias.delete');

//Productos
Route::get('/productos', 'ProductController@index')->name('productos.index');
Route::post('/productos', 'ProductController@store')->name('productos.store');
Route::get('/productos/{slug}', 'ProductController@show')->name('productos.show');
Route::get('/productos/{slug}/editar', 'ProductController@edit')->name('productos.edit');
Route::put('/productos/{slug}', 'ProductController@update')->name('productos.update');
Route::put('/productos/activar/{slug}', 'ProductController@activate')->name('productos.activate');
Route::put('/productos/desactivar/{slug}', 'ProductController@deactivate')->name('productos.deactivate');
Route::get('/productos-desactivados', 'ProductController@desactivar')->name('productos.desactivados');

//Proveedores
Route::get('/proveedores', 'ProviderController@index')->name('proveedores.index');
Route::post('/proveedores', 'ProviderController@store')->name('proveedores.store');
Route::get('/proveedores/{slug}', 'ProviderController@show')->name('proveedores.show');
Route::get('/proveedores/{slug}/editar', 'ProviderController@edit')->name('proveedores.edit');
Route::put('/proveedores/{slug}', 'ProviderController@update')->name('proveedores.update');
Route::put('/proveedores/activar/{slug}', 'ProviderController@activate')->name('proveedores.activate');
Route::put('/proveedores/desactivar/{slug}', 'ProviderController@deactivate')->name('proveedores.deactivate');
Route::get('/proveedores-desactivados', 'ProviderController@desactivar')->name('proveedores.desactivar');


//Ventas
// Route::get('/ventas', 'VentaController@index')->name('ventas.index');
// Route::get('/ventas/registrar', 'VentaController@create')->name('ventas.create');
// Route::post('/ventas', 'VentaController@store')->name('ventas.store');
// Route::get('/ventas/{slug}', 'SaleController@show')->name('ventas.show');
// Route::get('/ventas/{slug}/editar', 'SaleController@edit')->name('ventas.edit');
// Route::put('/ventas/{slug}', 'SaleController@update')->name('ventas.update');
Route::post('/ventas/agregar', 'SaleController@ajax')->name('ventas.ajax');
Route::get('/ventas/ticket/{codigo}','VentaController@ticket')->name('ventas.ticket');
Route::get('/ventas/factura/{codigo}','VentaController@factura')->name('ventas.factura');
Route::resource('/ventas','VentaController');

//Reportes
Route::get('/reportes','ReportesController@index')->name('reportes.index');
Route::post('/reportes/rango','ReportesController@rango_fecha')->name('reportes.ajax.rango');



