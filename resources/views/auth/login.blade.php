@extends('00_layouts.02_system.app')
@section('title', 'Inicio de Sesión')
@section('BodyClass', 'login')

@section('Content')
<div class="uk-container">
	<div class="uk-flex-center" uk-grid>
		<form method="POST" action="{{ route('login') }}" id="Login">
			@csrf
			<h1 class="uk-text-center">Iniciar Sesión</h1>
			<div class="uk-margin">
				<div class="uk-inline">
					<span class="uk-form-icon" uk-icon="icon: user"></span>
					<input class="uk-input uk-form-width-medium" style="width:250px;" type="email" placeholder="user@domain.com" name="email" required>
				</div>
			</div>

			<div class="uk-margin">
				<div class="uk-inline">
					<span class="uk-form-icon" uk-icon="icon: lock"></span>
					<input class="uk-input uk-form-width-medium" style="width:250px;" type="password" placeholder="**********" name="password" required>
				</div>
			</div>
			{{--
			<div class="uk-margin">
				<div class="uk-inline">
					<label for="remember">
						<input class="uk-checkbox" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
						Recordarme
					</label>
				</div>
			</div>
			--}}
			<div class="uk-margin">
				<div class="uk-text-center">
					<button type="submit" class="uk-button uk-button-primary">
						Ingresar
					</button>
					{{--
					<br>
					<a class="btn btn-link" href="{{ route('password.request') }}">
						Olvidé mi contraseña
					</a>
					--}}
				</div>
			</div>
		</form>
	</div>
	@if( $errors -> has('*') )
	<div class="uk-container" style="background: rgba(255,255,255,.75); padding: 3px; font-weight: 200; max-width: 550px; text-align: center; border-radius: 20px; border-bottom: 4px solid #FFF;">
		@if ($errors->has('email'))
			<span class="uk-text-danger">
				{{ $errors->first('email') }}
			</span>
		@endif
		@if ($errors->has('password'))
			<span class="uk-text-danger">
				{{ $errors->first('password') }}
			</span>
		@endif
	</div>
	@endif
</div>
@endsection