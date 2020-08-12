
<header class="header">
	<nav class="header__nav">
		<div class="header__nav__brand">
			<img src="{{ asset('/images/template/equipar-id--red.png') }}" width="190" height="58" alt="Equi-par logo"  uk-scrollspy="cls:uk-animation-scale-up">
		</div>

		<div class="header__nav__middle uk-visible@s">
			<div class="header__nav--search">
				@include('00_layouts.01_website.search')
			</div>
			<div class="header__nav--cart">
				<a class="goQuotation @if(Session::has('cotizacion')) {!! "hasItems" !!} @endif" href="{{ route('cotizar') }}" uk-tooltip title="Ir al cotizador">
					<span uk-icon="icon: cart; ratio: 1.25"></span>
					@if(Session::has('cotizacion'))
						<span class="uk-badge">{{ count(Session::get('cotizacion')) }}</span>
					@endif
				</a>
			</div>
		</div>

		<div class="header__nav__right">
			<a class="goQuotation uk-hidden@s @if(Session::has('cotizacion')) {!! "hasItems" !!} @endif" href="{{ route('cotizar') }}" uk-tooltip title="Ir al cotizador">
				<span uk-icon="icon: cart; ratio: 1.25"></span>
				@if(Session::has('cotizacion'))
					<span class="uk-badge">{{ count(Session::get('cotizacion')) }}</span>
				@endif
			</a>
			<a class="uk-navbar-toggle uk-hidden@s" href="#menu-full" uk-toggle>
				<img src="{{ asset('/images/template/menu-button.svg') }}" width="32" height="32" alt="Botón del menú">
			</a>
			<div class="uk-visible@s">
				<div class="uk-text-right">
					<small>Tel: (33) 2886 2661 | atencionaclientes@equi-par.com</small>
				</div>
				<div>
					<ul class="header__nav__menu">
						<li>
							<a {!! Request::is('/') ? 'class="active"' : '' !!} href="{{ route('index') }}">Portada</a>
						</li>
						<li>
							<a {!! Request::is('nosotros') ? 'class="active"' : '' !!} href="{{ route('nosotros') }}">Nosotros</a>
						</li>
						<li>
							<a {!! Request::is('productos') || Request::is('productos/*') ? 'class="active"' : '' !!} href="{{ route('productos') }}">Productos</a>
						</li>
						<li class="showMeTheMoney">
							<a {!! Request::is('proyectos') || Request::is('portafolio') || Request::is('portafolio/*') ? 'class="active"' : '' !!}">Proyectos</a>
							<div class="uk-navbar-dropdown">
								<ul class="uk-nav uk-navbar-dropdown-nav" style="padding: 0;">
									<li><a {!! Request::is('proyectos') ? 'class="active"' : '' !!} href="{{ route('proyectos') }}">Proyectos</a></li>
									<li><a {!! Request::is('portafolio') ? 'class="active"' : '' !!} href="{{ route('portafolio') }}">Galería de proyectos</a></li>
								</ul>
							</div>
						</li>
						<li>
							<a {!! Request::is('servicios') ? 'class="active"' : '' !!} href="{{ route('servicios') }}">Servicios</a>
						</li>
						<li>
							<a {!! Request::is('blog') || Request::is('blog/*') ? 'class="active"' : '' !!} href="{{ route('blog') }}">Blog</a>
						</li>
						<li>
							<a {!! Request::is('contacto') ? 'class="active"' : '' !!} href="{{ route('contacto') }}">Contacto</a>
						</li>
					</ul>
				</div>
			</div>
		</div>
	</nav>
</header>