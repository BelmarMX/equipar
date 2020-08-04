@extends('00_layouts.02_system.app')
@section('title', 'Productos destacados')
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
		@if(Auth::user() -> permissions >= 644)
			<a href="{{ route('producto-destacado.create') }}" class="uk-icon-button White box-50 bg-blue" uk-icon="plus-circle" uk-tooltip title="Nuevo registro"></a>
		@endif
	</div>
</div>

<div class="uk-container uk-margin-top">
	{{-- Data tables --}}
	<table id="IndexList" class="uk-table uk-table-striped">
		<thead>
			<tr>
				<th>ID</th>
				<th class="no-sort uk-text-center">Vista previa</th>
				<th>Titulo</th>
				<th>Agregado</th>
				<th class="no-sort uk-text-center">Acciones</th>
			</tr>
		</thead>
		<tbody>
			@foreach($entries as $entry)
				<tr>
					<td>{{ $entry -> id }}</td>
					<td>
						<div uk-lightbox>
							<a class="uk-button uk-button-default" href="{{ url('storage/'.env('PRODUCT_FOLDER') . $entry -> producto -> image) }}">
								<img src="{{ url('storage/'.env('PRODUCT_FOLDER') . $entry -> producto -> image) }}" width="80">
							</a>
						</div>
					</td>
					<td>{{ $entry -> producto -> title }}</td>
					<td data-search="{{ fsDate( $entry -> created_at ) }}" data-order="{{ $entry -> created_at }}">{{ fDate( $entry -> created_at ) }}</td>
					<td class="uk-text-center">
						@can('users.destroy')
							<a href="{{ route('producto-destacado.destroy', $entry -> id) }}" class="uk-icon-button sure" uk-icon="trash" data-title="Eliminar a {{ $entry -> producto -> title }}" uk-tooltip title="Desactivar"></a>
						@endcan
					</td>
				</tr>
			@endforeach
		</tbody>
	</table>
	{{-- /Data tables --}}
</div>

@if( $entries -> lastPage() > 1 )
	<hr class="uk-divider-icon">
	<div class="uk-container uk-margin-top uk-text-center">
		<small>Paginación por cada 100 registros</small>
		{!! $entries -> render() !!}
	</div>
@endif
@endsection