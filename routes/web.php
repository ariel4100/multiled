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

//Route::get('/', function () {
//    return view('page.home');
//});

Auth::routes();

Route::get('/', 'FrontendController@home')->name('home');
Route::get('nosotros', 'FrontendController@empresa')->name('empresa');
Route::get('presupuesto', 'FrontendController@presupuesto')->name('presupuesto');
Route::get('contacto', 'FrontendController@contacto')->name('contacto');
//PRODUCTOS
Route::group(['prefix' => 'productos'],function (){
//    Route::get('/', 'FrontendController@familias')->name('familias');
    Route::get('familia/{slug}', 'FrontendController@familia')->name('familia');
    Route::get('subfamilia/{slug}', 'FrontendController@subfamilia')->name('subfamilia');
    Route::get('producto/{slug}', 'FrontendController@productos')->name('productos');
});

//NOVEDADES
Route::group(['prefix' => 'novedades'],function (){
    Route::get('/', 'Jolden\FrontendController@novedades')->name('novedades');
    Route::get('categoria/{slug}', 'Jolden\FrontendController@novedad')->name('categoria.novedad');
    Route::get('novedad/{slug}', 'Jolden\FrontendController@novedadshow')->name('novedad.show');
});


/***MAIL***/
Route::post('contacto','MailController@contacto')->name('contacto.mail');
Route::post('presupuesto-mail','MailController@presupuesto')->name('presupuesto.mail');
/****FIN MAIL****/
Route::get('buscador','FrontendController@buscador')->name('buscador');
Route::group([ 'prefix' => 'adm'],function (){
    // CONTENIDO
    Route::get('/', function(){
        return view('adm.content.index');
    })->name('adm.home');
    Route::group(['prefix' => 'contenido', 'as' => 'contenido'], function() {
        Route::get('{section}', ['uses' => 'Adm\ContentController@index', 'as' => '.index']);
        Route::get('{section}/create', ['uses' => 'Adm\ContentController@create', 'as' => '.create']);
        Route::post('/store', ['uses' => 'Adm\ContentController@store', 'as' => '.store']);
        Route::get('{section}/{contenido}/edit', ['uses' => 'Adm\ContentController@edit', 'as' => '.edit']);
        Route::put('{contenido}/update', ['uses' => 'Adm\ContentController@update', 'as' => '.update']);
        Route::get('/eliminar/lista/{section}/{contenido}', ['uses' => 'Adm\ContentController@delete', 'as' => '.delete']);
    });

    // SLIDERS
    Route::group(['prefix' => 'slider', 'as' => 'slider'], function() {
        Route::get('{seccion}/create', ['uses' => 'Adm\SliderController@create', 'as' => '.create']);
        Route::post('store', ['uses' => 'Adm\SliderController@store', 'as' => '.store']);
        Route::get('{seccion}/list', ['uses' => 'Adm\SliderController@list', 'as' => '.list']);
        Route::get('edit/{slider}', ['uses' => 'Adm\SliderController@edit', 'as' => '.edit']);
        Route::post('update/{slider}', ['uses' => 'Adm\SliderController@update', 'as' => '.update']);
        Route::get('destroy/{slider}', ['uses' => 'Adm\SliderController@destroy', 'as' => '.destroy']);
    });

    Route::resource('categoria','Adm\CategoryController');
    Route::resource('novedades','Adm\NewsController');

//    Route::get('carga-excel', 'Adm\ImportController@index')->name('carga.general');
    Route::post('carga-excel', 'Adm\ImportController@index')->name('carga.general');
    Route::get('ventas', 'Jolden\OrderController@ventas')->name('ventas');
    Route::post('ventas', 'Jolden\OrderController@store')->name('order.store');
});
