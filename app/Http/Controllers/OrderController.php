<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use App\Order;
use App\OrdersProduct;
class OrderController extends Controller
{

    public function index()
    {
        $ordenes = Order::all();
        return view('seller.orders.sellerorders')->with('ordenes', $ordenes);
    }

    public function viewOrdersProduc($id)
    {
        $ordenes = Order::find($id);
        $producs = \DB::table('orders_products')
        ->select('orders_products.*')
        ->where('order_id',$id)
        ->get();
        return view('seller.orders.Ordersproducts',compact('producs'))->with('ordenes', $ordenes);
    }
    public function store(Request $request)
    {
        $v = Validator::make($request->all(),[
            'name' => ['required', 'string', 'max:255'],
            'user_email' => ['required', 'string', 'email', 'max:255'],
            'mobile' => ['required', 'string', 'max:255'],
            'address' => ['required', 'string', 'max:255'],
            'country'=> ['required','string', 'max:255'],
            'city'=> ['required','string', 'max:255'],
            'shipping_charges' => ['required'],
            'payment_method' => ['required', 'string', 'max:255'],
            'grand_total' => ['required'],
            'state' => ['required','string', 'max:255'],
            'pincode' => ['required','string', 'max:255'],
            'coupon_code' => ['required','string', 'max:255'],
            'coupon_amount' =>  ['required'],
            'order_status' => ['required','string', 'max:255'],
            'grand_total'  =>  ['required'],
        ]); 

        if ($v->fails()){
           return back()->withInput()->with('ErrorsInsert','Llene todos los campos')->withErrors($v);
        }else{
            $entrada=$request->all();
            Order::create($entrada);
            return redirect('seller/dash/order')->with('Registrado','Se ha guardado correctamente');
        }
    }

    public function destroy($id){
        $ordenes = Order::find($id);
        $ordenes->delete();
        return  back()->with('Registrado','El registro se elimino correctamente');
    }

    public function edit(Request $request)
    {
        $ordenes = Order::find($request->id);
        return view('seller.orders.updateOrden');
        
    }

    public function update(Request $request)
    {
        $v = Validator::make($request->all(),[
            'name' => ['required', 'string', 'max:255'],
            'mobile' => ['required', 'string', 'max:255'],
            'address' => ['required', 'string', 'max:255'],
            'city'=> ['required'],
            'shipping_charges' => ['required', 'string', 'max:255'],
            'payment_method' => ['required', 'string', 'max:255'],
            'grand_total' => ['required', 'string', 'max:255'],
        ]); 

        if ($v->fails()){
           return back()->withInput()->with('ErrorsInsert','Llene todos los campos')->withErrors($v);
        }else{

            $ordenes = order::find($request->id);
            $ordenes->name = $request->name;
            $ordenes->mobile = $request->mobile;
            $ordenes->address = $request->address;
            $ordenes->city = $request->city;
            $ordenes->shipping_charges = $request->shipping_charges;
            $ordenes->payment_method = $request->payment_method;
            $ordenes->grand_total = $request->grand_total;
            $ordenes->save(); 
            return back()->withInput()->with('Registrado','El registro se edito correctamente')->withErrors($v);

        }
    }




}
