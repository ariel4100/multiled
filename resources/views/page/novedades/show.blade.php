@extends('page.layouts.app')
@section('title','MULTILED - NOVEDAD: '. $novedad->text['es']['text'] ?? '')
@section('content')
<div class="container my-5">
    <div class="row">
        <div class="col-md-8">
            <img src="{{ asset($novedad->file[0]['image'] ?? 'uploads/no-img.png') }}" alt="" class="img-fluid">
            <div class="my-5">
                <span class="badge multiled-fondo text-uppercase mb-3">{!! $novedad->category->text['es']['title'] ?? '' !!}</span><br>
                <h3 class="jolden-color font-weight-bold">{!! $novedad->text['es']['title'] ?? '' !!}</h3>
                {!! $novedad->text['es']['text'] ?? '' !!}
                <br>
            </div>

        </div>
        <div class="col-md-4">
            <div class="p-5" style="background-color: #F9F9F9">
                <h3 class="multiled-color2 font-weight-bold">CATEGORÍAS</h3>
                @foreach($categorias as $item)
                    <p class="m-0"><a href="{{ route('categoria.novedad',$item->slug) }}" class="multiled-color">{!! $item->text['es']['title']!!}</a></p>
                @endforeach
            </div>
        </div>
    </div>


</div>

@endsection