@extends('00_layouts.02_system.app')
@section('title', 'Edición de subcategoría para productos')
@section('BodyClass', 'void')

@section('Content')
<div id="NavigationBar" class="uk-margin-top" uk-grid>
    <div class="uk-width-1-6">
        &nbsp;
    </div>
    <div class="uk-width-expand uk-text-center">
        <h1 class="uk-heading-primary">Edición de subcategoría para productos</h1>
    </div>
    <div class="uk-width-1-6 uk-text-right">
        <a href="{{ route('product-subcategories.index') }}" class="uk-icon-button White box-50 bg-blue" uk-icon="reply" uk-tooltip title="Volver al listado"></a>
    </div>
</div>

<div class="uk-container uk-margin-top">
    {{-- Form --}}
    <form class="in uk-form-horizontal uk-margin-large" enctype="multipart/form-data" method="POST" action="{{ route('product-subcategories.update', $entry -> id) }}">
        @csrf
        @method('PUT')
        @include('00_layouts.02_system.03_alert')

        <div class="uk-margin">
            <label class="uk-form-label" for="form-horizontal-select">Categoría</label>
            <div class="uk-form-controls">
                <div uk-form-custom="target: > * > span:first-child" class="width-100">
                    <select name="category_id" required>
                        <option value="">Seleccionar categoria</option>
                        @foreach( $categories AS $category )
                            <option value="{{ $category -> id }}" @if($entry -> category_id == $category -> id) selected @endif>{{ $category -> title }}</option>
                        @endforeach
                    </select>
                    <button class="selectbtn uk-button uk-button-default width-100" type="button" tabindex="-1">
                        <span></span>
                        <span uk-icon="icon: chevron-down"></span>
                    </button>
                </div>
            </div>
        </div>
        <div class="uk-margin">
            <label class="uk-form-label" for="form-horizontal-text">Titulo</label>
            <div class="uk-form-controls">
                <input class="uk-input" type="text" name="title" value="{{ old('title') ?? $entry -> title }}" placeholder="Título" required>
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