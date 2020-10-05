<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redirect;
use Auth;
use Session;
use Image;
use App\Category;
use App\Product;
use App\ProductsAttribute;
use App\ProductsImage;
use App\Coupon;
use App\User;
use App\Country;
use App\DeliveryAddress;
use App\Order;
use App\OrdersProduct;
use DB;
use App\Exports\productsExport;
use Maatwebsite\Excel\Facades\Excel;
use Dompdf\Dompdf;
use Carbon\Carbon;

class ProductsController extends Controller
{
	public function addProduct(Request $request){

		if($request->isMethod('post')){
			$data = $request->all();
			//echo "<pre>"; print_r($data); die;

			$product = new Product;
			$product->category_id = $data['category_id'];
			$product->product_name = $data['product_name'];
			$product->product_code = $data['product_code'];
			$product->product_color = $data['product_color'];
            if(!empty($data['weight'])){
                $product->weight = $data['weight'];
            }else{
                $product->weight = 0;
            }

                $product->description = $data['description'];
                if (str_replace(" ", "", $product->description)=="")
    		    return redirect()->back()->with('flash_message_error', 'Por favor escriba la desripción');

            if(!empty($data['sleeve'])){
                $product->sleeve = $data['sleeve'];
            }else{
                $product->sleeve = '';
            }
            if(!empty($data['pattern'])){
                $product->pattern = $data['pattern'];
            }else{
                $product->pattern = '';
            }
            if(!empty($data['care'])){
                $product->care = $data['care'];
            }else{
                $product->care = '';
            }
            if(empty($data['status'])){
                $status='0';
            }else{
                $status='1';
            }
            if(empty($data['feature_item'])){
                $feature_item='0';
            }else{
                $feature_item='1';
            }
			$product->price = $data['price'];

			// Cargar imagen
            if($request->hasFile('image')){
            	$image_tmp = $request->file('image');
                if ($image_tmp->isValid()) {
                    // Upload Images after Resize
                    $extension = $image_tmp->getClientOriginalExtension();
	                $fileName = rand(111,99999).'.'.$extension;
                    $large_image_path = 'images/backend_images/product/large'.'/'.$fileName;
                    $medium_image_path = 'images/backend_images/product/medium'.'/'.$fileName;
                    $small_image_path = 'images/backend_images/product/small'.'/'.$fileName;

	                Image::make($image_tmp)->save($large_image_path);
 					Image::make($image_tmp)->resize(600, 600)->save($medium_image_path);
     				Image::make($image_tmp)->resize(300, 300)->save($small_image_path);

     				$product->image = $fileName;

                }
            }

            //  Cargar Video
            if($request->hasFile('video')){
                $video_tmp = Input::file('video');
                $video_name = $video_tmp->getClientOriginalName();
                $video_path = 'videos/';
                $video_tmp->move($video_path,$video_name);
                $product->video = $video_name;
            }
            if (empty($data['status'])){
                $status = 0;
            }else{
                $status = 1;
            }

            $product->status = $status;
            $product->feature_item = $feature_item;
			$product->save();
			return redirect()->back()->with('flash_message_success', 'El producto ha sido agregado correctamente');
		}

		$categories = Category::where(['parent_id' => 0])->get();

		$categories_drop_down = "<option value='' selected disabled>Select</option>";
		foreach($categories as $cat){
			$categories_drop_down .= "<option value='".$cat->id."'>".$cat->name."</option>";
			$sub_categories = Category::where(['parent_id' => $cat->id])->get();
			foreach($sub_categories as $sub_cat){
				$categories_drop_down .= "<option value='".$sub_cat->id."'>&nbsp;&nbsp;--&nbsp;".$sub_cat->name."</option>";
			}
		}

		//echo "<pre>"; print_r($categories_drop_down); die;

        $sleeveArray = array('Full Sleeve','Half Sleeve','Short Sleeve','Sleeveless');

        $patternArray = array('Checked','Plain','Printed','Self','Solid');

		return view('admin.products.add_product')->with(compact('categories_drop_down','sleeveArray','patternArray'));
	}

	public function editProduct(Request $request,$id=null){

		if($request->isMethod('post')){
			$data = $request->all();
            if(empty($data['status'])){
                $status='0';
            }else{
                $status='1';
            }

            if(empty($data['feature_item'])){
                $feature_item='0';
            }else{
                $feature_item='1';
            }

            if(!empty($data['sleeve'])){
                $sleeve = $data['sleeve'];
            }else{
                $sleeve = '';
            }

            if(!empty($data['pattern'])){
                $pattern = $data['pattern'];
            }else{
                $pattern = '';
            }

			// Cargar Imagen
            if($request->hasFile('image')){
            	$image_tmp = $request->file('image');
                if ($image_tmp->isValid()) {
                    // Cargar imágenes después de cambiar el tamaño
                    $extension = $image_tmp->getClientOriginalExtension();
	                $fileName = rand(111,99999).'.'.$extension;
                    $large_image_path = 'images/backend_images/product/large'.'/'.$fileName;
                    $medium_image_path = 'images/backend_images/product/medium'.'/'.$fileName;
                    $small_image_path = 'images/backend_images/product/small'.'/'.$fileName;

	                Image::make($image_tmp)->save($large_image_path);
 					Image::make($image_tmp)->resize(600, 600)->save($medium_image_path);
     				Image::make($image_tmp)->resize(300, 300)->save($small_image_path);

                }
            }else if(!empty($data['current_image'])){
            	$fileName = $data['current_image'];
            }else{
            	$fileName = '';
            }

            //  Video
            if($request->hasFile('video')){
                $video_tmp = Input::file('video');
                $video_name = $video_tmp->getClientOriginalName();
                $video_path = 'videos/';
                $video_tmp->move($video_path,$video_name);
                $videoName = $video_name;
            }else if(!empty($data['current_video'])){
                $videoName = $data['current_video'];
            }else{
                $videoName = '';
            }

            if(empty($data['description'])){
            	$data['description'] = '';
            }

            if(empty($data['care'])){
                $data['care'] = '';
            }


			Product::where(['id'=>$id])->update(['feature_item'=>$feature_item,'status'=>$status,'category_id'=>$data['category_id'],'product_name'=>$data['product_name'],
				'product_code'=>$data['product_code'],'product_color'=>$data['product_color'],'description'=>$data['description'],'care'=>$data['care'],'price'=>$data['price'],'weight'=>$data['weight'],'image'=>$fileName,'video'=>$videoName,'sleeve'=>$sleeve,'pattern'=>$pattern]);

			return redirect()->back()->with('flash_message_success', 'El producto ha sido editado correctamente');
		}

		// Obtener detalles del producto comenzar //
		$productDetails = Product::where(['id'=>$id])->first();
		// Obtener detalles del producto Fin//

		// Inicio del menú desplegable de categorías //
		$categories = Category::where(['parent_id' => 0])->get();

		$categories_drop_down = "<option value='' disabled>Select</option>";
		foreach($categories as $cat){
			if($cat->id==$productDetails->category_id){
				$selected = "selected";
			}else{
				$selected = "";
			}
			$categories_drop_down .= "<option value='".$cat->id."' ".$selected.">".$cat->name."</option>";
			$sub_categories = Category::where(['parent_id' => $cat->id])->get();
			foreach($sub_categories as $sub_cat){
				if($sub_cat->id==$productDetails->category_id){
					$selected = "selected";
				}else{
					$selected = "";
				}
				$categories_drop_down .= "<option value='".$sub_cat->id."' ".$selected.">&nbsp;&nbsp;--&nbsp;".$sub_cat->name."</option>";
			}
		}
		// Lista desplegable de categorías //

        $sleeveArray = array('Full Sleeve','Half Sleeve','Short Sleeve','Sleeveless');

        $patternArray = array('Checked','Plain','Printed','Self','Solid');

		return view('admin.products.edit_product')->with(compact('productDetails','categories_drop_down','sleeveArray','patternArray'));
	}

	public function deleteProductImage($id){
		// Obtener imagen de producto
		$productImage = Product::where(['id'=>$id])->first();

		// Obtener rutas de imagen de producto
		$large_image_path = 'images/backend_images/product/large/';
		$medium_image_path = 'images/backend_images/product/medium/';
        $small_image_path = 'images/backend_images/product/small/';

		// Eliminar imagen grande si no existe en la carpeta
        if(file_exists($large_image_path.$productImage->image)){
            unlink($large_image_path.$productImage->image);
        }

        // Eliminar imagen mediana si no existe en la carpeta
        if(file_exists($medium_image_path.$productImage->image)){
            unlink($medium_image_path.$productImage->image);
        }

        // Eliminar imagen pequeña si no existe en la carpeta
        if(file_exists($small_image_path.$productImage->image)){
            unlink($small_image_path.$productImage->image);
        }

        // Eliminar imagen de la tabla Productos
        Product::where(['id'=>$id])->update(['image'=>'']);

        return redirect()->back()->with('flash_message_success', 'La imagen del producto ha sido agregada correctamente');
	}

   /* public function deleteProductVideo($id){
        // Get Video Name
        $productVideo = Product::select('video')->where('id',$id)->first();

        // Get Video Path
        $video_path = 'videos/';

        // Delete Video if exists in videos folder
        if(file_exists($video_path.$productVideo->video)){
            unlink($video_path.$productVideo->video);
        }

        // Delete Video from Products table
        Product::where('id',$id)->update(['video'=>'']);

        return redirect()->back()->with('flash_message_success','Product Video has been deleted successfully');
    }
*/
    public function deleteProductAltImage($id=null){


        // Obtener imagen de producto
        $productImage = ProductsImage::where('id',$id)->first();

        // Obtener rutas de imagen de producto
        $large_image_path = 'images/backend_images/product/large/';
        $medium_image_path = 'images/backend_images/product/medium/';
        $small_image_path = 'images/backend_images/product/small/';

        //Eliminar imagen grande si no existe en la carpeta
        if(file_exists($large_image_path.$productImage->image)){
            unlink($large_image_path.$productImage->image);
        }

        // Eliminar imagen mediana si no existe en la carpeta
        if(file_exists($medium_image_path.$productImage->image)){
            unlink($medium_image_path.$productImage->image);
        }

        // Delete Small Image if not exists in Folder
        if(file_exists($small_image_path.$productImage->image)){
            unlink($small_image_path.$productImage->image);
        }

        // Delete Image from Products Images table
        ProductsImage::where(['id'=>$id])->delete();

        return redirect()->back()->with('flash_message_success', 'La Imagen alterna del producto ha sido eliminada correctamente');
    }

	public function viewProducts(Request $request){

		$products = Product::get();
		foreach($products as $key => $val){
            $category_name = Category::where(['id' => $val->category_id])->first();
            if ($category_name!=null && isset($category_name->name))
                $products[$key]->category_name = $category_name->name;
            else
			    $products[$key]->category_name = "";
		}
		$products = json_decode(json_encode($products));
		//echo "<pre>"; print_r($products); die;
		return view('admin.products.view_products')->with(compact('products'));
	}

	public function deleteProduct($id = null){

        Product::where(['id'=>$id])->delete();
        return redirect()->back()->with('flash_message_success', 'El producto ha sido eliminado correctamente');
    }

    public function deleteAttribute($id = null){
        ProductsAttribute::where(['id'=>$id])->delete();
        return redirect()->back()->with('flash_message_error', 'El atributo del producto ha sido eliminado correctamente');
    }

    public function addAttributes(Request $request, $id=null){
        $productDetails = Product::with('attributes')->where(['id' => $id])->first();
        $productDetails = json_decode(json_encode($productDetails));
        /*echo "<pre>"; print_r($productDetails); die;*/

        $categoryDetails = Category::where(['id'=>$productDetails->category_id])->first();
        $category_name = $categoryDetails->name;

        if($request->isMethod('post')){
            $data = $request->all();
            //echo "<pre>"; print_r($data); die;

            foreach($data['sku'] as $key => $val){
                if(!empty($val)){
                    $attrCountSKU = ProductsAttribute::where(['sku'=>$val])->count();
                    if($attrCountSKU>0){
                        return redirect('admin/add-attributes/'.$id)->with('flash_message_error', 'El Codigo del producto ya existe. Por favor agregar otro código.');
                    }
                    $attrCountSizes = ProductsAttribute::where(['product_id'=>$id,'size'=>$data['size'][$key]])->count();
                    if($attrCountSizes>100){
                        return redirect('admin/add-attributes/'.$id)->with('flash_message_error', 'El Atributo Ya Existe.');
                    }
                    $attr = new ProductsAttribute;
                    $attr->product_id = $id;
                    $attr->sku = $val;
                    $attr->size = $data['size'][$key];
                    $attr->price = $data['price'][$key];
                    $attr->stock = $data['stock'][$key];
                    $attr->save();
                }
            }
            return redirect('admin/add-attributes/'.$id)->with('flash_message_success', 'El Atributo De El Producto Ha Sido Agregado Correctamente');

        }

        $title = "Add Attributes";

        return view('admin.products.add_attributes')->with(compact('title','productDetails','category_name'));
    }

    public function editAttributes(Request $request, $id=null){

        if($request->isMethod('post')){
            $data = $request->all();
            /* dd($data);*/
            foreach($data['idAttr'] as $key=> $attr){
                if(!empty($attr)){
                    ProductsAttribute::where(['id' => $data['idAttr'][$key]])->update(['price' => $data['price'][$key], 'stock' => $data['stock'][$key]]);
                }
            }
            return redirect('admin/add-attributes/'.$id)->with('flash_message_success', 'Los atributos del producto han sido editados correctamente');
        }
    }

    public function addImages(Request $request, $id=null){
        $productDetails = Product::where(['id' => $id])->first();

        $categoryDetails = Category::where(['id'=>$productDetails->category_id])->first();
        $category_name = $categoryDetails->name;

        if($request->isMethod('post')){
            $data = $request->all();
            if ($request->hasFile('image')) {
                $files = $request->file('image');
                foreach($files as $file){
                    // Upload Images after Resize
                    $image = new ProductsImage;
                    $extension = $file->getClientOriginalExtension();
                    $fileName = rand(111,99999).'.'.$extension;
                    $large_image_path = 'images/backend_images/product/large'.'/'.$fileName;
                    $medium_image_path = 'images/backend_images/product/medium'.'/'.$fileName;
                    $small_image_path = 'images/backend_images/product/small'.'/'.$fileName;
                    Image::make($file)->save($large_image_path);
                    Image::make($file)->resize(600, 600)->save($medium_image_path);
                    Image::make($file)->resize(300, 300)->save($small_image_path);
                    $image->image = $fileName;
                    $image->product_id = $data['product_id'];
                    $image->save();
                }
            }

            return redirect('admin/add-images/'.$id)->with('flash_message_success', 'La Imagen De El Producto Ha Sido Agregada Correctamente');

        }

        $productImages = ProductsImage::where(['product_id' => $id])->orderBy('id','DESC')->get();

        $title = "Add Images";
        return view('admin.products.add_images')->with(compact('title','productDetails','category_name','productImages'));
    }

    public function products($url){
    	// Mostrar página 404 si la categoría no existe
    	$categoryCount = Category::where(['url'=>$url,'status'=>1])->count();
    	if($categoryCount==0){
    		abort(404);
    	}

    	$categories = Category::with('categories')->where(['parent_id' => 0])->get();

    	$categoryDetails = Category::where(['url'=>$url])->first();
    	if($categoryDetails->parent_id==0){
    		$subCategories = Category::where(['parent_id'=>$categoryDetails->id])->get();
    		$subCategories = json_decode(json_encode($subCategories));
    		foreach($subCategories as $subcat){
    			$cat_ids[] = $subcat->id;
    		}
    		$productsAll = Product::whereIn('products.category_id', $cat_ids)->where('products.status','1')->orderBy('products.id','Desc');
            $breadcrumb = "<a href='/'>Home</a> / <a href='".$categoryDetails->url."'>".$categoryDetails->name."</a>";
    	}else{
    		$productsAll = Product::where(['products.category_id'=>$categoryDetails->id])->where('products.status','1')->orderBy('products.id','Desc');
            $mainCategory = Category::where('id',$categoryDetails->parent_id)->first();
            $breadcrumb = "<a href='/'>Home</a> / <a href='".$mainCategory->url."'>".$mainCategory->name."</a> / <a href='".$categoryDetails->url."'>".$categoryDetails->name."</a>";
    	}

        if(!empty($_GET['color'])){
            $colorArray = explode('-',$_GET['color']);
            $productsAll = $productsAll->whereIn('products.product_color',$colorArray);
        }

        if(!empty($_GET['sleeve'])){
            $sleeveArray = explode('-',$_GET['sleeve']);
            $productsAll = $productsAll->whereIn('products.sleeve',$sleeveArray);
        }

        if(!empty($_GET['pattern'])){
            $patternArray = explode('-',$_GET['pattern']);
            $productsAll = $productsAll->whereIn('products.pattern',$patternArray);
        }

        if(!empty($_GET['size'])){
            $sizeArray = explode('-',$_GET['size']);
            $productsAll = $productsAll->join('products_attributes','products_attributes.product_id','=','products.id')
            ->select('products.*','products_attributes.product_id','products_attributes.size')
            ->groupBy('products_attributes.product_id')
            ->whereIn('products_attributes.size',$sizeArray);
        }

        $productsAll = $productsAll->get();

        $colorArray = Product::select('product_color')->groupBy('product_color')->get();
        $colorArray = array_flatten(json_decode(json_encode($colorArray),true));

        $sleeveArray = Product::select('sleeve')->where('sleeve','!=','')->groupBy('sleeve')->get();
        $sleeveArray = array_flatten(json_decode(json_encode($sleeveArray),true));

        $patternArray = Product::select('pattern')->where('pattern','!=','')->groupBy('pattern')->get();
        $patternArray = array_flatten(json_decode(json_encode($patternArray),true));

        $sizesArray = ProductsAttribute::select('size')->groupBy('size')->get();
        $sizesArray = array_flatten(json_decode(json_encode($sizesArray),true));
        /*echo "<pre>"; print_r($sizesArray); die;*/

        $meta_title = $categoryDetails->meta_title;
        $meta_description = $categoryDetails->meta_description;
    	$meta_keywords = $categoryDetails->meta_keywords;
    	return view('products.listing')->with(compact('categories','productsAll','categoryDetails','meta_title','meta_description','meta_keywords','url','colorArray','sleeveArray','patternArray','sizesArray','breadcrumb'));
    }
    public function searchProducts(Request $request){
        if ($request->isMethod('post')){
            $data = $request->all();
            //echo "<pre>"; print_r($data);
            $categories = Category::with('categories')->where(['parent_id' => 0])->get();
            $search_product = $data['product'];
            $productsAll = Product::where('product_name', 'like', '%'. $search_product. '%')->orwhere('product_code', $search_product)->where('status', 1)->get();
            return view('products.listing')->with(compact('categories','productsAll','search_product'));

        }
    }
    public function product($id = null){

        // Mostrar página 404 si el producto está desactivado
        $productCount = Product::where(['id'=>$id,'status'=>1])->count();
        if($productCount==0){
            abort(404);
        }

        // Obtener detalles del producto
        $productDetails = Product::with('attributes')->where('id',$id)->first();

        //obtener produtos relacionados
        $relatedProducts = Product::where('id','!=',$id)->where(['category_id' => $productDetails->category_id])->get();
        //dd($relatedProducts);

        //Obtener imágenes alternativas del producto
        $productAltImages = ProductsImage::where('product_id',$id)->get();

        $categories = Category::with('categories')->where(['parent_id' => 0])->get();

        $categoryDetails = Category::where('id',$productDetails->category_id)->first();
        if (isset($categoryDetails->parent_id)){
            if($categoryDetails->parent_id==0){
                $breadcrumb = "<a href='/'>Home</a> / <a href='".$categoryDetails->url."'>".$categoryDetails->name."</a> / ".$productDetails->product_name;
            }else{
                $mainCategory = Category::where('id',$categoryDetails->parent_id)->first();
                $breadcrumb = "<a style='color:#333;' href='/'>Home</a> / <a style='color:#333;' href='/products/".$mainCategory->url."'>".$mainCategory->name."</a> / <a style='color:#333;' href='/products/".$categoryDetails->url."'>".$categoryDetails->name."</a> / ".$productDetails->product_name;
            }
        }else{
            $breadcrumb = "";
        }

         $total_stock = ProductsAttribute::where('product_id',$id)->sum('stock');

        $meta_title = $productDetails->product_name;
        $meta_description = $productDetails->description;
        $meta_keywords = $productDetails->product_name;
        return view('products.detail')->with(compact('productDetails','categories','productAltImages','total_stock','relatedProducts','meta_title','meta_description','meta_keywords','breadcrumb'));
    }

    public function getProductPrice(Request $request){
        $data = $request->all();
        $proArr = explode("-",$data['idsize']);
        $proAttr = ProductsAttribute::where(['product_id'=>$proArr[0],'size'=>$proArr[1]])->first();

        return $proAttr->price;
    }
    public function getvalueStocks(Request $request){
        $data = $request->all();

        $stock = ProductsAttribute::where('product_id')->sum('stock');

        $proArr = explode("-",$data['idstock']);
        $proAttr = ProductsAttribute::where(['product_id'=>$proArr[0],'stock'=>$proArr[1]])->first();
        $getCurrencyRates = Product::getCurrencyRates($proAttr->price);
        echo $proAttr->price."-".$getCurrencyRates['USD_Rate']."-".$getCurrencyRates['GBP_Rate']."-".$getCurrencyRates['EUR_Rate'];
        echo "#";
        return $proAttr->stock;
    }

    public function addtocart(Request $request){

        Session::forget('CouponAmount');
        Session::forget('CouponCode');

        $data = $request->all();

        if(!empty($data['wishListButton']) && $data['wishListButton']=="Wish List"){
            /*echo "Wish List is selected"; die;*/

            // Comprobar que el usuario está conectado
            if(!Auth::check()){
                return redirect()->back()->with('flash_message_error','Inicie sesión para agregar un producto a su lista de deseos');
            }

            // Comprobar tamaño está seleccionado
            if(empty($data['size'])){
                return redirect()->back()->with('flash_message_error','Seleccione el tamaño para agregar el producto en su lista de deseos');
            }

            //Obtener el tamaño del producto
            $sizeIDArr = explode('-',$data['size']);
            $product_size = $sizeIDArr[1];

            // Obtener precio del producto
            $proPrice = ProductsAttribute::where(['product_id'=>$data['product_id'],'size'=>$product_size])->first();
            $product_price = $proPrice->price;

            // Obtener correo electrónico de usuario / nombre de usuario
            $user_email = Auth::user()->email;

            // Set Quantity as 1
            $quantity = 1;

            // Obtener la fecha actual
            $created_at = Carbon::now();

            $wishListCount = DB::table('wish_list')->where(['user_email'=>$user_email,'product_id'=>$data['product_id'],'product_color'=>$data['product_color'],'size'=>$product_size])->count();

            if($wishListCount>0){
                return redirect()->back()->with('flash_message_error','El producto ya existe en la lista de deseos!');
            }else{
                // Insert Product in Wish List
                DB::table('wish_list')->insert(['product_id'=>$data['product_id'],'product_name'=>$data['product_name'],'product_code'=>$data['product_code'],'product_color'=>$data['product_color'],'price'=>$product_price,'size'=>$product_size,'quantity'=>$quantity,'user_email'=>$user_email,'created_at'=>$created_at]);
                return redirect()->back()->with('flash_message_success','El producto se ha añadido a la lista de deseos');
            }


        }else{

            // Si el producto se agregó de la lista de deseos
            if(!empty($data['cartButton']) && $data['cartButton']=="Add to Cart"){
                $data['quantity'] = 1;
            }

            $product_size = explode("-",$data['size']);
            $getProductStock = ProductsAttribute::where(['product_id'=>$data['product_id'],'size'=>$product_size[1]])->first();

            if($getProductStock->stock<$data['quantity']){
                return redirect()->back()->with('flash_message_error','La cantidad requerida no está disponible!');
            }

            if(empty(Auth::user()->email)){
                $data['user_email'] = '';
            }else{
                $data['user_email'] = Auth::user()->email;
            }

            $session_id = Session::get('session_id');

            //compruba si la variable $session_id esta definida
            if(!isset($session_id)){
                $session_id = str_random(40);
                Session::put('session_id',$session_id);
            }
            //explode pasa de string a un array
            $sizeIDArr = explode('-',$data['size']);
            $product_size = $sizeIDArr[1];

            if(empty(Auth::check())){
                $countProducts = DB::table('cart')->where(['product_id' => $data['product_id'],'product_color' => $data['product_color'],'size' => $product_size,'session_id' => $session_id])->count();
                if($countProducts>0){
                    return redirect()->back()->with('flash_message_error','El producto ya existe en el carro!');
                }
            }else{
                $countProducts = DB::table('cart')->where(['product_id' => $data['product_id'],'product_color' => $data['product_color'],'size' => $product_size,'user_email' => $data['user_email']])->count();
                if($countProducts>0){
                    return redirect()->back()->with('flash_message_error','El producto ya existe en el carro!');
                }
            }


            $getSKU = ProductsAttribute::select('sku')->where(['product_id' => $data['product_id'], 'size' => $product_size])->first();

            DB::table('cart')->insert(['product_id' => $data['product_id'],'product_name' => $data['product_name'],
                'product_code' => $getSKU['sku'],'product_color' => $data['product_color'],
                'price' => $data['price'],'size' => $product_size,'quantity' => $data['quantity'],'user_email' => $data['user_email'],'session_id' => $session_id]);

            return redirect('cart')->with('flash_message_success','El producto ha sido agregado correctamente al carrito!');

        }

    }

    public function cart(){

        if(Auth::check()){
            $user_email = Auth::user()->email;
            $userCart = DB::table('cart')->where(['user_email' => $user_email])->get();
        }else{
            $session_id = Session::get('session_id');
            $userCart = DB::table('cart')->where(['session_id' => $session_id])->get();
        }

        foreach($userCart as $key => $product){
            $productDetails = Product::where('id',$product->product_id)->first();
            $userCart[$key]->image = $productDetails->image;
        }
        /*echo "<pre>"; print_r($userCart); die;*/
        $meta_title = "Shopping Cart - Zona Agraria";
        $meta_description = "View Shopping Cart of Zona Agraria";
        $meta_keywords = "shopping cart, Zona Agraria";
        return view('products.cart')->with(compact('userCart','meta_title','meta_description','meta_keywords'));
    }

//Cantiddad del producto en el carrito
    public function updateCartQuantity($id=null,$quantity=null){
        Session::forget('CouponAmount');
        Session::forget('CouponCode');
        $getProductSKU = DB::table('cart')->select('product_code','quantity')->where('id',$id)->first();
        $getProductStock = ProductsAttribute::where('sku',$getProductSKU->product_code)->first();
        $updated_quantity = $getProductSKU->quantity+$quantity;
        if($getProductStock->stock>=$updated_quantity){
            DB::table('cart')->where('id',$id)->increment('quantity',$quantity);
            return redirect('cart')->with('flash_message_success','La cantidad del producto ha sido modificada correctamente!');
        }else{
            return redirect('cart')->with('flash_message_error','La cantidad del producto no esta disponible!');
        }
    }

    public function deleteCartProduct($id=null){
        Session::forget('CouponAmount');
        Session::forget('CouponCode');
        DB::table('cart')->where('id',$id)->delete();
        return redirect('cart')->with('flash_message_error','El Producto ha sido eliminado del carrito!');
    }
    public function applyCoupon(Request $request){
        Session::forget('CouponAmount');
        Session::forget('CouponCode');
        $data = $request->all();
        $couponCont = Coupon::where('coupon_code',$data['coupon_code'])->count();
        if ($couponCont == 0){
            return redirect()->back()->with('flash_message_error','El cupon no existe!');
        }else{
            $couponDetails = Coupon::where('coupon_code',$data['coupon_code'])->first();

            if ($couponDetails->status==0){
                return redirect()->back()->with('flash_message_error','Cupon no activo!');
            }
            $expiry_date = $couponDetails->expiry_date;
            $current_date = date('y-m-d');
            if ($expiry_date < $current_date){
                return redirect()->back()->with('flash_message_error','Su cupon ha expirado!');
            }
            $session_id = Session::get('session_id');
            $userCart = DB::table('cart')->where(['session_id' => $session_id])->get();
            $total_amount = 0;
        foreach($userCart as $item){
            $total_amount = $total_amount + ($item->price * $item->quantity);
        }
            if ($couponDetails->amount_type=='Fixed'){
                $couponAmount = $couponDetails->amount;
            }else{
                $couponAmount = $total_amount * ($couponDetails->amount/100);
            }
            Session::put('CouponAmount',$couponAmount);
            Session::put('CouponCode',$data['coupon_code']);

            return redirect()->back()->with('flash_message_success','El código de cupón se aplicó correctamente. Estás aprovechando el descuento!');
        }
    }


    public function checkout(Request $request){
        $user_id = Auth::user()->id;
        $user_email = Auth::user()->email;
        $userDetails = User::find($user_id);
        $countries = Country::get();

        //Compruebe si existe la dirección de envío
        $shippingCount = DeliveryAddress::where('user_id',$user_id)->count();
        $shippingDetails = array();
        if($shippingCount>0){
            $shippingDetails = DeliveryAddress::where('user_id',$user_id)->first();
        }

        // Actualizar la tabla del carrito con el correo electrónico del usuario
        $session_id = Session::get('session_id');
        DB::table('cart')->where(['session_id'=>$session_id])->update(['user_email'=>$user_email]);
        if($request->isMethod('post')){
            $data = $request->all();
            /*echo "<pre>"; print_r($data); die;*/
            // Regrese a la página de pago si alguno de los campos está vacío
            if(empty($data['billing_name']) || empty($data['billing_address']) || empty($data['billing_city']) || empty($data['billing_state']) || empty($data['billing_country']) || empty($data['billing_pincode']) || empty($data['billing_mobile'])){
                    return redirect()->back()->with('flash_message_error','Por favor completa todos los campos!');
            }

            //Actualizar los detalles del usuario
            User::where('id',$user_id)->update(['name'=>$data['billing_name'],'address'=>$data['billing_address'],'city'=>$data['billing_city'],'state'=>$data['billing_state'],'pincode'=>$data['billing_pincode'],'country'=>$data['billing_country'],'mobile'=>$data['billing_mobile']]);

            if($shippingCount>0){
                // Actualizar la dirección de envío
                DeliveryAddress::where('user_id',$user_id)->update(['name'=>$data['shipping_name'],'address'=>$data['shipping_address'],'city'=>$data['shipping_city'],'state'=>$data['shipping_state'],'pincode'=>$data['shipping_pincode'],'country'=>$data['shipping_country'],'mobile'=>$data['shipping_mobile']]);
            }


            return redirect()->action('ProductsController@orderReview');
        }


        return view('products.checkout')->with(compact('userDetails','countries','shippingDetails'));
    }

    public function orderReview(){
        $user_id = Auth::user()->id;
        $user_email = Auth::user()->email;
        $userDetails = User::where('id',$user_id)->first();
        $shippingDetails = DeliveryAddress::where('user_id',$user_id)->first();
        $shippingDetails = json_decode(json_encode($shippingDetails));
        $userCart = DB::table('cart')->where(['user_email' => $user_email])->get();
        $total_weight = 0;
        foreach($userCart as $key => $product){
            $productDetails = Product::where('id',$product->product_id)->first();
            $userCart[$key]->image = $productDetails->image;
            $total_weight = $total_weight + $productDetails->weight;
        }
        /*echo "<pre>"; print_r($userCart); die;*/


        // Obtener los gastos de envío


        $meta_title = "Order Review - ZonAgraria";
        return view('products.order_review')->with(compact('userDetails','shippingDetails','userCart','meta_title'));
    }

    public function placeOrder(Request $request){
        if($request->isMethod('post')){
            $data = $request->all();
            $user_id = Auth::user()->id;
            $user_email = Auth::user()->email;

            // Prevent Out of Stock Products from ordering
            $userCart = DB::table('cart')->where('user_email',$user_email)->get();
            foreach($userCart as $cart){

                $getAttributeCount = Product::getAttributeCount($cart->product_id,$cart->size);


            }

            // Obtener la dirección de envío del usuario
            $shippingDetails = DeliveryAddress::where(['user_email' => $user_email])->first();



            if(empty(Session::get('CouponCode'))){
               $coupon_code = '';
            }else{
               $coupon_code = Session::get('CouponCode');
            }

            if(empty(Session::get('CouponAmount'))){
               $coupon_amount = '';
            }else{
               $coupon_amount = Session::get('CouponAmount');
            }

            /*// Fetch Shipping Charges
            $shippingCharges = Product::getShippingCharges($shippingDetails->country);*/

            $grand_total = Product::getGrandTotal();

            $order = new Order;
            $order->user_id = $user_id;
            $order->user_email = $user_email;
            $order->coupon_amount = $coupon_amount;
            $order->order_status = "New";
            $order->payment_method = $data['payment_method'];
            $order->grand_total = $grand_total;
            $order->save();

            $order_id = DB::getPdo()->lastInsertId();

            $cartProducts = DB::table('cart')->where(['user_email'=>$user_email])->get();
            foreach($cartProducts as $pro){
                $cartPro = new OrdersProduct;
                $cartPro->order_id = $order_id;
                $cartPro->user_id = $user_id;
                $cartPro->product_id = $pro->product_id;
                $cartPro->product_code = $pro->product_code;
                $cartPro->product_name = $pro->product_name;
                $cartPro->product_color = $pro->product_color;
                $cartPro->product_size = $pro->size;
                $product_price = Product::getProductPrice($pro->product_id,$pro->size);
                $cartPro->product_price = $product_price;
                $cartPro->product_qty = $pro->quantity;
                $cartPro->save();

                // Reducir inicios de script de stock
                $getProductStock = ProductsAttribute::where('sku',$pro->product_code)->first();
                /*echo "Original Stock: ".$getProductStock->stock;
                echo "Stock to reduce: ".$pro->quantity;*/
                $newStock = $getProductStock->stock - $pro->quantity;
                if($newStock<0){
                    $newStock = 0;
                }
               ProductsAttribute::where('sku',$pro->product_code)->update(['stock'=>$newStock]);
                // Reducir los extremos del script de stock
            }

            Session::put('order_id',$order_id);
            Session::put('grand_total',$grand_total);

            if($data['payment_method']=="COD"){

                $productDetails = Order::with('orders')->where('id',$order_id)->first();
                $productDetails = json_decode(json_encode($productDetails),true);
                /*echo "<pre>"; print_r($productDetails);*/ /*die;*/

                $userDetails = User::where('id',$user_id)->first();
                $userDetails = json_decode(json_encode($userDetails),true);
                /*echo "<pre>"; print_r($userDetails); die;*/
                /* Code for Order Email Start */
                $email = $user_email;
                $messageData = [
                    'email' => $email,

                    'order_id' => $order_id,
                    'productDetails' => $productDetails,
                    'userDetails' => $userDetails
                ];
                Mail::send('emails.order',$messageData,function($message) use($email){
                    $message->to($email)->subject('Orden Realizada - ZonAgraria');
                });
                /* Code for Order Email Ends */

                // $: redirige al usuario a la página de agradecimiento después de guardar el pedido
                return redirect('/thanks');
            }else if($data['payment_method']=="Payumoney"){
                // Payumoney: redirige al usuario a la página payumoney después de guardar el pedido
                return redirect('/payumoney');
            }else{
                // Paypal -Redirigir al usuario a la página de PayPal después de guardar el pedido
                return redirect('/paypal');
            }


        }
    }

    public function thanks(Request $request){
        $user_email = Auth::user()->email;
        DB::table('cart')->where('user_email',$user_email)->delete();
        return view('orders.thanks');
    }

    public function viewOrderInvoice($order_id, $tipo =""){
        if(Session::get('adminDetails')['orders_access']==0){
            return redirect('/admin/dashboard')->with('flash_message_error','You have no access for this module');
        }
        $orderDetails = Order::with('orders')->where('id',$order_id)->first();
        $orderDetails = json_decode(json_encode($orderDetails));
        /*echo "<pre>"; print_r($orderDetails); die;*/
        $user_id = $orderDetails->user_id;
        $userDetails = User::where('id',$user_id)->first();
        /*$userDetails = json_decode(json_encode($userDetails));
        echo "<pre>"; print_r($userDetails);*/
        $view = view('admin.orders.order_invoice')->with(compact('orderDetails','userDetails','tipo'));
        if ($tipo=="pdf")
        {
            $pdf = \App::make('dompdf.wrapper');
            //$pdf = \app('dompdf.wrapper');
            $pdf->loadHTML($view);
            $pdf->setPaper('letter', 'landscape');
            return $pdf->stream('archivo.pdf');
            //return $pdf->download('mi-archivo.pdf');
        }
        return $view;
    }


    public function viewOrders(){
        if(Session::get('adminDetails')['orders_access']==0){
            return redirect('/admin/dashboard')->with('flash_message_error','You have no access for this module');
        }
        $orders = Order::with('orders')->orderBy('id','Desc')->get();
        $orders = json_decode(json_encode($orders));
        /*echo "<pre>"; print_r($orders); die;*/
        return view('admin.orders.view_orders')->with(compact('orders'));
    }

    public function viewOrderDetails($order_id){
        if(Session::get('adminDetails')['orders_access']==0){
            return redirect('/admin/dashboard')->with('flash_message_error','You have no access for this module');
        }
        $orderDetails = Order::with('orders')->where('id',$order_id)->first();
        $orderDetails = json_decode(json_encode($orderDetails));
        /*echo "<pre>"; print_r($orderDetails); die;*/
        $user_id = $orderDetails->user_id;
        $userDetails = User::where('id',$user_id)->first();
        /*$userDetails = json_decode(json_encode($userDetails));
        echo "<pre>"; print_r($userDetails);*/
        return view('admin.orders.order_details')->with(compact('orderDetails','userDetails'));
    }


    public function updateOrderStatus(Request $request){

        if($request->isMethod('post')){
            $data = $request->all();
            Order::where('id',$data['order_id'])->update(['order_status'=>$data['order_status']]);
            return redirect()->back()->with('flash_message_success','El Estado De La Orden Ha Sido Actualizado Correctamente!');
        }
    }



}
