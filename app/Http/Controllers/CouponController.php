<?php

namespace App\Http\Controllers;

use App\Models\Coupon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class CouponController extends Controller
{
    public function show_add_coupon(){
        return view('admin.coupon.add_coupon');
    }
    public function add_coupon(Request $request){
        $data = $request->all();
        $coupon = new Coupon();
        $coupon->coupon_name = $data['Coupon_name'];
        $coupon->coupon_code = $data['coupon_code'];
        $coupon->coupon_qty = $data['Coupon_quantity'];
        $coupon->coupon_type = $data['Coupon_type'];
        $coupon->coupon_value = $data['Coupon_value'];
        $coupon->save();
        Session::put('messages_coupon','Coupon added successfully!');
        return Redirect::to('/show-add-coupon');
    }
    public function list_coupon(){
        $coupon = Coupon::orderBy('coupon_id','desc')->get();
        return view('admin.coupon.list_coupon')->with(compact('coupon'));
    }
    public function show_update_coupon($coupon_id){
        $coupon = Coupon::find($coupon_id);
        return view('admin.coupon.update_coupon')->with(compact('coupon'));
    }
    public function update_coupon(Request $request,$coupon_id){
        $data = $request->all();
        $coupon = Coupon::find($coupon_id);
        $coupon-> coupon_name = $data['update_coupon_name'];
        $coupon-> coupon_code = $data['update_coupon_code'];
        $coupon-> coupon_qty = $data['update_coupon_quantity'];
        $coupon-> coupon_type = $data['update_coupon_type'];
        $coupon-> coupon_value = $data['update_coupon_value'];
        $coupon->save();
        Session::put('messages_coupon','Coupon update successfully!');
        return Redirect::to('/list-coupon');
    }
    public function delete_coupon($coupon_id){
        $coupon = Coupon::find($coupon_id);
        $coupon->delete();
        Session::put('messages_coupon','Coupon delete successfully!');
        return Redirect::to('/list-coupon');
    }
    public function search_coupon(Request $request){
        $search = $request->search_coupon;
        $coupon = Coupon::orderBy('coupon_id','desc')->where('coupon_name','like','%'.$search.'%')->get();
        return view('admin.coupon.list_coupon')->with('coupon',$coupon);
    }
    public function check_coupon(Request $request){
        $data = $request->all();
        $coupon = Coupon::where('coupon_code',$data['coupon_check'])->first();
        if($coupon){
            $count_coupon = $coupon->count();
            if($count_coupon>0){
                $coupon_session = Session::get('coupon');
                if($coupon_session==true){
                    $is_available = 0;
                    if($is_available == 0){
                        $cou[] = array(
                            'coupon_code' => $coupon->coupon_code,
                            'coupon_type' => $coupon->coupon_type,
                            'coupon_value' => $coupon->coupon_value,
                        );
                        Session::put('coupon',$cou);
                    }
                }else{
                    $cou[] = array(
                        'coupon_code' => $coupon->coupon_code,
                        'coupon_type' => $coupon->coupon_type,
                        'coupon_value' => $coupon->coupon_value,
                    );
                    Session::put('coupon',$cou);
                }
                Session::save();
                Session::put('messages','Discount code added successfully');
                
            }
        }else{
            Session::put('messages','Discount code added not successfully');
        }
        return Redirect::to('/payment');
    }
}
