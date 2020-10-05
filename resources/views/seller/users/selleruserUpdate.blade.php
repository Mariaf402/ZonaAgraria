<div class="modal fade" id="modalEditar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog  modal-lg">
    <div class="modal-content">

      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Editar Datos Del Cliente</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

    <form action="/seller/users/edit" method="post">
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
          @method('PUT')

              <input type="hidden" name="id" id="idEdit">

            <div class="row">
                  <div class="col">
                      <input type="text" class="form-control" name="name" placeholder="Nombre" value="{{ old('name') }}" id="nameEdit" required>
                  </div>
                  
                  <div class="col">
                    <input type="email" class="form-control" name="email" placeholder="Email" value="{{ old('email') }}" id="emailEdit" required>
                  </div>
            </div>
              <br>
            <div class="row">
              <div class="col">
                <input type="text" class="form-control" name="cellphone" placeholder="Telefono movil" value="{{ old('cellphone') }}" id="cellphoneEdit" required>
              </div>

              <div class="col">
                <input type="text" class="form-control" name="address" placeholder="Dirección" value="{{ old('address') }}" id="addressEdit" required>
              </div>
            </div>
            <br>
            <div class="row">
                <div class="col">
                    <input type="password" class="form-control" name="password1" placeholder="Contraseña" value="{{ old('password1') }}" id="passwordEdit" required>
                </div>

                <div class="col">
                      <select class="form-control" name="rol_id" value="{{ old('rol_id')}}" id="rols" required>
                            @foreach($rols as $rol)
                            <option value="{{$rol->id}}">{{$rol->name_rol}}</option>
                            @endforeach
                      </select>
                </div>
            </div>
              <br>
          <div class="row">
            <div class="col">
              <select class="form-control" name="Department"  value="{{ old('Department')}}" id="departments" required>
                  <option></option>
                    @foreach($departments as $department)
                    <option>{{$department->department_name}}</option>
                    @endforeach
                </select>
            </div>

            <div class="col">
              <select class="form-control" name="city" value="{{ old('city')}}" id="cityEdit" required>
                    @foreach($citys as $city)
                    <option>{{$city->city_name}}</option>
                    @endforeach
              </select>
            </div>
          </div>
          <br>
      </div>
        <div class="modal-footer">
          <div class="row">
              <div class="col">
                <button type="button" class="btn btn-secondary btn-lg btn-block" data-dismiss="modal">Cancelar</button>
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