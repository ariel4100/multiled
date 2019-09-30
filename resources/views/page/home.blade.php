@extends('page.layouts.app')
@section('title','MULTILED - INICIO')
@push('style')
    <style>
        /*h2 span{*/
        /*    color: #a9c47f !important;*/
        /*}*/
    </style>
@endpush
@section('content')
    @include('page.partials.carousel')
<div class="container my-5">
    <h5 class="text-center font-weight-bold mb-3">{{ $text['title'] ?? '' }}</h5>
     {!! $text['text'] ?? '' !!}
</div>
    <div class="container">
        <div class="row justify-content-center">
            @foreach($destacados ?? [] as $item)
                <div class="col-md-3 mb-5">
                    <!--Zoom effect-->

                    @switch($item->section)
                        @case('senalizacion')
                        <a href="{{ route('p.senalizacion.show',$item->slug) }}" class="">
                            <div class="view overlay zoom d-flex justify-content-center align-items-center">
                                <img onError="this.src='{{ asset('uploads/no-img.png')}}'" src="{{ asset($item->file[0]['image'] ?? 'uploads/no-img.png') }}" class="img-fluid  " style="  height: 250px" alt="smaple image">
                                <div class="mask caja flex-center" style="background-color: rgba(0, 0, 0,0.7)">
                                    <p class="text-white" style="z-index: 11"><i class="fas fa-plus fa-2x"></i></p>
                                </div>
                            </div>
                            <h6 class="multiled-color font-weight-bold text-center my-3">{!! $item->text['es']['title'] ?? '' !!}</h6>
                        </a>
                        @break

                        @case('vial')
                        <a href="{{ route('p.vial.show',$item->slug) }}" class="">
                            <div class="view overlay zoom d-flex justify-content-center align-items-center">
                                <img onError="this.src='{{ asset('uploads/no-img.png')}}'" src="{{ asset($item->file[0]['image'] ?? 'uploads/no-img.png') }}" class="img-fluid  " style="  height: 250px" alt="smaple image">
                                <div class="mask caja flex-center" style="background-color: rgba(0, 0, 0,0.7)">
                                    <p class="text-white" style="z-index: 11"><i class="fas fa-plus fa-2x"></i></p>
                                </div>
                            </div>
                            <h6 class="multiled-color font-weight-bold text-center my-3">{!! $item->text['es']['title'] ?? '' !!}</h6>
                        </a>
                        @break

                        @default
                        <a href="{{ route('p.iluminacion.show',['category' =>$item->family->slug,'slug' => $item->slug]) }}" class="">
                            <div class="view overlay zoom d-flex justify-content-center align-items-center">
                                <img onError="this.src='{{ asset('uploads/no-img.png')}}'" src="{{ asset($item->file[0]['image'] ?? 'uploads/no-img.png') }}" class="img-fluid  " style="  height: 250px" alt="smaple image">
                                <div class="mask caja flex-center" style="background-color: rgba(0, 0, 0,0.7)">
                                    <p class="text-white" style="z-index: 11"><i class="fas fa-plus fa-2x"></i></p>
                                </div>
                            </div>
                            <h6 class="multiled-color font-weight-bold text-center my-3">{!! $item->text['es']['title'] ?? '' !!}</h6>
                        </a>
                    @endswitch
                </div>
            @endforeach
        </div>
    </div>
    {{--<div class="container">--}}
        {{--<div class="row">--}}
            {{--@foreach($contenido->file ?? [] as $item)--}}
                {{--<div class="col-md-3 text-center mb-5">--}}
                    {{--<img src="{{ asset($item['image']) }}" alt="" class="img-fluid">--}}
                    {{--<h4 class="my-3 font-weight-bold">{{ $item['title'] ?? '' }}</h4>--}}
                {{--</div>--}}
            {{--@endforeach--}}
        {{--</div>--}}
    {{--</div>--}}
    <h1 class="text-center multiled-color mb-5 font-weight-bold">{{ $text['title_2'] ?? '' }}</h1>
    <div class="container-fluid">
        <div class="row justify-content-center">
            @foreach($proyectos ?? [] as $item)
                {{--@dd($item)--}}
                @if(isset($item->text['es']['featured']) == 1)
                <div class="col-md-3 col-sm-12 p-lg-0 p-md-0 p-sm-0 mb-md-0 mb-sm-4 position-relative d-flex align-items-center justify-content-center">
                    <img src="{{ asset($item->file[0]['image']) }}" alt="" class="img-fluid" >
                    <div class="position-absolute">
                        <h3 class="my-3 text-center text-white font-weight-bold  px-4">{{ $item->text['es']['title'] ?? '' }}</h3>
                        <div class="text-center">
                            <a href="{{ route('proyectos.show',$item->slug) }}" class="btn btn-white font-weight-bold multiled-color p-2 px-4" style="border-radius: 5rem">Ingresar</a>
                        </div>
                    </div>
                </div>
                @endif
            @endforeach
        </div>
    </div>

    <div class="position-relative d-flex justify-content-start align-items-center">
        <img src="{{ asset($text['banner'] ?? 'uploads/no-img.png') }}" style="z-index: -1; height: 400px" alt="" class="img-fluid w-100">
        <div class="position-absolute text-white mt-md-5 mt-sm-0" style="   left: 5%;">
            {!! $text['text_2'] ?? '' !!}
            <a href="{{ route('empresa') }}" class="btn bg-white text-capitalize font-weight-bold mt-md-3 mt-sm-0 multiled-color p-2 px-4 rounded-pill">Nosotros</a>
        </div>
    </div>
@endsection
