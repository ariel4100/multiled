@push('style')
    <style>
        {{--.imagen{--}}
        {{--background: url('{{ asset('uploads/homeiz.png') }}'), url('{{ asset('uploads/homeder.png') }}');--}}
        {{--background-repeat: no-repeat;--}}
        {{--background-position: left, right;--}}
        {{--padding: 3rem;--}}
    {{--}--}}
  .carousel-caption{
            right: unset;
            top: 20%;
            bottom: unset;
            left: 10%;
            text-align: left;
        }
    /*.carousel-caption h2{*/
            /*text-shadow: 2px 1px #000;*/
            /*font-weight: bold;*/
        /*}*/
        /*.cajap {*/
            /*position: relative;*/
            /*width: 570px;*/

            /*!*background-color: #10462F;*!*/
            /*display: flex;*/
            /*justify-content: center;*/
            /*align-items: center;*/
            /*background-blend-mode: multiply;*/
        /*}*/
        /*.cajap::before {*/
            /*mix-blend-mode: multiply;*/
            /*position: absolute;*/
            /*content: '';*/
            /*background-color: #008C95 ;*/
            /*top: 0;*/
            /*left: 0;*/
            /*bottom: 0;*/
            /*right: 0;*/
        /*}*/
        /*.caption {*/
            /*position: absolute;*/
            /*right: 15%;*/
            /*!*bottom: 20px;*!*/
            /*left: 10%;*/
            /*!*z-index: unset !important;*!*/
            /*padding-top: 20px;*/
            /*padding-bottom: 20px;*/
            /*color: #fff;*/

        /*}*/
    </style>
@endpush

<!--Carousel Wrapper-->
<div id="carousel-example-2" class="carousel slide carousel-fade" data-ride="carousel">
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
        <div class="carousel-item {{ $key == 0 ? 'active' : null }}">
            <div class="view">
                <img onerror="this.src='{{ asset('uploads/no-img.png')}}'" class="d-block w-100" style="height: 400px;" src="{{ asset($s['image']) }}"
                     alt="First slide">
                {{--<div class="mask rgba-black-light"></div>--}}
            </div>
            @if(isset($s['title']))
                <div class="carousel-caption" >
                    <h1 class="h1-responsive" style="white-space: pre-line; font-size: 45px">{!! $s['title'] ?? '' !!}</h1>
                    <p style="white-space: pre-line">{!! $s['text'] ?? '' !!}</p>
                    @if($key == 0)
                        <a href="{{ route('contacto') }}" class="btn bg-white text-capitalize font-weight-bold ml-0 multiled-color p-2 px-4 rounded-pill">Contacto</a>
                    {{--<a href="" class="btn bg-white text-capitalize text-dark rounded-pill p-2 px-4 multiled-color" style="font-size: 18px;">Contacto</a>--}}
                    @endif
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
