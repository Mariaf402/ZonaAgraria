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
        <li><i class="fa fa-id-card"></i>{{ __('Envios') }}</li>
      </ol>
    </div>
</div>
<br>
<div class="card">
  <div class="card-body">

        <form  action="/seller/dash/addresses" method="post">
 
              @csrf

              <input type="hidden"  name="user_id"  value="{{ $ordenes->id }}">
            <br>
            <div class="row">
                <div class="col">
                    <input type="text" class="form-control" name="name" placeholder="Nombre" value="{{ old('name', $ordenes->name) }}" required>
                </div>

                <div class="col">
                    <input type="text" class="form-control" name="user_email" placeholder="Email" value="{{ old('user_email', $ordenes->user_email) }}" required>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col">
                    <input type="text" class="form-control" name="address" placeholder="Dirección" value="{{ old('address', $ordenes->address) }}" required>
                </div>

                <div class="col">
                    <input type="text" class="form-control" name="city" placeholder="Ciudad" value="{{ old('city', $ordenes->city) }}" required>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col">
                    <input type="text" class="form-control" name="country" placeholder="Pais" value="{{ old('country', $ordenes->country) }}" required>
                </div>

                <div class="col">
                    <input type="text" class="form-control" name="state" placeholder="Estado" value="{{ old('state', $ordenes->state) }}" required>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col">
                    <input type="text" class="form-control" name="pincode" placeholder="Codigo pin" value="{{ old('pincode', $ordenes->pincode) }}" required>
                </div>

                <div class="col">
                    <input type="text" class="form-control" name="mobile" placeholder="Telefono" value="{{ old('mobile', $ordenes->mobile) }}" required>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col">
                     <a class="btn btn-secondary btn-lg btn-block" href="{{url('/seller/dash/order')}}" role="button">Cancelar</a>
                </div>

                <div class="col">
                     <button type="submit"  class="btn btn-primary btn-lg btn-block">Enviar</button>
                </div>
            </div>
        </form>
  </div>
</div>

@endsection

