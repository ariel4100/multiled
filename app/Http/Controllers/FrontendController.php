<?php

namespace App\Http\Controllers;

use App\Category;
use App\Content;
use App\Family;
use App\News;
use App\Product;
use App\Project;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function home()
    {
        $contenido = Content::where('section','home')->first();
        $proyectos = Project::orderBy('order')->limit(4)->get();
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

    public function proyectos()
    {
        $proyectos = Project::orderBy('order')->get();
//        $proyectos = Content::where('section','proyectos')->first();

        return view('page.proyecto',compact('proyectos'));
    }

    public function proyecto_show($slug)
    {
        $proyecto = Project::where('slug',$slug)->first();
        $text = $proyecto->text['es'];
        return view('page.proyectoshow',compact('proyecto','text'));
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

        return view('page.presupuesto');
    }
    //ILUMINACION
    function iluminacion()
    {
//        dd($slug);
        $familias = Family::orderBy('order')->get();
//        $familia = Family::where('slug',$slug)->first();
//        $productos = $familia->products;
//        dd($subfamilias);
        return view('page.iluminacion.familias',compact('familias'));
    }
    public function productos_iluminacion($slug)
    {
//        dd($slug);
        $familias = Family::orderBy('order')->get();
        $familia = Family::where('slug',$slug)->orderBy('order')->first();
//        $familia = Family::where('id',$subfamilia->family_id)->first();
        $productos = $familia->product;
//        dd($productos);
        return view('page.iluminacion.productos',compact('familias','productos','familia'));
    }
    public function productos_iluminacion_show($category,$slug)
    {
//                dd($slug);
        $familias = Family::orderBy('order')->get();
        $producto = Product::where('slug',$slug)->first();
        $familia = Family::where('slug',$category)->first();
//        $subfamilia = Subfamily::on('mysql')->where('id',$producto->subfamily_id)->first();
        $text = $producto->text['es'];
        return view('page.iluminacion.show',compact('familias','producto','familia','text'));
    }


    //NOVEDADES
    public function novedades()
    {
        $novedades = News::orderBy('order')->get();
        $categorias = Category::orderBy('order')->get();
        return view('page.novedades.index',compact('novedades','categorias'));
    }
    public function novedad($slug)
    {
        $categorias = Category::orderBy('order')->get();
        $novedades = Category::orderBy('order')->where('slug',$slug)->first();
        $novedades = $novedades->news;
        return view('page.novedades.novedad',compact('novedades','categorias'));
    }
    public function novedadshow($slug)
    {
        $categorias = Category::orderBy('order')->get();
        $novedad = News::orderBy('order')->where('slug',$slug)->first();

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
