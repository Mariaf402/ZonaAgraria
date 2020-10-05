@extends('seller.layouts.main')

@section('content')

<br>
<div class="row">
    <div class="col-lg-12">
      <h3 class="page-header"><i class="fa fa-laptop"></i> Dashboard</h3>
      <br>
      <ol class="breadcrumb">
        <li><i class="fa fa-home"></i><a href="{{ url('/seller/dash/') }}">Home/</a></li>
        @if (session('status'))
          <div class="alert alert-success" role="alert">
              {{ session('status') }}
          </div>
        @endif
        <li><i class="fa fa-credit-card"></i>{{ __('Ordenes') }}</li>
      </ol>
    </div>
</div>


    <div class="card mb-4">
  @if($message = Session::get('Registrado'))
          <div class="col-12 alert alert-success alert-dismissable fade show" role="alert">
            <span>{{$message}}</span>

           <button type="button" class="close" data-dismiss="alert" aria-label="Close">
             <span aria-hidden="true">&times;</span>
           </button>
          </div>
  @endif

  <div class="card-header">
      <i class="fas fa-table mr-1"></i>
      Lista de clientes
  </div>

  <div class="card-body">
    <div class="table-responsive">
          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                  <tr>
                  <th>Nombre</th>
                  <th>Ciudad</th>
                  <th>Dirección</th>
                  <th>Telefono</th>
                  <th>Flete</th>
                  <th>Metodo de pago</th>
                  <th>Total</th>
                  <th>Productos</th>
                  <th>Eliminar</th>
                  <th>Editar</th>  
                  </tr>
              </thead>
              <tfoot>
              
                  <tr>
                  <th>Nombre</th>
                  <th>Ciudad</th>
                  <th>Dirección</th>
                  <th>Telefono</th>
                  <th>Flete</th>
                  <th>Metodo de pago</th>
                  <th>Total</th>
                  <th>Productos</th>
                  <th>Eliminar</th>
                  <th>Editar</th>
                  </tr>
              </tfoot>
              <tbody>
              @foreach($ordenes as $ordene)
                   <tr>
                       <td>{{$ordene->name}}</td>
                       <td>{{$ordene->city}}</td>
                       <td>{{$ordene->address}}</td>
                       <td>{{$ordene->mobile}}</td>
                       <td>{{$ordene->shipping_charges}}</td>
                       <td>{{$ordene->payment_method}}</td>
                       <td>{{$ordene->grand_total}}</td>
                       <td>
                       <a href="{{url('/seller/dash/order/viewOrdersProduc/'.$ordene->id)}}">Productos</a>
                       </td>
                       <td>                      
                                <button class="btn btn-round btnEliminar" data-id="{{$ordene->id}}" 
                                    data-toggle="modal" data-target="#modalEliminar">
                                    <i class="fa fa-trash"></i>
                                </button>

                                <form action="{{url('/seller/dash/order',['id'=>$ordene->id])}}" method="post" id="formEli_{{$ordene->id}}">
                                    @csrf
                                    <input type="hidden" name="id" value="{{$ordene->id}}">
                                    <input type="hidden" name="_method" value="delete">
                                </form>
                      </td>
                       <td>
                          <button class="btn btn-round btnEditar" 

                            data-id="{{$ordene->id}}" 
                            data-name="{{$ordene->name}}"
                            data-user_email="{{$ordene->user_email}}"
                            data-city="{{$ordene->city}}"
                            data-department="{{$ordene->department}}"
                            data-address="{{$ordene->address}}"
                            data-mobile="{{$ordene->mobile}}"
                            data-shipping_charges="{{$ordene->shipping_charges}}"
                            data-payment_method="{{$ordene->payment_method}}"
                            data-grand_total="{{$ordene->grand_total}}"

                            data-toggle="modal" data-target="#modalEditar"><i class="fa fa-edit"></i></button>
                       </td>
                   </tr>
               @endforeach
              </tbody>
          </table>
      </div>
  </div>
  @include('seller.orders.updateOrden')
  @include('seller.orders.deleteOrder')
</div>
@endsection


@section('script')
  <script>
    $(document).ready(function(){

      $(".btnEliminar").click(function(){
        idEliminar = $(this).data('id');
      });

      $(".btnmodalEliminar").click(function(){
        $("#formEli_"+idEliminar).submit();
      });

      
      $(".btnEditar").click(function(){

        $("#idEdit").val($(this).data('id'));
        $("#user_idEdit").val($(this).data('user_id'));
        $("#nameEdit").val($(this).data('name'));
        $("#user_emailEdit").val($(this).data('user_email'));
        $("#cityEdit").val($(this).data('city'));
        $("#departmentEdit").val($(this).data('department'));
        $("#addressEdit").val($(this).data('address'));
        $("#mobileEdit").val($(this).data('mobile'));
        $("#shipping_chargesEdit").val($(this).data('shipping_charges'));
        $("#payment_methodEdit").val($(this).data('payment_method'));
        $("#grand_totalEdit").val($(this).data('grand_total'));
      });

    });
  </script>
@endsection
