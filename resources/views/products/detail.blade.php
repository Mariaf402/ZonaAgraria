@extends('layouts.principal')
@section('content')
@section('title')
    Inicio
@endsection
<?php use App\Product; ?>
<section>
    <div class="container">
        <div class="row">
            <div class="wrapper">
                <div class="product-details">
                    <div class="all-product-grid">
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="product-dt-view">
                                        <div class="row">
                                            <div class="col-lg-3 col-md-3">
                                                <a id="mainImgLarge"
                                                   href="{{ asset('/images/backend_images/product/large/'.$productDetails->image) }}">
                                                    <img style="width:300px" id="mainImg"
                                                         src="{{ asset('/images/backend_images/product/medium/'.$productDetails->image) }}"
                                                         alt=""/>
                                                </a>
                                                <div class="owl-carousel owl-theme">
                                                    @if(count($productAltImages)>0)
                                                        <div class="item active thumbnails">
                                                            @foreach($productAltImages as $altimg)
                                                                <a href="{{ asset('images/backend_images/product/medium/'.$altimg->image) }}"
                                                                   data-standard="{{ asset('images/backend_images/product/small/'.$altimg->image) }}">
                                                                    <img class="changeImage"
                                                                         style="width:80px; cursor:pointer"
                                                                         src="{{ asset('images/backend_images/product/small/'.$altimg->image) }}"
                                                                         alt="">
                                                                </a>
                                                            @endforeach
                                                        </div>
                                                    @endif
                                                </div>

                                            </div>
                                            <div class="col-lg-8 col-md-8">
                                                @if(Session::has('flash_message_success'))
                                                    <div class="alert alert-success alert-block">
                                                        <button type="button" class="close" data-dismiss="alert">×</button>
                                                        <strong>{!! session('flash_message_success') !!}</strong>
                                                    </div>
                                                @endif
                                                @if(Session::has('flash_message_error'))
                                                    <div class="alert alert-error alert-block" style="background-color:#d7efe5">
                                                        <button type="button" class="close" data-dismiss="alert">×</button>
                                                        <strong>{!! session('flash_message_error') !!}</strong>
                                                    </div>
                                                @endif
                                                <div class="product-dt-right">
                                                    <form name="addtoCartForm" id="addtoCartForm" action="{{ url('add-cart') }}" method="post">{{ csrf_field() }}
                                                        <input type="hidden" name="product_id"
                                                               value="{{ $productDetails->id }}">
                                                        <input type="hidden" name="product_name"
                                                               value="{{ $productDetails->product_name }}">
                                                        <input type="hidden" name="product_code"
                                                               value="{{ $productDetails->product_code }}">
                                                        <input type="hidden" name="product_color"
                                                               value="{{ $productDetails->product_color }}">
                                                        <input type="hidden" name="price" id="price"
                                                               value="{{ $productDetails->price }}">
                                                        <div class="product-information"><!--/product-information-->
                                                            <img src="images/product-details/new.jpg" class="newarrival"
                                                                 alt=""/>
                                                            <h2>{{ $productDetails->product_name }}</h2>
                                                            <div class="no-stock">
                                                                <p class="pd-no">Código
                                                                    producto<span></span>{{ $productDetails->product_code }}
                                                                </p>
                                                                <p class="pd-no">
                                                                    Color:<span></span>{{ $productDetails->product_color }}
                                                                </p>
                                                                @if(!empty($productDetails->pattern))
                                                                    <p class="pd-no">
                                                                        Patron:<span></span>{{ $productDetails->pattern }}
                                                                    </p>
                                                                @endif
                                                                <p class="pd-no">
                                                                    Disponibilidad:<span id="Availability"> @if($total_stock>0) En stock @else Agotado @endif</span></p>
                                                            </div>
                                                            <div class="product-group-dt">
                                                                <ul>
                                                                    <li>
                                                                        <div class="main-price color-discount">
                                                                            Precio<span id="precios">${{ $productDetails->price }} </span>
                                                                        </div>
                                                                    </li>
                                                                </ul>
                                                                <ul class="gty-wish-share">
                                                                    <li>
                                                                        <div class="qty-product">
                                                                            <div class="quantity buttons_added">
                                                                                <label>Cantidad:</label>
                                                                                <input name="quantity" type="text"
                                                                                       value="1"/><br><br>
                                                                            </div>
                                                                            <select id="" onchange="precio(this.value)" name="size" style="width:150px;" required>
                                                                                <option value="">Tamaño</option>
                                                                                @foreach($productDetails->attributes as $sizes)
                                                                                    <option value="{{ $productDetails->id }}-{{ $sizes->size }}">{{ $sizes->size}}</option>
                                                                                @endforeach
                                                                            </select>
                                                                        </div>
                                                                    </li>
                                                                    <br>
                                                                </ul>
                                                                <ul class="ordr-crt-share">
                                                                    <li>
                                                                        @if($total_stock>0)
                                                                        <button type="submit"
                                                                                class="add-cart-btn hover-btn"
                                                                                id="cartButton" name="cartButton"
                                                                                value="Shopping Cart"><i
                                                                                class="uil uil-shopping-cart-alt"></i>Agregar
                                                                            al carrito
                                                                        </button>
                                                                        @endif
                                                                    </li>

                                                                </ul>
                                                            </div>
                                                            <div class="pdp-details">
                                                                <ul>
                                                                    <li>
                                                                        <div class="pdp-group-dt">
                                                                            <div class="pdp-icon"><i
                                                                                    class="uil uil-usd-circle"></i>
                                                                            </div>
                                                                            <div class="pdp-text-dt">
                                                                                <span>Precio más bajo garantizado</span>
                                                                                <p>Obtenga el reembolso de la diferencia
                                                                                    si lo encuentra más barato en otro
                                                                                    lugar.</p>
                                                                            </div>
                                                                        </div>
                                                                    </li>
                                                                    <li>
                                                                        <div class="pdp-group-dt">
                                                                            <div class="pdp-icon"><i
                                                                                    class="uil uil-cloud-redo"></i>
                                                                            </div>
                                                                            <div class="pdp-text-dt">
                                                                                <span>Devoluciones y reembolsos fáciles</span>
                                                                                <p>Devuelva productos en la puerta y
                                                                                    obtenga un reembolso en
                                                                                    segundos.</p>
                                                                            </div>
                                                                        </div>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-4 col-md-12">
                                <div class="pdpt-bg">
                                    <div class="pdpt-title">
                                        <h4>Productos</h4>
                                    </div>
                                    <div class="pdpt-body scrollstyle_4">
                                        <div class="cart-item border_radius">
                                            <div class="cart-product-img">
                                                <img src="{{asset('principal/images/product/img-6.jpg')}}" alt="">
                                                <div class="offer-badge">OFF</div>
                                            </div>
                                            <div class="cart-text">
                                                <h4>Kiwi</h4>
                                                <div class="qty-group">
                                                    <div class="quantity buttons_added">
                                                        <input type="button" value="-" class="minus minus-btn">
                                                        <input type="number" step="1" name="quantity" value="1"
                                                               class="input-text qty text">
                                                        <input type="button" value="+" class="plus plus-btn">
                                                    </div>
                                                    <div class="cart-item-price">$12 <span>$15</span></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="cart-item border_radius">
                                            <div class="cart-product-img">
                                                <img src="{{asset('principal/images/product/img-4.jpg')}}" alt="">
                                                <div class="offer-badge"> OFF</div>
                                            </div>
                                            <div class="cart-text">
                                                <h4>Zanahoria</h4>
                                                <div class="qty-group">
                                                    <div class="quantity buttons_added">
                                                        <input type="button" value="-" class="minus minus-btn">
                                                        <input type="number" step="1" name="quantity" value="1"
                                                               class="input-text qty text">
                                                        <input type="button" value="+" class="plus plus-btn">
                                                    </div>
                                                    <div class="cart-item-price">$24 <span>$30</span></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="cart-item border_radius">
                                            <div class="cart-product-img">
                                                <img src="{{asset('principal/images/product/img-5.jpg')}}" alt="">
                                                <div class="offer-badge"> OFF</div>
                                            </div>
                                            <div class="cart-text">
                                                <h4>Banano</h4>
                                                <div class="qty-group">
                                                    <div class="quantity buttons_added">
                                                        <input type="button" value="-" class="minus minus-btn">
                                                        <input type="number" step="1" name="quantity" value="1"
                                                               class="input-text qty text">
                                                        <input type="button" value="+" class="plus plus-btn">
                                                    </div>
                                                    <div class="cart-item-price">$15</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-8 col-md-12">
                                <div class="pdpt-bg">
                                    <div class="pdpt-title">
                                        <h4>Detalle producto</h4>
                                    </div>
                                    <div class="pdpt-body scrollstyle_4">
                                        <div class="pdct-dts-1">
                                            <div class="pdct-dt-step">
                                                <h4>Descripción</h4>
                                                <p>{{$productDetails->description}}</p>
                                            </div>
                                            <div class="pdct-dt-step">
                                                <h4>Seller</h4>
                                                <div class="product_attr">
                                                    Gambolthemes Pvt Ltd, Sks Nagar, Near Mbd Mall, Ludhana, 141001
                                                </div>
                                            </div>
                                            <div class="pdct-dt-step">
                                                <h4>Disclaimer</h4>
                                                <p>Phasellus efficitur eu ligula consequat ornare. Nam et nisl eget
                                                    magna aliquam consectetur. Aliquam quis tristique lacus. Donec eget
                                                    nibh et quam maximus rutrum eget ut ipsum. Nam fringilla metus id
                                                    dui sollicitudin, sit amet maximus sapien malesuada.</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Featured Products Start -->
    <div class="section145">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="main-title-tt">
                        <div class="main-title-left">
                            <span>Para ti</span>
                            <h2>Nuestros productos</h2>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <?php $count = 1 ?>
                    @foreach ($relatedProducts->chunk(5) as $chunk)
                        @php($class = "item")
                        @if($count==1)
                            @php($class = "item active")
                        @endif
                        <div class="owl-carousel featured-slider owl-theme">
                            @foreach ($chunk as $item )
                                <div class="{{$class}}">
                                    <div class="product-item">
                                        <a href="#" class="product-img">
                                            <img src="{{asset('images/backend_images/product/small/'.$item->image)}}"
                                                 alt="">
                                        </a>
                                        <div class="product-text-dt">
                                            <h4>{{ $item->product_name }}</h4>
                                            <div class="product-price">${{ $item->price }}</div>
                                            <div style="width:100%; height: 100%">
                                                <ul class="ordr-crt-share">
                                                   <a href="{{url('product/'.$item->id)}}">
                                                       <button type="submit"
                                                               class="add-cart-btn hover-btn"
                                                               id="cartButton" name="cartButton"
                                                               value="Shopping Cart"><i
                                                               class="uil uil-shopping-cart-alt"></i>Agregar
                                                           al carrito
                                                       </button>
                                                   </a>
                                                </ul>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                            @endforeach
                        </div>
                </div>
            </div>
        </div>
    </div>
    <br>
</section>
@endsection


