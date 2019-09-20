@extends('adm.layouts.app')

@section('content')
    @if(isset($section))
    <div class="container my-5">
        @include('page.partials.message')
        {{--@php $languages = [];--}}

            {{--foreach (LaravelLocalization::getLocalesOrder() as $key => $value) {--}}
          {{--$languages[$key] = $value['name'];--}}
      {{--}--}}
        {{--@endphp--}}
        {{--@dd(collect(LaravelLocalization::getSupportedLocales())->only(['es']))--}}
{{--        @dd($contenido)--}}
        @if($section == 'home' || $section == 'empresa' || $section == 'terminos')
            <form-component
                    url-data="{{ route('content.data',['section' => $section,'site' => $site]) }}"
                    url-action="{{ route('content.update', ['id' => $contenido->id,'site' => $site]) }}"
                    :idioma="{{ json_encode(collect(LaravelLocalization::getSupportedLocales())->only(['es'])) }}"
            >
            </form-component>
        @endif

    @if($section == 'contacto')
            <contacto-component
                url-data="{{ route('content.data',['section' => $section,'site' => $site]) }}"
                url-action="{{ route('content.update', ['id' => $contenido->id,'site' => $site]) }}"
            ></contacto-component>
        @endif
        @if($section == 'productos')

            <section class="card shadow">
                <div class="card-body">
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="home-tab" data-toggle="tab" href="#marca" role="tab" aria-controls="marca" aria-selected="true">Marcas</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="home-tab" data-toggle="tab" href="#familia" role="tab" aria-controls="home" aria-selected="true">Familias</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="profile-tab" data-toggle="tab" href="#subfamilia" role="tab" aria-controls="profile" aria-selected="false">Subfamilia</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="profile-tab" data-toggle="tab" href="#productos" role="tab" aria-controls="profile" aria-selected="false">Productos</a>
                        </li>
                    </ul>
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="marca" role="tabpanel" aria-labelledby="home-tab">
                            {{--<form-component--}}
                            {{--url-data="{{ route('content.data',['section' => $section,'site' => $site]) }}"--}}
                            {{--url-action="{{ route('content.update', ['id' => $contenido->id,'site' => $site]) }}"--}}
                            {{--:idioma="{{ json_encode(collect(LaravelLocalization::getSupportedLocales())->only(['es'])) }}"--}}
                            {{-->--}}
                            {{--</form-component>--}}
                            <marca
                                url-data="{{ route('brand.data',['site' => $site]) }}"
                                url-add="{{ route('brand.store', ['site' => $site]) }}"
                                url-update="{{ route('brand.update', ['site' => $site]) }}"
                                url-destroy="{{ route('brand.destroy', ['site' => $site]) }}"
                            ></marca>
                        </div>
                        <div class="tab-pane fade " id="familia" role="tabpanel" aria-labelledby="home-tab">
                            {{--<form-component--}}
                                    {{--url-data="{{ route('content.data',['section' => $section,'site' => $site]) }}"--}}
                                    {{--url-action="{{ route('content.update', ['id' => $contenido->id,'site' => $site]) }}"--}}
                                    {{--:idioma="{{ json_encode(collect(LaravelLocalization::getSupportedLocales())->only(['es'])) }}"--}}
                            {{-->--}}
                            {{--</form-component>--}}
                            <familia
                                    url-data="{{ route('family.data',['site' => $site]) }}"
                                    url-add="{{ route('family.store', ['site' => $site]) }}"
                                    url-update="{{ route('family.update', ['site' => $site]) }}"
                                    url-destroy="{{ route('family.destroy', ['site' => $site]) }}"
                            ></familia>
                        </div>
                        <div class="tab-pane fade" id="subfamilia" role="tabpanel" aria-labelledby="profile-tab">
                            <subfamilia
                                    url-data="{{ route('subfamily.data',['site' => $site]) }}"
                                    url-add="{{ route('subfamily.store', ['site' => $site]) }}"
                                    url-update="{{ route('subfamily.update', ['site' => $site]) }}"
                                    url-destroy="{{ route('subfamily.destroy', ['site' => $site]) }}"
                            ></subfamilia>
                        </div>
                        <div class="tab-pane fade" id="productos" role="tabpanel" aria-labelledby="profile-tab">
                            <productos
                                    url-data="{{ route('product.data',['site' => $site]) }}"
                                    url-add="{{ route('product.store', ['site' => $site]) }}"
                                    url-update="{{ route('product.update', ['site' => $site]) }}"
                                    url-destroy="{{ route('product.destroy', ['site' => $site]) }}"
                            ></productos>
                        </div>
                    </div>
                </div>
            </section>

        @endif

        @if($section == 'novedades')
            <section class="card shadow">
                <div class="card-body">
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Categoria</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Novedades</a>
                        </li>
                    </ul>
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                            <categoria
                                    url-data="{{ route('category.data',['site' => $site]) }}"
                                    url-add="{{ route('category.store', ['site' => $site]) }}"
                                    url-update="{{ route('category.update', ['site' => $site]) }}"
                                    url-destroy="{{ route('category.destroy', ['site' => $site]) }}"
                                    {{--url-action="{{ route('news.store', ['id' => $contenido->id,'site' => $site]) }}"--}}
                            >
                            </categoria>
                        </div>
                        <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                            <novedades
                                    url-data="{{ route('news.data',['site' => $site]) }}"
                                    url-add="{{ route('news.store', ['site' => $site]) }}"
                                    url-update="{{ route('news.update', ['site' => $site]) }}"
                                    url-destroy="{{ route('news.destroy', ['site' => $site]) }}"
                                    {{--url-action="{{ route('news.store', ['id' => $contenido->id,'site' => $site]) }}"--}}
                            >
                            </novedades>
                        </div>
                    </div>
                </div>
            </section>

        @endif

        @if($section == 'descargas')
            <descargas
                    url-data="{{ route('download.data',['site' => $site,'section' => $section]) }}"
                    url-add="{{ route('download.store', ['site' => $site]) }}"
                    url-update="{{ route('download.update', ['site' => $site]) }}"
                    url-destroy="{{ route('download.destroy', ['site' => $site]) }}"
            ></descargas>
        @endif
        @if($section == 'clientes')
            <clientes
                    url-data="{{ route('client.data',['site' => $site]) }}"
                    url-add="{{ route('client.store', ['site' => $site]) }}"
                    url-update="{{ route('client.update', ['site' => $site]) }}"
                    url-destroy="{{ route('client.destroy', ['site' => $site]) }}"
            ></clientes>
        @endif
        @if($section == 'vendedor')
                <vendedores
                        url-data="{{ route('seller.data',['site' => $site]) }}"
                        url-add="{{ route('seller.store', ['site' => $site]) }}"
                        url-update="{{ route('seller.update', ['site' => $site]) }}"
                        url-destroy="{{ route('seller.destroy', ['site' => $site]) }}"
                ></vendedores>
            @endif
        @if($section == 'listaprecio')
            <precios
                    url-data="{{ route('price.data',['site' => $site]) }}"
                    url-add="{{ route('price.store', ['site' => $site]) }}"
                    url-update="{{ route('price.update', ['site' => $site]) }}"
                    url-destroy="{{ route('price.destroy', ['site' => $site]) }}"
            ></precios>
        @endif
        @if($section == 'descuento')
            <descuento
                    url-data="{{ route('discount.data',['site' => $site]) }}"
                    url-add="{{ route('discount.store', ['site' => $site]) }}"
                    url-update="{{ route('discount.update', ['site' => $site]) }}"
                    url-destroy="{{ route('discount.destroy', ['site' => $site]) }}"
            ></descuento>
        @endif
        @if($section == 'bonificacion')
            <bonificacion
                    url-data="{{ route('bonus.data',['site' => $site]) }}"
                    url-add="{{ route('bonus.store', ['site' => $site]) }}"
                    url-update="{{ route('bonus.update', ['site' => $site]) }}"
                    url-destroy="{{ route('bonus.destroy', ['site' => $site]) }}"
            ></bonificacion>
        @endif
        @if($section == 'excel')
            <div class="container p-4">

                <div class="card">
                    <div class="card-body">
                        {{--<a href="{{ route('export.productos') }}" class="btn btn-success m-0 float-right"><i class="fas fa-download mx-2"></i>Exportar General</a>--}}
                        <h5 class="card-title">Carga General</h5>
                        <p class="card-text">Para hacer la carga general mediante un archivo Excel, deberá cumplir lo siguiente:</p>
                        <ol>
                            <li>El archivo debe guardarlo en formato xlsx</li>
                            {{--<li>No tener CABECERA en la tabla</li>--}}
                            <li>Este archivo debe estar estructurado por hojas, las cuales deberan ser cada hoja del excel. Deberán ser 6.
                            <ul>
                            <li>[1] FAMILIAS</li>
                            <li>[2] MARCAS</li>
                            <li>[3] ARTICULOS</li>
                            <li>[4] VENDEDORES</li>
                            <li>[5] PRECIO</li>
                            <li>[6] CLIENTES</li>
                            {{--<li>[F] Marca</li>--}}
                            {{--<li>[F] Marca</li>--}}
                            {{--<li>[F] Marca</li>--}}
                            {{--<li>[F] Marca</li>--}}

                            </ul>
                            {{--</li>--}}
                        </ol>
                        {{--<p class="card-text">En el caso de no poseer algún campo, dejar vacío la celda.</p>--}}

                        <hr>
                        <form action="{{ route('carga.general') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="row justify-content-center">
                                <div class="col-12 col-md-6">
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="inputGroupFileAddon01">Carga</span>
                                        </div>
                                        <div class="custom-file">
                                            <input name="file" accept=".csv, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel" required type="file" class="custom-file-input" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01">
                                            <label class="custom-file-label" data-browser="Subir" for="inputGroupFile01">Seleccione archivo</label>
                                        </div>
                                    </div>

                                    <button type="submit" class="btn btn-success d-block mx-auto text-uppercase">cargar</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        @endif


        @if($section == 'datos')
            <datos
                    url-data="{{ route('content.data',['section' => $section,'site' => $site]) }}"
                    url-action="{{ route('content.update', ['id' => $contenido->id,'site' => $site]) }}"
            ></datos>
        @endif

        @if($section == 'metadatos')
            <metadatos
                    url-data="{{ route('content.data',['section' => $section,'site' => $site]) }}"
                    url-action="{{ route('content.update', ['id' => $contenido->id,'site' => $site]) }}"
                    :idioma="{{ json_encode(collect(LaravelLocalization::getSupportedLocales())->only(['es'])) }}"
            >
            </metadatos>
        @endif



        @if($section == 'usuarios')
            <usuario
                    url-data="{{ route('user.data',['site' => $site]) }}"
                    url-add="{{ route('user.store', ['site' => $site]) }}"
                    url-update="{{ route('user.update', ['site' => $site]) }}"
                    url-destroy="{{ route('user.destroy', ['site' => $site]) }}"
            ></usuario>
        @endif
    </div>
        @else

    @endif
@endsection
@push('script')
    <script>

        CKEDITOR.replaceClass = 'ckeditor';

        CKEDITOR.config.width = '100%';
    </script>
    <script src="path/to/tinymce-vue.min.js"></script>
@endpush
<script>
    import Metadatos from "../../../js/adm/Metadatos";
    export default {
        components: {Metadatos}
    }
</script>