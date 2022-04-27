@extends('00_layouts.02_system.app')
@section('title', 'Actualización masiva de productos')
@section('BodyClass', 'void')
@section('CustomCss')
<style>
	form:not(.in),
	form:not(.in) *{
		max-width: 100% !important;
		font-weight: 300 !important;
	}
	.prPrice > input,
	.prPromo > input{
		font-size: 1.25rem !important;
		border: 1px solid #e5e5e5;
		text-align: right;
		padding: 4px;
	}
	.chkbox{
		width: 20px;
		height: 20px;
	}
	.ElmoToneto *{
		font-size: 14px !important;
	}
	.ElmoToneto{
		padding: 15px;
		border-bottom: 1px dashed #666;
	}
	.ElmoToneto a.elBoton{
		background: #333;
		color: #FFF;
		padding: 3px;
		border-radius: 3px;
	}
	.ElmoToneto a.elBoton:hover{
		background: #666;
	}
</style>
@endsection
@section('CustomJs')
<script src="{{ asset('/js/pricesMass.js') }}"></script>
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
	
	<form class="in uk-form-horizontal uk-margin-large" method="POST" enctype="multipart/form-data" action="{{ route('product.uploadAllTemplate') }}">
		@csrf
		<div class="uk-margin">
			<input type="hidden" name="csv_file" value="1">
			<label class="uk-form-label" for="form-horizontal-text">Cargar archivo XLSX</label>
			<div class="uk-form-controls uk-form-controls-text">
				<div uk-form-custom="target: true">
					<span class="uk-form-icon uk-form-icon-flip" uk-icon="icon: folder"></span>
					<input type="file" name="xlsx" accept=".xlsx" required>
					<input class="uk-input uk-form-width-medium" type="text" placeholder="Seleccionar archivo" disabled>
				</div>
				<div class="uk-alert-primary" uk-alert>
					<p>El archivo debe tener formato .xlsx,
						<a href="{{ route('product.downloadAllTemplate') }}" style="font-weight: 600; font-size: 1.5rem !important">
							Descarga la plantilla
						</a>.
					</p>
				</div>
			</div>
		</div>
		<div class="uk-text-center">
			<button class="mt-1 uk-button uk-button-primary"
					onclick="$(this).text('Cargando, espere por favor...')"
			>Cargar</button>
		</div>
	</form>
</div>
@endsection