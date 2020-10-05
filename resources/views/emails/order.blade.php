<html>
<body>
	<table width='700px'>
		<tr><td>&nbsp;</td></tr>
		<tr><td><img src="{{ asset('principal/ico/LOGO_ZONAGRARIA.png') }}"></td></tr>
		<tr><td>&nbsp;</td></tr>

		<tr><td>&nbsp;</td></tr>
		<tr><td>Muchas gracias por elegirnos! Los detalles de la orden son:-</td></tr>
		<tr><td>&nbsp;</td></tr>
		<tr><td>Numero de orden: {{ $order_id }}</td></tr>
		<tr><td>&nbsp;</td></tr>
		<tr><td>
			<table width='95%' cellpadding="5" cellspacing="5" bgcolor="#f7f4f4">
				<tr bgcolor="#fff">
					<td>Nombre del producto</td>
					<td>Codigo del producto</td>
					<td>Color</td>
					<td>Cantidad</td>
					<td>Precio Unidad</td>
				</tr>
				@foreach($productDetails['orders'] as $product)
					<tr>
						<td>{{ $product['product_name'] }}</td>
						<td>{{ $product['product_code'] }}</td>
						<td>{{ $product['product_color'] }}</td>
						<td>{{ $product['product_qty'] }}</td>
						<td>COP {{ $product['product_price'] }}</td>
					</tr>
				@endforeach
				<tr>
					<td colspan="5" align="right">Total</td><td>COP {{ $productDetails['grand_total'] }}</td>
				</tr>
			</table>
		</td></tr>

		<tr><td>&nbsp;</td></tr>
		<tr><td>Si tiene problemas, por favor contactenos<a href="informacion@zonaAgraria.com">informacion@zonaAgraria.com</a></td></tr>
		<tr><td>&nbsp;</td></tr>

		<tr><td>&nbsp;</td></tr>
	</table>
</body>
</html>
