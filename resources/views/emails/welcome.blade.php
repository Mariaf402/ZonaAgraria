<html>
	<head>
		<title>Email de bienvenida</title>
	</head>
	<body>
	<table style="max-width: 600px; padding: 10px; margin:0 auto; border-collapse: collapse;">
			<tr><td>ZonAgraria</td></tr>
	<tr>
		<td style="background-color: #ecf0f1; text-align: left; padding: 0">
			<a href="">
			<img src="{{ $message->embed(public_path().'/images/frontend_images/home/ZONAGRARIA_TIENDAVIRTUAL.png') }}">
			</a>
		</td>
	</tr>

	<tr>
		<td style="background-color: #ecf0f1">
			<div style="color: #34495e; margin: 4% 10% 2%; text-align: justify;font-family: sans-serif">
				<h2 style="color: #e67e22; margin: 0 0 7px">Hola {{ $name }}!!</h2>
				<p style="margin: 2px; font-size: 15px">
				    Tu cuenta ha sido creada correctamente.<br>
					 Gracias por elegirnos:<br>

					<br>
					<br>

				<div style="width: 100%; text-align: center">
					<a style="text-decoration: none; border-radius: 5px; padding: 11px 23px; color: white; background-color: #b03a2e" href="" >Gracias por tu atención</a>
				</div>
				<p style="color: #b3b3b3; font-size: 12px; text-align: center;margin: 30px 0 0">ZonAgraria 2020Y</p>
			</div>
		</td>
	</tr>
</table>
	</body>
