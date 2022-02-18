<header>
    <div id="pleca" class="d-flex w-100 align-items-center justify-content-end">
        <div class="contact-links">
            <a href="tel:{{ env('TEL_LOCAL_DIAL') }}"
               data-bs-toggle="tooltip"
               title="Llamanos"
               target="_blank"
            >
                <i class="bi bi-telephone"></i> {{ env('TEL_LOCAL_SHOW') }}
            </a>
            <a href="https://api.whatsapp.com/send?phone={{ env('TEL_WHATS_DIAL') }}&text=Para%20brindarte%20un%20mejor%20servicio%20por%20favor%20deja%20tus%20datos%20(Nombre,%20Correo%20electr%C3%B3nico,%20%20y%20asunto)"
               data-bs-toggle="tooltip"
               title="Escríbenos un Whats"
               target="_blank"
            >
                <i class="bi bi-whatsapp"></i> {{ env('TEL_WHATS_SHOW') }}
            </a>
            <a href="mailto:{{ env('CONTACT_EMAIL') }}"
               data-bs-toggle="tooltip"
               title="Envíanos un correo electrónico"
               target="_blank"
            >
                <i class="bi bi-envelope"></i> {{ env('CONTACT_EMAIL') }}
            </a>
        </div>
        <div class="red-transform">
            <a href="{{ env('LOCATION_MATRIZ') }}" target="_blank" data-bs-toggle="tooltip" title="Encuéntranos en Google Maps">
                <i class="bi bi-geo-alt-fill"></i>
            </a>
            <a href="{{ env('SOCIAL_FACEBOOK') }}" target="_blank" data-bs-toggle="tooltip" title="Visita nuestra página de Facebook">
                <i class="bi bi-facebook"></i>
            </a>
            <a href="{{ env('SOCIAL_INSTAGRAM') }}" target="_blank" data-bs-toggle="tooltip" title="Síguenos en Instagram">
                <i class="bi bi-instagram"></i>
            </a>
            <a href="{{ env('SOCIAL_LINKEDIN') }}" target="_blank" data-bs-toggle="tooltip" title="Conéctate en LinkedIn">
                <i class="bi bi-linkedin"></i>
            </a>
        </div>
    </div>

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="/">
                <img width="178" height="60" src="{{ asset('v2/images/layout/equipar-minimal-id.svg') }}" alt="Equi-par ID">
            </a>
            <button class="navbar-toggler"
                    type="button"
                    data-bs-toggle="collapse"
                    data-bs-target="#main_menu"
                    aria-controls="main_menu"
                    aria-expanded="false"
                    aria-label="Toggle navigation"
            >
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse justify-content-center" id="main_menu">
                <ul class="navbar-nav navbar-nav-scroll" style="--bs-scroll-height: 350px;">
                    <li class="nav-item">
                        <a class="nav-link nav-link--home active" aria-current="page" href="/">
                            <i class="bi bi-house-door-fill"></i>
                        </a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle"
                           href="#"
                           id="proyectos__dropdown"
                           role="button"
                           data-bs-toggle="dropdown"
                           aria-expanded="false"
                        >
                            Proyectos
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="proyectos__dropdown">
                            <li>
                                <a class="dropdown-item" href="#">Servicios</a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="#">Portafolio</a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Servicios</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle"
                           href="#"
                           id="productos__dropdown"
                           role="button"
                           data-bs-toggle="dropdown"
                           aria-expanded="false"
                        >
                            Productos
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="productos__dropdown">
                            <li>
                                <a class="dropdown-item" href="#">Acero inoxidable</a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="#">Coccion</a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="#">Refrigeración</a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="#">Utensilios</a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="#">Almacenaje</a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="#">Equipo menor</a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="#">Barras de servicio</a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="#">Lavado y limpieza</a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="#">Refacciones</a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="#">Complementos</a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="#">Aluminio</a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Blog</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Acerca de</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Contacto</a>
                    </li>
                </ul>
            </div>
            <div id="search-form">
                <form>
                    <i class="bi bi-search"></i>
                    <input id="search" type="search" name="search" placeholder="Ingresa el nombre, marca o categoría del producto a buscar">
                </form>
            </div>

            <div id="search-room">
                <button id="toggle-search" type="button" aria-label="Muestra la barra de búsqueda">
                    <i class="bi bi-search"></i>
                </button>
                <a id="link_quotation"
                   class="position-relative empty"
                   data-bs-toggle="tooltip"
                   title="Cotizador Vacío"
                   href="#"
                >
                    <i id="empty_cart" class="bi bi-basket3"></i>
                    <i id="not_empty_car" class="bi bi-basket3-fill"></i>
                    <span class="position-absolute top-100 start-100 translate-middle p-2 bg-success border border-light rounded-circle">
                        <span class="visually-hidden">Items en el cotizador</span>
                    </span>
                </a>
            </div>
        </div>
    </nav>
</header>

<div id="load8">
    <div class="text-center">
        <img class="load8" src="{{ asset('v2/images/layout/loader.svg')  }}" alt="Loading..."><br>
        <small>Cargando<span class="grow-text">...</span></small>
    </div>
</div>