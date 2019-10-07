<?php

namespace App\Http\Controllers\Adm;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class UserController extends Controller
{
    public function data()
    {
        $clientes = User::get();
//        $novedades = News::on(env($site))->orderBy('order')->get();
        $idioma = collect(LaravelLocalization::getSupportedLocales())->only(['es']);
//        dd($idioma );
        return response()->json([
            'idioma' => $idioma,
            'vendedores' => $clientes,
//            'novedades' => $novedades
        ]);
    }

    public function store(Request $request)
    {
        $cliente = User::find($request->id);
//        return $cliente;
        if (!$cliente){
            $cliente = new User();
//            $cliente->setConnection(env($site));
        }

        $cliente->name = $request->name. ' '. $request->surname;
//        $cliente->surname = $request->surname;
        $cliente->username = $request->username;
        $cliente->email = $request->email;
        $cliente->password = Hash::make($request->password);
        $cliente->save();

//        return $cliente;
        return response()->json('guaradado');
//        dd($request->all());

    }

    public function destroy(Request $request)
    {
        User::find($request->id)->delete();
        return response()->json('guaradado');
    }
}
