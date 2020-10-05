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
                <h1>Usuarios</h1>
                <small>Usuarios</small>
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
                                <a class="btn btn-add " href="{{url('admin/view-products')}}">
                                    <i class="fa fa-eye"></i>Ver Usuarios</a>
                            </div>
                        </div>
                        <div class="panel-body">
                            <form class="col-sm-6" enctype="multipart/form-data" method="post" action="{{ url('/admin/update-status-users/'.$users->id) }}" >{{ csrf_field() }}
                                <div class="form-group">
                                    <label>Id</label>
                                    <input type="text" class="form-control" value="{{ $users->id }}" placeholder="id" name="id" id="id"  required>
                                </div>
                                <div class="form-group">
                                    <label>Nombre</label>
                                    <input type="text" class="form-control" value="{{ $users->name }}" placeholder="name" name="name" id="name"  required>
                                </div>
                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="text" class="form-control" value="{{ $users->email }}" placeholder="email" name="email" id="email"  required>
                                </div>
                                    <div class="form-group">
                                        <label>Habilitar?</label>
                                        <div class="controls">
                                            <input type="checkbox" class="form-control" name="status" id="category_status"@if($users->status == "1") checked @endif value="1">
                                        </div>
                                        <div class="reset-button">
                                            <input type="submit" class="btn btn-success" value="Editar estado">
                                        </div>
                                    </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
@endsection
