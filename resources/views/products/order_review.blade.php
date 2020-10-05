@extends('layouts.frontLayout.front_design')
@section('content')
<?php use App\Product; ?>
<section id="cart_items">
		<div class="container">
			<div class="row">
				@if(Session::has('flash_message_error'))
		            <div class="alert alert-error alert-block" style="background-color:#f4d2d2">
		                <button type="button" class="close" data-dismiss="alert">×</button>
		                    <strong>{!! session('flash_message_error') !!}</strong>
		            </div>
        		@endif
				<div class="col-sm-4 col-sm-offset-1">
					<div class="login-form">
						<h2>Datos del comprador</h2>
							<div class="form-group">
								Nombre: {{ $userDetails->name }}
							</div>
							<div class="form-group">
                                Dirección: {{ $userDetails->address }}>

							</div>
							<div class="form-group">
								Ciudad: {{ $userDetails->city }}
							</div>
							<div class="form-group">
								Estado: {{ $userDetails->state }}
							</div>
							<div class="form-group">
								País: {{ $userDetails->country }}
							</div>
							<div class="form-group">
                                código PIN: {{ $userDetails->pincode }}
							</div>
							<div class="form-group">
                                Móvil: {{ $userDetails->mobile }}
							</div>
					</div>
				</div>
				<div class="col-sm-1">
					<h2></h2>
				</div>
			</div>

			<div class="review-payment">
				<h2>Revisión y pago</h2>
			</div>

			<div class="table-responsive cart_info">
				<table class="table table-condensed">
					<thead>
						<tr class="cart_menu">
							<td class="image">Producto</td>
							<td class="description" hidden></td>
							<td class="price">Precio</td>
							<td class="quantity">Cantidad</td>
							<td class="total">Total</td>
						</tr>
					</thead>
					<tbody>
						<?php $total_amount = 0; ?>
						@foreach($userCart as $cart)
						<tr>

							<td class="cart_description">
								<h4><a href="">{{ $cart->product_name }}</a></h4>

							</td>
							<td class="cart_price">
								<?php $product_price = Product::getProductPrice($cart->product_id,$cart->size); ?>
								<p>$ {{ $product_price }}</p>
							</td>
							<td class="cart_quantity">
								<div class="cart_quantity_button">
									{{ $cart->quantity }}
								</div>
							</td>
							<td class="cart_total">
								<p class="cart_total_price">$ {{ $product_price*$cart->quantity }}</p>
							</td>
						</tr>
						<?php $total_amount = $total_amount + ($product_price*$cart->quantity); ?>
						@endforeach
						<tr>
							<td colspan="4">&nbsp;</td>
							<td colspan="2">
								<table class="table table-condensed total-result">
									<tr>
										<td>Total a pagar del carrito</td>
										<td>COP {{ $total_amount }}</td>
									</tr>

									<tr>
										<td>Total a pagar</td>

										<td><span class="btn-secondary" data-toggle="tooltip" data-html="true" title="

								">$ {{ $total_amount }}</span></td>
									</tr>
								</table>
							</td>
						</tr>
					</tbody>
				</table>
			</div>
			<form name="paymentForm" id="paymentForm" action="{{ url('/place-order') }}" method="post">{{ csrf_field() }}
				<input type="hidden" name="grand_total" value="{{ $total_amount }}">
				<div class="payment-options">
					<span>
						<label><strong>Seleccione por favor el metodo de pago:</strong></label>
					</span>
					<span>
						<label><input type="radio" name="payment_method" id="COD" value="COD" required> <strong>Acuerdo con el vendedor</strong></label>
					</span>
					<span style="float:right;">
						<button type="submit" class="btn btn-default" onclick="return selectPaymentMethod();">Hacer orden</button>
					</span>
				</div>
			</form>
		</div>
	</section> <!--/#cart_items-->

@endsection
