<?php use App\Http\Controllers\Controller;
use App\Product;
$mainCategories =  Controller::mainCategories();
$cartCount = Product::cartCount(); ?>
<html>

<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, shrink-to-fit=9">
		<meta name="description" content="Gambolthemes">
		<meta name="author" content="Gambolthemes">
    <style>
        @media only screen and (max-width: 600px) {
            body {
                background-color: lightblue;
            }
        }
    </style>


    <title>ZonAgraria</title>

	    {{--  //  Icono  --}}
		<link rel="icon" type="ico/png" href="{{asset('principal/ico/logotipo.png')}}">

		<!-- Stylesheets -->
		<link href="https://fonts.googleapis.com/css2?family=Rajdhani:wght@300;400;500;600;700&amp;display=swap" rel="stylesheet">
		<link href="{{asset('principal/vendor/unicons-2.0.1/css/unicons.css')}}" rel="stylesheet">
		<link href="{{asset('principal/css/style.css')}}" rel="stylesheet">
		<link href="{{asset('principal/css/responsive.css')}}" rel="stylesheet">
		<link href="{{asset('principal/css/night-mode.css')}}" rel="stylesheet">
		@yield('styles')

		<!-- Vendor Stylesheets -->
		<link href="{{asset('principal/vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet">
		<link href="{{asset('principal/vendor/OwlCarousel/assets/owl.carousel.css')}}" rel="stylesheet">
		<link href="{{asset('principal/vendor/OwlCarousel/assets/owl.theme.default.min.css')}}" rel="stylesheet">
		<link href="{{asset('principal/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
		<link rel="stylesheet" type="text/css" href="{{asset('principal/vendor/semantic/semantic.min.css')}}">

        <script src="{{asset('principal/js/jquery-3.3.1.min.js')}}"></script>



</head>
<body>
	@if (!isset($crearMenu))

	<!-- Category Model Start-->
	<div id="category_model" class="header-cate-model main-gambo-model modal fade" tabindex="-1" role="dialog" aria-modal="false">
        <div class="modal-dialog category-area" role="document">
            <div class="category-area-inner">
                <div class="modal-header">
                    <button type="button" class="close btn-close" data-dismiss="modal" aria-label="Close">
						<i class="uil uil-multiply"></i>
                    </button>
                </div>
                <div class="category-model-content modal-content">
					<div class="cate-header">
						<h4>Categorias</h4>
					</div>
                    <ul class="category-by-cat">
                        @if(isset($categories))
                        @foreach($categories as $cat)
						<li>
							<a href="#" class="single-cat-item">
								<div class="icon">
									<img src="{{asset('principal/images/product/icon.png')}}" alt="">
								</div>
								<div class="text">
									<h6> {{ $cat->name }}</h6>
                                </div>
							</a>
						</li>
                            @endforeach
                        @endif
                    </ul>

                </div>
            </div>
        </div>
    </div>
	<div id="search_model" class="header-cate-model main-gambo-model modal fade" tabindex="-1" role="dialog" aria-modal="false">
        <div class="modal-dialog search-ground-area" role="document">
            <div class="category-area-inner">
                <div class="modal-header">
                    <button type="button" class="close btn-close" data-dismiss="modal" aria-label="Close">
						<i class="uil uil-multiply"></i>
                    </button>
                </div>

					<div class="search-header">
						<form action="{{url('/search-products')}}" method="POST">{{csrf_field()}}
							<input type="search" placeholder="Buscar productos..." name="product">
							<button type="submit">
                                <i class="uil uil-search"></i>
                            </button>
						</form>
					</div>
            </div>
        </div>
    </div>
	<header class="header clearfix">
		<div class="top-header-group">
			<div class="top-header">
				<div class="main_logo" id="logo">
				<a href="principal.blade.php"><img src="{{asset('principal/ico/LOGO_ZONAGRARIA.png')}}" alt=""></a>
				</div>
				<div class="select_location">
				</div>
				<div class="search120">
					<div class="ui search">
                        <form action="{{ url('/search-products') }}" method="post">
                            {{csrf_field()}}
                            <div class="ui left icon input swdh10">
                                <input class="prompt srch10" type="text" placeholder="Buscar productos.." name="product">
                                <i class='uil uil-search-alt icon icon1'></i>
                            </div>
                        </form>
					</div>

				</div>
				<div class="header_right">
					<ul>
						<li>
							<a href="#" class="offer-link"><i class="uil uil-phone-alt"></i>+57 3102122908</a>
						</li>
						<li>
							<a href="offers.html" class="offer-link"><i class="uil uil-gift"></i>Ofertas</a>
						</li>
                        <li><a href="{{ url('/cart') }}"><i class="fa fa-shopping-cart"></i> Carrito ({{ $cartCount }})</a></li>
						<li>
							<a href="dashboard_my_wishlist.html" class="option_links" title="Wishlist"><i class='uil uil-heart icon_wishlist'></i><span class="noti_count1">3</span></a>
						</li>
                        @if(empty(Auth::check()))
                            <li><a href="{{ url('/login-register') }}"><i class="fa fa-lock"></i> Ingresar</a></li>
                        @else
                            <li><a href="{{ url('/account') }}"><i class="fa fa-user"></i> Cuenta</a></li>
                            <li><a href="{{ url('/user-logout') }}"><i class="fa fa-sign-out"></i> Salir</a></li>
                        @endif
                    </ul>
				</div>
			</div>
		</div>
		<div class="sub-header-group">
			<div class="sub-header">
				<div class="ui dropdown">
					<a href="#" class="category_drop hover-btn" data-toggle="modal" data-target="#category_model" title="Categories"><i class="uil uil-apps"></i><span class="cate__icon">Ver Categorias</span></a>
				</div>
				<nav class="navbar navbar-expand-lg navbar-light py-3">
					<div class="container-fluid">
						<button class="navbar-toggler menu_toggle_btn" type="button" data-target="#navbarSupportedContent"><i class="uil uil-bars"></i></button>
						<div class="collapse navbar-collapse d-flex flex-column flex-lg-row flex-xl-row justify-content-lg-end bg-dark1 p-3 p-lg-0 mt1-5 mt-lg-0 mobileMenu" id="navbarSupportedContent">
							<ul class="navbar-nav main_nav align-self-stretch">
								<li class="nav-item"><a href="{{ url('/') }}" class="nav-link active" title="Home">@yield('title')</a></li>
							</ul>
						</div>
					</div>
				</nav>
				<div class="catey__icon">
					<a href="#" class="cate__btn" data-toggle="modal" data-target="#category_model" title="Categories"><i class="uil uil-apps"></i></a>
				</div>
                <!-- <div class="header_cart order-1">
					<a href="#" class="cart__btn hover-btn pull-bs-canvas-left" title="Cart"><i class="uil uil-shopping-cart-alt"></i><span>Cart</span><ins>2</ins><i class="uil uil-angle-down"></i></a>
				</div>-->
				<div class="search__icon order-1">
					<a href="#" class="search__btn hover-btn" data-toggle="modal" data-target="#search_model" title="Search"><i class="uil uil-search"></i></a>
				</div>
			</div>
		</div>
	</header>
	@endif
	<!-- Header End -->
	<!-- Body Start -->
		@yield('content')
	<!-- Body End -->
	<!-- Footer Start -->

	<footer class="footer">
		<div class="footer-last-row">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<div class="copyright-text">
							<i class="uil uil-copyright"></i>ZonAgraria 2020 <b>Productos</b> . Todos los derechos reservados
						</div>
					</div>
				</div>
			</div>
		</div>
	</footer>

	<!-- Footer End -->

	<!-- Javascripts -->

	<script src="{{asset('principal/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
	<script src="{{asset('principal/vendor/OwlCarousel/owl.carousel.js')}}"></script>
	<script src="{{asset('principal/vendor/semantic/semantic.min.js')}}"></script>
	<script src="{{asset('principal/js/jquery.countdown.min.js')}}"></script>
	<script src="{{asset('principal/js/custom.js')}}"></script>
	<script src="{{asset('principal/js/offset_overlay.js')}}"></script>
	<script src="{{asset('principal/js/night-mode.js')}}"></script>
    <script src="{{asset('js/frontend_js/main.js')}}" type="text/javascript"></script>




</body>

</html>
