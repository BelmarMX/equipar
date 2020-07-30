@extends('00_layouts.02_system.app')
@section('title', 'Alta de categoría para el blog')
@section('BodyClass', 'void')

@section('Content')
<div id="NavigationBar" class="uk-margin-top" uk-grid>
    <div class="uk-width-1-6">
        &nbsp;
    </div>
    <div class="uk-width-expand uk-text-center">
        <h1 class="uk-heading-primary">Alta de categoría para el blog</h1>
    </div>
    <div class="uk-width-1-6 uk-text-right">
        <a href="{{ route('blog-categories.index') }}" class="uk-icon-button White box-50 bg-blue" uk-icon="reply" uk-tooltip title="Volver al listado"></a>
    </div>
</div>

<div class="uk-container uk-margin-top">
    {{-- Form --}}
    <form class="in uk-form-horizontal uk-margin-large" enctype="multipart/form-data" method="POST" action="{{ route('blog-categories.store') }}">
        @csrf
        @include('00_layouts.02_system.03_alert')

        <div class="uk-margin">
            <label class="uk-form-label" for="form-horizontal-text">Titulo</label>
            <div class="uk-form-controls">
                <input class="uk-input" type="text" name="title" value="{{ old('title') }}" placeholder="Título" required>
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