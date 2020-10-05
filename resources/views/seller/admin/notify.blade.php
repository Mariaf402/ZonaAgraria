@extends('seller.layouts.main')

@section('content')
<h2 class="mt-4">ENVIAR NOTIFICASIÓN</h2>
<ol class="breadcrumb mb-4">
  <li class="breadcrumb-item active">Especifique los datos que desea enviar</li>
</ol>
<br>
<div class="card"  style="width: 40rem; left: 250px;">
    <div class="card-body">
        <h1 class="text-center">Notificasión</h1>    
        <form action="/seller/admin" method="post">
              @csrf
                  <div class="row">
                    <div class="col">
                      <input type="text" class="form-control" name="name" placeholder="Nombre" value="{{old('name')}}">
                    </div>
                    {!! $errors->first('name','<small class="col-12 alert alert-danger">:message</small>') !!}
                  </div>
                  <br>
                  <div class="row">
                    <div class="col">
                      <input type="email" class="form-control" name="email" placeholder="Email" value="{{old('email')}}">
                    </div>
                    {!!$errors->first('email','<small class="col-12 alert alert-danger">:message</small>')!!}
                  </div>
                  <br>   
                  <div class="row">
                    <div class="col">
                      <input type="text" class="form-control" name="affair" placeholder="Asunto" value="{{old('affair')}}">
                    </div>
                    {!!$errors->first('affair','<small class="col-12 alert alert-danger">:message</small>')!!}
                  </div>
                  <br>
                  <div class="row">
                    <div class="col">
                      <textarea class="form-control" rows="3" name="message" placeholder="Mensaje" value="{{old('message')}}"></textarea>
                    </div>
                    {!!$errors->first('message','<small class="col-12 alert alert-danger">:message</small>')!!}
                  </div>
              
                  <br>
                  <div class="row">
                    <div class="col">
                      <a class="btn btn-secondary btn-lg btn-block" href="{{url('/seller/admin')}}" role="button">Cancelar</a>
                    </div>
                    <div class="col">
                      <button type="submit"  class="btn btn-primary btn-lg btn-block">Enviar</button>
                    </div>
                  </div>
            </form>
    </div>
</div>
@endsection
