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
                <h1>Agregar Banner</h1>
                <small>Agregar Banner</small>
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
                                <a class="btn btn-add " href="{{url('admin/view-banners')}}">
                                    <i class="fa fa-eye"></i>Ver Banners</a>
                            </div>
                        </div>
                        <div class="panel-body">
                            <form class="col-sm-6" enctype="multipart/form-data" action="{{url('admin/edit-banner/'.$bannerDetails->id) }}" method="post"> {{csrf_field()}}
                                <div class="form-group">
                                    <label>Subir Imagen</label>
                                    <input type="file" name="image">
                                </div>
                                <div class="form-group">
                                    <label>Titulo</label>
                                    <input type="text" class="form-control" value="{{ $bannerDetails->title }}" placeholder="Titulo" name="title" id="title"  required>
                                </div>
                                <div class="form-group">
                                    <label>Link</label>
                                    <input type="text" class="form-control" value="{{ $bannerDetails->link }}" placeholder="link" name="link" id="link"  required>
                                </div>


                                <div class="form-group">
                                    <div class="form-group">
                                        <label>Habilitar?</label>
                                        <div class="controls">
                                            <input type="checkbox" class="form-control" name="status" id="category_status" @if($bannerDetails->status == "1") checked @endif value="1">
                                        </div>

                                        <div class="reset-button">
                                            <input type="submit" class="btn btn-success" value="Editar Banner">
                                        </div>
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
