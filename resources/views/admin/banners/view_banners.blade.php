@extends('layouts.adminLayout.admin_design')
@section('content')
    <link rel="stylesheet" href="{{asset('css/backend_css/sweetalert.css')}}">
    <script src="{{asset('js/backend_js/sweetalert.min.js')}}"></script>
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="header-icon">
                <i class="fa fa-product-hunt"></i>
            </div>
            <div class="header-title">
                <h1>Ver Banner</h1>
                <small>Lista de banners</small>
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
                        <div class="panel-heading">
                            <div class="btn-group" id="buttonexport">
                                <a href="#">
                                    <h4>Ver Banner</h4>
                                </a>
                            </div>
                        </div>
                        <div class="panel-body">
                            <!-- Plugin content:powerpoint,txt,pdf,png,word,xl -->
                            <div class="btn-group">
                                <div class="buttonexport" id="buttonlist">
                                    <a class="btn btn-add" href="{{url('admin/add-banner')}}"> <i class="fa fa-plus"></i> Añadir Banner
                                    </a>
                                </div>

                            </div>
                            <!-- Plugin content:powerpoint,txt,pdf,png,word,xl -->
                            <div class="table-responsive">
                                <table id="table_id" class="table table-bordered table-striped table-hover">
                                    <thead>
                                    <tr class="info">
                                        <th>Banner ID</th>
                                        <th>Title</th>
                                        <th>Link</th>
                                        <th>Imagen</th>
                                        <th>Acciones</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($banners as $banner)
                                        <tr class="gradeX">
                                            <td class="center">{{ $banner->id }}</td>
                                            <td class="center">{{ $banner->title }}</td>
                                            <td class="center">{{ $banner->link }}</td>
                                            <td class="center">
                                                @if(!empty($banner->image))
                                                    <img src="{{ asset('/images/frontend_images/banners/large/'.$banner->image) }}" style="width:90px">
                                                @endif
                                            </td>
                                            <td class="center">
                                                <a href="{{ url('/admin/edit-banner/'.$banner->id) }}" class="btn btn-add btn-sm"><i class="fa fa-pencil"></i></a>
                                                <a id="delbanner" onclick="Delete('{{$banner->id}}')" href="#" class="btn btn-danger btn-sm"><i class="fa fa-trash-o"></i> </a>
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
        </section>
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
                        var url = "{{ url('/admin/delete-banner/%id%') }}";
                        url = url.replace('%id%', id);
                        window.location.href = url;
                    }
                });
        }
    </script>
@endsection




