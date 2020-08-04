@extends('00_layouts.01_website.app')
@section('title',       $meta['titulo'])
@section('descripcion', $meta['descripcion'])
@section('imagen',      $meta['imagen'])

@section('Content')
	<div class="container-fluid uk-margin-remove bg-gray uk-padding-small">
		<div class="uk-container" uk-scrollspy="cls:uk-animation-fade">
			<div uk-grid class="uk-grid-collapse uk-text-center">
				<div class="uk-width-1-6@m uk-width-1-3">
					<a href="{{ route('servicios') }}">
						<img src="{{ asset('/images/template/icon-asesoria.png') }}" class="img-responsive" width="130" height="140" alt="Asesoría">
					</a>
				</div>
				<div class="uk-width-1-6@m uk-width-1-3">
					<a href="{{ route('proyectos') }}">
						<img src="{{ asset('/images/template/icon-diseno.png') }}" class="img-responsive" width="130" height="140" alt="Diseño">
					</a>
				</div>
				<div class="uk-width-1-6@m uk-width-1-3">
					<a href="{{ route('productos') }}">
						<img src="{{ asset('/images/template/icon-equipos.png') }}" class="img-responsive" width="130" height="140" alt="Equipos">
					</a>
				</div>
				<div class="uk-width-1-6@m uk-width-1-3">
					<a href="{{ route('proyectos') }}">
						<img src="{{ asset('/images/template/icon-fabricacion.png') }}" class="img-responsive" width="130" height="140" alt="Fabricación">
					</a>
				</div>
				<div class="uk-width-1-6@m uk-width-1-3">
					<a href="{{ route('servicios') }}">
						<img src="{{ asset('/images/template/icon-instalacion.png') }}" class="img-responsive" width="130" height="140" alt="Instalación">
					</a>
				</div>
				<div class="uk-width-1-6@m uk-width-1-3">
					<a href="{{ route('servicios') }}">
						<img src="{{ asset('/images/template/icon-capacitacion.png') }}" class="img-responsive" width="130" height="140" alt="Capacitación">
					</a>
				</div>
			</div>
		</div>
	</div>
	<div class="after-banner uk-visible@s" uk-scrollspy="cls:uk-animation-fade">Aseguramos el diseño y la selección correcta de los equipos <br><strong>necesarios para la operación eficiente de su cocina.</strong></div>

	<div class="uk-container mt-m95" style="margin-top:25px;" uk-scrollspy="cls:uk-animation-fade">
			<div class="uk-child-width-1-3@m uk-grid-small" uk-grid>
				<div class="destacado">
					<img src="{{ asset('images/template/icon-world.png') }}" width="90" height="90" alt="Icono: World">

					<?php
					$ye = date('Y');
					$experienicia = (int)$ye - 2003;
					?>
					<h2>{{ $experienicia }} años de experiencia</h2>
					<p>
						Las empresas del sector de alimentos y bebidas necesitan y necesitarán mucho más a corto plazo servicios expertos y eficientes con capacidad para cubrir todas las necesidades derivadas de la creación de una nueva cocina en menor tiempo, diseño eficaz, sin errores, adaptación de presupuesto y con verdadera capacidad instalada da como resultado:
					</p>
					<ul>
						<li>Calidad de servicio.</li>
						<li>Atractivos tiempos de respuesta.</li>
						<li>Asesoria Profesional.</li>
					</ul>
				</div>
				<div class="destacado">
					<img src="{{ asset('images/template/icon-computer.png') }}" width="90" height="90" alt="Icono: Computer">
					<h2 class="orange">Nuestros clientes</h2>

					<p>
						Somos especialistas en asesoría profesional, nuestros servicios principales son, diseño, equipamiento, fabricación, instalación y capacitación en todo lo relacionado al sector gastronómico: Restaurantes, Hoteles, Comedores de empleados, Fast food, Bares, Reposterías, Carnicerías, Empacadoras, Cremerías y mas; con un enfoque integral sobre las necesidades que marcan nuestros clientes.
					</p>
					<p>
						Nuestra presencia más fuerte se encuentra en la zona del bajío.
					</p>
				</div>
				<div class="destacado">
					<img src="{{ asset('images/template/icon-cog.png') }}" width="90" height="90" alt="Icono: Cog">

					<h2>Video Institucional</h2>
					<iframe width="100%" height="225" src="https://www.youtube.com/embed/N-ZKmXbNbdc?rel=0&amp;showinfo=0" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
				</div>
			</div>
		</div>
	</div>

	<div class="uk-text-center uk-margin-large">
		<img src="{{ asset('/images/template/balls.svg') }}"  width="96" height="21" alt="Separador visual">
	</div>

	<div class="uk-container">
		<div class="uk-grid-match uk-grid-small uk-margin-large-bottom" uk-grid>
			<div class="uk-width-1-1">
				<div class="uk-width-1-3@m">
					<div class="rounded-container bg-orange">
						<h2 class="uk-text-uppercase">Productos destacados</h2>
					</div>
				</div>
			</div>
			@foreach($related AS $relate)
			@php
			if( $loop ->  index == 8)
				break;
			@endphp
			<div class="uk-width-1-4@m">
				<div class="uk-card uk-card-default">
					<a href="{{ route('productos-open', [$relate -> producto -> category -> slug, $relate -> producto -> subcategory -> slug, $relate -> producto -> slug]) }}" class="uk-card-media-top producto__link--img">
						<img src="{{ url('storage/'.env('PRODUCT_FOLDER') . $relate -> producto -> image_rx) }}" alt="{{ $relate -> producto -> title }}">
					</a>
					<div class="uk-card-body ofProduct">
						<h3 class="uk-card-title">{{ $relate -> producto -> title }}</h3>
						<small>{{ $relate -> producto -> modelo }}</small>
						<p>
							{{ $relate -> producto -> resumen }}<br>
							@if( $relate -> producto -> precio > 0 )
							<span class="price">${{ number_format($relate -> producto -> precio, 2, '.', ',') }}</span>
							@endif
						</p>
						<a href="{{ route('productos-open', [$relate -> producto -> category -> slug, $relate -> producto -> subcategory -> slug, $relate -> producto -> slug]) }}">Ir al producto</a>
					</div>
				</div>
			</div>
			@endforeach
		</div>

		<div class="uk-margin-large" uk-grid>
			<div class="uk-width-1-3@m">
				<div class="rounded-container bg-orange">
					<h2 class="uk-text-uppercase">Marcas</h2>
				</div>
			</div>
			<div class="uk-width-12">
				<div class="uk-child-width-1-6@m uk-grid-small lasMarcas uk-text-center" uk-grid>
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
		</div>

		<div class="uk-grid-match uk-grid-small uk-margin-large-bottom" uk-grid>
			<div class="uk-width-1-1">
				<div class="uk-width-1-3@m">
					<div class="rounded-container bg-orange">
						<h2 class="uk-text-uppercase">Últimos artículos</h2>
					</div>
				</div>
			</div>
			@foreach($articles AS $article)
			<div class="uk-width-1-4@m">
				<div class="uk-card uk-card-default equi-card">
					<div class="uk-card-header">
						<div class="uk-grid-small uk-flex-middle" uk-grid>
							<a href="{{ route('blog-open', [$article -> slugC, $article -> slugA]) }}" class="uk-width-1-1 uk-text-center producto__link--img">
								<img class="uk-border-circle" width="{{ env('ARTICLE_WIDTH_RX') }}" height="{{ env('ARTICLE_HEIGHT_RX') }}" src="{{ url('storage/' . env('ARTICLE_FOLDER') . $article -> image_rx ) }}" alt="">
							</a>
							<div class="uk-width-1-1">
								<h3 class="uk-card-title uk-margin-remove-bottom" style="font-size:1.7rem">{{ $article -> titleA }}</h3>
								<p class="uk-text-meta uk-margin-remove-top uk-margin-remove-bottom uk-text-right"><time datetime="{{ $article -> publish }}">{{ Carbon::parse($article -> publish) -> format('d/m/Y') }}</time></p>
								<p class="uk-text-meta uk-margin-remove-top uk-text-right">{{ $article -> titleC }}</p>
							</div>
						</div>
					</div>
					<div class="uk-card-body">
						<p>{{ Illuminate\Support\Str::limit($article -> shortdesc, 80) }}</p>
					</div>
					<div class="uk-card-footer">
						<a href="{{ route('blog-open', [$article -> slugC, $article -> slugA]) }}" class="uk-button uk-button-text">Seguir leyendo</a>
					</div>
				</div>
			</div>
			@endforeach
		</div>

		<div class="losEnlaces" uk-grid>
			<div class="uk-width-12">
				<a href={{ route('proyectos') }}>
					<img width="1240" height="350" src="{{ asset('images/template/mn-proyectos.jpg') }}" alt="Ir a la sección de proyectos">
					<span class="leText">Proyectos</span>
				</a>
			</div>
			<div class="uk-width-1-2@m">
				<a href={{ route('productos') }}>
					<img width="620" height="350" src="{{ asset('images/template/mn-productos.jpg') }}" alt="Ir a la sección de productos">
					<span class="leText">Productos</span>
				</a>
			</div>
			<div class="uk-width-1-2@m">
				<a href={{ route('servicios') }}>
					<img width="620" height="350" src="{{ asset('images/template/mn-servicios.jpg') }}" alt="Ir a la sección de servicios">
					<span class="leText">Servicios</span>
				</a>
			</div>
			<div class="uk-width-12">
				<a href={{ route('portafolio') }}>
					<img width="1240" height="350" src="{{ asset('images/template/mn-portafolio.jpg') }}" alt="Ir a la sección de portafolio">
					<span class="leText">Portafolio</span>
				</a>
			</div>
			<div class="uk-width-12">
				<a href={{ route('servicios') }}>
					<img width="1240" height="350" src="{{ asset('images/template/mn-servicios-2.jpg') }}" alt="Ir a la sección de servicios">
					<span class="leText">Renderizado</span>
				</a>
			</div>
		</div>
	</div>
@endsection