<div id="banner__array" class="container-fluid mb-5">
    <div id="banner__slider" class="carousel slide"
         data-bs-ride="carousel"
         data-bs-touch="true"
         data-bs-interval="5500"
    >
        <div class="carousel-inner">
            <div class="carousel-item active">
                @include('frontend_v2.partials.banner-single', [
                        'slide'         => asset('v2/images/samples/banner.jpg')
                    ,   'slide_alt'     => 'Proyectos para personas'
                    ,   'summary'       => TRUE
                    ,   'title'         => 'Proyectos para <strong>Personas</strong>'
                    ,   'description'   => 'Aseguramos el correcto diseño y selección de equipo necesarios para la <strong>operación eficiente de su cocina</strong>'
                    ,   'cta'           => 'Ver Proyectos'
                    ,   'cta_href'      => route('proyectos')
                ])
            </div>
            <div class="carousel-item">
                @include('frontend_v2.partials.banner-single', [
                        'slide'         => asset('v2/images/samples/banner.jpg')
                    ,   'slide_alt'     => 'Proyectos para personas'
                    ,   'summary'       => FALSE
                ])
            </div>
            <div class="carousel-item">
                @include('frontend_v2.partials.banner-single', [
                        'slide'         => asset('v2/images/samples/banner.jpg')
                    ,   'slide_alt'     => 'Proyectos para personas'
                    ,   'summary'       => FALSE
                ])
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#banner__slider" data-bs-slide="prev">
            <i class="bi bi-arrow-left-circle" aria-hidden="true"></i>
            <span class="visually-hidden">Anterior</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#banner__slider" data-bs-slide="next">
            <i class="bi bi-arrow-right-circle" aria-hidden="true"></i>
            <span class="visually-hidden">Siguiente</span>
        </button>
    </div>
</div>
