<header uk-sticky="sel-target: .uk-navbar-container; cls-active: uk-navbar-sticky">
    <nav class="uk-navbar-container uk-padding-small" uk-navbar>
        <div class="uk-navbar">
            <img src="{{ asset('/images/template/equipar-id.svg') }}" width="232" height="88" alt="Equi-par logo"  uk-scrollspy="cls:uk-animation-scale-up">
        </div>
        <div class="uk-navbar-right uk-visible@s">
            <div class="uk-text-right uk-margin-remove" uk-grid>
                <div class="uk-width-12 uk-margin-remove">
                    <small class="contactchiquitin">Guadalajara, Jalisco (33) 2886 2661 atencionaclientes@equi-par.com</small>
                </div>
                <div class="uk-width-12 uk-margin-remove loslinks">
                    <nav class="uk-navbar-container" uk-navbar>
                        <div class="uk-navbar-right">
                            <ul class="uk-navbar-nav uk-text-left">
                                <li>
                                    <a {!! Request::is('/') ? 'class="active"' : '' !!} href="{{ route('index') }}">Portada</a>
                                </li>
                                <li>
                                    <a {!! Request::is('nosotros') ? 'class="active"' : '' !!} href="{{ route('nosotros') }}">Nosotros</a>
                                </li>
                                <li>
                                    <a {!! Request::is('productos') ? 'class="active"' : '' !!} href="{{ route('productos') }}">Productos</a>
                                </li>
                                <li>
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
                    </nav>
                </div>
            </div>
        </div>
        <div class="uk-navbar-right ml0">
            <a class="uk-navbar-toggle uk-hidden@s" href="#menu-full" uk-toggle>
                <img src="{{ asset('/images/template/menu-button.svg') }}" width="32" height="32" alt="Botón del menú">
            </a>
            <a class="goQuotation @if(Session::has('cotizacion')) {!! "hasItems" !!} @endif" href="{{ route('cotizar') }}" uk-tooltip title="Ir al cotizador">
                <span uk-icon="cart" style="width:20px; height:20px;"></span>
                @if(Session::has('cotizacion'))
                    <span class="uk-badge">{{ count(Session::get('cotizacion')) }}</span>
                @endif
            </a>
        </div>
    </nav>
</header>