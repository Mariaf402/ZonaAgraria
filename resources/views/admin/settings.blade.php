@extends('layouts.adminLayout.admin_design')
@section('content')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="header-icon">
                <i class="fa fa-product-hunt"></i>
            </div>
            <div class="header-title">
                <h1>Administrador </h1>
                <small>Configuracion de Administrador</small>
            </div>
        </section>
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
    <!-- Main content -->
        <section class="content">
            <div class="row">
                <!-- Form controls -->
                <div class="col-sm-12">
                    <div class="panel panel-bd lobidrag">
                        <div class="panel-heading">
                            <div class="btn-group" id="buttonlist">
                                <a class="btn btn-add " href="{{url('/admin/settings')}}">
                                    <i class="fa fa-eye"></i>Actualizar contraseña</a>
                            </div>
                        </div>
                        <div class="panel-body">
                            <form class="col-sm-6" enctype="multipart/form-data" action="{{url('/admin/update-pwd')}}" method="post"> {{csrf_field()}}
                                <div class="form-group">

                                    <div class="form-group">
                                        <label>Antigua Contraseña</label>
                                        <input type="password" class="form-control" name="current_pwd" id="current_pwd" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Nueva Contraseña</label>
                                        <input type="password" class="form-control"  name="old_pwd" id="old_pwd" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Confirmar Nueva Contraseña</label>
                                        <input type="password" class="form-control"  name="new_pwd" id="new_pwd" required>
                                    </div>
                                    <div class="reset-button">
                                        <input type="submit" class="btn btn-success" value="Actualizar Contraseña">
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
