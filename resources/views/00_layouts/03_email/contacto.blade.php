<!doctype html>
<html lang="es">
	<head>
		<meta charset="UTF-8">
		<title>Formulario de contacto</title>
	</head>
	<body>
		<img width="232" height="88" alt="Logo Equipar" src="{{ asset('/images/template/equipar-id--red.png') }}">
		<br>
		<b>Nombre:</b> <span>{!! $nombre !!}</span><br>
		<b>Correo electrónico:</b> <span>{!! $correo !!}</span><br>
		<b>Empresa:</b> <span>{!! $empresa !!}</span><br>
		<b>Teléfono:</b> <span>{!! $telefono !!}</span><br>
		<b>Asunto:</b> <span>{!! $asunto !!}</span><br>
		<b>Mensaje:</b> <span>{!! $cuerpo !!}</span>
	</body>
</html>