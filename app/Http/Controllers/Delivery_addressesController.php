<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DeliveryAddress;
use App\Order;
class Delivery_addressesController extends Controller
{
 
    public function index(){
        $Envios = DeliveryAddress::all();
        return view('seller.delivery_addresses.listAddresses')->with('Envios', $Envios);
    }

    public function showEnvio($id){
        $ordenes = Order::find($id);
        return view('seller.delivery_addresses.addDelivery')->with('ordenes', $ordenes);
    }

    public function store(Request $request){
  
            $entrada=$request->all();
            DeliveryAddress::create($entrada);
            return redirect('seller/dash/addresses')->with('Registrado','Se ha guardado correctamente');

    }  
}
