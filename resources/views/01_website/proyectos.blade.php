@extends('00_layouts.01_website.app')
@section('title',       $meta['titulo'])
@section('descripcion', $meta['descripcion'])
@section('imagen',      $meta['imagen'])

@section('Content')
    <div class="uk-container">
        <div class="uk-width-3-5@m">
            <div class="rounded-container bg-gray">
                <h1 class="uk-text-uppercase">Ponemos tu proyecto en marcha</h1>
            </div>
        </div>
    </div>
    <div class="uk-container uk-margin-large-bottom">
        <div uk-grid>
            <div class="uk-width-1-1" uk-scrollspy="cls:uk-animation-fade">
                <img width="1240" height="300" src="{{ asset('images/template/render-ejemplo.jpg') }}" alt="Render de ejemplo">
            </div>
            <div class="uk-width-1-2@m" uk-scrollspy="cls:uk-animation-fade">
                <ul class="projects">
                    <li>Equipos de cocción.</li>
                    <li>Refrigeración comercial e industrial.</li>
                    <li>Muebles en acero inoxidable.</li>
                    <li>Equipos de producción</li>
                    <li>Utensilios</li>
                </ul>
            </div>
            <div class="uk-width-1-2@m" uk-scrollspy="cls:uk-animation-fade">
                <p class="set-font-default ff-secondary-font light uk-text-justify">
                    Aseguramos la eficiencia de tu cocina con servicio profesional y personalizado a través de la experiencia, excelentes tiempos de respuesta y talento de nuestros colaboradores.
                </p>
            </div>
            <div class="uk-width-1-2@m uk-text-right" uk-scrollspy="cls:uk-animation-fade">
                <h2 class="uk-text-center orange ff-secondary-font light uk-text-uppercase">Comparte</h2>
                <img width="315" height="220" src="{{ asset('images/template/comparte-tu-idea.jpg') }}" alt="Comparte tu idea">
                <h2 class="uk-text-center orange ff-secondary-font light uk-text-uppercase">Recibe</h2>
                <img width="315" height="220" src="{{ asset('images/template/recibe-un-proyecto.jpg') }}" alt="Recibe un proyecto">
            </div>
            <div class="uk-width-1-2@m uk-text-left" uk-scrollspy="cls:uk-animation-fade">
                <img width="390" height="565" src="{{ asset('images/template/resultado-final.jpg') }}" alt="Resultado final">
            </div>
        </div>
    </div>
    <div class="uk-container">
        <div uk-grid>
            <div class="uk-width-1-2@m" uk-scrollspy="cls:uk-animation-fade">
                <div class="rounded-container bg-blue">
                    <h2>Layout</h2>
                </div>
                <p class="set-font-default ff-secondary-font light uk-text-justify">
                    Elaboramos	tu plano de distribución de equipos de cada área en formato  DWG de acuerdo a los siguientes li neamientos:
                </p>
                <ul class="set-font-default ff-secondary-font light uk-text-justify">
                    <li class="ff-secondary-font">Tiempos y movimientos</li>
                    <li class="ff-secondary-font">Análisis de flujo</li>
                    <li class="ff-secondary-font">Optimización de espacios</li>
                    <li class="ff-secondary-font">Capacidad instalada</li>
                    <li class="ff-secondary-font">Contaminación cruzada</li>
                    <li class="ff-secondary-font">Certificaciones</li>
                    <li class="ff-secondary-font">Tiempos de servicio</li>
                    <li class="ff-secondary-font">Trafico y número de comensales</li>
                    <li class="ff-secondary-font">Seguridad Operativa</li>
                    <li class="ff-secondary-font">Manejo sanitario de alimentos</li>
                    <li class="ff-secondary-font">Oferta de menú</li>
                </ul>
            </div>
            <div class="uk-width-1-2@m" uk-scrollspy="cls:uk-animation-fade">
                <img width="585" height="390" src="{{ asset('images/template/servicio-layout.jpg') }}" alt="Ejemplo layout">
            </div>

            <div class="uk-width-1-2@m" uk-scrollspy="cls:uk-animation-fade">
                <img width="585" height="390" src="{{ asset('images/template/servicio-guia-mecanica.jpg') }}" alt="Ejemplo guía mecánica">
            </div>
            <div class="uk-width-1-2@m" uk-scrollspy="cls:uk-animation-fade">
                <div class="rounded-container bg-green">
                    <h2>Guía mecánica</h2>
                </div>
                <p class="set-font-default ff-secondary-font light uk-text-justify">
                    Se realiza un plano con las tomas o acometidas ne cesarias para la correcta instalación y operación de cada uno de los equipos:
                </p>
                <ul class="set-font-default ff-secondary-font light uk-text-justify">
                    <li class="ff-secondary-font">Eléctricas</li>
                    <li class="ff-secondary-font">Agua</li>
                    <li class="ff-secondary-font">Drenajes</li>
                    <li class="ff-secondary-font">Gas lp o natural</li>
                    <li class="ff-secondary-font">Trayectorias, alturas y distancias</li>
                    <li class="ff-secondary-font">Diagramas, dibujos de	elevaciones</li>
                    <li class="ff-secondary-font">Manuales de instalación</li>
                </ul>
            </div>

            <div class="uk-width-1-2@m" uk-scrollspy="cls:uk-animation-fade">
                <div class="rounded-container bg-gray">
                    <h2>Render</h2>
                </div>
                <img width="585" height="190" src="{{ asset('images/template/servicio-render.jpg') }}" alt="Ejemplo render">
                <p class="set-font-default ff-secondary-font light uk-text-justify">
                    Anticipe su proyecto, ofrecemos Servicio de visualización en modelo 3D  "imagen realista" en base a su pla no autorizado para aseguramiento de toma de decisiones.
                </p>
            </div>
            <div class="uk-width-1-2@m" uk-scrollspy="cls:uk-animation-fade">
                <div class="rounded-container bg-orange">
                    <h2>Isométricos</h2>
                </div>
                <img width="585" height="190" src="{{ asset('images/template/servicio-isometrico.jpg') }}" alt="Ejemplo isométrico">
                <p class="set-font-default ff-secondary-font light uk-text-justify">
                    Por que los detalles son importan tes elaboramos dibujos describien do: Dimensiones, tipo de acero,  calibres, acabados, pulido, cortes, complementos etc. Para que La fabricación de sus muebles sean de  acuerdo a lo proyectado.
                </p>
            </div>
        </div>
    </div>
@endsection