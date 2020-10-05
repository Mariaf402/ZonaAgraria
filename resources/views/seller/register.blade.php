@extends('seller.layouts.app')

@section('content')

<div class="container">
    @if($message = Session::get('ErrorsInsert'))
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


    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
            <img src="{{asset('images/frontend_images/home/Logotipo.png')}}">
            <h1>Iniciar Sesión</h1>

                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="/seller/register">
                    @csrf

                        <input type="hidden" name="status" value="1">

                        <div class="form-group">
                            <input type="text" class="form-control border-0"  placeholder="&#10000;  Nombre"
                             name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                        </div>

                        <div class="form-group">
                            <input id="text" type="email" class="form-control border-0"  placeholder="&#9993; Email"
                             name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                        </div>

                        <div class="form-group">
                                <input id="password" type="password" class="form-control border-0" 
                                name="password" placeholder="&#128274; Contraseña" required autocomplete="current-password">
                        </div>

                        <div class="form-group">
                            <input type="text" class="form-control border-0" placeholder="&#9742; Teléfono"
                             name="mobile" value="{{ old('mobile') }}" required autocomplete="mobile" autofocus>
                        </div>

                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-4">
                                <button type="submit" class="btn btn-login">
                                    Registrar
                                </button>

                                <p>Ir al login<a href="/seller/"> Login</a></p>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection



