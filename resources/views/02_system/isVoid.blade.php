@extends('00_layouts.02_system.app')
@section('title', 'Acciones previas necesarias')
@section('BodyClass', 'void')

@section('Content')
<div class="uk-container uk-margin-top">
    <div uk-grid>
        <div class="uk-width-1-1">
            <h1 class="uk-heading-primary width-100 uk-text-center">Acciones previas necesarias</h1>
            <p>
                    Para poder ingresar a esta sección necesitas realizar las siguientes acciones:
            </p>
            <br>
            <ul>
                @foreach( $actions AS $action)
                <li>{{ $action }}</li>
                @endforeach
            </ul>

        </div>
        <div class="uk-width-1-1 uk-text-right">
            <a href="{{ URL::previous() }}" class="uk-icon-button White box-50 bg-blue" uk-icon="reply" uk-tooltip title="Regresar"></a>
        </div>
    </div>
</div>
@endsection