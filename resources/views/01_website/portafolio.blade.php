@extends('00_layouts.01_website.app')
@section('title',       $meta['titulo'])
@section('descripcion', $meta['descripcion'])
@section('imagen',      $meta['imagen'])
@section('CustomCss')
<style>
    .uk-card-body.ofProduct a.nostyle{
        background: none;
        text-align: left;
    }
</style>
@endsection

@section('Content')
    <div class="uk-container">
        <div class="uk-width-3-5@m">
            <div class="rounded-container bg-blue">
                <h1 class="uk-text-uppercase">Portafolio de proyectos</h1>
            </div>
        </div>
    </div>

    <div class="uk-container uk-margin-small-top">
        @if( $entries -> total() == 0 )
            <div class="uk-width-1-1">
                <div class="uk-alert-warning" uk-alert>
                    <p>Todavía no hemos agregado proyectos.</p>
                </div>
            </div>
        @endif
        <div uk-grid>
            <div class="uk-width-1-1">
                <div class="uk-child-width-1-3@m" uk-grid>
                    @foreach($entries as $entry)
                    <div>
                        <div class="uk-card uk-card-default">
                            <div class="uk-card-media-top">
                                <img src="{{ url('storage/'.env('PORTFOLIO_FOLDER') . $entry -> image_rx) }}" alt="{{ $entry -> title }}">
                            </div>
                            <div class="uk-card-body ofProduct">
                                <a class="nostyle" href="{{ route('portfolio-open', $entry -> slug) }}">
                                    <h3 class="uk-card-title">{{ $entry -> title }}</h3>
                                </a>
                                <a class="uk-margin-top" href="{{ route('portfolio-open', $entry -> slug) }}">Ver proyecto</a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="uk-width-1-1 uk-text-center uk-margin-top">
            {!! $entries -> render() !!}
        </div>
    </div>
@endsection