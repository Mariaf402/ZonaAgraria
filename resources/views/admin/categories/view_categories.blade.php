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
          <h1>Categorias</h1>
          <small>Lista De Categorias</small>
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
                         <h4>Ver Categorias</h4>
                      </a>
                   </div>
                </div>
                <div class="panel-body">
                <!-- Plugin content:powerpoint,txt,pdf,png,word,xl -->
                   <div class="btn-group">
                      <div class="buttonexport" id="buttonlist">
                      <a class="btn btn-add" href="{{url('admin/add-category')}}"> <i class="fa fa-plus"></i> Agregar Categoria
                         </a>
                      </div>

                   </div>
                   <!-- Plugin content:powerpoint,txt,pdf,png,word,xl -->
                   <div class="table-responsive">
                      <table id="table_id" class="table table-bordered table-striped table-hover">
                         <thead>
                            <tr class="info">
                            <th>Categoria ID</th>
                            <th>Categoria Nombre</th>
                            <th>Nivel</th>
                            <th>Categoria URL</th>
                            <th>Estado</th>
                            <th>Acciones</th>
                            </tr>
                         </thead>
              	@foreach($categories as $category)
                <tr>
                  <td>{{ $category->id }}</td>
                  <td>{{ $category->name }}</td>
                  <td>{{ $category->parent_id }}</td>
                  <td>{{ $category->url }}</td>

                  <td>
                            @if($category->status==1)
                            <span style="color:green">Activo</span>
                            @else
                            <span style="color:red">Inactivo</span>
                            @endif
                            </td>

                  <td>
                    @if(Session::get('adminDetails')['categories_edit_access']==1)
                    <a href="{{ url('/admin/edit-category/'.$category->id) }}" class="btn btn-add btn-sm"><i class="fa fa-pencil"></i></a>
                    @endif
                    @if(Session::get('adminDetails')['categories_full_access']==1)
                            <a id="delcat" onclick="Delete('{{$category->id}}')" href="#"  class="btn btn-danger btn-sm"><i class="fa fa-trash-o"></i> </a></td>
                    @endif
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
