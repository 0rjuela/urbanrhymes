@extends('layouts.main-no-header')

@section('javascript')
	<script src="{{ asset('js/simplebar.js') }}"></script>
@endsection

@section('css')
	<link rel="stylesheet" href="{{ asset('css/simplebar.css') }}">
@endsection

@section('content')

<div class="container-fluid index-container home-bg" style="background-image: url({{ asset('img/home-background.jpg') }}); padding-top: 75px;">

	<div class="home-overlay"></div>
	<div class="container">
		<div class="row">
			<div class="col-xs-9">
				<div class="terminos-info">
					<h3>
						<i class="fa fa-star" aria-hidden="true"></i> Términos
					</h3>
					<h2>términos y condiciones</h2>
					<h1>De uso</h1>

					<div class="info-container" data-simplebar>
						<p>
							Al acceder a ésta aplicación el usuario se acoge a ser cobijado por los siguientes términos de uso:
						</p>
						<ul>
							<li><span>1. PEATÓN</span> es una aplicaciòn interactiva montada en web que simula situaciones que pueden presentarse en un contexto urbano, no constituye una medio de aprendizaje o instrucción formal. Se recomienda formación específica.</li>

							<li>
								<li><span>2.</span> El uso de peatón como aplicativo interactivo es promovido por <span>COCODRILO</span>. El uso del mismo debe ser asumido bajo su responsabilidad.</li>
								<ul>
									<li>
										<span>2.1.</span> Acorde a los suscrito en la ley.
										<ul start="2">
											<li>
												<span>2.1.1. COCODRILO</span>, se exime de toda responsabilidad ante cualquier inconveniente o agravio que se derive del uso de <span>PEATÓN</span>
											</li>
											<li>
												<p>
													<span>2.1.2.</span> Todas las garantías implícitas, términos y condiciones relacionados al interactivo <span>PEATÓN</span>. Sea dictado por la ley nacional o internacional, incluyendo (sin limitación) cualquier garantía en cuanto a la exactitud, integridad, y calidad de la información entre el usuario y <span>COCODRILO</span>, quedan excluidas.
												</p>
												<p>
													Sin perjuicio de lo anterior, <span>COCODRILO</span>, No acepta ninguna responsabilidad por cualquier fallo técnico, como resultado, o relacionado con la utilización de <span>PEATÓN</span>
												</p>
											</li>
										</ul>
									</li>
									<li>
										<span>2.2. COCODRILO</span>, Tampoco será responsable ante cualquier:
										<ul>
											<li>
												<span>2.2.1</span> Pérdida económica (sin limitaciones)
											</li>
											<li>
												<span>2.2.2</span> Pérdida de reputación
											</li>
											<li>
												<span>2.2.3.</span> Cualquier tipo de pérdida indirecta
											</li>
										</ul>
									</li>
									<li>
										<span>2.3 COCODRILO</span> no garantiza la seguridad de ésta web. Tampoco garantiza que el sitio o los servidores que hacen parte del mismo estén libres de virus o cualquier otro elemento dañino
									</li>
								</ul>
							</li>
							<li>
								<span>3.</span> Cuando el usuario ingresa a éste sitio, proveerá cierta información personal que serà almacenada en un servidor. Ésta información, que consta de su nombre y su correo electrónico será utilizada únicamente con fines estadísticos.
							</li>
							<li>
								<span>4.</span> Sus datos personales son estrictamente personales y no serán compartidos con ninguna organización de acuerdo a los términos acordados en el parágrafo 11, al final del presente documento.
							</li>
							<li>
								<span>5.</span> Las  medidas técnicas y organizacionales pertinentes serán tomadas contra acciones no autorizados o fuera de la ley, correspondientes a procesos relativos a los datos personales y su accidental pérdida, destrucción o daño.
							</li>
							<li>
								<p>
									<span>6.</span> Éste sitio requiere la habilitación de cookies por parte del usuario. Los cookies son pequeños archivos digitales que nuestro sitio web guardará en su navegador de internet, que permite el intercambio de información entre el navegador y nuestra página.
								</p>
								<p>
									Éstos son cookies temporales y no permanentes, lo cual significa que éstos archivos pueden ser borrados o desactivados cuando el navegador se cierra. En ningún caso la información almacenada por los cookies puede ser usada para identificar al usuario como individuo ni contienen información crítica o importante.
								</p>
								<p>
									Usamos los cookies para mejorar la accesibilidad. Los cookies temporales permiten al usuario reiniciar sesión en el punto que abandonó previamente.
								</p>
								<p>
									Al usar el sitio, el usuario permite el uso de los cookies descritos anteriormente.
								</p>
							</li>
							<li>
								<span>7.</span> Éste sitio da acceso a páginas web externas, Facebook, Twitter y Linked in.  <span>COCODRILO</span> no se hace responsable del contenido de cualquier sitio web vinculado a  éste. El usuario debe obedecer los términos y condiciones de Facebook, Twitter y Linked In, y conservar la confidencialidad de sus contraseñas. El usuario será el único responsable por lo que pase con sus cuentas.
							</li>
							<li>
								<span>8.</span> Al usar ésta página usted está de acuerdo en liberar de toda responsabilidad a <span>COCODRILO</span> en caso de costos, reclamos, demandas, gastos o daños sufridos o incurridos  por el usuario, que surjan del uso directo o indirecto del acceso y uso de la página.
							</li>
							<li>
								<span>9.</span> Todos los elementos de diseño, texto y gráficas están protegidos por normas de derecho de autor. Ninguno de los contenidos puede ser copiado o incorporado en cualquier otro sitio web u otro medio de cualquier tipo, en cualquier forma.
							</li>
							<li>
								<span>10.</span> El usuario acuerda no acceder sin autorizaciòn a cualquier parte del sitio, o a intentar algún daño concerniente a la constitución de la página como tal.
							</li>
							<li>
								<span>11.</span> Al darnos su información personal, el usuario autoriza a <span>COCODRILO</span>, a compartir y procesar la información entregada con los siguientes terceros:
								<ul>
									<li><span>11.1.</span> Cualquier ente regulatorio, la policía u otra agencia que lo requiera, de acuerdo a la ley.</li>
									<li><span>11.2.</span> Agentes: <span>COCODRILO</span> Podrá usar terceros para ejecutar ciertas funciones a nuestro nombre, incluyendo el envìo de correos electrónicos, la organización de promociones, encuestas y análisis de datos. Nuestros agentes tendrán acceso a su información personal si es necesario para ejecutar sus funciones, pero no podrán usarla para cualquier otro propósito, a menos que el usuario diera la autorización específica para hacerlo.</li>
									<li><span>11.3.</span> Productos o servicios: Ciertos productos o servicios podrán ser ofrecidos al usuario por parte de <span>COCODRILO</span>, que a su vez puede asociarse con un tercero que requiera su información para hacer uso de los productos o servicios. Si el usuario solicita un producto o servicio ofrecido por un tercero por ésta vía, la identidad del tercero será revelada al usuario y sus datos personales serán transferidos al tercero. El uso de su informaciòn en éste caso estará sujeto a las polìticas de privacidad de dicho tercero, por las que <span>COCODRILO</span> no se hace responsable.</li>
									<li><span>11.4.</span> Mantenimiento y conservación de la información: La información del usuario es recolectada y guardada en los servidores, que son propiedad y son operados por, o en nombre de <span>COCODRILO</span>,  quien podría conservar dicha información por un período razonable para los propósitos descritos en éste documento.</li>
									<li><span>11.5.</span> Vínculos a otras páginas web: El interactivo <span>PEATÓN</span>, contiene vínculos a otras páginas y publicidad de terceros. <span>COCODRILO</span> no es responsable por las políticas de privacidad o los contenidos de éstos sitios, inclusive si éstos usan el logo de <span>COCODRILO</span> como parte de un acuerdo de marca conjunto, ni por la forma en la cual la información sobre sus usuarios es manejada. Antes de enviar cualquier información a tales páginas, <span>COCODRILO</span> recomienda revisar la política de privacidad que rige cada uno de ellos</li>
								</ul>
							</li>
							<li>
								<span>12.</span> El usuario tiene el derecho de solicitar copia de la información que <span>COCODRILO</span> tiene sobre él (lo que podría implicar un costo para el usuario), y solicitar cambios en la misma.
							</li>
							<li>
								<span>13.</span> Los presentes términos de uso están regidos por la ley Colombiana. Las cortes colombianas tendrán la exclusiva jurisdicción respecto a cualquier disputa o interpretación que surja respecto a éstos términos de uso.
							</li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

@endsection
