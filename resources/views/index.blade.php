@extends('layouts.principal')
@section('title')
	Inicio
@endsection
@section('content')
<section>
	<div class="wrapper">
		<div class="main-banner-slider">
			<div class="container">
				<div class="row">
					<div class="col-md-9">
						<div class="owl-carousel offers-banner owl-theme">
                            @foreach($banners as $key => $banner )
                                <div class="item @if($key==0)active @endif" >
                                    <div class="offer-item">
                                        <div class="offer-item-img">
                                            <div class="gambo-overlay"></div>
                                            <img src="{{ asset('/images/frontend_images/banners/large/'.$banner->image) }}" alt="" />
                                        </div>
                                        <div class="offer-text-dt">
                                            <div class="offer-top-text-banner">
                                                <p>Nuevo</p>
                                                <div class="top-text-1">{{$banner->title}}</div>
                                                <span>{{$banner->link}}</span>
                                            </div>
                                        </div>
                                    </div>
							@endforeach

					</div>
				</div>
			</div>
		</div>
		</div>
	</div>
    <!-- Categories End -->
    <!-- Featured Products Start -->
		<div class="section145">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<div class="main-title-tt">
							<div class="main-title-left">
								<h2>Categorias</h2>
							</div>
						</div>
					</div>
					<div class="col-md-12">
						<div class="owl-carousel cate-slider owl-theme">
							@foreach($categories as $cat)
                                <div class="item">
                                    <a href="#" class="category-item">
                                        <div class="cate-img">
                                            <img src="{{asset('principal/images/product/icon.png')}}" alt="">
                                        </div>
                                        <h4>{{ $cat->name }}</h4>
                                    </a>
                                </div>
							@endforeach
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- Categories End -->
		<!-- Featured Products Start -->
		<div class="section145">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<div class="main-title-tt">
							<div class="main-title-left">
                                <span>Para ti</span>
								<h2>Nuestros mejores productos</h2>
							</div>
							<a href="#" class="see-more-btn">Todos</a>
						</div>
					</div>
					<div class="col-md-12">
						<div class="owl-carousel featured-slider owl-theme">
                            @foreach($productsAll as $pro )
							<div class="item">
								<div class="product-item">
									<a href="#" class="product-img">
                                        <img src="{{ asset('/images/backend_images/product/small/'.$pro->image) }}" alt="" />
										<div class="product-absolute-options">
											<span class="offer-badge-1">2% off</span>
											<span class="like-icon" title="wishlist"></span>
										</div>
									</a>
									<div class="product-text-dt">
										<p>Available<span>(In Stock)</span></p>
                                        {{ $pro->product_name }}
										<div class="product-price">$ {{ $pro->price }}</div>
										<div class="qty-cart">
                                            <div style="width:100%; height: 100%">
                                                <button class="center">
                                                    <a href="{{ url('/product/'.$pro->id) }}" class="btn btn-default add-to-cart"><i class=""></i>Ver Producto</a>
                                                </button>
                                            </div>
										</div>
									</div>
								</div>
							</div>
                            @endforeach
						</div>
					</div>
				</div>
			</div>
        </div>
    <div class="section145">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="main-title-tt">
                        <div class="main-title-left">
                            <span>Ofertas</span>
                            <h2>Mejores valores</h2>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <a href="#" class="best-offer-item">
                        <img src={{asset('principal/images/offers/offer-1.jpg')}} alt="">
                    </a>
                </div>
                <div class="col-lg-4 col-md-6">
                    <a href="#" class="best-offer-item">
                        <img src={{asset('principal/images/offers/offer-2.jpg')}} alt="">
                    </a>
                </div>
                <div class="col-lg-4 col-md-6">
                    <a href="#" class="best-offer-item offr-none">
                        <img src={{asset('principal/images/offers/offer-3.jpg')}} alt="">
                        <div class="cmtk_dt">
                            <div class="product_countdown-timer offer-counter-text" data-countdown="2021/01/06"></div>
                        </div>
                    </a>
                </div>
                <div class="col-md-12">
                    <a href="#" class="code-offer-item">
                        <img src={{asset('principal/images/offers/offer-4.jpg')}} alt="">
                    </a>
                </div>
            </div>
        </div>
    </div>
    </div><br>
</section>
@endsection
