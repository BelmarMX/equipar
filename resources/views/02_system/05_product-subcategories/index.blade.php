@extends('00_layouts.02_system.app')
@section('title', 'Lista de subcategorías de productos')
@section('BodyClass', 'void')

@section('Content')
<div id="NavigationBar" class="uk-margin-top" uk-grid>
    <div class="uk-width-1-6">
        &nbsp;
    </div>
    <div class="uk-width-expand uk-text-center">
        <h1 class="uk-heading-primary">Lista de subcategorías de productos</h1>
    </div>
    <div class="uk-width-1-6 uk-text-right">
        @if(Auth::user() -> permissions >= 644)
            <a href="{{ route('product-subcategories.create') }}" class="uk-icon-button White box-50 bg-blue" uk-icon="plus-circle" uk-tooltip title="Nuevo registro"></a>
        @endif
    </div>
</div>

<div class="uk-container uk-margin-top">
    {{-- Data tables --}}
    <table id="IndexList" class="uk-table uk-table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Titulo</th>
                <th>Slug</th>
                <th>Categoría</th>
                <th>Creado</th>
                <th>Actualizado</th>
                <th>Eliminado</th>
                <th class="no-sort uk-text-center">Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($entries as $entry)
                <tr @if( $entry -> deleted_at ) class="deleted-item" @endif>
                    <td>{{ $entry -> id }}</td>
                    <td>{{ $entry -> title }}</td>
                    <td>{{ $entry -> slug }}</td>
                    <td>{{ $category[$entry -> category_id] }}</td>
                    <td data-search="{{ fsDate( $entry -> created_at ) }}" data-order="{{ $entry -> created_at }}">{{ fDate( $entry -> created_at ) }}</td>
                    <td data-search="{{ fsDate( $entry -> updated_at ) }}" data-order="{{ $entry -> updated_at }}">{{ fDate( $entry -> updated_at ) }}</td>
                    <td data-search="{{ fsDate( $entry -> deleted_at ) }}" data-order="{{ $entry -> deleted_at }}">{{ fDate( $entry -> deleted_at ) }}</td>
                    <td class="uk-text-center">
                        @can('users.edit')
                            @if(!$entry -> deleted_at)
                                <a href="{{ route('product-subcategories.edit', $entry -> id) }}" class="uk-icon-button" uk-icon="file-edit" uk-tooltip title="Editar"></a>
                            @endif
                        @endcan
                        @can('users.destroy')
                            @if($entry -> deleted_at)
                                <a href="{{ route('product-subcategories.restore', $entry -> id) }}" class="uk-icon-button sure red" uk-icon="history" data-title="Restaurar a {{ $entry -> title }}" uk-tooltip title="Restaurar"></a>
                            @else
                                <a href="{{ route('product-subcategories.destroy', $entry -> id) }}" class="uk-icon-button sure" uk-icon="trash" data-title="Desactivar a {{ $entry -> title }}" uk-tooltip title="Desactivar"></a>
                            @endif
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