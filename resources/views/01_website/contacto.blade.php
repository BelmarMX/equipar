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

		@include('01_website.ubicaciones')
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