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
          <h1>Agregar Producto</h1>
          <small>Agregar Producto</small>
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
                      <i class="fa fa-eye"></i>Agregar Producto</a>
                   </div>
                </div>
                <div class="panel-body">
                <form class="col-sm-6" enctype="multipart/form-data" action="{{url('admin/edit-product/'.$productDetails->id)}}" method="post"> {{csrf_field()}}
                     <div class="form-group">
                        <label>Seleccionar Categoria</label>
                        <select name="category_id" id="category_id" class="form-control" >
                           <?php echo $categories_drop_down; ?>
                        </select>
                     </div>
                      <div class="form-group">
                         <label>Nombre del Producto</label>
                         <input type="text" class="form-control" value="{{ $productDetails->product_name }}" placeholder="Nombre del Producto" name="product_name" id="product_name"  required>
                      </div>
                      <div class="form-group">
                         <label>Codigo Producto</label>
                         <input type="text" class="form-control" value="{{ $productDetails->product_code }}" placeholder="Codigo del producto" name="product_code" id="product_code"  required>
                      </div>
                      <div class="form-group">
                         <label>Color Producto</label>
                         <input type="text" class="form-control" value="{{ $productDetails->product_color }}" placeholder="Color del Producto" name="product_color" id="product_color"  required>
                      </div>
                      <div class="form-group">
                         <label>Descripcion del producto</label>
                         <textarea name="description" id="description" class="form-control">
                         {{ $productDetails->description }}
                         </textarea>
                      </div>
                      <div class="form-group">
                         <label>Cuidados</label>
                         <textarea name="care" value="" id="care" class="form-control">
                         {{ $productDetails->care }}
                         </textarea>
                      </div>
                      <div class="form-group">
                         <label>Presentacion del Producto</label>
                         <input type="text" class="form-control" value="{{ $productDetails->sleeve }}" placeholder="Presentacion del Producto" name="sleeve" id="sleeve" required>
                      </div>
                      <div class="form-group">
                         <label>Precio del Producto</label>
                         <input type="text" class="form-control" value="{{ $productDetails->price }}" placeholder="Precio del Producto" name="price" id="price" required>
                      </div>
                      <div class="form-group">
                         <label>Kilo Por Presentacion</label>
                         <input type="text" class="form-control" value="{{ $productDetails->pattern }}" placeholder="Kilo Por Presentacion" name="pattern" id="pattern" required>
                      </div>
                      <div class="form-group">
                         <label>Peso</label>
                         <input type="text" class="form-control" value="{{ $productDetails->weight }}" placeholder="Peso del Producto" name="weight" id="weight" required>
                      </div>

                      <div class="form-group">
                        <label>Subir Imagen</label>
                        <input type="file" name="image">
                     </div>

                     <div class="form-group">
                         <label>Destacar Producto</label>
                         <div class="controls">
                      <input type="checkbox" class="form-control" name="feature_item" id="feature_item" @if($productDetails->feature_item == "1") checked @endif value="1">
                      </div>
                     <div class="form-group">
                         <label>Habilitar?</label>
                         <div class="controls">
                      <input type="checkbox" class="form-control" name="status" id="category_status" @if($productDetails->status == "1") checked @endif value="1">
                      </div>

                      <div class="reset-button">
                         <input type="submit" class="btn btn-success" value="Editar Producto">
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
