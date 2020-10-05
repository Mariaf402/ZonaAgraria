@extends('layouts.adminLayout.admin_design')
@section('title','Ver Ciudad')

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
          <h1>Ciudades</h1>
          <small>Ver Ciudades</small>
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

    <div id="message_success" style="display:none;" class="alert alert-sm alert-success">Estado Habilitado</div>
    <div id="message_error" style="display:none;" class="alert alert-sm alert-danger">Estado Deshabilitado</div>
    <!-- Main content -->
    <section class="content">
       <div class="row">
          <div class="col-sm-12">
             <div class="panel panel-bd lobidrag">
                <div class="panel-heading">
                   <div class="btn-group" id="buttonexport">
                      <a href="#">
                         <h4>Ver Ciudades</h4>
                         @if(isset($mensaje) && $mensaje!="")
                             {{$mensaje}}
                         @endif
                      </a>
                   </div>
                </div>
                <div class="panel-body">
                <!-- Plugin content:powerpoint,txt,pdf,png,word,xl -->
                   <div class="btn-group">
                      <div class="buttonexport" id="buttonlist">
                      <a class="btn btn-add" href="{{url('admin/add-city')}}"> <i class="fa fa-plus"></i> Agregar Ciudades
                         </a>
                      </div>

                   </div>
                   <!-- Plugin content:powerpoint,txt,pdf,png,word,xl -->
                   <div class="table-responsive">
                      <table id="table_id" class="table table-bordered table-striped table-hover">
                         <thead>
                            <tr class="info">
                                <th>ID Ciudad</th>
                                <th>Nombre Ciudad</th>
                                <th>Nombre Departamento</th>
                                <th>Creada</th>
                                <th>Editada</th>
                                <th>Estado</th>
                                <th>Actions</th>
                            </tr>
                         </thead>
                         <tbody>
                            @foreach($cities as $city)
                            <tr>
                            <td>{{ $city->id }}</td>
                            <td>{{ $city->city_name }}</td>
                            <td>{{ $city->department_name }}</td>
                            <td>{{ $city->created_at }}</td>
                            <td>{{ $city->updated_at }}</td>
                            <td>
                            @if($city->status==1)
                            <span style="color:green">Activo</span>
                            @else
                            <span style="color:red">Inactivo</span>
                            @endif
                            </td>
                         <td>
                           @if(isset(Session::get('adminDetails')['cities_edit_access']) && Session::get('adminDetails')['cities_edit_access']==1)
                           @endif
                           <a href="{{url('/admin/edit-city/'.$city->id)}}" class="btn btn-add btn-sm"><i class="fa fa-pencil"></i></a>

                           @if(isset(Session::get('adminDetails')['cities_full_access']) && Session::get('adminDetails')['cities_full_access']==1)
                           @endif

                           <a id="delcity" onclick="Delete('{{$city->id}}')" href="#" class="btn btn-danger btn-sm"><i class="fa fa-trash-o"></i> </a></td>


                            </tr>
                            @endforeach
                         </tbody>
                      </table>
                   </div>
                </div>
             </div>
          </div>
       </div>
    </section>
    <!-- /.content -->
 </div>
 <!-- /.content-wrapper -->
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
                     var url = "{{ url('/admin/delete-city/%id%') }}";
                     url = url.replace('%id%', id);
                     window.location.href = url;
                 }
             });
     }
</script>
@endsection
