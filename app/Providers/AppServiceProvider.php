<?php

namespace App\Providers;

use App\Content;
use App\Family;
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
            $redes = Content::where('section','redes')->first();
            $familias = Family::orderBy('order')->get();
            $metadatos = Content::where('section','metadatos')->first();
            $info_footer = Content::where('section','terminos')->first();

            $filtered_whatsapp = collect($contacto->text['phones'])->filter(function ($value, $key) {
//                dd($value);
                if ($value['type'] == 'wha')
                {
                    return $value;
                }
//                return $value > 2;
            });
//            dd($filtered_whatsapp->first());
            view()->share([

                'familias' => @$familias,
                'favicon' => @$datos->file[0]['image'],
                'header' => @$datos->file[1]['image'],
                'footer' => @$datos->file[2]['image'],
                'contacto' => @$contacto->text,
                'metadatos' => @$metadatos->file,
                'redes' => @$redes->text['redes'],
                'whatsapp' => @$filtered_whatsapp->first(),
            ]);

//

        }
    }
}
