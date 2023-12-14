@extends('layouts.main-no-header')

@section('javascript')
	<script src="{{ asset('js/circletype.min.js') }}"></script>
	<script src="{{ asset('js/circletype.plugins.js') }}"></script>
	<script type="text/javascript">
		$('#title-1').circleType({radius: 780});
		$('#title-2').circleType({radius: 900});
		$('#title-3').circleType({radius: 780});
		$('#title-5').circleType({radius: 780, dir:-1});
	</script>
@endsection

@section('css')
	<link href="https://fonts.googleapis.com/css?family=Parisienne" rel="stylesheet">
@endsection

@section('content')
<form action="" style="">
	 <div class="form-group">
        <div class="centered-info">
			<div class="index-img" style="background-image: url( {{ asset('img/main-home.png') }} )">

			</div>
			{{-- <div>
				<i class="fa fa-star" aria-hidden="true"></i>
				<i class="fa fa-star fa-2x" aria-hidden="true"></i>
				<i class="fa fa-star fa-3x" aria-hidden="true"></i>
				<i class="fa fa-star fa-2x" aria-hidden="true"></i>
				<i class="fa fa-star" aria-hidden="true"></i>
			</div>

			<h3 id="title-1">cosas cotidianas para</h3>
        	<h1 id="title-2">Ciudades</h1>
			<div class="title-3-wrapper" style="background-image: url({{ asset('img/bacanasbg.png') }})">
				<h2 id="title-3">Mas bacanas</h2>
			</div>
			<h4 id="title-4">Rimas<br>chiquiticas</h4>
			<div class="home-star-wrapper">
				<h4 id="title-5">pa' ciudades mas bonitas...</h4>
			</div> --}}

			<div class="login-wrapper">
				<div class="">
		            <a href="{{ url('/login/facebook') }}" class="btn btn-facebook" id="login-facebook">
		            	<div> <i class="fa fa-facebook"></i> </div>
		            	<div class="info-text">
		            		<span class="text">Log In with</span>
		            		<div>Facebook</div>
		        		</div>
		        	</a>
				</div>
	        	<div>
	        		<input type="checkbox" name="terminos" id="terminos-check" style="display: none;">
					<b class="term-checkbox" id="term-checkbox"></b>
					<a href="{{ route('terminos') }}" target="_blank" class="btn-terminos">Acepto terminos y condiciones de uso</a>
	        	</div>
			</div>
        </div>
    </div>
</form>


@endsection
