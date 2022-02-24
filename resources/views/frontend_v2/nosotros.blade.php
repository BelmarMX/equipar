@section('title', 'Acerca de Equi-Par')
@section('description', '')
@section('image', '')
@extends('frontend_v2.master.app')

@section('content')
    <main class="container mt-5 mb-5">

        <div class="row align-items-center">
            <div class="col-12">
                <h1 class="mb-3">Identidad</h1>
            </div>
            <div class="col-md-8 order-sm-2 order-md-1">
                <p>
                    Se crea en al ciudad de Guadalajara, Jalisco; como una compañía de servicios y equipos en el sector de cocinas industriales, la unión de tres personas: una de ellas con espíritu inversionista, dos con amplia experiencia en el ramo manifestando inquietud emprendedora para ejercer con libertad la toma de decisiones, ideas de innovación y desarrollo empresarial favorables para la industria de alimentos y bebidas.
                </p>
                <p>
                    El mercado demanda servicios expertos y eficientes con capacidad para cubrir necesidades derivadas de la creación de una nueva cocina; en tiempo competitivo, diseño eficaz, adaptación de presupuesto con verdadera capacidad instalada dan como resultado el nacimiento de esta empresa.
                </p>
            </div>
            <div class="col-md-4 text-center order-sm-1 order-sm-2">
                <img width="258" height="86" src="{{ asset('v2/images/layout/equipar-minimal-id.svg') }}" alt="Equi-par ID">
            </div>
        </div>
    </main>

    <section id="partial__servicios" class="container-fluid mb-5">
        @include('frontend_v2.partials.servicios')
    </section>

    <div class="container">
        <div class="row">
            <div class="col-md-4 mb-5">
                <h2 class="mb-3">Misión</h2>
                <p>
                    Somos una empresa con talento y pasión que aseguran el diseño y la selección correcta de los equipos necesarios para la eficiente operación de su cocina.
                </p>
            </div>
            <div class="col-md-4 mb-5">
                <h2 class="mb-3">Visión</h2>
                <p>
                    Ser una empresa reconocida por la calidad de sus servicios en el 50% del mercado gastronómico de Jalisco, Guanajuato y Querétaro.
                </p>
            </div>
            <div class="col-md-4 mb-5">
                <h2 class="mb-3">Valores</h2>
                <ul>
                    <li>Honestidad.</li>
                    <li>Constancia.</li>
                    <li>Confianza.</li>
                    <li>Calidad.</li>
                    <li>Trabajo en equipo.</li>
                    <li>Orientación al servicio.</li>
                </ul>
            </div>

            <div class="col-md-12">
                <div class="col-md-4 mx-auto mb-3">
                    <h2 class="mb-3">Cobertura</h2>
                    <p>
                        Atendemos al sector Hotelero, Restaurantero y de Comedores Industriales en la zona del Bajío: Jalisco, Guanajuato y Querétaro.
                    </p>
                </div>
                <div class="text-center">
                    <img width="824"
                         height="581"
                         class="img-fluid"
                         src="{{ asset('v2/images/layout/cobertura.png') }}"
                         alt="Mapa de Cobertura Equipar">
                </div>
            </div>
        </div>
    </div>
@endsection