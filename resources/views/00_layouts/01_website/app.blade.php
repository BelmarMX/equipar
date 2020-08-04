<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
	<head>
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="ie=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="csrf-token" content="{{ csrf_token() }}">
		{{-- Seo Tags  --}}
		<title>@yield('title') - Equi-par</title>
		<meta name="description" content="@yield('descripcion')">
		<meta name="author" content="Equi-par">
		{{-- Open Graphs  --}}
		<meta property="og:url" content="{{ url()->current() }}">
		<meta property="type" content="website">
		<meta property="og:site_name" content="Equi-par">
		<meta property="og:title" content="@yield('title')">
		<meta property="og:description" content="@yield('descripcion')">
		<meta property="og:image" content="@yield('imagen')">
		{{-- Favicons  --}}
		<link rel="apple-touch-icon-precomposed" sizes="144x144" href="{{ asset('images/ico/apple-touch-icon-144-precomposed.png') }}">
		<link rel="apple-touch-icon-precomposed" sizes="114x114" href="{{ asset('images/ico/apple-touch-icon-114-precomposed.png') }}">
		<link rel="apple-touch-icon-precomposed" sizes="72x72" href="{{ asset('images/ico/apple-touch-icon-72-precomposed.png') }}">
		<link rel="apple-touch-icon-precomposed" href="{{ asset('images/ico/apple-touch-icon-57-precomposed.png') }}">
		<link rel="shortcut icon" href="{{ asset('images/ico/favicon.png') }}">
		{{-- Polyfill --}}
		<script src="{{ asset('js/observer.js') }}"></script>
		<script>IntersectionObserver.prototype.POLL_INTERVAL = 100;</script>
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/uikit@3.2.4/dist/css/uikit.min.css">
		<link rel="stylesheet" href="{{ asset('css/00_style.css') }}">
		@yield('CustomCss')
	</head>
	<body>
		<div class="uk-offcanvas-content">
			@include('00_layouts.01_website.01_header')

			@if( isset($promos) && $promos !== 0 )
			<div id="promomes" class="uk-text-center" uk-tooltip title="Visita nuestros productos en promoción">
				<a href="{{ route('promociones', $promos -> slug)}}">
					<img width="{{ env('PROMOS_WIDTH') }}" height="{{ env('PROMOS_HEIGHT') }}" src="{{ url('storage/'. env('PROMOS_FOLDER') .$promos -> image) }}" alt="Promoción del mes">
				</a>
			</div>
			<div class="white-line"></div>
			@endif
			
			@if( $banners !== 0 )
			<div id="banner">
				<div class="uk-position-relative uk-visible-toggle uk-light" uk-slider="autoplay:true; autoplay-interval:5000">
					<ul class="uk-slider-items uk-child-width-1-1@s uk-child-width-1-1@">
						@if( isMobile() === true )
							@foreach($banners as $banner)
							<li>
								<div class="elBanner">
									<img src="{{ url('storage/'.env('BANNER_FOLDER') . $banner -> image_mv) }}" width="{{ env('BANNER_WIDTH_MV') }}" height="{{ env('BANNER_HEIGHT_MV') }}" alt="{{ $banner -> title }}">
									<a @if(!empty( $banner -> link )) href="{{ $banner -> link }}" @endif>{{ $banner -> title }}</a>
								</div>
							</li>
							@endforeach
						@else
							@foreach($banners as $banner)
							<li>
								<div class="elBanner">
									<img src="{{ url('storage/'.env('BANNER_FOLDER') . $banner -> image) }}" width="{{ env('BANNER_WIDTH') }}" height="{{ env('BANNER_HEIGHT') }}" alt="{{ $banner -> title }}">
									@if( !empty($banner -> title ) AND $banner -> title != '.' )
									<a class="uk-visible@s" @if(!empty( $banner -> link )) href="{{ $banner -> link }}" @endif>{{ $banner -> title }}</a>
									@endif
								</div>
							</li>
							@endforeach
						@endif
					</ul>
					<a class="uk-position-center-left uk-position-small uk-hidden-hover" href="#" uk-slidenav-previous uk-slider-item="previous"></a>
					<a class="uk-position-center-right uk-position-small uk-hidden-hover" href="#" uk-slidenav-next uk-slider-item="next"></a>
				</div>
			</div>
			@endif

			@yield('Content')

			@include('00_layouts.01_website.02_footer')
		</div>

		<div id="menu-full" class="uk-modal-full" uk-modal>
			<div class="uk-modal-dialog">
				<button class="uk-modal-close-full uk-close-large" type="button" uk-close></button>
				<div class="uk-padding-large uk-text-center uk-grid-collapse uk-child-width-1-1 uk-flex-middle" uk-height-viewport uk-grid>
					<div>
						@include('00_layouts.01_website.search')
					</div>
					<div>
						<a class="goQuotation @if(Session::has('cotizacion')) {!! "hasItems" !!} @endif" href="{{ route('cotizar') }}" uk-tooltip title="Ir al cotizador">
							<span uk-icon="icon: cart; ratio: 1.25"></span> Cotizador
							@if(Session::has('cotizacion'))
								<span class="uk-badge">{{ count(Session::get('cotizacion')) }}</span>
							@endif
						</a>
					</div>
					<div>
						<a class="menu-link {!! Request::is('/') ? 'active' : '' !!}" href="{{ route('index') }}">Portada</a>
					</div>
					<div>
						<a class="menu-link {!! Request::is('nosotros') ? 'active' : '' !!}" href="{{ route('nosotros') }}">Nosotros</a>
					</div>
					<div>
						<a class="menu-link {!! Request::is('productos') ? 'active' : '' !!}" href="{{ route('productos') }}">Productos</a>
					</div>
					<div>
						<a class="menu-link {!! Request::is('proyectos') ? 'active' : '' !!}" href="{{ route('proyectos') }}">Proyectos</a>
					</div>
					<div>
						<a class="menu-link {!! Request::is('portafolio') ? 'active' : '' !!}" href="{{ route('portafolio') }}">Galería de proyectos</a>
					</div>
					<div>
						<a class="menu-link {!! Request::is('servicios') ? 'active' : '' !!}" href="{{ route('servicios') }}">Servicios</a>
					</div>
					<div>
						<a class="menu-link {!! Request::is('blog') || Request::is('blog/*') ? 'active' : '' !!}" href="{{ route('blog') }}">Blog</a>
					</div>
					<div>
						<a class="menu-link {!! Request::is('contacto') ? 'active' : '' !!}" href="{{ route('contacto') }}">Contacto</a>
					</div>
				</div>
			</div>
		</div>

		<!-- Scripts -->
		<script src="https://cdn.jsdelivr.net/npm/uikit@3.2.4/dist/js/uikit.min.js"></script>
		<script src="https://cdn.jsdelivr.net/npm/uikit@3.2.4/dist/js/uikit-icons.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.0.0/jquery.min.js"></script>
		<script async src="https://www.googletagmanager.com/gtag/js?id=UA-124161247-3"></script>
		<script>
			window.dataLayer = window.dataLayer || []; function gtag(){dataLayer.push(arguments);} gtag('js', new Date()); gtag('config', 'UA-124161247-3');
		</script>
		@yield('CustomJs')
	</body>
</html>