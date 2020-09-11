@extends('00_layouts.01_website.app')
@section('title',       $meta['titulo'])
@section('descripcion', $meta['descripcion'])
@section('imagen',      $meta['imagen'])
@section('Content')
	<div id="anc">
		<div class="uk-container" uk-scrollspy="cls:uk-animation-fade">
			<div class="uk-width-3-5@m">
				<div class="rounded-container bg-gray">
					<h1 class="uk-text-uppercase">Póngase en contacto con nosotros</h1>
				</div>
			</div>
			<div class="uk-margin-medium-top" uk-grid>
				<div class="uk-width-3-5@m">
					@include('00_layouts.01_website.03_alert')
					<form class="uk-form-stacked" enctype="multipart/form-data" method="post" action="{{ route('mail.store') }}">
						{!! csrf_field() !!}
						<fieldset class="uk-fieldset">
							<legend class="uk-legend">Ingresa tus datos para que te contacte un asesor.</legend>

							<div class="uk-margin">
								<input class="uk-input" type="text" name="nombre" placeholder="Nombre completo" value="{{ old('nombre') }}" required>
							</div>
							<div class="uk-margin">
								<input class="uk-input" type="email" name="correo" placeholder="Correo electrónico" value="{{ old('correo') }}" required>
							</div>
							<div class="uk-margin">
								<input class="uk-input" type="text" name="empresa" placeholder="Empresa" value="{{ old('empresa') }}" required>
							</div>
							<div class="uk-margin">
								<input class="uk-input" type="text" name="telefono" placeholder="Número teléfonico" value="{{ old('telefono') }}">
							</div>
							<div class="uk-margin">
								<input class="uk-input" type="text" name="asunto" placeholder="Asunto" @if(isset($_GET['s'])) value="Información de producto ({{ $_GET['p'] }})" @else value="{{ old('asunto') }}" @endif>
							</div>
							@php
							if( isset($_GET['p']) )
							{
								$message = "¡Hola! quisiera tener más información acerca del producto: ".$_GET['t'].", Modelo: ".$_GET['m'].", con número de identificación ".$_GET['p'];
							}
							else
							{
								$message = old('cuerpo') ?? '';
							}
							@endphp
							<div class="uk-margin">
								<textarea class="uk-textarea" rows="5" name="cuerpo" placeholder="Cuerpo del mensaje" required>{{ $message }}</textarea>
							</div>
							<div class="uk-margin">
								<div class="g-recaptcha" data-sitekey="{{ env('CAPTCHA_PUBLIC') }}"></div>
							</div>
							<div class="uk-margin uk-text-center">
								<div class="FormSending mb-3" style="display:none">
									<div uk-spinner></div> Enviando, espere por favor...<br>
								</div>
								<button class="mt-1 uk-button button-submit-prevent">Enviar</button>
							</div>
						</fieldset>
					</form>
				</div>
				<div class="uk-width-2-5@m">
					<div class="uk-grid-collapse uk-child-width-expand@s" uk-grid>
						<div class="uk-width-1-5">
							<div class="rounded bg-orange">
								<i class="material-icons">textsms</i>
							</div>
						</div>
						<div class="uk-width-4-5">
							<span class="info telefono">01 (33) 2886 2661</span><br>
							<span class="info email">atencionaclientes@equi-par.com</span>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="uk-container uk-margin-medium-top" uk-scrollspy="cls:uk-animation-fade">
			<div class="uk-width-3-5@m">
				<div class="rounded-container bg-gray">
					<h2 class="uk-text-uppercase">Matriz Zapopan</h2>
				</div>
			</div>
			<div class="uk-margin-small" uk-grid>
				<div class="uk-width-3-5@m">
					<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3733.7183108720524!2d-103.41785448531651!3d20.640335586210117!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8428ac3771334f73%3A0x30b1ae0d168d0eb4!2sAv%20Mariano%20Otero%203519%2C%20La%20Calma%2C%2045070%20Zapopan%2C%20Jal.!5e0!3m2!1ses!2smx!4v1573688100464!5m2!1ses!2smx" width="100%" height="300" frameborder="0" style="border:0" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
				</div>
				<div class="uk-width-2-5@m">
					<div class="uk-grid-collapse uk-child-width-expand@s" uk-grid>
						<div class="uk-width-1-5">
							<div class="rounded bg-orange">
								<i class="material-icons">location_on</i>
							</div>
						</div>
						<div class="uk-width-4-5">
							<span class="info direccion">Mariano Otero #3519<br>Col. La calma<br>Zapopan, Jalisco. México<br>C.P. 45070</span>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="uk-container uk-margin-medium-top" uk-scrollspy="cls:uk-animation-fade">
			<div class="uk-width-3-5@m">
				<div class="rounded-container bg-gray">
					<h2 class="uk-text-uppercase">Sucursal Guadalajara</h2>
				</div>
			</div>
			<div class="uk-margin-small" uk-grid>
				<div class="uk-width-3-5@m">
					<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3732.211953869388!2d-103.36856798507286!3d20.701615986176446!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x8573938c634944dd!2sEqui-par%20Cocinas%20Industriales!5e0!3m2!1ses!2smx!4v1599787367667!5m2!1ses!2smx" width="100%" height="300" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
				</div>
				<div class="uk-width-2-5@m">
					<div class="uk-grid-collapse uk-child-width-expand@s" uk-grid>
						<div class="uk-width-1-5">
							<div class="rounded bg-orange">
								<i class="material-icons">location_on</i>
							</div>
						</div>
						<div class="uk-width-4-5">
							<span class="info direccion">Av. Cvln. Jorge Álvarez del Castillo #1442<br>Col. Lomas del Country<br>Guadalajara, Jalisco. México<br>C.P. 44610</span>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection

@section('CustomJs')
	<script src="https://www.google.com/recaptcha/api.js" async defer></script>
	<script type="text/javascript">
		$('.button-submit-prevent').on('click', function(e){
			$('.FormSending').show();
			setTimeout(function(){ $('.FormSending').fadeOut(); }, 4500);
		});
	</script>
@endsection