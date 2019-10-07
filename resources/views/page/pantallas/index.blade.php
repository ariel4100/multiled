@extends('page.layouts.app')
    @section('title','MULTILED - '.  'Señalización')
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
    {{--<nav class="d-flex justify-content-center mb-n4">--}}
         {{--<h4 class="p-2 text-white font-weight-bold bg-dark">CATEGORÍAS DE PRODUCTOS</h4>--}}
    {{--</nav>--}}
    <h1 class="multiled-color font-weight-bold">Pantallas led</h1>
    {{--<hr class="bg-dark m-0 pt-1">--}}
    <div class="row my-5">
        {{--@include('page.partials.botonera')--}}

        <div class="col-md-12">

            <div class="row">
                @foreach($senalizacion as $item)
                    <div class="col-md-3 mb-5">
                        <!--Zoom effect-->
                        <a href="{{ route('p.pantallas.show',$item->slug) }}" class="">
                            <div class="view overlay zoom d-flex justify-content-center" style="height: 200px">
                                <img onError="this.src='{{ asset('uploads/no-img.png')}}'" src="{{ asset($item->file[0]['image'] ?? 'uploads/no-img.png') }}" class="d-block w-100"   alt="smaple image">
                                <div class="mask caja flex-center" style="background-color: rgba(0, 0, 0,0.4)">
                                    <p class="text-white" style="z-index: 11"><i class="fas fa-plus fa-2x"></i></p>
                                </div>
                            </div>
                            <h6 style="color: #595959;" class="font-weight-bold text-center my-3">{!! $item->text['es']['title'] ?? '' !!}</h6>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

</div>

@endsection