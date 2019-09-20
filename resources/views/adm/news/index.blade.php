@extends('adm.layouts.app')

@section('content')
    <div class="container my-5">

        {{--@php $languages = [];--}}

            {{--foreach (LaravelLocalization::getLocalesOrder() as $key => $value) {--}}
          {{--$languages[$key] = $value['name'];--}}
      {{--}--}}
        {{--@endphp--}}
        {{--@dd(collect(LaravelLocalization::getSupportedLocales())->only(['es']))--}}
{{--        @dd($contenido)--}}
        <form-component
                url-data="{{ route('content.data',['section' => $section,'site' => $site]) }}"
                url-action="{{ route('content.update', ['id' => $contenido->id,'site' => $site]) }}"
                {{--:idioma="{{ json_encode(collect(LaravelLocalization::getSupportedLocales())->only(['es'])) }}"--}}
        >
        </form-component>
        @if($section == 'cosntacto')
            <contacto-component></contacto-component>
        @endif
        @if($section == 'novedades')
            <h2>jñ</h2>
        @endif
    </div>
@endsection
@push('script')
    <script>

        CKEDITOR.replaceClass = 'ckeditor';

        CKEDITOR.config.width = '100%';
    </script>
    <script src="path/to/tinymce-vue.min.js"></script>
@endpush
