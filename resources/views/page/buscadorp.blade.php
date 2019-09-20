@extends('page.layouts.app')
@section('title','JOLDEN - BUSCADOR DE PRODUCTOS')
@section('content')
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <h2 class="py-2 font-weight-bold jolden-color" style="border-bottom: 2px solid #07472D; width: 100px">Buscador</h2>
            </div>
        </div>
        <form class="row justify-content-center my-4 p-3" action="{{ route('jolden.buscador.p') }}" method="get" style="background-color: #F9F9F9">
            <div class="col-md-8 d-flex">
                <input type="text" name="name" class="form-control my-2" placeholder="Buscar por codigo,nombre,marca.">
                <div class="">
                    <button type="submit" class="btn btn-md jolden-fondo rounded-pill text-white py-2 my-2" style="font-size: .80rem">Buscar</button>
                </div>
            </div>
        </form>


        <div class="row my-5">
            @foreach($resultado ?? [] as $item)
                <div class="col-md-3 mb-5">
                    <!--Zoom effect-->
                    <a href="{{ route('jolden.productos',$item->slug) }}" class="">
                        <div class="view overlay zoom">
                            <img onError="this.src='{{ asset('uploads/no-img.png')}}'" src="{{ asset($item->file[0]['image'] ?? 'uploads/no-img.png') }}" class="img-fluid " style="width: 300px; height: 200px" alt="smaple image">
                            <div class="mask caja flex-center" style="background-color: rgba(5, 139, 140,0.7)">
                                <p class="text-white" style="z-index: 11"><i class="fas fa-plus fa-2x"></i></p>
                            </div>
                        </div>
                        <h6 class="jolden-color font-weight-bold text-center my-3">{!! $item->text['es']['title'] ?? '' !!}</h6>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
@endsection
