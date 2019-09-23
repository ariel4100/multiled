<?php

namespace App\Http\Controllers\adm;

use App\Bonus;
use App\Client;
use App\Discount;
use App\Download;
use App\Price;
use App\PriceList;
use App\Seller;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class ClientController extends Controller
{
    public function data($site)
    {
        $clientes = Client::on(env($site))->get();
        $descuento = Discount::all();
        $prices_list = PriceList::all();
        $bonificaciones = Bonus::all();
        $vendedores = Seller::all();
//        $novedades = News::on(env($site))->orderBy('order')->get();
        $idioma = collect(LaravelLocalization::getSupportedLocales())->only(['es']);

        $prices = new Price();
//        $prices->getVisible();
//        return $prices->getVisible();
//        dd($prices_list->pluck('text')->pluck('name') );
        return response()->json([
            'idioma' => $idioma,
            'clientes' => $clientes,
            'descuento' => $descuento,
            'precios' => $prices_list->pluck('text')->pluck('name') ?? '',
            'vendedores' => $vendedores,
            'bonus' => $bonificaciones
        ]);
    }

    public function store(Request $request,$site)
    {
//        return $request->price_list;
        $cliente = Client::on(env($site))->find($request->id);
//        return $cliente;
        if (!$cliente){
            $cliente = new Client();
            $cliente->setConnection(env($site));
        }

        $cliente->name = $request->name;
        $cliente->surname = $request->surname;
        $cliente->username = $request->username;
        $cliente->email = $request->email;
        $cliente->location = $request->location;
        $cliente->address = $request->address;
        $cliente->province = $request->province;
        $cliente->session = $request['session'];
        $cliente->tipo = $request->tipo;
        $cliente->ip = $request->ip();
        if ($request->password)
        {
            $cliente->password = Hash::make($request->password);
        }
        $cliente->price_list =  $request->price_list;
        $cliente->seller_id = $request->seller_id;
        $cliente->discount_id = $request->discount_id;
        $cliente->bonus_id = $request->bonus_id;

        $cliente->save();

//        return $cliente;
        if ($cliente->save())
        {
            return response()->json('guaradado');
        }else{
            return response()->json('algo salio mal');
        }
//        dd($request->all());

    }

    public function destroy(Request $request, $site)
    {
        Client::on(env($site))->find($request->id)->delete();
        return response()->json('guaradado');
    }
}
