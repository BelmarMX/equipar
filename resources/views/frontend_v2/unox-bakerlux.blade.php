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
                    'slide'         => asset('v2/images/unox/bakerlux/bg-bakerlux.webp')
                ,   'slide_alt'     => $meta['titulo']
                ,   'summary'       => TRUE
                ,   'logo_image'    => asset('v2/images/unox/unox.svg')
                ,   'logo_width'    => '50%'
                ,   'logo_height'   => '100%'
                ,   'title'         => "<strong>{$meta['titulo']}</strong>"
                ,   'h1'            => TRUE
                ,   'cta'           => route('results', ['termino' => 'bakerlux', 'filter' => 'y', 'brand' => 'UNOX'])
            ])
        </div>

        <main class="mt-5 mb-5">
            <section class="container py-3 mb-5">
                <div class="row mb-5">
                    <div class="col-md-6 d-flex align-items-center justify-content-center">
                        <img class="img-fluid" style="width: 48%" src="{{ asset('v2/images/unox/bakerlux/bakerlux-5.webp') }}" alt="Bakerlux5">
                        <img class="img-fluid" style="width: 48%" src="{{ asset('v2/images/unox/bakerlux/bakerlux-8.webp') }}" alt="Bakerlux8">
                    </div>
                    <div class="col-md-6">
                        <h2>La excelencia está servida</h2>
                        <p>
                            Los hornos <strong>BAKERLUX&trade; & LINEMISS&trade;</strong> están diseñados para profesionales que requieren de la más alta productividad en panadería y pastelería. La combinación perfecta de eficiencia y simplicidad. En menos de un metro cuadrado.
                        </p>
                        <p>
                            Es una excelencia que se reconoce al instante. Hecha con los mismos ingredientes que exigen tus clientes: calidad sin compromisos, elecciones innovadoras y atrevidas, eficiencia y fiabilidad comprobada y medible.
                        </p>
                        <p>
                            Invertir en innovaciones significa mirar siempre con nuevos ojos a los retos de todos los días: de la puesta en valor de cada gesto a la simplificación de procesos de producción completos. Para ti, esto significa máximo rendimiento, libertad, facilidad de uso y ahorro. Para Unox, eso es inventive simplification.
                        </p>
                    </div>

                    @include('frontend_v2.partials.unox-catalogo-download', ['doc' => 'bakerlux'])
                </div>

                <div class="row mb-5">
                    <div class="col-12 mb-4">
                        <p class="medium">
                            Los hornos analógos de convección con humedad compacta, ideales para panaderías y pastelerías.
                        </p>
                        <p>
                            Los mandos mecánicos son la combinación perfecta de rendimiento y simplicidad.
                        </p>
                    </div>
                    <div class="col-md-4">
                        <span class="big feature">AIR.Plus</span><br>
                        <strong>Uniformidad de horneado. Sin compromiso.</strong>
                        <img class="img-fluid d-block my-2 mx-auto" style="max-width: 85%" src="{{ asset('v2/images/unox/bakerlux/bg-air-plus.webp') }}" alt="AIR.Plus">
                        <p>
                            La tecnología AIR.Plus garantiza la perfecta distribución del aire y del calor en el interior de la cámara de cocción, garantizando uniformidad de horneado en todas las zonas de cada bandeja y en todas las bandejas. Gracias a AIR.Plus, al finalizar el horneado los alimentos tendrán una coloración externa homogénea, con una integridad y consistencia que harán que el producto sea apetecible aun después de varias horas.
                        </p>
                    </div>
                    <div class="col-md-4">
                        <span class="big feature">STEAM.Plus</span><br>
                        <strong>Humedad. Cada vez que la necesites.</strong>
                        <img class="img-fluid d-block my-2 mx-auto" style="max-width: 85%" src="{{ asset('v2/images/unox/bakerlux/bg-steam-plus.webp') }}" alt="STEAM.Plus">
                        <p>
                            La correcta cantidad de humedad en el proceso de horneado garantiza colores intensos, mejorando sabores y sin modificar la estructura. La introducción de humedad en la cámara en los primeros minutos del proceso de cocción de los productos fermentados favorece el desarrollo de la estructura interna y el dorado de la superficie externa del producto. La tecnología Unox STEAM.Plus permite la producción instantánea de humedad en la cámara de cocción a partir de una temperatura de 90 °C hasta los 260 °C consiguiendo los mejores resultados para cada producto.
                        </p>
                    </div>
                    <div class="col-md-4">
                        <span class="big feature">DRY.Plus</span><br>
                        <strong>Gusto y sabor. Maximizados.</strong>
                        <img class="img-fluid d-block my-2 mx-auto" style="max-width: 85%" src="{{ asset('v2/images/unox/bakerlux/bg-dry-plus.webp') }}" alt="DRY.Plus">
                        <p>
                            La presencia de humedad durante las fases finales de la cocción de los productos fermentados puede comprometer el logro del resultado deseado. La tecnología DRY.Plus expulsa la humedad de la cámara de cocción, tanto la emitida por los productos que se están cocinando como la generada por el sistema STEAM.Plus en una fase de cocción anterior. Con DRY.Plus el sabor del producto es maximizado, con una estructura interna seca y bien formada.
                        </p>
                    </div>
                </div>
            </section>


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