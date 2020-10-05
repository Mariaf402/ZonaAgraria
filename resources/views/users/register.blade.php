@php($crearMenu = 'menu')
@extends('layouts.principal')
@section('estilos')
    <link href="css/step-wizard.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
@endsection
@section('content')
    <link href="{{ asset('admin-assets/dist/img/mini-logo.png') }}" rel="icon">
    <section id="form" style="margin-top:50px;"><!--form-->

        <div class="sign-inup">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-5">
                        <div class="sign-form">
                            <div class="sign-inner">
                                <div class="sign-logo" id="logo">
                                    <a href="{{ url('/') }}"><img src="{{asset('principal/ico/LOGO_ZONAGRARIA.png')}}" alt=""></a>
                                </div>
                                <div class="form-dt">

                                    <div class="form-inpts checout-address-step">
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
                                        <form id="loginForm" name="loginForm" action="{{ url('/user-register') }}" method="POST">{{ csrf_field() }}
                                            <div class="form-title"><h6>Registrarse</h6></div>
                                            <h5 style="color: red">Obligatorio*</h5>
                                            <div class="form-group pos_rel">
                                                <input id="name" name="name" type="name" placeholder="Nombre*" class="form-control lgn_input" required="">
                                                <i class="uil uil-user-circle lgn_icon"></i>
                                            </div>
                                            <div class="form-group pos_rel">
                                                <input id="email" name="email" type="email" placeholder="correo electrónico*" class="form-control lgn_input" required="">
                                                <i class="uil uil-mobile-android-alt lgn_icon"></i>
                                            </div>
                                            <div class="input-group">
                                                <input id="txtPassword" name="password" type="password" placeholder="Introducir la contraseña*" class="form-control lgn_input" required="">
                                                <i class="uil uil-padlock lgn_icon"></i>
                                                <div class="input-group-append">
                                                    <button id="show_password" class="btn btn-night-mode" type="button" onclick="mostrarPassword()"><span class="fa fa-eye-slash icon"></span> </button>
                                                </div>
                                            </div>
                                            <div><br>
                                                <h5>Protección de datos*</h5>
                                                <label><input type="checkbox" required> He leído y acepto la politica de privacidad:<a href="policiesPrivacity">https://url.com/politica-privacidad</a></label>
                                            </div><br>
                                            <button class="login-btn hover-btn" type="submit">Regístrate</button>
                                        </form>
                                    </div>
                                    <div class="password-forgor">
                                        <a href="forgot-password">Recuperar Contraseña?</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script src="{{asset('principal/js/product.thumbnail.slider.js')}}"></script>
    <script src="{{asset('principal/js/offset_overlay.js')}}"></script>
    <script src="{{asset('principal/js/night-mode.js')}}"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    <script type="text/javascript">
        function mostrarPassword(){
            var cambio = document.getElementById("txtPassword");
            if(cambio.type == "password"){
                cambio.type = "text";
                $('.icon').removeClass('fa fa-eye-slash').addClass('fa fa-eye');
            }else{
                cambio.type = "password";
                $('.icon').removeClass('fa fa-eye').addClass('fa fa-eye-slash');
            }
        }

        $(document).ready(function () {
            //CheckBox mostrar contraseña
            $('#ShowPassword').click(function () {
                $('#Password').attr('type', $(this).is(':checked') ? 'text' : 'password');
            });
        });
    </script>


@endsection


