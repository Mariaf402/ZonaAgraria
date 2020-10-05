@extends('seller.layouts.app')

@section('content')

<div class="container">

@if(Session::has('flash_message_error'))
<div class="alert alert-sm alert-danger alert-block" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
    </button>
    <strong>{!! session('flash_message_error') !!}</strong>
</div>
@endif

@if(Session::has('flash_message_success'))
<div class="alert alert-sm alert-success alert-block" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
    </button>
    <strong>{!! session('flash_message_success') !!}</strong>
</div>
@endif


    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
            <img src="{{asset('images/frontend_images/home/Logotipo.png')}}">
            <h1>Iniciar Sesión</h1>

                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="/seller">
                        {{ csrf_field() }}

                        <div class="form-group">
                            <input id="email" type="email" class="form-control border-0" placeholder="&#9993; Email"
                             name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                        </div>

                        <div class="form-group">
                                <input id="password" type="password" class="form-control border-0" 
                                name="password" placeholder="&#128272; Contraseña" required autocomplete="current-password">
                        </div>

                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-4">
                                <button type="submit" class="btn btn-login">
                                    Login
                                </button>

                                <a href="">¿Has olvidado la Contraseña?</a>

                                <p>No Tengo Cuenta<a href="/seller/register/create/"> Registrar</a></p>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


