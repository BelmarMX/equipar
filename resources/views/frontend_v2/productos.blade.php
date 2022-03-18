@section('title', $meta['titulo'])
@section('description', $meta['descripcion'])
@section('image', $meta['imagen'])
@extends('frontend_v2.master.app')

@section('content')
    <div class="container-fluid mb-5">
        @if( $promos )
            @include('frontend_v2.partials.banner-single', [
                    'slide'         => asset('v2/images/samples/banner_productos.jpg')
                ,   'slide_mobile'  => asset('v2/images/samples/banner_productos-mv.jpg')
                ,   'slide_alt'     => 'Banner de Productos'
                ,   'summary'       => TRUE
                ,   'title'         => '10% de descuento <strong>MARZO</strong>'
                ,   'description'   => 'Del 1 al 31 de Marzo encuentra nuestros productos con descuento por liquidación'
                ,   'h1'            => TRUE
                ,   'cta'           => 'Ir a la promoción'
                ,   'cta_href'      => 'https://www.google.com'
            ])
        @else
            @include('frontend_v2.partials.banner-single', [
                    'slide'         => asset('v2/images/samples/banner_productos.jpg')
                ,   'slide_mobile'  => asset('v2/images/samples/banner_productos-mv.jpg')
                ,   'slide_alt'     => 'Banner de Productos'
                ,   'summary'       => FALSE
            ])
        @endif
    </div>

    <main class="container">
        <section>
            <div class="row justify-content-center">
                @foreach($categories AS $category)
                    <div class="col-md-3 d-flex justify-content-center mb-4">
                        @include('frontend_v2.partials.product-category-view', [
                                'position'  => str_pad($loop -> index + 1, 2, '0', STR_PAD_LEFT)
                            ,   'title'     => $category -> title
                            ,   'route'     => route('productos-category-list', $category -> slug)
                            ,   'image'     => url("storage/productos-categorias/{$category -> image_rx}")
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