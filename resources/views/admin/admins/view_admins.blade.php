@extends('layouts.adminLayout.admin_design')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <link rel="stylesheet" href="{{asset('css/backend_css/sweetalert.css')}}">
    <script src="{{asset('js/backend_js/sweetalert.min.js')}}"></script>
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="header-icon">
                <i class="fa fa-eye"></i>
            </div>
            <div class="header-title">
                <h1>Administradores</h1>
                <small>Lista de administradores</small>
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

        <div id="message_success" style="display:none;" class="alert alert-sm alert-success">Status Enabled</div>
        <div id="message_error" style="display:none;" class="alert alert-sm alert-danger">Status Disabled</div>
        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-sm-12">
                    <div class="panel panel-bd lobidrag">
                        <div class="panel-heading">
                            <div class="btn-group" id="buttonexport">
                                <a href="#">
                                    <h4>Ver administradores</h4>
                                </a>
                            </div>
                        </div>
                        <div class="panel-body">
                            <!-- Plugin content:powerpoint,txt,pdf,png,word,xl -->
                            <div class="btn-group">
                                <div class="buttonexport" id="buttonlist">
                                    <a class="btn btn-add" href="{{url('admin/add-category')}}"> <i class="fa fa-plus"></i> Agregar administrador
                                    </a>
                                </div>

                            </div>
                            <!-- Plugin content:powerpoint,txt,pdf,png,word,xl -->
                            <div class="table-responsive">
                                <table id="table_id" class="table table-bordered table-striped table-hover">
                                    <thead>
                                    <tr class="info">
                                        <th style="text-align: left">ID</th>
                                        <th style="text-align: left">Nombre</th>
                                        <th style="text-align: left">Tipo</th>
                                        <th style="text-align: left">Rol</th>
                                        <th style="text-align: left">Stado</th>
                                        <th style="text-align: left">Creado en</th>
                                        <th style="text-align: left">Actualizado en</th>
                                        <th style="text-align: left">Acciones</th>
                                    </tr>
                                    </thead>
                                    @foreach($admins as $admin)
                                        <?php if($admin->type=="Admin"){
                                            $roles = "All";
                                        }else{
                                            $roles = "";
                                            if($admin->categories_access==1){
                                                $roles .= "Categories, ";
                                            }
                                            if($admin->products_access==1){
                                                $roles .= "Products, ";
                                            }
                                            if($admin->orders_access==1){
                                                $roles .= "Orders, ";
                                            }
                                            if($admin->users_access==1){
                                                $roles .= "Users, ";
                                            }
                                        }
                                        ?>
                                        <tr class="gradeX">
                                            <td class="center">{{ $admin->id }}</td>
                                            <td class="center">{{ $admin->username }}</td>
                                            <td class="center">{{ $admin->type }}</td>
                                            <td class="center">{{ $roles }}</td>
                                            <td class="center">
                                                @if($admin->status==1)
                                                    <span style="color:green">Active</span>
                                                @else
                                                    <span style="color:red">Inactive</span>
                                                @endif
                                            </td>
                                            <td class="center">{{ $admin->created_at }}</td>
                                            <td class="center">{{ $admin->updated_at }}</td>
                                            <td class="center">
                                                <a href="{{ url('/admin/edit-admin/'.$admin->id) }}"  class="btn btn-add btn-sm"><i class="fa fa-pencil"></i></a>
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
            <script>

                //Mensajes de confirmacion para eliminar
                function Delete(id) {
                    swal({
                            title: "Eliminar",
                            text: "Esta seguro",
                            type: "warning",
                            showCancelButton: true,
                            confirmButtonColor: "#79B03D",
                            confirmButtonText: "Si",

                            closeOnConfirm: true
                        },
                        function (isConfirm) {
                            if (isConfirm) {
                                var url = "{{ url('/admin/delete-category/%id%') }}";
                                url = url.replace('%id%', id);
                                window.location.href = url;
                            }
                        });
                }
            </script>
@endsection
