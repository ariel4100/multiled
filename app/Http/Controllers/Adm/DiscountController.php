<?php

namespace App\Http\Controllers\Adm;

use App\Discount;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class DiscountController extends Controller
{
    public function data($site)
    {
        $descuentos = Discount::on(env($site))->get();
//        $novedades = News::on(env($site))->orderBy('order')->get();
        $idioma = collect(LaravelLocalization::getSupportedLocales())->only(['es']);
//        dd($idioma );
        return response()->json([
            'idioma' => $idioma,
            'descuentos' => $descuentos,
//            'novedades' => $novedades
        ]);
    }

    public function store(Request $request,$site)
    {
//        post_max_size = 100M php.ini
//        return $request->all();
//        if ($request->file){
//            $path = $request->file->storeAs('public/content/images/',$request->file->getClientOriginalName());
//        }


//        if($request->images != null){
//            foreach ($request->images as $key => $value) {
//                if(!is_string($value)) {
//                    $path = $value->store('public/content/images/');
//                    $image[$key] = $path;
//                }
//            }
//        }
        $descarga = Discount::on(env($site))->find($request->id);
//        return $descarga;
        if (!isset($descarga)){
            $descarga = new Discount();
            $descarga->setConnection(env($site));
        }
        $descarga->percentage = $request->percentage;

        $descarga->save();

//        return $cliente;
        return response()->json('guaradado');
//        dd($request->all());

    }

    public function destroy(Request $request, $site)
    {
        Discount::on(env($site))->find($request->id)->delete();
        return response()->json('guaradado');
    }
}
