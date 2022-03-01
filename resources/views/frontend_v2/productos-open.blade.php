@section('title', $meta['titulo'])
@section('description', $meta['descripcion'])
@section('image', $meta['imagen'])
@extends('frontend_v2.master.app')

@section('content')
    <main class="container-fluid mt-5 px-0">
        <div class="container">
            @include('frontend_v2.partials.scroll-categories', [
                   'tag_title'     => 'Subcategorías'
               ,   'todas_link'    => '/productos/refrigeracion'
               ,   'categories'    => [
                       ['Abatidores', '/productos/refrigeracion/abatidores']
                   ,   ['Baño María frío', ' /productos/refrigeracion/abatidores']
                   ,   ['Base refrigerada', ' /productos/refrigeracion/abatidores']
                   ,   ['Botelleros', ' /productos/refrigeracion/abatidores']
                   ,   ['Cong horizontales', ' /productos/refrigeracion/abatidores']
                   ,   ['Contra barras', ' /productos/refrigeracion/abatidores']
                   ,   ['Cortinas de aire', ' /productos/refrigeracion/abatidores']
                   ,   ['Dispensador de cerveza', ' /productos/refrigeracion/abatidores']
                   ,   ['Fabricadoras de hielo', ' /productos/refrigeracion/abatidores']
                   ,   ['Mesas de preparación', ' /productos/refrigeracion/abatidores']
                   ,   ['Mesas para trabajo', ' /productos/refrigeracion/abatidores']
                   ,   ['Refrigeradores y congeladores verticales', ' /productos/refrigeracion/abatidores']
                   ,   ['Topping refrigerado', ' /productos/refrigeracion/abatidores']
                   ,   ['Toppings', ' /productos/refrigeracion/abatidores']
                   ,   ['Vitrinas', ' /productos/refrigeracion/abatidores']
               ]
           ])
        </div>

        <section id="productos__main_product" class="mb-4">
            <div class="container">
                <div class="row justify-content-center align-items-center">
                    <div class="col-md-6 productos__main_product__slider">
                        <div id="productos__main_product_slider_container">
                            <div id="productos__main_product_slider" class="carousel slide"
                                 data-bs-ride="carousel"
                                 data-bs-touch="true"
                                 data-bs-interval="5500"
                            >
                                <div class="carousel-inner">
                                    <div class="carousel-item active">
                                        <img width=""
                                             height=""
                                             class="img-fluid"
                                             src="{{ url('storage/productos/vitrina-horizontal-vidrio-curvo-bhs-20-1623176766.jpg') }}"
                                             alt="Product Title">
                                    </div>
                                    <div class="carousel-item">
                                        <img width=""
                                             height=""
                                             class="img-fluid"
                                             src="{{ url('storage/productos/vitrina-horizontal-vidrio-curvo-bhs-20-1623176766.jpg') }}"
                                             alt="Product Title">
                                    </div>
                                    <div class="carousel-item">
                                        <img width=""
                                             height=""
                                             class="img-fluid"
                                             src="{{ url('storage/productos/vitrina-horizontal-vidrio-curvo-bhs-20-1623176766.jpg') }}"
                                             alt="Product Title">
                                    </div>
                                </div>
                                <button class="carousel-control-prev" type="button" data-bs-target="#productos__main_product_slider" data-bs-slide="prev">
                                    <i class="bi bi-arrow-left-circle" aria-hidden="true"></i>
                                    <span class="visually-hidden">Anterior</span>
                                </button>
                                <button class="carousel-control-next" type="button" data-bs-target="#productos__main_product_slider" data-bs-slide="next">
                                    <i class="bi bi-arrow-right-circle" aria-hidden="true"></i>
                                    <span class="visually-hidden">Siguiente</span>
                                </button>
                            </div>
                        </div>

                    </div>
                    <div class="col-md-6 py-5 ps-md-5">
                        <div class="productos__main_product--belongs-to mb-4">
                            <a href="">Estufas</a> / <a href="">Cocción</a>
                        </div>
                        <h1 class="productos__main_product--title">4 Fuegos Abiertos + Plancha 12" + Horno 36"</h1>
                        <p class="productos__main_product--summary">
                            Estufa con 4 quemadores, planza de 12" y horno.
                        </p>
                        <div class="productos__main_product--data mb-md-4">
                            <div class="row position-relative">
                                <div class="col-md-6 my-2">
                                    <span>Marca</span>
                                    <h2>Asber</h2>
                                </div>
                                <div class="col-md-6 my-2">
                                    <span>Modelo</span>
                                    <h2>AEMR-G12-B4-36</h2>
                                </div>
                            </div>
                        </div>
                        <div class="row productos__main_product__price">
                            <div class="col-md-6 mb-2">
                                <div class="productos__main_product__price--price">
                                    $51,952.88 <span class="productos__main_product__price--currency">MXN</span>
                                </div>
                            </div>
                            <div class="col-md-6 productos__main_product__price--quote">
                                <button aria-label="Agrega el producto al cotizador"
                                        data-bs-toggle="tooltip"
                                        title="Agregar al cotizador"
                                        class="btn btn-primary"
                                >
                                    <i class="bi bi-bag-plus-fill"></i> Agregar al cotizador
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section id="productos__technical-information" class="container mb-5">
            <div class="row">
                <div class="col-md-4">
                    <h3 class="text-start mb-3">Información técnica</h3>
                    <p>
                        Dimensiones
                        Frente: 0.914 m
                        Alto: 0.940 m
                        Fondo: 0.830 m
                    </p>
                </div>
                <div class="col-md-8">
                    <h3 class="text-start mb-3">Características</h3>
                    <p>
                        Características Generales:
                        Material: acero inoxidable austenítico, (no magnético), salvo respaldo.
                        Color: gris
                        Medidas: Frente: 91.5 cm, Fondo: 83 cm, Altura: 94 cm
                        Bandeja/Charola recoge-grasa inferior extraíble, Patas de tubo de acero de 6", provistas con  niveladores regulables. Ruedas de 4". Panel frontal porta-mandos totalmente desmontable para un fácil mantenimiento. Cantos sanitarios, completamente ergonómicos. Pilotos independientes para cada quemador. Válvulas reforzadas, certificadas CSA y ANSI. Manifolds en una sola pieza,  abocardados por temperatura.

                        Características Técnicas:
                        Parrilla Potentes quemadores “Abiertos" de última generación y de alta capacidad, 30.000 BTU/Hora cada uno, fabricados en hierro fundido, desmontables para facilitar la limpieza de sus orificios.
                        Parrillas superiores reforzadas, desmontables, fabricadas en hierro fundido, dotadas de pestañas  especiales para protección de los pilotos.
                        Plancha Potentes quemadores “Tipo U" de última generación y de alta capacidad, 24.000 BTU/Hora cada uno, colocados cada 12" para una óptima distribución del calor.
                        Canal recoge-grasa de 4".
                        Horno: Interior en acero inoxodable: piso, laterales, fondo, marco y contrapuerta.
                        Bisagras robustas y extraíbles.
                        Piloto para los quemadores.
                        Válvula pilostática de seguridad para piloto y para los quemadores, certificada CSA y ANSI.
                        Encendido de piloto por chispa.
                        Parrilla de alambrón cromada.
                        Gratinador: Parilla de alambrón cromada.
                    </p>
                </div>
            </div>
        </section>

        <section id="productos__relacionados" class="container mb-5">
            <h4>Productos relacionados</h4>
            <div class="row">
                <div class="col-md-3 d-flex justify-content-center mb-4">
                    @include('frontend_v2.partials.product-view', [
                            'id'        => 1
                        ,   'title'     => 'Vitrina Horizontal Vidrio Curvo'
                        ,   'model'     => 'BHS-20'
                        ,   'tag'       => 'Refrigeradores y congeladores verticales'
                        ,   'tag_link'  => 'productos/refrigeracion/refrigeradores-y-congeladores-verticales'
                        ,   'route'     => 'productos/refrigeracion/refrigeradores-y-congeladores-verticales/vitrina-horizontal-vidrio-curvo-bhs-20'
                        ,   'image'     => url('storage/productos/vitrina-horizontal-vidrio-curvo-bhs-20-1623176766-thumbnail.jpg')
                    ])
                </div>
                <div class="col-md-3 d-flex justify-content-center mb-4">
                    @include('frontend_v2.partials.product-view', [
                            'id'        => 1
                        ,   'title'     => 'Vitrina Horizontal Vidrio Curvo'
                        ,   'model'     => 'BHS-20'
                        ,   'tag'       => 'Refrigeradores y congeladores verticales'
                        ,   'tag_link'  => 'productos/refrigeracion/refrigeradores-y-congeladores-verticales'
                        ,   'route'     => 'productos/refrigeracion/refrigeradores-y-congeladores-verticales/vitrina-horizontal-vidrio-curvo-bhs-20'
                        ,   'image'     => url('storage/productos/vitrina-horizontal-vidrio-curvo-bhs-20-1623176766-thumbnail.jpg')
                    ])
                </div>
                <div class="col-md-3 d-flex justify-content-center mb-4">
                    @include('frontend_v2.partials.product-view', [
                            'id'        => 1
                        ,   'title'     => 'Vitrina Horizontal Vidrio Curvo'
                        ,   'model'     => 'BHS-20'
                        ,   'tag'       => 'Refrigeradores y congeladores verticales'
                        ,   'tag_link'  => NULL
                        ,   'route'     => 'productos/refrigeracion/refrigeradores-y-congeladores-verticales/vitrina-horizontal-vidrio-curvo-bhs-20'
                        ,   'image'     => url('storage/productos/vitrina-horizontal-vidrio-curvo-bhs-20-1623176766-thumbnail.jpg')
                    ])
                </div>
                <div class="col-md-3 d-flex justify-content-center mb-4">
                    @include('frontend_v2.partials.product-view', [
                            'id'        => 1
                        ,   'title'     => 'Vitrina Horizontal Vidrio Curvo'
                        ,   'model'     => 'BHS-20'
                        ,   'tag'       => 'Refrigeradores y congeladores verticales'
                        ,   'tag_link'  => NULL
                        ,   'route'     => 'productos/refrigeracion/refrigeradores-y-congeladores-verticales/vitrina-horizontal-vidrio-curvo-bhs-20'
                        ,   'image'     => url('storage/productos/vitrina-horizontal-vidrio-curvo-bhs-20-1623176766-thumbnail.jpg')
                    ])
                </div>
            </div>
        </section>
    </main>
@endsection