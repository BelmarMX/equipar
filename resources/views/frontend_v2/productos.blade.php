@section('title', $meta['titulo'])
@section('description', $meta['descripcion'])
@section('image', $meta['imagen'])
@extends('frontend_v2.master.app')

@section('content')
    <div class="container-fluid mb-5">
        @include('frontend_v2.partials.banner-single', [
                'slide'         => asset('v2/images/samples/banner-promos.jpg')
            ,   'slide_alt'     => 'Banner de Productos'
            ,   'summary'       => TRUE
            ,   'title'         => '10% de descuento <strong>MARZO</strong>'
            ,   'description'   => 'Del 1 al 31 de Marzo encuentra nuestros productos con descuento por liquidación'
            ,   'h1'            => TRUE
            ,   'cta'           => 'Ir a la promoción'
            ,   'cta_href'      => 'https://www.google.com'
        ])
    </div>

    <main class="container">
        <section>
            <div class="row justify-content-center">
                <div class="col-md-3 d-flex justify-content-center mb-4">
                    @include('frontend_v2.partials.product-category-view', [
                            'position'  => '01'
                        ,   'title'     => 'Acero Inoxidable'
                        ,   'route'     => 'productos/refrigeracion'
                        ,   'image'     => asset('v2/images/categories/acero-inoxidable.png')
                    ])
                </div>
                <div class="col-md-3 d-flex justify-content-center mb-4">
                    @include('frontend_v2.partials.product-category-view', [
                            'position'  => '02'
                        ,   'title'     => 'Cocción'
                        ,   'route'     => 'productos/refrigeracion'
                        ,   'image'     => asset('v2/images/categories/coccion.png')
                    ])
                </div>
                <div class="col-md-3 d-flex justify-content-center mb-4">
                    @include('frontend_v2.partials.product-category-view', [
                            'position'  => '03'
                        ,   'title'     => 'Vitrina Horizontal Vidrio Curvo'
                        ,   'route'     => 'productos/refrigeracion'
                        ,   'image'     => asset('v2/images/categories/refrigeracion.png')
                    ])
                </div>
                <div class="col-md-3 d-flex justify-content-center mb-4">
                    @include('frontend_v2.partials.product-category-view', [
                            'position'  => '04'
                        ,   'title'     => 'Utensilios'
                        ,   'route'     => 'productos/refrigeracion'
                        ,   'image'     => asset('v2/images/categories/utensilios.png')
                    ])
                </div>

                <div class="col-md-3 d-flex justify-content-center mb-4">
                    @include('frontend_v2.partials.product-category-view', [
                            'position'  => '05'
                        ,   'title'     => 'Almacenaje'
                        ,   'route'     => 'productos/refrigeracion'
                        ,   'image'     => asset('v2/images/categories/almacenaje.png')
                    ])
                </div>
                <div class="col-md-3 d-flex justify-content-center mb-4">
                    @include('frontend_v2.partials.product-category-view', [
                            'position'  => '06'
                        ,   'title'     => 'Equipo menor'
                        ,   'route'     => 'productos/refrigeracion'
                        ,   'image'     => asset('v2/images/categories/equipo-menor.png')
                    ])
                </div>
                <div class="col-md-3 d-flex justify-content-center mb-4">
                    @include('frontend_v2.partials.product-category-view', [
                            'position'  => '07'
                        ,   'title'     => 'Barras de servicio'
                        ,   'route'     => 'productos/refrigeracion'
                        ,   'image'     => asset('v2/images/categories/barras-servicio.png')
                    ])
                </div>
                <div class="col-md-3 d-flex justify-content-center mb-4">
                    @include('frontend_v2.partials.product-category-view', [
                            'position'  => '08'
                        ,   'title'     => 'Lavado y limpieza'
                        ,   'route'     => 'productos/refrigeracion'
                        ,   'image'     => asset('v2/images/categories/lavado-limpieza.png')
                    ])
                </div>

                <div class="col-md-3 d-flex justify-content-center mb-4">
                    @include('frontend_v2.partials.product-category-view', [
                            'position'  => '09'
                        ,   'title'     => 'Refacciones'
                        ,   'route'     => 'productos/refrigeracion'
                        ,   'image'     => asset('v2/images/categories/refacciones.png')
                    ])
                </div>
                <div class="col-md-3 d-flex justify-content-center mb-4">
                    @include('frontend_v2.partials.product-category-view', [
                            'position'  => '10'
                        ,   'title'     => 'Complementos'
                        ,   'route'     => 'productos/refrigeracion'
                        ,   'image'     => asset('v2/images/categories/complementos.png')
                    ])
                </div>
                <div class="col-md-3 d-flex justify-content-center mb-4">
                    @include('frontend_v2.partials.product-category-view', [
                            'position'  => '11'
                        ,   'title'     => 'Aluminio'
                        ,   'route'     => 'productos/refrigeracion'
                        ,   'image'     => asset('v2/images/categories/aluminio.png')
                    ])
                </div>
            </div>
        </section>
    </main>
@endsection