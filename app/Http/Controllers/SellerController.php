<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Session;
use App\User;
use App\Seller;
use App\Product;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;

class SellerController extends Controller
{

    public function login(Request $request){
    	if($request->isMethod('post')){
    		$data = $request->input();
            $sellerCount = Seller::where(['email' => $data['email'],'password'=>$data['password'],'status'=>1])->count();
            if($sellerCount > 0){
                //echo "Success"; die;
                Session::put('sellerSession', $data['email']);
                return redirect('/seller/dash');
        	}else{
               //echo "failed"; die;
                return redirect('/seller')->with('flash_message_error','Usuario o Contraseña Invalidos');
        	}
    	}
    	return view('seller.login');
    }

    public function dashboard(){
        /*if(Session::has('adminSession')){
            // Perform all actions
        }else{
            //return redirect()->action('AdminController@login')->with('flash_message_error', 'Please Login');
            return redirect('/admin')->with('flash_message_error','Please Login');
        }*/
      
        return view('seller.sellerdash');
    }

    public function create(){
        return view('seller.register');
    }

    public function store(Request $request){

        $v = Validator::make($request->all(),[
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'mobile' => ['required'],
            'password' => ['required', 'string', 'min:8'],
        ]); 

        if ($v->fails()){
           return back()->withInput()->with('ErrorsInsert','Llene todos los campos')->withErrors($v);
        }else{
            $Usuario = Seller::create([
                'status'=>$request->status,
                'name'=>$request->name,
                'email'=>$request->email,
                'mobile'=>$request->mobile,
                'password'=>$request->password,
  
            ]);
            return redirect('/seller/dash');
        }  
    }   

    public function products()
    {
        $productos = Product::all();
        return view('seller.products.cart',compact('productos'));
    }

    public function viewClient()
    {
        $Clientes = User::all();
        return view('seller.orders.viewClientes')->with('Clientes', $Clientes);
    }

}




