@extends('page.layouts.app')
@section('title','MULTILED - NOSOTROS')
@section('content')
    @include('page.partials.carousel')
<div class="container my-5">
    <h1 class="jolden-color2 my-5 font-weight-bold text-center">{{ $text['title'] ?? '' }}</h1>
    <div class="row pb-5">
        <div class="col-md-6">
            <img src="{{ asset($contenido->file[0]['image']) }}" alt="" class="img-fluid">
        </div>
        <div class="col-md-6">
            {!! $text['text'] ?? '' !!}
        </div>
    </div>

</div>
    {{--<div class="container-fluid">--}}
        {{--<div class="row jolden-fondo">--}}
            {{--<div class="container my-5 pb-5">--}}
                {{--<div class="row">--}}
                    {{--<div class="col-md-12 mb-4">--}}
                        {{--<h1 class=" text-white font-weight-bold">{{ $text['title_2'] ?? '' }}</h1>--}}
                    {{--</div>--}}
                    {{--<div class="col-md-6 text-white">--}}
                        {{--{!! $text['text_2'] ?? '' !!}--}}
                    {{--</div>--}}
                    {{--<div class="col-md-6">--}}
                        {{--<div class="row">--}}
                            {{--@foreach($contenido->file as $k=>$item)--}}
                                {{--@if($k == 0) @continue @endif--}}
                                {{--<div class="col-md-2 text-right mb-2">--}}
                                    {{--<img src="{{ asset($item['image']) }}" alt="" class="img-fluid">--}}
                                {{--</div>--}}
                                {{--<div class="col-md-10 mb-2">--}}
                                    {{--<h4 class="my-2 text-white">{{ $item['title'] ?? '' }}</h4>--}}
                                {{--</div>--}}
                            {{--@endforeach--}}
                        {{--</div>--}}
                    {{--</div>--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</div>--}}
@endsection
