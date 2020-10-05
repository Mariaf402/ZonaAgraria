@extends('seller.layouts.main')

@section('content')

<h2 class="mt-4">PRODUCTOS</h2>
<ol class="breadcrumb mb-4">
  <li class="breadcrumb-item active">Todos los productos</li>
</ol>
<br>
<div class="card mb-4">
  <div class="card-header">
      <i class="fas fa-table mr-1"></i>
      Lista
  </div>

  <div class="card-body">
    <div class="table-responsive">
          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                  <tr>
                    <th>id</th>
                    <th>product_name</th>
                    <th>product_code</th>
                    <th>product_stock</th>
                    <th>categorie_id</th>
                    <th>Ver</th>
                  </tr>
              </thead>
              <tfoot>
                  <tr>
                    <th>id</th>
                    <th>product_name</th>
                    <th>product_code</th>
                    <th>product_stock</th>
                    <th>categorie_id</th>
                    <th>Ver</th>
                  </tr>
              </tfoot>
              <tbody>
                @foreach($prods as $prod)
                    <tr>
                        <td>{{$prod->id}}</td>
                        <td>{{$prod->product_name}}</td>
                        <td>{{$prod->product_code}}</td>
                        <td>{{$prod->product_stock}}</td>
                        <td>{{$prod->categorie_id}}</td>
                        <td><a href="">Ver</a></td>
                    </tr>
                @endforeach
              </tbody>
          </table>
      </div>
  </div>

</div>


@endsection