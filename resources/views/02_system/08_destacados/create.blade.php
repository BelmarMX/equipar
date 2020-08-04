@extends('00_layouts.02_system.app')
@section('title', 'Nuevo producto destacado')
@section('BodyClass', 'void')

@section('Content')
<div id="NavigationBar" class="uk-margin-top" uk-grid>
	<div class="uk-width-1-6">
		&nbsp;
	</div>
	<div class="uk-width-expand uk-text-center">
		<h1 class="uk-heading-primary">@yield('title')</h1>
	</div>
	<div class="uk-width-1-6 uk-text-right">
		<a href="{{ route('producto-destacado.index') }}" class="uk-icon-button White box-50 bg-blue" uk-icon="reply" uk-tooltip title="Volver al listado"></a>
	</div>
</div>

<div class="uk-container uk-margin-top">
	{{-- Form --}}
	<form class="in uk-margin-large" enctype="multipart/form-data" method="POST" action="{{ route('producto-destacado.store') }}">
		@csrf
		@include('00_layouts.02_system.03_alert')

		<div uk-grid>
			<div class="uk-width-1-3@m">
				<div class="uk-margin">
					<label class="uk-form-label" for="form-horizontal-select">Categoría</label>
					<div class="uk-form-controls">
						<div uk-form-custom="target: > * > span:first-child" class="width-100">
							<select id="category" name="category_id" required>
								<option value="" selected>Seleccionar categoría</option>
								@foreach( $categories AS $category )
									<option value="{{ $category -> id }}">{{ $category -> title }}</option>
								@endforeach
							</select>
							<button class="selectbtn uk-button uk-button-default width-100" type="button" tabindex="-1">
								<span></span>
								<span uk-icon="icon: chevron-down"></span>
							</button>
						</div>
					</div>
				</div>
			</div>
			<div class="uk-width-1-3@m">
				<div class="uk-margin">
					<label class="uk-form-label" for="form-horizontal-select">Subcategoría</label>
					<div class="uk-form-controls">
						<div uk-form-custom="target: > * > span:first-child" class="width-100">
							<select id="subcategory" name="subcategory_id">
								<option value="" selected>Seleccionar subcategoría</option>
							</select>
							<button class="selectbtn uk-button uk-button-default width-100" type="button" tabindex="-1">
								<span></span>
								<span uk-icon="icon: chevron-down"></span>
							</button>
						</div>
					</div>
				</div>
			</div>
			<div class="uk-width-1-3@m">
				<div class="uk-margin">
					<label class="uk-form-label" for="form-horizontal-select">Marca</label>
					<div class="uk-form-controls">
						<div uk-form-custom="target: > * > span:first-child" class="width-100">
							<select id="brand" name="brand">
								<option value="" selected>Seleccionar marca</option>
							</select>
							<button class="selectbtn uk-button uk-button-default width-100" type="button" tabindex="-1">
								<span></span>
								<span uk-icon="icon: chevron-down"></span>
							</button>
						</div>
					</div>
				</div>
			</div>
			<div class="uk-width-1-1 uk-margin-bottom">
				<div class="uk-margin">
					<label class="uk-form-label" for="form-horizontal-select">Producto</label>
					<div class="uk-form-controls">
						<div uk-form-custom="target: > * > span:first-child" class="width-100">
							<select id="product" name="product" required>
								<option value="" selected>Seleccionar producto</option>
							</select>
							<button class="selectbtn uk-button uk-button-default width-100" type="button" tabindex="-1">
								<span></span>
								<span uk-icon="icon: chevron-down"></span>
							</button>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="uk-text-center">
			<div class="FormSending mb-3" style="display:none">
				<div uk-spinner></div> Guardando, espere por favor...<br>
			</div>
			<button class="mt-1 uk-button uk-button-primary button-submit-prevent">Guardar</button>
		</div>
	</form>
	{{-- /Form --}}
</div>
@endsection
@section('CustomJs')
<script>
	$.ajaxSetup({
		headers: {
			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		}
	});
	$('#category').on('change', function (e) {
		$('#subcategory').html('<option value="">Seleccionar subcategoría</option>');
		$.ajax({
			url:	"{{ route('producto-destacado.subcategories') }}",
			method:	'POST',
			data:	{
				category_id: $(this).val()
			}
		}).done(function (d) {
			$.each(d, function(i, val){
				$('#subcategory').append('<option value="' + val.id + '">' + val.title + '</option>');
			})
		});

		$('#product').html('<option value="">Seleccionar producto</option>');
		$.ajax({
			url:	"{{ route('producto-destacado.products') }}",
			method:	'POST',
			data:	{
				category_id: $('#category').val()
			}
		}).done(function (d) {
			$.each(d, function(i, val){
				$('#product').append('<option value="' + val.id + '">' + val.title + '</option>');
			})
		});
	});
	$('#subcategory').on('change', function (e) {
		$('#brand').html('<option value="">Seleccionar marca</option>');
		$.ajax({
			url:	"{{ route('producto-destacado.brands') }}",
			method:	'POST',
			data:	{
				category_id: $('#category').val(),
				subcategory_id: $(this).val()
			}
		}).done(function (d) {
			$.each(d, function(i, val){
				$('#brand').append('<option value="' + val.marca + '">' + val.marca + '</option>');
			})
		});

		$('#product').html('<option value="">Seleccionar producto</option>');
		$.ajax({
			url:	"{{ route('producto-destacado.products') }}",
			method:	'POST',
			data:	{
				category_id: $('#category').val(),
				subcategory_id: $('#subcategory').val(),
			}
		}).done(function (d) {
			$.each(d, function(i, val){
				$('#product').append('<option value="' + val.id + '">' + val.title + '</option>');
			})
		});
	});
	$('#brand').on('change', function (e) {
		$('#product').html('<option value="">Seleccionar producto</option>');
		$.ajax({
			url:	"{{ route('producto-destacado.products') }}",
			method:	'POST',
			data:	{
				category_id: $('#category').val(),
				subcategory_id: $('#subcategory').val(),
				brand: $(this).val()
			}
		}).done(function (d) {
			$.each(d, function(i, val){
				$('#product').append('<option value="' + val.id + '">' + val.title + '</option>');
			})
		});
	});
</script>
@endsection