@extends('00_layouts.01_website.app')
@section('title',       $meta['titulo'])
@section('descripcion', $meta['descripcion'])
@section('imagen',      $meta['imagen'])
@section('Content')
    <div id="anc">
        <div class="uk-container uk-margin-large-top" uk-scrollspy="cls:uk-animation-fade">
            <div class="uk-width-3-5@m">
                <div class="rounded-container bg-blue">
                    <h1 class="uk-text-uppercase">Cotizador de productos</h1>
                </div>
            </div>
            <div class="uk-margin-medium-top" uk-grid>
                <div class="uk-width-3-5@m">
                    @include('00_layouts.01_website.03_alert')

					<div id="QuotationReview">
						@if( Session::has('cotizacion') )
						@foreach( Session::get('cotizacion') AS $i => $quote)
							<div class="item">
								<div uk-grid class="uk-grid-collapse">
									<div class="uk-width-1-6">
										<a class="removeQuote" data-index="{{ $i }}" uk-tooltip title="Quitar producto">
											<span uk-icon="trash"></span>
										</a>
									</div>
									<div class="uk-width-3-5">
										<strong>{{ $quote['name'] }}</strong>
									</div>
									<div class="uk-width-1-5@m uk-text-right">
										<div>
											<span class="label">Cantidad:</span><input type="hidden" name="id[]" value="{{ $quote['id'] }}">
											<input type="numer" name="qty[{{ $quote['id'] }}][]" data-index="{{ $i }}" class="qty" value="{{ $quote['qty'] }}">
										</div>
										<span class="price">{{ number_format($quote['price'], 2, '.', ',') }}</span>
									</div>
								</div>
							</div>
						@endforeach
						@else
							<div class="uk-alert-warning uk-alert" >
								<p>No has agregado productos al cotizador.</p>
							</div>
						@endif
					</div>
                </div>
                <div class="uk-width-2-5@m">
					<div id="quotation">
						<div style="background-color: #FFF;">
							<div class="uk-modal-header">
								<strong class="ff-secondary-font light">Recibe la cotización de tus productos seleccionados por correo electrónico.</strong>
							</div>
							<div class="uk-modal-body uk-padding-small">
								<form class="quotas uk-form-stacked" enctype="multipart/form-data" method="post" action="{{ route('cotizaciones.mail') }}">
									@csrf
									<div class="uk-margin">
										<label>Mi Correo electrónico *</label>
										<input id="exist" name="exists" type="hidden">
										<input id="txtcorreo" name="email" type="email" placeholder="mail@domain.com" required>
									</div>
									<div class="uk-margin">
										<label>Mi nombre *</label>
										<input id="txtnombre" name="nombre" type="text" placeholder="Mi nombre completo" required>
									</div>
									<div class="uk-margin">
										<label>Mi teléfono *</label>
										<input id="txttel" name="phone" type="text" placeholder="Teléfono" required>
									</div>
									<div class="uk-margin">
										<label>Mi empresa</label>
										<input id="txtcompany" name="company" type="text" placeholder="Empresa">
									</div>
									<div class="uk-margin">
										<label>Mi ciudad *</label>
										<input id="txtciudad" name="city" type="text" placeholder="Ciudad" required>
									</div>
									<div class="uk-margin">
										<label>Mi estado *</label>
										<select id="txtestado" name="state" required>
											<option value="" selected>Estado</option>
											{{ estados() }}
										</select>
									</div>
									<div class="uk-margin">
										<label>¿Tienes comentarios adicionales?</label>
										<textarea id="txtcomentario" name="comments" placeholder="comentarios"></textarea>
									</div>
									<div class="uk-margin">
										<div class="g-recaptcha" data-sitekey="{{ env('CAPTCHA_PUBLIC') }}"></div>
									</div>
									<div class="uk-margin uk-text-center">
										<div class="FormSending mb-3" style="display:none">
											<div uk-spinner></div> Enviando, espere por favor...<br>
										</div>
										<button class="mt-1 uk-button button-submit-prevent">Enviar</button>
									</div>
								</form>
							</div>
						</div>
					</div>
                </div>
            </div>
        </div>

        <div class="uk-container uk-margin-medium-top" uk-scrollspy="cls:uk-animation-fade">
            <div class="uk-width-3-5@m">
                <div class="rounded-container bg-gray">
                    <h1 class="uk-text-uppercase">Ubicación</h1>
                </div>
            </div>
            <div class="uk-margin-small" uk-grid>
                <div class="uk-width-3-5@m">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3733.7183108720524!2d-103.41785448531651!3d20.640335586210117!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8428ac3771334f73%3A0x30b1ae0d168d0eb4!2sAv%20Mariano%20Otero%203519%2C%20La%20Calma%2C%2045070%20Zapopan%2C%20Jal.!5e0!3m2!1ses!2smx!4v1573688100464!5m2!1ses!2smx" width="100%" height="600" frameborder="0" style="border:0" allowfullscreen></iframe>
                </div>
                <div class="uk-width-2-5@m">
                    <div class="uk-grid-collapse uk-child-width-expand@s" uk-grid>
                        <div class="uk-width-1-5">
                            <div class="rounded bg-orange">
                                <i class="material-icons">location_on</i>
                            </div>
                        </div>
                        <div class="uk-width-4-5">
                            <span class="info direccion">Mariano Otero #3519<br>Col. La calma<br>Zapopan, Jalisco. México<br>C.P. 45070</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('CustomJs')
	<script src="https://www.google.com/recaptcha/api.js" async defer></script>
	<script>
		var url_find	= "{{ route('cotizaciones.find') }}"
		,	url_add		= "{{ route('cotizaciones.add') }}"
		,	url_remove	= "{{ route('cotizaciones.remove') }}"
		,	url_update	= "{{ route('cotizaciones.upd') }}";
	</script>
	<script src="{{ asset('/js/quotas.js') }}"></script>
    <script type="text/javascript">
        $('.button-submit-prevent').on('click', function(e){
            $('.FormSending').show();
            setTimeout(function(){ $('.FormSending').fadeOut(); }, 4500);
        });
    </script>
@endsection