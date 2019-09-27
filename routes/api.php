<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('content-data/{section}', 'Adm\ContentController@data')->name('content.data');
Route::post('content-update/{id}', 'Adm\ContentController@update')->name('content.update');

//PROYECTOS
Route::get('proyectos-data', 'Adm\ProjectController@data')->name('project.data');
Route::post('proyectos-store', 'Adm\ProjectController@store')->name('project.store');
Route::post('proyectos-update', 'Adm\ProjectController@update')->name('project.update');
Route::post('proyectos-destroy', 'Adm\ProjectController@destroy')->name('project.destroy');
//CATEGORIAS
Route::get('categorias-data', 'Adm\CategoryController@data')->name('category.data');
Route::post('categorias-store', 'Adm\CategoryController@store')->name('category.store');
Route::post('categorias-update', 'Adm\CategoryController@update')->name('category.update');
Route::post('categorias-destroy', 'Adm\CategoryController@destroy')->name('category.destroy');
//NOVEDADES
Route::get('novedades-data', 'Adm\NewsController@data')->name('news.data');
Route::post('novedades-store', 'Adm\NewsController@store')->name('news.store');
Route::post('novedades-update', 'Adm\NewsController@update')->name('news.update');
Route::post('novedades-destroy', 'Adm\NewsController@destroy')->name('news.destroy');
//MARCA
Route::get('marca-data', 'Adm\BrandController@data')->name('brand.data');
Route::post('marca-store', 'Adm\BrandController@store')->name('brand.store');
Route::post('marca-update', 'Adm\BrandController@update')->name('brand.update');
Route::post('marca-destroy', 'Adm\BrandController@destroy')->name('brand.destroy');
//FAMILIAS
Route::get('familias-data', 'Adm\FamilyController@data')->name('family.data');
Route::post('familias-store', 'Adm\FamilyController@store')->name('family.store');
Route::post('familias-update', 'Adm\FamilyController@update')->name('family.update');
Route::post('familias-destroy', 'Adm\FamilyController@destroy')->name('family.destroy');
//SUBFAMILIAS
Route::get('subfamilias-data', 'Adm\SubfamilyController@data')->name('subfamily.data');
Route::post('subfamilias-store', 'Adm\SubfamilyController@store')->name('subfamily.store');
Route::post('subfamilias-update', 'Adm\SubfamilyController@update')->name('subfamily.update');
Route::post('subfamilias-destroy', 'Adm\SubfamilyController@destroy')->name('subfamily.destroy');
//PRODUCTOS
Route::get('iluminacion-data/{section}', 'Adm\ProductController@data')->name('product.data');
Route::post('iluminacion-store', 'Adm\ProductController@store')->name('product.store');
Route::post('iluminacion-update', 'Adm\ProductController@update')->name('product.update');
Route::post('iluminacion-destroy', 'Adm\ProductController@destroy')->name('product.destroy');
//DESCARGAS
Route::get('descargas-data/{section}', 'Adm\DownloadController@data')->name('download.data');
Route::post('descargas-store', 'Adm\DownloadController@store')->name('download.store');
Route::post('descargas-update', 'Adm\DownloadController@update')->name('download.update');
Route::post('descargas-destroy', 'Adm\DownloadController@destroy')->name('download.destroy');
//CLIENTES
Route::get('clientes-data', 'Adm\ClientController@data')->name('client.data');
Route::post('clientes-store', 'Adm\ClientController@store')->name('client.store');
Route::post('clientes-update', 'Adm\ClientController@update')->name('client.update');
Route::post('clientes-destroy', 'Adm\ClientController@destroy')->name('client.destroy');
//VENDEDOR
Route::get('vendedor-data', 'Adm\SellerController@data')->name('seller.data');
Route::post('vendedor-store', 'Adm\SellerController@store')->name('seller.store');
Route::post('vendedor-update', 'Adm\SellerController@update')->name('seller.update');
Route::post('vendedor-destroy', 'Adm\SellerController@destroy')->name('seller.destroy');

//SERVICIOS
Route::get('servicios-data', 'Adm\ServiceController@data')->name('service.data');
Route::post('servicios-store', 'Adm\ServiceController@store')->name('service.store');
Route::post('servicios-update', 'Adm\ServiceController@update')->name('service.update');
Route::post('servicios-destroy', 'Adm\ServiceController@destroy')->name('service.destroy');
//USUARIOS
Route::get('usuarios-data', 'Adm\UserController@data')->name('user.data');
Route::post('usuarios-store', 'Adm\UserController@store')->name('user.store');
Route::post('usuarios-update', 'Adm\UserController@update')->name('user.update');
Route::post('usuarios-destroy', 'Adm\UserController@destroy')->name('user.destroy');

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
