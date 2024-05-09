@extends('00_layouts.02_system.app')
@section('title', 'Edición de productos')
@section('BodyClass', 'void')
@section('CustomJs')
    <script src="{{ asset('/js/subcategories.js') }}"></script>
@endsection

@section('Content')
<div id="NavigationBar" class="uk-margin-top" uk-grid>
    <div class="uk-width-1-6">
        &nbsp;
    </div>
    <div class="uk-width-expand uk-text-center">
        <h1 class="uk-heading-primary">Edición de productos</h1>
    </div>
    <div class="uk-width-1-6 uk-text-right">
        <a href="{{ route('product.index') }}" class="uk-icon-button White box-50 bg-blue" uk-icon="reply" uk-tooltip title="Volver al listado"></a>
    </div>
</div>

<div class="uk-container uk-margin-top">
    {{-- Form --}}
    <form class="in uk-form-horizontal uk-margin-large" enctype="multipart/form-data" method="POST" action="{{ route('product.update', $entry -> id) }}">
        @csrf
        @method('PUT')
        @include('00_layouts.02_system.03_alert')

        <div class="uk-margin uk-text-center">
            <label class="uk-form-label" for="form-horizontal-text">Imagen</label>
            <div class="uk-form-controls">
                <img src="{{ url('storage/'.env('PRODUCT_FOLDER').'/' . $entry -> image) }}" width="100%">
            </div>
        </div>
        <div class="uk-margin">
            <label class="uk-form-label" for="form-horizontal-text">Titulo</label>
            <div class="uk-form-controls">
                <input class="uk-input" type="text" name="title" value="{{ old('title') ?? $entry -> title }}" placeholder="Título" required>
            </div>
        </div>
        <div class="uk-margin">
            <label class="uk-form-label" for="form-horizontal-text">Modelo</label>
            <div class="uk-form-controls">
                <input class="uk-input" type="text" name="modelo" value="{{ old('modelo') ?? $entry -> modelo }}" placeholder="Modelo" required>
            </div>
        </div>
        <div class="uk-margin">
            <label class="uk-form-label" for="form-horizontal-text">Marca</label>
            <div class="uk-form-controls">
                <input class="uk-input" type="text" name="marca" value="{{ old('marca') ?? $entry -> marca }}" placeholder="Marca" required>
            </div>
        </div>
        <div class="uk-margin">
            <label class="uk-form-label" for="form-horizontal-select">Categoría</label>
            <div class="uk-form-controls">
                <div uk-form-custom="target: > * > span:first-child" class="width-100">
                    <select id="category" name="category_id" required>
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
            <label class="uk-form-label" for="form-horizontal-select">Subcategoría</label>
            <div class="uk-form-controls">
                <div uk-form-custom="target: > * > span:first-child" class="width-100">
                    <select id="subcategory" name="subcategory_id" required>
                        <option value="">Seleccionar subcategoria</option>
                        @foreach( $subcategories AS $subcategory )
                            <option value="{{ $subcategory -> id }}" @if($entry -> subcategory_id == $subcategory -> id) selected @endif>{{ $subcategory -> title }}</option>
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
            <label class="uk-form-label" for="form-horizontal-text">Imagen</label>
            <div class="uk-form-controls uk-form-controls-text">
                <div uk-form-custom="target: true">
                    <span class="uk-form-icon uk-form-icon-flip" uk-icon="icon: folder"></span>
                    <input type="file" name="image" required>
                    <input class="uk-input uk-form-width-medium" type="text" placeholder="Seleccionar archivo" disabled>
                </div>
                <div class="uk-alert-primary" uk-alert>
                    <p>El archivo debe medir min: <b>{{ env('PRODUCT_WIDTH') }}x{{ env('PRODUCT_HEIGHT') }} px</b> y pesar menos de <b>{{ env('FILE_MAX_SIZE') }} kb.</b></p>
                </div>
            </div>
        </div>
        <div class="uk-margin">
            <label class="uk-form-label" for="form-horizontal-text">Resumen</label>
            <div class="uk-form-controls uk-form-controls-text">
                <textarea class="uk-textarea" rows="5" name="resumen" placeholder="Textarea" required>{{ old('resumen') ?? $entry -> resumen }}</textarea>
            </div>
        </div>
        <div class="uk-margin">
            <label class="uk-form-label" for="form-horizontal-text">Caracteristicas</label>
            <div class="uk-form-controls uk-form-controls-text">
                <textarea class="uk-textarea" rows="5" name="caracteristicas" placeholder="Caracteristicas; separadas; por; punto y coma">{{ old('caracteristicas') ?? $entry -> caracteristicas }}</textarea>
            </div>
        </div>
        <div class="uk-margin">
            <label class="uk-form-label" for="form-horizontal-text">Información técnica</label>
            <div class="uk-form-controls uk-form-controls-text">
                <textarea id="RichEdit"
                          class="uk-textarea"
                          rows="5"
                          name="tecnica"
                          placeholder="Textarea">{{ old('tecnica') ?? $entry -> tecnica }}</textarea>
            </div>
        </div>
        <div class="uk-margin">
            <label class="uk-form-label" for="form-horizontal-text">Ficha técnica</label>
            <div class="uk-form-controls uk-form-controls-text">
                @if( !empty($entry -> ficha) )
                <a target="_blank" href="{{ url('storage/'.env('PRODUCT_FOLDER').'fichas/' . $entry -> ficha) }}">
                    Ver ficha técnica
                </a>
                @endif
                <div uk-form-custom="target: true">
                    <span class="uk-form-icon uk-form-icon-flip" uk-icon="icon: folder"></span>
                    <input type="file" name="ficha">
                    <input class="uk-input uk-form-width-medium" type="text" placeholder="Seleccionar archivo" disabled>
                </div>
                <div class="uk-alert-primary" uk-alert>
                    <p>El archivo debe tener <b>formato PDF</b> y pesar menos de <b>4096 kb.</b></p>
                </div>
            </div>
        </div>
        <div class="uk-margin">
            <label class="uk-form-label" for="form-horizontal-text">Precio</label>
            <div class="uk-form-controls">
                <input class="uk-input decimal" type="text" name="precio" value="{{ old('precio') ?? $entry -> precio }}" placeholder="9,999,999.99">
            </div>
        </div>
        <div class="uk-margin">
            <label class="uk-form-label" for="form-horizontal-text">¿Incluye flete?</label>
            <div class="uk-form-controls">
                <div uk-form-custom="target: > * > span:first-child" class="width-100">
                    <select id="con_flete" name="con_flete" required>
                        <option value="0" {{ !$entry -> con_flete ? 'selected' : '' }}>No</option>
                        <option value="1" {{ $entry -> con_flete ? 'selected' : '' }}>Sí</option>
                    </select>
                    <button class="selectbtn uk-button uk-button-default width-100" type="button" tabindex="-1">
                        <span></span>
                        <span uk-icon="icon: chevron-down"></span>
                    </button>
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