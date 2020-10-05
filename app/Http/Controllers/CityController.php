<?php
namespace App\Http\Controllers;

use App\Cities;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Http\Request;

class CityController extends Controller
{
    public function addCity(Request $request){
        
    if($request->isMethod('post')){
        $data = $request->all();

        if(empty($data['status'])){
            $status='0';
        }else{
            $status='1';
        }
        

        $city = new Cities;
        $city->city_name = $data['city_name'];
        if (str_replace(" ", "", $city->city_name)=="")
        return redirect()->back()->with('flash_message_error', 'Por favor escriba el nombre del departamento');
        $city->department_name = $data['department_name'];
        if (str_replace(" ", "", $city->department_name)=="")
        return redirect()->back()->with('flash_message_error', 'Por favor escriba el nombre del Departamento');
        $city->status = $status;
        $city->save();
        
        return redirect()->back()->with('flash_message_success', 'La ciudad ha sido agregada correctamente');
    }
  

    return view('admin.city.add_city');     

    }

    public function editCity(Request $request,$id=null){
        
        if($request->isMethod('post')){
            $data = $request->all();

            if(empty($data['status'])){
                $status='0';
            }else{
                $status='1';
            }
            
            Cities::where(['id'=>$id])->update(['status'=>$status,'city_name'=>$data['city_name'],
            'department_name'=>$data['department_name']]);
            
            return redirect('/admin/cities')->with('flash_message_success','Ciudad Actualizada Correctamente!!!');
        }
    
        $CitiesDetails = Cities::where('id',$id)->first();
      
        return view('admin.city.edit_city')->with(compact('CitiesDetails'));
    }


    public function deleteCity($id){
        if ($id>0) {
            $sql = cities::where(['id'=>$id])->delete();
            if ($sql) {
                
                return redirect('/admin/cities')->with('flash_message_success','La Ciudad ha sido eliminada correctamente');
            }
        }
        return redirect('/admin/cities')->with('flash_message_error','La ciudad no se elimino correctamente');
    }
    public function viewCities(){
            
        $cities = Cities::get();
        return view('admin.city.view_city')->with(compact('cities'));

    }

}

