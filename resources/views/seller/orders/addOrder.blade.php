<div class="modal fade" id="modalEditar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog  modal-lg">
    <div class="modal-content">

      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Agregar Venta</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

    <form action="/seller/dash/order" method="post">
      <div class="modal-body">

          @if($message = Session::get('ErrorsInsert'))
            <div class="col-12 alert alert-danger alert-dismissable fade show" role="alert">
              <h5>Errores:</h5>
                <ul>
                    @foreach($errors->all() as $error)
                    <li>{{$error}}</li>
                    @endforeach
                </ul>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
            </div>
          @endif

          @csrf

              <input type="hidden" name="user_id" id="idEdit">

            <div class="row">
                  <div class="col">
                      <input type="text" class="form-control" name="name" placeholder="Nombre" value="{{ old('name') }}" id="nameEdit" required>
                  </div>
                  
                  <div class="col">
                    <input type="email" class="form-control" name="user_email" placeholder="Email" value="{{ old('user_email') }}" id="emailEdit" required>
                  </div>
            </div>
              <br>
            <div class="row">
                <div class="col">
                    <input type="text" class="form-control" name="mobile" placeholder="Telefono movil" value="{{ old('mobile') }}" id="mobileEdit" required>
                </div>

                <div class="col">
                    <input type="text" class="form-control" name="address" placeholder="Dirección" value="{{ old('address') }}" id="addressEdit" required>
                </div>
            </div>
            <br> 
          <div class="row">
                <div class="col">
                    <input type="text" class="form-control" name="country"  value="{{ old('country')}}" id="countryEdit" required>
                </div>

                <div class="col">
                    <input type="text" class="form-control" name="city" value="{{ old('city')}}" id="cityEdit" required>
                </div>
          </div>
          <br>
          <div class="row">
                <div class="col">
                    <input type="text" class="form-control" name="state"  value="{{ old('state')}}" id="stateEdit" required>
                </div>

                <div class="col">
                    <input type="text" class="form-control" name="pincode" value="{{ old('pincode')}}" id="pincodeEdit" required>
                </div>
          </div>
          <br>
          <div class="row">
                <div class="col">
                    <input type="text" class="form-control" placeholder="Gastos de envío" name="shipping_charges"  value="{{ old('shipping_charges')}}"required>
                </div>

                <div class="col">
                    <input type="text" class="form-control" placeholder="Método de pago" name="payment_method" value="{{ old('payment_method')}}"  required>
                </div>
          </div>
          <br>
          <div class="row">
                <div class="col">
                    <input type="text" class="form-control" placeholder="Codigo cupon" name="coupon_code" value="{{ old('coupon_code')}}"  required>
                </div>

              <div class="col">
                  <input type="text" class="form-control" placeholder="Monto del cupón" name="coupon_amount" value="{{ old('coupon_amount ')}}"  required>
              </div>
          </div>
          <br>
         <div class="row">
               <div class="col">
                  <input type="text" class="form-control" placeholder="Estado del pedido" name="order_status" value="{{ old('order_status')}}"  required>
              </div>
            
            <div class="col">
                 <input type="text" class="form-control" placeholder="Cantidad total" name="grand_total" value="{{ old('grand_total')}}"  required>
            </div>
         </div>
      </div>
        <div class="modal-footer">
          <div class="row">
              <div class="col">
                 <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
              </div>

              <div class="col">
                  <button type="submit" class="btn btn-primary">Guardar</button>
              </div>
          </div>
        </div>
    </form>

    </div>
  </div>
</div>

 
       
        
