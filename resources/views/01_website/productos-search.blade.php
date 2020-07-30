@extends('00_layouts.01_website.app')
@section('title',       $meta['titulo'])
@section('descripcion', $meta['descripcion'])
@section('imagen',      $meta['imagen'])
@section('CustomCss')
<style>
    #ProductInformation .title{
        font-weight: 600;
        font-size: 1.3rem;
    }
    #ProductInformation .title > small{
    }
    #ProductInformation .cat,
    #ProductInformation .subcat{
        font-size: 1.2rem;
        color: #42C8F5;
    }
    b{
        font-weight: 600;
    }
    #leFiltered{
        background: #FFF;
        margin-bottom: 30px;

        -webkit-box-shadow: -8px 9px 13px -9px rgba(0,0,0,0.35);
        -moz-box-shadow: -8px 9px 13px -9px rgba(0,0,0,0.35);
        box-shadow: -8px 9px 13px -9px rgba(0,0,0,0.35);
    }
    #leFiltered h2{
        color: orange;
        text-align: center;
    }
    .uk-inline{
        width: 100%;
    }
    #leFiltered .uk-select
    {
        font-size: 12px;
    }
</style>
@endsection
@section('Content')
    <div class="uk-container uk-margin-small">
        <div class="uk-width-3-5@m">
            <div class="rounded-container bg-blue">
                <h1 class="uk-text-uppercase">Resultados de la búsqueda: {{ $search }}</h1>
            </div>
        </div>
    </div>

    <div class="uk-container uk-margin-small uk-padding-small" id="leFiltered">
        <div uk-grid class="uk-grid-small">
            <div class="uk-width-1-1">
                <h2><span uk-icon="icon: settings"></span> Aplicar filtros</h2>
            </div>
            <div class="uk-width-1-4@m">
                <div class="filters uk-inline" uk-tooltip title="Ordenar por">
                    <span class="uk-form-icon" uk-icon="icon: list"></span>
                    <select class="uk-input uk-select" data-filter="orderby">
                        <option value="">ORDENAR POR</option>
                        <option value="min" @if(isset($_GET['orderby']) && $_GET['orderby'] == 'min') selected @endif>Menor precio</option>
                        <option value="max" @if(isset($_GET['orderby']) && $_GET['orderby'] == 'max') selected @endif>Mayor precio</option>
                        <option value="az" @if(isset($_GET['orderby']) && $_GET['orderby'] == 'az') selected @endif>A-Z</option>
                        <option value="za" @if(isset($_GET['orderby']) && $_GET['orderby'] == 'za') selected @endif>Z-A</option>
                    </select>
                </div>
            </div>
            <div class="uk-width-1-4@m">
                <div class="filters uk-inline" uk-tooltip title="Seleccionar marca">
                    <span class="uk-form-icon" uk-icon="icon: world"></span>
                    <select class="uk-input uk-select" data-filter="brand">
                        <option value="">TODAS LAS MARCAS</option>
                        @foreach( $getBrands AS $b => $brand )
                            @if( !empty($brand) )
                                <option value="{{ $brand }}" @if(isset($_GET['brand']) && $_GET['brand'] == $brand) selected @endif>{{ $brand }}</option>
                            @endif
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="uk-width-1-4@m">
                <div class="filters uk-inline" uk-tooltip title="Seleccionar categoría">
                    <span class="uk-form-icon" uk-icon="icon: tag"></span>
                    <select class="uk-input uk-select" data-filter="category">
                        <option value="">TODAS LAS CATEGORÍAS</option>
                        @foreach( $getCC AS $c => $category )
                            <option value="{{ $category }}" @if(isset($_GET['category']) && $_GET['category'] == $category) selected @endif>{{ $tCC[$c] }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="uk-width-1-4@m">
                <div class="filters uk-inline" uk-tooltip title="Promoción">
                    <span class="uk-form-icon" uk-icon="icon: cart"></span>
                    <select class="uk-input uk-select" data-filter="promotion">
                        <option value="">PROMOCIONES</option>
                        <option value="y" @if(isset($_GET['promotion']) && $_GET['promotion'] == 'y') selected @endif>Con descuento</option>
                        <option value="n" @if(isset($_GET['promotion']) && $_GET['promotion'] == 'n') selected @endif>Sin descuento</option>
                    </select>
                </div>
            </div>
        </div>
    </div>

    <div class="uk-container">
        <div uk-grid>
            <div class="uk-width-4-5@m">
                @if( count($entries) > 0)
                    <div class="uk-grid-small uk-grid-match uk-child-width-1-4@m" uk-grid>                    
                        @foreach($entries as $entry)
                        <div>
                            <div class="uk-card uk-card-default">
                                <div class="uk-card-media-top">
                                    @if( $entry -> precio > 0 && $entry -> final_price > 0)
                                    <div class="discount-tag">
                                        {{--<span>{{ percent( $entry -> precio, $entry -> final_price ) }}%</span>--}}
                                        <span>¡En promoción!</span>
                                    </div>
                                    @endif
                                    <img src="{{ url('storage/'.env('PRODUCT_FOLDER').'/' . $entry -> image_rxP) }}" alt="{{ $entry -> titleP }}">
                                </div>
                                <div class="uk-card-body ofProduct">
                                    <h3 class="uk-card-title">{{ $entry -> titleP }}</h3>
                                    <small><b>{{ $entry -> modelo }}</b></small><br>
                                    <small><b>EN:</b> {{ $entry -> titleC }} :: {{ $entry -> titleS }}</small><br>
                                    <small><b>MARCA:</b> {{ $entry -> marca }}</small>
                                    <p>
                                        {{ $entry -> resumen }}
                                    </p>
                                    <p>
                                        @if( !empty($entry -> precio) && $entry -> precio > 0 )
                                            @if( !empty($entry -> final_price) )
                                                <span class="price-before">${{ number_format($entry -> precio, 2) }}</span>
                                                <span class="price">${{ number_format($entry -> final_price, 2) }}</span>
                                            @else
                                                <span class="price">${{ number_format($entry -> precio, 2) }}</span>
                                            @endif
                                        @endif
                                    </p>
                                    <a href="{{ route('productos-open', [$entry -> slugC, $entry -> slugS, $entry -> slugP]) }}">Ver producto</a>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                @else
                    No hay resultados que coincidan con estos parámetros de búsqueda.
                @endif
            </div>
    
            <div class="uk-width-1-5@m">
                @foreach($CC AS $LaCat)
                <div>
                    <a class="a-link-box expand"><span class="not">{{ $LaCat -> title }}</span> <i class="material-icons vm">keyboard_arrow_down</i> <i class="material-icons vm">keyboard_arrow_up</i></a>
                    <div class="link-box sidebar contracted">
                        <ul>
                            @foreach( $SS AS $LeSub )
                                @if( $LeSub -> category_id == $LaCat -> id )
                                <li><a href="{{ route('productos-category', [$LaCat -> slug, $LeSub -> slug]) }}">{{ $LeSub -> title }}</a></li>
                                @endif
                            @endforeach
                        </ul>
                    </div>
                </div>
                @endforeach
            </div>
        </div>

        {{--<div class="uk-width-1-1 uk-text-center uk-margin-top">
            {!! $entries -> render() !!}
        </div>--}}
    </div>
@endsection
@section('CustomJs')
    <script src="{{ asset('/js/expand.js') }}"></script>
    <script>
        $('[data-filter]').on('change', function(e){
            e.preventDefault();

            var chain = '?filter=y';
            $.each($('[data-filter]'), function(index, value){
                if($(this).val() != "")
                {
                    chain += '&'+$(this).attr('data-filter')+'='+$(this).val();
                }
            });

            location.href = chain;
        });
    </script>
@endsection