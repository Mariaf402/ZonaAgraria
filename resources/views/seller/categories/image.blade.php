    <div class="card" style="width=25%; height=25%;">
      
      <div class="card-body">
        <img src="{{url('/imagenes/Category/'.$categoria->images)}}" class="card-img-top" alt="...">
        <a href="{{url('/seller/producCategory/'.$categoria->id.'/edit')}}" class="btn btn-primary btn-lg btn-block">{{$categoria->Name}}</a>
      </div>
    </div>



    