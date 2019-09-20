@extends('page.layouts.app')

@section('content')
    {{--    @dd($imagenes['banner'])--}}
    <div class="container my-5">
        @include('page.partials.message')
        <h1 class="jolden-color font-weight-bold">Area de Clientes</h1>
        <div class="row justify-content-center ">
            <div class="col-md-4 mt-5">
                <div class="card">
                    <div class="card-header jolden-fondo font-weight-bold text-white">Clientes Registrados</div>
                    <div class="card-body">
                        <form method="POST" action=" ">
                            @csrf
                            <div class="form-group row">
                                <div class="col-md-12">
                                    <div class="md-form">
                                        <input id="usuario" type="text" class="form-control " name="username" required >
                                        <label for="usuario" >Nombre de Usuario</label>
                                    </div>
                                    {{--<div class="md-form">--}}
                                        {{--<input id="email" type="email" class="form-control " name="email">--}}
                                        {{--<label for="email">Correo Electronico</label>--}}
                                    {{--</div>--}}
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-12">
                                    <div class="md-form">
                                        <input id="password" type="password" class="form-control " name="password">
                                        <label for="password">Contraseña</label>
                                    </div>
                                </div>
                            </div>

                            {{--<div class="form-group row">--}}
                                {{--<div class="col-md-12">--}}
                                    {{--<div class="form-check text-center">--}}
                                        {{--<input class="form-check-input" type="checkbox" name="remember" id="remember">--}}

                                        {{--<label class="text-muted" for="remember">--}}
                                            {{--Mantener sesión iniciada--}}
                                        {{--</label>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                            {{--</div>--}}

                            <div class="form-group row mb-0">
                                <div class="col-md-12 text-center">
                                    <button type="submit" class="btn jolden-fondo text-white" style="">
                                        Ingresar
                                    </button>
                                </div>

                                {{--<div class="col-md-12 text-center">--}}
                                    {{--<a class="btn btn-link" href=" ">--}}
                                        {{--Recuperar Contraseña--}}
                                    {{--</a>--}}
                                {{--</div>--}}
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-8 mt-5">
                <div class="card">
                    <div class="card-header jolden-fondo font-weight-bold text-white">Crear Cuenta</div>
                    <div class="card-body">
                        <form method="POST" action=" ">
                           @csrf
                            <div class="form-group row">

                                <div class="col-md-12">
                                    <div class="md-form">
                                        <input id="usuario" type="text" class="form-control " name="username" required >
                                        <label for="usuario" >Nombre de Usuario</label>
                                    </div>
                                    {{--<div class="md-form">--}}
                                        {{--<input id="email1" type="email" class="form-control " name="email" required>--}}
                                        {{--<label for="email1" class="">Correo Electronico</label>--}}
                                    {{--</div>--}}
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="md-form">
                                                <input id="password" type="password" class="form-control " name="password" required>
                                                <label for="password"  >Contraseña</label>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <div class="form-group col-md-6">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="md-form">
                                                <input id="password_confirmation" type="password" class="form-control " name="password_confirmation" required >
                                                <label for="password_confirmation"  >Repetir Contraseña</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-12">
                                    <div class="md-form">
                                        <input id="razon_social" type="text" class="form-control " name="razon_social" required >
                                        <label for="razon_social" >Razón Social / Nombre y Apellido</label>
                                    </div>

                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-12">
                                    <div class="md-form">
                                        <input id="direccion" type="text" class="form-control" name="direccion" required >
                                        <label for="direccion">Domicilio</label>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="md-form">
                                        <input id="Provincia" type="text" class="form-control" name="provincia" required >
                                        <label for="Provincia">Provincia</label>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="md-form">
                                        <input id="Localidad" type="text" class="form-control" name="localidad" required >
                                        <label for="Localidad">Localidad</label>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="md-form">
                                        <input id="Postal" type="text" class="form-control" name="codigo-postal" required >
                                        <label for="Postal">Codigo Postal</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="md-form">
                                        <select name="iva" id="" class="custom-select">
                                            <option value="">Consumidor Final</option>
                                            <option value="">Monotributo</option>
                                            <option value="">Exento</option>
                                            <option value="">No Responsable</option>
                                            <option value="">Responsable Inscrito</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="md-form">
                                        <input id="CUIT" type="text" class="form-control" name="cuit" required >
                                        <label for="CUIT">CUIT</label>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="md-form">
                                        <input id="telefono" type="text" class="form-control " name="telefono" required>
                                        <label for="telefono">Telefono</label>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="md-form">
                                        <input id="email" type="email" class="form-control " name="email">
                                        <label for="email">Correo Electronico</label>
                                    </div>
                                </div>
                            </div>


                <div class="form-group row mb-0">
                    <div class="col-md-12 text-center">
                        <button type="submit" class="btn wolf-fondo">
                            Registrar
                        </button>
                    </div>
                </div>
                </form>
            </div>
                </div>
            </div>
        </div>
    </div>

@endsection

