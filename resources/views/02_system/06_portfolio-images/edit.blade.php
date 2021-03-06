@extends('00_layouts.02_system.app')
@section('title', 'Agregar imágenes al portafolio')
@section('BodyClass', 'void')

@section('Content')
<div id="NavigationBar" class="uk-margin-top" uk-grid>
    <div class="uk-width-1-6">
        &nbsp;
    </div>
    <div class="uk-width-expand uk-text-center">
        <h1 class="uk-heading-primary">Agregar imágenes al portafolio</h1>
        <h2>{{ $portfolio -> title }}</h2>
    </div>
    <div class="uk-width-1-6 uk-text-right">
        <a href="{{ route('portfolio.index') }}" class="uk-icon-button White box-50 bg-blue" uk-icon="reply" uk-tooltip title="Volver al listado"></a>
    </div>
</div>

<div class="uk-container uk-margin-top">
    {{-- Form --}}
    <form class="in uk-form-horizontal uk-margin-large" enctype="multipart/form-data" method="POST" action="{{ route('portfolio-images.store') }}">
        @csrf
        @include('00_layouts.02_system.03_alert')

        <input type="hidden" name="portfolio_id" value="{{ $portfolio -> id }}">

        <div class="uk-margin">
            <label class="uk-form-label" for="form-horizontal-text">Titulo</label>
            <div class="uk-form-controls">
                <input class="uk-input" type="text" name="title" value="{{ old('title') }}" placeholder="Título" required>
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
                    <p>El archivo debe medir: <b>{{ env('PORTFOLIO_IMG_WIDTH') }}x{{ env('PORTFOLIO_IMG_HEIGHT') }} px</b> como mínimo y pesar menos de <b>{{ env('FILE_MAX_SIZE') }} kb.</b></p>
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

<div class="uk-container uk-margin-top">
    {{-- Data tables --}}
    <table id="IndexList" class="uk-table uk-table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th class="no-sort uk-text-center">Vista previa</th>
                <th>Titulo</th>
                <th>Slug</th>
                <th>Creado</th>
                <th class="no-sort uk-text-center">Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($entries as $entry)
                <tr>
                    <td class="uk-text-center">{{ $entry -> id }}</td>
                    <td style="max-width: 90px; text-align: center;">
                        <div uk-lightbox>
                            <a class="uk-button uk-button-default" href="{{ url('storage/'.env('PORTFOLIO_IMG_FOLDER').'/' . $entry -> image) }}">
                                <img src="{{ url('storage/'.env('PORTFOLIO_IMG_FOLDER').'/' . $entry -> image) }}" width="80">
                            </a>
                        </div>
                    </td>
                    <td>{{ $entry -> title }}</td>
                    <td>{{ $entry -> slug }}</td>
                    <?php
                        $anio1      = Carbon::parse( $entry -> created_at ) -> year;
                        $mes1       = Carbon::parse( $entry -> created_at ) -> month;
                        $day1       = Carbon::parse( $entry -> created_at ) -> day;
                        $chain1     = "$day1 de $month[$mes1] de $anio1";
                        $create     = Carbon::parse( $entry -> created_at ) -> format('d/m/Y');
                    ?>
                    <td data-search="{{ $chain1 }}" data-order="{{ $entry -> created_at }}">{{ $create }}</td>
                    <td class="uk-text-center">
                        @can('users.destroy')
                            <a href="{{ route('portfolio-images.destroy', $entry -> id) }}" class="uk-icon-button sure" uk-icon="trash" data-title="Eliminar a {{ $entry -> title }}" uk-tooltip title="Desactivar"></a>
                        @endcan
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{-- /Data tables --}}
</div>
@endsection