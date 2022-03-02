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
											<span class="label">Cantidad:</span>
											<input type="hidden" name="id[]" value="{{ $quote['id'] }}">
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

		@include('01_website.ubicaciones')
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