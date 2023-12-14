<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="title" content="Cosas cotidianas para ciudades más bacanas." />
        <meta name="description" content="¿Afligido por el vértigo de andar en la urbe? ¡Practica con un juego que no te perturbe!" />

        <meta property="fb:app_id" content="614455582082845" />
        <meta property="og:title" content="Cosas cotidianas para ciudades más bacanas." />
        <meta property="og:description" content="¿Afligido por el vértigo de andar en la urbe? ¡Practica con un juego que no te perturbe!" />
        <meta property="og:image" content="{{ asset('img/imagen-compartir.png') }}" />
        <meta property="og:image:type" content="image/png" />
        <meta property="og:url" content="http://cocodrilo.com.co" />

        <meta name="twitter:card" content="summary" />
        <meta name="twitter:site" content="Cocodrilo" />
        <meta name="twitter:url" content="http://cocodrilo.com.co" />
        <meta name="twitter:title" content="Cosas cotidianas para ciudades más bacanas." />
        <meta name="twitter:description" content="¿Afligido por el vértigo de andar en la urbe? ¡Practica con un juego que no te perturbe!." />
        <meta name="twitter:image" content="{{ asset('img/imagen-compartir.png') }}" />
        
        <link rel="icon" type="image/png" href="{{ asset('img/favicon_32-32.png') }}">

        <title>@yield('title')</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="{{ asset('css/font-awesome.min.css') }}">
        <link rel="stylesheet" href="{{ asset('css/style.css') }}">
        @yield('css')
        <!-- Scripts -->
        <script>
            window.Laravel = {!! json_encode([
                'csrfToken' => csrf_token(),
            ]) !!};
        </script>
    </head>
<body>

<div id="app">
        @include('parts/header')

    <div class="container-fluid main-game-container">
        @yield('content')
    </div>

    @include('parts/footer')

    <script src="{{ asset('js/scripts.js') }}"></script>
    {{-- <script src="{{ asset('js/jquery.fullpage.min.js') }}"></script> --}}
    @yield('javascript')
    </body>
</html>
