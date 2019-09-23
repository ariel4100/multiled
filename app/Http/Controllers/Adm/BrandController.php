<?php

namespace App\Http\Controllers\Adm;

use App\Brand;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class BrandController extends Controller
{
    public function data($site)
    {
        $clientes = Brand::on(env($site))->get();
//        $novedades = News::on(env($site))->orderBy('order')->get();
        $idioma = collect(LaravelLocalization::getSupportedLocales())->only(['es']);
//        dd($idioma );
        return response()->json([
            'idioma' => $idioma,
            'marcas' => $clientes,
//            'novedades' => $novedades
        ]);
    }

    public function store(Request $request,$site)
    {
//        return $request->all();
        $cliente = Brand::on(env($site))->find($request->id);
//        return $cliente;
        if (!$cliente){
            $cliente = new Brand();
            $cliente->setConnection(env($site));
            $cliente->text =  $request->only(['name','order']);
            $cliente->save();

            return $cliente;
        }

        $cliente->text =  $request->text;
//        $cliente->surname = $request->surname;
        $cliente->save();

        return $cliente;
        return response()->json('guardado');
//        dd($request->all());

    }

    public function destroy(Request $request, $site)
    {
        Brand::on(env($site))->find($request->id)->delete();
        return response()->json('guaradado');
    }
}
