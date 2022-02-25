@include('frontend_v2.master.floating-contact-button')

<footer class="container-fluid bg-dark text-white pt-4">
    <div class="row px-4">
        <div class="col-md-4 location">
            <i class="bi bi-geo-alt-fill"></i> <span>Matriz</span>
            <p class="pt-3">
                Av. Cvln. Jorge Álvarez del Castillo núm. 1442<br>
                Col. Lomas del Country<br>
                Guadalajara, Jalisco. México.
            </p>
        </div>
        <div class="col-md-3 location">
            <i class="bi bi-geo-alt-fill"></i> <span>Sucursal</span>
            <p class="pt-3">
                Av. Mariano Otero núm. 3519<br>
                Col. La Calma<br>
                Zapopan, Jalisco. México.
            </p>
        </div>
        <div class="col-md-2 text-center social-media mb-4">
            <div class="pt-4">
                <a href="{{ env('SOCIAL_FACEBOOK') }}" target="_blank"
                   data-bs-toggle="tooltip"
                   title="Danos Like en Facebook"
                >
                    <i class="bi bi-facebook"></i>
                </a>
                <a href="{{ env('SOCIAL_INSTAGRAM') }}" target="_blank"
                   data-bs-toggle="tooltip"
                   title="Síguenos en Instagram"
                >
                    <i class="bi bi-instagram"></i>
                </a>
                <a href="{{ env('SOCIAL_LINKEDIN') }}" target="_blank"
                   data-bs-toggle="tooltip"
                   title="Conectar en LinkedIn"
                >
                    <i class="bi bi-linkedin"></i>
                </a>
            </div>
            <a class="mb-sm-3" href="{{ route('aviso-privacidad') }}">Aviso de privacidad</a>
        </div>
        <div class="col-md-3 contact">
            <span class="d-block mb-3 text-center">Contacto y ventas</span>

            <div class="d-flex align-items-center justify-content-end">
                {{ env('TEL_LOCAL_SHOW') }} <i class="bi bi-telephone transform-flip"></i>
            </div>
            <div class="d-flex align-items-center justify-content-end">
                {{ env('TEL_WHATS_SHOW') }} <i class="bi bi-whatsapp"></i>
            </div>
            <div class="d-flex align-items-center justify-content-end">
                {{ env('CONTACT_EMAIL') }} <i class="bi bi-envelope"></i>
            </div>
        </div>
    </div>
    <div class="row bg-black text-white mt-3">
        <div class="col-md-12 text-center p-1">
            <small>&copy;{{ date('Y') }} Equi-par.com | Made with <span data-bs-toggle="tooltip" title="www.dispersion.mx">♥️</span></small>
        </div>
    </div>
</footer>