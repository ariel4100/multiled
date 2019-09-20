@extends('page.layouts.app')
@section('title','JOLDEN - NUESTROS PRODUCTOS')
@push('style')
    <style>
        .caja {
            /*position: relative;*/

            /*background-blend-mode: multiply;*/
        }
        .caja::before {
            mix-blend-mode: multiply;
            position: absolute;
            background-color: #07472D;
            top: 0;
            left: 0;
            bottom: 0;
            right: 0;
        }
        .view{
            cursor: pointer;
        }
    </style>
@endpush
@section('content')
<div class="container my-5">
    <p class="m-0 text-muted font-weight-bold">NUESTROS PRODUCTOS</p>
    <h1 class="jolden-color2 font-weight-bold">Seleccione una categoría</h1>
    <form class="row justify-content-center my-4 p-3" action="{{ route('jolden.buscador.p') }}" method="get" style="background-color: #F9F9F9">
        <div class="col-md-8 d-flex">
            <input type="text" name="name" class="form-control my-2" placeholder="Buscar por codigo,nombre,marca.">
            <div class="">
                <button type="submit" class="btn btn-md jolden-fondo rounded-pill text-white py-2 my-2" style="font-size: .80rem">Buscar</button>
            </div>
        </div>
    </form>
    <div class="row my-5">
        @foreach($familias as $item)
        <div class="col-md-6 mb-5">
            <!--Zoom effect-->
            {{--@dd($item->file[0])--}}
            <a href="{{ route('jolden.familia',$item->slug) }}" class="">
                <div class="view overlay zoom">
                    <img onError="this.src='{{ asset('uploads/no-img.png')}}'" src="{{ asset($item->file[0]['image'] ?? 'uploads/no-img.png') }}" class="img-fluid " alt="smaple image">
                    <div class="mask caja flex-center" style="background-color: rgba(5, 139, 140,0.7);">
                        <p class="text-white" style="z-index: 11"><i class="fas fa-plus fa-2x"></i></p>
                    </div>
                </div>
                <h4 class="jolden-color text-center font-weight-bold my-3">{!! $item->text['es']['title'] ?? '' !!}</h4>
            </a>
        </div>
        @endforeach
    </div>
</div>

@endsection