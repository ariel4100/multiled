@push('style')
    <style>

        .mega-menu{
            width: 400px;
        }

    </style>
@endpush
<div class="fix ed-top bg-white">
    <nav class="navbar navbar-expand-lg d-flex flex-column navbar-dark p-0" >
        <div class="w-100" >
            <div class="container p-0 pt-2">
                <div class="row">
                    <div class="col-md-12 p-0 d-flex align-items-center justify-content-end">

                        {{--<p class="m-0 text-white">Seguinos en</p>--}}
                        {{--<a href="wp:{{ $contacto[0]['whatsaap'] ?? '' }}" class="pl-2 d-none d-md-block"><i class="fab fa-whatsapp   mr-2 fa-lg" style="color: #25D366"></i>{{ $contacto[0]['whatsaap'] ?? '' }}</a>--}}
                        {{--<a href="{{ $contacto[0]['telefono'] ?? '' }}" class="pl-3 d-none d-md-block"><i class="fas fa-phone-volume wolf-color mr-2 fa-lg"></i><i class="fas fa-phone-alt"></i>{{ $contacto[0]['telefono'] ?? '' }}</a>--}}
                        {{--<div class="mx-1 d-none d-md-block">/</div>--}}
                        {{--<a href="{{ $contacto[0]['telefono1'] ?? '' }}" class=" d-none d-md-block">{{ $contacto[0]['telefono1'] ?? '' }}</a>--}}

                        {{--<span class="d-none d-sm-block border-left">--}}
                        {{--<i class="far fa-envelope mx-2" style="color: #D33538;"></i>--}}
                        {{--<a href="mailto:{{ $contacto->text['es']['correo'] ?? '' }}" class="text-white">{{ $contacto->text['es']['correo'] ?? '' }}</a>--}}
                        {{--</span>--}}
                        {{--</div>--}}
                        {{--<div class="col-md-6 d-flex align-items-center justify-content-end">--}}
                        <a href="{{ route('empresa') }}" class=" d-none d-md-block nav-link font-weight-bold" >
                            NOSOTROS
                        </a>
                        <a href="{{ route('proyectos') }}" class=" d-none d-md-block nav-link font-weight-bold" >
                            PROYECTOS
                        </a>
                        {{--@if(!auth()->guard('client')->check())--}}
                            {{--<div class="dropdown">--}}
                                {{--<a class=" nav-link ml-2 font-weight-bold border-left border-right"  data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">--}}
                                    {{--<i class="far fa-user-circle fa-lg mr-2 multiled-color2"></i>CLUB MULTILED</a>--}}
                                {{--</a>--}}
                                {{--<form action="{{ url('jolden.private.login') }}" method="post" class="dropdown-menu p-3" style="min-width: 15rem !important;">--}}
                                    {{--@csrf--}}
                                    {{--<div class="form-group">--}}
                                        {{--<label for="exampleDropdownFormEmail2">Usuario</label>--}}
                                        {{--<input type="text" class="form-control" name="username" id="exampleDropdownFormEmail2">--}}
                                    {{--</div>--}}
                                    {{--<div class="form-group">--}}
                                        {{--<label for="exampleDropdownFormPassword2">Contraseña</label>--}}
                                        {{--<input type="password" class="form-control" name="password" id="exampleDropdownFormPassword2">--}}
                                    {{--</div>--}}
                                    {{--                                    <div class="form-group">--}}
                                    {{--                                        <div class="form-check">--}}
                                    {{--                                            <input type="checkbox" class="form-check-input" id="dropdownCheck2">--}}
                                    {{--                                            <label class="form-check-label" for="dropdownCheck2">--}}
                                    {{--                                                Remember me--}}
                                    {{--                                            </label>--}}
                                    {{--                                        </div>--}}
                                    {{--                                    </div>--}}
                                    {{--<button type="submit" class="btn multiled-fondo text-white">Ingresar</button>--}}
                                {{--</form>--}}
                            {{--</div>--}}
                            {{--                             <a class="nav-link ml-2 font-weight-bold  {{ request()->is('cliente/login') ? 'activo' : '' }} " href="{{ url('multiled.registro') }}"><i class="far fa-user-circle fa-lg mr-1 multiled-color2"></i>ZONA PRIVADA</a>--}}
                        {{--@else--}}
                            {{--<span class="text-uppercase  ml-4 font-weight-bold text-dark">--}}
                                {{--<i class="far fa-user-circle fa-lg mr-1 multiled-color2"></i>--}}
                                    {{--<a href="{{ url('jolden.p.novedades') }}" class="font-weight-bold text-dark">{{  Auth()->guard('client')->user()->name ?? 'Admin' }}</a>--}}
                                {{--<a href="{{ url('jolden.private.logout') }}" class="font-weight-bold text-dark"> | SALIR</a>--}}
                            {{--</span>--}}
                        {{--@endif--}}
                        <div class="d-none d-md-block">
                        <span class="d-flex align-items-center justify-content-end ml-2 pr-2 ">
                         <i class="fas fa-phone-volume mr-2 fa-lg multiled-color"></i>
                            <a href="tel:{{ $contacto['phones'][0]['numero'] ?? '' }}" class="multiled-color font-weight-bold ">
                            Atención al cliente <br><h5><b class="font-weight-bold">{{ $contacto['phones'][0]['numero'] }}</b></h5>
                            </a>
                        </span>
                        </div>
                        <a href="{{ $redes[0]['link'] ?? '' }}" target="_blank" class="px-2"><i style="padding: 0.5rem 0.7rem " class="fab fa-facebook-f  stylish-color text-white rounded-pill"></i></a>
                        <a href="{{ $redes[1]['link'] ?? '' }}" target="_blank" class="px-2"><i style=" " class="fab fa-twitter  p-2 stylish-color text-white rounded-pill"></i></a>
                        <a href="{{ $redes[2]['link'] ?? '' }}" target="_blank" class="pl-2"><i style=" " class="fab fa-instagram  p-2 stylish-color text-white rounded-pill"></i></a>

                        <a href="{{ url('buscador') }}" class="ml-2">
                            <i class="fas fa-search fa-lg rounded-pill p-2 text-muted" aria-hidden="true"></i>
                        </a>

                    </div>
                </div>
            </div>
        </div>

        <div class="container p-0" style="background-color: #ffffff">
            @if(request()->is('privada*'))
{{--                                    @dd(Auth()->guard('client')->user())--}}
                @if(Auth()->guard('client')->user()->type == 'client')
{{--                    @dd($cliente_elegido->type)--}}
                    <a class="navbar-brand ml-3" href="{{ url('jolden.p.productos') }}"><img src="{{ asset($header ?? '') }}" alt="" class="img-fluid"></a>
                @endif
                    @if(Auth()->guard('client')->user()->type  == 'seller')
                        {{--                    @dd($cliente_elegido->type)--}}
                        <a class="navbar-brand ml-3" href="{{ url('jolden.p.pedidos') }}"><img src="{{ asset($header ?? '') }}" alt="" class="img-fluid"></a>
                    @endif
                {{--<a class="navbar-brand ml-3" href="{{ url('jolden.p.pedidos') }}"><img src="{{ asset($header ?? '') }}" alt="" class="img-fluid"></a>--}}
            @else
                <a class="navbar-brand ml-3" href="{{ url('/') }}"><img src="{{ asset($header ?? '') }}" alt="" class="img-fluid"></a>
            @endif

            <button class="navbar-toggler text-dark" type="button" data-toggle="collapse" data-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fas fa-bars"></i>
            </button>
            <div class="collapse navbar-collapse flex-md-column" id="navbarNav">
                <ul class="navbar-nav ml-auto d-flex align-items-center">
                    <!-- Features -->

                    {{--<li class="nav-item"><a class="nav-link ml-2 {{ request()->is('catalogos') ? 'activo' : '' }}" href="{{ url('jolden.iluminacion') }}">CATÁLOGO</a></li>--}}

                    @if(request()->is('privada*'))
                        @if(Auth()->guard('client')->user()->type == 'client')

                            <li class="nav-item"><a class="nav-link mx-2 font-weight-bold  {{ request()->is('privada/pedidos/productos') ? 'activo' : '' }} " href="{{ url('jolden.p.productos') }}">CATÁLOGOS</a></li>

                        @else
                            @if($cliente_elegido)
                                {{--@dd($cliente_elegido)--}}
                                <li class="nav-item"><a class="nav-link mx-2 font-weight-bold  {{ request()->is('privada/pedidos/productos') ? 'activo' : '' }} " href="{{ url('jolden.p.productos') }}">CATÁLOGOS</a></li>
                            @else

                                <li class="nav-item"><a class="nav-link mx-2 font-weight-bold  {{ request()->is('privada/pedidos') ? 'activo' : '' }} " href="{{ url('jolden.p.pedidos') }}">CATÁLOGOS</a></li>

                            @endif
                            {{--<li class="nav-item"><a class="nav-link mx-2 font-weight-bold  {{ request()->is('/') ? 'activo' : '' }} " href="{{ url('jolden.p.pedidos') }}">CATÁLOGOS</a></li>--}}

                        @endif
                            <li class="nav-item"><a class="nav-link mx-2 font-weight-bold  {{ request()->is('privada/carrito') ? 'activo' : '' }} " href="{{ url('jolden.p.carrito') }}">CARRITO (<count></count>)</a></li>
                            <li class="nav-item"><a class="nav-link mx-2 font-weight-bold  {{ request()->is('privada/mi-cuenta') ? 'activo' : '' }} " href="{{ url('jolden.p.micuenta') }}">HISTORIAL</a></li>
                            <li class="nav-item"><a class="nav-link mx-2 font-weight-bold  {{ request()->is('privada/novedad') ? 'activo' : '' }} " href="{{ url('jolden.p.novedades') }}">NOVEDADES</a></li>
                            <li class="nav-item"><a class="nav-link mx-2 font-weight-bold  {{ request()->is('privada/descargas') ? 'activo' : '' }} " href="{{ url('jolden.p.descargas') }}">DESCARGAS</a></li>
                            <a href="{{ url('jolden.p.buscador') }}" class="ml-2">
                                <i class="fas fa-search jolden-fondo2  rounded-pill p-2 text-white" aria-hidden="true"></i>
                            </a>

                    @else
                        <li class="nav-item "><a class="nav-link mx-2 font-weight-bold  {{ request()->is('novedades') ? 'activo' : '' }} " href="{{ route('novedades') }}">NEWS</a></li>
                        <li class="nav-item d-md-none d-sm-block"><a class="nav-link mx-2 font-weight-bold  {{ request()->is('nosotros') ? 'activo' : '' }} " href="{{ route('empresa') }}">NOSOTROS</a></li>
                        <li class="nav-item d-md-none d-sm-block"><a class="nav-link mx-2 font-weight-bold  {{ request()->is('proyectos') ? 'activo' : '' }} " href="{{ route('proyectos') }}">PROYECTOS</a></li>
                        {{--@foreach($familias as $item)--}}
                            {{--<li class="nav-item"><a class="nav-link mx-2 font-weight-bold  {{ request()->is('presupuesto') ? 'activo' : '' }} " href="{{ route('familia',$item->slug) }}">{{ $item->text['es']['title'] ?? '' }}</a></li>--}}
                        {{--@endforeach--}}
                        <li class="nav-item"><a class="nav-link mx-2 font-weight-bold  {{ request()->is('señalización*') ? 'activo' : '' }} " href="{{ route('p.senalizacion') }}">SEÑALIZACIÓN</a></li>
                        <li class="nav-item"><a class="nav-link mx-2 font-weight-bold  {{ request()->is('iluminación*') ? 'activo' : '' }} " href="{{ route('f.iluminacion') }}">ILUMINACIÓN</a></li>
                        <li class="nav-item"><a class="nav-link mx-2 font-weight-bold  {{ request()->is('novedades') ? 'activo' : '' }} " href="{{ route('p.senalizacion') }}">PUBLICIDAD</a></li>
                        <li class="nav-item"><a class="nav-link mx-2 font-weight-bold  {{ request()->is('vial*') ? 'activo' : '' }} " href="{{ route('p.vial') }}">VIAL</a></li>
                        <li class="nav-item"><a class="nav-link mx-2 font-weight-bold  {{ request()->is('presupuesto') ? 'activo' : '' }} " href="{{ route('presupuesto') }}">SOLICITAR PRESUPUESTO</a></li>
                        <li class="nav-item"><a class="nav-link mx-2 font-weight-bold  {{ request()->is('contacto') ? 'activo' : '' }} " href="{{ route('contacto') }}">CONTACTO</a></li>

                    @endif


                    {{--<a href="wp:{{ $contacto[0]['whatsaap'] ?? '' }}" class="mt-4 d-md-none d-sm-block"><i class="fab fa-whatsapp wolf-color mr-2 fa-lg"></i>{{ $contacto[0]['whatsaap'] ?? '' }}</a>--}}
                    {{--<a href="{{ $contacto[0]['telefono'] ?? '' }}" class="mt-4 d-md-none d-sm-block"><i class="fas fa-phone-volume wolf-color mr-2 fa-lg"></i><i class="fas fa-phone-alt"></i>{{ $contacto[0]['telefono'] ?? '' }}</a>--}}
                    {{--<span class="d-md-none d-sm-block mt-4 d-flex align-items-center">--}}
                            {{--<i class="far fa-envelope mx-2 fa-lg wolf-color"></i>--}}
                            {{--<a href="mailto:{{ $contacto[0]['correo'] ?? '' }}" class="text-whi te ">{{ $contacto[0]['correo'] ?? '' }}</a>--}}
                        {{--</span>--}}
                    {{--@else--}}
                    {{--<li class="nav-item"><a class="nav-link ml-2 {{ request()->is('cliente') ? 'activo' : '' }}" href="{{ url('jolden.client.home') }}">CATÁLOGO</a></li>--}}
                    {{--<li class="nav-item"><a class="nav-link ml-2 {{ request()->is('cliente/carrito') ? 'activo' : '' }}" href="{{ url('jolden.client.carrito') }}">CARRITO</a></li>--}}
                    {{--@endif--}}
                </ul>
            </div>
        </div>
    </nav>
</div>

