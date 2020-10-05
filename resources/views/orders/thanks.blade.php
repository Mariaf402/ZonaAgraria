@extends('layouts.principal')
@section('title')
    Inicio
@endsection
@section('content')

    <div class="wrapper">
        <div class="all-product-grid">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-6 col-md-8">
                        <div class="order-placed-dt">
                            <i class="uil uil-check-circle icon-circle"></i>
                            <h2>Pedido realizado correctamente</h2>
                            <p>Tu orden ha sido todo un éxito el vendedor te dará respuesta en menos de nada </p>
                            <div class="delivery-address-bg">

                                <ul class="address-placed-dt1">
                                    <li><p><i class="uil uil-card-atm"></i>Orden :<span>{{ Session::get('order_id') }}</span></p></li>
                                </ul>
                                <div class="stay-invoice">
                                    <div class="st-hm">Quedate en casa<i class="uil uil-smile"></i></div>

                                </div>
                                <div class="placed-bottom-dt">
                                    El pago es de <span>$ {{ Session::get('grand_total') }}</span>el cual harás cuando llegue tu pedido.
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection

<?php
Session::forget('grand_total');
Session::forget('order_id');
?>
