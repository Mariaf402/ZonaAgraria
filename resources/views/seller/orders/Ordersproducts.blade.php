@extends('seller.layouts.main')

@section('content')
<h1 class="mt-4">PRODUCTOS ORDENADOS</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Productos Ordenados por el Cliente</li>
    </ol>
<br>

<div class="card">
    <div class="card-body">
    <h2>Comfirmar Pedido</h2>
    <table class="table">
            <tbody>
                <tr>
                    <th scope="row">Nombre:</th>
                    <td>{{ $ordenes->name }}</td>
                </tr>
                <tr>
                    <th scope="row">Email:</th>
                    <td>{{ $ordenes->user_email }}</td>
                </tr>
                <tr>
                    <th scope="row">Teléfono movil:</th>
                    <td>{{ $ordenes->mobile }}</td>
                </tr>
                <tr>
                    <th scope="row">Dirección:</th>
                    <td>{{ $ordenes->address }}</td>
                </tr>
                <tr>
                    <th scope="row">ciudad:</th>
                    <td>{{ $ordenes->city }}</td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
<br>
<div class="row">
    <div class="col-lg-12">
        <a class="btn  btn-lg btn-block btn-secondary"
        href="{{url('/seller/dash/addresses/showEnvio/'.$ordenes->id)}}" role="button">Realizar Envio</a>
    </div>
</div>
<br>
<div class="card mb-4">
<div class="card-body">
    <div class="table-responsive">
          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
                  <tr>
                        <th>Producto</th>
                        <th>Cantidad</th>
                        <th>Codigo</th>
                        <th>Precio</th>
                  </tr>
            </thead>
              <tfoot>
                  <tr>
                        <th>Producto</th>
                        <th>Cantidad</th>
                        <th>Codigo</th>
                        <th>Precio</th>
                  </tr>
              </tfoot>
              <tbody>
              @foreach($producs as $produc)
                   <tr>
                        <td>{{ $produc->product_name }}</td>
                        <td>{{ $produc->product_qty }}</td>
                        <td>{{ $produc->product_code }}</td>
                        <td>{{ $produc->product_price }}</td>
                   </tr>
                @endforeach
              </tbody>
            </table>
        </div>
    </div>

</div>


@endsection
