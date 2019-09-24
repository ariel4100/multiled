<?php

namespace App\Http\Controllers\adm;

use App\Family;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;


class FamilyController extends Controller
{
    public function data()
    {
        $familias = Family::orderBy('order')->get();
//        $novedades = News::on(env($site))->orderBy('order')->get();
        $idioma = collect(LaravelLocalization::getSupportedLocales())->only(['es']);
//        dd($idioma );
        return response()->json([
            'idioma' => $idioma,
            'familias' => $familias,
//            'novedades' => $novedades
        ]);
    }

    public function store(Request $request)
    {
        $data = json_decode($request->data);
//        dd($data);
        $categoria = Family::find($data->familia->id ?? '');
//        return $cliente;
        if (!$categoria){
            $categoria = new Family();
//            $categoria->setConnection(env($site));
            if($request->images != null){
                foreach ($request->images as $key => $value) {
                    if(is_string($value['image'])) {
//                    $gallery[$key] = $value;
                        $images[$key]['image'] = $value['image'];
                        $images[$key]['title'] = $value['title'];
                    } else {
//                    dd($value['image']);
                        $path = $value['image']->store('uploads/familia');
                        $images[$key]['image'] = asset($path);
                        $images[$key]['title'] = $value['title'];
                    }

                }
                $categoria->file = $images;
            }

            $categoria->text = $data->lang  ?? null;
            $categoria->order = $data->lang->es->order  ?? null;
            $categoria->slug = Str::slug($data->lang->es->title  ?? null);
            $categoria->save();
            return response()->json('guaradado');
        }
//        return $request->all();
//        dd($site);

        if($request->images != null){
            foreach ($request->images as $key => $value) {
                if(is_string($value['image'])) {
//                    $gallery[$key] = $value;
                    $images[$key]['image'] = $value['image'];
                    $images[$key]['title'] = $value['title'];
                } else {
//                    dd($value['image']);
                    $path = $value['image']->store('uploads/familia');
                    $images[$key]['image'] = asset($path);
                    $images[$key]['title'] = $value['title'];
                }

            }
            $categoria->file = $images;
        }
        $categoria->text =  $data->familia->text ?? null;
        $categoria->order =  $data->familia->text->es->order ?? null;
        $categoria->slug = Str::slug( $data->familia->text->es->title ?? null);
        $categoria->save();

        return $categoria;
        return response()->json('guaradado');
//        dd($request->all());

    }

    public function update(Request $request, $site)
    {
//        return $request->all();
//        dd($site);
        $categoria = Family::find($request->familia['id']);
        $categoria->text = $request->familia['text'];
        $categoria->order = $request->familia['text']['es']['order'];
        $categoria->slug = Str::slug($request->familia['text']['es']['title']);
        $categoria->save();

//        return $categoria;
        return response()->json('guaradado');
//        dd($request->all());
    }

    public function destroy(Request $request, $site)
    {
        Family::find($request->id)->delete();
        return response()->json('guaradado');
    }
}
