@section('title', $meta['titulo'])
@section('description', $meta['descripcion'])
@section('image', $meta['imagen'])
@extends('frontend_v2.master.app')

@section('content')
    <section id="partial__servicios" class="container-fluid mb-5 d-none d-md-block">
        @include('frontend_v2.partials.servicios')
    </section>

    @include('frontend_v2.partials.services-links', ['nth_active' => 2])

    <main class="container">
        <div class="row">
            <div class="col-md-12 text-center mb-5">
                <p class="text-center col-md-5 mx-auto">
                    Asesoramos en la <strong>selección correcta del equipo o producto que realmente necesitas</strong> para realizar tu inversión de acuerdo a un presupuesto definido.
                </p>
            </div>

            <div class="col-md-6 mb-4 service__container">
                <div class="service__container--img">
                    <img width="661"
                         height="270"
                         class="img-fluid"
                         src="{{ asset('v2/images/layout/servicios_planos.png') }}"
                         alt="Planos"
                    >
                </div>
                <h2>Planos</h2>
                <p>
                    Elaboración de planos de cocina, bloques y distribución de equipos de cada área según la especialidad y el número de comensales de su negocio. El profesionalismo y experiencia de nuestro grupo de colaboradores especializados en proyectos, asegurarán el mejor diseño de acuerdo a los lineamientos fundamentales establecidos por la industria gastronómica.
                </p>
                <p>
                    Asegure su Inversión, en repetidas ocasiones nos pasa que iniciamos un proyecto y por falta de planeación y visualización de la idea, terminamos haciendo un gasto fuera del presupuesto original, este servicio le aportara mayor seguridad en la ejecución de su proyecto.
                </p>
            </div>

            <div class="col-md-6 mb-4 service__container">
                <div class="service__container--img">
                    <img width="661"
                         height="270"
                         class="img-fluid"
                         src="{{ asset('v2/images/layout/servicios_instalacion.png') }}"
                         alt="Instalación de Equipos"
                    >
                </div>
                <h2>Instalación de Equipos</h2>
                <p>
                    Servicio de interconexión de equipos, muebles de acero inoxidable, equipos de refrigeración y cocción, Máquinas lavalozas, fabricadoras de hielo, equipos de producción y más; incluye: revisión y seguimiento a ejecución Correcta de guía mecánica, interconexión de equipo a acometida preparada según manual de la marca, materiales necesarios (Mangueras de gas, cespol, contra canastas, llaves mezcladoras, clavijas eléctricas, tornillería y herramientas) mano de obra certificada para el correcto funcionamiento de los equipos.
                </p>
                <p>
                    *La acometida o disparo la prepara obra civil.
                </p>
            </div>

            <div class="col-md-6 mb-4 service__container">
                <div class="service__container--img">
                    <img width="661"
                         height="270"
                         class="img-fluid"
                         src="{{ asset('v2/images/layout/servicios_mantenimiento-correctivo.png') }}"
                         alt="Mantenimiento Correctivo"
                    >
                </div>
                <h2>Mantenimiento Correctivo</h2>
                <p>
                    Servicio de evaluación y diagnóstico, posteriormente se presenta un reporte con el problema detectado y las acciones a realizar para corregir la falla, cambio de piezas o únicamente Mano de obra, servicio especializado por marcas o equipos.
                </p>
            </div>

            <div class="col-md-6 mb-4 service__container">
                <div class="service__container--img">
                    <img width="661"
                         height="270"
                         class="img-fluid"
                         src="{{ asset('v2/images/layout/servicios_mantenimiento-preventivo.png') }}"
                         alt="Mantenimiento Preventivo"
                    >
                </div>
                <h2>Mantenimiento Preventivo</h2>
                <p>
                    Realizamos Mantenimiento de equipos en la mayoría de marcas del mercado, cuide su inversión e incremente la vida útil de sus equipos otorgando de manera periódica su revisión general, cambio de partes desgastadas o calibración de los mismos, esto le aportará mayor eficiencia en la operación, detección anticipada de posibles fallas, menor consumo de energéticos, (Agua, luz, gas) y mayor seguridad al personal que operan la cocina previniendo accidentes dentro de la misma.
                </p>
                <p>
                    Ejemplo:
                </p>
                <ul>
                    <li>Verificación del sistema de encendidoRevisión de termostatos</li>
                    <li>Revisión de conexiones electrónicas.</li>
                    <li>Revisión de conexiones eléctricas, amperaje y voltaje</li>
                    <li>Verificación de quemadores</li>
                    <li>Verificación del funcionamiento de válvulas y perillas</li>
                    <li>Detección de fugas de gas en acometida y equipo</li>
                    <li>Ajuste y nivelación del equipo.</li>
                    <li>Limpieza general Aplicación de agentes químicos.</li>
                    <li>Comprobación del correcto funcionamiento. Limpieza de serpentín de condensador y evaporador. Revisión de presión de gas refrigerante, cargas.</li>
                </ul>
            </div>

            <div class="col-md-6 mb-4 service__container">
                <div class="service__container--img">
                    <img width="661"
                         height="270"
                         class="img-fluid"
                         src="{{ asset('v2/images/layout/servicios_diseno-acero.png') }}"
                         alt="Diseño de muebles de acero inoxidable"
                    >
                </div>
                <h2>Diseño de muebles de acero inoxidable</h2>
                <p>
                    Elaboración de diseños en isométrico según la idea de tu negocio, los muebles a medida con diseño especial son mucho más funcionales al fabricarse de acuerdo a cada necesidad de operación, espacio, materiales, calibres, refuerzos etc., sobre todo se convierte en un plus al ser una creación única.
                </p>
                <div class="text-center">
                    <a href="{{ route('diseno-acero') }}" class="btn btn-primary">
                        Conozca más
                    </a>
                </div>
            </div>

            <div class="col-md-6 mb-4 service__container">
                <div class="service__container--img">
                    <img width="661"
                         height="270"
                         class="img-fluid"
                         src="{{ asset('v2/images/layout/servicios_asesoria-equipos.png') }}"
                         alt="Planos"
                    >
                </div>
                <h2>Asesoría de equipos</h2>
                <p>
                    Asesoramos en la selección correcta del equipo o producto que realmente necesitas para
                    realizar tu inversión de acuerdo a un presupuesto definido.
                </p>
                <ul>
                    <li>Que el producto realmente funcione para lo que necesita.</li>
                    <li>Capacidad instalada.</li>
                    <li>Buena Reputación.</li>
                    <li>Relación Precio-Calidad.</li>
                    <li>Tiempo de entrega.</li>
                    <li>Certificaciones.
                    <li>Póliza de garantía.</li>
                    <li>Acceso a refacciones y soporte.</li>
                </ul>
            </div>
        </div>

        <section id="index__marcas">
            <h2>Nuestras marcas</h2>
            @include('frontend_v2.partials.marcas')
        </section>
    </main>
@endsection