@extends('00_layouts.01_website.app')
@section('title',       $meta['titulo'])
@section('descripcion', $meta['descripcion'])
@section('imagen',      $meta['imagen'])
@section('CustomCss')
<style>
	#NavSubcat > li{
		text-align: center;
	}
	#NavSubcat > li > a{
		font-size: 1rem !important;
	}
	.fs885 > li > a{
		font-size: 1.3rem !important;
	}
	.modifier{
		font-size: 1.3rem;
		line-height: 150%;
	}
</style>
@endsection
@section('Content')
	<div class="uk-container">
		<div class="uk-width-3-5@m">
			<div class="rounded-container bg-blue">
				<h1 class="uk-text-uppercase">{{ $category -> title }}</h1>
			</div>
		</div>
		<nav class="nav__subcategories">
			<div class="nav__subcategories--ws">
				@foreach( $subcategories AS $subcategory )
				<a href="{{ route('productos-category', [$category-> slug, $subcategory -> slug]) }}" >{{ $subcategory -> title }}</a>
				@endforeach
			</div>
		</nav>
	</div>

	<div class="uk-container uk-margin-large">
		@if( $entries -> total() == 0 )
			<div class="uk-width-1-1">
				<div class="uk-alert-warning" uk-alert>
					<p>Todavía no hemos agregado productos a esta categoría.</p>
				</div>
			</div>
		@endif
		<div uk-grid>
			<div class="uk-width-4-5@m">
				<div class="uk-child-width-1-3@m" uk-grid>
					@foreach($entries as $entry)
					<div>
						<div class="uk-card uk-card-default">
							<a href="{{ route('productos-open', [$entry -> slugC, $entry -> slugS, $entry -> slugP]) }}" class="uk-card-media-top producto__link--img">
								@if( !empty($entry -> final_price) )
								<div class="discount-tag">
									<span>{{ percent( $entry -> precio, $entry -> final_price ) }}%</span>
								</div>
								@endif
								<img src="{{ url('storage/'.env('PRODUCT_FOLDER') . $entry -> image_rxP) }}" alt="{{ $entry -> titleP }}">
							</a>
							<div class="uk-card-body ofProduct">
								<h3 class="uk-card-title">{{ $entry -> titleP }}</h3>
								<small>{{ $entry -> modelo }}</small>
								<p>
									{{ $entry -> resumen }}
									@if( !empty($entry -> precio) && $entry -> precio > 0 )
										@if( !empty($entry -> final_price) )
											<span class="price-before">${{ number_format($entry -> precio, 2) }}</span>
										<span class="price">${{ number_format($entry -> final_price, 2) }}</span>
										@else
											<span class="price">${{ number_format($entry -> precio, 2) }}</span>
										@endif
									@endif
								</p>
								<a href="{{ route('productos-open', [$entry -> slugC, $entry -> slugS, $entry -> slugP]) }}">Ir al producto</a>
								<a class="addQuote" data-prod="{{ $entry -> idP }}" data-disc="false"><span uk-icon="cart"></span> Cotizar</a>
							</div>
						</div>
					</div>
					@endforeach
				</div>
			</div>
			<div class="uk-width-1-5@m">
				@if( isset($promos) && $promos !== 0 )
				<div class="uk-margin-bottom uk-text-center">
					<a href="{{ route('cotizar') }}">
						<img width="210" height="75" alt="Cotiza productos en promoción" src="{{ asset('/images/template/banner-cotizacion.png') }}" uk-tooltip title="Ver promociones">
					</a>
				</a>
				</div>
				@endif
				@foreach($CC AS $LaCat)
				<div>
					<a class="a-link-box expand"><span class="not">{{ $LaCat -> title }}</span> <i class="material-icons vm">keyboard_arrow_down</i> <i class="material-icons vm">keyboard_arrow_up</i></a>
					<div class="link-box sidebar contracted">
						<ul>
							@foreach( $SS AS $LeSub )
								@if( $LeSub -> category_id == $LaCat -> id )
								<li><a href="{{ route('productos-category', [$LaCat -> slug, $LeSub -> slug]) }}">{{ $LeSub -> title }}</a></li>
								@endif
							@endforeach
						</ul>
					</div>
				</div>
				@endforeach
			</div>
		</div>
		<div class="uk-width-1-1 uk-text-center uk-margin-top">
			{!! $entries -> render() !!}
		</div>
	</div>
@endsection
@section('CustomJs')
	<script src="{{ asset('/js/expand.js') }}"></script>
	<script>
		var url_find	= "{{ route('cotizaciones.find') }}"
		,	url_add		= "{{ route('cotizaciones.add') }}"
		,	url_remove	= "{{ route('cotizaciones.remove') }}"
		,	url_update	= "{{ route('cotizaciones.upd') }}";
	</script>
	<script src="{{ asset('/js/quotas.js') }}"></script>
@endsection