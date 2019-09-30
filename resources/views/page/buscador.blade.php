@extends('page.layouts.app')
@section('title','MULTILED - BUSCADOR')
@push('style')
    <style>

    </style>
@endpush
@section('content')
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <h2 class="py-2 font-weight-bold multiled-color" style="border-bottom: 2px solid #07472D; width: 100px">Buscador</h2>
            </div>
        </div>
        <form class="row justify-content-center my-4" action="{{ route('buscador') }}" method="get">
            <div class="col-md-6">
                <input type="text" name="name" class="form-control my-2" placeholder="Buscar...">
            </div>
            <div class="col-md-6">
                <button type="submit" class="btn btn-md multiled-fondo text-white py-2 my-2" style="font-size: .80rem">Buscar</button>
            </div>
        </form>


        <div class="row my-5">
            @forelse($resultado ?? [] as $item)
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

            @empty
                <div class="col">
                    <h4>No se encontraron resultados</h4>
                </div>
            @endforelse
        </div>
    </div>
@endsection
