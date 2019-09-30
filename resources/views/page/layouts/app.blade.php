<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title> @yield('title','MULTILED')</title>
    <link rel="icon" href="{{ asset($favicon ?? '') }}">

    @foreach($metadatos ?? [] as $m)
{{--        @dd($m)--}}
    @php(strtolower($m['title']) == 'inicio' ? $m['title'] = '/' : '')
        @if(request()->path() == strtolower($m['title']))
            <meta name="description" content="{!! $m['description'] ?? '' !!}" />
            <meta name="keywords" content="{{ $m['keyword'] ?? '' }}" />
        @endif
    @endforeach
    <meta name="keywords" content=" @yield('meta') " />
    <!-- Scripts -->
    {{--<script src="{{ asset('js/app.js') }}" defer></script>--}}


    <link href="https://fonts.googleapis.com/css?family=Open+Sans+Condensed:300,700&display=swap" rel="stylesheet">

    <!-- Styles -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">

    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.7.6/css/mdb.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <style>
        .font-weight-bold{
            font-weight: 700 !important;
            /*color: #535353 !important;  */
        }
        strong{
            font-weight: 700 !important;
        }
        .nav-link{
            color: #535353 !important;
        }
        .multiled-color{
            color: #173E8D !important;
        }
        .multiled-fondo{
            background-color: #173E8D !important;
        }

        .footer ul  li a{
            color: #535353 !important;

        }
        .footer a{
            color: #535353 !important;

        }
        .footer a:hover{
            color: #173E8D  !important;

        }
        .activo{
            /*border-bottom: 2px solid #D33538;*/
            color: #173E8D !important;
        }
        .nav-item a:hover{
            color: #173E8D !important;
        }
    </style>
    @stack('style')
</head>
<body style="font-family: 'Open Sans Condensed', sans-serif; color: #535353; font-weight: 700">
    <div id="app">
        @include('page.partials.header')
        <main class="   ">
            @yield('content')
        </main>
        @include('page.partials.footer')
    </div>

    <div class="d-flex justify-content-center" style="position: fixed; width: auto;  bottom: 1px; z-index: 11; background: #4DC95C;color: #fff; margin: 0 5px; right: 0; border-radius: 50rem">
        <div class=" m-0 p-1 pl-3 pr-2 d-flex justify-content-center align-items-center" style="border-right: 2px solid white"><i class="fab fa-lg fa-whatsapp"></i></div>
        {{--<div class="p-0 pr-4" style="border-right: 2px solid red"></div>--}}
        <a href="https://wa.me/{{ $whatsapp['numero'] ?? '' }}" target="_blank" class="btn m-0 p-1 pr-4 pl-3 font-weight-bold" style="font-size: 18px">{{ $whatsapp['numero'] }}</a>
    </div>

    <!-- JQuery -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <!-- Bootstrap tooltips -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.4/umd/popper.min.js"></script>
    <!-- Bootstrap core JavaScript -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <!-- MDB core JavaScript -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.7.6/js/mdb.min.js"></script>
    <script type="text/javascript" src="{{ asset('js/app.js') }}"></script>
    <script>
        // $(".mas").removeClass("waves-effect waves-light");
        new WOW().init();
    </script>
    @stack('script')
</body>
</html>
