@extends('page.layouts.app')
@section('title','MULTILED - PROYECTOS')
@push('style')
    <style>
        /*h2 span{*/
        /*    color: #a9c47f !important;*/
        /*}*/
        .caja:hover {

            box-shadow: 0 5px 11px 0 rgba(0,0,0,0.9)  !important;
            /* color: #000000 !important; */
        }
        .caja {
            transition: color .15s ease-in-out,background-color .15s ease-in-out,border-color .15s ease-in-out,box-shadow .15s ease-in-out,-webkit-box-shadow .15s ease-in-out;
            /* color: #000000 !important; */
        }
    </style>
@endpush
@section('content')
    {{--@include('page.partials.carousel')--}}

    <div class="container my-5 pb-5">
        <a href="{{ route('proyectos') }}" class=""><< Atras</a>
        <div class="row justify-content-center">
            <div class="col-md-8 ">
                <div class=" text-center">
                    <img src="{{ asset($proyecto->file[0]['image']) }}" alt="" class="img-fluid" >
                    <h2 class="my-3 text-center multiled-color font-weight-bold  px-4">{{ $text['title'] ?? '' }}</h2>
                    {!! $text['text'] ?? '' !!}
                </div>
            </div>
        </div>
    </div>
@endsection
