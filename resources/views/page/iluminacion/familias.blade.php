@extends('page.layouts.app')
@section('title','MULTILED - NUESTROS PRODUCTOS')
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
    <h1 class="multiled-color font-weight-bold">Seleccione una categoría</h1>
    <div class="row my-5">
        @foreach($familias as $item)
        <div class="col-md-3 mb-5">
            <!--Zoom effect-->
            {{--@dd($item->file[0])--}}
            <a href="{{ route('p.iluminacion',$item->slug) }}" class="" style="color: unset;">
                <div class="view overlay zoom">
                    <img onError="this.src='{{ asset('uploads/no-img.png')}}'" src="{{ asset($item->file[0]['image'] ?? 'uploads/no-img.png') }}" class="img-fluid w-100" alt="smaple image">
                    <div class="mask caja flex-center" style="background-color: rgba(0, 0, 0,0.4);">
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