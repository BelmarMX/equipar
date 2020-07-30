<div id="SendUsWhats">
    <a href="https://api.whatsapp.com/send?phone=523318043797&text=Para%20brindarte%20un%20mejor%20servicio%20por%20favor%20proporcionanos%20tus%20datos%20(Nombre,%20Correo%20electrónico,%20 y%20asunto)" uk-tooltip title="Contáctanos Vía Whatsapp" target="_blank">
        <img width="75" height="75" src="{{ asset('/images/template/whatsapp.png') }}" alt="Envíanos un Whatsapp">
    </a>
</div>
<footer>
    <img class="foot-img" src="{{ asset('/images/template/footer-image.png') }}" width="194" height="206" alt="Elemento industrial del footer" uk-scrollspy="cls:uk-animation-scale-down">
    <div class="bgContainer">
        <div class="uk-container">
            <div class="uk-child-width-1-3@m rm-mrg" uk-grid>
                <div class="uk-padding-small">
                    <span class="uk-display-block ff-primary-font italic white rem2 uk-text-center">Ponte en contacto</span>

                    <div uk-grid class="uk-margin-top">
                        <div class="uk-width-1-5">
                            <img src="{{ asset('/images/template/ico-position.svg') }}" width="40" height="40" alt="Ubicación">
                        </div>
                        <div class="uk-width-4-5 foot-location">
                            Mariano Otero #3519<br>
                            Col. La Calma<br>
                            Zapopan, Jalisco. México<br>
                            01 (33) 2886 2661<br>
                            atencionaclientes@equi-par.com
                        </div>
                    </div>
                </div>
                <div class="uk-text-center uk-padding-small bg-blue">
                    <span class="uk-display-block ff-primary-font italic white rem2 uk-text-center">Encuéntranos en redes</span>

                    <div uk-grid class="uk-margin-top">
                        <div class="uk-width-1-1">
                            <a href="#" class="uk-margin social">
                                <img src="{{ asset('/images/template/ico-facebook.svg') }}" width="23" height="23" alt="Facebook">
                            </a>
                            <a href="#" class="uk-margin-left social">
                                <img src="{{ asset('/images/template/ico-twitter.svg') }}" width="28" height="23" alt="Twitter">
                            </a>
                            <a href="#" class="uk-margin-left social">
                                <img src="{{ asset('/images/template/ico-instagram.svg') }}" width="23" height="23" alt="Instagram">
                            </a>
                        </div>
                    </div>
                </div>
                <div class="uk-text-right uk-padding-small pt-80">
                    <a href="{{ route('contacto') }}">Contacto</a><br>
                    <a href="{{ route('aviso-privacidad') }}">Aviso de privacidad</a>
                </div>
            </div>
        </div>
    </div>
</footer>