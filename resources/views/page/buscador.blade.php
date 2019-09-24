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
            @forelse($resultado as $item)
                {{--@dd($item->file['imagenes'])--}}
                <div class="col-md-3 col-sm-6  mb-5">
                    <a href="{{ route('productos',$item->slug) }}" class="">
                        <div class="">
                            <div class="text-center " >
                                <img onError="this.src='{{ asset('uploads/no-img.png')}}'" class="img-fluid w-100" src="{{ asset($item->file['imagenes'][0]['image'] ?? '') }}"  style=" height: 250px">
                            </div>
                            <div class=" d-flex justify-content-center align-items-center border" style="height: 100px;">
                                <div class="text-center">
                                    <h5 class="font-weight-bold multiled-color">
                                        {!! $item->title ?? $item->text['es']['title'] !!}
                                    </h5>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            @empty
                <div class="col">
                    <h4>No se encontraron resultados</h4>
                </div>
            @endforelse
        </div>
    </div>
@endsection
