@extends('seller.layouts.main')

@section('content')

<h2 class="mt-4">Carrito</h2>
  <ol class="breadcrumb mb-4">
    <li class="breadcrumb-item active">Productos</li>
  </ol>
<br>

<div class="card mb-4">
        <div class="card-header">
            <h2 class="text-center"><i class="fas fa-store"></i>Todos Nuestros Productos</h2>
        </div>

        <div class="card-body">
          <div class="row row-cols-1 row-cols-md-2"> 
              @foreach($producs as  $produc)
                  <div class="card">
                    <div class="card-body">
                        <div class="d-md-flex flex-md-equal w-100 my-md-3 pl-md-3">
                            <div class="bg-light mr-md-3 pt-3 px-3 pt-md-5 px-md-5 text-center overflow-hidden">
                              <div class="my-3 p-3">
                                <img src="{{url('/imagenes/Category/productos/'.$produc->image)}}" class="card-img-top" alt="...">
                                <h2 class="display-5"><a class="text-dark" href="#">{{$produc->product_name}}</a></h2>
                                <h2 class="display-5"><i class="fas fa-dollar-sign"></i> {{$produc->price}}</h2>
                              </div>
                              <div class="bg-white shadow-sm mx-auto" style="width: 80%; height: 300px; border-radius: 21px 21px 21px 21px;">
                                 <h2 class="display-5">Descripción</h2>
                                 <p class="lead">{{$produc->description}}</p>
                                 <button type="button" class="btn btn-secondary btn-lg active" role="button" aria-pressed="true">Añadir</a>
                              </div>
                            </div>
                        </div>
                    </div>
                  </div>                      
              @endforeach
          </div>
        </div>
</div>
@endsection

