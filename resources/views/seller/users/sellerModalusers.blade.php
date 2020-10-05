<button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#modalAgregar">
      Agregar Clientes
</button>


<div class="modal fade" id="modalAgregar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">

        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Agregar Clientes</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>

        <form action="/seller/dash/users/" method="post">
         <div class="modal-body">
            @csrf

              <div class="row">
                <div class="col">
                    <input type="text" class="form-control" name="name" placeholder="Nombre" value="{{ old('name') }}" required>
                </div>
               
                <div class="col">
                    <input type="text" class="form-control" name="email" placeholder="Email" value="{{ old('email') }}" required>
                </div>
              </div>
              <br>
              <div class="row">
                <div class="col">
                    <input type="text" class="form-control" name="address" placeholder="Direccion" value="{{ old('address') }}" required>
                </div>
               
                <div class="col">
                   <input type="text" class="form-control" name="city" placeholder="Ciudad" value="{{ old('city') }}" required>
                </div>
              </div>
              <br>
              <div class="row">
                <div class="col">
                    <input type="text" class="form-control" name="country" placeholder="Pais" value="{{ old('country') }}" required>
                </div>
               
                <div class="col">
                   <input type="text" class="form-control" name="state" placeholder="Estado" value="{{ old('state') }}" required>
                </div>
              </div>
              <br>
              <div class="row">
                   <div class="col">
                       <input type="text" class="form-control" name="pincode" placeholder="Codigo" value="{{ old('pincode') }}" required>
                   </div>

                   <div class="col">
                        <input type="text" class="form-control" name="mobile" placeholder="Telefono" value="{{ old('mobile') }}" required>
                   </div>
              </div>
              <br>
              <div class="row">
                   <div class="col">
                       <input type="password" class="form-control" name="password" placeholder="Contraseña" value="{{ old('password') }}" required>
                   </div>

                   <div class="col">
                        <input type="text" class="form-control" name="status" placeholder="Estado" value="{{ old('status') }}" required>
                   </div>
              </div>
          <div class="modal-footer">
                <div class="form-row">
                      <div class="col">
                        <button type="button" class="btn btn-secondary btn-lg  btn-block" data-dismiss="modal">Cancelar</button>
                      </div>

                      <div class="col">
                        <button type="submit" class="btn btn-primary btn-lg btn-block">Guardar</button>
                      </div>
                 </div>
           </div>
       </form>

    </div>
  </div>
</div>


 
