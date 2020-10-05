@extends('seller.layouts.main')

@section('content')

<br>
<div class="row">
    <div class="col-lg-12">
      <h3 class="page-header"><i class="fa fa-laptop"></i> Dashboard</h3>
      <br>
      <ol class="breadcrumb">
        <li><i class="fa fa-home"></i><a href="{{ url('/seller/dash/') }}">Home/</a></li>
        @if (session('status'))
          <div class="alert alert-success" role="alert">
              {{ session('status') }}
          </div>
        @endif
        <li><i class="fa fa-tags"></i>{{ __('Productos') }}</li>
      </ol>
    </div>
</div>
<br>

<div class="card mb-4">
        <div class="card-header">
            <h2 class="text-center"><i class="fas fa-store"></i>Todos Nuestros Productos</h2>
        </div>

        <div class="card-body">
          <div class="row row-cols-1 row-cols-md-2"> 
              @foreach($productos as  $producto)
                  <div class="card">
                    <div class="card-body">
                        <div class="d-md-flex flex-md-equal w-100 my-md-3 pl-md-3">
                            <div class="bg-light mr-md-3 pt-3 px-3 pt-md-5 px-md-5 text-center overflow-hidden">
                              <div class="my-3 p-3"> 
                                <img src="{{asset('/images/backend_images/product/small/'.$producto->image)}}" class="card-img-top" alt="...">
                                <h2 class="display-5"><a class="text-dark" href="#">{{$producto->product_name}}</a></h2>
                                <h2 class="display-5"><i class="fas fa-dollar-sign"></i> {{$producto->price}}</h2>
                                <h2 class="display-5">Codigo del producto {{$producto->product_code}}</h2>
                              </div>
                              <div class="bg-white shadow-sm mx-auto" style="width: 80%; height: 300px; border-radius: 21px 21px 21px 21px;">
                                 <h2 class="display-5">Descripción</h2>
                                 <p class="lead">{{$producto->description}}</p>
                                 <h2 class="display-5">Cantidad {{$producto->pattern}}</h2>
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

