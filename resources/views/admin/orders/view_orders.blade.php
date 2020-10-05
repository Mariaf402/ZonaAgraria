@extends('layouts.adminLayout.admin_design')
@section('content')

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="header-icon">
                <i class="fa fa-eye"></i>
            </div>
            <div class="header-title">
                <h1>Ordeness</h1>
                <small>Lista de ordenes</small>
            </div>
        </section>
        @if(Session::has('flash_message_error'))
            <div class="alert alert-danger alert-block">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <strong>{{ session('flash_message_error') }}</strong>
            </div>
        @endif
        @if(Session::has('flash_message_success'))
            <div class="alert alert-success alert-block">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <strong>{{ session('flash_message_success') }}</strong>
            </div>
        @endif
        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-sm-12">
                    <div class="panel panel-bd lobidrag">
                        <div class="panel-heading">
                            <div class="btn-group" id="buttonexport">
                                <a href="#">
                                    <h4>Ver Ordenes</h4>
                                </a>
                            </div>
                        </div>
                        <div class="panel-body">
                            <!-- Plugin content:powerpoint,txt,pdf,png,word,xl -->
                            <div class="table-responsive">
                                <table id="table_id" class="table table-bordered table-striped table-hover">
                                    <thead>
                                    <tr class="info">
                                        <th>Orden ID</th>
                                        <th>Dato orden</th>
                                        <th>Nombre del cliente</th>
                                        <th>Correo electrónico del cliente</th>
                                        <th>Productos pedidos</th>
                                        <th>Total de la orden</th>
                                        <th>Estado del pedido</th>
                                        <th>Método de pago</th>
                                        <th>Acciones</th>
                                    </tr>
                                    </thead>
                                    @foreach($orders as $order)
                                        <tr class="gradeX">
                                            <td class="center">{{ $order->id }}</td>
                                            <td class="center">{{ $order->created_at }}</td>
                                            <td class="center">{{ $order->name }}</td>
                                            <td class="center">{{ $order->user_email }}</td>
                                            <td class="center">
                                                @foreach($order->orders as $pro)
                                                    {{ $pro->product_code }}
                                                    ({{ $pro->product_qty }})
                                                    <br>
                                                @endforeach
                                            </td>
                                            <td class="center">{{ $order->grand_total }}</td>
                                            <td class="center">{{ $order->order_status }}</td>
                                            <td class="center">{{ $order->payment_method }}</td>
                                            <td class="center">
                                                <a target="_blank" href="{{ url('admin/view-order/'.$order->id)}}" class="btn btn-primary btn-sm"><i class="fa fa-shopping-cart"></i></a><br><br>
                                                @if($order->order_status == "Shipped" || $order->order_status == "Delivered" || $order->order_status == "Paid")
                                                    <a target="_blank" href="{{ url('admin/view-order-invoice/'.$order->id)}}" class="btn btn-warning btn-mini">Ver orden Factura</a><br><br>
                                                    <a target="_blank" href="{{ url('admin/view-order-invoice/'.$order->id.'/pdf')}}" class="btn btn-primary btn-mini">Ver PDF Factura</a>
                                                @endif
                                            </td>
                                        </tr>
                                        @endforeach
                                        </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
@endsection
