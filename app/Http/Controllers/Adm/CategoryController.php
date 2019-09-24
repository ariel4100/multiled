<?php

namespace App\Http\Controllers\Adm;

use App\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class CategoryController extends Controller
{
    public function data()
    {
        $categorias = Category::orderBy('order')->get();
//        $novedades = News::on(env($site))->orderBy('order')->get();
        $idioma = collect(LaravelLocalization::getSupportedLocales())->only(['es']);
//        dd($idioma );
        return response()->json([
            'idioma' => $idioma,
            'categorias' => $categorias,
//            'novedades' => $novedades
        ]);
    }

    public function store(Request $request)
    {
//        return $request->all();
//        dd($site);
        $categoria = new Category();
//        $categoria->setConnection(env($site));
        $categoria->text = $request->lang;
        $categoria->order = $request->lang['es']['order'];
        $categoria->slug = Str::slug($request->lang['es']['title']);
        $categoria->save();

        return $categoria;
        return response()->json('guaradado');
//        dd($request->all());

    }

    public function update(Request $request)
    {
//        return $request->categoria;
//        dd($site);
        $categoria = Category::find($request->categoria['id']);
        $categoria->text = $request->categoria['text'];
        $categoria->order = $request->categoria['text']['es']['order'];
        $categoria->slug = Str::slug($request->categoria['text']['es']['title']);
        $categoria->save();

//        return $categoria;
        return response()->json('guaradado');
//        dd($request->all());
    }

    public function destroy(Request $request)
    {
        Category::find($request->id)->delete();
        return response()->json('guaradado');
    }
}
