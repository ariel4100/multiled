
@push('style')
    <style>
        .footer ul  li a{
            color: #000000 !important;

        }

    </style>
@endpush
<footer class="footer  pt-4" style="background-color: #F7F7F6; ">
    <div class="container text-center mt-n5">
        <img src="{{ asset($footer ?? '') }}" alt="" class="img-fluid p-2" style="background-color: #F7F7F6">
    </div>
    <div class="container text-center text-md-left">

        <div class="row">



            <div class="col-md-3 mb-md-0 mt-4">
                <p class="text-uppercase font-weight-bold   text-dark">{{ $info_footer['es']['title_2'] ?? '' }}</p>
                <p class="">
                    {{ $info_footer['es']['text_2'] ?? '' }}
                </p>
                {{--<form action=" " method="post">--}}
                    {{--@csrf--}}
                    {{--<div class="input-group md-form mb-3">--}}
                        {{--<input type="text" class="form-control text-white" name="email" placeholder="Ingresa tu Email">--}}
                        {{--<div class="input-group-append">--}}
                            {{--<button class="btn btn-md wolf-fondo m-0 p-0 px-3" type="submit"> <i class="fas fa-chevron-right"></i> </button>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                {{--</form>--}}
                {{--<div class="d-flex justify-content-center align-items-center">--}}
                    {{--<p class="text-uppercase m-0">SEGUINOS EN</p>--}}
                    {{--<div class="">--}}
                        {{--<a href="{{ $redes->text['es']['facebook'] ?? '' }}" class="pl-2"><i class="fab fa-facebook-square fa-2x" style="color: #CCCCCC"></i></a>--}}
                        {{--<a href="{{ $redes->text['es']['instagram'] ?? '' }}" class="px-3"><i class="fab fa-instagram fa-2x" style="color: #CCCCCC"></i></a>--}}
                    {{--</div>--}}
                {{--</div>--}}
            </div>
            {{--            @dd($redes->text['es']['facebook'])--}}
            <div class="col-md-3 mb-md-0 mt-4">
                <p class="text-uppercase wolf-color font-weight-bold text-dark">SECCIONES</p>
                <ul class="list-unstyled">
                    <li>
                        <a href="{{ url('/') }} " class="text-uppercase">INICIO</a>
                    </li>
                    <li>
                        <a href="{{ url('jolden.empresa') }}" class="text-uppercase">EMPRESA</a>
                    </li>
                    <li>
                        <a href="{{ url('jolden.familias') }}" class="text-uppercase">PRODUCTOS</a>
                    </li>
                    <li>
                        <a href="{{ url('jolden.novedades') }}" class="text-uppercase">NOVEDADES</a>
                    </li>
                    <li>
                        <a href="{{ url('jolden.contacto') }}" class="text-uppercase">CONTACTO</a>
                    </li>
                </ul>
            </div>

            <div class="col-md-3 mb-md-0 mt-4">
                <p class="text-uppercase wolf-color font-weight-bold text-dark">PRODUCTOS</p>
                <ul class="list-unstyled">
                    @foreach($familias ?? [] as $item)
                        <li>
                            <a href="{{ url('jolden.familia',$item->slug) }}" class="text-uppercase">{{ $item->text['es']['title'] ?? '' }}</a>
                        </li>
                    @endforeach
                    {{--<li>--}}
                        {{--<a href="{{ url('/') }} " class="text-uppercase">Lista General</a>--}}
                    {{--</li>--}}
                    {{--<li>--}}
                        {{--<a href="{{ url('/') }}" class="text-uppercase">Herramientas Hidráulicas</a>--}}
                    {{--</li>--}}
                    {{--<li>--}}
                        {{--<a href="{{ url('/') }}" class="text-uppercase">Herramientas Neumáticas</a>--}}
                    {{--</li>--}}
                    {{--<li>--}}
                        {{--<a href="{{ url('/') }}" class="text-uppercase">Ruedas</a>--}}
                    {{--</li>--}}

                </ul>
            </div>

            <div class="col-md-3 mb-md-0 mt-4">
                <p class="text-uppercase wolf-color font-weight-bold text-dark">JOLDEN S.A.</p>
                <ul class="list-group"  >
                    <li class="list-group-item border-0 d-flex align-items-center px-0 py-1" style="background-color: unset">
                        <i class="fas fa-map-marker-alt fa-lg jolden-color2 mr-3 "></i>
                        @foreach($contacto['address'] ?? [] as $item)
                            {{--@dd($item)--}}
                            <a href="https://goo.gl/maps/zQLpyuPParBCJdnX7" target="_blank">{!! $item['address'] ?? ''  !!}</a>
                        @endforeach

                    </li>
                    <li class="list-group-item border-0 d-flex align-items-center px-0 py-1" style="background-color: unset">
                        <i class="fas fa-phone-volume fa-lg jolden-color2 mr-3 "></i>
                        <div class="d-flex flex-column">
                            @foreach($contacto['phones'] ?? [] as $item)
                                                                {{--@dd($item)--}}
                                <a href="tel:{!! $item['numero'] ?? '' !!}">{!! $item['numero'] ?? '' !!}</a>
                            @endforeach

                        </div>
                    </li>
                    <li class="list-group-item border-0 d-flex align-items-center px-0 py-1" style="background-color: unset">
                        <i class="fas fa-envelope fa-lg jolden-color2 mr-3 "></i>
                        <div class="">
                            @foreach($contacto['emails'] ?? [] as $item)
{{--                                @dd($item)--}}
                                <a href="mailto:{!! $item['email'] ?? '' !!}">{!! $item['email'] ?? '' !!}</a>
                            @endforeach
                        </div>
                    </li>
                </ul>
            </div>
        </div>
        <!-- Grid row -->

    </div>
    <!-- Footer Links -->

    <!-- Copyright -->
    <div class="container text-center py-3 d-flex justify-content-between border-top">
        <p class="m-0">© 2019</p>
        <a href=" " class="text-dark"> BY OSOLE</a>
    </div>
    <!-- Copyright -->

</footer>
<!-- Footer -->
