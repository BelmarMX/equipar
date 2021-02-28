@extends('00_layouts.02_system.app')
@section('title', 'Editar galería de imagenes del producto')
@section('BodyClass', 'void')
@section('CustomJs')
@endsection

@section('Content')
<div id="NavigationBar" class="uk-margin-top" uk-grid>
	<div class="uk-width-1-6">
		&nbsp;
	</div>
	<div class="uk-width-expand uk-text-center">
		<h1 class="uk-heading-primary">@yield('title')</h1>
		<h2>{{ $entry -> title }}</h2>
	</div>
	<div class="uk-width-1-6 uk-text-right">
		<a href="{{ route('product.index') }}" class="uk-icon-button White box-50 bg-blue" uk-icon="reply" uk-tooltip title="Volver al listado"></a>
	</div>
</div>

<div class="uk-container uk-margin-top">
	{{-- Form --}}
	<form class="in uk-form-horizontal uk-margin-large" enctype="multipart/form-data" method="POST" action="{{ route('product.addImagesStore', $entry -> id) }}">
		@csrf
		@include('00_layouts.02_system.03_alert')

		<div class="uk-margin">
			<label class="uk-form-label" for="form-horizontal-text">Imagen(es)</label>

			<div class="uk-form-controls uk-form-controls-text">
				<div uk-form-custom="target: true">
					<span class="uk-form-icon uk-form-icon-flip" uk-icon="icon: folder"></span>
					<input type="file" name="images[]" accept="image/*" multiple required>
					<input name="file_names" class="uk-input uk-form-width-medium" type="text" placeholder="Puedes seleccionar varios archivos" disabled>
				</div>
				<div class="uk-alert-primary" uk-alert>
					<p>El archivo debe medir min: <b>{{ env('PRODUCT_WIDTH') }}x{{ env('PRODUCT_HEIGHT') }} px</b> y pesar menos de <b>{{ env('FILE_MAX_SIZE') }} kb.</b></p>
				</div>
			</div>
		</div>
		<div class="uk-text-center">
			<div class="FormSending mb-3" style="display:none">
				<div uk-spinner></div> Guardando, espere por favor...<br>
			</div>
			<button class="mt-1 uk-button uk-button-primary button-submit-prevent">Guardar</button>
		</div>

		@if( count($entry -> images) > 0 )
		<h3 class="uk-text-center">Imágenes previamente cargadas.</h3>
		@endif
		<div uk-grid>
			@foreach($entry -> images AS $image)
			<div class="uk-width-1-5@m uk-text-center">
				<img width="100%" class="uk-responsive-width" src="{{ url('storage/'.env('PRODUCT_FOLDER') . $image -> image_rx) }}" alt="Imagen">
				<a href="{{ route('product.addImagesDelete', $image -> id) }}" class="uk-button uk-button-default sure" data-title="Eliminar imagen de la galería" uk-tooltip title="Eliminar esta imagen">
					<i class="uk-icon-button" uk-icon="trash"></i>
				</a>
			</div>
			@endforeach
		</div>
	</form>
	{{-- /Form --}}
</div>
@endsection