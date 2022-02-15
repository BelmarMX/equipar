@section('title', 'Bienvenido')
@section('description', '')
@section('image', '')
@extends('frontend_v2.master.app')

@section('content')
    @include('frontend_v2.partials.banner-array')

    <main class="container">
        <section id="index__productos_destacados">
            <h2>Productos destacados</h2>
            <div class="row">
                <div class="col-md-3">
                    @include('frontend_v2.partials.product-view')
                </div>
                <div class="col-md-3">
                    @include('frontend_v2.partials.product-view')
                </div>
                <div class="col-md-3">
                    @include('frontend_v2.partials.product-view')
                </div>
                <div class="col-md-3">
                    @include('frontend_v2.partials.product-view')
                </div>
            </div>
            <a href="" class="btn btn-primary">
                Ir a productos
            </a>
        </section>

        <section id="index__nosotros">
            <div class="row">
                <div class="col-md-6">
                    Acerca de Equi-Par
                    <p>
                        Aseguramos la eficiencia de tu cocina, con servicio profesional y personalizado a través de la experiencia, tiempos de respuesta y talento de nuestros colaboradores.
                    </p>
                    <a href="" class="btn btn-primary">
                        Conócenos
                    </a>
                </div>
                <div class="col-md-6">
                    Viyeyo
                </div>
            </div>

            <div class="row">
                <div class="col-md-4 d-flex align-items-center justify-content-start">
                    <div>
                        Icon
                    </div>
                    <div>
                        <strong>Más de 19 años de experiencia</strong>
                        <p>
                            Calidad de servicio.<br>
                            Atractivos tiempos de respuesta.<br>
                            Adaptación de presupuestos.
                        </p>
                    </div>
                </div>
                <div class="col-md-4 d-flex align-items-center justify-content-start">
                    <div>
                        Icon
                    </div>
                    <div>
                        <strong>Asesores profesionales para el sector gastronómico</strong>
                        <p>
                            Restaurantes, Hoteles, Comedores de empleados, Carnicerías, Reposterías, Bares, Fast food, Empacadoras y más.
                        </p>
                    </div>
                </div>
                <div class="col-md-4 d-flex align-items-center justify-content-start">
                    <div>
                        Icon
                    </div>
                    <div>
                        <strong>Expertos en soluciones integrales</strong>
                        <p>
                            Asesoría, Diseño, Equipamiento, Fabricación, Instalación y Capacitación.
                        </p>
                    </div>
                </div>
            </div>
        </section>

        <section id="index__servicios">
            @include('frontend_v2.partials.servicios')
        </section>

        <section id="index__hotspot">
            <h2>Partes de una cocina industrial</h2>
            --
        </section>

        <section id="index__blog">
            <h2>Últimas entradas del blog</h2>
            <div class="row">
                <div class="col-md-4">
                    <a href="">
                        <div>
                            <img src="" alt="">
                            <span>18</span>
                            <span>DIC</span>
                        </div>
                        <h3>10 ventajas de tener un comedor industrial en tu empresa</h3>
                    </a>
                    <a href="#">Comedor Industrial</a>
                    <p>
                        10 ventajas de tener un comedor industrial en tu empresa...
                    </p>
                </div>
                <div class="col-md-4">
                    <a href="">
                        <div>
                            <img src="" alt="">
                            <span>18</span>
                            <span>DIC</span>
                        </div>
                        <h3>10 ventajas de tener un comedor industrial en tu empresa</h3>
                    </a>
                    <a href="#">Comedor Industrial</a>
                    <p>
                        10 ventajas de tener un comedor industrial en tu empresa...
                    </p>
                </div>
                <div class="col-md-4">
                    <a href="">
                        <div>
                            <img src="" alt="">
                            <span>18</span>
                            <span>DIC</span>
                        </div>
                        <h3>10 ventajas de tener un comedor industrial en tu empresa</h3>
                    </a>
                    <a href="#">Comedor Industrial</a>
                    <p>
                        10 ventajas de tener un comedor industrial en tu empresa...
                    </p>
                </div>
            </div>
        </section>

        <section id="index__clientes">
            -- Nuestros valiosos clientes
        </section>

        <section id="index__marcas">
            @include('frontend_v2.partials.marcas')
        </section>
    </main>
@endsection