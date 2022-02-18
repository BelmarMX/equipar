@section('title', 'Bienvenido')
@section('description', '')
@section('image', '')
@extends('frontend_v2.master.app')

@section('content')
    @include('frontend_v2.partials.banner-array')

    <main class="container">
        <section id="index__productos_destacados" class="mb-5">
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

        <section id="index__nosotros" class="mb-5">
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

        <section id="index__servicios" class="mb-5">
            @include('frontend_v2.partials.servicios')
        </section>

        <section id="index__hotspot" class="mb-5">
            <h2>Partes de una cocina industrial</h2>
            --
        </section>

        <section id="index__blog" class="mb-5">
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

        <section id="index__clientes" class="mb-5">
            <h2>Nuestro valiosos clientes</h2>
            <div id="index__clientes--slide" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner row">
                    <div class="carousel-item active">
                        <div class="row justify-content-center">
                            <a class="col text-center" href="#" target="_blank">
                                CLIENTE 1
                            </a>
                            <a class="col text-center" href="#" target="_blank">
                                CLIENTE 2
                            </a>
                            <a class="col text-center" href="#" target="_blank">
                                CLIENTE 3
                            </a>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="row justify-content-center">
                            <a class="col text-center" href="#" target="_blank">
                                CLIENTE 4
                            </a>
                            <a class="col text-center" href="#" target="_blank">
                                CLIENTE 5
                            </a>
                            <a class="col text-center" href="#" target="_blank">
                                CLIENTE 6
                            </a>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="row justify-content-center">
                            <a class="col text-center" href="#" target="_blank">
                                CLIENTE 7
                            </a>
                            <a class="col text-center" href="#" target="_blank">
                                CLIENTE 8
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section id="index__marcas" class="mb-5">
            <h2>Nuestras marcas</h2>
            @include('frontend_v2.partials.marcas')
        </section>
    </main>
@endsection