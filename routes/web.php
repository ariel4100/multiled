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
Route::get('proyectos', 'FrontendController@proyectos')->name('proyectos');
Route::get('proyectos/{slug}', 'FrontendController@proyecto_show')->name('proyectos.show');

//NEWSLETTER
Route::get('newsletter','NewsletterController@index')->name('newsletter.index');
Route::post('enviar-newsletter','NewsletterController@store')->name('newsletter.store');

//ILUMINACION
Route::group(['prefix' => 'iluminación'],function (){
    Route::get('/', 'FrontendController@iluminacion')->name('f.iluminacion');
    Route::get('/{slug}', 'FrontendController@productos_iluminacion')->name('p.iluminacion');
    Route::get('/{category}/{slug}', 'FrontendController@productos_iluminacion_show')->name('p.iluminacion.show');
//    Route::get('producto/{slug}', 'FrontendController@iluminacion')->name('iluminacion');
});

//VIAL
Route::group(['prefix' => 'vial'],function (){
//    Route::get('/', 'FrontendController@familias')->name('familias');
    Route::get('/', 'FrontendController@productos_vial')->name('p.vial');
    Route::get('/{slug}', 'FrontendController@vial')->name('p.vial.show');
//    Route::get('producto/{slug}', 'FrontendController@iluminacion')->name('iluminacion');
});

//PUBLICIDAD
Route::group(['prefix' => 'publicidad'],function (){
//    Route::get('/', 'FrontendController@familias')->name('familias');
    Route::get('/', 'FrontendController@productos_publicidad')->name('p.publicidad');
    Route::get('/{slug}', 'FrontendController@publicidad')->name('p.publicidad.show');
//    Route::get('producto/{slug}', 'FrontendController@iluminacion')->name('iluminacion');
});

//SEÑALIZACION
Route::group(['prefix' => 'señalización'],function (){
//    Route::get('/', 'FrontendController@familias')->name('familias');
    Route::get('/', 'FrontendController@productos_senalizacion')->name('p.senalizacion');
    Route::get('/{slug}', 'FrontendController@senalizacion')->name('p.senalizacion.show');
//    Route::get('producto/{slug}', 'FrontendController@iluminacion')->name('iluminacion');
});

//PANTALLAS
Route::group(['prefix' => 'pantallas-led'],function (){
//    Route::get('/', 'FrontendController@familias')->name('familias');
    Route::get('/', 'FrontendController@productos_pantallas')->name('p.pantallas');
    Route::get('/{slug}', 'FrontendController@pantallas')->name('p.pantallas.show');
//    Route::get('producto/{slug}', 'FrontendController@iluminacion')->name('iluminacion');
});


//PRODUCTOS
Route::group(['prefix' => 'iluminacion'],function (){
//    Route::get('/', 'FrontendController@familias')->name('familias');
    Route::get('familia/{slug}', 'FrontendController@familia')->name('familia');
    Route::get('subfamilia/{slug}', 'FrontendController@subfamilia')->name('subfamilia');
    Route::get('producto/{slug}', 'FrontendController@iluminacion')->name('iluminacion');
});

//NOVEDADES
Route::group(['prefix' => 'novedades'],function (){
    Route::get('/', 'FrontendController@novedades')->name('novedades');
    Route::get('/{slug}', 'FrontendController@novedad')->name('categoria.novedad');
    Route::get('novedad/{slug}', 'FrontendController@novedadshow')->name('novedad.show');
});


/***MAIL***/
Route::post('contacto','MailController@contacto')->name('contacto.mail');
Route::post('ficha','MailController@ficha_producto')->name('ficha.mail');
Route::post('presupuesto-mail','MailController@presupuesto')->name('presupuesto.mail');
/****FIN MAIL****/
Route::get('buscador','FrontendController@buscador')->name('buscador');
Route::group(['middleware' => 'auth', 'prefix' => 'adm'],function (){
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
