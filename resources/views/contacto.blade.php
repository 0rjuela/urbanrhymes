@extends('layouts.main')


@section('javascript')
@endsection

@section( 'content' )
<div class="container-fluid main-container home-bg" style="background-image: url({{ asset('img/home-background.jpg') }})">
	<div class="home-overlay"></div>
	<div class="container">
		<div class="row">
			{{-- <div class="col-md-5 col-offset-md-7 col-xs-12"> --}}
			<div class="col-md-5 col-xs-12">
				<div class="form-container">
					<h2>Feedback y</h2>
					<h1>Contacto</h1>

					<p>Contacta con nosotros</p>

					<form action="{{ route('send-email') }}" role="form" method="post" id="contact-form">
						{{ csrf_field() }}
						<div class="form-group">
							<input type="text" placeholder="Tu Nombre" name="name" class="form-control" id="name" required="">
							<input type="email" placeholder="Tu Correo Electronico" name="email" id="email" class="form-control" required="">
							<textarea name="message" id="message" cols="30" rows="10" class="form-control" placeholder="Tu Mensaje..." required=""></textarea>
						</div>
						<div class="text-right">
							<input type="submit" value="Enviar" class="btn btn-form">
						</div>
					</form>
				</div>
			</div>
			<div class="col-md-7">
				<div class="email-sent">
					<div class="img">
						<img src="{{ asset('img/email-sent.png') }}" alt="Email Sent">
					</div>
					<div class="text-center">
						<h3 class="subtitle">Gracias por</h3>
						<h2 class="title">Contactarnos</h2>
						<h4 class="info">Pronto te responderemos</h4>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
