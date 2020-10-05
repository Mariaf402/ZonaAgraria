<br>
<div class="table-responsive">
    <table class="table">
        <tbody>
            @foreach($categorias as  $categoria)
                <tr>
                <th scope="row">{{$categoria->Name}}</th>
                <td>{{$categoria->Description}}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

            
