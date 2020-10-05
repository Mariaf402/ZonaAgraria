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
          <h1>Atributos</h1>
          <small>Añade Atributos a tu Producto</small>
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
                      <i class="fa fa-eye"></i>Atributos</a>
                   </div>
                </div>
                <div class="panel-body">
                <form class="col-sm-6" enctype="multipart/form-data" action="{{url('/admin/add-attributes/'.$productDetails->id)}}" method="post"> {{csrf_field()}}
                <input type="hidden" name="product_id" value="{{ $productDetails->id }}">
                      <div class="form-group">
                         <label>Nombre del Producto:</label> {{$productDetails->product_name}}
                      </div>
                      <div class="form-group">
                         <label>Código del Producto:</label> {{$productDetails->product_code}}
                      </div>

                      <div class="form-group">
                         <label>Color del Producto:</label> {{$productDetails->product_color}}
                      </div>
                      <div class="form-group">
                            <div class="field_wrapper">
                                <div style="display:flex;">
                                <input required title="Required" type="text" name="sku[]" id="sku" placeholder="Codigo Producto" style="width:120px;">
                                 <input required title="Required" type="text" name="size[]" id="size" placeholder="Tamaño" style="width:120px;">
                                 <input required title="Required" type="text" name="price[]" id="price" placeholder="Precio" style="width:120px;">
                                 <input required title="Required" type="text" name="stock[]" id="stock" placeholder="stock" style="width:120px;">
                                    <a href="javascript:void(0);" class="add_button" title="Add Field">Añadir</a>
                                </div>
                            </div>
                      </div>
                      <div class="reset-button">
                         <input type="submit" class="btn btn-success" value="Añadir atributos">
                      </div>
                   </form>
                </div>
             </div>
          </div>
       </div>
    </section>
    <!--View Attributes -->
    <section class="content">
      <div class="row">
         <div class="col-sm-12">
            <div class="panel panel-bd lobidrag">
               <div class="panel-heading">
                  <div class="btn-group" id="buttonexport">
                     <a href="#">
                        <h4>Ver Atributos</h4>
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
                     <form enctype="multipart/form-data" action="{{url('/admin/edit-attributes/'.$productDetails->id)}}" method="post"> {{csrf_field()}}
                         <table id="table_id" class="table table-bordered table-striped table-hover">
                         <thead>
                           <tr class="info">
                           <th>Atributo ID</th>
                           <th>Codigo producto</th>
                           <th>Tamaño</th>
                           <th>Precio</th>
                           <th>Stock</th>
                           <th>Acciones</th>
                           </tr>
                        </thead>
                        <tbody>
                        @foreach($productDetails->attributes as $attribute)
                  <tr class="gradeX">
                    <td class="center"><input type="hidden" name="idAttr[]" value="{{ $attribute->id }}">{{ $attribute->id }}</td>
                    <td class="center">{{ $attribute->sku }}</td>
                    <td class="center">{{ $attribute->size }}</td>
                    <td class="center"><input name="price[]" type="text" value="{{ $attribute->price }}" /></td>
                    <td class="center"><input name="stock[]" type="text" value="{{ $attribute->stock }}" required /></td>
                    <td class="center">
                      <input type="submit" value="Actualizar" class="btn btn-primary btn-mini" />
                      <?php /* <a rel="{{ $attribute->id }}" rel1="delete-attribute" href="javascript:" class="btn btn-danger btn-mini deleteRecord">Delete</a> */ ?>
                      <a href="{{ url('admin/delete-attribute/'.$attribute->id) }}" class="btn btn-danger btn-mini">Eliminar</a>
                    </td>
                  </tr>
                  @endforeach
                        </tbody>
                     </table>
                     </form>
                  </div>
               </div>
            </div>
         </div>
      </div>
    </section>
  </div>
@endsection

