@extends('layouts.main')

@section('javascript')
@endsection

@section('content')

<div class="home-overlay"></div>
<div class="container">
	<div class="row">
		<div class="col-xs-12">
			<div class="center-wrapper">
				<h3 class="greeting">Hola</h3>
				<h2 class="yellow-text subtitle">Mucho Gusto,</h2>
				<h1 class="user">{!! substr(Auth::User()->name, 0, strrpos(Auth::User()->name, ' ')) !!}</h1>
				<p class="remember">Recuerda esto antes de iniciar</p>

				<p class="quote">"Si por ciudad vas a transitar, las buenas y malas debes explorar. Juega con ésta vida virtual! e intenta las de arena y sufre las de cal..."</p>
				<p>
					<a href="{{ route('game-init') }}" class="btn btn-yellow">
						<span><i class="fa fa-play" aria-hidden="true"></i></span>
						<span class="info-text">
							<span class="text">Vamos a</span>
							<span class="text-important">Empezar</span>
						</span>
					</a>
				</p>
			</div>
		</div>
	</div>
</div>

@endsection
