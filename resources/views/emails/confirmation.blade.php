<html>
	<head>
		<title>Correo de registro</title>
	</head>
	<body>
		<table>
			<tr><td>Hola, {{ $name }}!</td></tr>
			<tr><td>&nbsp;</td></tr>
			<tr><td>Presione click en el siguiente enlace, para activar la cuenta:</td></tr>
			<tr><td>&nbsp;</td></tr>
			<tr><td><a href="{{ url('confirm/'.$code) }}">Confirmar cuenta!!</a></td></tr>
			<tr><td>&nbsp;</td></tr>
        </table>

	</body>
</html>
