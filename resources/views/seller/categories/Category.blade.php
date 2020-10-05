@extends('seller.layouts.main')

@section('content')

<h2 class="mt-4">CLIENTES</h2>
<ol class="breadcrumb mb-4">
  <li class="breadcrumb-item active">Clientes del vendedor</li>
</ol>
@include('seller.categories.addModal')
<br>
<br>
<br>

  @if($message = Session::get('Registrado'))
          <div class="col-12 alert alert-success alert-dismissable fade show" role="alert">
            <span>{{$message}}</span>

           <button type="button" class="close" data-dismiss="alert" aria-label="Close">
             <span aria-hidden="true">&times;</span>
           </button>
          </div>
  @endif

 




@endsection

@section('script')
  <script>
   var idEliminar = 0;
    $(document).ready(function(){
      @if($message = Session::get('ErrorsInsert'))
        $("#modalAgregar").modal('show');
      @endif

      $(".btnEliminar").click(function(){
        idEliminar = $(this).data('id');
      });

      $(".btnmodalEliminar").click(function(){
        $("#formEli_"+idEliminar).submit();
      });

      $(".btnEditar").click(function(){

        $("#idEdit").val($(this).data('id'));
        $("#nameEdit").val($(this).data('name'));
        $("#cellphoneEdit").val($(this).data('cellphone'));
        $("#emailEdit").val($(this).data('email'));
        $("#addressEdit").val($(this).data('address'));
        $("#passwordEdit").val($(this).data('password'));
        $("#cityEdit").val($(this).data('city'));
        $("#departments").val($(this).data('department'));
        $("#rols").val($(this).data('rol_id'));
      });

    });
  </script>
@endsection
