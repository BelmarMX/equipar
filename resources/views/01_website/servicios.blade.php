@extends('00_layouts.01_website.app')
@section('title',       $meta['titulo'])
@section('descripcion', $meta['descripcion'])
@section('imagen',      $meta['imagen'])
@section('CustomCss')
<style>
	.todos-flotan{
		float: left;
		margin-right: 5px;
	}
	p,
	ul.ff-secondary-font > li{
		font-size: 1.3rem;
		line-height: 170%;
	}
	p{
		line-height: 170% !important;
	}
	.mt-100{
		margin-top: 100px !important;
	}
	.mb-75{
		margin-bottom: 75px !important;
	}
</style>
@endsection

@section('Content')
	<div class="uk-container">
		<div class="uk-width-3-5@m">
			<div class="rounded-container bg-gray">
				<h1 class="uk-text-uppercase">Servicios</h1>
			</div>
		</div>
	</div>
	<div class="uk-container uk-margin-medium-top">
		<div class="uk-grid-large" uk-grid>
			<div class="uk-width-1-2@m">
				<div class="rounded-container bg-blue">
					<h2>Planos</h2>
				</div>
				<img width="585" height="250" src="{{ asset('images/template/services-2-planos.jpg') }}" alt="Servicio planos">
				<p class="set-font-default ff-secondary-font light uk-text-justify">
					<img width="54" height="54" src="{{ asset('images/template/ico-srv-manos.png') }}" alt="iconos" class="todos-flotan">
					Elaboración de planos de cocina, bloques y distribución de equipos de cada área según la especialidad y el número de comensales de su negocio. El profesionalismo y experiencia de  nuestro grupo de colaboradores especializados  en proyectos, aseguraran el mejor diseño de acuerdo a los lineamientos fundamentales  establecidos por la industria gastronómica.
				</p>
				<p class="set-font-default ff-secondary-font light uk-text-justify">
					Asegure su Inversión, en repetidas ocasiones nos pasa que iniciamos un proyecto y por falta de planeación y visualización de la idea, terminamos haciendo un gasto fuera del presupuesto original, este servicio le aportara mayor seguridad en la ejecución de su proyecto.
				</p>
			</div>
			<div class="uk-width-1-2@m">
				<div class="rounded-container bg-blue">
					<h2>Guías mecánicas</h2>
				</div>
				<img width="585" height="250" src="{{ asset('images/template/services-2-guia-mecanica.jpg') }}" alt="Servicio guías mecánicas">
				<p class="set-font-default ff-secondary-font light uk-text-justify">
					<img width="54" height="54" src="{{ asset('images/template/ico-srv-servicio.png') }}" alt="iconos" class="todos-flotan">
					Realización  de planos con cuadro de datos, simbología y especificaciones técnicas (Agua, Drenajes, Gas, Electricidad, diagramas, trayectorias, alturas, distancias, refuerzos, muros) necesarias para la correcta instalación y operación de su cocina.
				</p>
			</div>

			<div class="uk-width-1-1 mt-100">
				<div class="rounded-container bg-gray">
					<h2>Renderizado</h2>
				</div>
				<div style="background:#FFF;" class="uk-text-center">
					<img width="1070" height="250" src="{{ asset('images/template/services-2-renderizado.jpg') }}" alt="Servicio renderizado">
				</div>
				<p class="set-font-default ff-secondary-font light uk-text-justify">
					<img width="54" height="54" src="{{ asset('images/template/ico-srv-conversacion.png') }}" alt="iconos" class="todos-flotan">
					Anticipe su proyecto, ofrecemos Servicio de visualización en modelo 3D "imagen realista" con base en su plano autorizado para aseguramiento de toma de decisiones.
				</p>
			</div>

			<div class="uk-width-1-2@m">
				<div class="rounded-container bg-orange">
					<h2>Instalación de equipos</h2>
				</div>
				<img width="585" height="250" src="{{ asset('images/template/services-2-instalacion-equipos.jpg') }}" alt="Servicio instalación de equipos">
				<p class="set-font-default ff-secondary-font light uk-text-justify">
					<img width="54" height="54" src="{{ asset('images/template/ico-srv-manos.png') }}" alt="iconos" class="todos-flotan">
					Servicio de interconexión de equipos, muebles de acero inoxidable,  equipos de refrigeración y cocción, Maquinas lavalozas, fabricadoras de hielo, equipos de producción y mas… incluye, revisión y seguimiento a ejecución Correcta de guía mecánica, interconexión de equipo a acometida preparada según manual de la marca, materiales necesarios (Mangueras de gas, cespol, contra canastas, llaves mezcladoras, clavijas eléctricas, tornillería y herramientas) mano de obra certificada para el correcto funcionamiento de los equipos.<br>
					[La acometida o disparo la prepara obra civil] 
				</p>
			</div>
			<div class="uk-width-1-2@m">
				<div class="rounded-container bg-orange">
					<h2>Mantenimiento correctivo</h2>
				</div>
				<img width="585" height="250" src="{{ asset('images/template/services-2-mantenimiento-correctivo.jpg') }}" alt="Servicio mantenimiento correctivo">
				<p class="set-font-default ff-secondary-font light uk-text-justify">
					<img width="54" height="54" src="{{ asset('images/template/ico-srv-mantenimiento.png') }}" alt="iconos" class="todos-flotan">
					Servicio de evaluación y diagnostico, posteriormente se presenta un reporte con el problema detectado y las acciones a realizar para corregir la falla, cambio de piezas o únicamente Mano de obra, servicio especializado por marcas o equipos.
				</p>
			</div>
			<div class="uk-width-1-2@m">
				<div class="rounded-container bg-orange">
					<h2>Mantenimiento preventivo</h2>
				</div>
				<img width="585" height="250" src="{{ asset('images/template/services-2-mantenimiento-preventivo.jpg') }}" alt="Servicio mantenimiento preventivo">
				<p class="set-font-default ff-secondary-font light uk-text-justify">
					<img width="54" height="54" src="{{ asset('images/template/ico-srv-mantenimiento.png') }}" alt="iconos" class="todos-flotan">
					Realizamos Mantenimiento de equipos en la mayoría de marcas del mercado, cuide su inversión e incremente la vida útil de sus equipos otorgando de manera periódica su revisión general, cambio de partes degastadas o calibración de los mismos, esto le aportara mayor eficiencia en la operación, detección anticipada de posibles fallas, menor consumo de energéticos, (Agua, luz, gas) y mayor seguridad al personal que operan la cocina previniendo accidentes dentro de la misma
				</p>
				Ejemplo:
				<ul class="set-font-default ff-secondary-font light uk-text-justify">
					<li class="ff-secondary-font">Verificación del sistema de encendidoRevisión de termostatos</li>
					<li class="ff-secondary-font">Revisión de conexiones electrónicas.</li>
					<li class="ff-secondary-font">Revisión de conexiones eléctricas, amperaje y voltaje</li>
					<li class="ff-secondary-font">Verificación de quemadores</li>
					<li class="ff-secondary-font">Verificación del funcionamiento de válvulas y perillas</li>
					<li class="ff-secondary-font">Detección de fugas de gas en acometida y equipo</li>
					<li class="ff-secondary-font">Ajuste y nivelación del equipo.</li>
					<li class="ff-secondary-font">Limpieza general Aplicación de agentes químicos.</li>
					<li class="ff-secondary-font">Comprobación del correcto funcionamiento. Limpieza de serpentín de condensador y evaporador. Revisión de presión de gas refrigerante, cargas.</li>
				</ul>
			</div>

			<div class="uk-width-1-1 mt-100">
				<div class="rounded-container bg-orange">
					<h2>Asesoría de equipos</h2>
				</div>
				<div style="background:#FFF;" class="uk-text-center">
					<img width="1070" height="250" src="{{ asset('images/template/services-2-asesoria-equipos.jpg') }}" alt="Servicio asesoría de equipos">
				</div>
				<div uk-grid class="uk-margin-small">
					<div class="uk-width-1-2@m">
						<p class="set-font-default ff-secondary-font light uk-text-justify">
							<img width="54" height="54" src="{{ asset('images/template/ico-srv-conversacion.png') }}" alt="iconos" class="todos-flotan">
							Asesoramos en la selección correcta del equipo o producto que realmente necesitas para realizar tu inversión  de acuerdo a un presupuesto definido. 
						</p>
					</div>
					<div class="uk-width-1-2@m">
						<ul class="set-font-default ff-secondary-font light uk-text-justify">
							<li class="ff-secondary-font">Que el producto realmente funcione para lo que necesita.</li>
							<li class="ff-secondary-font">Capacidad instalada.</li>
							<li class="ff-secondary-font">Buena Reputación.</li>
							<li class="ff-secondary-font">Relación Precio-Calidad.</li>
							<li class="ff-secondary-font">Tiempo de entrega.</li>
							<li class="ff-secondary-font">Certificaciones.</li>
							<li class="ff-secondary-font">Póliza de garantía.</li>
							<li class="ff-secondary-font">Acceso a refacciones y soporte.</li>
						</ul>
					</div>
				</div>
				<div class="uk-child-width-1-6@m uk-grid-small lasMarcas" uk-grid>
					<a href="http://www.asber.com.mx/" target="_blank" uk-tooltip="Asber">
						<div>
							<img width="100" height="25" src="{{ asset('images/template/brands/asber.png') }}" alt="Asber">
						</div>
					</a>
					<a href="https://globefoodequip.com/" target="_blank" uk-tooltip="Globe">
						<div>
							<img width="100" height="25" src="{{ asset('images/template/brands/globe.png') }}" alt="Globe">
						</div>
					</a>
					<a href="https://www.metro.com/" target="_blank" uk-tooltip="Metro">
						<div>
							<img width="100" height="25" src="{{ asset('images/template/brands/metro.png') }}" alt="Metro">
						</div>
					</a>
					<a href="https://www.cambro.com/" target="_blank" uk-tooltip="Cambro">
						<div>
							<img width="100" height="25" src="{{ asset('images/template/brands/cambro.png') }}" alt="Cambro">
						</div>
					</a>
					<a href="http://www.rubbermaid.com/" target="_blank" uk-tooltip="Rubbermaid">
						<div>
							<img width="100" height="25" src="{{ asset('images/template/brands/rubbermaid.png') }}" alt="Rubbermaid">
						</div>
					</a>
					<a href="https://www.infrico.es/" target="_blank" uk-tooltip="Infrico">
						<div>
							<img width="100" height="25" src="{{ asset('images/template/brands/infrico.png') }}" alt="Infrico">
						</div>
					</a>
					<a href="https://www.iceomatic.com/" target="_blank" uk-tooltip="Ice-o-matic">
						<div>
							<img width="100" height="25" src="{{ asset('images/template/brands/ice-o-matic.png') }}" alt="Ice-o-matic">
						</div>
					</a>
					<a href="http://www.menumaster.com.mx/" target="_blank" uk-tooltip="Menumaster">
						<div>
							<img width="100" height="25" src="{{ asset('images/template/brands/menumaster.png') }}" alt="Menumaster">
						</div>
					</a>
					<a href="https://www.rational-online.com/es_mx/home/" target="_blank" uk-tooltip="Rational">
						<div>
							<img width="100" height="25" src="{{ asset('images/template/brands/rational.png') }}" alt="Rational">
						</div>
					</a>
					<a href="https://www.waringcommercialproducts.com/" target="_blank" uk-tooltip="Waring">
						<div>
							<img width="100" height="25" src="{{ asset('images/template/brands/waring.png') }}" alt="Waring">
						</div>
					</a>
					<a href="http://www.migsacv.com.mx/" target="_blank" uk-tooltip="Migsa">
						<div>
							<img width="100" height="25" src="{{ asset('images/template/brands/migsa.png') }}" alt="Migsa">
						</div>
					</a>
					<a href="http://www.intertecnica.com.mx/" target="_blank" uk-tooltip="Intertecnica">
						<div>
							<img width="100" height="25" src="{{ asset('images/template/brands/intertecnica.png') }}" alt="Intertecnica">
						</div>
					</a>
					<a href="https://nemcofoodequip.com/" target="_blank" uk-tooltip="Nemco">
						<div>
							<img width="100" height="25" src="{{ asset('images/template/brands/nemco.png') }}" alt="Nemco">
						</div>
					</a>
					<a href="http://www.torrey.net/" target="_blank" uk-tooltip="Torrey">
						<div>
							<img width="100" height="25" src="{{ asset('images/template/brands/torrey.png') }}" alt="Torrey">
						</div>
					</a>
					<a href="https://www.pitco.com/" target="_blank" uk-tooltip="Pitco">
						<div>
							<img width="100" height="25" src="{{ asset('images/template/brands/pitco.png') }}" alt="Pitco">
						</div>
					</a>
					<a href="https://vollrath.com/" target="_blank" uk-tooltip="Vollrath">
						<div>
							<img width="100" height="25" src="{{ asset('images/template/brands/vollrath.png') }}" alt="Vollrath">
						</div>
					</a>
					<a href="http://www.edenox.es/Inicio.aspx" target="_blank" uk-tooltip="Edenox">
						<div>
							<img width="100" height="25" src="{{ asset('images/template/brands/edenox.png') }}" alt="Edenox">
						</div>
					</a>
					<a href="https://www.vulcanequipment.com/" target="_blank" uk-tooltip="Vulcan">
						<div>
							<img width="100" height="25" src="{{ asset('images/template/brands/vulcan.png') }}" alt="Vulcan">
						</div>
					</a>
					<a href="https://www.tsbrass.com/" target="_blank" uk-tooltip="T&S">
						<div>
							<img width="100" height="25" src="{{ asset('images/template/brands/t&s.png') }}" alt="T&S">
						</div>
					</a>
					<a href="https://www.vitamix.com/mx/es_mx/Commercial" target="_blank" uk-tooltip="Vitamix">
						<div>
							<img width="100" height="25" src="{{ asset('images/template/brands/vitamix.png') }}" alt="Vitamix">
						</div>
					</a>
					<a href="https://concasse.mx/" target="_blank" uk-tooltip="Concassé">
						<div>
							<img width="100" height="25" src="{{ asset('images/template/brands/concasse.png') }}" alt="Concassé">
						</div>
					</a>
					<a href="http://www.wincous.com/product-category/kitchen/kitchen-utensils/" target="_blank" uk-tooltip="Winco">
						<div>
							<img width="100" height="25" src="{{ asset('images/template/brands/winco.png') }}" alt="Winco">
						</div>
					</a>
					<a href="https://www.fisher-mfg.com/home" target="_blank" uk-tooltip="Fischer Manufacturing">
						<div>
							<img width="100" height="25" src="{{ asset('images/template/brands/fischer.png') }}" alt="Fischer Manufacturing">
						</div>
					</a>
					<a href="https://imberafoodservice.com/" target="_blank" uk-tooltip="Imbera">
						<div>
							<img width="100" height="25" src="{{ asset('images/template/brands/imbera.png') }}" alt="Imbera">
						</div>
					</a>
					<a href="https://www.hatcocorp.com/en" target="_blank" uk-tooltip="Hatco">
						<div>
							<img width="100" height="25" src="{{ asset('images/template/brands/hatco.png') }}" alt="Hatco">
						</div>
					</a>
					<a href="http://imperialrange.com/" target="_blank" uk-tooltip="Imperial range">
						<div>
							<img width="100" height="25" src="{{ asset('images/template/brands/imperial-range.png') }}" alt="Imperial range">
						</div>
					</a>
					<a href="https://americanrange.com/" target="_blank" uk-tooltip="American range">
						<div>
							<img width="100" height="25" src="{{ asset('images/template/brands/american-range.png') }}" alt="American range">
						</div>
					</a>
					<a href="https://www.ecomaxbyhobart.com/" target="_blank" uk-tooltip="Ecomax">
						<div>
							<img width="100" height="25" src="{{ asset('images/template/brands/ecomax.png') }}" alt="Ecomax">
						</div>
					</a>
				</div>
			</div>

			<div class="uk-width-1-2@m mt-100">
				<div class="rounded-container bg-green">
					<h2>Diseño de muebles en acero inoxidable</h2>
				</div>
				<img width="585" height="250" src="{{ asset('images/template/services-2-diseno-muebles.jpg') }}" alt="Servicio diseño de muebles en acero inoxidable">
				<p class="set-font-default ff-secondary-font light uk-text-justify">
					<img width="54" height="54" src="{{ asset('images/template/ico-srv-design.png') }}" alt="iconos" class="todos-flotan">
					Elaboración de diseños en isométrico según la idea de tu negocio, los muebles a medida con diseño especial son mucho más funcionales al fabricarse de acuerdo a cada necesidad de operación, espacio, materiales, calibres, refuerzos etc., sobre todo se convierte en un plus al ser una creación única.
				</p>
			</div>
		</div>
	</div>
@endsection