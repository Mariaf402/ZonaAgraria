@extends('seller.layouts.main')

@section('content')
<h1 class="mt-4">ENTREGAS</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Gestionar Entrega de pedidos</li>
    </ol>
  <br>
<div class="card mb-4">
  <div class="card-header">
      <i class="fas fa-table mr-1"></i>
      Lista de clientes
  </div>

  <div class="card-body">
  @if($message = Session::get('Registrado'))
          <div class="col-12 alert alert-success alert-dismissable fade show" role="alert">
            <span>{{$message}}</span>

           <button type="button" class="close" data-dismiss="alert" aria-label="Close">
             <span aria-hidden="true">&times;</span>
           </button>
          </div>
  @endif
    <div class="table-responsive">
          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                  <tr>
                        <th>Nombre</th>
                        <th>Email</th>
                        <th>Dirección</th> 
                        <th>Pais</th> 
                        <th>Ciudad</th>
                        <th>Estado</th>
                        <th>Codigo</th>  
                        <th>Telefono</th>   
                  </tr>
              </thead>
              <tfoot>
              
                  <tr>
                        <th>Nombre</th>
                        <th>Email</th>
                        <th>Dirección</th> 
                        <th>Pais</th> 
                        <th>Ciudad</th>
                        <th>Estado</th>
                        <th>Codigo</th>  
                        <th>Telefono</th>   
                  </tr>
              </tfoot>
              <tbody>
                  @foreach($Envios as $Envio)
                   <tr>
                       <td>{{ $Envio->name}}</td>
                       <td>{{ $Envio->user_email}}</td>
                       <td>{{ $Envio->address}}</td>
                       <td>{{ $Envio->country}}</td>
                       <td>{{ $Envio->city}}</td>
                       <td>{{ $Envio->state}}</td>
                       <td>{{ $Envio->pincode}}</td>
                       <td>{{ $Envio->mobile}}</td>
                   </tr>
                  @endforeach             
              </tbody>
          </table>
      </div>
  </div>

</div>
@endsection
