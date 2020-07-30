@extends('00_layouts.02_system.app')
@section('title', 'Lista de Usuarios')
@section('BodyClass', 'void')

@section('Content')
<div id="NavigationBar" class="uk-margin-top" uk-grid>
    <div class="uk-width-1-6">
        &nbsp;
    </div>
    <div class="uk-width-expand uk-text-center">
        <h1 class="uk-heading-primary">Usuarios</h1>
    </div>
    <div class="uk-width-1-6 uk-text-right">
        @if(Auth::user() -> permissions >= 644)
            <a href="{{ route('users.create') }}" class="uk-icon-button White box-50 bg-blue" uk-icon="plus-circle" uk-tooltip title="Nuevo registro"></a>
        @endif
    </div>
</div>

<div class="uk-container uk-margin-top">
    {{-- Data tables --}}
    <table id="IndexList" class="uk-table uk-table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Usuario</th>
                <th>Rol</th>
                <th>Permisos</th>
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
                    <td>{{ $entry -> email }}</td>
                    <td>{{ $entry -> role }}</td>
                    <td data-search="{{ $entry -> permissions }}" data-order="{{ $entry -> permissions }}">{{ $namePer[$entry -> permissions] }}</td>
                    <td data-search="{{ fsDate( $entry -> created_at ) }}" data-order="{{ $entry -> created_at }}">{{ fDate( $entry -> created_at ) }}</td>
                    <td data-search="{{ fsDate( $entry -> updated_at ) }}" data-order="{{ $entry -> updated_at }}">{{ fDate( $entry -> updated_at ) }}</td>
                    <td data-search="{{ fsDate( $entry -> deleted_at ) }}" data-order="{{ $entry -> deleted_at }}">{{ fDate( $entry -> deleted_at ) }}</td>
                    <td class="uk-text-center">
                        {{--
                        @can('users.activate')
                            @if($entry -> active == 0)
                                <a href="{{ route('users.activate', $entry -> id) }}" class="uk-icon-button red" uk-icon="unlock" uk-tooltip title="Activar"></a>
                            @endif
                            @if($entry -> active == 1)
                                <a href="{{ route('users.desactivate', $entry -> id) }}" class="uk-icon-button" uk-icon="lock" uk-tooltip title="Desactivar"></a>
                            @endif
                        @endcan
                        --}}
                        @can('users.edit')
                            @if(!$entry -> deleted_at)
                                <a href="{{ route('users.edit', $entry -> id) }}" class="uk-icon-button" uk-icon="file-edit" uk-tooltip title="Editar"></a>
                            @endif
                        @endcan
                        @can('users.destroy')
                            @if($entry -> deleted_at)
                                <a href="{{ route('users.restore', $entry -> id) }}" class="uk-icon-button sure red" uk-icon="history" data-title="Restaurar a {{ $entry -> email }}" uk-tooltip title="Restaurar"></a>
                            @else
                                <a href="{{ route('users.destroy', $entry -> id) }}" class="uk-icon-button sure" uk-icon="trash" data-title="Desactivar a {{ $entry -> email }}" uk-tooltip title="Desactivar"></a>
                            @endif
                        @endcan
                    </td>
                </tr>
            @endforeach
            {{-- All Actions of Example
            <td class="uk-text-center">
                <a href="#" class="uk-icon-button" uk-icon="cloud-download" uk-tooltip title="Descargar"></a>
                @if(Auth::user() -> permissions >= 644)
                    <a href="#" class="uk-icon-button" uk-icon="cloud-upload" uk-tooltip title="Subir archivo"></a>
                    <a href="#" class="uk-icon-button" uk-icon="lock" uk-tooltip title="Activar"></a>
                    <a href="#" class="uk-icon-button" uk-icon="unlock" uk-tooltip title="Desactivar"></a>
                    <a href="#" class="uk-icon-button" uk-icon="thumbnails" uk-tooltip title="Recortar miniatura"></a>
                    <a href="#" class="uk-icon-button" uk-icon="file-edit" uk-tooltip title="Editar"></a>
                    @if(Auth::user() -> permissions == 777)
                        <a href="#" class="uk-icon-button" uk-icon="trash" uk-tooltip title="Eliminar"></a>
                    @endif
                @endif
            </td>
            --}}
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