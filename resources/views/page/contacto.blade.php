@extends('page.layouts.app')
@section('title','JOLDEN - CONTACTO')
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
    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3282.751167359447!2d-58.394773285194105!3d-34.63572796669862!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x95bccb81293d6a07%3A0xe8da49cf0877f177!2sJolden%20SA!5e0!3m2!1ses!2sar!4v1567602253159!5m2!1ses!2sar" width="100%" height="450" frameborder="0" style="border:0;" allowfullscreen=""></iframe>

<div class="container my-5">
    @include('page.partials.message')
    <div class="row">
        <div class="col-md-4">
            <div class="p-5" style="background-color: #F9F9F9">
                <h1 class="jolden-color font-weight-bold">Jolden S.A.</h1>
                <p class="">
                    Para más información, ingrese sus datos y complete el formulario
                </p>
                <ul class="list-group">
                    <li class="list-group-item border-0 d-flex align-items-center">
                        <i class="fas fa-map-marker-alt fa-lg jolden-color2"></i>
                        <div class="ml-3">
                            <h6 class="font-weight-bold">DIRECCIÓN</h6>
                            @foreach($contacto['address'] as $item)
                                {{--@dd($item)--}}
                                <a href="https://goo.gl/maps/zQLpyuPParBCJdnX7" target="_blank" class="text-muted">{!! $item['address'] ?? ''  !!}</a>
                            @endforeach
                        </div>
                    </li>
                    <li class="list-group-item border-0 d-flex align-items-center">
                        <i class="fas fa-phone-volume fa-lg jolden-color2"></i>
                        <div class="ml-3 d-flex flex-column">
                            <h6 class="font-weight-bold">TELÉFONOS</h6>
                            @foreach($contacto['phones'] as $item)
                                {{--@dd($item)--}}
                                <a href="tel:{!! $item['numero'] ?? '' !!}" class="text-muted">{!! $item['numero'] ?? '' !!}</a>
                            @endforeach
                        </div>
                    </li>
                    <li class="list-group-item border-0 d-flex align-items-center">
                        <i class="fas fa-envelope fa-lg jolden-color2"></i>
                        <div class="ml-3">
                            <h6 class="font-weight-bold">CORREOS</h6>
                            @foreach($contacto['emails'] as $item)
                                {{--                                @dd($item)--}}
                                <a href="mailto:{!! $item['email'] ?? '' !!}" class="text-muted">{!! $item['email'] ?? '' !!}</a>
                            @endforeach
                        </div>
                    </li>
                </ul>
            </div>
        </div>
        <div class="col-md-8">
            <form action="{{ route('jolden.contacto.post') }}" method="post" class="row">
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
                    <button type="submit" class="btn rounded-pill text-white px-5 jolden-fondo">ENVIAR</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
