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
<div class="container my-5">
    <h1 class="  multiled-color font-weight-bold mb-3">Proyectos</h1>

</div>
    <div class="container mb-5 pb-5">
        <div class="row justify-content-center">
            @foreach($proyectos  ?? [] as $item)
                <div class="col-md-3 ">
                    <div class="caja  d-flex align-items-center">
                        <img src="{{ asset($item->file[0]['image']) }}" alt="" class="img-fluid" >
                        <a href="{{ route('proyectos.show',$item->slug) }}" class="position-absolute">
                            <h3 class="my-3 text-center text-white font-weight-bold  px-4">{{ $item->text['es']['title'] ?? '' }}</h3>
                        </a>
                    </div>
                </div>

            @endforeach
        </div>
    </div>
@endsection
