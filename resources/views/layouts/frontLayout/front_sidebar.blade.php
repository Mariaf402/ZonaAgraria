<?php use App\Http\Controllers\Controller;
use App\Product;

$mainCategories =  Controller::mainCategories();
$cartCount = Product::cartCount(); ?>
<form action="{{ url('/products-filter') }}" method="post">{{ csrf_field() }}
	@if(!empty($url))
	<input name="url" value="{{ $url }}" type="hidden">
	@endif
	<div class="left-sidebar">
		<h2>Acciones</h2>
		<div class="panel-group category-products" id="accordian">

				<div class="panel panel-default">
					<div class="panel-heading">
						<h4 class="panel-title">
							<a data-toggle="collapse" data-parent="#accordian" href="">
								<span class="badge pull-right"><i class="f"></i></span>
								<li><a href="{{ url('/cart') }}"><i class="fa fa-shopping-cart"></i> Carrito ({{ $cartCount }})</a></li>
								@if(empty(Auth::check()))
									<li><a href="{{ url('/login-register') }}"><i class="fa fa-lock"></i> Ingresar</a></li>
								@else
									<li><a href="{{ url('/account') }}"><i class="fa fa-user"></i> Cuenta</a></li>
									<li><a href="{{ url('/user-logout') }}"><i class="fa fa-sign-out"></i> Salir</a></li>
								@endif
							</a>
						</h4>
					</div>
					<div id="" class="panel-collapse collapse">
						<div class="panel-body">
							<ul>

							</ul>
						</div>
					</div>
				</div>

		</div>

		@if(!empty($url))

			<h2>Colors</h2>
			<div class="panel-group">
				@foreach($colorArray as $color)
					@if(!empty($_GET['color']))
						<?php $colorArr = explode('-',$_GET['color']) ?>
						@if(in_array($color,$colorArr))
							<?php $colorcheck="checked"; ?>
						@else
							<?php $colorcheck=""; ?>
						@endif
					@else
						<?php $colorcheck=""; ?>
					@endif
					<div class="panel panel-default">
						<div class="panel-heading">
							<h4 class="panel-title">
								<input name="colorFilter[]" onchange="javascript:this.form.submit();" id="{{ $color }}" value="{{ $color }}" type="checkbox" {{ $colorcheck }}>&nbsp;&nbsp;<span class="products-colors">{{ $color }}</span>
							</h4>
						</div>
					</div>
				@endforeach
			</div>

			<div>&nbsp;</div>

			<h2>Sleeve</h2>
			<div class="panel-group">
				@foreach($sleeveArray as $sleeve)
					@if(!empty($_GET['sleeve']))
						<?php $sleeveArr = explode('-',$_GET['sleeve']) ?>
						@if(in_array($sleeve,$sleeveArr))
							<?php $sleevecheck="checked"; ?>
						@else
							<?php $sleevecheck=""; ?>
						@endif
					@else
						<?php $sleevecheck=""; ?>
					@endif
					<div class="panel panel-default">
						<div class="panel-heading">
							<h4 class="panel-title">
								<input name="sleeveFilter[]" onchange="javascript:this.form.submit();" id="{{ $sleeve }}" value="{{ $sleeve }}" type="checkbox" {{ $sleevecheck }}>&nbsp;&nbsp;<span class="products-sleeves">{{ $sleeve }}</span>
							</h4>
						</div>
					</div>
				@endforeach
			</div>

			<div>&nbsp;</div>

			<h2>Pattern</h2>
			<div class="panel-group">
				@foreach($patternArray as $pattern)
					@if(!empty($_GET['pattern']))
						<?php $patternArr = explode('-',$_GET['pattern']) ?>
						@if(in_array($pattern,$patternArr))
							<?php $patterncheck="checked"; ?>
						@else
							<?php $patterncheck=""; ?>
						@endif
					@else
						<?php $patterncheck=""; ?>
					@endif
					<div class="panel panel-default">
						<div class="panel-heading">
							<h4 class="panel-title">
								<input name="patternFilter[]" onchange="javascript:this.form.submit();" id="{{ $pattern }}" value="{{ $pattern }}" type="checkbox" {{ $patterncheck }}>&nbsp;&nbsp;<span class="products-patterns">{{ $pattern }}</span>
							</h4>
						</div>
					</div>
				@endforeach
			</div>

			<div>&nbsp;</div>

			<h2>Size</h2>
			<div class="panel-group">
				@foreach($sizesArray as $size)
					@if(!empty($_GET['size']))
						<?php $sizeArr = explode('-',$_GET['size']) ?>
						@if(in_array($size,$sizeArr))
							<?php $sizecheck="checked"; ?>
						@else
							<?php $sizecheck=""; ?>
						@endif
					@else
						<?php $sizecheck=""; ?>
					@endif
					<div class="panel panel-default">
						<div class="panel-heading">
							<h4 class="panel-title">
								<input name="sizeFilter[]" onchange="javascript:this.form.submit();" id="{{ $size }}" value="{{ $size }}" type="checkbox" {{ $sizecheck }}>&nbsp;&nbsp;<span class="products-sizes">{{ $size }}</span>
							</h4>
						</div>
					</div>
				@endforeach
			</div>

			<div>&nbsp;</div>

		@endif

	</div>
</form>
