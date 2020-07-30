@extends('00_layouts.02_system.app')
@section('title', 'Agregar productos a promoción')
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
		border-bottom: 1px dashed #FFF;
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
	#forzar{
		width: 15px;
		height: 15px;
		vertical-align: middle;
	}
	.automatic{
		border-left: 2px solid orange !important;
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
		<h2>{{ $promocion -> title }}</h2>
		@if($promocion -> type == '$')
		<h3>{{ $promocion -> general_disc == 0 ? 'Descuento individual' : 'Descuento general: ' . '$' . $promocion -> amount  }}</h3>
		@else
		<h3>{{ $promocion -> general_disc == 0 ? 'Descuento individual' : 'Descuento general: ' . $promocion -> amount . '%'  }}</h3>
		@endif
		<div class="uk-alert-primary" uk-alert>
			<p>El descuento se actualiza automáticamente de acuerdo al precio registrado en la BDD pero sólo se almacenará al hacer clic en el botón "Guardar"</p>
		</div>
    </div>
    <div class="uk-width-1-6 uk-text-right">
        @if(Auth::user() -> permissions >= 644)
            <a href="{{ route('promociones.index') }}" class="uk-icon-button White box-50 bg-blue" uk-icon="reply" uk-tooltip title="Volver al listado"></a>
        @endif
    </div>
</div>

<div class="uk-container uk-margin-top">
    {{-- Form --}}
	<div class="FormSending mb-3" style="display:none">
		<div uk-spinner></div>Trabajando, espere por favor...<br>
	</div>

    <form class="in uk-form-horizontal uk-margin-large" style="border:1px solid #ccc; padding:10px;">
		<div class="uk-margin">
            <label class="uk-form-label" for="form-horizontal-select">Buscar productos en:</label>
            <div class="uk-form-controls">
                <div uk-form-custom="target: > * > span:first-child" class="width-100">
                    <select id="subcategory" name="marca" required>
                        <option value="*ALL*" selected>Todas las marcas</option>
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

		@if( !empty( $_GET['marca'] ) && $_GET['marca'] != '*ALL*' )
		<hr>
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
					<option value="+">Aumento</option>
					<option value="-" selected>Descuento</option>
				</select>
				<label><input type="checkbox" value="1" id="forzar">Forzar cambio</label>
				<a class="elBoton">Generar precios nuevos</a>
			</div>
		</div>
		@endif
    </form>
    {{-- /Form --}}
</div>

<div class="uk-container uk-margin-top">
    {{-- Data tables --}}
    <form class="uk-margin-large" enctype="multipart/form-data" method="POST" action="{{ route('promociones.addStore', $promocion -> id) }}">
        @csrf
		@include('00_layouts.02_system.03_alert')
		<input type="hidden" name="discount_type" value="{{ $promocion -> type }}">

		<table id="IndexList2" class=" uk-table uk-table-striped">
			<thead>
				<tr>
					<th>ID</th>
					<th class="no-sort uk-text-center">Vista previa</th>
					<th>Titulo</th>
					<th>Marca</th>
					<th>Categoría / Subcategoría</th>
					<th>Precio normal</th>
					<th>Precio de promoción</th>
					<th class="no-sort uk-text-center">Agregado</th>
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
						<td>{{ $entry -> titleC }} / {{ $entry -> titleS }}</td>
						<td class="prPrice">
							<input type="text" name="precio[{{ $entry -> idP }}]" value="{{ $entry -> precio }}" readonly>
						</td>
						<td class="prPromo">
							{{--@if($promocion -> general_disc == 0 && in_array( $entry -> idP, $productos_ids ))--}}
							@if(in_array( $entry -> idP, $productos_ids ))
								<input class="decimal bdbv" name="precioPromo[{{ $entry -> idP }}]" type="text" placeholder="0.00" value="{{ $final_prices[$entry -> idP] }}">
							@else
								<input class="decimal automatic" name="precioPromo[{{ $entry -> idP }}]" type="text" placeholder="0.00">
								<br><small>Generado automáticamente.</small>
							@endif
							</td>
						<td class="uk-text-center">
							<input class="chkbox" type="checkbox" name="inPromo[{{ $entry -> idP }}]" value="1" @if(in_array( $entry -> idP, $productos_ids ) || (isset($_GET['marca']) && $_GET['marca'] != '*ALL*') ) checked @endif>
						</td>
					</tr>
				@endforeach
			</tbody>
		</table>

		<div class="uk-text-center">
            <div class="FormSending mb-3" style="display:none">
                <div uk-spinner></div> Guardando, espere por favor...<br>
            </div>
            <button class="mt-1 uk-button uk-button-primary button-submit-prevent">Guardar</button>
        </div>
	</form>
    {{-- /Data tables --}}
</div>
@endsection

@section('CustomJs')
<script>
	var tipoPromo		= {{ $promocion -> general_disc  }}
	,	montoDescuento	= {{ $promocion -> amount > 0 ? $promocion -> amount : 0  }}
	,	tipoDescuento	= '{{ $promocion -> type  }}'
</script>
<script src="{{ asset('/js/prices.js') }}"></script>
@endsection