@extends('layouts.frontLayout.front_design')

@section('content')
<?php use App\Product; ?>
<link rel="stylesheet" href="{{asset('css/backend_css/sweetalert.css')}}">
<script src="{{asset('js/backend_js/sweetalert.min.js')}}"></script>
<section id="cart_items">
    <div class="container">
        <div class="breadcrumbs">
            <ol class="breadcrumb">
            <li><a href="#">Home</a></li>
                <li class="active">Carrito de compras</li>
            </ol>
        </div>
        <div class="table-responsive cart_info">
            @if(Session::has('flash_message_success'))
                <div class="alert alert-success alert-block">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                    <strong>{!! session('flash_message_success') !!}</strong>
                </div>
            @endif
            @if(Session::has('flash_message_error'))
                <div class="alert alert-error alert-block" style="background-color:#f4d2d2">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                    <strong>{!! session('flash_message_error') !!}</strong>
                </div>
            @endif
            <table class="table table-condensed">
                <thead>
                <tr class="cart_menu">
                    <td class="image">Item</td>
                    <td class="description">Nombre</td>
                    <td class="price">Precio</td>
                    <td class="quantity">Cantidad</td>
                    <td class="total">Total</td>
                    <td class="acciones">Acciones</td>
                </tr>
                </thead>
                <tbody>
                <?php $total_amount = 0; ?>
                @foreach($userCart as $cart)
                    <tr>
                        <td class="cart_product">
                            <a href=""><img src="{{ asset('/images/backend_images/product/small/'.$cart->image)}} " width="100" height="100"></a>
                        </td>
                        <td class="cart_description">
                            <h4><a >{{ $cart->product_name }}</a></h4>
                             <p>Código del producto: {{$cart->product_code}}</p>
                        </td>
                        <td class="cart_price">
                            <p>$ {{ $cart->price }}</p>
                        </td>
                        <td class="cart_quantity">
                            <div class="cart_quantity_button">
                                <a class="cart_quantity_up" href="{{ url('/cart/update-quantity/'.$cart->id.'/1') }}"> + </a>
                                <input class="cart_quantity_input" type="text" name="quantity" value="{{ $cart->quantity }}" autocomplete="off" size="2">
                                @if($cart->quantity>1)
                                    <a class="cart_quantity_down" href="{{ url('/cart/update-quantity/'.$cart->id.'/-1') }}"> - </a>
                                @endif
                            </div>
                        </td>
                        <td class="cart_total">
                            <p class="cart_total_price"> $ {{ $cart->price*$cart->quantity }}</p>
                        </td>
                        <td class="cart_delete">
                            <a id="delcat" onclick="Delete('{{$cart->id}}')" href="#"  class="btn btn-danger btn-mini deleteRecord">Eliminar</a>
                        </td>
                    </tr>
                    <?php $total_amount = $total_amount + ($cart->price*$cart->quantity); ?>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</section> <!--/#cart_items-->

<section id="do_action">
	<div class="container">
		<div class="heading">
			<h3>¿Qué te gustaria hacer ahora?</h3>
			<p>Elija si tiene un código de cupón que desea usar.</p>
		</div>
		<div class="row">
			<div class="col-sm-6">
				<div class="chose_area">
					<ul class="user_option">
                        <li>
                            <form action="{{url('cart/apply-coupon')}}" method="post">{{csrf_field()}}
                            <label>Codigo del cupon</label>
                                <input type="text" name="coupon_code">
                                <input type="submit" value="Aplicar" class="btn btn-primary btn-mini ">
                            </form>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="total_area">
                    <ul>
                        @if(!empty(Session::get('CouponAmount')))
                            <li> Sub total <span>$ <?php echo $total_amount; ?></span></li>
                            <li> Descuento del cupón <span>$ <?php echo Session::get('CouponAmount');?></span></li>
                            <li> Total <span>$ <?php echo $total_amount - Session::get('CouponAmount'); ?></span></li>
                        @else
                            <li> Total <span>$ <?php echo $total_amount; ?></span></li>
                        @endif
                    </ul>
                    <a class="btn btn-default check_out" href="{{ url('/checkout') }}">Comprar Productos</a>

                </div>
            </div>
        </div>
    </div>
</section>
<script>
		//Mensajes de confirmacion para eliminar
        function Delete(id) {

            swal({
                    title: "Eliminar",
                    text: "Esta seguro",
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#79B03D",
					 confirmButtonText: "Si",

                    closeOnConfirm: true
                },
                function (isConfirm) {
                    if (isConfirm) {
                        var url = "{{ url('/cart/delete-product/%id%') }}";
                        url = url.replace('%id%', id);

                        window.location.href = url;
                    }
                });
        }
</script>
@endsection
