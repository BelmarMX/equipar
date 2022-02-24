@section('title', 'Proyectos')
@section('description', '')
@section('image', '')
@extends('frontend_v2.master.app')

@section('content')
    <div class="container-fluid mb-5">
        @include('frontend_v2.partials.banner-single', [
                'slide'         => asset('v2/images/samples/banner.jpg')
            ,   'slide_alt'     => 'Proyectos para personas'
            ,   'summary'       => TRUE
            ,   'title'         => 'Proyectos para <strong>Personas</strong>'
            ,   'description'   => 'Aseguramos el correcto diseño y selección de equipo necesarios para la <strong>operación eficiente de su cocina</strong>'
            ,   'h1'            => TRUE
        ])
    </div>

    <main class="container">
        <section>
            <div class="row">
                <div class="col-md-4">
                    @include('frontend_v2.partials.portfolio-view', [
                            'title'             => '10 Ventajas de tener un comedor industrial en tu empresa'
                        ,   'link'              => 'http://www.google.com'
                        ,   'image'             => url('storage/articulos/10-ventajas-de-tener-un-comedor-industrial-en-tu-empresa-1576686202-1576686202-thumbnail.png')
                        ,   'day'               => 18
                        ,   'month'             => 'Dic'
                        ,   'summary'           => '10 ventajas de tener un comedor industrial en tu empresa...'
                    ])
                </div>
                <div class="col-md-4">
                    @include('frontend_v2.partials.portfolio-view', [
                            'title'             => '10 Ventajas de tener un comedor industrial en tu empresa'
                        ,   'link'              => 'http://www.google.com'
                        ,   'image'             => url('storage/articulos/10-ventajas-de-tener-un-comedor-industrial-en-tu-empresa-1576686202-1576686202-thumbnail.png')
                        ,   'day'               => 18
                        ,   'month'             => 'Dic'
                        ,   'summary'           => '10 ventajas de tener un comedor industrial en tu empresa...'
                    ])
                </div>
                <div class="col-md-4">
                    @include('frontend_v2.partials.portfolio-view', [
                            'title'             => '10 Ventajas de tener un comedor industrial en tu empresa'
                        ,   'link'              => 'http://www.google.com'
                        ,   'image'             => url('storage/articulos/10-ventajas-de-tener-un-comedor-industrial-en-tu-empresa-1576686202-1576686202-thumbnail.png')
                        ,   'day'               => 18
                        ,   'month'             => 'Dic'
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

    <div class="modal fade" id="porfolio_modal" aria-hidden="true" aria-labelledby="portfolioModalLabel" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered modal-fullscreen">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="portfolioModalLabel">Barra Grill</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div id="portfolio_slider" class="carousel slide" data-bs-ride="carousel">
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img src="{{ asset('v2/images/samples/portafolio.png') }}" class="d-block w-100" alt="Sample">
                                <div class="row p-3">
                                    <div class="col-md-6 order-md-2 text-md-end">
                                        <h3>Barra Gril</h3>
                                        <small>1 de 3</small>
                                    </div>
                                    <div class="col-md-6 order-md-1">
                                        <p>
                                            En Barra Grill, nuestro equipo planificó la forma más eficiente de distribuir la cocina y asignar los espacios necesarios para que el personal pueda trabajar velozmente.
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="carousel-item">
                                <img src="{{ asset('v2/images/samples/portafolio.png') }}" class="d-block w-100" alt="Sample">
                                <div class="row p-3">
                                    <div class="col-md-6 order-md-2 text-md-end">
                                        <h3>Barra Gril</h3>
                                        <small>2 de 3</small>
                                    </div>
                                    <div class="col-md-6 order-md-1">
                                        <p>
                                            En Barra Grill, nuestro equipo planificó la forma más eficiente de distribuir la cocina y asignar los espacios necesarios para que el personal pueda trabajar velozmente.
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="carousel-item">
                                <img src="{{ asset('v2/images/samples/portafolio.png') }}" class="d-block w-100" alt="Sample">
                                <div class="row p-3">
                                    <div class="col-md-6 order-md-2 text-md-end">
                                        <h3>Barra Gril</h3>
                                        <small>3 de 3</small>
                                    </div>
                                    <div class="col-md-6 order-md-1">
                                        <p>
                                            En Barra Grill, nuestro equipo planificó la forma más eficiente de distribuir la cocina y asignar los espacios necesarios para que el personal pueda trabajar velozmente.
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#portfolio_slider" data-bs-slide="prev">
                            <i class="bi bi-arrow-left-circle" aria-hidden="true"></i>
                            <span class="visually-hidden">Anterior</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#portfolio_slider" data-bs-slide="next">
                            <i class="bi bi-arrow-right-circle" aria-hidden="true"></i>
                            <span class="visually-hidden">Siguiente</span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection