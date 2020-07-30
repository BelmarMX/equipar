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

        @if( $errors -> any() )
            <div class="uk-margin">
                <div class="uk-form-controls">
                @foreach( $errors -> all() AS $error )
                    <div class="uk-alert-warning" uk-alert>
                        <a class="uk-alert-close" uk-close></a>
                        <p>{{ $error }}</p>
                    </div>
                @endforeach
                </div>
            </div>
        @endif

        <div class="uk-margin">
            <label class="uk-form-label" for="form-horizontal-text">Text</label>
            <div class="uk-form-controls">
                <input class="uk-input" id="form-horizontal-text" type="text" placeholder="Some text...">
            </div>
        </div>

        <div class="uk-margin">
            <label class="uk-form-label" for="form-horizontal-select">Select</label>
            <div class="uk-form-controls">
                <div uk-form-custom="target: > * > span:first-child" class="width-100">
                    <select>
                        <option value="">Please select...</option>
                        <option value="1">Option 01</option>
                        <option value="2">Option 02</option>
                        <option value="3">Option 03</option>
                        <option value="4">Option 04</option>
                    </select>
                    <button class="selectbtn uk-button uk-button-default width-100" type="button" tabindex="-1">
                        <span></span>
                        <span uk-icon="icon: chevron-down"></span>
                    </button>
                </div>
            </div>
        </div>

        <div class="uk-margin">
            <div class="uk-form-label">Textarea</div>
            <div class="uk-form-controls uk-form-controls-text">
                <textarea class="uk-textarea" rows="5" placeholder="Textarea"></textarea>
            </div>
        </div>

        <div class="uk-margin">
            <div class="uk-form-label">Radio</div>
            <div class="uk-form-controls uk-form-controls-text">
                <label><input class="uk-radio" type="radio" name="radio2" checked> Option 1</label><br>
                <label><input class="uk-radio" type="radio" name="radio2"> Option b</label>
            </div>
        </div>

        <div class="uk-margin">
            <div class="uk-form-label">Checkbox</div>
            <div class="uk-form-controls uk-form-controls-text">
                <label><input class="uk-checkbox" type="checkbox" checked> Checkbox 1</label><br>
                <label><input class="uk-checkbox" type="checkbox"> Checkbox 2</label>
            </div>
        </div>

        <div class="uk-margin">
            <div class="uk-form-label">Range</div>
            <div class="uk-form-controls uk-form-controls-text">
                <input class="uk-range" type="range" value="2" min="0" max="10" step="1">
            </div>
        </div>

        <div class="uk-margin">
            <div class="uk-form-label">Field</div>
            <div class="uk-form-controls uk-form-controls-text">
                <div uk-form-custom="target: true">
                    <span class="uk-form-icon uk-form-icon-flip" uk-icon="icon: folder"></span>
                    <input type="file">
                    <input class="uk-input uk-form-width-medium" type="text" placeholder="Seleccionar archivo" disabled>
                </div>
            </div>
        </div>

        <div class="uk-margin">
            <div class="uk-form-label">Editor</div>
            <div class="uk-form-controls uk-form-controls-text">
                <textarea id="RichEdit" name="contenido"></textarea>
            </div>
        </div>

        <div class="uk-text-center">
            <div uk-spinner></div> Guardando...<br>
            <button class="mt-1 uk-button uk-button-primary">Guardar</button>
        </div>
    </form>
    {{-- /Form --}}
</div>
@endsection