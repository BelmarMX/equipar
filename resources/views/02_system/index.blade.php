@extends('00_layouts.02_system.app')
@section('title', 'Bienvenido')
@section('BodyClass', 'void')

@section('Content')
<div class="uk-container uk-margin-top">
	<div class="uk-flex-center" uk-grid>
		<div class="uk-text-center width-100 bg-gray-dsp pd-25">
			<img src="{{ asset('images/layout/id-dispersion-small.svg') }}" width="27%" alt="Dispersion MX" class="min-width-250">
		</div>
		<h1 class="uk-heading-primary">¡Bienvenido de nuevo, {{ Auth::user() -> name }}!</h1>
		<p>
			Recuerda que esta es una versión de prueba del administrador, por lo que se pueden presentar algunos errores.<br>
			En caso de detectar uno, por favor contáctate con nosotros al correo: contacto@dispersion.mx, no olvides adjuntar capturas de pantalla.
		</p>
		<p>
			<b>Admin:</b> {{ env('ADMIN_NAME') }}<br>
			<b>Email:</b> <a href="mailto:{{ env('ADMIN_MAIL') }}">{{ env('ADMIN_MAIL') }}</a><br>
			<b>Móvil:</b> <a href="tel:{{ env('ADMIN_PHONE') }}">{{ env('ADMIN_PHONE') }}</a>
		</p>

		<small>Tipo de usuario: <b>{{ Auth::user() -> role }}</b> Permisos: <b>{{ Auth::user() -> permissions }}</b></small>
	</div>
</div>
@endsection