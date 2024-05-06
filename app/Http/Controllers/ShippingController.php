<?php

namespace App\Http\Controllers;
use App\Models\Brand;
use App\Models\Category;
use App\Models\City;
use App\Models\District;
use App\Models\Feeship;
use App\Models\Shipping;
use App\Models\Wards;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class ShippingController extends Controller
{
    public function save_info_shipping(Request $request){
        $data = $request->all();
        $shipping = new Shipping();
        $shipping->shipping_name=$data['shipping_name'];
        $shipping->shipping_address=$data['shipping_addr'];
        $shipping->shipping_phone=$data['shipping_phone'];
        $shipping->shipping_mail=$data['shipping_email'];
        $shipping->shipping_note=$data['shipping_note'];
        $shipping->save();
        Session::put('shipping_id',$shipping->shipping_id);
        return Redirect::to('/payment');
    }
    public function select_delivery_layout(Request $request){
        $data = $request->all();
        if($data['action']){
            $output = '';
            if($data['action'] == 'name_city'){
                $select_district = District::where('city_id',$data['id'])->orderBy('district_id','asc')->get();
                    $output.='<option>--choose district--</option>';
                    foreach($select_district as $key => $dis){
                        $output.='<option value="'.$dis->district_id.'">'.$dis->district_name.'</option>';
                    }
            }else{
                $select_wards = Wards::where('district_id',$data['id'])->orderBy('wards_id','asc')->get();
                    $output.='<option>--choose wards--</option>';
                    foreach($select_wards as $key => $war){
                        $output.='<option value="'.$war->wards_id.'">'.$war->wards_name.'</option>';
                    }
                }
        }
        echo $output;
    }
    public function payment(){
        $load_brand = Brand::orderBy('brand_id','desc')->get();
        $load_cate = Category::orderBy('category_id','desc')->get();
        $city = City::orderBy('city_id','asc')->get();
        return view('checkout.payment')
        ->with('category_product',$load_cate)
        ->with('brand_product',$load_brand)
        ->with('city',$city);
    }
    public function calculate_fee(Request $request){
        $data = $request->all();
        if($data['city_id']){
            $feeship = Feeship::where('fee_cityId',$data['city_id'])->where('fee_districtId',$data['district_id'])->where('fee_wardsId',$data['wards_id'])->get();
            if($feeship){
                $feeship_auto = $feeship->count();
                if($feeship_auto > 0){
                    foreach($feeship as $key => $fee){
                        Session::put('fee',$fee->fee_feeship);
                        Session::put('fee_city',$fee->fee_feeship);
                        Session::put('fee_dis',$fee->fee_feeship);
                        Session::put('fee_war',$fee->fee_feeship);
                        //Session::put('messages','Additional shipping costs successfully');
                        Session::save();
                    }
                }else{
                        Session::put('fee',50);
                        // Session::put('fee_city',$feeship->fee_feeship);
                        // Session::put('fee_dis',$feeship->fee_feeship);
                        // Session::put('fee_war',$feeship->fee_feeship);
                        //Session::put('messages','Additional shipping costs successfully');
                        Session::save();
                }
                
            }
           
            
        }
        //
    }
}
