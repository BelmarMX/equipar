@extends('00_layouts.02_system.app')
@section('title', 'Cambio masivo de precios')
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
	
	<form class="in uk-form-horizontal uk-margin-large">
		<div class="uk-margin">
			<label class="uk-form-label" for="form-horizontal-select">Buscar productos en:</label>
			<div class="uk-form-controls">
				<div uk-form-custom="target: > * > span:first-child" class="width-100">
					<select id="subcategory" name="marca" required>
						<option value="*ALL*" selected>Seleccionar marca (ninguna)</option>
						@foreach($brands AS $brand)
						@if( !empty($brand -> marca) )
						<option value="{{$brand -> marca}}" @if(isset($_GET['marca']) && $_GET['marca'] == $brand -> marca ) selected @endif>{{$brand -> marca}}</option>
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
		
		<div class="uk-text-center">
			<button class="mt-1 uk-button uk-button-primary button-submit-prevent">Buscar</button>
		</div>
	</form>
	{{-- /Form --}}
</div>

<div class="uk-container uk-margin-top">
	{{-- Data tables --}}
	<form class="uk-form-horizontal uk-margin-large" enctype="multipart/form-data" method="POST" action="{{ route('product.pricechangeUpdate') }}">
		@csrf
		@include('00_layouts.02_system.03_alert')
		
		@if( !empty( $_GET['marca'] ) )
		<div class="uk-margin ElmoToneto">
			<div class="uk-text-right" style="vertical-align: middle">
				Aplicar: 
				<input type="text" class="decimal" placeholder="Cantidad" id="quantity">
				<select id="operator1">
					<option value="%" selected>Por ciento</option>
					<option value="$">Pesos</option>
				</select>
				de
				<select id="operator2">
					<option value="+" selected>Aumento</option>
					<option value="-">Descuento</option>
				</select>
				<a class="elBoton">Generar precios nuevos</a>
			</div>
		</div>
		@endif
		
		<table id="IndexList2" class=" uk-table uk-table-striped">
			<thead>
				<tr>
					<th>ID</th>
					<th class="no-sort uk-text-center">Vista previa</th>
					<th>Titulo</th>
					<th>Marca</th>
					<th>Categoría</th>
					<th>Subcategoría</th>
					<th class="no-sort">Precio</th>
					<th class="no-sort">Precio nuevo</th>
				</tr>
			</thead>
			<tbody>
				@foreach($entries as $entry)
				<tr class="eachProduct">
					<td>
						{{ $entry -> idP }}
						<input type="hidden" name="idProd[]" value="{{ $entry -> idP }}">
					</td>
					<td>
						<div uk-lightbox>
							<a class="uk-button uk-button-default" href="{{ url('storage/'.env('PRODUCT_FOLDER') . $entry -> imageP) }}">
								<img src="{{ url('storage/'.env('PRODUCT_FOLDER') . $entry -> image_rxP) }}" width="80">
							</a>
						</div>
					</td>
					<td>{{ $entry -> titleP }}</td>
					<td>{{ $entry -> marca }}</td>
					<td>{{ $entry -> titleC }}</td>
					<td>{{ $entry -> titleS }}</td>
					<td class="prPrice">
						<input type="text" name="precio[{{ $entry -> idP }}]" value="{{ $entry -> precio }}" readonly>
					</td>
					<td class="prPromo">
						<input class="decimal" name="precioPromo[{{ $entry -> idP }}]" type="text" placeholder="0.00">
					</td>
				</tr>
				@endforeach
			</tbody>
		</table>
		
		<div class="uk-text-center">
			<div class="FormSending mb-3" style="display:none">
				<div uk-spinner></div>Actualizando, espere por favor...<br>
			</div>
			<button class="mt-1 uk-button uk-button-primary button-submit-prevent">Actualizar precios</button>
		</div>
	</form>
	{{-- /Data tables --}}
</div>
@endsection