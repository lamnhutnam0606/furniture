<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Http\Controllers\Cart;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Facades\Session;

session_start();
class CartController extends Controller
{
    public function show_cart(){
        $brand_product = Brand::orderBy('brand_id','desc')->get();
        $category_product = Category::orderBy('category_id','desc')->get();
        //$product = Product::orderBy('product_id','desc')->get();
        return view('cart.show_cart')
        ->with('brand_product',$brand_product)
        ->with('category_product',$category_product);
        //->with('product',$product);
       
    }
    public function save_cart($product_id){
        // $product_id = $request->productid_hidden;
        // $quantity = $request->qty;
        // $brand_product = DB::table('tbl_brand_product')->orderBy('brand_id','desc')->get();
        // $category_product = DB::table('tbl_category_product')->orderBy('category_id','desc')->get();
        // $product = DB::table('tbl_product')->where('product_id',$productid)->get();
        // return view('cart.show_cart')->with('product',$product)->with('brand_product',$brand_product)->with('category_product',$category_product);
        
        $product = Product::findOrFail($product_id);
        $cart = Session::get('cart',[]);
       
        if(isset($cart[$product_id])){
            $cart[$product_id]['qty']++;
        }else{
            $cart[$product_id] = [
                
                "name" => $product->product_name,
                "qty" => 1,
                "price" => $product->product_price,
                "image" => $product->product_img
            ];
        }
        Session::put('cart',$cart);
        Session::put('messages','Add to cart successfull!');
        return Redirect::to('/');
    }
    public function delete_cart(Request $request){
        if($request->product_id){
            $cart = Session::get('cart');
            if(isset($cart[$request->product_id])){
                unset($cart[$request->product_id]);
                Session::put('cart',$cart);
                
            }
            
            Session::flash('messages','Successfully deleted the product in the shopping cart!');
        }
    }
    public function update_qty_cart(Request $request){
        //$data = $request->all();
        //$id= $request->product_id;
        $cart = Session::get('cart');
        if($cart){
            foreach($request->cart_qty as $key => $qty){
               $cart[$key]['qty'] = $qty;
               
            }
        }
        Session::put('messages','Successfully update the product in the shopping cart!');
        Session::put('cart',$cart);
        return Redirect::to('/show-cart');
        
    }
}
