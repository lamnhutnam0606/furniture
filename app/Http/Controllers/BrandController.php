<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use App\Models\Brand;
session_start();
class BrandController extends Controller
{
    public function AuthLogin(){
        $admin_id = Session::get('admin_id');
        if($admin_id){
            return Redirect::to('/dashboard');
        }
        else{
            return Redirect::to('/admin')->send();
        }
    }
    public function add_brand_product(){
        $this->AuthLogin();
        return view('admin.brand.add_brand_product');
    }
    public function all_brand_product(){
        $this->AuthLogin();
        // $brand_product = DB::table('tbl_brand_product')->get(); use controler
        
        // use model
        // $brand_product = Brand::all(); 
        // sắp xếp thương hiệu theo model
        // take() lấy số lượng brand ra page "->take(3)"
        $brand_product = Brand::orderBy('brand_id','desc')->get();// use model
        return view('admin.brand.all_brand_product')->with('brand_product',$brand_product);
    }
    public function add_brand(Request $request){
        $this->AuthLogin();

        // use controller 
        // $data = array();
        // $data['brand_name']= $request->brand_product_name;
        // $data['brand_desc']= $request->brand_product_desc;
        // $data['brand_status']= $request->brand_product_status;
        // DB::table('tbl_brand_product')->insert($data);
        // Session::put('messages_brand','Add Brand Successfully.');

        // use model
        $data = $request->all();
        $brand = new Brand();
        $brand->brand_name = $data['brand_product_name'];
        $brand->brand_desc = $data['brand_product_desc'];
        $brand->brand_status = $data['brand_product_status'];
        $brand->save();

        Session::put('messages_brand','Add Brand Successfully.');
        return Redirect::to('/add-brand-product');
    }
    public function show_update_brand_product($brand_id){
        $this->AuthLogin();
        //use controller 
        // $load_info = DB::table('tbl_brand_product')->where('brand_id',$brand_id)->get();
        // $manager = view('admin.update_brand_product')->with('brand_product',$load_info);
        
        //use model
        //$load_info = Brand::where('brand_id',$brand_id)->get();
        $load_info = Brand::find($brand_id);
        $manager = view('admin.brand.update_brand_product')->with('load_info',$load_info);
        return view('dashboard')->with('admin.brand.update_brand_product',$manager);
    }
    public function update_brand(Request $request, $brand_id){
        $this->AuthLogin();

        // use controller
        // $data = array();
        // $data['brand_name']=$request->update_brand_product_name;
        // $data['brand_desc']=$request->update_brand_product_desc;
        // $data['brand_status']=$request->update_brand_product_status;
        // $result = DB::table('tbl_brand_product')->where('brand_id',$brand_id)->update($data);
        // if($result){
        //     Session::put('messages_brand','Update Brand Successfully!');
        //     return Redirect::to('/all-brand-product');
        // }


        //use model
        $data = $request->all();
        $brand = Brand::find($brand_id);
        $brand->brand_name=$data['update_brand_product_name'];
        $brand->brand_desc=$data['update_brand_product_desc'];
        $brand->brand_status=$data['update_brand_product_status'];
        $brand->save();
        Session::put('messages_brand','Update Brand Successfully!');
        return Redirect::to('/all-brand-product');
    }
    public function delete_brand_product($brand_id){
        $this->AuthLogin();

        //use controller
        // $result = DB::table('tbl_brand_product')->where('brand_id',$brand_id)->delete();
        // if($result){
        //     Session::put('messages_brand','Delete Brand Successfully!');
        //     return Redirect::to('/all-brand-product');
        // }


        //use model
        $brand = Brand::find($brand_id);
        $brand->delete();
        Session::put('messages_brand','Delete Brand Successfully!');
        return Redirect::to('/all-brand-product');
    }
    public function search_brand_product(Request $request){
        //use controller
            // $find = $request->search_brand;
            // $result = DB::table('tbl_brand_product')->where('brand_name','like','%'.$find.'%')->get();
            // if($result){
            //     return view('admin.search_brand_product')->with('brand_product',$result);
            // }

        //use model
        $find = $request->search_brand;
        if($find==''){
            return Redirect::to('/all-brand-product');
        }else{
            $result = Brand::orderBy('brand_id','desc')->where('brand_name','like','%'.$find.'%')->get();
            if($result){
                return view('admin.brand.search_brand_product')->with('brand_product',$result);
            }
        }
    }
}
