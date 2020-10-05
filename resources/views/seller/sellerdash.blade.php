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
        <li><i class="fa fa-id-card"></i>{{ __('Vendedor') }}</li>
      </ol>
    </div>
</div>

<div class="row">
    <div class="col-lg-12">
       @include('seller.sellerData.salesCart')
    </div>
</div>

@endsection
