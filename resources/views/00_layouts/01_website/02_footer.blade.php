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
					<span class="uk-display-block ff-primary-font white bold rem2 uk-text-center">¡Contáctanos!</span>

					<div uk-grid class="uk-margin-small-top">
						<div class="uk-width-1-5">
							<img src="{{ asset('/images/template/ico-position.svg') }}" width="40" height="40" alt="Ubicación">
						</div>
						<div class="uk-width-4-5 foot-location">
							<strong>Matriz:</strong>
							Av. Cvln. Jorge Álvarez del Castillo #1442, col. Lomas del Country<br>
							Guadalajara, Jalisco. México.
						</div>
					</div>
					<div uk-grid class="uk-margin-small-top">
						<div class="uk-width-1-5">
							<img src="{{ asset('/images/template/ico-position.svg') }}" width="40" height="40" alt="Ubicación">
						</div>
						<div class="uk-width-4-5 foot-location">
							<strong>Sucursal:</strong>
							Mariano Otero #3519, col. La Calma<br>
							Zapopan, Jalisco. México.
						</div>
					</div>
				</div>
				<div class="uk-text-center uk-padding-small bg-blue">
					<span class="uk-display-block ff-primary-font bold white rem2 uk-text-center">Síguenos también en</span>

					<div uk-grid class="uk-margin-small-top">
						<div class="uk-width-1-1">
							<a href="https://www.facebook.com/equiparcocinas/" target="_blank" class="uk-margin social" uk-tooltip title="Facebook">
								<span uk-icon="icon:facebook; ratio:1.5"></span>
							</a>
							<a href="https://www.linkedin.com/in/equipar-servicios-integrales-7257081b1/" target="_blank" class="uk-margin-left social" uk-tooltip title="LinkedIn">
								<span uk-icon="icon:linkedin; ratio:1.5"></span>
							</a>
							<a href="https://www.instagram.com/equiparcocinas/?hl=es-la" target="_blank" class="uk-margin-left social" uk-tooltip title="Instagram">
								<span uk-icon="icon:instagram; ratio:1.5"></span>
							</a>
						</div>
					</div>

					<div class="foot-location" style="margin-top: 10px;">
						01 (33) 2886 2661<br>
						atencionaclientes@equi-par.com
					</div>
				</div>
				<div class="uk-text-right uk-padding-small pt-80">
					<a style="margin-right:60px" href="{{ route('contacto') }}">Contacto</a><br>
					<a style="margin-right:60px" href="{{ route('aviso-privacidad') }}">Aviso de privacidad</a>
				</div>
			</div>
		</div>
	</div>
</footer>