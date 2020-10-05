<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Coupon;

class CouponsController extends Controller
{
    public function addCoupon(Request $request){

		if($request->isMethod('post')){
			$data = $request->all();
			/*echo "<pre>"; print_r($data); die;*/
			$coupon = new Coupon;
			$coupon->coupon_code = $data['coupon_code'];
			if (str_replace(" ", "", $coupon->coupon_code)=="")
			return redirect()->back()->with('flash_message_error', 'Por favor escriba el codigo del cupon');
			$coupon->amount = $data['amount'];
			$coupon->amount_type = $data['amount_type'];
			$coupon->expiry_date = $data['expiry_date'];

			$coupon->save();
			return redirect()->back()->with('flash_message_success', 'El cupon ha sido agregada correctamente');
		}
		$levels = Coupon::where(['id'=>0])->get();
		return view('admin.coupons.add_coupon')->with(compact('levels'));
	}

	public function editCoupon(Request $request,$id=null){
		if($request->isMethod('post')){
			$data = $request->all();
			/*echo "<pre>"; print_r($data); die;*/
			$coupon = Coupon::find($id);
			$coupon->coupon_code = $data['coupon_code'];
			$coupon->amount = $data['amount'];
			$coupon->amount_type = $data['amount_type'];
			$coupon->expiry_date = $data['expiry_date'];
			if(empty($data['status'])){
				$data['status'] = 0;
			}
			$coupon->status = $data['status'];
			$coupon->save();
			return redirect()->action('CouponsController@viewCoupons')->with('flash_message_success', 'El cupón ha sido actualizado exitosamente');
		}
		$couponDetails = Coupon::find($id);
		/*$couponDetails = json_decode(json_encode($couponDetails));
		echo "<pre>"; print_r($couponDetails); die;*/
		return view('admin.coupons.edit_coupon')->with(compact('couponDetails'));
	}

	public function viewCoupons(){
		$coupon = new Coupon;
		$coupons = Coupon::orderBy('id','DESC')->get();
		return view('admin.coupons.view_coupons')->with(compact('coupons'));
	}

	public function deleteCoupon($id = null){
        Coupon::where(['id'=>$id])->delete();
        return redirect()->back()->with('flash_message_success', 'El cupón ha sido eliminado exitosamente');
    }

}
/* if($id>0){
	$sql = Category::where(['id'=>$id])->delete();
	if ($sql)
				return redirect('/admin/view-categories')->with('flash_message_success','La categoria se elimino correctamente');
}
return redirect('/admin/view-categories')->with('flash_message_error','La categoria no se elimino correctamente');
 */
