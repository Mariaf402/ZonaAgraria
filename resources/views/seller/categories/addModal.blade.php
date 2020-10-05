<!-- Button trigger modal -->
<button type="button" class="btn btn-primary  float-right" data-toggle="modal" data-target="#exampleModal">
  Launch demo modal
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Agregar categoria</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form  action="/seller/category" method="post" enctype="multipart/form-data">
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
                <div class="form-group">
                        <label>Name</label>
                        <input class="form-control" type="text" placeholder="Name" name="Name">
                </div>

                <div class="form-group">
                    <label>Description</label>
                    <textarea class="form-control" placeholder="Description" name="Description"></textarea>
                </div>

                <div class="form-group">
                    <label>images</label>
                    <input type="file" class="form-control-file" name="images">
                </div>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save changes</button>
            </div>
      </form>
    </div>
  </div>
</div>