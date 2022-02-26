@section('title', 'Productos')
@section('description', '')
@section('image', '')
@extends('frontend_v2.master.app')

@section('content')
    <div class="container-fluid mb-5">
        @include('frontend_v2.partials.banner-single', [
                'slide'         => asset('v2/images/samples/banner-promos.jpg')
            ,   'slide_alt'     => 'Banner Categoría'
            ,   'summary'       => TRUE
            ,   'title'         => '<strong>Abatidores</strong>'
            ,   'h1'            => TRUE
        ])
    </div>

    <main class="container">
        @include('frontend_v2.partials.scroll-categories', [
                'tag_title'     => 'Subcategorías'
            ,   'todas_link'    => '/productos/refrigeracion'
            ,   'categories'    => [
                    ['Abatidores', '#']
                ,   ['Baño María frío', '#']
                ,   ['Base refrigerada', '#']
                ,   ['Botelleros', '#']
                ,   ['Cong horizontales', '#']
                ,   ['Contra barras', '#']
                ,   ['Cortinas de aire', '#']
                ,   ['Dispensador de cerveza', '#']
                ,   ['Fabricadoras de hielo', '#']
                ,   ['Mesas de preparación', '#']
                ,   ['Mesas para trabajo', '#']
                ,   ['Refrigeradores y congeladores verticales', '#']
                ,   ['Topping refrigerado', '#']
                ,   ['Toppings', '#']
                ,   ['Vitrinas', '#']
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