@include('frontend_v2.master.floating-contact-button')

<footer class="container-fluid mt-5">
    <div class="row">
        <div class="col-md-4">
            <i class="bi bi-geo-alt-fill"></i> Matriz
            <p>
                Av. Cvln. Jorge Álvarez del Castillo núm. 1442<br>
                Col. Lomas del Country<br>
                Guadalajara, Jalisco. México.
            </p>
        </div>
        <div class="col-md-4">
            <i class="bi bi-geo-alt-fill"></i> Sucursal
            <p>
                Av. Mariano Otero núm. 3519<br>
                Col. La Calma<br>
                Zapopan, Jalisco. México.
            </p>
        </div>
        <div class="col-md-2 text-center">
            <div>
                <a href="#">
                    <i class="bi bi-facebook"></i>
                </a>
                <a href="#">
                    <i class="bi bi-instagram"></i>
                </a>
                <a href="#">
                    <i class="bi bi-linkedin"></i>
                </a>
            </div>
            <a href="#">Aviso de privacidad</a>
        </div>
        <div class="col-md-2">
            Contacto y ventas
            <div class="d-flex align-items-center justify-content-end">
                (33) 2886 2661 <i class="bi bi-telephone transform-flip"></i>
            </div>
            <div class="d-flex align-items-center justify-content-end">
                33 2834 7073 <i class="bi bi-whatsapp"></i>
            </div>
            <div class="d-flex align-items-center justify-content-end">
                atencionaclientes@equi-par.com <i class="bi bi-envelope"></i>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 text-center">
            &copy;{{ date('Y') }} Equi-par.com | Made with ♥️
        </div>
    </div>
</footer>