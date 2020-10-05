@extends('layouts.adminLayout.admin_design')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="header-icon">
                <i class="fa fa-eye"></i>
            </div>
            <div class="header-title">
                <h1>Usuarios</h1>
                <small>Lista de usuarios</small>
            </div>
        </section>
        @if(Session::has('flash_message_error'))
            <div class="alert alert-danger alert-block">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <strong>{{ session('flash_message_error') }}</strong>
            </div>
        @endif
        @if(Session::has('flash_message_success'))
            <div class="alert alert-success alert-block">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <strong>{{ session('flash_message_success') }}</strong>
            </div>
        @endif
        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-sm-12">
                    <div class="panel panel-bd lobidrag">
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table id="table_id" class="table table-bordered table-striped table-hover">
                                    <thead>
                                    <tr class="info">
                                        <th>UserID</th>
                                        <th>Nombre</th>
                                        <th>Dirección</th>
                                        <th>Ciudad</th>
                                        <th>País</th>
                                        <th>Pincode</th>
                                        <th>Mobile</th>
                                        <th>Email</th>
                                        <th>Estado</th>
                                        <th>Registrado en</th>
                                        <th>Acciones</th>
                                    </tr>
                                    </thead>
                                    @foreach($users as $user)
                                        <tr>
                                            <td class="center">{{ $user->id }}</td>
                                            <td class="center">{{ $user->name }}</td>
                                            <td class="center">{{ $user->address }}</td>
                                            <td class="center">{{ $user->city }}</td>
                                            <td class="center">{{ $user->country }}</td>
                                            <td class="center">{{ $user->pincode }}</td>
                                            <td class="center">{{ $user->mobile }}</td>
                                            <td class="center">{{ $user->email }}</td>

                                            <td>
                                                @if($user->status==1)
                                                    <span style="color:green">Active</span>
                                                @else
                                                    <span style="color:red">Inactive</span>
                                                @endif
                                            </td>
                                            <td class="center">{{ $user->created_at }}</td>
                                            <td class="center"><a href="{{ url('/admin/update-status-users/'.$user->id) }}" class="btn btn-primary btn-mini"><i class="fa fa-pencil"></i></a><td>

                                            </td>
                                        </tr>
                                        @endforeach
                                        </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

@endsection
