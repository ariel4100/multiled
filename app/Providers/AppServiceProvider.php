<?php

namespace App\Providers;

use App\Content;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Blade::component('components.gallery', 'gallery');
        // Esta condicion la añado para que no de error cuando ejecutas artisan
        if (php_sapi_name() != 'cli') {
//            $cliente_elegido = Cache::get('key');
//            dd($cliente_elegido);
            $datos = Content::where('section','logos')->first();
            $contacto = Content::where('section','contacto')->first();
//            $familia_jolden = Family::orderBy('order')->get();
            $metadatos = Content::where('section','metadatos')->first();
            $info_footer = Content::where('section','terminos')->first();

//            dd($info_footer);
            view()->share([
                'favicon' => @$datos->file[0]['image'],
                'header' => @$datos->file[1]['image'],
                'footer' => @$datos->file[2]['image'],
                'contacto' => @$contacto->text,
                'metadatos' => @$metadatos->file,
            ]);

//

        }
    }
}
