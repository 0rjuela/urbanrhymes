<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <meta name="title" content="Cosas cotidianas para ciudades más bacanas." />
        <meta name="description" content="¿Afligido por el vértigo de andar en la urbe? ¡Practica con un juego que no te perturbe!" />
        <meta property="fb:app_id" content="614455582082845" />
        <meta property="og:type" content="website" />
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

        <title>@yield('title')</title>  

        <link rel="icon" type="image/png" href="{{ asset('img/favicon_32-32.png') }}">

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

    @if (Route::current()->getName() != 'game-init')
        <div class="container-fluid main-container home-bg" style="background-image: url({{ asset('img/home-background.jpg') }})">
    @else
        <div class="container-fluid main-game-container">
    @endif

        @yield('content')
    </div>

    @include('parts/footer')
</div>

    <script src="{{ asset('js/scripts.js') }}"></script>
    <script>

      /**
       * Vuex states
       */
       const store = new Vuex.Store({
         state: {
           progress: {{ $progress }},
           completed: {{ Auth::User()->completed }},
           scene_1: {{ Auth::User()->scene_1 }},
           scene_2: {{ Auth::User()->scene_2 }},
           scene_3: {{ Auth::User()->scene_3 }},
           scene_4: {{ Auth::User()->scene_4 }},
           isMenuOpen: false,
           video_progress: {{ Auth::User()->video_progress }}
         },
         actions: {
           UPDATE_PROGRESS ({commit}, value) {
             commit('SET_PROGRESS', value);
            },
            UPDATE_MENU_STATE({commit}, value) {
                commit('SET_MENU_STATE', value)
            },
            UPDATE_VIDEO_PROGRESS({commit}, value) {
                commit('SET_VIDEO_PROGRESS', value);
            }
         },
         mutations: {
           SET_PROGRESS: (state, value) => {
             state.progress = value
            },
            SET_MENU_STATE: (state, value) => {
                state.isMenuOpen = value
            },
            SET_VIDEO_PROGRESS: (state, value) => {
                state.video_progress = value
            }
         }
       });

       var base_url = '{{ asset('/video/') }}/';
       var videos = {!! $videos !!};
       var menu = {
       	progress: {{ $progress }},
       	videos: videos
       }
       var completed = {{ Auth::User()->completed }};


       new Vue({
         el: '#app',
         data: {
            progress: menu.progress,
            current: '{{ $current }}',
            baseurl: base_url,
            videos: videos,
            menu: menu,
         },
         store
       });
    </script>

    <div id="fb-root"></div>
    <script>(function(d, s, id) {
           var js, fjs = d.getElementsByTagName(s)[0];
           if (d.getElementById(id)) return;
           js = d.createElement(s); js.id = id;
           js.src = "//connect.facebook.net/es_LA/sdk.js#xfbml=1&version=v2.8";
           fjs.parentNode.insertBefore(js, fjs);
       }(document, 'script', 'facebook-jssdk'));</script>


       <script>window.twttr = (function (d, s, id) {
          var t, js, fjs = d.getElementsByTagName(s)[0];
          if (d.getElementById(id)) return;
          js = d.createElement(s); js.id = id;
          js.src= "https://platform.twitter.com/widgets.js";
          fjs.parentNode.insertBefore(js, fjs);
          return window.twttr || (t = { _e: [], ready: function (f) { t._e.push(f) } });
        }(document, "script", "twitter-wjs"));</script>

    @yield('javascript')
    </body>
</html>
