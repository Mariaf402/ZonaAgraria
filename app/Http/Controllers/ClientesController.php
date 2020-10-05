<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;


class ClientesController extends Controller
{
    public function index()
    {
        $Usuarios = User::all();
        return view('seller.users.sellerusers')->with('Usuarios', $Usuarios);
    }

    public function create(){
        return view('seller.users.sellerModalusers',compact('citys','Countrys'));
    }

    public function store(Request $request){

        $entrada=$request->all();
        User::create($entrada);
        return back()->with('Registrado','Se ha guardado correctamente');
        
    }   

        
    public function destroy($id){
        $usuario = User::find($id);
        $usuario->delete();
        return  back()->with('Registrado','El registro se elimino correctamente');
      }  

}
