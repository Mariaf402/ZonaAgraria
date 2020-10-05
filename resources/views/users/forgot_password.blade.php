@php($crearMenu = 'menu')
@extends('layouts.principal')
@section('content')
    <section>
<div class="sign-inup">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-5">
                @if(Session::has('flash_message_success'))
                    <div class="alert alert-success alert-block">
                        <button type="button" class="close" data-dismiss="alert">×</button>
                        <strong>{!! session('flash_message_success') !!}</strong>
                    </div>
                @endif
                @if(Session::has('flash_message_error'))
                    <div class="alert alert-error alert-block" style="background-color:#f4d2d2">
                        <button type="button" class="close" data-dismiss="alert">×</button>
                        <strong>{!! session('flash_message_error') !!}</strong>
                    </div>
                @endif
                <div class="sign-form">
                    <div class="sign-inner">
                        <div class="sign-logo" id="logo">
                            <a href="{{ url('/') }}"><img src="{{asset('principal/ico/LOGO_ZONAGRARIA.png')}}" alt=""></a>
                        </div>
                        <div class="form-dt">
                            <div class="form-inpts checout-address-step">
                                <form id="forgotPasswordForm" name="forgotPasswordForm" action="{{ url('/forgot-password') }}" method="POST">{{ csrf_field() }}
                                    <div class="form-title"><h6>Solicitar un restablecimiento de contraseña</h6></div>
                                    <div class="form-group pos_rel">
                                        <input id="email" name="email" type="email" placeholder="Tu correo electrónico" class="form-control lgn_input" required="">
                                        <i class="uil uil-envelope lgn_icon"></i>
                                    </div>
                                    <button class="login-btn hover-btn" type="submit">Enviar</button>
                                </form>
                            </div>
                            <div class="signup-link">
                                <p><a href="/register-users">Regístrate</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
    </section>
    <script>{{asset('principal/js/product.thumbnail.slider.js')}}</script>
@endsection
