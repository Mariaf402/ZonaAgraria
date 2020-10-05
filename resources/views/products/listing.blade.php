@extends('layouts.principal')

@section('content')
    <?php
    use App\Product
    use App\Http\Controllers\Controller;
    $mainCategories =  Controller::mainCategories();
    $cartCount = Product::cartCount();
    ?>
<section id="slider"><!--slider-->
		<div class="container">
			<div class="row">
				<div class="col-sm-12">
					<div id="slider-carousel" class="carousel slide" data-ride="carousel">
						<ol class="carousel-indicators">
							<li data-target="#slider-carousel" data-slide-to="0" class="active"></li>
							<li data-target="#slider-carousel" data-slide-to="1"></li>
							<li data-target="#slider-carousel" data-slide-to="2"></li>
						</ol>
						<div class="carousel-inner">
							<div class="item active">
							</div>
							<div class="item">
								<div class="col-sm-6">
									<h1><span>E</span>-ZonAgraria</h1>

								</div>
							</div>
							<div class="item">
								<div class="col-sm-6">
									<img src="images/home/girl3.jpg" class="girl img-responsive" alt="" />
									<img src="images/home/pricing.png" class="pricing" alt="" />
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
</section><!--/slider-->
<section>
	<div class="container">
		<div class="row">
			<div class="col-sm-12 padding-right">
				<div class="features_items"><!--features_items-->
					<h2 class="title text-center">
						@if(!empty($search_product))
							{{ $search_product }} Item
						@else

						@endif
						    ({{ count($productsAll) }})
					</h2>
					<!-- <div align="left"></div> -->
					<div>&nbsp;</div>
					@foreach($productsAll as $pro)
                        <label>
						<div class="product-image-wrapper">
							<div class="single-products">
									<div class="productinfo text-center">
										<img src="{{ asset('/images/backend_images/product/small/'.$pro->image) }}" alt="" />
										<h2>$ {{ $pro->price }}</h2>
										<p>{{ $pro->product_name }}</p>
										<a href="{{ url('/product/'.$pro->id) }}" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add al carrito</a>
									</div>
							</div>
						</div>
                        </label>
					@endforeach

				</div>
			</div>
		</div>
	</div>
</section>

@endsection
