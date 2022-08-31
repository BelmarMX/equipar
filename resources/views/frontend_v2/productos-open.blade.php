@section('title', $meta['titulo'])
@section('description', $meta['descripcion'])
@section('image', $meta['imagen'])
@extends('frontend_v2.master.app')

@section('content')
    <main class="container-fluid mt-5 px-0">
        <div class="container">
            @include('frontend_v2.partials.scroll-categories', [
                   'tag_title'     => $category -> title
               ,   'todas_link'    => route('productos-category-list', $category -> slug)
               ,   'categories'    => array_map(function($subcategory) use($category) {
                return [
                        $subcategory['title']
                    ,   route('productos-category', [$category -> slug, $subcategory['slug']])
                ];
            }, $subcategories -> toArray() )
           ])
        </div>

        <section id="productos__main_product" class="mb-4">
            <div class="container">
                <div class="row justify-content-center align-items-center">
                    <div class="col-md-6 productos__main_product__slider">
                        <div id="productos__main_product_slider_container">
                            <div id="productos__main_product_slider" class="carousel slide"
                                 data-bs-ride="carousel"
                                 data-bs-touch="true"
                                 data-bs-interval="5500"
                            >
                                <div class="carousel-inner">
                                    <div class="carousel-item active">
                                        <img width="{{ env('PRODUCT_WIDTH') }}"
                                             height="{{ env('PRODUCT_HEIGHT') }}"
                                             class="img-fluid"
                                             src="{{ url("storage/productos/{$entry -> imageP}") }}"
                                             alt="{{ $entry -> titleP }}">
                                    </div>

                                    @foreach($gallery AS $image)
                                        <div class="carousel-item">
                                            <img width="{{ env('PRODUCT_WIDTH') }}"
                                                 height="{{ env('PRODUCT_HEIGHT') }}"
                                                 class="img-fluid"
                                                 src="{{ url("storage/productos/{$image -> image}") }}"
                                                 alt="{{ $image -> title ?? $entry -> titleP }}">
                                        </div>
                                    @endforeach
                                </div>

                                @if( count($gallery) > 0 )
                                <button class="carousel-control-prev" type="button" data-bs-target="#productos__main_product_slider" data-bs-slide="prev">
                                    <i class="bi bi-arrow-left-circle" aria-hidden="true"></i>
                                    <span class="visually-hidden">Anterior</span>
                                </button>
                                <button class="carousel-control-next" type="button" data-bs-target="#productos__main_product_slider" data-bs-slide="next">
                                    <i class="bi bi-arrow-right-circle" aria-hidden="true"></i>
                                    <span class="visually-hidden">Siguiente</span>
                                </button>
                                @endif
                            </div>
                        </div>

                    </div>
                    <div class="col-md-6 py-5 ps-md-5">
                        <div class="productos__main_product--belongs-to mb-4">
                            <a href="{{ route('productos-category-list', $category -> slug) }}">{{ $category -> title }}</a> /
                            <a href="{{ route('productos-category', [$category -> slug, $subcategory -> slug]) }}">{{ $subcategory -> title }}</a>
                        </div>
                        <h1 class="productos__main_product--title">{{ $entry -> titleP }}</h1>
                        <p class="productos__main_product--summary">
                            {{ $entry -> resumen }}
                        </p>
                        <div class="productos__main_product--data mb-md-4">
                            <div class="row position-relative">
                                <div class="col-md-6 my-2">
                                    <span>Marca</span>
                                    <h2>{{ $entry -> marca }}</h2>
                                </div>
                                <div class="col-md-6 my-2">
                                    <span>Modelo</span>
                                    <h2>{{ $entry -> modelo }}</h2>
                                </div>
                            </div>
                        </div>
                        <div class="row productos__main_product__price">
                            <div class="col-md-6 mb-2">
                                <div class="productos__main_product__price--price">
                                    ${{ number_format($entry -> final_price ?? $entry -> precio, 2, '.', ',') }} <span class="productos__main_product__price--currency">MXN</span>
                                </div>
                            </div>
                            <div class="col-md-6 productos__main_product__price--quote">
                                <button aria-label="Agrega el producto al cotizador"
                                        data-bs-toggle="tooltip"
                                        title="Agregar al cotizador"
                                        class="btn btn-primary"
                                        data-quote-add="{{ json_encode([
                                                'id'    => $entry -> idP
                                            ,   'model' => $entry -> modelo
                                            ,   'title' => $entry -> titleP
                                            ,   'image' => url("storage/productos/{$entry -> image_rxP}")
                                        ]) }}"
                                >
                                    <i class="bi bi-bag-plus-fill"></i> Agregar al cotizador
                                </button>
                            </div>
                        </div>
                        @isset($entry -> final_price)
                            * <small>Producto en promoción con descuento del {{ percent($entry->precio,$entry->final_price) }}%. Precio original: ${{ number_format($entry -> precio,2) }}</small>
                        @endisset
                    </div>
                </div>
            </div>
        </section>

        <section id="productos__technical-information" class="container mb-5">
            <div class="row">
                <div class="col-md-3">
                    <h3 class="text-start mb-3">Información técnica</h3>
                    {!! $entry -> tecnica !!}

                    @if( !empty($entry -> ficha) )
                        <h3 class="text-start mb-3 mt-2">Ficha Técnica</h3>

                        <a class="btn btn-secondary"
                           target="_blank"
                           href="{{ url('storage/'.env('PRODUCT_FOLDER').'fichas/' . $entry -> ficha) }}"
                        >
                            <i class="bi bi-filetype-pdf"></i> Descargar Ficha técnica
                        </a>
                    @endif
                </div>
                <div class="col-md-9">
                    <h3 class="text-start mb-3">Características</h3>
                    <ul>
                        @foreach(explode(';', $entry -> caracteristicas) AS $caracteristica)
                            @if( !empty($caracteristica) )
                                <li>{!! ucfirst( trim( mb_strtolower($caracteristica) ) ) !!}</li>
                            @endif
                        @endforeach
                    </ul>
                </div>
            </div>
        </section>

        <section id="productos__relacionados" class="container mb-5">
            <h4>Productos relacionados</h4>
            <div class="row">
                @foreach($related AS $product)
                    <div class="col-md-3 d-flex justify-content-center mb-4">
                        @include('frontend_v2.partials.product-view', [
                                'id'        => $product -> idP
                            ,   'title'     => $product -> titleP
                            ,   'model'     => $product -> modelo
                            ,   'brand'     => $product -> marca
                            ,   'price'     => $product -> precio
                            ,   'promo'     => $product -> final_price
                            ,   'tag'       => $product -> titleS
                            ,   'tag_link'  => route('productos-category', [$product -> slugC, $product -> slugS])
                            ,   'route'     => route('productos-open', [$product -> slugC, $product -> slugS, $product -> slugP])
                            ,   'image'     => url("storage/productos/{$product -> image_rxP}")
                        ])
                    </div>
                @endforeach
            </div>
        </section>
    </main>

    <section id="products__marcas" class="container-fluid">
        <h3>Productos por marca</h3>
        @include('frontend_v2.partials.marcas')
    </section>
@endsection