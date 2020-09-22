<div id="QuotationReview">
	<div class="uk-text-center">
	<img width="210" height="75" alt="Cotiza productos en promoción" src="{{ asset('/images/template/banner-cotizacion.png') }}" uk-tooltip title="Agrega productos al cotizador">
	</div>
	<br>
	@if( Session::has('cotizacion') )
	@foreach( Session::get('cotizacion') AS $i => $quote)
		<div class="item">
			<strong>{{ $quote['name'] }}</strong>
			<div class="uk-text-right">
				<span class="label">Cantidad:</span><input type="hidden" name="id[]" value="{{ $quote['id'] }}">
				<input type="numer" name="qty[{{ $quote['id'] }}][]" data-index="{{ $i }}" class="qty" value="{{ $quote['qty'] }}">
			</div>
			<span class="price">{{ number_format($quote['price'], 2, '.', ',') }}</span>
			<a class="removeQuote" data-index="{{ $i }}" uk-tooltip title="Quitar producto">
				<span uk-icon="trash"></span>
			</a>
		</div>
	@endforeach
	<div class="uk-text-center uk-margin-small-top">
		<button class="uk-button uk-button-primary" type="button" uk-toggle="target: #quotation">
			<span uk-icon="mail"></span> Enviar cotización
		</button>
	</div>
	@endif
</div>

<div id="quotation" uk-modal>
	<div class="uk-modal-dialog">
		<button class="uk-modal-close-default" type="button" uk-close></button>
		<div class="uk-modal-header">
			<div class="rounded-container bg-blue">
				<h2 class="uk-modal-title">COTIZADOR DE PROMOCIONES</h2>
			</div>
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
		<div class="uk-modal-footer uk-text-right">
			<button class="uk-button uk-button-default uk-modal-close" type="button">Cancelar</button>
		</div>
	</div>
</div>
@section('CustomJs')
	<script src="https://www.google.com/recaptcha/api.js" async defer></script>
	<script>
		var url_find	= "{{ route('cotizaciones.find') }}"
		,	url_add		= "{{ route('cotizaciones.add') }}"
		,	url_remove	= "{{ route('cotizaciones.remove') }}"
		,	url_update	= "{{ route('cotizaciones.upd') }}";
	</script>
	<script src="{{ asset('/js/quotas.js') }}"></script>
@endsection