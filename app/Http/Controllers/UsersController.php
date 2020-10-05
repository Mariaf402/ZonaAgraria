<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\User;
use App\Country;
use Auth;
use Session;
use DB;
use App\Category;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Exports\usersExport;
use Maatwebsite\Excel\Facades\Excel;
use Carbon\Carbon;
class UsersController extends Controller
{
    public function userLoginRegister(){
        //Muestra  el titulo de Zonagraria
        $meta_title = "User Login/Register - ZonAgraria";
        //Se va a la vista de login
        return view('users.login')->with(compact('meta_title'));
    }
    public function userRegister(){
        //se va a la vista de registrar usuarios
        return view('users.register');

    }
//Validaciones para registrar un usuario
    public function login(Request $request){
        if($request->isMethod('post')){
            $data = $request->all();
            /*echo "<pre>"; print_r($data); die;*/
            if(Auth::attempt(['email'=>$data['email'],'password'=>$data['password']])){
                $userStatus = User::where('email',$data['email'])->first();
                if($userStatus->status == 0){
                    return redirect()->back()->with('flash_message_error','Tu cuenta no esta activada por favor revisa tu correo para activarla.');
                }
                Session::put('frontSession',$data['email']);
                if(!empty(Session::get('session_id'))){
                    $session_id = Session::get('session_id');
                    DB::table('cart')->where('session_id',$session_id)->update(['user_email' => $data['email']]);
                }
                return redirect('/cart');
            }else{
                return redirect()->back()->with('flash_message_error','Usuario O contraseña incorrectos!');
            }
        }
    }
    public function register(Request $request){
    	if($request->isMethod('post')){
    		$data = $request->all();

    		// Compruebe si el usuario ya existe
    		$usersCount = User::where('email',$data['email'])->count();
    		if($usersCount>0){
    			return redirect()->back()->with('flash_message_error','Tu cuenta no esta activada, por favor confirma tu correo para activarla!');
    		}else{
    			$user = new User;
                $user->name = $data['name'];
                $user->email = $data['email'];
                $user->password = bcrypt($data['password']);
                date_default_timezone_set('america/bogota');
                $user->created_at = date("Y-m-d H:i:s");
                $user->updated_at = date("Y-m-d H:i:s");
                $user->save();

                //Envia correo electrónico de confirmación
                $email = $data['email'];
                $messageData = ['email'=>$data['email'],'name'=>$data['name'],'code'=>base64_encode($data['email'])];
                Mail::send('emails.confirmation',$messageData,function($message) use($email){
                    $message->to($email)->subject('Revisa tu correo para confirmar tu cuenta en ZonAgraria');
                });
                return redirect()->back()->with('flash_message_success','Por Favor confima tu email para ingresar a la cuenta!');
                if(Auth::attempt(['email'=>$data['email'],'password'=>$data['password']])){
                    Session::put('frontSession',$data['email']);
                    if(!empty(Session::get('session_id'))){
                        $session_id = Session::get('session_id');
                        DB::table('cart')->where('session_id',$session_id)->update(['user_email' => $data['email']]);
                    }
                    return redirect('/cart');
                }
    		}
    	}
    }
    public function forgotPassword(Request $request){
        if($request->isMethod('post')){
            $data = $request->all();
            /*echo "<pre>"; print_r($data); die;*/
            $userCount = User::where('email',$data['email'])->count();
            if($userCount == 0){
                return redirect()->back()->with('flash_message_error','El correo no existe en nuestro sistema!');
            }
            //Obtener detalles de usuario
            $userDetails = User::where('email',$data['email'])->first();
                //Generar contraseña aleatoria
            $random_password = str_random(30);
            //Codificar / contraseña segura
            $new_password = bcrypt($random_password);
            //Actualiza contraseña
            User::where('email',$data['email'])->update(['password'=>$new_password]);
            //Enviar contraseña olvidada código de correo electrónico
            $email = $data['email'];
            $name = $userDetails->name;
            $messageData = [
                'email'=>$email,
                'name'=>$name,
                'password'=>$random_password
            ];
            Mail::send('emails.forgotpassword',$messageData,function($message)use($email){
                $message->to($email)->subject('Nueva contraseña - ZonAgraria');
            });
            return redirect('login-register')->with('flash_message_success','Por favor revise su correo electrónico para la nueva contraseña!');
        }


        $categories = category::get();

        return view('users.forgot_password')->with(compact('categories'));
    }

    //Confirmar cuenta
    public function confirmAccount($email){
        $email = base64_decode($email);
        $userCount = User::where('email',$email)->count();
        if($userCount > 0){
            $userDetails = User::where('email',$email)->first();
            if($userDetails->status == 1){
                return redirect('login-register')->with('flash_message_success','Tu cuenta ya esta activada ya puedes iniciar sesión.');
            }else{
                User::where('email',$email)->update(['status'=>1]);
                // Enviar correo electrónico de bienvenida
                $messageData = ['email'=>$email,'name'=>$userDetails->name];
                Mail::send('emails.welcome',$messageData,function($message) use($email){
                    $message->to($email)->subject('Bienvenido a ZonAgraria');
                });
                return redirect('login-register')->with('flash_message_success','Tu cuenta ya esta activada ya puedes iniciar sesión.');
            }
        }else{
            abort(404);
        }
    }
    //cuenta ACTUALIZAR
    public function account(Request $request){
        $user_id = Auth::user()->id;
        $userDetails = User::find($user_id);
        $countries = Country::get();
        if($request->isMethod('post')){
            $data = $request->all();
            //dd($data)
            if(empty($data['name'])){
                return redirect()->back()->with('flash_message_error','Por favor ingresa el nombre para poder actualizar los datos!');
            }
            if(empty($data['address'])){
                $data['address'] = '';
            }
            if(empty($data['city'])){
                $data['city'] = '';
            }
            if(empty($data['state'])){
                $data['state'] = '';
            }
            if(empty($data['country'])){
                $data['country'] = '';
            }
            if(empty($data['pincode'])){
                $data['pincode'] = '';
            }
            if(empty($data['mobile'])){
                $data['mobile'] = '';
            }
            $user = User::find($user_id);
            $user->name = $data['name'];
            $user->address = $data['address'];
            $user->city = $data['city'];
            $user->state = $data['state'];
            $user->country = $data['country'];
            $user->pincode = $data['pincode'];
            $user->mobile = $data['mobile'];
            $user->save();
            return redirect()->back()->with('flash_message_success','Los detalles de tu cuenta se han actualizado correctamente!');
        }
        return view('users.account')->with(compact('countries','userDetails'));
    }
    public function chkUserPassword(Request $request){
        $data = $request->all();
        /*echo "<pre>"; print_r($data); die;*/
        $current_password = $data['current_pwd'];
        $user_id = Auth::User()->id;
        $check_password = User::where('id',$user_id)->first();
        if(Hash::check($current_password,$check_password->password)){
            echo "true"; die;
        }else{
            echo "false"; die;
        }
    }
    public function updatePassword(Request $request){
        if($request->isMethod('post')){
            $data = $request->all();
            /*echo "<pre>"; print_r($data); die;*/
            $old_pwd = User::where('id',Auth::User()->id)->first();
            $current_pwd = $data['current_pwd'];
            if(Hash::check($current_pwd,$old_pwd->password)){
                // Update password
                $new_pwd = bcrypt($data['new_pwd']);
                User::where('id',Auth::User()->id)->update(['password'=>$new_pwd]);
                return redirect()->back()->with('flash_message_success',' Clave actualizada correctamente!');
            }else{
                return redirect()->back()->with('flash_message_error','La clave actual es incorrecta!');
            }
        }
    }
    public function logout(){
        Auth::logout();
        Session::forget('frontSession');
        Session::forget('session_id');
        return redirect('/');
    }
    public function checkEmail(Request $request){
    	// Check if User already exists
    	$data = $request->all();
		$usersCount = User::where('email',$data['email'])->count();
		if($usersCount>0){
			echo "false";
		}else{
			echo "true"; die;
		}
    }
    public function viewUsers(){
        if(Session::get('adminDetails')['users_access']==0){
            return redirect('/admin/dashboard')->with('flash_message_error','No tienes acceso ha este modulo');
        }
        $users = User::get();
        return view('admin.users.view_users')->with(compact('users'));
    }
    public function deleteUsers($id = null){
        if(!empty($id)){
            user::where(['id'=>$id])->delete();
            return redirect()->back()->with('flash_message_success','Usuario eliminado correctamente');
        }
    }
    public function policies(){
        return view('policies.privacy_policies');
    }
    public function statusUsers(Request $request,$id){
        if($request->isMethod('post')){
            $data = $request->all();
            if(empty($data['status'])){
                $data['status'] = "";
            }
            User::where('id',$id)->update(['status'=>$data['status']]);
            return redirect()->back()->with('flash_message_success','Estado actualizado correctamente!');

        }
        $users = User::where('id',$id)->first();
        return view('admin.users.view_update_status')->with(compact('users'));
    }
}
