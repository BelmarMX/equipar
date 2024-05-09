@extends('00_layouts.02_system.app')
@section('title', 'Cambio masivo de marcas con flete incluido')
@section('BodyClass', 'void')
@section('CustomCss')
<style>
	form:not(.in),
	form:not(.in) *{
		max-width: 100% !important;
		font-weight: 300 !important;
	}
</style>
@endsection

@section('Content')
<div id="NavigationBar" class="uk-margin-top" uk-grid>
	<div class="uk-width-1-6">
		&nbsp;
	</div>
	<div class="uk-width-expand uk-text-center">
		<h1 class="uk-heading-primary">@yield('title')</h1>
	</div>
	<div class="uk-width-1-6 uk-text-right">
		<a href="{{ route('product.index') }}" class="uk-icon-button White box-50 bg-blue" uk-icon="reply" uk-tooltip title="Volver al listado"></a>
	</div>
</div>

<div class="uk-container uk-margin-top">
	{{-- Form --}}
	<div class="FormSending mb-3" style="display:none">
		<div uk-spinner></div>Trabajando, espere por favor...<br>
	</div>
	
	<form class="in uk-form-horizontal uk-margin-large" method="POST" action="{{ route('product.fletechangeUpdate') }}">
		@csrf
		@include('00_layouts.02_system.03_alert')

		<div class="uk-margin">
			<label class="uk-form-label" for="form-horizontal-select">Selecciona la marca:</label>
			<div class="uk-form-controls">
				<div uk-form-custom="target: > * > span:first-child" class="width-100">
					<select id="marca" name="marca" required>
						<option value="*ALL*" selected>Seleccionar marca (ninguna)</option>
						@foreach($brands AS $brand)
							@if( !empty($brand -> marca) )
							<option value="{{$brand -> marca}}" @if((isset($_GET['marca']) && $_GET['marca'] == $brand -> marca) || old('marca') == $brand -> marca ) selected @endif>{{$brand -> marca}}</option>
							@endif
						@endforeach
					</select>
					<button class="selectbtn uk-button uk-button-default width-100" type="button" tabindex="-1">
						<span></span>
						<span uk-icon="icon: chevron-down"></span>
					</button>
				</div>
			</div>
		</div>

		<div class="uk-margin">
			<label class="uk-form-label" for="form-horizontal-select">Flete incluido:</label>
			<div class="uk-form-controls">
				<div uk-form-custom="target: > * > span:first-child" class="width-100">
					<select id="con_flete" name="con_flete" required>
						<option value="0" {{ old('con_flete') == 0 || empty(old('con_flete')) ? 'selected' : '' }} >No</option>
						<option value="1" {{ old('con_flete') == 1 ? 'selected' : '' }}>Sí</option>
					</select>
					<button class="selectbtn uk-button uk-button-default width-100" type="button" tabindex="-1">
						<span></span>
						<span uk-icon="icon: chevron-down"></span>
					</button>
				</div>
			</div>
		</div>

		<div class="uk-text-center">
			<div class="FormSending mb-3" style="display:none">
				<div uk-spinner></div>Actualizando, espere por favor...<br>
			</div>
			<button class="mt-1 uk-button uk-button-primary button-submit-prevent">Actualizar flete</button>
		</div>
	</form>
</div>
@endsection