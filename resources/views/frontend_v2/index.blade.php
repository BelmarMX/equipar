@section('title', 'Bienvenido')
@section('description', '')
@section('image', '')
@extends('frontend_v2.master.app')

@section('content')
    @include('frontend_v2.partials.banner-array')

    <main class="container">
        <section id="index__productos_destacados" class="mb-5">
            <h2>Productos destacados</h2>
            <div class="row">
                <div class="col-md-3 d-flex justify-content-center mb-4">
                    @include('frontend_v2.partials.product-view', [
                            'id'        => 1
                        ,   'title'     => 'Vitrina Horizontal Vidrio Curvo'
                        ,   'model'     => 'BHS-20'
                        ,   'tag'       => 'Refrigeradores y congeladores verticales'
                        ,   'tag_link'  => 'productos/refrigeracion/refrigeradores-y-congeladores-verticales'
                        ,   'route'     => 'productos/refrigeracion/refrigeradores-y-congeladores-verticales/vitrina-horizontal-vidrio-curvo-bhs-20'
                        ,   'image'     => url('storage/productos/vitrina-horizontal-vidrio-curvo-bhs-20-1623176766-thumbnail.jpg')
                    ])
                </div>
                <div class="col-md-3 d-flex justify-content-center mb-4">
                    @include('frontend_v2.partials.product-view', [
                            'id'        => 1
                        ,   'title'     => 'Vitrina Horizontal Vidrio Curvo'
                        ,   'model'     => 'BHS-20'
                        ,   'tag'       => 'Refrigeradores y congeladores verticales'
                        ,   'tag_link'  => 'productos/refrigeracion/refrigeradores-y-congeladores-verticales'
                        ,   'route'     => 'productos/refrigeracion/refrigeradores-y-congeladores-verticales/vitrina-horizontal-vidrio-curvo-bhs-20'
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
                        ,   'route'     => 'productos/refrigeracion/refrigeradores-y-congeladores-verticales/vitrina-horizontal-vidrio-curvo-bhs-20'
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
                        ,   'route'     => 'productos/refrigeracion/refrigeradores-y-congeladores-verticales/vitrina-horizontal-vidrio-curvo-bhs-20'
                        ,   'image'     => url('storage/productos/vitrina-horizontal-vidrio-curvo-bhs-20-1623176766-thumbnail.jpg')
                    ])
                </div>
            </div>
            <div class="text-end">
                <a href="" class="btn btn-primary">
                    Ir a productos
                </a>
            </div>
        </section>

        <section id="index__nosotros" class="mb-5">
            <div class="row align-items-center mb-5">
                <div class="col-md-6 mb-4">
                    <h1 id="home_h1">Acerca de <strong>Equi-Par</strong></h1>
                    <div class="text-end">
                        <p class="text-1-1rem">
                            Aseguramos la eficiencia de tu cocina, con servicio profesional y personalizado a través de la experiencia, tiempos de respuesta y talento de nuestros colaboradores.
                        </p>
                        <a href="" class="btn btn-primary">
                            Conócenos
                        </a>
                    </div>
                </div>
                <div class="col-md-6 mb-4">
                    <div id="reel-container">
                        <iframe width="100%"
                                height="315"
                                src="https://www.youtube.com/embed/spcOCBeg_zc"
                                title="Equipar Reel"
                                frameborder="0"
                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                allowfullscreen></iframe>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-4 mb-4">
                    <div class="index__nosotros__summary d-flex align-items-top justify-content-start">
                        <div class="index__nosotros--icon">
                            <i class="bi bi-trophy-fill"></i>
                        </div>
                        <div class="index__nosotros--description">
                            <strong>Más de 19 años de experiencia</strong>
                            <p>
                                Calidad de servicio.<br>
                                Atractivos tiempos de respuesta.<br>
                                Adaptación de presupuestos.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="index__nosotros__summary d-flex align-items-top justify-content-start">
                        <div class="index__nosotros--icon">
                            <i class="bi bi-person-rolodex"></i>
                        </div>
                        <div class="index__nosotros--description">
                            <strong>Asesores profesionales para el sector gastronómico</strong>
                            <p>
                                Restaurantes, Hoteles, Comedores de empleados, Carnicerías, Reposterías, Bares, Fast food, Empacadoras y más.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="index__nosotros__summary d-flex align-items-top justify-content-start">
                        <div class="index__nosotros--icon">
                            <i class="bi bi-award-fill"></i>
                        </div>
                        <div class="index__nosotros--description">
                            <strong>Expertos en soluciones integrales</strong>
                            <p>
                                Asesoría, Diseño, Equipamiento, Fabricación, Instalación y Capacitación.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <section id="partial__servicios" class="container-fluid mb-5">
        @include('frontend_v2.partials.servicios')
    </section>

    <div class="container">
        <section id="index__hotspot" class="mb-5">
            <h2>Partes de una cocina industrial</h2>
            <div class="index__hotspot__background">
                <div class="background-box"></div>
                <div class="index__hotspot--img">
                    <img width="100%"
                         class="img-fluid"
                         src="{{ asset('v2/images/samples/PartesDeUnaCocina.png') }}"
                         alt="Partes de una Cocina Industrial"
                    >
                    <span class="index__hotspot--spot grow-fast"
                          style="top: 25%; left: 48%;"
                          data-bs-toggle="tooltip"
                          data-bs-html="true"
                          title="<strong>CAMPANA DE EXTRACCIÓN</strong><br>
                                <p>Atrapa el cochambre y permite la ventilación de la cocina.</p>
                            "
                    ></span>
                    <span class="index__hotspot--spot grow-fast"
                          style="top: 50%; left: 18%;"
                          data-bs-toggle="tooltip"
                          data-bs-html="true"
                          title="<strong>CAMPANA DE EXTRACCIÓN</strong><br>
                                <p>Atrapa el cochambre y permite la ventilación de la cocina.</p>
                            "
                    ></span>
                    <span class="index__hotspot--spot grow-fast"
                          style="top: 43%; left: 40%;"
                          data-bs-toggle="tooltip"
                          data-bs-html="true"
                          title="<strong>CAMPANA DE EXTRACCIÓN</strong><br>
                                <p>Atrapa el cochambre y permite la ventilación de la cocina.</p>
                            "
                    ></span>
                    <span class="index__hotspot--spot grow-fast"
                          style="top: 53%; left: 50%;"
                          data-bs-toggle="tooltip"
                          data-bs-html="true"
                          title="<strong>CAMPANA DE EXTRACCIÓN</strong><br>
                                <p>Atrapa el cochambre y permite la ventilación de la cocina.</p>
                            "
                    ></span>
                    <span class="index__hotspot--spot grow-fast"
                          style="top: 65%; left: 81%;"
                          data-bs-toggle="tooltip"
                          data-bs-html="true"
                          title="<strong>CAMPANA DE EXTRACCIÓN</strong><br>
                                <p>Atrapa el cochambre y permite la ventilación de la cocina.</p>
                            "
                    ></span>
                </div>
            </div>
        </section>

        <section id="index__blog" class="mb-5">
            <h2>Últimas entradas del blog</h2>
            <div class="row">
                <div class="col-md-4">
                    @include('frontend_v2.partials.blog-view', [
                            'title'             => '10 Ventajas de tener un comedor industrial en tu empresa'
                        ,   'link'              => 'http://www.google.com'
                        ,   'image'             => url('storage/articulos/10-ventajas-de-tener-un-comedor-industrial-en-tu-empresa-1576686202-1576686202-thumbnail.png')
                        ,   'day'               => 18
                        ,   'month'             => 'Dic'
                        ,   'category_title'    => 'Comedor Industrial'
                        ,   'category_link'     => 'http://www.google.com'
                        ,   'summary'           => '10 ventajas de tener un comedor industrial en tu empresa...'
                    ])
                </div>
                <div class="col-md-4">
                    @include('frontend_v2.partials.blog-view', [
                            'title'             => '10 Ventajas de tener un comedor industrial en tu empresa'
                        ,   'link'              => 'http://www.google.com'
                        ,   'image'             => url('storage/articulos/10-ventajas-de-tener-un-comedor-industrial-en-tu-empresa-1576686202-1576686202-thumbnail.png')
                        ,   'day'               => 18
                        ,   'month'             => 'Dic'
                        ,   'category_title'    => 'Comedor Industrial'
                        ,   'category_link'     => 'http://www.google.com'
                        ,   'summary'           => '10 ventajas de tener un comedor industrial en tu empresa...'
                    ])
                </div>
                <div class="col-md-4">
                    @include('frontend_v2.partials.blog-view', [
                            'title'             => '10 Ventajas de tener un comedor industrial en tu empresa'
                        ,   'link'              => 'http://www.google.com'
                        ,   'image'             => url('storage/articulos/10-ventajas-de-tener-un-comedor-industrial-en-tu-empresa-1576686202-1576686202-thumbnail.png')
                        ,   'day'               => 18
                        ,   'month'             => 'Dic'
                        ,   'category_title'    => 'Comedor Industrial'
                        ,   'category_link'     => 'http://www.google.com'
                        ,   'summary'           => '10 ventajas de tener un comedor industrial en tu empresa...'
                    ])
                </div>
            </div>
        </section>

        <section id="index__clientes">
            <h2>Nuestro valiosos clientes</h2>
            <div id="index__clientes--slide" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner row">
                    <div class="carousel-item active">
                        <div class="row gx-1 justify-content-center align-items-center">
                            @include('frontend_v2.partials.clientes-anchor', [
                                    'name'  => 'HEB'
                                ,   'image' => asset('v2/images/clients/heb.png')
                                ,   'link'  => 'https://www.heb.com.mx/'
                            ])
                            @include('frontend_v2.partials.clientes-anchor', [
                                    'name'  => 'Continental'
                                ,   'image' => asset('v2/images/clients/continental.png')
                                ,   'link'  => 'https://www.continental.com/en/'
                            ])
                            @include('frontend_v2.partials.clientes-anchor', [
                                    'name'  => 'Buffalo Wild Wings'
                                ,   'image' => asset('v2/images/clients/buffalo-wild-wings.png')
                                ,   'link'  => 'https://www.buffalowildwings.com.mx/'
                                ,   'dark'  => TRUE
                            ])
                            @include('frontend_v2.partials.clientes-anchor', [
                                    'name'  => 'Hyatt Ziva'
                                ,   'image' => asset('v2/images/clients/hyatt-ziva.webp')
                                ,   'link'  => 'https://www.hyatt.com/en-US/hotel/mexico/hyatt-ziva-puerto-vallarta/pvrif'
                            ])
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="row gx-1 justify-content-center align-items-center">
                            @include('frontend_v2.partials.clientes-anchor', [
                                    'name'  => 'Atlas Colomos'
                                ,   'image' => asset('v2/images/clients/atlas-colomos.png')
                                ,   'link'  => 'https://colomos.atlas.com.mx/'
                                ,   'dark'  => TRUE
                            ])
                            @include('frontend_v2.partials.clientes-anchor', [
                                    'name'  => 'Casa Valadez'
                                ,   'image' => asset('v2/images/clients/casa-valadez.webp')
                                ,   'link'  => 'https://www.casavaladez.com/'
                            ])
                            @include('frontend_v2.partials.clientes-anchor', [
                                    'name'  => 'Hirotec'
                                ,   'image' => asset('v2/images/clients/hirotec.png')
                                ,   'link'  => 'https://www.hirotec.co.jp/eng/group/mexico.html'
                            ])
                            @include('frontend_v2.partials.clientes-anchor', [
                                    'name'  => 'Mariscos El Burritas'
                                ,   'image' => asset('v2/images/clients/mariscos-el-burritas.jpeg')
                                ,   'link'  => 'https://www.facebook.com/mariscoselburritas/'
                            ])
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="row gx-1 justify-content-center align-items-center">
                            @include('frontend_v2.partials.clientes-anchor', [
                                   'name'  => 'Restaurante Save'
                               ,   'image' => asset('v2/images/clients/save.png')
                               ,   'link'  => 'https://restaurante-save.mx/'
                           ])
                            @include('frontend_v2.partials.clientes-anchor', [
                                    'name'  => 'Sushi Express'
                                ,   'image' => asset('v2/images/clients/sushi-express.svg')
                                ,   'link'  => 'https://sushiexpress.com.mx/#/'
                            ])
                            @include('frontend_v2.partials.clientes-anchor', [
                                    'name'  => 'Grupo Vidanta'
                                ,   'image' => asset('v2/images/clients/grupo-vidanta.png')
                                ,   'link'  => 'https://www.grupovidanta.com/'
                            ])
                            @include('frontend_v2.partials.clientes-anchor', [
                                    'name'  => 'Bruna'
                                ,   'image' => asset('v2/images/clients/bruna.png')
                                ,   'link'  => 'https://www.bruna.com.mx/bruna.php'
                            ])
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="row gx-1 justify-content-center align-items-center">
                            @include('frontend_v2.partials.clientes-anchor', [
                                    'name'  => 'Ultra Laboratorios'
                                ,   'image' => asset('v2/images/clients/ultra-labs.png')
                                ,   'link'  => 'https://ultralaboratorios.com.mx/en/home/'
                            ])
                            @include('frontend_v2.partials.clientes-anchor', [
                                    'name'  => 'Sinergia Alimenta'
                                ,   'image' => asset('v2/images/clients/sinergia.svg')
                                ,   'link'  => 'http://www.sinergiaalimenta.com/'
                                ,   'dark'  => TRUE
                            ])
                            @include('frontend_v2.partials.clientes-anchor', [
                                    'name'  => 'El Ancladero'
                                ,   'image' => asset('v2/images/clients/elancladero.jpeg')
                                ,   'link'  => 'https://www.facebook.com/ElAncladero/'
                            ])
                            @include('frontend_v2.partials.clientes-anchor', [
                                    'name'  => 'Pachinos'
                                ,   'image' => asset('v2/images/clients/pachinos.png')
                                ,   'link'  => 'https://pachinos.mx/'
                            ])
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="row gx-1 justify-content-center align-items-center">
                            @include('frontend_v2.partials.clientes-anchor', [
                                    'name'  => 'Panamá Pastelerías'
                                ,   'image' => asset('v2/images/clients/panama.png')
                                ,   'link'  => 'https://panama.com.mx/'
                            ])
                            @include('frontend_v2.partials.clientes-anchor', [
                                    'name'  => 'Cooper Standard'
                                ,   'image' => asset('v2/images/clients/cooper-standard.svg')
                                ,   'link'  => 'http://www.cooperstandard.com/'
                            ])
                            @include('frontend_v2.partials.clientes-anchor', [
                                    'name'  => 'ITT'
                                ,   'image' => asset('v2/images/clients/itt.png')
                                ,   'link'  => 'https://www.itt.com/home'
                            ])
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section id="index__marcas">
            <h2>Nuestras marcas</h2>
            @include('frontend_v2.partials.marcas')
        </section>
    </div>
@endsection