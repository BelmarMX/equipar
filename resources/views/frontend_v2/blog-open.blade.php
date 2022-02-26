@section('title', 'Blog Open')
@section('description', '')
@section('image', '')
@extends('frontend_v2.master.app')

@section('content')
    <div class="container-fluid mb-5">
        @include('frontend_v2.partials.banner-single', [
                'slide'         => asset('v2/images/samples/banner.jpg')
            ,   'slide_alt'     => 'Blog Banner'
            ,   'summary'       => TRUE
            ,   'title'         => '<strong>BLOG</strong>'
            ,   'description'   => 'Artículos de interés general sobre <strong>equipamientos de cocinas industriales</strong>'
            ,   'h1'            => TRUE
        ])
    </div>

    <main class="container">
        @include('frontend_v2.partials.scroll-categories', [
                'tag_title'     => 'Categorías'
            ,   'todas_link'    => '#'
            ,   'categories'    => [
                    ['Comedor Industrial', '/blog/como-equipar-una-cocina-industrial']
                ,   ['Equipamiento de cocina industrial', '/blog/como-equipar-una-cocina-industrial']
                ,   ['Diseño y organización', '/blog/como-equipar-una-cocina-industrial']
                ,   ['Distintivos', '/blog/como-equipar-una-cocina-industrial']
            ]
        ])

        <section>
            <div class="row">
                <div class="col-md-4">
                    @include('frontend_v2.partials.blog-view', [
                            'title'             => '10 Ventajas de tener un comedor industrial en tu empresa'
                        ,   'link'              => '/blog/como-equipar-una-cocina-industrial/como-equipar-una-cocina-industrial'
                        ,   'image'             => url('storage/articulos/10-ventajas-de-tener-un-comedor-industrial-en-tu-empresa-1576686202-1576686202-thumbnail.png')
                        ,   'day'               => 18
                        ,   'month'             => 'Dic'
                        ,   'category_title'    => 'Comedor Industrial'
                        ,   'category_link'     => '/blog/como-equipar-una-cocina-industrial'
                        ,   'summary'           => '10 ventajas de tener un comedor industrial en tu empresa...'
                    ])
                </div>
                <div class="col-md-4">
                    @include('frontend_v2.partials.blog-view', [
                            'title'             => '10 Ventajas de tener un comedor industrial en tu empresa'
                        ,   'link'              => '/blog/como-equipar-una-cocina-industrial/como-equipar-una-cocina-industrial'
                        ,   'image'             => url('storage/articulos/10-ventajas-de-tener-un-comedor-industrial-en-tu-empresa-1576686202-1576686202-thumbnail.png')
                        ,   'day'               => 18
                        ,   'month'             => 'Dic'
                        ,   'category_title'    => 'Comedor Industrial'
                        ,   'category_link'     => '/blog/como-equipar-una-cocina-industrial'
                        ,   'summary'           => '10 ventajas de tener un comedor industrial en tu empresa...'
                    ])
                </div>
                <div class="col-md-4">
                    @include('frontend_v2.partials.blog-view', [
                            'title'             => '10 Ventajas de tener un comedor industrial en tu empresa'
                        ,   'link'              => '/blog/como-equipar-una-cocina-industrial/como-equipar-una-cocina-industrial'
                        ,   'image'             => url('storage/articulos/10-ventajas-de-tener-un-comedor-industrial-en-tu-empresa-1576686202-1576686202-thumbnail.png')
                        ,   'day'               => 18
                        ,   'month'             => 'Dic'
                        ,   'category_title'    => 'Comedor Industrial'
                        ,   'category_link'     => '/blog/como-equipar-una-cocina-industrial'
                        ,   'summary'           => '10 ventajas de tener un comedor industrial en tu empresa...'
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