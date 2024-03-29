@extends('page.layouts.app')
    @section('title','MULTILED - '.  $producto->text['es']['title'] ?? '')
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
    {{--@include('page.partials.breadcrumb')--}}
    @include('page.partials.message')
    <nav class="d-block">
        <ol class="list-unstyled d-flex">
            <li><i class="fas fa-home pr-1"></i>|</li>
            <li class="pl-1">Publicidad</li>
            <li class="pl-1"> |</li>
            <li class="pl-1"><a href=" " style="color: unset;" class="">{{ $text['title'] ?? '' }}</a></li>
        </ol>
    </nav>
    <div class="row my-5">
        {{--@include('page.partials.botonera')--}}

        <div class="col-md-3">
            <ul class="list-unstyled">

                @forelse($senalizacion as $key=>$item)
                    {{--@dd($item)--}}
                    <li class="list-group-item border-0 px-0 py-0 bg-transparent pb-2">
                        <a href="{{ route('p.publicidad.show',$item->slug) }}" data-target="#familia_{{$key}}" data-toggle="collapse" aria-expanded="false" style="color: #595959;" class="d-flex align-items-center px-2 py-1 border-bottom {{ isset($producto) && $producto->id == $item->id ? 'multiled-color' : ''}}  ">
                            <span onclick="location.href='{{ route('p.publicidad.show',$item->slug) }}'">{!! $item->text['es']['title'] ?? $item->title !!}</span><i class="fas fa-chevron-right ml-auto"></i>
                        </a>
                    </li>
                @empty
                    <li><a href="" class="p-2">No hay registros</a></li>
                @endforelse
            </ul>
        </div>
        <div class="col-md-9">
            {{--@dd($producto->slider)--}}
            <div class="row">
                @if(count($producto->slider ?? []) > 0)
                <div class="col-md-12 mb-5">
                    @gallery
                    @slot('gallery',$producto->slider)
                    @endgallery
                </div>
                @endif
                <div class="col-md-6 mb-5">
                    <h1 class="multiled-color font-weight-bold">{{ $text['title'] ?? '' }}</h1>
                    <h5 class="text-muted mb-4">{{ $text['subtitle'] ?? '' }}</h5>
                    {!! $text['text'] ?? '' !!}
                </div>
{{--                    @dd($text)--}}
                <div class="col-md-6 mb-5">
                    <img onerror="this.src='{{ asset('uploads/no-img.png')}}'" src="{{asset($producto->file[0]['image'])}}" alt="" class="img-fluid">
                </div>
                    <div class="col-md-8 offset-md-2 d-flex justify-content-around  mb-5">
                        @if(isset($text['ficha']))
                            <a href="{{ asset($text['ficha']) }}" download class="btn multiled-fondo text-white py-1" style="font-size: 16px;border-radius: 50rem">Ficha técnica</a>
                        @endif
                            <a href="{{ route('presupuesto') }}" class="btn multiled-fondo text-white py-1" style="font-size: 16px;border-radius: 50rem">Solicitar presupuesto</a>
                    </div>
                {{--<div class="col-md-8 offset-2 d-flex justify-content-around  mb-5">--}}
                    {{--@if(isset($text['ficha']))--}}
                    {{--<a href="" class="btn multiled-fondo text-white py-1" style="font-size: 16px;border-radius: 50rem">Ficha técnica</a>--}}
                    {{--@endif--}}
                    {{--<a href="{{ route('contacto') }}" class="btn multiled-fondo text-white py-1" style="font-size: 16px;border-radius: 50rem">Consultar</a>--}}
                {{--</div>--}}
{{--                    @dd($producto->service)--}}
                    @if(count($producto->service) > 0)
                        <div class="col-md-12 mb-5">
                            {{--<p class="p-2 multiled-color border-bottom" style="background-color: #F9F9F9">--}}
                            {{--Productos relacionados--}}
                            {{--</p>--}}
                            {{--                    @dd()--}}
                            <div class="row">
                                @foreach($producto->service as $item)
                                    <div class="col-md-3 mb-4">

                                        <div class="d-flex justify-content-center" >
                                            <img onError="this.src='{{ asset('uploads/no-img.png')}}'" src="{{ asset($item->file[0]['image'] ?? 'uploads/no-img.png') }}" class="img-fluid"   alt="smaple image">

                                        </div>
                                        <h6 style="color: #595959;" class="font-weight-bold text-center my-3">{!! $item->text['es']['title'] ?? '' !!}</h6>

                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endif
                @if(isset($text['aplicaciones']))
                <div class="col-md-12 mb-5">
                    <p class="p-2 multiled-color" style="background-color: #F9F9F9">
                        Especificaciones
                    </p>
                    {!! $text['aplicaciones'] ?? '' !!}
                </div>
                @endif
                @if(isset($text['mensaje']))
                <div class="col-md-12 mb-5">
                    <p class="p-2 multiled-color" style="background-color: #F9F9F9">
                        Aplicaciones
                    </p>
                    {!! $text['mensaje'] ?? '' !!}
                </div>
                @endif
                    {{--@dd($producto)--}}
                    @if(count($producto->video ?? []) > 0)
                        <div class="col-md-12 mb-5">
                            <p class="p-2 multiled-color" style="background-color: #F9F9F9">
                                Videos
                            </p>
                            <div class="row">
                                @foreach($producto->video as $item)
                                    <div class="col-md-6 mt-4">
                                        <div class=" " >
                                            <video class="img-fluid" controls>
                                                <source src="{{ asset($item['video']) }}" type="video/mp4">
                                                {{--<source src="movie.ogg" type="video/ogg">--}}
                                                Your browser does not support the video tag.
                                            </video>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endif
                    <div class="col-md-12">
                        @include('page.partials.form')
                    </div>
                @if(count($producto->related) > 0)
                <div class="col-md-12 mb-5">
                    <p class="p-2 multiled-color border-bottom" style="background-color: #F9F9F9">
                        Productos relacionados
                    </p>
{{--                    @dd()--}}
                    <div class="row">
                        @foreach($producto->related ?? [] as $item)
                            <div class="col-md-4 mb-5">
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
                @endif
            </div>
        </div>
    </div>

</div>

@endsection