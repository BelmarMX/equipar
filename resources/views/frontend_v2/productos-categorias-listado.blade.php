@section('title', $meta['titulo'])
@section('description', $meta['descripcion'])
@section('image', $meta['imagen'])
@extends('frontend_v2.master.app')

@section('content')
    <div class="container-fluid mb-5">
        @include('frontend_v2.partials.banner-single', [
                'slide'         => asset('v2/images/samples/banner-promos.jpg')
            ,   'slide_alt'     => 'Banner Categoría'
            ,   'summary'       => TRUE
            ,   'title'         => '<strong>Acero Inoxidable</strong>'
            ,   'h1'            => TRUE
        ])
    </div>

    <main class="container">
        @include('frontend_v2.partials.scroll-categories', [
                'tag_title'     => 'Subcategorías'
            ,   'todas_link'    => '/productos/refrigeracion'
            ,   'categories'    => [
                    ['Abatidores', '/productos/refrigeracion/abatidores']
                ,   ['Baño María frío', ' /productos/refrigeracion/abatidores']
                ,   ['Base refrigerada', ' /productos/refrigeracion/abatidores']
                ,   ['Botelleros', ' /productos/refrigeracion/abatidores']
                ,   ['Cong horizontales', ' /productos/refrigeracion/abatidores']
                ,   ['Contra barras', ' /productos/refrigeracion/abatidores']
                ,   ['Cortinas de aire', ' /productos/refrigeracion/abatidores']
                ,   ['Dispensador de cerveza', ' /productos/refrigeracion/abatidores']
                ,   ['Fabricadoras de hielo', ' /productos/refrigeracion/abatidores']
                ,   ['Mesas de preparación', ' /productos/refrigeracion/abatidores']
                ,   ['Mesas para trabajo', ' /productos/refrigeracion/abatidores']
                ,   ['Refrigeradores y congeladores verticales', ' /productos/refrigeracion/abatidores']
                ,   ['Topping refrigerado', ' /productos/refrigeracion/abatidores']
                ,   ['Toppings', ' /productos/refrigeracion/abatidores']
                ,   ['Vitrinas', ' /productos/refrigeracion/abatidores']
            ]
        ])

        <section>
            <div class="row justify-content-center">
                <div class="col-md-3 d-flex justify-content-center mb-4">
                    @include('frontend_v2.partials.product-view', [
                            'id'        => 1
                        ,   'title'     => 'Vitrina Horizontal Vidrio Curvo'
                        ,   'model'     => 'BHS-20'
                        ,   'tag'       => 'Refrigeradores y congeladores verticales'
                        ,   'tag_link'  => '/productos/refrigeracion/refrigeradores-y-congeladores-verticales'
                        ,   'route'     => '/productos/refrigeracion/refrigeradores-y-congeladores-verticales/vitrina-horizontal-vidrio-curvo-bhs-20'
                        ,   'image'     => url('storage/productos/vitrina-horizontal-vidrio-curvo-bhs-20-1623176766-thumbnail.jpg')
                    ])
                </div>
                <div class="col-md-3 d-flex justify-content-center mb-4">
                    @include('frontend_v2.partials.product-view', [
                            'id'        => 1
                        ,   'title'     => 'Vitrina Horizontal Vidrio Curvo'
                        ,   'model'     => 'BHS-20'
                        ,   'tag'       => 'Refrigeradores y congeladores verticales'
                        ,   'tag_link'  => '/productos/refrigeracion/refrigeradores-y-congeladores-verticales'
                        ,   'route'     => '/productos/refrigeracion/refrigeradores-y-congeladores-verticales/vitrina-horizontal-vidrio-curvo-bhs-20'
                        ,   'image'     => url('storage/productos/vitrina-horizontal-vidrio-curvo-bhs-20-1623176766-thumbnail.jpg')
                    ])
                </div>
                <div class="col-md-3 d-flex justify-content-center mb-4">
                    @include('frontend_v2.partials.product-view', [
                            'id'        => 1
                        ,   'title'     => 'Vitrina Horizontal Vidrio Curvo'
                        ,   'model'     => 'BHS-20'
                        ,   'tag'       => 'Refrigeradores y congeladores verticales'
                        ,   'tag_link'  => NULL
                        ,   'route'     => '/productos/refrigeracion/refrigeradores-y-congeladores-verticales/vitrina-horizontal-vidrio-curvo-bhs-20'
                        ,   'image'     => url('storage/productos/vitrina-horizontal-vidrio-curvo-bhs-20-1623176766-thumbnail.jpg')
                    ])
                </div>
                <div class="col-md-3 d-flex justify-content-center mb-4">
                    @include('frontend_v2.partials.product-view', [
                            'id'        => 1
                        ,   'title'     => 'Vitrina Horizontal Vidrio Curvo'
                        ,   'model'     => 'BHS-20'
                        ,   'tag'       => 'Refrigeradores y congeladores verticales'
                        ,   'tag_link'  => NULL
                        ,   'route'     => '/productos/refrigeracion/refrigeradores-y-congeladores-verticales/vitrina-horizontal-vidrio-curvo-bhs-20'
                        ,   'image'     => url('storage/productos/vitrina-horizontal-vidrio-curvo-bhs-20-1623176766-thumbnail.jpg')
                    ])
                </div>

                <div class="col-md-3 d-flex justify-content-center mb-4">
                    @include('frontend_v2.partials.product-view', [
                            'id'        => 1
                        ,   'title'     => 'Vitrina Horizontal Vidrio Curvo'
                        ,   'model'     => 'BHS-20'
                        ,   'tag'       => 'Anaqueles'
                        ,   'tag_link'  => '/productos/refrigeracion/refrigeradores-y-congeladores-verticales'
                        ,   'route'     => '/productos/refrigeracion/refrigeradores-y-congeladores-verticales/vitrina-horizontal-vidrio-curvo-bhs-20'
                        ,   'image'     => url('storage/productos/vitrina-horizontal-vidrio-curvo-bhs-20-1623176766-thumbnail.jpg')
                    ])
                </div>
                <div class="col-md-3 d-flex justify-content-center mb-4">
                    @include('frontend_v2.partials.product-view', [
                            'id'        => 1
                        ,   'title'     => 'Vitrina Horizontal Vidrio Curvo'
                        ,   'model'     => 'BHS-20'
                        ,   'tag'       => 'Anaqueles'
                        ,   'tag_link'  => '/productos/refrigeracion/refrigeradores-y-congeladores-verticales'
                        ,   'route'     => '/productos/refrigeracion/refrigeradores-y-congeladores-verticales/vitrina-horizontal-vidrio-curvo-bhs-20'
                        ,   'image'     => url('storage/productos/vitrina-horizontal-vidrio-curvo-bhs-20-1623176766-thumbnail.jpg')
                    ])
                </div>
                <div class="col-md-3 d-flex justify-content-center mb-4">
                    @include('frontend_v2.partials.product-view', [
                            'id'        => 1
                        ,   'title'     => 'Vitrina Horizontal Vidrio Curvo'
                        ,   'model'     => 'BHS-20'
                        ,   'tag'       => 'Anaqueles'
                        ,   'tag_link'  => NULL
                        ,   'route'     => '/productos/refrigeracion/refrigeradores-y-congeladores-verticales/vitrina-horizontal-vidrio-curvo-bhs-20'
                        ,   'image'     => url('storage/productos/vitrina-horizontal-vidrio-curvo-bhs-20-1623176766-thumbnail.jpg')
                    ])
                </div>
                <div class="col-md-3 d-flex justify-content-center mb-4">
                    @include('frontend_v2.partials.product-view', [
                            'id'        => 1
                        ,   'title'     => 'Vitrina Horizontal Vidrio Curvo'
                        ,   'model'     => 'BHS-20'
                        ,   'tag'       => 'Anaqueles'
                        ,   'tag_link'  => NULL
                        ,   'route'     => '/productos/refrigeracion/refrigeradores-y-congeladores-verticales/vitrina-horizontal-vidrio-curvo-bhs-20'
                        ,   'image'     => url('storage/productos/vitrina-horizontal-vidrio-curvo-bhs-20-1623176766-thumbnail.jpg')
                    ])
                </div>
            </div>
        </section>

        <section id="index__marcas">
            <h2>Nuestras marcas</h2>
            @include('frontend_v2.partials.marcas')
        </section>
    </main>
@endsection