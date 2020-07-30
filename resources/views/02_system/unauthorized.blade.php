@extends('00_layouts.02_system.app')
@section('title', 'No tienes permisos suficientes')
@section('BodyClass', 'void')

@section('Content')
<div class="uk-container uk-margin-top">
    <div class="uk-flex-center" uk-grid>
        <h1 class="uk-heading-primary width-100 uk-text-center">Permisos insuficientes</h1>
        <p>
                No tienes permisos suficientes para realizar esta acción.
        </p>
    </div>
</div>
@endsection