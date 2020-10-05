@if($message = Session::get('Actualizado'))
    <div class="col-12 alert alert-success alert-dismissable fade show" role="alert">
        <span>{{$message}}</span>

        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif
<table class="table">
    <tbody>
    <tr>
        <th scope="row">Nombre:</th>
        <td>{{ $vendedor->name }}</td>
    </tr>
    <tr>
        <th scope="row">Email:</th>
        <td>{{ $vendedor->email }}</td>
    </tr>
    <tr>
        <th scope="row">Teléfono movil:</th>
        <td>{{ $vendedor->cellphone }}</td>
    </tr>
    <tr>
        <th scope="row">Dirección:</th>
        <td>{{ $vendedor->address }}</td>
    </tr>
    <tr>
        <th scope="row">Departamento:</th>
        <td>{{ $vendedor->Department }}</td>
    </tr>
    <tr>
        <th scope="row">ciudad:</th>
        <td>{{ $vendedor->city }}</td>
    </tr>
    <tr>
        <td colspan="2">
        <a href="{{url('/seller/dash/'.$vendedor->rol_id.'/edit')}}" class="btn btn-primary btn-lg btn-block" role="button" aria-pressed="true">
        Actualizar Datos</a>
        </td>
    </tr>
    </tbody>
</table>