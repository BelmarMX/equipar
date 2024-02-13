<!doctype html>
<html lang="es">
	<head>
		<meta charset="UTF-8">
		<title>Formulario de cotizaciones</title>
	</head>
	<body>
		<style>
			*{
				font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif
			}
		</style>
		</body>
		<img width="232" height="61" alt="Logo Equipar" src="{{ asset('/images/template/equipar-id--red.png') }}">
		@if( !empty($promocion) )
		<div id="promomes" style="text-align:center">
			<a href="{{ route('promociones', $promocion -> slug)}}">
				<img width="{{ env('PROMOS_WIDTH') }}" height="{{ env('PROMOS_HEIGHT') }}" src="{{ url('storage/'. env('PROMOS_FOLDER') .$promocion -> image) }}" alt="{{ $promocion -> title }}">
			</a>
		</div>
		@endif
 
		<h1>Detalle de tu cotización</h1>
		<b>Nombre:</b> <span>{{ $cliente -> nombre }}</span><br>
		<b>Correo electrónico:</b> <span>{{ $cliente -> email }}</span><br>
		<b>Teléfono:</b> <span>{{ $cliente -> phone }}</span><br>
		<b>Empresa:</b> <span>{{ $cliente -> company }}</span><br>
		<b>Ciudad:</b> <span>{{ $cliente -> city }}</span><br>
		<b>Estado:</b> <span>{{ $cliente -> state }}</span><br>
		<b>Comentarios:</b> <span>{{ $cliente -> comments }}</span><br>
		<br>
		<br>
		<table style="border-collapse:collapse;">
			<thead>
				<tr>
					<th></th>
					<th>Detalles</th>
					<th></th>
					<th>Cantidad</th>
					<th>Precio<br>normal</th>
					<th>Precio<br>de promoción</th>
					<th>Total</th>
					<th></th>
				</tr>
			</thead>
			<tbody>
			@foreach($productos AS $producto)
				<tr style="border-bottom: 1px solid #e4e4e4">
					<td style="width: 80px;"><img src="{{ url('storage/'.env('PRODUCT_FOLDER') . $producto['imagen']) }}" width="80"></td>
					<td><strong>{{ $producto['title'] }}</strong><br><b>Modelo:</b> <small>{{ $producto['modelo'] }}</small><br><b>Marca:</b> <small>{{ $producto['marca'] }}</small></td>
					<td><small>{{ mb_strtoupper($producto['categoria']) }}</small><br><small>{{ mb_strtoupper($producto['subcategoria']) }}</small></td>
					<td style="text-align:center;">{{ $producto['cantidad'] }}</td>
					<td style="text-align:right; padding:3px;">${{ number_format($producto['unitario'], 2, '.', ',') }}</td>
					<td style="text-align:right; padding:3px;">${{ number_format($producto['unitario_promo'], 2, '.', ',') }}</td>
					<td style="text-align:right; padding:3px;"><b>${{ number_format($producto['total'], 2, '.', ',') }}</b></td>
					<td>
						<a style="display:block;width:100px; padding:3px;color:#FFF;background:#42C8F5;font-size:14px;text-decoration:none; margin-left:5px;" href="{{ $producto['uri'] }}">VER<br>PRODUCTO</a>
					</td>
				</tr>
			@endforeach
			</tbody>
		</table>
		<br>
		<br>
		@if( !empty($promocion) )
		<small>Vigencia de la promoción: {{ \Carbon\Carbon::parse($promocion -> end) -> format('m/d/Y') }}</small><br>
		@endif
		Gracias,<br>
		{{ config('app.name') }}
	</body>
</html>