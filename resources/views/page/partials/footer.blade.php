
@push('style')
    <style>
        .footer ul  li a{
            color: #000000 !important;

        }

    </style>
@endpush
<footer class="footer  pt-4" style="background-color: #F7F7F6;">
    <div class="container text-center mt-n5" style="">
        <img src="{{ asset($footer ?? '') }}" alt="" class="img-fluid p-2" style="background-color: #F7F7F6">
    </div>
    <div class="container text-center text-md-left">
        <div class="row">
            <div class="col-md-3 mb-md-0 mt-4">
                <h5 class="text-uppercase font-weight-bold text-dark">Productos</h5>
                <ul class="list-unstyled">
                    {{--@foreach($familias ?? [] as $item)--}}
                        {{--<li>--}}
                            {{--<a href="{{ url('jolden.familia',$item->slug) }}" class="text-uppercase">{{ $item->text['es']['title'] ?? '' }}</a>--}}
                        {{--</li>--}}
                    {{--@endforeach--}}
                    <li>
                    <a href="{{ route('p.senalizacion') }} " class="text-uppercase">Señalización</a>
                    </li>
                    <li>
                    <a href="{{ route('f.iluminacion') }}" class="text-uppercase">Iluminación</a>
                    </li>
                    <li>
                    <a href="{{ route('f.iluminacion') }}" class="text-uppercase">Publicidad</a>
                    </li>
                    <li>
                    <a href="{{ route('p.vial') }}" class="text-uppercase">Vial</a>
                    </li>

                </ul>
            </div>
            {{--            @dd($redes->text['es']['facebook'])--}}
            <div class="col-md-3 mb-md-0 mt-4">
                <h5 class="text-uppercase wolf-color font-weight-bold text-dark">SITEMAP</h5>
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
                <h5 class="text-uppercase wolf-color font-weight-bold text-dark">INFORMACIÓN</h5>
                <ul class="list-unstyled">
                    {{--<li>--}}
                        {{--<a href="#" class="text-uppercase">Condiciones generales</a>--}}
                    {{--</li>--}}
                    <li>
                        <p class=" m-0 p-0 text-uppercase">Términos y condiciones generales</p>
                    </li>
                </ul>
                <h5 class="text-uppercase wolf-color font-weight-bold text-dark">SEGUINOS EN </h5>
                <a href="{{ $redes[0]['link'] ?? '' }}" class="px-2"><i style="padding: 0.5rem 0.7rem " class="fab fa-facebook-f  stylish-color text-white rounded-pill"></i></a>
                <a href="{{ $redes[1]['link'] ?? '' }}" class="px-2"><i style=" " class="fab fa-twitter  p-2 stylish-color text-white rounded-pill"></i></a>
                <a href="{{ $redes[2]['link'] ?? '' }}" class="pl-2"><i style=" " class="fab fa-instagram  p-2 stylish-color text-white rounded-pill"></i></a>
            </div>

            <div class="col-md-3 mb-md-0 mt-4">
                <h5 class="text-uppercase wolf-color font-weight-bold text-dark">NEWSLETTER</h5>
                 {{--<div class="">--}}
                     {{--<h6 class="font-weight-bold">Manténgase informado de todas nuestras nuevas colecciones, noticias y eventos especiales a través de nuestro newsletter</h6>--}}
                     {{--<div class="md-form input-group mb-3">--}}
                         {{--<input type="text" class="form-control" placeholder="Ingresar Email" aria-describedby="MaterialButton-addon2">--}}
                         {{--<div class="input-group-append">--}}
                             {{--<button class="btn btn-md multiled-fondo rounded-pill text-white m-0 px-4 font-weight-bold" type="button" id="MaterialButton-addon2">ENVIAR</button>--}}
                         {{--</div>--}}
                     {{--</div>--}}

                 {{--</div>--}}
                {{--<p class="text-uppercase font-weight-bold wolf-color">SUSCRIBITE A NUESTRAS NOVEDADES</p>--}}
                <form action="{{ route('newsletter.store') }}" method="post">
                    @csrf
                    <div class="md-form input-group mb-3">
                        <input type="email" class="form-control" name="email" placeholder="Ingresar Email" aria-describedby="MaterialButton-addon2">
                        <div class="input-group-append">
                            <button class="btn btn-md multiled-fondo rounded-pill text-white m-0 px-4 font-weight-bold" type="submit" id="MaterialButton-addon2">ENVIAR</button>
                        </div>
                    </div>
                </form>
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
