<?php

namespace App\Http\Controllers;

use App\Content;
use App\Family;
use App\Product;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function home()
    {
        $contenido = Content::where('section','home')->first();
        $proyectos = Content::where('section','proyectos')->first();
//        dd($contenido->slider);
//        $destacados = Product::on('mysql')->where('text->es->featured',true )->get();
//        dd($proyectos);
        $slider =$contenido->slider;
        $text = $contenido->text['es'];
        return view('page.home',compact('contenido','text','slider','proyectos'));
    }
    public function empresa()
    {
        $contenido = Content::where('section','empresa')->first();
        $slider =$contenido->slider;
//        dd($slider);
        $text = $contenido->text['es'];
        return view('page.empresa',compact('contenido','text','slider'));
    }


    public function productos_senalizacion()
    {
        $señalizacion = Product::where('section','senalizacion')->get();
//        $slider =$contenido->slider;
//        dd($slider);
//        $text = $contenido->text['es'];
        return view('page.señalizacion.index',compact('señalizacion'));
    }
    public function senalizacion($slug)
    {
        $señalizacion = Product::where('section','senalizacion')->get();
        $producto = Product::where('slug',$slug)->first();
        $text = $producto->text['es'];
        return view('page.señalizacion.show',compact('producto','señalizacion','text'));
    }

    public function productos_vial()
    {
        $vial = Product::where('section','vial')->get();
//        $slider =$contenido->slider;
//        dd($slider);
//        $text = $contenido->text['es'];
        return view('page.vial.index',compact('vial'));
    }
    public function vial($slug)
    {
        $vial = Product::where('section','vial')->get();
        $producto = Product::where('slug',$slug)->first();
        $text = $producto->text['es'];
        return view('page.vial.show',compact('producto','vial','text'));
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

    //PRODUCTOS
//    public function familias()
//    {
//        $familias = Family::orderBy('order')->get();
//        return view('page.productos.familias',compact('familias'));
//    }
    public function familia($slug)
    {
//        dd($slug);
        $familias = Family::orderBy('order')->get();
        $familia = Family::where('slug',$slug)->first();
        $productos = $familia->products;
//        dd($subfamilias);
        return view('page.productos.productos',compact('familias','familia','productos'));
    }
    public function subfamilia($slug)
    {
//        dd($slug);
        $familias = Family::on('mysql')->orderBy('order')->get();
        $subfamilia = Subfamily::on('mysql')->where('slug',$slug)->orderBy('order')->first();
        $familia = Family::on('mysql')->where('id',$subfamilia->family_id)->first();
        $productos = $subfamilia->product;
//        dd($productos);
        return view('page.productos.productos',compact('familias','productos','subfamilia','familia'));
    }
    public function productos($slug)
    {
//                dd($slug);
        $familias = Family::on('mysql')->orderBy('order')->get();
        $producto = Product::on('mysql')->where('slug',$slug)->first();
        $familia = Family::on('mysql')->where('id',$producto->family_id)->first();
        $subfamilia = Subfamily::on('mysql')->where('id',$producto->subfamily_id)->first();
        $text = $producto->text['es'];
        return view('page.productos.show',compact('familias','producto','familia','subfamilia','text'));
    }


    //NOVEDADES
    public function novedades()
    {
        $novedades = News::on('mysql')->get();
        $categorias = Category::on('mysql')->get();
        return view('page.novedades.index',compact('novedades','categorias'));
    }
    public function novedad($slug)
    {
        $categorias = Category::on('mysql')->get();
        $novedades = Category::on('mysql')->where('slug',$slug)->first();
        $novedades = $novedades->news;
        return view('page.novedades.novedad',compact('novedades','categorias'));
    }
    public function novedadshow($slug)
    {
        $categorias = Category::on('mysql')->get();
        $novedad = News::on('mysql')->where('slug',$slug)->first();

        return view('page.novedades.show',compact('novedad','categorias'));
    }




    public function buscador(Request $request)
    {
//        dd($request->name);
        if (isset($request->name))
        {
            $resultado = Product::Orwhere('text->es->title', 'LIKE', "%$request->name%")->get();
        }else{
            $resultado = [];
        }
        //$resultado = Product::whereLike(['text->title_'.App::getLocale(), 'text->text_'.App::getLocale()], $request->name)->get();
//        dd($resultado);
        return view('page.buscador',compact('resultado'));
    }

}
