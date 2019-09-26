<?php

namespace App\Http\Controllers\adm;

use App\Brand;
use App\Family;
use App\Product;
use App\Service;
use App\Subfamily;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class ProductController extends Controller
{
    public function data($section)
    {
//        dd($section);
//        $subfamilias = Subfamily::on(env($site))->orderBy('order')->get();
        $familias = Family::orderBy('order')->get();
        $productos = Product::with('family')
            ->where('section',$section)
            ->orderBy('order')->get();
        $servicios = Service::orderBy('order')->get();
        $idioma = collect(LaravelLocalization::getSupportedLocales())->only(['es']);
//        dd($idioma );
        return response()->json([
            'idioma' => $idioma,
//            'subfamilias' => $subfamilias,
            'familias' => $familias,
            'productos' => $productos,
            'servicios' => $servicios
        ]);
    }

    public function store(Request $request)
    {
        $data = json_decode($request->data);
        $related = collect($data->related);
        $related->pluck('id');
//        dd($related->pluck('id'));
//        return $request->all();
        $categoria = Product::find($data->producto->id ?? '');
//        return $cliente;
        if (!$categoria){
//            dd($data->lang);
            $categoria = new Product();
//            $categoria->setConnection(env($site));
            if($request->images != null){
                foreach ($request->images as $key => $value) {
                    if(is_string($value['image'])) {
//                    $gallery[$key] = $value;
                        $images[$key]['image'] = $value['image'];
                        $images[$key]['title'] = $value['title'];
                    } else {
//                    dd($value['image']);
                        $path = $value['image']->store('uploads/productos/img');
                        $images[$key]['image'] = $path;
                        $images[$key]['title'] = $value['title'];
                    }

                }
                $categoria->file = $images;
            }
            if($request->gallery != null){
                foreach ($request->gallery as $key => $value) {
                    if(is_string($value['image'])) {
//                    $gallery[$key] = $value;
                        $gallery[$key]['image'] = $value['image'];
//                        $images[$key]['title'] = $value['title'];
                    } else {
//                    dd($value['image']);
                        $path = $value['image']->store('uploads/productos/gallery');
                        $gallery[$key]['image'] = $path;
//                        $images[$key]['title'] = $value['title'];
                    }

                }
                $categoria->slider = $gallery;
            }

            $categoria->text = $data->lang  ?? null;
            $categoria->code = $data->lang->es->code  ?? null;
            $categoria->order = $data->lang->es->order  ?? null;
//            $categoria->subfamily_id = $data->lang->es->subfamily_id ?? null;
//            $familia = Subfamily::on(env($site))->find($data->lang->es->subfamily_id ?? '');
            $categoria->family_id = $familia->family_id ?? null;
            $categoria->section = $request->seccion ?? null;
            $categoria->slug = Str::slug($data->lang->es->title  ?? null);
            $categoria->save();

            $categoria->related()->sync($related->pluck('id'));
            return response()->json('guaradado');
        }

        if($request->images != null){
            foreach ($request->images as $key => $value) {
                if(is_string($value['image'])) {
//                    $gallery[$key] = $value;
                    $images[$key]['image'] = $value['image'];
                    $images[$key]['title'] = $value['title'];
                } else {
//                    dd($value['image']);
                    $path = $value['image']->store('uploads/productos/img');
                    $images[$key]['image'] = $path;
                    $images[$key]['title'] = $value['title'];
                }

            }
            $categoria->file = $images;
        }

        if($request->gallery != null){
            foreach ($request->gallery as $key => $value) {
                if(is_string($value['image'])) {
//                    $gallery[$key] = $value;
                    $gallery[$key]['image'] = $value['image'];
//                        $images[$key]['title'] = $value['title'];
                } else {
//                    dd($value['image']);
                    $path = $value['image']->store('uploads/productos/gallery');
                    $gallery[$key]['image'] = $path;
//                        $images[$key]['title'] = $value['title'];
                }

            }
            $categoria->slider = $gallery;
        }


//        $familia = Subfamily::on(env($site))->find($data->producto->text->es->subfamily_id ?? '');
        $categoria->text =  $data->producto->text ?? null;
        $categoria->code = $data->producto->text->es->code ?? null;
        $categoria->order =  $data->producto->text->es->order ?? null;
        $categoria->family_id = $familia->family_id ?? null;
//        $categoria->subfamily_id = $data->producto->text->es->subfamily_id ?? null;
        $categoria->slug = Str::slug( $data->producto->text->es->title ?? null);
        $categoria->save();
        $categoria->related()->sync($related->pluck('id'));
        return $categoria;
        return response()->json('guaradado');
//        dd($site);

//        $categoria->text = $request->lang;
//        $categoria->order = $request->lang['es']['order'];
//        $categoria->family_id = $subfamilia->family_id;
//        $categoria->subfamily_id = $request->lang['es']['subfamily_id'];
//        $categoria->slug = Str::slug($request->lang['es']['title']);
//        $categoria->save();
//
////        return $categoria;
//        return response()->json('guaradado');
//        dd($request->all());

    }

    public function update(Request $request)
    {
        return $request->all();
//        dd($site);
//        $subfamilia = Subfamily::find($request->producto['text']['es']['subfamily_id']);
        $categoria = Product::find($request->producto['id']);
        $categoria->text = $request->producto['text'];
        $categoria->order = $request->producto['text']['es']['order'];
        $categoria->family_id = $subfamilia->family_id;
        $categoria->subfamily_id = $request->producto['text']['es']['subfamily_id'];
        $categoria->slug = Str::slug($request->producto['text']['es']['title']);
        $categoria->save();

//        return $categoria;
        return response()->json('guaradado');
//        dd($request->all());
    }

    public function destroy(Request $request)
    {
        Product::find($request->id)->delete();
        return response()->json('guaradado');
    }
}
