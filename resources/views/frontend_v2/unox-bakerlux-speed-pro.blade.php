@section('title',       $meta['titulo'])
@section('description', $meta['descripcion'])
@section('image',       $meta['imagen'])
@extends('frontend_v2.master.app')

@push('customCss')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="{{ asset('v2/css/unox.css') }}">
@endpush

@section('content')
    <div class="bg-unox">
        <div class="container-fluid mb-5">
            @include('frontend_v2.partials.banner-landing', [
                    'slide'         => asset('v2/images/unox/bakerlux-speed-pro/bg-speed-pro.webp')
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
            <section class="container py-3 mb-1">
                <div class="row mb-5">
                    <div class="col-md-6 d-flex align-items-center justify-content-center">
                        <img class="img-fluid" src="{{ asset('v2/images/unox/bakerlux-speed-pro/speed-pro.webp') }}" alt="Bakerlux SPEED.Pro">
                    </div>
                    <div class="col-md-6">
                        <h2>Un corazón, dos almas.</h2>
                        <p>
                            SPEED.Pro™ es el primer baking speed oven: horno de convección y horno de cocción acelerada juntos en un único equipo. Mímino espacio, máximo rendimiento.
                        </p>
                    </div>

                    @include('frontend_v2.partials.unox-catalogo-download', ['doc' => 'bakerlux-speedpro'])
                </div>
            </section>

            <section class="bg-black mb-5 py-3">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6 text-center">
                            <img class="img-fluid" src="{{ asset('v2/images/unox/bakerlux-speed-pro/bg-burger.webp') }}" alt="Bakerlux SPEED.Pro">
                        </div>
                        <div class="col-md-6 d-flex align-items-center justify-content-center flex-column">
                            <span class="normal">Máxima velocidad</span>
                            <span class="big">Triple cocción</span>
                            <div>
                                <strong>1  CONVECCIÓN</strong> - Dorado externo<br><br>
                                <strong>2  MICROONDAS</strong> - Cocción interna<br><br>
                                <strong>3  CONDUCCIÓN</strong> - Dorado por contacto
                            </div>
                        </div>
                        <div class="col-12">
                            <img class="img-fluid" src="{{ asset('v2/images/unox/bakerlux-speed-pro/bg-2in1.webp') }}" alt="Bakerlux SPEED.Pro">
                        </div>
                    </div>
                </div>
            </section>

            <section class="container mb-5">
                <h3 class="speedpro">Modalidad <span class="bake">BAKE</span></h3>

                <div class="row">
                    <div class="col-md-6">
                        <img class="img-fluid" src="{{ asset('v2/images/unox/bakerlux-speed-pro/bg-modo-bake.webp') }}" alt="Bakerlux SPEED.Pro">
                    </div>
                    <div class="col-md-6 d-flex align-items-center justify-content-center flex-column">
                        <span class="medium">3 bandejas 460 x 330</span>
                        <p>
                            La amplia cámara de cocción con ventilador a doble velocidad es perfecta para dorar productos de horno. Conquista a tus clientes, diversifica tu oferta y aumenta tu rentabilidad.
                        </p>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-3 text-center">
                        <img class="img-fluid" style="max-width: 75px" src="{{ asset('v2/images/unox/bakerlux-speed-pro/ico-croissant.webp') }}" alt="Baker Mode Time"><br>
                        <strong>27 Croissants</strong>
                        <p>en 16 minutos</p>
                    </div>
                    <div class="col-md-3 text-center">
                        <img class="img-fluid" style="max-width: 75px" src="{{ asset('v2/images/unox/bakerlux-speed-pro/ico-strudel.webp') }}" alt="Baker Mode Time"><br>
                        <strong>27 Mini Strudels</strong>
                        <p>en 25 minutos</p>
                    </div>
                    <div class="col-md-3 text-center">
                        <img class="img-fluid" style="max-width: 75px" src="{{ asset('v2/images/unox/bakerlux-speed-pro/ico-pastel-danes.webp') }}" alt="Baker Mode Time"><br>
                        <strong>36 Pasteles Daneses</strong>
                        <p>en 20 minutos</p>
                    </div>
                    <div class="col-md-3 text-center">
                        <img class="img-fluid" style="max-width: 75px" src="{{ asset('v2/images/unox/bakerlux-speed-pro/ico-panecillo.webp') }}" alt="Baker Mode Time"><br>
                        <strong>45 Panecillos</strong>
                        <p>en 16 minutos</p>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6 d-flex align-items-center justify-content-center flex-column">
                        <span class="yellow-bake big">Cocciones a convección impecables</span>
                        <p>
                            La amplia cámara de cocción con ventilador a doble velocidad es perfecta para dorar productos de horno. Conquista a tus clientes, diversifica tu oferta y aumenta tu rentabilidad.
                        </p>
                    </div>
                    <div class="col-md-6">
                        <img class="img-fluid" src="{{ asset('v2/images/unox/bakerlux-speed-pro/bg-croissant.webp') }}" alt="Bakerlux SPEED.Pro">
                    </div>
                </div>

                <div class="bg-soft-gray py-3">
                    <div class="row">
                        <div class="col-md-4 text-center">
                            <strong>Capacidad</strong>
                            <p>3 bandejas 460 x 330</p>
                        </div>
                        <div class="col-md-4 text-center">
                            <strong>Potencia Convección</strong>
                            <p>3.2 kW</p>
                        </div>
                        <div class="col-md-4 text-center">
                            <strong>Velocidad Ventilador</strong>
                            <p>2750 / 1700 rpm</p>
                        </div>
                    </div>
                </div>
            </section>

            <div class="bg-black py-3">
                <section class="container">
                    <h3 class="speedpro">Modalidad <span class="speed">SPEED</span></h3>
                </section>
            </div>

            @include('frontend_v2.partials.unox-products-view', ['featured' => $featured])
            <hr>
            {{-- CATALOGOS --}}
            <section class="container py-5 mb-5">
                @include('frontend_v2.partials.unox-catalogos')
            </section>
        </main>
    </div>
@endsection

@push('customJs')
    <script src="{{ asset('v2/js/unox-swiper.js') }}" type="module"></script>
@endpush