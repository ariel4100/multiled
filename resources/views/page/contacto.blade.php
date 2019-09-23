@extends('page.layouts.app')
@section('title','MULTILED - CONTACTO')
@push('style')
    <style>
        .list-group-item {
            padding: .75rem 0px;
            background-color: unset;
        }
        a:hover{
            text-decoration: none;
        }
        iframe {
            width: 100%;
            height: 400px;
        }
        .list-group a{
            color: #535353 !important;

        }
        .list-group a:hover{
            color: #008C95  !important;

        }
    </style>
@endpush
@section('content')
    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3905.0055125058907!2d-58.38521477558575!3d-34.611616965826705!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x95bccada0bbcb15d%3A0x1e035a8bd64db0cc!2sMULTILED%20Pantallas%20LED!5e0!3m2!1ses!2sar!4v1569266994528!5m2!1ses!2sar" width="100%" height="450" frameborder="0" style="border:0;" allowfullscreen=""></iframe>

<div class="container mt-n5 mb-5">
    @include('page.partials.message')
    <div class="row">
        <div class="col-md-4 bg-white">
            <div class="p-5" style="background-color: #F9F9F9">
                <h1 class="multiled-color font-weight-bold">Multiled</h1>
                <p class="">
                    Para más información, ingrese sus datos y complete el formulario
                </p>
                <ul class="list-group">
                    <li class="list-group-item border-0 d-flex align-items-center">
                        <i class="fas fa-map-marker-alt fa-lg multiled-color"></i>
                        <div class="ml-3">
                            <h6 class="font-weight-bold">DIRECCIÓN</h6>
                            @foreach($contacto['address'] ?? [] as $item)
                                {{--@dd($item)--}}
                                <a href="https://goo.gl/maps/5BY9f3M7RsqT6ua49" target="_blank" class="text-muted">{!! $item['address'] ?? ''  !!}</a>
                            @endforeach
                        </div>
                    </li>
                    <li class="list-group-item border-0 d-flex align-items-center">
                        <i class="fas fa-phone-volume fa-lg multiled-color"></i>
                        <div class="ml-3 d-flex flex-column">
                            <h6 class="font-weight-bold">TELÉFONOS</h6>
                            @foreach($contacto['phones'] ?? [] as $item)
                                {{--@dd($item)--}}
                                <a href="tel:{!! $item['numero'] ?? '' !!}" class="text-muted">{!! $item['numero'] ?? '' !!}</a>
                            @endforeach
                        </div>
                    </li>
                    <li class="list-group-item border-0 d-flex align-items-center">
                        <i class="fas fa-envelope fa-lg multiled-color"></i>
                        <div class="ml-3">
                            <h6 class="font-weight-bold">CORREOS</h6>
                            @foreach($contacto['emails'] ?? [] as $item)
                                {{--                                @dd($item)--}}
                                <a href="mailto:{!! $item['email'] ?? '' !!}" class="text-muted">{!! $item['email'] ?? '' !!}</a>
                            @endforeach
                        </div>
                    </li>
                </ul>
            </div>
        </div>
        <div class="col-md-8 bg-white">
            <form action="{{ url('contacto.post') }}" method="post" class="row">
                @csrf
                <div class="md-form col-md-6">
                    <input type="text" class="form-control" required name="nombre" placeholder="Nombre">
                </div>
                <div class="md-form col-md-6">
                    <input type="text" class="form-control" required name="telefono" placeholder="Teléfono">
                </div>
                <div class="md-form col-md-6">
                    <input type="email" class="form-control" required name="email" placeholder="Correo electrónico">
                </div>
                <div class="md-form col-md-6">
                    <input type="text" class="form-control" required name="empresa" placeholder="Empresa">
                </div>
                <div class="md-form col-md-12">
                    <textarea id="form7" class="md-textarea form-control" name="mensaje" placeholder="Mensaje..." rows="3"></textarea>
                    {{--<label for="form7">Material textarea</label>--}}
                </div>
                <div class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input" name="terminos" id="defaultUnchecked">
                    <label class="custom-control-label" for="defaultUnchecked">Acepto los términos y condiciones de privacidad</label>
                </div>
                <div class="md-form col-md-12">
                    <button type="submit" class="btn rounded-pill text-white p-2 px-5 multiled-fondo">ENVIAR</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
