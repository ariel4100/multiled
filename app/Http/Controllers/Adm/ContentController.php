<?php

namespace App\Http\Controllers\Adm;

use App\Category;
use App\Content;
use App\News;
use App\Slider;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class ContentController extends Controller
{
    protected  $site = '';
    public function __construct()
    {

    }

    public function index($section)
    {
//        dd($site);
//        $this->site = $site;
        $contenido = Content::firstOrCreate(['section' => $section]); // static method

//        dd($contenido);
        if ($section == 'novedades')
        {
            $categoria = Category::orderBy('order')->get();
            $novedades = News::orderBy('order')->get();
            return view('adm.content.index',compact('section','novedades','site','categoria','contenido'));
        }
        return view('adm.content.index',compact('section','contenido'));
    }

    public function data($section)
    {
//        dd($section);
        $contenido = Content::firstOrCreate(['section' => $section]);
        $idioma = collect(LaravelLocalization::getSupportedLocales())->only(['es']);
//        return $idioma;
        if ($section == 'novedades')
        {
//            $categoria = Category::orderBy('order')->get();
//            $novedades = News::orderBy('order')->get();
            return response()->json([
                'contenido' => $contenido,
                'idioma' => $idioma,
//                'categoria' => $categoria,
//                'novedades' => $novedades
            ]);
        }
        //$contenido = Content::seccionTipo($section, $type)->first();
        //$data = $contenido ? $data = json_decode($contenido->text, true) : $data = [];

        return response()->json(['contenido' => $contenido,'idioma' => $idioma]);
    }


    public function update(Request $request, $id)
    {
//        return $request->all();
        $data = json_decode($request->data);
        $banner = $request->banner;
//        $data->lang->es->banner = 'dsds';
//        return dd($data->lang->es);
        $content = Content::find($id);

        if($banner != null){
            if(is_string($banner)) {
//                    return $value;
                $path = $banner ?? '';
            } else {
//                    dd($value);
                $path = $banner->store('uploads/images');
            }
            $data->lang->es->banner = $path;
        }else{
            $content->file = [];
        }

        if($request->images != null){
            foreach ($request->images as $key => $value) {
                if(is_string($value['image'])) {
//                    $gallery[$key] = $value;
//                    return $value;
                    $images[$key]['image'] = $value['image'] ?? '';
                    $images[$key]['title'] = $value['title'] ?? '';
                    $images[$key]['keyword'] = $value['keyword'] ?? '';
                    $images[$key]['description'] = $value['description'] ?? '';
                } else {
//                    dd($value);
                    $path = $value['image']->store('uploads/images');
                    $images[$key]['image'] = $path;
                    $images[$key]['title'] = $value['title'] ?? '';
                    $images[$key]['keyword'] = $value['keyword'] ?? '';
                    $images[$key]['description'] = $value['description'] ?? '';
                }
//                return $value['image'];
//                $path = $value['image']->store('public/uploads/gallery');
//                $gallery[$key]['image'] = asset(Storage::url($path));
//                $gallery[$key]['title'] = $value['title'];

            }
            $content->file = $images;
        }else{
            $content->file = [];
        }

        if($request->gallery != null){
            foreach ($request->gallery as $key => $value) {
                if(is_string($value['image'])) {
//                    $gallery[$key] = $value;
                    $gallery[$key]['image'] = $value['image']  ?? '';
                    $gallery[$key]['title'] = $value['title']  ?? '';
                    $gallery[$key]['text'] = $value['text']  ?? '';
                } else {
//                    dd($value['image']);
                    $path = $value['image']->store('uploads/gallery');
                    $gallery[$key]['image'] = $path;
                    $gallery[$key]['title'] = $value['title'] ?? '';
                    $gallery[$key]['text'] = $value['text'] ?? '';
                }
            }
//              $content->file = $gallery;
            $content->slider = $gallery;
        }else{
            $content->slider = [];
        }


        $content->text = $data->lang ?? $data ?? null;


        $content->save();
        if($content)
        {
            return response()->json('guardado');
        }else{
            return response()->json('algo salio mal');
        }

//        dd($request->all());

    }
}
