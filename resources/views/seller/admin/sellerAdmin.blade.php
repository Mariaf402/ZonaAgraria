@extends('seller.layouts.main')

@section('content')

<h2 class="mt-4">CONTACTAR</h2>
<ol class="breadcrumb mb-4">
  <li class="breadcrumb-item active">Gerente de ventas</li>
</ol>
<br>
<div class="card" style="width: 40rem; left: 250px;">
    @if($message = Session::get('Registrado'))
        <div class="col-12 alert alert-success alert-dismissable fade show" role="alert">
          <span>{{$message}}</span>

        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        </div>
    @endif
    <div class="card-body">
        <h2 class="text-center">Datos</h2>
      <table class="table">
        <tbody>
          <tr>
            <th scope="row">Nombre:</th>
            <td>{{ $admins->name }}</td>
          </tr>
          <tr>
            <th scope="row">Email:</th>
            <td>{{ $admins->email }}</td>
          </tr>
          <tr>
            <th scope="row">Telefono movil:</th>
            <td>{{ $admins->cellphone }}</td>
          </tr>
          <tr>
            <td colspan="2">
            <a href="{{url('/seller/admin/create')}}" class="btn btn-primary btn-lg btn-block" role="button" aria-pressed="true">
            Primary link</a>
            </td>
          </tr>
        </tbody>
      </table>
    </div>
</div>
@endsection


 