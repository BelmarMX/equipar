@extends('00_layouts.01_website.app')
@section('title',       $meta['titulo'])
@section('descripcion', $meta['descripcion'])
@section('imagen',      $meta['imagen'])
@section('CustomCss')
<style>
    #NavSubcat > li{
        text-align: center;
    }
    #NavSubcat > li > a{
        font-size: 1rem !important;
    }
    .fs885 > li > a{
        font-size: 1.3rem !important;
    }
    .modifier{
        font-size: 1.3rem;
        line-height: 150%;
    }
</style>
@endsection

@section('Content')
    <div class="uk-container">
        <div class="uk-width-3-5@m">
            <div class="rounded-container bg-blue">
                <h1 class="uk-text-uppercase">@yield('title')</h1>
            </div>
        </div>
        <nav class="uk-navbar-container" uk-navbar>
            <div class="uk-navbar-left">
                <ul class="uk-navbar-nav uk-visible@s" id="NavSubcat" uk-nav>
                    @php
                        $counter    = 1;
                        $last       = count($subcategories);
                    @endphp
                    @foreach( $subcategories AS $subcategory )
                        @if( $last >= 12 && $counter >= 12 )
                            @if( $counter == 12 )
                                <button class="uk-button uk-button-default modifier" type="button">VER MÁS</button>
                                <div uk-dropdown>
                                    <ul class="uk-nav uk-dropdown-nav fs885">
                            @endif
                                        <li><a href="{{ route('promociones.subc', [$promocion-> slug, $subcategory -> slugS]) }}" >{{ $subcategory -> titleS }}</a></li>
                            @if( $counter == $last)
                                    </ul>
                                </div>
                            @endif
                        @else
                            <li><a href="{{ route('promociones.subc', [$promocion-> slug, $subcategory -> slugS]) }}" >{{ $subcategory -> titleS }}</a></li>
                        @endif
                        @php
                            $counter++;
                        @endphp
                    @endforeach
                </ul>
            </div>
        </nav>
    </div>

    @include('00_layouts.01_website.03_alert')

    <div class="uk-container uk-margin-large">
        @if( $entries -> total() == 0 )
            <div class="uk-width-1-1">
                <div class="uk-alert-warning" uk-alert>
                    <p>Todavía no hemos agregado productos a esta promoción.</p>
                </div>
            </div>
        @endif
        <div uk-grid>
            <div class="uk-width-4-5@m">
                <div class="uk-child-width-1-3@m" uk-grid>
                    @foreach($entries as $entry)
                    <div>
                        <div class="uk-card uk-card-default">
                            <div class="uk-card-media-top">
                                <div class="discount-tag">
                                    <span>{{ percent( $entry -> precio, $entry -> final_price ) }}%</span>
                                </div>
                                <img src="{{ url('storage/'.env('PRODUCT_FOLDER') . $entry -> image_rxP) }}" alt="{{ $entry -> titleP }}">
                            </div>
                            <div class="uk-card-body ofProduct">
                                <h3 class="uk-card-title">{{ $entry -> titleP }}</h3>
                                <small>{{ $entry -> modelo }}</small>
                                <p>
                                    {{ $entry -> resumen }}
                                    <span class="price-before">${{ number_format($entry -> precio, 2) }}</span>
                                    <span class="price">${{ number_format($entry -> final_price, 2) }}</span>
                                </p>
                                <a href="{{ route('productos-open', [$entry -> slugC, $entry -> slugS, $entry -> slugP]) }}">Ir al producto</a>
                                <a class="addQuote" data-prod="{{ $entry -> idP }}" data-disc="true"><span uk-icon="cart"></span> Cotizar</a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            <div class="uk-width-1-5@m">
                @include('01_website.cotizaciones')
            </div>
        </div>
        <div class="uk-width-1-1 uk-text-center uk-margin-top">
            {!! $entries -> render() !!}
        </div>
    </div>
@endsection