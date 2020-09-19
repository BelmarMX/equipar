@extends('00_layouts.01_website.app')
@section('title',       $meta['titulo'])
@section('descripcion', $meta['descripcion'])
@section('imagen',      $meta['imagen'])

@section('Content')
	<div class="uk-container uk-margin-large-top">
		<div uk-grid>
			<div class="uk-width-1-3@m">
				<div class="rounded-container bg-orange">
					<h1 class="uk-text-uppercase">Identidad</h1>
				</div>
			</div>
			<div class="uk-width-2-3@m uk-margin-remove"></div>
			<div class="uk-width-1-3@m">
				<img src="{{ asset('/images/template/equipar-id--red.png') }}" class="img-responsive" width="380" height="112" alt="Equi-par logo">
			</div>
			<div class="uk-width-2-3@m">
				<p class="set-font-default ff-secondary-font light uk-text-justify">
					Se crea en al ciudad de Guadalajara, Jalisco; como una compañía de servicios y equipos en el sector de cocinas industriales, la unión de tres personas: una de ellas con espíritu inversionista, dos con amplia experiencia en el ramo manifestando inquietud emprendedora para ejercer con libertad la toma de decisiones, ideas de innovación y desarrollo empresarial favorables para la industria de alimentos y bebidas.
				</p>
				<p class="set-font-default ff-secondary-font light uk-text-justify">
					El mercado demanda servicios expertos y eficientes con capacidad para cubrir necesidades derivadas de la creación de una nueva cocina; en tiempo competitivo, diseño eficaz, adaptación de presupuesto con verdadera capacidad instalada dan como resultado el nacimiento de esta empresa.
				</p>
			</div>
		</div>
	</div>

	<div class="container-fluid uk-margin-large bg-gray uk-padding-small">
		<div class="uk-container">
			<div uk-grid class="uk-grid-collapse uk-text-center">
				<div class="uk-width-1-6@m">
					<img src="{{ asset('/images/template/icon-asesoria.png') }}" class="img-responsive" width="130" height="140" alt="Asesoría">
				</div>
				<div class="uk-width-1-6@m">
					<img src="{{ asset('/images/template/icon-diseno.png') }}" class="img-responsive" width="130" height="140" alt="Diseño">
				</div>
				<div class="uk-width-1-6@m">
					<img src="{{ asset('/images/template/icon-equipos.png') }}" class="img-responsive" width="130" height="140" alt="Equipos">
				</div>
				<div class="uk-width-1-6@m">
					<img src="{{ asset('/images/template/icon-fabricacion.png') }}" class="img-responsive" width="130" height="140" alt="Fabricación">
				</div>
				<div class="uk-width-1-6@m">
					<img src="{{ asset('/images/template/icon-instalacion.png') }}" class="img-responsive" width="130" height="140" alt="Instalación">
				</div>
				<div class="uk-width-1-6@m">
					<img src="{{ asset('/images/template/icon-capacitacion.png') }}" class="img-responsive" width="130" height="140" alt="Capacitación">
				</div>
			</div>
		</div>
	</div>

	<div class="uk-text-center uk-margin-large">
		<img src="{{ asset('/images/template/balls.svg') }}"  width="96" height="21" alt="Separador visual">
	</div>

	<div class="uk-container-fluid uk-margin bg-balazo" uk-scrollspy="cls:uk-animation-scale-down">
		<div class="uk-container p-135">
			<p class="ff-secondary-font bold italic white rem2-5 uk-text-center">
				Aseguramos la eficiencia de tu cocina con servicio profesional y personalizado<br>
				a través de la experiencia, tiempos de respuesta y talento de nuestros colaboradores.
			</p>
		</div>
	</div>

	<div class="uk-container uk-margin-large">
		<div uk-grid>
			<div class="uk-width-1-3@m" uk-scrollspy="cls:uk-animation-scale-down">
				<div class="rounded-container bg-green">
					<h2 class="uk-text-uppercase">Misión</h2>
				</div>
				<p class="set-font-default ff-secondary-font light uk-text-justify">
					Somos una empresa con talento y pasión que aseguran el diseño y la selección correcta de los equipos necesarios para la eficiente operación de su cocina.
				</p>
			</div>
			<div class="uk-width-1-3@m">
				<div class="rounded-container bg-blue" uk-scrollspy="cls:uk-animation-scale-down">
					<h2 class="uk-text-uppercase">Visión</h2>
				</div>
				<p class="set-font-default ff-secondary-font light uk-text-justify">
					Ser una empresa reconocida por la calidad de sus servicios en el 50% del mercado gastronómico de Jalisco, Guanajuato y Querétaro.
				</p>
			</div>
			<div class="uk-width-1-3@m">
				<div class="rounded-container bg-orange" uk-scrollspy="cls:uk-animation-scale-down">
					<h2 class="uk-text-uppercase">Valores</h2>
				</div>
				<p class="set-font-default ff-secondary-font light uk-text-justify">
					+ Honestidad.<br>
					+ Constancia.<br>
					+ Confianza.<br>
					+ Calidad.<br>
					+ Trabajo en equipo.<br>
					+ Orientación al servicio.
				</p>
			</div>
		</div>
	</div>

	<div class="uk-container-fluid uk-margin-large uk-padding bg-lines ">
		<div class="uk-container">
			<div uk-grid>
				<div class="uk-width-1-3@m">
					<div class="rounded-container bg-gray">
						<h2 class="uk-text-uppercase">Cobertura</h2>
					</div>
				</div>
				<div class="uk-width-2-3@m uk-margin-remove"></div>
				<div class="uk-width-1-3@m">
					<h3 class="ff-secondary-font bold rem2 uk-text-center uk-text-uppercase brackets orange">Comedores industriales</h3>
				</div>
				<div class="uk-width-1-3@m">
					<h3 class="ff-secondary-font bold rem2 uk-text-center uk-text-uppercase brackets orange">Restaurantes</h3>
				</div>
				<div class="uk-width-1-3@m">
					<h3 class="ff-secondary-font bold rem2 uk-text-center uk-text-uppercase brackets orange">Hoteles</h3>
				</div>
				<div class="uk-width-1-1 uk-text-center" uk-scrollspy="cls:uk-animation-scale-down">
					<img src="{{ asset('/images/template/mapa-cobertura.png') }}" class="img-responsive" width="825" height="581" alt="Mapa de cobertura">
				</div>
				<div class="uk-width-1-3@m">
					<h4 class="ff-secondary-font bold rem2 uk-text-center uk-text-uppercase gray">Jalisco</h4>
				</div>
				<div class="uk-width-1-3@m">
					<h4 class="ff-secondary-font bold rem2 uk-text-center uk-text-uppercase gray">Guanajuato</h4>
				</div>
				<div class="uk-width-1-3@m">
					<h4 class="ff-secondary-font bold rem2 uk-text-center uk-text-uppercase gray">Querétaro</h4>
				</div>
			</div>
		</div>
	</div>
@endsection