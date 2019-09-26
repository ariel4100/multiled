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
                    url-data="{{ route('content.data',['section' => $section]) }}"
                    url-action="{{ route('content.update', ['id' => $contenido->id]) }}"
                    :idioma="{{ json_encode(collect(LaravelLocalization::getSupportedLocales())->only(['es'])) }}"
            >
            </form-component>
        @endif
        @if($section == 'proyectos')
            <proyectos
                    url-data="{{ route('content.data',['section' => $section]) }}"
                    url-action="{{ route('content.update', ['id' => $contenido->id]) }}"
            ></proyectos>
        @endif

    @if($section == 'contacto')
            <contacto-component
                url-data="{{ route('content.data',['section' => $section]) }}"
                url-action="{{ route('content.update', ['id' => $contenido->id]) }}"
            ></contacto-component>
        @endif
        @if($section == 'categorias')
            <section class="card shadow">
                <div class="card-body">
            <familia
                    url-data="{{ route('family.data') }}"
                    url-add="{{ route('family.store') }}"
                    url-update="{{ route('family.update') }}"
                    url-destroy="{{ route('family.destroy') }}"
            ></familia>
                </div>
            </section>
        @endif
        @if($section == 'productos')
            <section class="card shadow">
                <div class="card-body">
                    <productos
                            url-data="{{ route('product.data') }}"
                            url-add="{{ route('product.store') }}"
                            url-update="{{ route('product.update') }}"
                            url-destroy="{{ route('product.destroy') }}"
                    ></productos>
                </div>
            </section>

        @endif

        @if($section == 'senalizacion')
            <section class="card shadow">
                <div class="card-body">
                    <senalizacion
                            url-data="{{ route('product.data',['section'=>$section]) }}"
                            url-add="{{ route('product.store') }}"
                            url-update="{{ route('product.update') }}"
                            url-destroy="{{ route('product.destroy') }}"
                    ></senalizacion>
                </div>
            </section>

        @endif

        @if($section == 'vial')
            <section class="card shadow">
                <div class="card-body">
                    <vial
                            url-data="{{ route('product.data',['section'=>$section]) }}"
                            url-add="{{ route('product.store') }}"
                            url-update="{{ route('product.update') }}"
                            url-destroy="{{ route('product.destroy') }}"
                    ></vial>
                </div>
            </section>

        @endif


        @if($section == 'servicios')
            <section class="card shadow">
                <div class="card-body">
                    <servicios
                            url-data="{{ route('service.data') }}"
                            url-add="{{ route('service.store') }}"
                            url-update="{{ route('service.update') }}"
                            url-destroy="{{ route('service.destroy') }}"
                            {{--url-action="{{ route('news.store', ['id' => $contenido->id,'site' => $site]) }}"--}}
                    >
                    </servicios>
                </div>
            </section>
        @endif

        @if($section == 'categorias_novedades')
            <section class="card shadow">
                <div class="card-body">
                    <categoria
                            url-data="{{ route('category.data') }}"
                            url-add="{{ route('category.store') }}"
                            url-update="{{ route('category.update') }}"
                            url-destroy="{{ route('category.destroy') }}"
                            {{--url-action="{{ route('news.store', ['id' => $contenido->id,'site' => $site]) }}"--}}
                    >
                    </categoria>
                </div>
            </section>

        @endif

        @if($section == 'novedades')
            <section class="card shadow">
                <div class="card-body">
                    <novedades
                            url-data="{{ route('news.data') }}"
                            url-add="{{ route('news.store') }}"
                            url-update="{{ route('news.update') }}"
                            url-destroy="{{ route('news.destroy') }}"
                            {{--url-action="{{ route('news.store', ['id' => $contenido->id,'site' => $site]) }}"--}}
                    >
                    </novedades>
                </div>
            </section>
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


        @if($section == 'logos')
            <datos
                    url-data="{{ route('content.data',['section' => $section]) }}"
                    url-action="{{ route('content.update', ['id' => $contenido->id]) }}"
            ></datos>
        @endif

        @if($section == 'redes')
            <redes
                    url-data="{{ route('content.data',['section' => $section]) }}"
                    url-action="{{ route('content.update', ['id' => $contenido->id]) }}"
                    :idioma="{{ json_encode(collect(LaravelLocalization::getSupportedLocales())->only(['es'])) }}"
            >
            </redes>
        @endif
        @if($section == 'metadatos')
            <metadatos
                    url-data="{{ route('content.data',['section' => $section]) }}"
                    url-action="{{ route('content.update', ['id' => $contenido->id]) }}"
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