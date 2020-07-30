@extends('00_layouts.02_system.app')
@section('title', 'Nueva promoción mensual')
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
        <a href="{{ route('promociones.index') }}" class="uk-icon-button White box-50 bg-blue" uk-icon="reply" uk-tooltip title="Volver al listado"></a>
    </div>
</div>

<div class="uk-container uk-margin-top">
    {{-- Form --}}
    <form class="in uk-form-horizontal uk-margin-large" enctype="multipart/form-data" method="POST" action="{{ route('promociones.store') }}">
        @csrf
        @include('00_layouts.02_system.03_alert')

        <div class="uk-margin">
            <label class="uk-form-label" for="form-horizontal-text">Titulo</label>
            <div class="uk-form-controls">
                <input class="uk-input" type="text" name="title" value="{{ old('title') }}" placeholder="Título" required>
            </div>
        </div>
        <div class="uk-margin">
            <label class="uk-form-label" for="form-horizontal-text">Fecha de inicio</label>
            <div class="uk-form-controls">
                <input class="uk-input" type="date" name="start" min="{{ date('Y-m-d') }}" value="{{ old('start') }}" placeholder="Fecha de inicio" required>
            </div>
        </div>
        <div class="uk-margin">
            <label class="uk-form-label" for="form-horizontal-text">Fecha de finalización</label>
            <div class="uk-form-controls">
                <input class="uk-input" type="date" name="end" min="{{ date('Y-m-d') }}" value="{{ old('end') }}" placeholder="Fecha de finalización" required>
            </div>
        </div>
        <div class="uk-margin">
            <label class="uk-form-label" for="form-horizontal-select">Tipo de promocion</label>
            <div class="uk-form-controls">
                <div uk-form-custom="target: > * > span:first-child" class="width-100">
                    <select name="general_disc" required>
                        <option value="0" selected>Promoción individual</option>
                        <option value="1">Promoción general</option>
                    </select>
                    <button class="selectbtn uk-button uk-button-default width-100" type="button" tabindex="-1">
                        <span></span>
                        <span uk-icon="icon: chevron-down"></span>
                    </button>
                </div>
            </div>
        </div>
        <div class="uk-margin">
            <label class="uk-form-label" for="form-horizontal-text">Descuento</label>
            <div class="uk-form-controls">
                <input class="uk-input decimal" type="text" name="amount" placeholder="Monto o porcentaje (Solo si la promoción es general)" required>
            </div>
            <div class="uk-form-controls">
                $<input type="radio" name="type" value="$" checked required> ó
                <input type="radio" name="type" value="%" required> %
            </div>
        </div>
        <div class="uk-margin">
            <label class="uk-form-label" for="form-horizontal-text">Banner</label>
            <div class="uk-form-controls uk-form-controls-text">
                <div uk-form-custom="target: true">
                    <span class="uk-form-icon uk-form-icon-flip" uk-icon="icon: folder"></span>
                    <input type="file" name="imageF" required>
                    <input class="uk-input uk-form-width-medium" type="text" placeholder="Seleccionar archivo" disabled>
                </div>
                <div class="uk-alert-primary" uk-alert>
                    <p>El archivo debe medir: <b>{{ env('PROMOS_WIDTH') }}x{{ env('PROMOS_HEIGHT') }} px</b> como mínimo y pesar menos de <b>{{ env('FILE_MAX_SIZE') }} kb.</b></p>
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