@extends('layouts.main')

@section('javascript')
@endsection

@section( 'content' )
<div class="container-fluid main-container home-bg" style="background-image: url({{ asset('img/home-background.jpg') }})">
	<div class="home-overlay"></div>
	<div class="container">
		<div class="row">
			<div class="col-md-5 col-offset-md-7 col-xs-12 cocodrilo-info">

				<div class="logo text-left" style="background-image:url({{ asset('/img/logo.svg') }})">

				</div>
				<h3><i class="fa fa-star" aria-hidden="true"></i> Cocodrilo</h3>
				<h2>¿Qué hace</h2>
				<h1>Cocodrilo?</h1>

				<div class="content">
					<p>
						La forma más efectiva de aprender es a través del entretenimiento, y a todos nos atrapan las historias. Todas las ideas que usted quiera comunicar pueden ser convertidas en una buena historia, una experiencia interactiva donde el usuario elige su camino, se conecta con la idea, y asimila el mensaje.
					</p>
					<p>
						COCODRILO, identifica los objetivos, conforma la estrategia para conseguirlos, narra cuentos para divertir, y cuantifica los resultados para hacer seguimiento de su efectividad.
					</p>
				</div>

			</div>
		</div>
	</div>
</div>
@endsection
