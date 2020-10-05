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
                <form class="col-sm-6" enctype="multipart/form-data" action="{{url('/admin/add-product')}}" method="post"> {{csrf_field()}}
                     <div class="form-group">
                        <label>Seleccionar Categoria</label>
                        <select name="category_id" id="category_id" class="form-control" >
                           <?php echo $categories_drop_down; ?>
                        </select>
                     </div>
                      <div class="form-group">
                         <label>Nombre del Producto</label>
                         <input type="text" class="form-control" placeholder="Nombre del Producto" name="product_name" id="product_name" required>
                      </div>
                      <div class="form-group">
                         <label>Codigo Del Producto</label>
                         <input type="number" class="form-control" placeholder="Codigo del producto" name="product_code" id="product_code" required>
                      </div>
                      <div class="form-group">
                         <label>Color Producto</label>
                         <textarea name="product_color" id="product_color" class="form-control" required>
                         </textarea>
                      </div>
                      <div class="form-group">
                         <label>Descripcion del producto</label>
                         <textarea name="description" id="description" class="form-control" required>
                         </textarea>
                      </div>
                      <div class="form-group">
                         <label>Cuidados</label>
                         <textarea name="care" id="product_color" class="form-control" required>
                         </textarea>
                      </div>
                      <div class="form-group">
                         <label>Presentacion Del Producto</label>
                         <textarea name="sleeve" id="sleeve" class="form-control" required>
                         </textarea>
                      </div>
                      <div class="form-group">
                         <label>Precio del Producto</label>
                         <input type="number" class="form-control" placeholder="Precio del Producto" name="price" id="price" required>
                      </div>
                      <div class="form-group">
                         <label>Kilo Por Presentacion</label>
                         <input type="number" class="form-control" placeholder="Kilo por presentacion" name="pattern" id="pattern" required>
                      </div>
                      <div class="form-group">
                         <label>Peso</label>
                         <input type="number" class="form-control" placeholder="Peso del Producto" name="weight" id="weight" required>
                      </div>

                      <div class="form-group">
                        <label>Subir Imagen</label>
                        <input type="file" name="image" required>
                     </div>

                     <div class="form-group">
                         <label>Destacar Producto</label>
                         <div class="controls">
                      <input type="checkbox" class="form-control" name="feature_item" id="feature_item" value="1">
                      </div>
                     <div class="form-group">
                         <label>Habilitar?</label>
                         <div class="controls">
                      <input type="checkbox" class="form-control" name="status" id="category_status" value="1">
                      </div>
                      <div class="reset-button">
                         <input type="submit" class="btn btn-success" value="Agregar Producto">
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
