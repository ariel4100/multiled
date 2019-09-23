<?php

namespace App\Http\Controllers\adm;

use App\Content;
use App\Download;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class DownloadController extends Controller
{
    public function data($site)
    {
        $descargas = Download::on(env($site))->orderBy('order')->get();
//        $novedades = News::on(env($site))->orderBy('order')->get();
        $idioma = collect(LaravelLocalization::getSupportedLocales())->only(['es']);
//        dd($idioma );
        $descargas->each(function ($item, $key) {
            $item->file = asset($item->file);
        });
        return response()->json([
            'idioma' => $idioma,
            'descargas' => $descargas,
//            'novedades' => $novedades
        ]);
    }

    public function store(Request $request,$site)
    {
//        post_max_size = 100M php.ini
//                return $request->all();
        $descarga = Download::on(env($site))->find($request->id);
        if($request->file != null){

                if(is_string($request->file)) {
                    $path = $request->file;
                } else {
                    $path = $request->file->storeAs('uploads/descargas',$request->file->getClientOriginalName());
                }

        }
//        if ($request->file){
//            $path = $request->file->storeAs('uploads/descargas',$request->file->getClientOriginalName());
//        }


//        if($request->images != null){
//            foreach ($request->images as $key => $value) {
//                if(!is_string($value)) {
//                    $path = $value->store('public/content/images/');
//                    $image[$key] = $path;
//                }
//            }
//        }

//        return $descarga;
        if (!isset($descarga)){
            $descarga = new Download();
            $descarga->setConnection(env($site));
        }
        $descarga->title = $request->title;
        $descarga->order = $request->order;
        $descarga->file = $path ?? null;
        $descarga->save();

//        return $cliente;
        return response()->json('guaradado');
//        dd($request->all());

    }

    public function destroy(Request $request, $site)
    {
        Download::on(env($site))->find($request->id)->delete();
        return response()->json('guaradado');
    }
}
