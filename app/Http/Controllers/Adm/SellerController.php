<?php

namespace App\Http\Controllers\Adm;

use App\Seller;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class SellerController extends Controller
{
    public function data($site)
    {
        $clientes = Seller::on(env($site))->get();
//        $novedades = News::on(env($site))->orderBy('order')->get();
        $idioma = collect(LaravelLocalization::getSupportedLocales())->only(['es']);
//        dd($idioma );
        return response()->json([
            'idioma' => $idioma,
            'vendedores' => $clientes,
//            'novedades' => $novedades
        ]);
    }

    public function store(Request $request,$site)
    {
        $cliente = Seller::on(env($site))->find($request->id);
//        return $cliente;
        if (!$cliente){
            $cliente = new Seller();
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
        $cliente->ip = $request->ip();
        $cliente->password = Hash::make($request->password);
        $cliente->save();

//        return $cliente;
        return response()->json('guaradado');
//        dd($request->all());

    }

    public function destroy(Request $request, $site)
    {
        Seller::on(env($site))->find($request->id)->delete();
        return response()->json('guaradado');
    }
}
