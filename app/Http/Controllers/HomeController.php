<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Customer;
use App\Models\Product;
use App\Models\Promotion;
use App\Models\Reviews;
use App\Models\Wishlist;
use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Monolog\Handler\RedisHandler;

session_start();
class HomeController extends Controller
{
    public function index(){
        $brand_product = Brand::orderBy('brand_id','desc')->get();
        $category_product = Category::orderBy('category_id','desc')->get();
        
        //$product = Product::with('brand','category')->limit(3)->get();
        $promotion = Promotion::with('product')->limit(4)->get();
        $wishlist = Wishlist::orderBy('wishlist_id','desc')->get();
        $product = Product::orderBy('product_id','desc')->Limit(12)->get();
        
        return view('product.features')
        ->with('brand_product',$brand_product)
        ->with('category_product',$category_product)
        ->with('product',$product)
        ->with('wishlist',$wishlist)
        ->with('promotion',$promotion);
    }
    public function show_product_category($category_id){
        $brand_product = Brand::orderBy('brand_id','desc')->get();
        $category_product = Category::orderBy('category_id','desc')->get();
        $product = Product::orderBy('product_id','desc')->where('category_id',$category_id)->get();
        $promotion = Promotion::with('product')->limit(4)->get();
        $wishlist = Wishlist::orderBy('wishlist_id','desc')->get();
       
        return view('product.features')
        ->with('brand_product',$brand_product)
        ->with('category_product',$category_product)
        ->with('promotion',$promotion)
        ->with('wishlist',$wishlist)
        ->with('product',$product);
        
    }
    public function show_product_brand($brand_id){
        $brand_product = DB::table('tbl_brand_product')->orderBy('brand_id','desc')->get();
        $category_product = DB::table('tbl_category_product')->orderBy('category_id','desc')->get();
        $product = DB::table('tbl_product')->orderBy('product_id','desc')->where('brand_id',$brand_id)->get();
        $promotion = Promotion::with('product')->limit(4)->get();
        $wishlist = Wishlist::orderBy('wishlist_id','desc')->get();

        return view('product.features')
        ->with('category_product',$category_product)
        ->with('brand_product',$brand_product)
        ->with('promotion',$promotion)
        ->with('wishlist',$wishlist)
        ->with('product',$product);
    }
    public function show_detail_product($product_id){
        $brand_product = Brand::orderBy('brand_id','desc')->get();
        $category_product = Category::orderBy('category_id','desc')->get();
        $customer = Customer::get();
        $review = Reviews::with('customer')->get();
        //$product = DB::table('tbl_product')->orderBy('product_id','desc')->where('product_id',$product_id)->get();
        $result = DB::table('tbl_product')->where('product_id',$product_id)
        ->join('tbl_brand_product','tbl_brand_product.brand_id','=','tbl_product.brand_id')
        ->join('tbl_category_product','tbl_category_product.category_id','=','tbl_product.category_id')
        ->get();

        foreach($result as $key => $res){
            $category_id = $res->category_id;
        }

        $realative = DB::table('tbl_product')
        ->join('tbl_brand_product','tbl_brand_product.brand_id','=','tbl_product.brand_id')
        ->join('tbl_category_product','tbl_category_product.category_id','=','tbl_product.category_id')
        ->where('tbl_category_product.category_id',$category_id)
        ->whereNotIn('tbl_product.product_id',[$product_id])
        ->get();

        return view('product.show_detail_product')->with('product',$result)
        ->with('category_product',$category_product)
        ->with('realative',$realative)
        ->with('customer',$customer)
        ->with('review',$review)
        ->with('brand_product',$brand_product);
        // ->with('product',$product);
        
    }
    public function show_detail_product_sale($product_id){
        $brand_product = Brand::orderBy('brand_id','desc')->get();
        $category_product = Category::orderBy('category_id','desc')->get();
        $customer = Customer::get();
        //$product = DB::table('tbl_product')->orderBy('product_id','desc')->where('product_id',$product_id)->get();
        $result = DB::table('tbl_product')->where('product_id',$product_id)
        ->join('tbl_brand_product','tbl_brand_product.brand_id','=','tbl_product.brand_id')
        ->join('tbl_category_product','tbl_category_product.category_id','=','tbl_product.category_id')
        ->get();

        $promotion = Promotion::with('product')->where('product_id',$product_id)->get();
        foreach($result as $key => $res){
            $category_id = $res->category_id;
        }

        $realative = DB::table('tbl_product')
        ->join('tbl_brand_product','tbl_brand_product.brand_id','=','tbl_product.brand_id')
        ->join('tbl_category_product','tbl_category_product.category_id','=','tbl_product.category_id')
        ->where('tbl_category_product.category_id',$category_id)
        ->whereNotIn('tbl_product.product_id',[$product_id])
        ->get();

        return view('product.show_detail_product_sale')->with('product',$result)
        ->with('category_product',$category_product)
        ->with('realative',$realative)
        ->with('promotion',$promotion)
        ->with('customer',$customer)
        ->with('brand_product',$brand_product);
    }
    public function price_range(Request $request){
        $brand_product = Brand::orderBy('brand_id','desc')->get();
        $category_product = Category::orderBy('category_id','desc')->get();
        $promotion = Promotion::with('product')->limit(4)->get();
        $wishlist = Wishlist::orderBy('wishlist_id','desc')->get();
       
        
        $price_range = explode(",", $request->input('price_range'));
        $start_price = $price_range[0];
        $end_price = $price_range[1];
        $product = Product::whereBetween('product_price',[$start_price,$end_price])->limit(8)->orderBy('product_id','desc')->get();
            // echo "Start Price: " . $start_price . "<br>";
            // echo "End Price: " . $end_price;
            // echo dd($price_range);
            
            if ($product->isNotEmpty()) {
                Session::put('start_price',$start_price);
                Session::put('end_price',$end_price);
                return view('product.features')
                    ->with('brand_product', $brand_product)
                    ->with('category_product', $category_product)
                    ->with('product', $product)
                    ->with('wishlist', $wishlist)
                    ->with('promotion', $promotion);
            } else {
                
                Session::put('messages','Can not find products priced between $'.$start_price.' -> $'.$end_price.'');
                Session::put('start_price',null);
                Session::put('end_price',null);
                return Redirect::to('/');
            }
    }
    public function wishlist_list(){
        if(Session::get('customer_id')){
            $brand_product = Brand::orderBy('brand_id','desc')->get();
            $category_product = Category::orderBy('category_id','desc')->get();
            //$product = Product::orderBy('product_id','desc')->limit(8)->get();
            $wishlist = Wishlist::with('product','customer')->orderBy('wishlist_id','desc')->get();
            
            return view('wishlist.wishlist_list')
            ->with('brand_product',$brand_product)
            ->with('wishlist',$wishlist)
            ->with('category_product',$category_product);
            //->with('product',$product);
        }else{
            return Redirect::to('/login-checkout');
        }
        
    }
    public function wishlist_product($product_id){
        if(Session::get('customer_id')){
            $wishlist = Wishlist::where('product_id',$product_id)->count();
            if($wishlist > 0){
                Session::put('messages',' The product is already on the wishlist');
                
            }else{
                $wishlist = new Wishlist();
                $wishlist->product_id = $product_id;
                $wishlist->customer_id = Session::get('customer_id');
                $wishlist->save();
                Session::put('messages','Add favorite products successfully');
            }
            return Redirect::to('/');
        }else{
            return Redirect::to('/login-checkout');
        }
        

    }
    public function wishlist_product_delete($wishlist_id){
        $wishlist = Wishlist::find($wishlist_id);
        $wishlist->delete();
        Session::put('messages','Remove favorite products successfully');
        return Redirect::to('/wishlist');
    }

    public function reviews_product(Request $request, $product_id){
        $data = $request->all();
        $review = new Reviews();
        $review->customer_id = Session::get('customer_id');
        $review->product_id = $product_id;
        $review->review_content = $data['review_content'];
        $review->save();
        Session::put('messages','Review submitted successfully');
        return Redirect::to('show-detail-product/'.$product_id);
    }
     public function reviews_product_sale(Request $request, $product_id){
        $data = $request->all();
        $review = new Reviews();
        $review->customer_id = Session::get('customer_id');
        $review->product_id = $product_id;
        $review->review_content = $data['review_content'];
        $review->save();
        Session::put('messages','Review submitted successfully');
        return Redirect::to('show-detail-product-sale/'.$product_id);
     }
}
