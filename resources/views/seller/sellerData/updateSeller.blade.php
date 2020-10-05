@extends('seller.layouts.main')

@section('content')
<h2 class="mt-4">ACTUALIZAR</h2>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Editar</li>
    </ol>
      <br>
<div class="card">
  <div class="card-body">
         <h3 class="text-center"><i class="fas fa-user"></i> Vendedor {{$vendedor->name}}</h3>
        <form  action="/seller/dash/edit" method="post">
                @if($message = Session::get('falta'))
                    <div class="col-12 alert alert-danger alert-dismissable fade show" role="alert">
                         <h5>Errores:</h5>
                        <ul>
                            @foreach($errors->all() as $error)
                            <li>{{$error}}</li>
                            @endforeach
                        </ul>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif
              @csrf
              @method('PUT')
             <input type="hidden" name="rol_id" value="{{$vendedor->rol_id}}">
            <div class="row">
                <div class="col">
                    <input type="text" class="form-control" name="name" placeholder="Nombre" value="{{ old('name', $vendedor->name) }}" >
                </div>

   
            </div>
            <br>
            <div class="row">
                <div class="col">
                    <input type="text" class="form-control" name="cellphone" placeholder="Telefono movil" value="{{ old('cellphone',$vendedor->cellphone) }}" required>
                </div>

                <div class="col">
                    <input type="text" class="form-control" name="address" placeholder="Dirección" value="{{ old('address',$vendedor->address) }}" required>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col">
                    <select class="form-control" name="Department" value="{{ old('Department',$vendedor->Department)}}" required>
                          @foreach($departments as $department)
                             <option>{{$department->department_name}}</option>
                          @endforeach
                    </select>
                </div>

                <div class="col">
                  <select class="form-control" name="city" value="{{ old('city',$vendedor->city)}}" required>
                        @foreach($citys as $city)
                             <option>{{$city->city_name}}</option>
                        @endforeach
                  </select>
                </div>
            </div>
            <br>
            <civ class="row">
                <div class="col">
                     <a class="btn btn-secondary btn-lg btn-block" href="{{url('/seller')}}" role="button">Cancelar</a>
                </div>

                <div class="col">
                     <button type="submit"  class="btn btn-primary btn-lg btn-block">Enviar</button>
                </div>
            </civ>
        </form>
  </div>
</div>
@endsection