@extends('page.layouts.app')
@section('title','JOLDEN - '. $familia->text['es']['title'] . ' | ' . $subfamilia->text['es']['title'] . ' | ' . $producto->text['es']['title'] )
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
{{--            @dd($producto)--}}
            <div class="row mb-5">
                <div class="col-md-6">
                    @gallery()
                    @slot('gallery',$producto->file ?? '')
                    @slot('id',3)
                    @endgallery
{{--                    <img src="{{ asset($producto->file[0]['image'] ?? 'uploads/no-img.png') }}" alt="" class="img-fluid">--}}
                </div>
                <div class="col-md-6">
                    <h2 class="jolden-color font-weight-bold">{!! $text['title'] ?? '' !!}</h2>
                     {!! $text['text'] ?? '' !!}
                    <div class=" d-flex  mt-3">
                        {{--<a href="" class="btn px-4 jolden-fondo text-white font-weight-bold rounded-pill">FICHA PDF</a>--}}
                        <a href="{{ route('jolden.contacto') }}" class="btn px-4 jolden-fondo text-white font-weight-bold rounded-pill">CONSULTAR</a>
                    </div>
                </div>
            </div>
            {{--@DD($text)--}}
            <div class="row my-5">
                <div class="col-md-6">
                    @if(isset($text['caracteristicas']))
                        <h4 class="font-weight-bold p-2" style="background-color: #F9F9F9">Caracteristicas</h4>
                        {!! $text['caracteristicas'] ?? '' !!}
                    @endif


                </div>
                <div class="col-md-6">
                    @if(isset($text['planos']))
                        <h4 class="font-weight-bold p-2" style="background-color: #F9F9F9">Planos</h4>
                    @endif
                </div>
            </div>
            {{--@dd($producto->related)--}}
            @if(count($producto->related) > 0)
            <h4 class="font-weight-bold p-2" style="background-color: #F9F9F9">Productos relacionados</h4>
            <div class="row my-5">
                @foreach($producto->related as $item)
                    <div class="col-md-4 mb-5">
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
            @endif
        </div>
    </div>

</div>

@endsection
