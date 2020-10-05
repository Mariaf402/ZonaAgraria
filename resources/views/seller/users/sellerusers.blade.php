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
        <li><i class="fa fa-id-card"></i>{{ __('Clientes') }}</li>
      </ol>
    </div>
</div>
<br>
<div class="row">
    <div class="col-lg-12">
        @include('seller.users.sellerModalusers')
    </div>
</div>
<br>
<br>
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
      Lista de clientes
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
                  <th>Pais</th>
                  <th>Ciudad</th>
      
                  </tr>
              </thead>
              <tfoot>
              
                  <tr>
                  <th>id</th>
                  <th>Nombre</th>
                  <th>Email</th>
                  <th>Telefono</th>
                  <th>Dirección</th>
                  <th>Pais</th>
                  <th>Ciudad</th>
 
                  </tr>
              </tfoot>
              <tbody>
              @foreach($Usuarios as $Usuario)
                  <tr>
                    <td>{{ $Usuario->id }}</td>
                    <td>{{ $Usuario->name }}</td>
                    <td>{{ $Usuario->email }}</td>
                    <td>{{ $Usuario->mobile }}</td>
                    <td>{{ $Usuario->address }}</td>
                    <td>{{ $Usuario->country }}</td>
                    <td>{{ $Usuario->city }}</td>
                  </tr>

               @endforeach
              </tbody>
          </table>
      </div>
  </div>
  @include('seller.users.sellerusersDelete')
</div>



@endsection

@section('script')
  <script>
   var idEliminar = 0;
    $(document).ready(function(){
      @if($message = Session::get('ErrorsInsert'))
        $("#modalAgregar").modal('show');
      @endif

      $(".btnEliminar").click(function(){
        idEliminar = $(this).data('id');
      });

      $(".btnmodalEliminar").click(function(){
        $("#formEli_"+idEliminar).submit();
      });

    });
  </script>
@endsection
