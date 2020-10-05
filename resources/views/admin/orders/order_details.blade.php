@extends('layouts.adminLayout.admin_design')
@section('title','View Orders')
@section('content')

<!--main-container-part-->
<div class="content-wrapper">
  <div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="#" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Casa</a> <a href="#" class="current">Ordenes</a> </div>
    <h1>Order #{{ $orderDetails->id }}</h1>
    @if(Session::has('flash_message_success'))
        <div class="alert alert-success alert-block">
            <button type="button" class="close" data-dismiss="alert">×</button>
                <strong>{!! session('flash_message_success') !!}</strong>
        </div>
    @endif
  </div>
  <div class="container-fluid">
    <hr>
    <div class="row-fluid">
      <div class="span6">
        <div class="widget-box">
          <div class="widget-title">
            <h5>Detalles del pedido</h5>
          </div>
          <div class="widget-content nopadding">
            <table class="table table-striped table-bordered">
              <tbody>
                <tr>
                  <td class="taskDesc">Dato de la orden</td>
                  <td class="taskStatus">{{ $orderDetails->created_at }}</td>
                </tr>
                <tr>
                  <td class="taskDesc">Estado del pedido</td>
                  <td class="taskStatus">{{ $orderDetails->order_status }}</td>
                </tr>
                <tr>
                  <td class="taskDesc">Total</td>
                  <td class="taskStatus">INR {{ $orderDetails->grand_total }}</td>
                </tr>
                <tr>
                  <td class="taskDesc">Gastos de envío</td>
                  <td class="taskStatus">INR {{ $orderDetails->shipping_charges }}</td>
                </tr>
                <tr>
                  <td class="taskDesc">Código promocionale</td>
                  <td class="taskStatus">{{ $orderDetails->coupon_code }}</td>
                </tr>
                <tr>
                  <td class="taskDesc">Monto del cupón</td>
                  <td class="taskStatus">INR {{ $orderDetails->coupon_amount }}</td>
                </tr>
                <tr>
                  <td class="taskDesc">Método de pago</td>
                  <td class="taskStatus">{{ $orderDetails->payment_method }}</td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
        <div class="accordion" id="collapse-group">
          <div class="accordion-group widget-box">
            <div class="accordion-heading">
              <div class="widget-title">
                <h5>Dirección de Envio</h5>
              </div>
            </div>
            <div class="collapse in accordion-body" id="collapseGOne">
              <div class="widget-content">
                @if(isset($userDetails->name))
                {{ $userDetails->name }} <br>
                {{ $userDetails->address }} <br>
                {{ $userDetails->city }} <br>
                {{ $userDetails->state }} <br>
                {{ $userDetails->country }} <br>
                {{ $userDetails->pincode }} <br>
                {{ $userDetails->mobile }} <br>
                @endif
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="span6">
        <div class="widget-box">
          <div class="widget-title">
            <h5>Detalles del cliente</h5>
          </div>
          <div class="widget-content nopadding">
            <table class="table table-striped table-bordered">
              <tbody>
                <tr>
                  <td class="taskDesc">Nombre del cliente</td>
                  <td class="taskStatus">{{ $orderDetails->name }}</td>
                </tr>
                <tr>
                  <td class="taskDesc">Correo electrónico del cliente</td>
                  <td class="taskStatus">{{ $orderDetails->user_email }}</td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
        <div class="accordion" id="collapse-group">
          <div class="accordion-group widget-box">
            <div class="accordion-heading">
              <div class="widget-title">
                <h5>Actualizar estado del pedido</h5>
              </div>
            </div>
            <div class="collapse in accordion-body" id="collapseGOne">
              <div class="widget-content">
                <form action="{{ url('admin/update-order-status') }}" method="post">{{ csrf_field() }}
                  <input type="hidden" name="order_id" value="{{ $orderDetails->id }}">
                  <table width="100%">
                    <tr>
                      <td>
                        <select name="order_status" id="order_status" class="control-label" required="">
                          <option value="New" @if($orderDetails->order_status == "New") selected @endif>Nuevo</option>
                          <option value="Pending" @if($orderDetails->order_status == "Pending") selected @endif>Pendiente</option>
                          <option value="Cancelled" @if($orderDetails->order_status == "Cancelled") selected @endif>Cancelado</option>
                          <option value="In Process" @if($orderDetails->order_status == "In Process") selected @endif>En proceso</option>
                          <option value="Shipped" @if($orderDetails->order_status == "Shipped") selected @endif>Enviado</option>
                          <option value="Delivered" @if($orderDetails->order_status == "Delivered") selected @endif>Entregada</option>
                          <option value="Paid" @if($orderDetails->order_status == "Paid") selected @endif>Pagada</option>
                        </select>
                      </td>
                      <td>
                        <input type="submit" value="Estado de actualización">
                      </td>
                    </tr>
                  </table>
                </form>
              </div>
            </div>
          </div>
        </div>

      </div>
    </div>
    <div class="row-fluid">
      <table id="example" class="table table-striped table-bordered" style="width:100%">
          <thead>
              <tr>
                  <th>Código de producto</th>
                  <th>nombre del producto</th>
                  <th>Tamaño del producto</th>
                  <th>Color del producto</th>
                  <th>Precio del producto</th>
                  <th>Cant. De producto</th>
              </tr>
          </thead>
          <tbody>
            @foreach($orderDetails->orders as $pro)
              <tr>
                  <td>{{ $pro->product_code }}</td>
                  <td>{{ $pro->product_name }}</td>
                  <td>{{ $pro->product_size }}</td>
                  <td>{{ $pro->product_color }}</td>
                  <td>{{ $pro->product_price }}</td>
                  <td>{{ $pro->product_qty }}</td>
              </tr>
              @endforeach
          </tbody>
      </table>
    </div>
  </div>
</div></div>
<!--main-container-part-->

@endsection
