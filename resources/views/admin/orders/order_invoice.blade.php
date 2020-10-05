<html>
	<head>
		@if($tipo=="")
		<link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
@else
<style>
	.container {
		width: 85%;
    margin-right: auto;
    margin-left: auto;
}
.row {
    margin-left: -15px;
    margin-right: -15px;
}
.col-xs-12 {
    width: 100%;
}
.pull-right {
    float: right!important;
}

h3, .h3 {
    font-size: 24px;
}
h1, .h1, h2, .h2, h3, .h3 {
    margin-top: 20px;
    margin-bottom: 10px;
}
h1, h2, h3, h4, h5, h6, .h1, .h2, .h3, .h4, .h5, .h6 {
    font-family: inherit;
    font-weight: 500;
    line-height: 1.1;
    color: inherit;
}
.col-xs-4 {
    width: 40%;
}
.col-xs-6 {
    width: 50%;
}
.text-right {
    text-align: right;
}
	.table {
    width: 100%;
    margin-bottom: 15px;
}
table {
    max-width: 100%;
    background-color: transparent;
    border-collapse: collapse;
    border-spacing: 0;
    display: table;
    border-collapse: separate;
    box-sizing: border-box;
    white-space: normal;
    line-height: normal;
    font-weight: normal;
    font-size: medium;
    font-style: normal;
    color: -internal-quirk-inherit;
    text-align: start;
    border-spacing: 2px;
    border-color: grey;
    font-variant: normal;
}</style>
@endif
	</head><body>
<!------ Include the above in your HEAD tag ---------->
<div class="container">
	<p>
    <div class="row">
        <div class="col-xs-12">
    		<div class="invoice-title">
    			<h2>Factura</h2>
    		</div>
    		<hr>
    		<div class="invoice-title">
                <h3 class="pull-right" style="margin-right: 15px; margin-top: 15px">Orden # {{ $orderDetails->id }} 
                    <span style="float:right;"><?php /*echo DNS1D::getBarcodeHTML($orderDetails->id, "C39");*/ ?></span></h3>
    		</div>
    		<div class="row">
    			<div class="col-xs-6">
    				<address>
					<strong>Facturado a:</strong><br>
					@if(isset($userDetails->name))
						{{ $userDetails->name }} <br>
						{{ $userDetails->address }} <br>
		                {{ $userDetails->city }} <br>
		                {{ $userDetails->state }} <br>
		                {{ $userDetails->country }} <br>
		                {{ $userDetails->pincode }} <br>
						{{ $userDetails->mobile }} <br>
						
						@endif
		                
    				</address>
				</div>
    			<div class="col-xs-6 text-right">
    				<address>
        			<strong>Enviado a:</strong><br>
    					{{ $orderDetails->name }} <br>
		                {{ $orderDetails->address }} <br>
		                {{ $orderDetails->city }} <br>
		                {{ $orderDetails->state }} <br>
		                {{ $orderDetails->country }} <br>
		                {{ $orderDetails->pincode }} <br>
		                {{ $orderDetails->mobile }}
    				</address>
    			</div>
				<p>
    			<div class="col-xs-12">    				
						<label>
						<div style="font-weight: bold">Metodo de Pago:</div>
						<div>{{ $orderDetails->payment_method }}</div>
						</label>
    			</div></p>
				<p>
    			<div class="col-xs-12">
					<label>
					<div style="font-weight: bold">Datos orden:</div>
					<div>{{ $orderDetails->created_at }}</div>
					</label>
    			</div></p>
    		</div>
    	</div>
    </div></p>
    <p>
    <div class="row">
    	<div class="col-md-12">
    		<div class="panel panel-default">
    			<div class="panel-heading">
    				<h3 class="panel-title"><strong>Resumen Orden</strong></h3>
    			</div>
    			<div class="panel-body">
    				<div class="table-responsive">
    					<table class="table table-condensed">
    						<thead>
                                <tr>
        							<td style="width:18%"><strong>Codigo Producto</strong></td>
        							<td style="width:18%" class="text-center"><strong>Tamaño</strong></td>
        							<td style="width:18%" class="text-center"><strong>Color</strong></td>
        							<td style="width:18%" class="text-center"><strong>Precio</strong></td>
        							<td style="width:18%" class="text-center"><strong>Qty</strong></td>
        							<td style="width:18%" class="text-right"><strong>Total</strong></td>
                                </tr>
    						</thead>
    						<tbody>
    							<!-- foreach ($order->lineItems as $line) or some such thing here -->
    							<?php $Subtotal = 0; ?>
    							@foreach($orderDetails->orders as $pro)
    							<tr>
									<td class="text-left">{{ $pro->product_code }}<br><?php echo DNS2D::getBarcodeHTML($pro->product_code, "QRCODE"); ?></td>
    								<td class="text-center">{{ $pro->product_size }}</td>
    								<td class="text-center">{{ $pro->product_color }}</td>
    								<td class="text-center">INR {{ $pro->product_price }}</td>
    								<td class="text-center">{{ $pro->product_qty }}</td>
    								<td class="text-right">INR {{ $pro->product_price * $pro->product_qty }}</td>
    							</tr>
    							<?php $Subtotal = $Subtotal + ($pro->product_price * $pro->product_qty); ?>
                                @endforeach
    							<tr>
    								<td class="thick-line"></td>
    								<td class="thick-line"></td>
    								<td class="thick-line"></td>
    								<td class="thick-line"></td>
    								<td class="thick-line text-center"><strong>Subtotal</strong></td>
    								<td class="thick-line text-right">INR {{ $Subtotal }}</td>
    							</tr>
    							<tr>
    								<td class="no-line"></td>
    								<td class="no-line"></td>
    								<td class="no-line"></td>
    								<td class="no-line"></td>
    								<td class="no-line text-center"><strong>Envio Charges (+)</strong></td>
    								<td class="no-line text-right">INR 0</td>
    							</tr>
    							<tr>
    								<td class="no-line"></td>
    								<td class="no-line"></td>
    								<td class="no-line"></td>
    								<td class="no-line"></td>
    								<td class="no-line text-center"><strong>Cupon Discount (-)</strong></td>
    								<td class="no-line text-right">INR {{ $orderDetails->coupon_amount }}</td>
    							</tr>
    							<tr>
    								<td class="no-line"></td>
    								<td class="no-line"></td>
    								<td class="no-line"></td>
    								<td class="no-line"></td>
    								<td class="no-line text-center"><strong>Gran Total</strong></td>
    								<td class="no-line text-right">INR {{ $orderDetails->grand_total }}</td>
    							</tr>
    						</tbody>
    					</table>
    				</div>
    			</div>
    		</div>
    	</div>
    </div></p>
</div></body>
</html>