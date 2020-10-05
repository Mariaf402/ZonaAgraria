
  @if($message = Session::get('Registrado'))
          <div class="col-12 alert alert-success alert-dismissable fade show" role="alert">
            <span>{{$message}}</span>

           <button type="button" class="close" data-dismiss="alert" aria-label="Close">
             <span aria-hidden="true">&times;</span>
           </button>
          </div>
  @endif

<form  action="/seller/product" method="post" enctype="multipart/form-data">
 
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
              
                <select class="form-control" name="categorie_id" value="{{ old('categorie_id')}}" required>
                          <option>Seleccione categoria</option>
                          @foreach($cates as $cate)
                          <option value="{{$cate->id}}">{{$cate->Name}}</option>
                          @endforeach
                </select>
                
                <div class="form-group">
                        <label>product_name</label>
                        <input class="form-control" type="text" placeholder="product_name" name="product_name">
                </div>

                <div class="form-group">
                        <label>product_code</label>
                        <input class="form-control" type="text" placeholder="product_code" name="product_code">
                </div>

                
                <div class="form-group">
                        <label>product_stock</label>
                        <input class="form-control" type="text" placeholder="product_stock" name="product_stock">
                </div>

                <div class="form-group">
                    <label>description</label>
                    <textarea class="form-control" placeholder="description" name="description"></textarea>
                </div>

                <div class="form-group">
                        <label>price</label>
                        <input class="form-control" type="text" placeholder="price" name="price">
                </div>


                <div class="form-group">
                    <label>image</label>
                    <input type="file" class="form-control-file" name="image">
                </div>
            </div>

                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save changes</button>
         
      </form>