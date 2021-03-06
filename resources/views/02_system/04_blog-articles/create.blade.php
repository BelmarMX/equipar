@extends('00_layouts.02_system.app')
@section('title', 'Alta de articulos para el blog')
@section('BodyClass', 'void')

@section('Content')
<div id="NavigationBar" class="uk-margin-top" uk-grid>
    <div class="uk-width-1-6">
        &nbsp;
    </div>
    <div class="uk-width-expand uk-text-center">
        <h1 class="uk-heading-primary">Alta de articulos para el blog</h1>
    </div>
    <div class="uk-width-1-6 uk-text-right">
        <a href="{{ route('blog-articles.index') }}" class="uk-icon-button White box-50 bg-blue" uk-icon="reply" uk-tooltip title="Volver al listado"></a>
    </div>
</div>

<div class="uk-container uk-margin-top">
    {{-- Form --}}
    <form class="in uk-form-horizontal uk-margin-large" enctype="multipart/form-data" method="POST" action="{{ route('blog-articles.store') }}">
        @csrf
        @include('00_layouts.02_system.03_alert')

        <div class="uk-margin">
            <label class="uk-form-label" for="form-horizontal-text">Titulo</label>
            <div class="uk-form-controls">
                <input class="uk-input" type="text" name="title" value="{{ old('title') }}" placeholder="Título" required>
            </div>
        </div>
        <div class="uk-margin">
            <label class="uk-form-label" for="form-horizontal-select">Categoría</label>
            <div class="uk-form-controls">
                <div uk-form-custom="target: > * > span:first-child" class="width-100">
                    <select name="category_id" required>
                        <option value="" selected>Seleccionar categoria</option>
                        @foreach( $categories AS $category )
                            <option value="{{ $category -> id }}">{{ $category -> title }}</option>
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
            <label class="uk-form-label" for="form-horizontal-text">Publicar</label>
            <div class="uk-form-controls">
                <input class="uk-input" type="date" name="publish" value="{{ old('publish') ?? date('Y-m-d') }}" min={{ date('Y-m-d') }} placeholder="Título" required>
            </div>
        </div>
        <div class="uk-margin">
            <label class="uk-form-label" for="form-horizontal-text">Imagen</label>
            <div class="uk-form-controls uk-form-controls-text">
                <div uk-form-custom="target: true">
                    <span class="uk-form-icon uk-form-icon-flip" uk-icon="icon: folder"></span>
                    <input type="file" name="image" required>
                    <input class="uk-input uk-form-width-medium" type="text" placeholder="Seleccionar archivo" disabled>
                </div>
                <div class="uk-alert-primary" uk-alert>
                    <p>El archivo debe medir: <b>{{ env('ARTICLE_WIDTH') }}x{{ env('ARTICLE_HEIGHT') }} px</b> y pesar menos de <b>{{ env('FILE_MAX_SIZE') }} kb.</b></p>
                </div>
            </div>
        </div>
        <div class="uk-margin">
            <label class="uk-form-label" for="form-horizontal-text">Resumen</label>
            <div class="uk-form-controls uk-form-controls-text">
                <textarea class="uk-textarea" rows="5" name="shortdesc" placeholder="Textarea" required>{{ old('shortdesc') }}</textarea>
            </div>
        </div>
        <div class="uk-margin">
            <div class="uk-form-label">Contenido</div>
            <div class="uk-form-controls uk-form-controls-text">
                <textarea id="RichEdit" name="content">{{ old('content') }}</textarea>
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