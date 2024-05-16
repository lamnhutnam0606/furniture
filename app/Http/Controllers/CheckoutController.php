<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Customer;
use App\Models\Order;
use App\Models\Order_details;
use App\Models\Payment;
use App\Models\User;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class CheckoutController extends Controller
{
    public function login_checkout(){
        $load_brand = Brand::orderBy('brand_id','desc')->get();
        $load_cate = Category::orderBy('category_id','desc')->get();
        return view('checkout.login_checkout')->with('category_product',$load_cate)->with('brand_product',$load_brand);
    }
    public function user_signup(Request $request){
        $data = $request->all();
        $user = new Customer();

        $user->customer_name = $data['user_name_signup'];
        $user->customer_password = md5($data['user_pass_signup']);
        $user->customer_email = $data['user_email_signup'];
        $user->customer_phone = $data['user_phone_signup'];
        $user->save();
        Session::put('messages','Loign successfull');
        Session::put('customer_id',$user->customer_id);
        return Redirect::to('/checkout');

    }
    public function user_signin(Request $request){
        $data = $request->all();
        $user_name = $data['user_name_signin'];
        $user_password = md5($data['user_pass_signin']);
        $result = Customer::where('customer_name',$user_name)->where('customer_password',$user_password)->first();
        if($result){
            Session::put('customer_id',$result->customer_id);
            return Redirect::to('/');
        }else{
            Session::put('error','Username or password incorrect!');
            return Redirect::to('/login-checkout');
        }
    }
    public function checkout(){
        $load_brand = Brand::orderBy('brand_id','desc')->get();
        $load_cate = Category::orderBy('category_id','desc')->get();
        return view('checkout.checkout')->with('category_product',$load_cate)->with('brand_product',$load_brand);
    }
    public function logout_checkout(){
        Session::put('customer_id',null);
        Session::put('shipping_id',null);
        return Redirect::to('/trang-chu');
    }
    public function order_place(Request $request){
        $load_brand = Brand::orderBy('brand_id','desc')->get();
        $load_cate = Category::orderBy('category_id','desc')->get();
        

        //insert payment
        $data_payment = $request->all();
        $payment = new Payment();
        $payment->payment_method= $data_payment['payment_option'];
        $payment->payment_status= 'Pending';
        $payment->save();

        //insert order
        $check_code = substr(md5(microtime()),rand(0,26),5);
        $data_order = $request->all();
        $order = new Order();
        $order->customer_id= Session::get('customer_id');
        $order->shipping_id= Session::get('shipping_id');
        $order->payment_id= $payment->payment_id;
        $order->order_total= Session::get('totalsubtotal');
        $order->order_status= 'Pending';
        $order->created_at= now();
        $order->order_code= $check_code;
        $order->save();

        //insert order details
        $data_order_detais = $request->all();
        
        
        foreach(session('cart') as $product_id => $val){
            $order_details = new Order_details();
            $order_details->order_id = $order->order_id;
            $order_details->product_id = $product_id;
            $order_details->product_name = $val['name'];
            $order_details->product_price = $val['price'];
            $order_details->product_sales_quantity = $val['qty'];
            $order_details->order_code = $order->order_code;
            $order_details->save();
        }
        if($data_payment['payment_option'] == 1){
            $cash = 'CASH';
            Session::put('cart',null);
            Session::put('coupon',null);
            Session::put('fee',null);
            return view('checkout.payment_success')
            ->with('category_product',$load_cate)
            ->with('brand_product',$load_brand)
            ->with('op',$cash);
            
        }elseif($data_payment['payment_option'] == 2){
            $atm = 'ATM CARD';
            Session::put('cart',null);
            Session::put('coupon',null);
            Session::put('fee',null);
            return view('checkout.payment_success')
            ->with('category_product',$load_cate)
            ->with('brand_product',$load_brand)
            ->with('op',$atm);
        }else{
            $credit = 'CREDIT CARD';
            Session::put('cart',null);
            Session::put('coupon',null);
            Session::put('fee',null);
            return view('checkout.payment_success')
            ->with('category_product',$load_cate)
            ->with('brand_product',$load_brand)
            ->with('op',$credit);
        }
        
    }
    
}
