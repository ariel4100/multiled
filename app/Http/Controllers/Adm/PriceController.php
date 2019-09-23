<?php

namespace App\Http\Controllers\adm;

use App\PriceList;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class PriceController extends Controller
{
    public function data($site)
    {
        $clientes = PriceList::on(env($site))->get();
//        $novedades = News::on(env($site))->orderBy('order')->get();
        $idioma = collect(LaravelLocalization::getSupportedLocales())->only(['es']);
//        dd($idioma );
        return response()->json([
            'idioma' => $idioma,
            'prices_list' => $clientes,
//            'novedades' => $novedades
        ]);
    }

    public function store(Request $request,$site)
    {
//        return $request->all();
        $cliente = PriceList::on(env($site))->find($request->id);
//        return $cliente;
        if (!$cliente){
            $cliente = new PriceList();
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
        PriceList::on(env($site))->find($request->id)->delete();
        return response()->json('guaradado');
    }
}
