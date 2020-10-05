
@extends('layouts.principal')
@section('title')
    Inicio
@endsection
@section('content')

<section id="slider"><!--form-->

        <div class="breadcrumbs">
            <ol class="breadcrumb">

            </ol>
        </div>
		@if(Session::has('flash_message_error'))
            <div class="alert alert-error alert-block" style="background-color:#f4d2d2">
                <button type="button" class="close" data-dismiss="alert">×</button>
                    <strong>{!! session('flash_message_error') !!}</strong>
            </div>
		@endif
		<form action="{{ url('/checkout') }}" method="post" style="margin-top: 20vh">{{ csrf_field() }}
            <div class="container"  >
                @if(Session::has('flash_message_error'))
                    <div class="alert alert-error alert-block" style="background-color:#f4d2d2">
                        <button type="button" class="close" data-dismiss="alert">×</button>
                        <strong>{!! session('flash_message_error') !!}</strong>
                    </div>
                @endif
                <div class="row justify-content-center">
                    <div class="col-lg-10">
			<div class="row">
				<div class="col-sm-5 col-sm-offset-28" >
					<div class="login-form" ><!--login form-->
						<h2>Datos de envio</h2>
							<div class="form-group">
								<input name="billing_name" id="billing_name" @if(!empty($userDetails->name)) value="{{ $userDetails->name }}" @endif type="text" placeholder="Billing Name" class="form-control" />
							</div>
							<div class="form-group">
								<input name="billing_address" id="billing_address" @if(!empty($userDetails->address)) value="{{ $userDetails->address }}" @endif type="text" placeholder="Dirección de envio" class="form-control" />
							</div>
							<div class="form-group">
								<input name="billing_city" id="billing_city" @if(!empty($userDetails->city)) value="{{ $userDetails->city }}" @endif type="text" placeholder="Ciudad" class="form-control" />
							</div>
							<div class="form-group">
								<input name="billing_state" id="billing_state" @if(!empty($userDetails->state)) value="{{ $userDetails->state }}" @endif type="text" placeholder="Estado de cuenta" class="form-control" />
							</div>
							<div class="form-group">
								<select id="billing_country" name="billing_country" class="form-control">
									<option value="">Seleccionar Pais</option>
									@foreach($countries as $country)
										<option value="{{ $country->country_name }}" @if(!empty($userDetails->country) && $country->country_name == $userDetails->country) selected @endif>{{ $country->country_name }}</option>
									@endforeach
								</select>
							</div>
							<div class="form-group">
								<input name="billing_pincode" id="billing_pincode" @if(!empty($userDetails->name)) value="{{ $userDetails->pincode }}" @endif type="text" placeholder="Codigo de facturacion" class="form-control" />
							</div>
							<div class="form-group">
								<input name="billing_mobile" id="billing_mobile" @if(!empty($userDetails->mobile)) value="{{ $userDetails->mobile }}" @endif type="text" placeholder="Facturación móvil" class="form-control"  />
							</div>
                        <div>
                            <button style="position: absolute;left: 54%;" type="submit" class="btn btn-primary btn-mini"><font face="Cera Pro Bold">Confirmar cotización</font></button><br>

                        </div>
                    </div>
                </div>
            </div>
                            </div>
                        </div>
                    </div>
                </form>
        </section>

@endsection
