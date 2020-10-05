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
            <h1>Ver Productos</h1>
            <small>Lista De Productos</small>
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
                           <h4>Ver Productos</h4>
                        </a>
                     </div>
                  </div>
                  <div class="panel-body">
                  <!-- Plugin content:powerpoint,txt,pdf,png,word,xl -->
                     <div class="btn-group">
                        <div class="buttonexport" id="buttonlist">
                        <a class="btn btn-add" href="{{url('admin/add-product')}}"> <i class="fa fa-plus"></i> Añadir Producto
                           </a>
                        </div>

                     </div>
                     <!-- Plugin content:powerpoint,txt,pdf,png,word,xl -->
                     <div class="table-responsive">
                        <table id="table_id" class="table table-bordered table-striped table-hover">
                           <thead>
                              <tr class="info">
                              <th>ID Producto</th>
                     <th>ID Categoria</th>
                     <th>Nombre Categoria</th>
                     <th>Nombre Producto</th>
                     <th>Codigo Producto</th>
                     <th>Color Producto</th>
                     <th>Presentacion Caja</th>
                     <th>Cantidades Aprox Por Kilo</th>
                     <th>Precio</th>
                     <th>Imagen</th>
                     <th>Producto Destacado</th>
                     <th>Acciones</th>
                              </tr>
                           </thead>
                           <tbody>
                              @foreach($products as $product)
                              <tr>
                              <td class="center">{{ $product->id }}</td>
                     <td class="center">{{ $product->category_id }}</td>
                     <td class="center">{{ $product->category_name }}</td>
                     <td class="center">{{ $product->product_name }}</td>
                     <td class="center">{{ $product->product_code }} </td>
                     <td class="center">{{ $product->product_color }}</td>
                     <td class="center">{{ $product->sleeve }}</td>
                     <td class="center">{{ $product->pattern }}</td>
                     <td class="center">$ {{ $product->price }}</td>
                     <td class="center">
                     @if(!empty($product->image))
                     <img src="{{ asset('/images/backend_images/product/small/'.$product->image) }}" style="width:50px;">
                     @endif
                     </td>
                     <td class="center">@if($product->feature_item == 1) SI @else NO @endif</td>
                                  <td class="center">

                     <a href="{{ url('/admin/edit-product/'.$product->id) }}" class="btn btn-add btn-sm"><i class="fa fa-pencil"></i></a>
                     <a href="{{ url('/admin/add-attributes/'.$product->id) }}" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i></a>
                     <a href="{{ url('/admin/add-images/'.$product->id) }}" class="btn btn-primary btn-sm"><i class="fa fa-image"></i></a>

                     <a  id="delpro" onclick="Delete('{{$product->id}}')" href="#"  class="btn btn-danger btn-sm"><i class="fa fa-trash-o"></i> </a>
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
                           var url = "{{ url('admin/delete-product/%id%') }}";
                           url = url.replace('%id%', id);
                           window.location.href = url;
                       }
                   });
           }
       </script>
   @endsection
