<?php

namespace App\Http\Controllers\Adm;

use App\Category;
use App\News;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class NewsController extends Controller
{
//
//    public function index()
//    {
//
//        return response()->json();
//    }

    public function data()
    {
        $novedades = News::orderBy('order')->get();
        $categorias = Category::orderBy('order')->get();
        $idioma = collect(LaravelLocalization::getSupportedLocales())->only(['es']);
//        dd($idioma );
        return response()->json([
            'idioma' => $idioma,
            'novedades' => $novedades,
            'categorias' => $categorias,
        ]);
    }

    public function store(Request $request)
    {
        $data = json_decode($request->data);
//        return $request->all();
//        dd($site);
//        return $request->all();

        $novedades = new News();
//        $novedades->setConnection(env($site));
        if($request->images != null){
            foreach ($request->images as $key => $value) {
                if(is_string($value['image'])) {
//                    $gallery[$key] = $value;
                    $images[$key]['image'] = $value['image'];
                    $images[$key]['title'] = $value['title'];
                } else {
//                    dd($value['image']);
                    $path = $value['image']->store('uploads/novedades');
                    $images[$key]['image'] = $path;
                    $images[$key]['title'] = $value['title'];
                }

            }
            $novedades->file = $images;
        }

        $novedades->text = $data->lang ?? null;
        $novedades->category_id = $data->lang->es->category_id ?? null;
        $novedades->order = $data->lang->es->order ?? null;
        $novedades->slug = Str::slug($data->lang->es->title ?? null);
        $novedades->save();

//        return $novedades;
        return response()->json('guaradado');
//        dd($request->all());

    }

    public function update(Request $request)
    {
        $data = json_decode($request->data);
//        return dd($data->novedad->id);
//        dd($site);
        $novedades = News::find($data->novedad->id ?? '');

        if($request->images != null){
            foreach ($request->images as $key => $value) {
                if(is_string($value['image'])) {
//                    $gallery[$key] = $value;
                    $images[$key]['image'] = $value['image'];
                    $images[$key]['title'] = $value['title'];
                } else {
//                    dd($value['image']);
                    $path = $value['image']->store('uploads/novedades');
                    $images[$key]['image'] = $path;
                    $images[$key]['title'] = $value['title'];
                }

            }
            $novedades->file = $images;
        }


        $novedades->text = $data->novedad->text ?? null;
        $novedades->order = $data->novedad->text->es->order ?? null;
        $novedades->slug = Str::slug($data->novedad->text->es->title ?? null);
        $novedades->save();

//        return $categoria;
        return response()->json('guaradado');
//        dd($request->all());
    }

    public function destroy(Request $request)
    {
        News::find($request->id)->delete();
        return response()->json('guaradado');
    }
}
