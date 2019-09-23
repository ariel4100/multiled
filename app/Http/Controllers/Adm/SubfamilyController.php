<?php

namespace App\Http\Controllers\adm;

use App\Family;
use App\Subfamily;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class SubfamilyController extends Controller
{
    public function data($site)
    {
        $subfamilias = Subfamily::on(env($site))->with('family')->orderBy('order')->get();
        $familias = Family::on(env($site))->orderBy('order')->get();
//        $novedades = News::on(env($site))->orderBy('order')->get();
        $idioma = collect(LaravelLocalization::getSupportedLocales())->only(['es']);
//        dd($idioma );
        return response()->json([
            'idioma' => $idioma,
            'subfamilias' => $subfamilias,
            'familias' => $familias,
//            'novedades' => $novedades
        ]);
    }

    public function store(Request $request,$site)
    {
        $data = json_decode($request->data);
//        dd($data);
        $categoria = Subfamily::on(env($site))->find($data->subfamilia->id ?? '');
//        return $cliente;
        if (!$categoria){
            $categoria = new Subfamily();
            $categoria->setConnection(env($site));
            if($request->images != null){
                foreach ($request->images as $key => $value) {
                    if(is_string($value['image'])) {
//                    $gallery[$key] = $value;
                        $images[$key]['image'] = $value['image'];
                        $images[$key]['title'] = $value['title'];
                    } else {
//                    dd($value['image']);
                        $path = $value['image']->store('uploads/subfamilia');
                        $images[$key]['image'] = asset($path);
                        $images[$key]['title'] = $value['title'];
                    }

                }
                $categoria->file = $images;
            }

            $categoria->text = $data->lang  ?? null;
            $categoria->order = $data->lang->es->order  ?? null;
            $categoria->family_id = $data->lang->es->family_id ?? null;
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
                    $path = $value['image']->store('uploads/subfamilia');
                    $images[$key]['image'] = asset($path);
                    $images[$key]['title'] = $value['title'];
                }

            }
            $categoria->file = $images;
        }
        $categoria->text =  $data->subfamilia->text ?? null;
        $categoria->order =  $data->subfamilia->text->es->order ?? null;
        $categoria->family_id = $data->subfamilia->text->es->family_id ?? null;
        $categoria->slug = Str::slug( $data->subfamilia->text->es->title ?? null);
        $categoria->save();

        return $categoria;
        return response()->json('guaradado');

    }

    public function update(Request $request, $site)
    {
//        return $request->all();
//        dd($site);
        $categoria = Subfamily::on(env($site))->find($request->subfamilia['id']);
        $categoria->text = $request->subfamilia['text'];
        $categoria->order = $request->subfamilia['text']['es']['order'];
        $categoria->family_id = $request->subfamilia['text']['es']['family_id'];
        $categoria->slug = Str::slug($request->subfamilia['text']['es']['title']);
        $categoria->save();

//        return $categoria;
        return response()->json('guaradado');
//        dd($request->all());
    }

    public function destroy(Request $request, $site)
    {
        Subfamily::on(env($site))->find($request->id)->delete();
        return response()->json('guaradado');
    }
}
