@extends('layouts.adminLayout.admin_design')
@section('content')
    <!-- Content Wrapper. Contains page content -->

    <div id="content">
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="header-icon">
                <i class="fa fa-product-hunt"></i>
            </div>
            <div class="header-title">
                <h1>Agregar administrador</h1>
                <small>Agregar administrador</small>
            </div>
        </section>
        @if(Session::has('flash_message_error'))
            <div class="alert alert-error alert-block">
                <button type="button" class="close" data-dismiss="alert">×</button>
                <strong>{!! session('flash_message_error') !!}</strong>
            </div>
        @endif
        @if(Session::has('flash_message_success'))
            <div class="alert alert-success alert-block">
                <button type="button" class="close" data-dismiss="alert">×</button>
                <strong>{!! session('flash_message_success') !!}</strong>
            </div>
    @endif
    <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-sm-12">
                    <div class="panel panel-bd lobidrag">
                        <div class="panel-heading">
                            <div class="btn-group" id="buttonlist">
                                <a class="btn btn-add " href="{{url('admin/view-admins')}}">
                                    <i class="fa fa-eye"></i>Ver administrador</a>
                            </div>
                        </div>
                        <div class="panel-body">
                            <form class="col-sm-6" method="post" action="{{ url('admin/add-admin') }}" name="add_admin" id="add_admin" novalidate="novalidate">{{ csrf_field() }}
                                <div class="form-group">
                                    <label class="control-label">Tipo</label>
                                    <select name="type" id="type" class="form-control">
                                        <option value="Admin">Admin</option>
                                        <option value="Sub Admin">Sub-Admin</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Nombre</label>
                                    <input type="text" class="form-control" placeholder="Nombre del administrador" name="username"  id="username" required="">
                                </div>
                                <div class="form-group">
                                    <label>Contraseña</label>
                                    <input type="password" class="form-control" placeholder="Contraseña" name="password" id="password" required="">
                                </div>
                                <div class="form-group" id="access">
                                    <label class="control-label">Accesos</label>
                                    <div class="controls">
                                        <input type="checkbox" name="categories_view_access" id="categories_view_access" value="1" style="margin-top: -3px;">&nbsp;Ver solo categorías&nbsp;&nbsp;&nbsp;
                                        <input type="checkbox" name="categories_edit_access" id="categories_edit_access" value="1" style="margin-top: -3px;">&nbsp;Ver y editar categorías&nbsp;&nbsp;&nbsp;
                                        <input type="checkbox" name="categories_full_access" id="categories_full_access" value="1" style="margin-top: -3px;">&nbsp;Ver, editar y eliminar categorías&nbsp;&nbsp;&nbsp;<br>
                                        <input type="checkbox" name="products_access" id="products_access" value="1" style="margin-top: -3px;">&nbsp;Productos&nbsp;&nbsp;&nbsp;
                                        <input type="checkbox" name="orders_access" id="orders_access" value="1" style="margin-top: -3px;">&nbsp;Ordenes&nbsp;&nbsp;&nbsp;
                                        <input type="checkbox" name="users_access" id="users_access" value="1" style="margin-top: -3px;">&nbsp;Usuarios
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Habilitar?</label>
                                    <div class="controls">
                                        <input type="checkbox" class="form-control" name="status" id="status_admin" value="1">
                                    </div>
                                    <div class=form-actions">
                                        <input type="submit" value="Add Admin" class="btn btn-success">                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
        <script>

            $(document).ready(function(){
                $("#access").hide();
                $("#type").change(function(){
                    var type = $("#type").val();
                    if(type == "Admin"){
                        $("#access").hide();
                    }else{
                        $("#access").show();
                    }
                })
            });

        </script>
@endsection
