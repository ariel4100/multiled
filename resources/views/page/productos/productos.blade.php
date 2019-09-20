@extends('page.layouts.app')
@section('title','JOLDEN - '. $familia->text['es']['title'] . ' | ' . $subfamilia->text['es']['title'])
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
    @include('page.partials.breadcrumb')
    <form class="row justify-content-center my-4 p-3" action="{{ route('jolden.buscador.p') }}" method="get" style="background-color: #F9F9F9">
        <div class="col-md-8 d-flex">
            <input type="text" name="name" class="form-control my-2" placeholder="Buscar por codigo,nombre,marca.">
            <div class="">
                <button type="submit" class="btn btn-md jolden-fondo rounded-pill text-white py-2 my-2" style="font-size: .80rem">Buscar</button>
            </div>
        </div>
    </form>
    <div class="row my-5">
        @include('page.partials.botonera')
        <div class="col-md-9">

            <div class="row">
                @foreach($productos as $item)
                    <div class="col-md-4 mb-5">
                        <!--Zoom effect-->
                        <a href="{{ route('jolden.productos',$item->slug) }}" class="">
                            <div class="view overlay zoom d-flex justify-content-center">
                                <img onError="this.src='{{ asset('uploads/no-img.png')}}'" src="{{ asset($item->file[0]['image'] ?? 'uploads/no-img.png') }}" class="img-fluid " style="  height: 200px" alt="smaple image">
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
    </div>

</div>

@endsection