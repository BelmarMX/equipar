@section('title', $meta['titulo'])
@section('description', $meta['descripcion'])
@section('image', $meta['imagen'])
@extends('frontend_v2.master.app')

@push('customCss')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <style>
        .bg-black{
            background: #000;
            color: #FFF;
        }
        .bg-black-50{
            background: rgba(0,0,0,.5);
        }
        .bg-slate{
            background: rgba(30, 41, 59, 0.1);
        }
        .banner__single
        .banner__single__summary{
            max-width: 472px;
            background: rgba(30, 41, 59, 0.5);
            height: 75%;
        }
        .eh2{
            font-size: 1.3rem;
        }
        .fsize-2{
            font-size: 2.5rem;
        }
        .lh-150{
            line-height: 150%;
        }
        .swiper-categories{
            width: 100%;
            max-width: calc(100vw - 30px);
            height: 360px;
            overflow: hidden;
        }
        .swiper-slide {
            text-align: center;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .wrap-card{
            background: #fff;
            padding: .25rem;
            border-radius: 10px;
            box-shadow: 11px 11px 12px 1px rgba(30,41,59,0.075);
            -webkit-box-shadow: 11px 11px 12px 1px rgba(30,41,59,0.075);
            -moz-box-shadow: 11px 11px 12px 1px rgba(30,41,59,0.075);
        }
        .wrap-card.dark{
            background: #000;
            color: #FFF;
            position: relative;
            width: 100%;
            height: 100%;
        }
        .wrap-card.dark > .text
        {
            position: absolute;
            bottom: 0;
            display: block;
            text-align: center;
            font-weight: 600;
            font-size: 1.2rem;
            width: calc(100% - 30px);
            left: 15px;
            padding: 24px 15px;
            background: rgb(0,0,0);
            background: linear-gradient(0deg, rgba(0,0,0,1) 0%, rgba(0,0,0,0) 100%);
        }
        .iconera{
            text-align: end;
        }
        .iconera > i{
            font-size: 36px;
            font-size: 34px;
            margin-left: 7px;
        }
        .iconera > i:last-child{
            margin-right: 7px;
        }
        .iconera > i.bi-plug-fill:hover{
            color: #60a5fa;
        }
        .iconera > i.bi-fire:hover{
            color: #F00;
        }
        .featured-link{
            font-weight: 600;
            font-size: 1.45rem;
            color: #334155;
        }
        .before-buy p,
        .before-buy span,
        .before-buy strong{
            font-size: 1.3rem;
        }
        .before-buy strong.blue{
            color: #0dcaf0;
        }
        .hiper-strong
        {
            font-size: 2.35rem;
        }
        .hiper-strong span
        {
            font-size: 2.5rem;
            color: #0dcaf0;
        }
    </style>
@endpush

@section('content')
    <div class="bg-unox">
        <div class="container-fluid mb-5">
            @include('frontend_v2.partials.banner-landing', [
                    'slide'         => asset('v2/images/unox/banner/1620038336.webp')
                ,   'slide_alt'     => $meta['titulo']
                ,   'summary'       => TRUE
                ,   'logo_image'    => asset('v2/images/unox/unox.svg')
                ,   'logo_width'    => '50%'
                ,   'logo_height'   => '100%'
                ,   'title'         => "<strong>{$meta['titulo']}</strong>"
                ,   'h1'            => TRUE
            ])
        </div>

        <main class="mt-5 mb-5">
            {{-- HORNOS POR INDUSTRIA  --}}
            <section id="unox__hornos-profesionales" class="container mb-5">
                <div class="text-center mb-2">
                    <img width="170" height="98" src="{{ asset('v2/images/unox/reddot-winner-2022-best-of-best.jpeg') }}" alt="RedDot Winner 2022 Best of Best">
                </div>
                <h2 class="mb-2 lh-150">
                    En Equipar encontrarás <strong class="eh2">Hornos Profesionales</strong><br><br>
                    <span class="mt-1 fsize-2">para construir tu éxito.</span>
                </h2>
                <p class="text-center mb-5">
                    Elige la solución que más te convenga para cada sector con un <strong>Horno Profesional UNOX&reg;</strong>
                </p>

                <div class="text-center mb-2">
                    <small>&lt; Desliza con el mouse el slider &gt;</small>
                </div>
                <div class="swiper-categories position-relative">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide">
                            @include('frontend_v2.partials.unox-categories-view', [
                                    'title' => 'Gastronomía y supermercados'
                                ,   'cat'   => 'Hornos UNOX'
                                ,   'image' => asset('v2/images/unox/slides/gastronomina_supermercados.webp')
                                ,   'route' => route('brands-subcategories', ['unox', 'coccion', 'hornos'])
                            ])
                        </div>
                        <div class="swiper-slide">
                            @include('frontend_v2.partials.unox-categories-view', [
                                    'title' => 'Restaurantes y gastronomía'
                                ,   'cat'   => 'Hornos UNOX'
                                ,   'image' => asset('v2/images/unox/slides/restaurantes_gastronomia.webp')
                                ,   'route' => route('brands-subcategories', ['unox', 'coccion', 'hornos'])
                            ])
                        </div>
                        <div class="swiper-slide">
                            @include('frontend_v2.partials.unox-categories-view', [
                                    'title' => 'Panaderías y pastelerías'
                                ,   'cat'   => 'Hornos UNOX'
                                ,   'image' => asset('v2/images/unox/slides/panaderias_pastelerias.webp')
                                ,   'route' => route('brands-subcategories', ['unox', 'coccion', 'hornos'])
                            ])
                        </div>
                        <div class="swiper-slide">
                            @include('frontend_v2.partials.unox-categories-view', [
                                    'title' => 'Bares y cafeterías'
                                ,   'cat'   => 'Hornos UNOX'
                                ,   'image' => asset('v2/images/unox/slides/bares_cafeterias.webp')
                                ,   'route' => route('brands-subcategories', ['unox', 'coccion', 'hornos'])
                            ])
                        </div>
                        <div class="swiper-slide">
                            @include('frontend_v2.partials.unox-categories-view', [
                                    'title' => 'Restauración rápida'
                                ,   'cat'   => 'Hornos UNOX'
                                ,   'image' => asset('v2/images/unox/slides/restauracion_rapida.webp')
                                ,   'route' => route('brands-subcategories', ['unox', 'coccion', 'hornos'])
                            ])
                        </div>
                        <div class="swiper-slide">
                            @include('frontend_v2.partials.unox-categories-view', [
                                    'title' => 'Centros de cocción'
                                ,   'cat'   => 'Hornos UNOX'
                                ,   'image' => asset('v2/images/unox/slides/centros_coccion.webp')
                                ,   'route' => route('brands-subcategories', ['unox', 'coccion', 'hornos'])
                            ])
                        </div>
                    </div>
                    <div class="swiper-pagination"></div>
                </div>
            </section>

            <section class="container py-5 mb-5">
                <span class="h2 d-block text-center">Productos UNOX&reg; Catálogos</span>
                <div class="row justify-content-center">
                    <div class="col-md-4 text-center mb-3">
                        <a class="featured-link" href="{{ route('results', ['termino' => 'Bakertop+Mind.Maps', 'filter' => 'y', 'brand' => 'UNOX']) }}">
                            <img width="225" height="271" class="img-fluid mb-3" src="{{ asset('v2/images/unox/featured/bakertop-mind-maps.webp') }}" alt="Bakertop Mind.Maps&trade; Hornos mixtos profesionales"><br>
                            Bakertop MIND.Maps&trade;<br>Hornos combinados inteligentes
                        </a>
                    </div>
                    <div class="col-md-4 text-center mb-3">
                        <a class="featured-link" href="{{ route('results', ['termino' => 'Cheftop+Mind.Maps', 'filter' => 'y', 'brand' => 'UNOX']) }}">
                            <img width="225" height="271" class="img-fluid mb-3" src="{{ asset('v2/images/unox/featured/cheftop-mind-maps.webp') }}" alt="Cheftop Mind.Maps&trade; Hornos mixtos profesionales"><br>
                            Cheftop MIND.Maps&trade;<br>Hornos mixtos profesionales
                        </a>
                    </div>
                    <div class="col-md-4 text-center mb-3">
                        <a class="featured-link" href="{{ route('results', ['termino' => 'Cheftop+Mind.Maps', 'filter' => 'y', 'brand' => 'UNOX']) }}">
                            <img width="225" height="271" class="img-fluid mb-3" src="{{ asset('v2/images/unox/featured/cheftop-mind-maps.webp') }}" alt="Cheftop Mind.Maps&trade; Hornos mixtos profesionales"><br>
                            Bakerlux&trade;<br>Hornos analógos de convección
                        </a>
                    </div>
                    <div class="col-md-4 text-center mb-3">
                        <a class="featured-link" href="{{ route('results', ['termino' => 'Cheftop+Mind.Maps', 'filter' => 'y', 'brand' => 'UNOX']) }}">
                            <img width="225" height="271" class="img-fluid mb-3" src="{{ asset('v2/images/unox/featured/cheftop-mind-maps.webp') }}" alt="Cheftop Mind.Maps&trade; Hornos mixtos profesionales"><br>
                            Bakerlux SHOP.Pro&trade;<br>Hornos analógos de convección
                        </a>
                    </div>
                    <div class="col-md-4 text-center mb-3">
                        <a class="featured-link" href="{{ route('results', ['termino' => 'Speed.Pro', 'filter' => 'y', 'brand' => 'UNOX']) }}">
                            <img width="225" height="271" class="img-fluid mb-3" src="{{ asset('v2/images/unox/featured/speed-pro.webp') }}" alt="Speed.Pro&trade; Hornos rápidos profesional"><br>
                            Bakerlux SPEED.Pro&trade;<br>Hornos rápidos profesionales
                        </a>
                    </div>
                    <div class="col-md-4 text-center mb-3">
                        <a class="featured-link" href="{{ route('results', ['termino' => 'Evereo', 'filter' => 'y', 'brand' => 'UNOX']) }}">
                            <img width="225" height="271" class="img-fluid mb-3" src="{{ asset('v2/images/unox/featured/evereo.webp') }}" alt="Evereo&reg; Métodos de conservación por calor"><br>
                            Evereo&reg;<br>Métodos de conservación por calor
                        </a>
                    </div>
                    <div class="col-md-4 text-center mb-3">
                        <a class="featured-link" href="{{ route('results', ['termino' => 'Speed-x', 'filter' => 'y', 'brand' => 'UNOX']) }}">
                            <img width="225" height="271" class="img-fluid mb-3" src="{{ asset('v2/images/unox/featured/speed-x.webp') }}" alt="Speed-x&trade; Digital.ID&trade;Hornos rápidos profesional"><br>
                            Speed-x&trade; Digital.ID&trade;<br>Hornos rápidos profesionales
                        </a>
                    </div>
                </div>
            </section>

            {{-- BENEFICIOS UNOX --}}
            <section class="container-fluid bg-black py-5 mb-5 before-buy">
                <div class="px-5">
                    <h2>Antes de comprar UNOX&reg; ¡Pruébalo!</h2>
                    <p class="mb-5">
                        Para que estés 100% seguro de tu compra: nuestros agentes <strong class="text-danger">expertos de Equipar</strong> te guiarán paso a paso para que pruebes tu próximo Horno Unox en tu cocina <strong class="blue">sin costo alguno.</strong>
                    </p>

                    <div class="row">
                        <div class="col-md-4">
                            <h3 class="hiper-strong">
                                <span>Iremos</span> a verte
                            </h3>
                            <p>
                                Tú eliges el día y la hora de tu <span class="text-primary">Individual Cooking Experience</span>, los ingredientes y los libros de recetas...
                            </p>
                            <p>
                                ¡Nosotros hacemos el resto! Nuestro AMC llevará el horno a tu local y cocinará contigo. ¡Ponnos a prueba!
                            </p>
                            <img src="" alt="">
                        </div>
                        <div class="col-md-4">
                            <h3 class="hiper-strong">
                                Tú <span>eliges</span> el menú
                            </h3>
                            <p>
                                ¡Cocina como lo haces cada día! Te guiaremos mientras pruebas nuestra tecnología y te ayudaremos a conseguir el resultado de cocción perfecto.
                            </p>
                            <p>
                                Decide qué recetas y métodos de cocción quieres probar en función de tus necesidades.
                            </p>
                        </div>
                        <div class="col-md-4">
                            <h3 class="hiper-strong">
                                Prueba <span>Gratis</span> el Horno
                            </h3>
                            <p>
                                Ponte en contacto con un asesor Equipar para mas información:
                                <a>WHATS</a>
                                <a>Email</a>
                            </p>
                        </div>
                    </div>
                </div>
            </section>

            <section class="container-fluid bg-slate py-5 mb-5">
                <span class="h2 d-block text-center mb-3">Elige el tipo de horno que más te convenga.</span>
                <div class="row justify-content-center">
                    <div class="col-md-3 text-center mb-3">
                        <div class="wrap-card">
                            <div class="iconera">
                                <i class="bi bi-plug-fill" data-bs-toggle="tooltip" title="Eléctrico"></i>
                            </div>
                            <img width="175" height="211" class="img-fluid mb-3" src="{{ asset('v2/images/unox/featured/horno-electrico-profesional.webp') }}" alt="Horno eléctrico profesional">
                            <h3 class="mb-3">Hornos eléctricos profesionales</h3>
                            <a class="btn btn-primary mb-3" href="{{ route('brands-subcategories', ['unox', 'coccion', 'hornos']) }}">Ver productos</a>
                        </div>
                    </div>
                    <div class="col-md-3 text-center mb-3">
                        <div class="wrap-card">
                            <div class="iconera">
                                <i class="bi bi-fire" data-bs-toggle="tooltip" title="Gas"></i>
                            </div>
                            <img width="175" height="211" class="img-fluid mb-3" src="{{ asset('v2/images/unox/featured/horno-profesional-de-gas.webp') }}" alt="Hornos profesional de gas">
                            <h3 class="mb-3">Hornos profesionales de gas</h3>
                            <a class="btn btn-primary mb-3" href="{{ route('brands-subcategories', ['unox', 'coccion', 'hornos']) }}">Ver productos</a>
                        </div>
                    </div>
                    <div class="col-md-3 text-center mb-3">
                        <div class="wrap-card">
                            <div class="iconera">
                                <i class="bi bi-plug-fill" data-bs-toggle="tooltip" title="Eléctrico"></i>
                                <i class="bi bi-fire" data-bs-toggle="tooltip" title="Gas"></i>
                            </div>
                            <img width="175" height="211" class="img-fluid mb-3" src="{{ asset('v2/images/unox/featured/horno-mixto-profesional.webp') }}" alt="Hornos mixto profesional">
                            <h3 class="mb-3">Hornos mixtos profesionales</h3>
                            <a class="btn btn-primary mb-3" href="{{ route('brands-subcategories', ['unox', 'coccion', 'hornos']) }}">Ver productos</a>
                        </div>
                    </div>
                    <div class="col-md-3 text-center mb-3">
                        <div class="wrap-card">
                            <div class="iconera">
                                <i class="bi bi-plug-fill" data-bs-toggle="tooltip" title="Eléctrico"></i>
                            </div>
                            <img width="175" height="211" class="img-fluid mb-3" src="{{ asset('v2/images/unox/featured/horno-rapido-profesional.webp') }}" alt="Hornos rápido profesional">
                            <h3 class="mb-3">Hornos rápidos profesionales</h3>
                            <a class="btn btn-primary mb-3" href="{{ route('brands-subcategories', ['unox', 'coccion', 'hornos']) }}">Ver productos</a>
                        </div>
                    </div>
                    <div class="col-md-3 text-center mb-3">
                        <div class="wrap-card">
                            <div class="iconera">
                                <i class="bi bi-plug-fill" data-bs-toggle="tooltip" title="Eléctrico"></i>
                            </div>
                            <img width="175" height="211" class="img-fluid mb-3" src="{{ asset('v2/images/unox/featured/horno-de-conveccion-profesional-con-humedad.webp') }}" alt="Horno de convección profesional con humedad">
                            <h3 class="mb-3">Hornos de convección profesional con humedad</h3>
                            <a class="btn btn-primary mb-3" href="{{ route('brands-subcategories', ['unox', 'coccion', 'hornos']) }}">Ver productos</a>
                        </div>
                    </div>
                    <div class="col-md-3 text-center mb-3">
                        <div class="wrap-card">
                            <div class="iconera">
                                <i class="bi bi-plug-fill" data-bs-toggle="tooltip" title="Eléctrico"></i>
                            </div>
                            <img width="175" height="211" class="img-fluid mb-3" src="{{ asset('v2/images/unox/featured/horno-de-conveccion-profesional.webp') }}" alt="Hornos de convección profesional">
                            <h3 class="mb-3">Hornos de convección profesional</h3>
                            <a class="btn btn-primary mb-3" href="{{ route('brands-subcategories', ['unox', 'coccion', 'hornos']) }}">Ver productos</a>
                        </div>
                    </div>
                    <div class="col-md-3 text-center mb-3">
                        <div class="wrap-card">
                            <div class="iconera">
                                <i class="bi bi-plug-fill" data-bs-toggle="tooltip" title="Eléctrico"></i>
                            </div>
                            <img width="175" height="211" class="img-fluid mb-3" src="{{ asset('v2/images/unox/featured/metodos-de-conservacion-por-calor.webp') }}" alt="Métodos de conservación por calor">
                            <h3 class="mb-3">Métodos de conservación por calor</h3>
                            <a class="btn btn-primary mb-3" href="{{ route('brands-subcategories', ['unox', 'coccion', 'hornos']) }}">Ver productos</a>
                        </div>
                    </div>
                </div>
            </section>

            <section class="container mb-5">
                <h3>UNOX&reg; Te ofrece mucho más que un horno profesional</h3>
                <div class="row">
                    <div class="col-md-4 mb-2">
                        <div class="wrap-card dark">
                            <picture>
                                <img class="img-fluid" src="{{ asset('v2/images/unox/more/digital-id-2.webp') }}" alt="Digital.ID">
                            </picture>
                            <span class="text">
                                Sistema operativo y aplicación<br>
                                Digital.ID&trade; El futuro es ahora.
                            </span>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="row">
                            <div class="col-md-6 mb-2">
                                <div class="wrap-card dark">
                                    <picture>
                                        <img class="img-fluid" src="{{ asset('v2/images/unox/more/speed-x1-4.webp') }}" alt="Speed-x">
                                    </picture>
                                    <span class="text">
                                        Speed-X&trade;<br>
                                        Creado para que no renuncies a nada.
                                    </span>
                                </div>
                            </div>
                            <div class="col-md-6 mb-2">
                                <div class="wrap-card dark">
                                    <picture>
                                        <img class="img-fluid" src="{{ asset('v2/images/unox/more/evereo-2.webp') }}" alt="Evereo">
                                    </picture>
                                    <span class="text">
                                        Evereo&trade;<br>
                                        El primer y único refrigerador caliente.
                                    </span>
                                </div>
                            </div>
                            <div class="col-md-6 mb-2">
                                <div class="wrap-card dark">
                                    <picture>
                                        <img class="img-fluid" src="{{ asset('v2/images/unox/more/cheftop-mind-maps-3.webp') }}" alt="Cheftop Mind.Maps&trade; Plus">
                                    </picture>
                                    <span class="text">
                                        Cheftop Mind.Maps&trade; Plus<br>
                                        Hornos inteligentes para profesionales del sector.
                                    </span>
                                </div>
                            </div>
                            <div class="col-md-6 mb-2">
                                <div class="wrap-card dark">
                                    <picture>
                                        <img class="img-fluid" src="{{ asset('v2/images/unox/more/x-generation-2.webp') }}" alt="X-Generation">
                                    </picture>
                                    <span class="text">
                                        X-Generation<br>
                                        Los hornos más inteligentes de siempre.
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <section class="container">
                <h4 class="mb-2">Equipar Siempre tiene algo más para ti</h4>
                <p class="text-center mb-4">Encuentra más productos UNOX&reg; en las siguientes categorías</p>

                <div class="row justify-content-center">
                    @foreach($featured AS $category)
                        <div class="col-md-3 d-flex justify-content-center mb-4">
                            @include('frontend_v2.partials.product-category-view', [
                                    'position'  => str_pad($loop -> index + 1, 2, '0', STR_PAD_LEFT)
                                ,   'title'     => $category -> title
                                ,   'route'     => route('brands-categories', ['unox', $category -> slug])
                                ,   'image'     => url("storage/productos-categorias/{$category -> image_rx}")
                            ])
                        </div>
                    @endforeach
                </div>
            </section>
        </main>
    </div>
@endsection

@push('customJs')
    <script src="{{ asset('v2/js/unox-swiper.js') }}" type="module"></script>
@endpush