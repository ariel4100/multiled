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
Route::get('productos-data', 'Adm\ProductController@data')->name('product.data');
Route::post('productos-store', 'Adm\ProductController@store')->name('product.store');
Route::post('productos-update', 'Adm\ProductController@update')->name('product.update');
Route::post('productos-destroy', 'Adm\ProductController@destroy')->name('product.destroy');
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
//LISTADEPRECIO
Route::get('precio-data', 'Adm\PriceController@data')->name('price.data');
Route::post('precio-store', 'Adm\PriceController@store')->name('price.store');
Route::post('precio-update', 'Adm\PriceController@update')->name('price.update');
Route::post('precio-destroy', 'Adm\PriceController@destroy')->name('price.destroy');
//DESCUENTO
Route::get('descuento-data', 'Adm\DiscountController@data')->name('discount.data');
Route::post('descuento-store', 'Adm\DiscountController@store')->name('discount.store');
Route::post('descuento-update', 'Adm\DiscountController@update')->name('discount.update');
Route::post('descuento-destroy', 'Adm\DiscountController@destroy')->name('discount.destroy');
//BONIFICACION
Route::get('bonificacion-data', 'Adm\BonusController@data')->name('bonus.data');
Route::post('bonificacion-store', 'Adm\BonusController@store')->name('bonus.store');
Route::post('bonificacion-update', 'Adm\BonusController@update')->name('bonus.update');
Route::post('bonificacion-destroy', 'Adm\BonusController@destroy')->name('bonus.destroy');
//USUARIOS
Route::get('usuarios-data', 'Adm\UserController@data')->name('user.data');
Route::post('usuarios-store', 'Adm\UserController@store')->name('user.store');
Route::post('usuarios-update', 'Adm\UserController@update')->name('user.update');
Route::post('usuarios-destroy', 'Adm\UserController@destroy')->name('user.destroy');

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
