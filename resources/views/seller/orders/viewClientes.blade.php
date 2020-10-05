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
        <li><i class="fa fa-briefcase"></i>{{ __('Ventas') }}</li>
      </ol>
    </div>
</div>
<br>
@include('seller.orders.addOrder')
<br>
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
      Lista de posibles clientes
  </div>

  <div class="card-body">
    <div class="table-responsive">
          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                  <tr>
                  <th>id</th>
                  <th>Nombre</th>
                  <th>Email</th>
                  <th>Telefono</th>
                  <th>Dirección</th>
                  <th>Ciudad</th>
                  <th>Estado</th>
                  <th>Codigo</th>
                  <th>Venta</th>
                  </tr>
              </thead>
              <tfoot>
              
                  <tr>
                  <th>id</th>
                  <th>Nombre</th>
                  <th>Email</th>
                  <th>Telefono</th>
                  <th>Dirección</th>
                  <th>Ciudad</th>
                  <th>Estado</th>
                  <th>Codigo</th>
                  <th>Venta</th>
                  </tr>
              </tfoot>
              <tbody>
              @foreach($Clientes as $Cliente)
                  <tr>
                    <td>{{ $Cliente->id }}</td>
                    <td>{{ $Cliente->name }}</td>
                    <td>{{ $Cliente->email }}</td>
                    <td>{{ $Cliente->mobile }}</td>
                    <td>{{ $Cliente->address }}</td>
                    <td>{{ $Cliente->city }}</td>
                    <td>{{ $Cliente->state }}</td>
                    <td>{{ $Cliente->pincode }}</td>
                      <td>
                        <button class="btn btn-round btnEditar" 

                        data-id="{{$Cliente->id}}" 
                        data-name="{{ $Cliente->name }}" 
                        data-email="{{ $Cliente->email }}"
                        data-mobile="{{ $Cliente->mobile }}" 
                        data-address="{{ $Cliente->address }}" 
                        data-country="{{ $Cliente->country }}" 
                        data-city="{{ $Cliente->city }}" 
                        data-state="{{ $Cliente->state }}" 
                        data-pincode="{{ $Cliente->pincode }}" 

                        data-toggle="modal" data-target="#modalEditar"><i class="fa fa-edit"></i></button>
                    </td>

                  </tr>
               @endforeach
              </tbody>
          </table>
      </div>
  </div>
</div>

@endsection

@section('script')
  <script>

    $(document).ready(function(){

      $(".btnEditar").click(function(){

        $("#idEdit").val($(this).data('id'));
        $("#nameEdit").val($(this).data('name'));
        $("#mobileEdit").val($(this).data('mobile'));
        $("#emailEdit").val($(this).data('email'));
        $("#addressEdit").val($(this).data('address'));
        $("#countryEdit").val($(this).data('country'));
        $("#cityEdit").val($(this).data('city'));
        $("#stateEdit").val($(this).data('state'));
        $("#pincodeEdit").val($(this).data('pincode'));

      });

    });
  </script>
@endsection



