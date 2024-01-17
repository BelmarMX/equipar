@section('title', $meta['titulo'])
@section('description', $meta['descripcion'])
@section('image', $meta['imagen'])
@extends('frontend_v2.master.app')

@push('customCss')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="{{ asset('v2/css/unox.css') }}">
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
            <section class="container py-5 mb-5">
                <div class="row">
                    <div class="col-md-6">
                        Productos Fotos
                    </div>
                    <div class="col-md-6">
                        <h2>Hornos Combinados Inteligentes</h2>
                        <p>
                            BAKERTOP MIND.Maps™ PLUS es el horno combinado inteligente para pastelería y panadería artesanal, fresca o congelada. Ciclos de cocción automáticos y funciones smart entre las que destaca la inteligencia artifical, que hace de BAKERTOP MIND.Maps™ PLUS el instrumento fundamental para tu obrador. Combinados con las fermentadoras LIEVOX te permiten crear una estación de cocción versátil y multifuncional.
                        </p>
                        <p>
                            Los hornos combinados MIND.Maps™ PLUS están disponibles en dos versiones para responder así a las exigencias específicas de cada negocio:
                        </p>
                        <p>
                            COUNTERTOP de 5 y 8 bandejas 660 x 460 para obradores artesanos;
                        </p>
                        <p>
                            BIG con carros de 16 bandejas 660 x 460 para grandes panaderías y pastelerías.
                        </p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3">
                        <div>
                            <small>UNOX INTELLIGENT PERFORMANCE</small>
                            Mejora tu rendimiento
                            <p>
                                Obtener resultados iguales en cada horneado exige control, inteligencia y experiencia: tres características de tu horno BAKERTOP MIND.Maps™ PLUS.
                            </p>
                        </div>
                        <div>
                            Adaptative Cooking
                        </div>
                        <div>
                            Climalux
                        </div>
                    </div>
                    <div class="col-md-6 text-center">
                        Imagen
                    </div>
                    <div class="col-md-3">
                        <div>
                            SMART.Preheating
                        </div>
                        <div>
                            AUTO.Soft
                        </div>
                        <div>
                            SENSE.Klean
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 text-end">
                        Descargar Catálogo PDF
                    </div>
                </div>
            </section>

            <section class="container py-5 mb-5">
                <div class="row">
                    <div class="col-md-6">
                        Ver Productos
                    </div>
                    <div class="col-md-6">
                        Ver Accesorios
                    </div>
                </div>
            </section>

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