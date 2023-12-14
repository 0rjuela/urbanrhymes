<header class="header container-fluid" id="header">
    <div class="container">
        <div class="row">
            <div class="col-xs-6 header-refran-wrapper">
                <a href="{{ route('home') }}">
                    <div>
                        <i class="fa fa-star" aria-hidden="true"></i>
                    </div>
                    <div>
                        <h3>Rimas chiquiticas</h3>
                        <h2>Pa ciudades mas bonitas</h2>
                    </div>
                </a>
            </div>
            <div class="col-xs-6 header-menu-wrapper">
                <ul class="header-menu dropdown">
                    <li>
                        <a href="{{ route('cocodrilo') }}">
                            {{-- <img src="{{ asset('/img/logo.svg') }}" alt=""> --}}
                            <div class="header-logo"></div>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('terminos') }}" class="{{ Request::is('terminos-y-condiciones') ? 'active-menu' : ''  }}">
                            Terminos
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('contacto') }}" class="{{ Request::is('contacto') ? 'active-menu' : ''  }}">
                            Feedback
                        </a>
                    </li>
                    <li>
                        <div class="row">
                            <div class="col-xs-8 text-right">
                                <span class="saludo">¡Hola!</span>
                                <br>
                                {!! substr(Auth::User()->name, 0, strrpos(Auth::User()->name, ' ')) !!}
                            </div>
                            <div class="col-xs-4" style="position: relative;">
                                <img src="https://graph.facebook.com/{{ Auth::User()->facebook_id()['provider_user_id'] }}/picture" alt="">
                            </div>
                        </div>
                    </li>
                    <li>
                        <a href="#" id="progress-btn" data-toggle="dropdown"><i class="fa fa-chevron-down" aria-hidden="true"></i></a>
                        <ul class="dropdown-menu">
                            <li><progressheader :actualprogress="progress" :videos="videos" :menu="menu"></progressheader></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</header>
