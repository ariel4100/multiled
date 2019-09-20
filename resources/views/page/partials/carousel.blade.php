@push('style')
    <style>
        {{--.imagen{--}}
        {{--background: url('{{ asset('uploads/homeiz.png') }}'), url('{{ asset('uploads/homeder.png') }}');--}}
        {{--background-repeat: no-repeat;--}}
        {{--background-position: left, right;--}}
        {{--padding: 3rem;--}}
    {{--}--}}

    .carousel-caption h2{
            text-shadow: 2px 1px #000;
            font-weight: bold;
        }
        .cajap {
            position: relative;
            width: 570px;

            /*background-color: #10462F;*/
            display: flex;
            justify-content: center;
            align-items: center;
            background-blend-mode: multiply;
        }
        .cajap::before {
            mix-blend-mode: multiply;
            position: absolute;
            content: '';
            background-color: #008C95 ;
            top: 0;
            left: 0;
            bottom: 0;
            right: 0;
        }
        .caption {
            position: absolute;
            right: 15%;
            /*bottom: 20px;*/
            left: 10%;
            /*z-index: unset !important;*/
            padding-top: 20px;
            padding-bottom: 20px;
            color: #fff;

        }
    </style>
@endpush
<!--Carousel Wrapper-->
<div id="carousel-example-2" class="carousel slide carousel-fade carrousel-sm" data-ride="carousel" style="font-family: 'Raleway', sans-serif;">
    <!--Indicators-->
    <ol class="carousel-indicators">
        @foreach($slider ?? [] as $key=>$s)
            <li data-target="#carousel-example-2" data-slide-to="{{$key}}" class="{{ $key == 0 ? 'active' : null }}"></li>
        @endforeach
    </ol>
    <!--/.Indicators-->
    <!--Slides-->

    <div class="carousel-inner" role="listbox">
        @foreach($slider ?? [] as $key=>$s)
            <div class="carousel-item  {{ $key == 0 ? 'active' : null }}" style="display:flex; justify-content:start; align-items:center; background-image: url('{{ asset($s['image']) }}'); background-position: center; background-size: cover; background-repeat: no-repeat; height: 400px">
                {{--<div class="view">--}}
                    {{--@dd($s['title'])--}}
                    {{--<img class="d-block w-100" src="{{ asset($s['image']) }}"--}}
                         {{--alt="First slide">--}}
                    {{--<div class="mask" style=""></div>--}}
                {{--</div>--}}
                @if($s['title'])
                <div class="caption cajap text-white wow fadeInLeft" style="">
                    <div class="  px-3" style="z-index: 1">
                        <div class=" mt-n5">
                            <span class="text-white jolden-fondo2 font-weight-bold" style="font-size: 40px; line-height: 1;white-space: pre-line;">{!! $s['title'] ?? '' !!}</span>
                        </div>
                        <p class="mt-3" style="white-space: pre-line">{!! $s['text'] ?? '' !!}</p><br>
                        <a href="{{ route('jolden.familias') }}" class="btn bg-white rounded-pill btn-md text-dark my-2">PRODUCTOS</a>
                    </div>
                </div>
                @endif
            </div>
        @endforeach
    </div>
    <!--/.Slides-->
    <!--Controls-->
    <a class="carousel-control-prev" href="#carousel-example-2" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carousel-example-2" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
    <!--/.Controls-->
</div>
<!--/.Carousel Wrapper-->
