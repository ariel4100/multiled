<?php

namespace App\Http\Controllers;

use App\Content;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function home()
    {
        $contenido = Content::where('section','home')->first();
//        dd($contenido->slider);
//        $destacados = Product::on('mysql')->where('text->es->featured',true )->get();
//        dd($contenido);
        $slider =$contenido->slider;
        $text = $contenido->text['es'];
        return view('page.home',compact('contenido','text','slider'));
    }
    public function empresa()
    {
        $contenido = Content::where('section','empresa')->first();
        $slider =$contenido->slider;
//        dd($slider);
        $text = $contenido->text['es'];
        return view('page.empresa',compact('contenido','text','slider'));
    }


    public function contacto()
    {

        return view('page.contacto');
    }

    public function presupuesto()
    {
//        $contenido = Content::where('section','empresa')->first();
//        $slider =$contenido->slider;
//        dd($slider);
//        $text = $contenido->text['es'];
        return view('page.presupuesto');
    }
}
