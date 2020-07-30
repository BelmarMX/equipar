@extends('00_layouts.02_system.app')
@section('title', 'Nuevo usuario')
@section('BodyClass', 'void')

@section('Content')
<div id="NavigationBar" class="uk-margin-top" uk-grid>
    <div class="uk-width-1-6">
        &nbsp;
    </div>
    <div class="uk-width-expand uk-text-center">
        <h1 class="uk-heading-primary">Alta de usuarios</h1>
    </div>
    <div class="uk-width-1-6 uk-text-right">
        <a href="{{ route('users.index') }}" class="uk-icon-button White box-50 bg-blue" uk-icon="reply" uk-tooltip title="Volver al listado"></a>
    </div>
</div>

<div class="uk-container uk-margin-top">
    {{-- Form --}}
    <form class="in uk-form-horizontal uk-margin-large" enctype="multipart/form-data" method="POST" action="{{ route('users.store') }}">
        @csrf
        {{-- @method('PUT') --}}
        @include('00_layouts.02_system.03_alert')

        <div class="uk-margin">
            <label class="uk-form-label" for="form-horizontal-text">Nombre</label>
            <div class="uk-form-controls">
                <input class="uk-input" type="text" name="name" value="{{ old('name') }}" placeholder="Nombre para mostrar" required>
            </div>
        </div>
        <div class="uk-margin">
            <label class="uk-form-label" for="form-horizontal-text">Usuario</label>
            <div class="uk-form-controls">
                <input class="uk-input" type="email" name="email" value="{{ old('email') }}" placeholder="correo@dominio.com" required>
            </div>
        </div>
        <div class="uk-margin">
            <label class="uk-form-label" for="form-horizontal-text">Contraseña</label>
            <div class="uk-form-controls">
                <input class="uk-input" type="password" name="password" placeholder="**********" required>
            </div>
        </div>
        <div class="uk-margin">
            <label class="uk-form-label" for="form-horizontal-text">Confirmar Contraseña</label>
            <div class="uk-form-controls">
                <input class="uk-input" type="password" name="confirm" placeholder="**********" required>
            </div>
        </div>
        <div class="uk-margin">
            <label class="uk-form-label" for="form-horizontal-select">Tipo de usuario</label>
            <div class="uk-form-controls">
                <div uk-form-custom="target: > * > span:first-child" class="width-100">
                    <select name="role" required>
                        <option value="admin">Administrador</option>
                        <option value="user" selected>Usuario</option>
                    </select>
                    <button class="selectbtn uk-button uk-button-default width-100" type="button" tabindex="-1">
                        <span></span>
                        <span uk-icon="icon: chevron-down"></span>
                    </button>
                </div>
            </div>
        </div>

        <div class="uk-margin">
            <div class="uk-form-label">Permisos</div>
            <div class="uk-form-controls uk-form-controls-text">
                <label><input class="uk-radio" type="radio" name="permissions" value="444" checked> Ver</label><br>
                <label><input class="uk-radio" type="radio" name="permissions" value="644"> Ver, Agregar y Editar</label><br>
                <label><input class="uk-radio" type="radio" name="permissions" value="777"> Ver, Agregar, Editar y Eliminar</label>
            </div>
        </div>
        {{--
        <div class="uk-margin">
            <div class="uk-form-label">Activo</div>
            <div class="uk-form-controls uk-form-controls-text">
                <label><input class="uk-radio" type="radio" name="active" value="1" checked> Activado</label><br>
                <label><input class="uk-radio" type="radio" name="active" value="0"> Desactivado</label><br>
            </div>
        </div>
        --}}

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