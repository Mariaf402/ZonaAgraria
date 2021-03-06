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
                <h1>Agregar administrador</h1>
                <small>Agregar administrador</small>
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
                                <a class="btn btn-add " href="{{url('admin/add-admin')}}">
                                    <i class="fa fa-eye"></i>Agregar administrador</a>
                            </div>
                        </div>
                        <div class="panel-body">
                            <form class="col-sm-6" enctype="multipart/form-data" action="{{ url('admin/edit-admin/'.$adminDetails->id) }}" method="post" name="add_admin" id="add_admin" novalidate="novalidate"> {{csrf_field()}}
                                <div class="form-group">
                                    <label>Tipo</label>
                                    <input type="text" name="type" id="type" readonly="" value="{{ $adminDetails->type }}" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Nombre</label>
                                    <input type="text" class="form-control" value="{{ $adminDetails->username }}" placeholder="Nombre" name="username" id="username"  required>
                                </div>
                                <div class="form-group">
                                    <label>Contraseña</label>
                                    <input type="password" class="form-control"  name="password" id="password"  required>
                                </div>
                                @if($adminDetails->type=="Sub Admin")
                                    <div class="control-group">
                                        <label class="control-label">Access</label>
                                        <div class="controls">
                                            <input type="checkbox" name="categories_view_access" id="categories_view_access" value="1" style="margin-top: -3px;" @if($adminDetails->categories_view_access == "1") checked @endif>&nbsp;Categories View Only&nbsp;&nbsp;&nbsp;
                                            <input type="checkbox" name="categories_edit_access" id="categories_edit_access" value="1" style="margin-top: -3px;" @if($adminDetails->categories_edit_access == "1") checked @endif>&nbsp;Categories View & Edit&nbsp;&nbsp;&nbsp;
                                            <input type="checkbox" name="categories_full_access" id="categories_full_access" value="1" style="margin-top: -3px;" @if($adminDetails->categories_full_access == "1") checked @endif>&nbsp;Categories View, Edit & Delete&nbsp;&nbsp;&nbsp;
                                            <input type="checkbox" name="products_access" id="products_access" value="1" style="margin-top: -3px;"  @if($adminDetails->products_access == "1") checked @endif>&nbsp;Products&nbsp;&nbsp;&nbsp;
                                            <input type="checkbox" name="orders_access" id="orders_access" value="1" style="margin-top: -3px;"  @if($adminDetails->orders_access == "1") checked @endif>&nbsp;Orders&nbsp;&nbsp;&nbsp;
                                            <input type="checkbox" name="users_access" id="users_access" value="1" style="margin-top: -3px;"  @if($adminDetails->users_access == "1") checked @endif>&nbsp;Users
                                        </div>
                                    </div>
                                @endif
                                <div class="control-group">
                                    <label class="control-label">Habilitar</label>
                                    <div class="controls">
                                        <input type="checkbox" name="status" id="status_admin" value="1" @if($adminDetails->status == "1") checked @endif>
                                    </div>
                                </div>
                                <div class="form-actions">
                                    <input type="submit" value="Editar Admin" class="btn btn-success">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
