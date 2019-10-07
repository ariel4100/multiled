@extends('page.layouts.app')
    @section('title','MULTILED - '.  'Vial')
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
    <div id="carouselExampleControls" class="carousel slide" data-ride="carousel" >
        <div class="carousel-inner " style="height: 300px">
            <div class="carousel-item active">
                <img src="{{ asset($slider->file[0]['image'] ?? '') }}" class="d-block w-100" alt="...">
            </div>

        </div>
        <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
    {{--@dd($slider->file[0]['image'])--}}
{{--    <img src="{{ asset($slider->file[0]['image'] ?? '') }}" alt="" style="height: 300px" class="img-fluid w-100">--}}
<div class="container my-5">
    {{--@include('page.partials.breadcrumb')--}}
    <nav class="d-block">
        <ol class="list-unstyled d-flex">
            <li><i class="fas fa-home pr-1"></i>|</li>
            <li class="pl-1">Vial</li>
        </ol>
    </nav>
    <div class="row my-5">
        {{--@include('page.partials.botonera')--}}

        <div class="col-md-3">
            <ul class="list-unstyled">

                @forelse($vial as $key=>$item)
                    {{--@dd($item)--}}
                    <li class="list-group-item border-0 px-0 py-0 bg-transparent pb-2">
                        <a href="{{ route('p.vial.show',$item->slug) }}" data-target="#familia_{{$key}}" data-toggle="collapse" aria-expanded="false" style="color: #595959;" class="d-flex align-items-center px-2 py-1 border-bottom {{ isset($familia) && $familia->id == $item->id ? 'multiled-color' : ''}}  ">
                            <span onclick="location.href='{{ route('p.vial.show',$item->slug) }}'">{!! $item->text['es']['title'] ?? $item->title !!}</span><i class="fas fa-chevron-right ml-auto"></i>
                        </a>
                    </li>
                @empty
                    <li><a href="" class="p-2">No hay registros</a></li>
                @endforelse
            </ul>
        </div>
        <div class="col-md-9">

            <div class="row">
                @foreach($vial as $item)
                    <div class="col-md-4 mb-5">
                        <!--Zoom effect-->
                        <a href="{{ route('p.vial.show',$item->slug) }}" class="">
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