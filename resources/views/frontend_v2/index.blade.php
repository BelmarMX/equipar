@section('title', $meta['titulo'])
@section('description', $meta['descripcion'])
@section('image', $meta['imagen'])
@extends('frontend_v2.master.app')

@section('content')
    @include('frontend_v2.partials.banner-array', ['banners' => $banners])

    <main class="container">
        <section id="index__productos_destacados" class="mb-5">
            <h2>Equipamiento Gastronómico</h2>
            <div class="row">
                @foreach($featured AS $category)
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
            <div class="text-end">
                <a href="{{ route('productos') }}" class="btn btn-primary">
                    Más categorías
                </a>
            </div>
        </section>

        <section id="index__nosotros" class="mb-5">
            <div class="row align-items-center mb-5">
                <div class="col-md-6 mb-4">
                    <h1 id="home_h1">Acerca de <strong>Equi-Par</strong></h1>
                    <div class="text-end">
                        <p class="text-1-1rem">
                            Aseguramos la eficiencia de las cocinas industriales, con servicio profesional y personalizado a través de la experiencia, tiempos de respuesta y talento de nuestros colaboradores.
                        </p>
                        <a href="{{ route('nosotros') }}" class="btn btn-primary">
                            Conócenos
                        </a>
                    </div>
                </div>
                <div class="col-md-6 mb-4">
                    <div id="reel-container">
                        <iframe width="100%"
                                height="315"
                                src="https://www.youtube.com/embed/Gi-ENqy6i_c"
                                title="Equipar Reel"
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
                                Desarrollo de proyectos.<br>
                                Dominio de flujos de operación.<br>
                                Equipamiento gastronómico.
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
                                Restaurantes, Hoteles, Comedores de empleados, Fast food, Dark kitchens, Reposterías, Bares y más.
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
                                Nos especializamos en ofrecer seguridad, tranquilidad y eficiencia personalizada a las cocinas industriales y profesionales.
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
            <h2>Áreas de una cocina industrial</h2>
            <div class="index__hotspot__background">
                <div class="background-box"></div>
                <div class="index__hotspot--img">
                    <img width="800"
                         height="534"
                         class="img-fluid"
                         src="{{ asset('v2/images/index/areas_de_una_cocina.png') }}"
                         alt="Áreas de una Cocina Industrial"
                    >
                    <span class="index__hotspot--spot grow-fast"
                          style="top: 30%; left: 14%;"
                          data-bs-toggle="tooltip"
                          data-bs-html="true"
                          title="<strong>RECEPCIÓN DE MERCANCÍA</strong><br>
                                <p class='text-start hint-fs'>Es el área donde se recibe y se desinfectan las materias primas a procesar.</p>
                            "
                    ></span>
                    <span class="index__hotspot--spot grow-fast"
                          style="top: 18%; left: 29%;"
                          data-bs-toggle="tooltip"
                          data-bs-html="true"
                          title="<strong>LAVADO DE COCHAMBRE</strong><br>
                                <p class='text-start hint-fs'>Lavado y desinfección de los elementos utilizados para la transformación y cocción de alimentos, sartenes, ollas, budineras, utensilios etc. Este proceso no debe de realizarse en la misma zona de limpieza de loza. Todos los residuos sépticos y basura generada debe de concentrarse en un lugar fuera de la cocina.</p>
                            "
                    ></span>
                    <span class="index__hotspot--spot grow-fast"
                          style="top: 18%; left: 46%;"
                          data-bs-toggle="tooltip"
                          data-bs-html="true"
                          title="<strong>LAVADO DE LOZA</strong><br>
                                <p class='text-start hint-fs'>Lugar donde recibimos todos los residuos o sobrantes de los platillos, y procedemos a la limpieza y sanitizacion de los elementos usados, platos, vasos, cubiertos, charolas, este proceso para que se eficiente requiere de una temperatura promedio entre 60 y 70 grados centígrados en el lavado.</p>
                            "
                    ></span>
                    <span class="index__hotspot--spot grow-fast"
                          style="top: 52%; left: 12%;"
                          data-bs-toggle="tooltip"
                          data-bs-html="true"
                          title="<strong>ALMACEN DE SECOS Y CONGELADOS</strong><br>
                                <p class='text-start hint-fs'>Aquí es donde se almacenan toda la materia prima seca no perecedera, latas, cereales, condimentos etc.</p>
                            "
                    ></span>
                    <span class="index__hotspot--spot grow-fast"
                          style="top: 78%; left: 10%;"
                          data-bs-toggle="tooltip"
                          data-bs-html="true"
                          title="<strong>ALMACEN REFRIGERADO</strong><br>
                                <p class='text-start hint-fs'>Lugar donde se almacena la materia prima que requiere de temperaturas bajas para su mayor conservación, ejemplo , lácteos, frutas y verduras, cárnicos, pescado y mariscos etc.</p>
                            "
                    ></span>
                    <span class="index__hotspot--spot grow-fast"
                          style="top: 60%; left: 28%;"
                          data-bs-toggle="tooltip"
                          data-bs-html="true"
                          title="<strong>ÁREA DE PREPARACIÓN</strong><br>
                                <p class='text-start hint-fs'>En esta área se inicia el proceso de transformación de materia prima mediante la limpieza, corte, sazonado, molido, licuado,  por mencionar algunos. Debe estar cerca de los almacenes.</p>
                            "
                    ></span>
                    <span class="index__hotspot--spot grow-fast"
                          style="top: 60%; left: 38%;"
                          data-bs-toggle="tooltip"
                          data-bs-html="true"
                          title="<strong>ÁREA DE COCCIÓN</strong><br>
                                <p class='text-start hint-fs'>Proceso de cocimiento en la preparación de alimentos, esta puede ser en seco, húmedo o combinado, freír, hervir, guisar, saltear, hornear, etc.</p>
                            "
                    ></span>
                    <span class="index__hotspot--spot grow-fast"
                          style="top: 60%; left: 51%;"
                          data-bs-toggle="tooltip"
                          data-bs-html="true"
                          title="<strong>SERVICIO DE ENTREGA DE ALIMENTOS</strong><br>
                                <p class='text-start hint-fs'>Espacio destinado para el armado y entrega de platillos, el cual puede ser frio o caliente.</p>
                            "
                    ></span>
                    <span class="index__hotspot--spot grow-fast"
                          style="top: 58%; left: 79%;"
                          data-bs-toggle="tooltip"
                          data-bs-html="true"
                          title="<strong>BARRA DE COMPLEMENTOS</strong><br>
                                <p class='text-start hint-fs'>Zona cercana a la zona de entrega donde se suministran complementos como pueden ser, cubiertos, bebidas, especies, hielo, tostadas, salsas, etc.</p>
                            "
                    ></span>
                </div>
            </div>
        </section>

        <section class="mb-5">
            <h3>Algunos de nuestros proyectos</h3>
            <a href="{{ route('portafolio') }}">
                <img width="{{ env('BANNER_WIDTH') }}"
                     height="{{ env('BANNER_HEIGHT') }}"
                     class="img-fluid w-100 border-radius-txb"
                     src="{{ asset('v2/images/index/algunos-proyectos.jpg') }}"
                     alt="Algunos de nuestros proyectos"
                >
            </a>
        </section>

        <section class="mb-5">
            <h3>Algunos de nuestros planos</h3>
            <a href="{{ route('servicios') }}">
                <img width="{{ env('BANNER_WIDTH') }}"
                     height="{{ env('BANNER_HEIGHT') }}"
                     class="img-fluid w-100"
                     src="{{ asset('v2/images/index/algunos-planos.jpg') }}"
                     alt="Algunos de nuestros planos"
                >
            </a>
        </section>

        <section class="mb-5">
            <h3>Algunos de nuestros renders</h3>
            <a href="{{ route('proyectos') }}">
                <img width="{{ env('BANNER_WIDTH') }}"
                     height="{{ env('BANNER_HEIGHT') }}"
                     class="img-fluid w-100 border-radius-bxt"
                     src="{{ asset('v2/images/index/algunos-renders.jpg') }}"
                     alt="Algunos de nuestros renders"
                >
            </a>
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
                                    'name'  => 'Atlas Colomos'
                                ,   'image' => asset('v2/images/clients/atlas-colomos.png')
                                ,   'link'  => 'https://colomos.atlas.com.mx/'
                                ,   'dark'  => TRUE
                            ])
                            @include('frontend_v2.partials.clientes-anchor', [
                                    'name'  => 'Grupo Vidanta'
                                ,   'image' => asset('v2/images/clients/grupo-vidanta.png')
                                ,   'link'  => 'https://www.grupovidanta.com/'
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
                                    'name'  => 'Panamá Pastelerías'
                                ,   'image' => asset('v2/images/clients/panama.png')
                                ,   'link'  => 'https://panama.com.mx/'
                            ])
                            @include('frontend_v2.partials.clientes-anchor', [
                                    'name'  => 'Buffalo Wild Wings'
                                ,   'image' => asset('v2/images/clients/buffalo-wild-wings.png')
                                ,   'link'  => 'https://www.buffalowildwings.com.mx/'
                                ,   'dark'  => TRUE
                            ])
                            @include('frontend_v2.partials.clientes-anchor', [
                                    'name'  => 'Casa Valadez'
                                ,   'image' => asset('v2/images/clients/casa-valadez.webp')
                                ,   'link'  => 'https://www.casavaladez.com/'
                            ])
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="row gx-1 justify-content-center align-items-center">
                            @include('frontend_v2.partials.clientes-anchor', [
                                    'name'  => 'Sushi Express'
                                ,   'image' => asset('v2/images/clients/sushi-express.svg')
                                ,   'link'  => 'https://sushiexpress.com.mx/#/'
                            ])
                            @include('frontend_v2.partials.clientes-anchor', [
                                    'name'  => 'Hyatt Ziva'
                                ,   'image' => asset('v2/images/clients/hyatt-ziva.webp')
                                ,   'link'  => 'https://www.hyatt.com/en-US/hotel/mexico/hyatt-ziva-puerto-vallarta/pvrif'
                            ])
                            @include('frontend_v2.partials.clientes-anchor', [
                                    'name'  => 'Bruna'
                                ,   'image' => asset('v2/images/clients/bruna.png')
                                ,   'link'  => 'https://www.bruna.com.mx/bruna.php'
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
                                    'name'  => 'Ultra Laboratorios'
                                ,   'image' => asset('v2/images/clients/ultra-labs.png')
                                ,   'link'  => 'https://ultralaboratorios.com.mx/en/home/'
                            ])
                            @include('frontend_v2.partials.clientes-anchor', [
                                    'name'  => 'El Ancladero'
                                ,   'image' => asset('v2/images/clients/elancladero.jpeg')
                                ,   'link'  => 'https://www.facebook.com/ElAncladero/'
                            ])
                            @include('frontend_v2.partials.clientes-anchor', [
                                    'name'  => 'Mariscos El Burritas'
                                ,   'image' => asset('v2/images/clients/mariscos-el-burritas.jpeg')
                                ,   'link'  => 'https://www.facebook.com/mariscoselburritas/'
                            ])
                            @include('frontend_v2.partials.clientes-anchor', [
                                    'name'  => 'ITT'
                                ,   'image' => asset('v2/images/clients/itt.png')
                                ,   'link'  => 'https://www.itt.com/home'
                            ])

                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="row gx-1 justify-content-center align-items-center">
                            @include('frontend_v2.partials.clientes-anchor', [
                                    'name'  => 'Cooper Standard'
                                ,   'image' => asset('v2/images/clients/cooper-standard.svg')
                                ,   'link'  => 'http://www.cooperstandard.com/'
                            ])
                            @include('frontend_v2.partials.clientes-anchor', [
                                    'name'  => 'Sinergia Alimenta'
                                ,   'image' => asset('v2/images/clients/sinergia.svg')
                                ,   'link'  => 'http://www.sinergiaalimenta.com/'
                                ,   'dark'  => TRUE
                            ])
                            @include('frontend_v2.partials.clientes-anchor', [
                                    'name'  => 'Hirotec'
                                ,   'image' => asset('v2/images/clients/hirotec.png')
                                ,   'link'  => 'https://www.hirotec.co.jp/eng/group/mexico.html'
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

        <section id="index__blog" class="mb-5">
            <h2>Últimas entradas del blog</h2>
            <div class="row">
                @foreach($articles AS $blog)
                    <div class="col-md-4">
                        @include('frontend_v2.partials.blog-view', [
                                'title'             => $blog -> titleA
                            ,   'link'              => route('blog-open', [
                                    $blog -> slugC, $blog -> slugA
                                ])
                            ,   'image'             => url('storage/articulos/'.$blog -> image_rx)
                            ,   'day'               => split_date($blog -> publish) -> day
                            ,   'month'             => split_date($blog -> publish) -> short_month
                            ,   'category_title'    => $blog -> titleC
                            ,   'category_link'     => route('blog-filter', $blog -> slugC)
                            ,   'summary'           => $blog -> shortdesc
                        ])
                    </div>
                @endforeach
            </div>
        </section>
    </div>

    <!-- Powered by www.dispersion.mx -->
@endsection