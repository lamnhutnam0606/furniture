<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\Promotion;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

session_start();
class HomeController extends Controller
{
    public function index(){
        $brand_product = Brand::orderBy('brand_id','desc')->get();
        $category_product = Category::orderBy('category_id','desc')->get();
        $product = Product::orderBy('product_id','desc')->limit(4)->get();
        //$product = Product::with('brand','category')->limit(3)->get();
        $promotion = Promotion::with('product')->limit(4)->get();
        
        return view('product.features')
        ->with('brand_product',$brand_product)
        ->with('category_product',$category_product)
        ->with('product',$product)
        ->with('promotion',$promotion);
    }
    public function show_product_category($category_id){
        $brand_product = Brand::orderBy('brand_id','desc')->get();
        $category_product = Category::orderBy('category_id','desc')->get();
        $product = Product::orderBy('product_id','desc')->where('category_id',$category_id)->get();
        $promotion = Promotion::with('product')->limit(4)->get();
       
        return view('product.features')
        ->with('brand_product',$brand_product)
        ->with('category_product',$category_product)
        ->with('promotion',$promotion)
        ->with('product',$product);
        
    }
    public function show_product_brand($brand_id){
        $brand_product = DB::table('tbl_brand_product')->orderBy('brand_id','desc')->get();
        $category_product = DB::table('tbl_category_product')->orderBy('category_id','desc')->get();
        $product = DB::table('tbl_product')->orderBy('product_id','desc')->where('brand_id',$brand_id)->get();
        $promotion = Promotion::with('product')->limit(4)->get();

        return view('product.features')
        ->with('category_product',$category_product)
        ->with('brand_product',$brand_product)
        ->with('promotion',$promotion)
        ->with('product',$product);
    }
    public function show_detail_product($product_id){
        $brand_product = DB::table('tbl_brand_product')->orderBy('brand_id','desc')->get();
        $category_product = DB::table('tbl_category_product')->orderBy('category_id','desc')->get();
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
        ->with('brand_product',$brand_product);
        // ->with('product',$product);
        
    }
    public function show_detail_product_sale($product_id){
        $brand_product = DB::table('tbl_brand_product')->orderBy('brand_id','desc')->get();
        $category_product = DB::table('tbl_category_product')->orderBy('category_id','desc')->get();
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
        ->with('brand_product',$brand_product);
    }
    
}
