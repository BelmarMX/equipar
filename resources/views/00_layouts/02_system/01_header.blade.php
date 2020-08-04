@auth
<nav class="uk-navbar-container" uk-navbar>
	<div class="uk-navbar-left">
		@auth
			<a class="uk-navbar-toggle" uk-toggle="target: #offcanvas-push">
				<span uk-navbar-toggle-icon></span> <span class="uk-margin-small-left">Menu</span>
			</a>
		@endauth
	</div>

	<div class="uk-navbar-right">
		<ul class="uk-navbar-nav">
			@guest
				<li><a href="{{ route('login') }}">Iniciar Sesión</a></li>
				{{-- <li><a href="{{ route('register') }}">Registrarse</a></li> --}}
			@else
				<li>
					<a><span class="uk-margin-small-right" uk-icon="icon: user"></span> {{ Auth::user() -> name }}</a>
					<div uk-dropdown="animation: uk-animation-slide-top-small; duration: 300">
						<ul class="uk-nav uk-navbar-dropdown-nav">
							{{-- @can('config')
								<li><a href="{{ route('config') }}"><span class="uk-margin-small-right" uk-icon="icon: cog"></span> Configuración</a></li>
							@endcan --}}
							@can('users.isAdmin')
								<li><a href="{{ route('users.edit', Auth::user() -> id) }}"><span class="uk-margin-small-right" uk-icon="icon: lock"></span> Cambiar contraseña</a></li>
							@endcan
							<li><a onclick="$('#logout-form').submit()"><span class="uk-margin-small-right" uk-icon="icon: sign-out"></span> Salir</a></li>
						</ul>
						<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
							@csrf
						</form>
					</div>
				</li>
			@endguest
		</ul>
	</div>
</nav>
@if( session('alert') )
	<div class="uk-{{ session('alert')['type'] }}" uk-alert>
		<a class="uk-alert-close" uk-close></a>
		<p>{{ session('alert')['message'] }}</p>
	</div>
@endif

{{-- @auth --}}
	<div class="uk-offcanvas-content">
		<div id="offcanvas-push" uk-offcanvas="mode: push; overlay: true">
			<div class="uk-offcanvas-bar">
				<button class="uk-offcanvas-close" type="button" uk-close></button>
				{{-- Menú --}}
				<ul class="uk-nav uk-nav-default">
					@can('users.index')
						<li class="uk-nav-header">Banner</li>
							<li><a href="{{ route('banner.index') }}"><span class="uk-margin-small-right" uk-icon="icon: list"></span> Listar</a></li>
							@can('users.create')
								<li><a href="{{ route('banner.create') }}"><span class="uk-margin-small-right" uk-icon="icon: plus"></span> Nuevo</a></li>
							@endcan
						<li class="uk-nav-divider"></li>
					@endcan
					@can('users.index')
						<li class="uk-nav-header">Promociones mensuales</li>
							<li><a href="{{ route('promociones.index') }}"><span class="uk-margin-small-right" uk-icon="icon: list"></span> Listar</a></li>
							@can('users.create')
								<li><a href="{{ route('promociones.create') }}"><span class="uk-margin-small-right" uk-icon="icon: plus"></span> Nuevo</a></li>
							@endcan
						<li class="uk-nav-divider"></li>
					@endcan
					@can('users.index')
						<li class="uk-nav-header">Productos</li>
							<li class="uk-parent">
								<a href="{{ route('producto-destacado.index') }}"><span class="uk-margin-small-right" uk-icon="icon: list"></span> Destacados</a>
								<a href="{{ route('product-categories.index') }}"><span class="uk-margin-small-right" uk-icon="icon: list"></span> Categorías</a>
								@can('users.create')
								<ul class="uk-nav-sub">
									<li><a href="{{ route('product-categories.create') }}"><span class="uk-margin-small-right" uk-icon="icon: plus"></span> Nueva</a></li>
								</ul>
								@endcan
								<a href="{{ route('product-subcategories.index') }}"><span class="uk-margin-small-right" uk-icon="icon: list"></span> Subcategorías</a>
								@can('users.create')
								<ul class="uk-nav-sub">
									<li><a href="{{ route('product-subcategories.create') }}"><span class="uk-margin-small-right" uk-icon="icon: plus"></span> Nueva</a></li>
								</ul>
								@endcan
								<a href="{{ route('product.index') }}"><span class="uk-margin-small-right" uk-icon="icon: list"></span> Productos</a>
								@can('users.create')
								<ul class="uk-nav-sub">
									<li><a href="{{ route('product.create') }}"><span class="uk-margin-small-right" uk-icon="icon: plus"></span> Nuevo</a></li>
								</ul>
								@endcan
								@can('users.edit')
								<a href="{{ route('product.pricechange') }}"><span class="uk-margin-small-right" uk-icon="icon: list"></span> Cambio masivo de precios</a>
								@endcan
							</li>
						<li class="uk-nav-divider"></li>
					@endcan
					@can('users.index')
						<li class="uk-nav-header">Portafolio</li>
							<li><a href="{{ route('portfolio.index') }}"><span class="uk-margin-small-right" uk-icon="icon: list"></span> Listar</a></li>
							@can('users.create')
								<li><a href="{{ route('portfolio.create') }}"><span class="uk-margin-small-right" uk-icon="icon: plus"></span> Nuevo</a></li>
							@endcan
						<li class="uk-nav-divider"></li>
					@endcan
					@can('users.index')
						<li class="uk-nav-header">Blog</li>
							<li class="uk-parent">
								<a href="{{ route('blog-categories.index') }}"><span class="uk-margin-small-right" uk-icon="icon: list"></span> Categorias</a>
								@can('users.create')
								<ul class="uk-nav-sub">
									<li><a href="{{ route('blog-categories.create') }}"><span class="uk-margin-small-right" uk-icon="icon: plus"></span> Nueva</a></li>
								</ul>
								@endcan
								<a href="{{ route('blog-articles.index') }}"><span class="uk-margin-small-right" uk-icon="icon: list"></span> Artículos</a>
								@can('users.create')
								<ul class="uk-nav-sub">
									<li><a href="{{ route('blog-articles.create') }}"><span class="uk-margin-small-right" uk-icon="icon: plus"></span> Nuevo</a></li>
								</ul>
								@endcan
							</li>
						<li class="uk-nav-divider"></li>
					@endcan
					@can('users.isAdmin')
						<li class="uk-nav-header">Usuarios</li>
							<li><a href="{{ route('users.index') }}"><span class="uk-margin-small-right" uk-icon="icon: list"></span> Listar</a></li>
							@can('users.create')
								<li><a href="{{ route('users.create') }}"><span class="uk-margin-small-right" uk-icon="icon: plus"></span> Nuevo</a></li>
							@endcan
						<li class="uk-nav-divider"></li>
					@endcan
				</ul>
				{{-- /Menú --}}
			</div>
		</div>
	</div>
@endauth