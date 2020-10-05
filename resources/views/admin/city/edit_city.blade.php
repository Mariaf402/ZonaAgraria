@extends('layouts.adminLayout.admin_design')
@section('title','Editar Ciudad')
@section('content')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
       <div class="header-icon">
          <i class="fa fa-product-hunt"></i>
       </div>
       <div class="header-title">
          <h1>Ciudades</h1>
          <small>Editar Ciudad</small>
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
                      <a class="btn btn-add " href="{{url('admin/cities')}}">
                      <i class="fa fa-eye"></i>  Ver Ciudad </a>
                   </div>
                </div>
                <div class="panel-body">
                <form class="col-sm-6" action="{{url('/admin/edit-city/'.$CitiesDetails->id) }}" method="post"> {{csrf_field()}}
                      <div class="form-group">
                         <label>Nombre Ciudad</label>
                         <input type="text" class="form-control" placeholder="Enter Category Name" name="city_name" id="category_name" value="{{$CitiesDetails->city_name}}" required>
                      </div>
                      <div class="form-group">
                         <label>Nombre Departamento</label>
                         <input type="text" class="form-control" placeholder="Enter Category Name" name="department_name" id="category_name" value="{{$CitiesDetails->department_name}}" required>
                      </div>
                      <div class="form-group">
                         <label>Habilitar?</label>
                         <div class="controls">
                      <input type="checkbox" class="form-control" name="status" id="department_status" value="1"  @if($CitiesDetails->status == "1") checked @endif value="1">
                      </div>

                      <div class="reset-button">
                         <input type="submit" class="btn btn-success" value="Editar Ciudad">
                      </div>
                      </div>
                   </form>
                </div>
             </div>
          </div>
       </div>
    </section>
    <!-- /.content -->
 </div>
 <!-- /.content-wrapper -->

@endsection
