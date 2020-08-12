@extends('00_layouts.01_website.app')
@section('title',       $meta['titulo'])
@section('descripcion', $meta['descripcion'])
@section('imagen',      $meta['imagen'])
@section('CustomJs')
    <script src="{{ asset('/js/expand.js') }}"></script>

@endsection

@section('Content')
    <div class="uk-container">
        <div uk-grid>
            <div class="uk-width-1-3@m">
                <div class="rounded-container bg-blue">
                    <h1 class="uk-text-uppercase">Somos proveedores</h1>
                </div>
            </div>
            <div class="uk-width-2-3@m uk-text-right">
                <a class="PToggle off"><span>Expandir</span> todo <i class="material-icons vm">toggle_off</i></a>
            </div>
        </div>
    </div>

    <div class="uk-container uk-margin-small-top">
        <div class="uk-child-width-1-3@m" uk-grid>
            @foreach($categories AS $category)
                <div>
                    <a href="{{ route('productos-category-list', $category -> slug) }}">
                        <img width="100%" class="a-link-box expand rounded-img border" src="{{ url('storage/'.env('PRODUCT_CAT_FOLDER') . $category -> image_rx) }}" alt="{{ $category -> title }}">
                    </a>
                    <div class="rounded-container bg-orange">
                        <h2 class="uk-text-uppercase">{{ $category -> title }}</h1>
                    </div>
                    <a class="a-link-box expand"><span>Expandir</span> <i class="material-icons vm">keyboard_arrow_down</i> <i class="material-icons vm">keyboard_arrow_up</i></a>
                    <div class="link-box contracted">
                        <ul>
                            @foreach( $subcategories AS $subcategory )
                                @if( $subcategory -> category_id == $category -> id )
                                <li><a href="{{ route('productos-category', [$category -> slug, $subcategory -> slug]) }}">{{ $subcategory -> title }}</a></li>
                                @endif
                            @endforeach
                        </ul>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection