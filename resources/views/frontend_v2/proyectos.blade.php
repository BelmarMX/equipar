@section('title', 'Proyectos')
@section('description', '')
@section('image', '')
@extends('frontend_v2.master.app')

@section('content')
    <section id="partial__servicios" class="container-fluid mb-5 d-none d-md-block">
        @include('frontend_v2.partials.servicios')
    </section>

    @include('frontend_v2.partials.services-links', ['nth_active' => 1])

    <main class="container">
        <div class="row">
            <div class="col-md-12 text-center mb-5">
                <p class="text-center col-md-5 mx-auto">
                    Aseguramos la <strong>eficiencia de tu cocina con servicio profesional y personalizado</strong> a través de la experiencia, excelentes tiempos de respuesta y talento de nuestros colaboradores.
                </p>

                <img width="890"
                     height="300"
                     class="img-fluid"
                     src="{{ asset('v2/images/layout/sinergia-equipar.png') }}"
                     alt="Sinergia Equipar"
                >
            </div>

            <div class="col-md-6 mb-4 service__container">
                <div class="service__container--img">
                    <img width="661"
                         height="270"
                         class="img-fluid"
                         src="{{ asset('v2/images/layout/proyectos_layout.png') }}"
                         alt="Layout"
                    >
                </div>
                <h2>Layout</h2>
                <p>Elaboramos tu plano de distribución de equipos de cada área en formato DWG de acuerdo a los siguientes lineamientos:</p>
                <ul>
                    <li>Tiempos y movimientos</li>
                    <li>Análisis de flujo</li>
                    <li>Optimización de espacios</li>
                    <li>Capacidad instalada</li>
                    <li>Contaminación cruzada</li>
                    <li>Certificaciones
                    <li>Tiempos de servicio</li>
                    <li>Tráfico y número de comensales</li>
                    <li>Seguridad Operativa</li>
                    <li>Manejo sanitario de alimentos</li>
                    <li>Oferta de menú</li>
                </ul>
            </div>

            <div class="col-md-6 mb-4 service__container">
                <div class="service__container--img">
                    <img width="661"
                         height="270"
                         class="img-fluid"
                         src="{{ asset('v2/images/layout/proyectos_guia-mecanica.png') }}"
                         alt="Guía mecánica"
                    >
                </div>
                <h2>Guía mecánica</h2>
                <p>Se realiza un plano con las tomas o acometidas necesarias para la correcta instalación y operación de cada uno de los equipos:</p>
                <ul>
                    <li>Eléctricas</li>
                    <li>Agua</li>
                    <li>Drenajes</li>
                    <li>Gas lp o natural</li>
                    <li>Trayectorias, alturas y distancias</li>
                    <li>Diagramas, dibujos de elevaciones</li>
                    <li>Manuales de instalación</li>
                </ul>
            </div>

            <div class="col-md-6 mb-4 service__container">
                <div class="service__container--img">
                    <img width="661"
                         height="270"
                         class="img-fluid"
                         src="{{ asset('v2/images/layout/proyectos_render.png') }}"
                         alt="Render"
                    >
                </div>
                <h2>Render</h2>
                <p>Anticipe su proyecto, ofrecemos Servicio de visualización en modelo 3D  "imagen realista" en base a su plano autorizado para aseguramiento de toma de decisiones.</p>
            </div>
            <div class="col-md-6 mb-4 service__container">
                <div class="service__container--img">
                    <img width="661"
                         height="270"
                         class="img-fluid"
                         src="{{ asset('v2/images/layout/proyectos_isometricos.png') }}"
                         alt="Isométricos"
                    >
                </div>
                <h2>Isométricos</h2>
                <p>Por que los detalles son importantes elaboramos dibujos describiendo: Dimensiones, tipo de acero, calibres, acabados, pulido, cortes, complementos etc. Para que La fabricación de sus muebles sean de acuerdo a lo proyectado.</p>
            </div>
        </div>

        <section id="index__marcas">
            <h2>Nuestras marcas</h2>
            @include('frontend_v2.partials.marcas')
        </section>
    </main>
@endsection