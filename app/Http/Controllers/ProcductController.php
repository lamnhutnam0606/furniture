<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Category;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use App\Models\Product;
use App\Models\Promotion;
use App\Models\Wishlist;

session_start();

class ProcductController extends Controller
{
    public function Authlogin(){
        $admin_id = Session::get('admin_id');
        if($admin_id){
            return Redirect::to('/dashboard');
        }else{
            return Redirect::to('/admin')->send();
        }
    }
    public function show_add_product(){
        $this->Authlogin();
        //use controller
            // $load_category = DB::table('tbl_category_product')->orderBy('category_id','desc')->get();
            // $load_brand = DB::table('tbl_brand_product')->orderBy('brand_id','desc')->get();
            // return view('admin.add_product')->with('category',$load_category)->with('brand',$load_brand);

        //use model
        $load_category = Category::orderBy('category_id','desc')->get();
        $load_brand = Brand::orderBy('brand_id','desc')->get();
        return view('admin.product.add_product')->with('category',$load_category)->with('brand',$load_brand);
    }
    public function all_product(){
        $this->Authlogin();
        //use controller
            // $load_product = DB::table('tbl_product')
            // ->join('tbl_category_product','tbl_category_product.category_id','=','tbl_product.category_id')
            // ->join('tbl_brand_product','tbl_brand_product.brand_id','=','tbl_product.brand_id')->get();
            // return view('admin.all_product')->with('product',$load_product);

        //use model
        //khi join table
        //Khi sử dụng `with('brand', 'category')`,
        //dữ liệu từ các mối quan hệ `brand` và `category` sẽ được eager loaded vào collection `$product`.
        //cần dùng vòng lặp foreach for page all_product
        $product = Product::with('brand','category')->orderBy('product_id','desc')->get();
        return view('admin.product.all_product')->with('product',$product);
    }
    public function add_product(Request $request){
        $this->Authlogin();
        //use controller
            // $data = array();
            // $data['product_name']=$request->product_name;
            // $data['product_price']=$request->product_price;
            // $data['product_desc']=$request->product_desc;
            // $data['product_content']=$request->product_content;
            // $data['product_status']=$request->product_status;
            // $data['category_id']=$request->load_category;
            // $data['brand_id']=$request->load_brand;
            // $get_image = $request->file('product_image');
            // if($get_image){
            //     $get_name_image = $get_image->getClientOriginalName();
            //     $name_image = current(explode('.',$get_name_image));
            //     $new_image = $name_image.rand(0,99).'.'.$get_image->getClientOriginalExtension();
            //     $get_image->move('resources/images/image_product',$new_image);
            //     $data['product_img']= $new_image;
            //     DB::table('tbl_product')->insert($data);
            //     Session::put('messages_product','Add Product Successfully!');
            //     return Redirect::to('/show-add-product');
            // }else{
            //     $data['product_img']= " ";
            //     DB::table('tbl_product')->insert($data);
            //     Session::put('messages_product','Add Product Successfully!');
            //     return Redirect::to('/show-add-product');
            // }
        
        //use model
        $data = $request->all();
        $product = new Product();
        $product->product_name = $data['product_name'];
        $product->product_price = $data['product_price'];
        $product->product_desc = $data['product_desc'];
        $product->product_content = $data['product_content'];
        $product->product_status = $data['product_status'];
        $product->category_id = $data['load_category'];
        $product->brand_id = $data['load_brand'];
        
        if($request->hasFile('product_image')){
            $get_image = $data['product_image'];
                $get_name_image = $get_image->getClientOriginalName();
                $name_image = current(explode('.',$get_name_image));
                $new_image = $name_image.rand(0,99).'.'.$get_image->getClientOriginalExtension();
                $get_image->move('resources/images/image_product',$new_image);
                $product['product_img']= $new_image;
        }else{
                $product['product_img']='';
        }
        $product->save();
        Session::put('messages_product','Add Product Successfully!');
        return Redirect::to('/show-add-product');
    }
    public function show_update_product($product_id){
        $this->Authlogin();
        
        //use controller
            // $load_product = DB::table('tbl_product')->where('product_id',$product_id)->orderBy('product_id','desc')->get();
            // $load_category = DB::table('tbl_category_product')->orderBy('category_id','desc')->get();
            // $load_brand = DB::table('tbl_brand_product')->orderBy('brand_id','desc')->get();
            // //// ->join('tbl_category_product','tbl_category_product.category_id','=','tbl_product.category_id')
            // //// ->join('tbl_brand_product','tbl_brand_product.brand_id','=','tbl_product.brand_id')->where('product_id',$product_id)->get();
            // $manager = view('admin.update_product')->with('product',$load_product)->with('category',$load_category)->with('brand',$load_brand);
            // return view('dashboard')->with('admin.update_product',$manager);

        //use model
        // dùng find() thì không cần dùng foreach cho file "update_product.blade.php"
        $load_product = Product::find($product_id);
        $load_category = Category::orderBy('category_id','desc')->get();
        $load_brand = Brand::orderBy('brand_id','desc')->get();
        $manager = view('admin.product.update_product')
        ->with('category',$load_category)
        ->with('brand',$load_brand)
        ->with('product',$load_product);
        return view('dashboard')->with('admin.product.update_product',$manager);
    }
    public function update_product(Request $request, $product_id){
        $this->Authlogin();
        //use controller
            // $data = array();
            // $data['product_name']= $request->update_product_name;
            // $data['product_price']= $request->update_product_price;
            // $data['product_desc']= $request->update_product_desc;
            // $data['product_content']= $request->update_product_content;
            // $data['category_id']= $request->load_category;
            // $data['brand_id']= $request->load_brand;
            // $data['product_status']= $request->update_product_status;
            // $get_image = $request->file('update_product_image');
            // if($get_image){
            //     $get_name_image = $get_image->getClientOriginalName();
            //     $name_image = current(explode('.',$get_name_image));
            //     $new_image = $name_image.rand(0,99).'.'.$get_image->getClientOriginalExtension();
            //     $get_image->move('resources/images/image_product',$new_image);
            //     $data['product_img']= $new_image;
            //     DB::table('tbl_product')->where('product_id',$product_id)->update($data);
            //     Session::put('messages_product','Update Product Successfully!');
            //     return Redirect::to('/all-product');
            // }else{
            //     DB::table('tbl_product')->where('product_id',$product_id)->update($data);
            //     Session::put('messages_product','Update Product Successfully!');
            //     return Redirect::to('/all-product');
            // }

        //use model
        
        $data = $request->all();
        $product = Product::find($product_id);
        $product->product_name = $data['update_product_name'];
        $product->product_price = $data['update_product_price'];
        $product->product_desc = $data['update_product_desc'];
        $product->product_content = $data['update_product_content'];
        $product->category_id = $data['load_category'];
        $product->brand_id = $data['load_brand'];
        $product->product_status = $data['update_product_status'];

        if($request->hasFile('update_product_image')){
            $get_image = $data['update_product_image'];
            $get_name_image = $get_image->getClientOriginalName();
            $name_image = current(explode('.',$get_name_image));
            $new_image = $name_image.rand(0,99).'.'.$get_image->getClientOriginalExtension();
            $get_image->move('resources/images/image_product',$new_image);
            $product['product_img']= $new_image;
        }
        $product->save();
        Session::put('messages_product','Update Product Successfully!');
        return Redirect::to('/all-product');
    }
    public function delete_product($product_id){
        $this->Authlogin();
        //use controller
            // DB::table('tbl_product')->where('product_id',$product_id)->delete();
            // Session::put('messages_product','Delete Prodcut Seccessfully!');
            // return Redirect::to('/all-product');

        //use model
        $product = Product::find($product_id);
        $product->delete();
        Session::put('messages_product','Delete Prodcut Seccessfully!');
        return Redirect::to('/all-product'); 
    }
    //search product page index
    public function search_product(Request $request){
        //use controller
        // $load_category = DB::table('tbl_category_product')->orderBy('category_id','desc')->get();
        // $load_brand = DB::table('tbl_brand_product')->orderBy('brand_id','desc')->get();

        //use model
        $load_category = Category::orderBy('category_id','desc')->get();
        $load_brand = Brand::orderBy('brand_id','desc')->get();
        $promotion = Promotion::with('product')->limit(4)->get();
        $wishlist = Wishlist::orderBy('wishlist_id','desc')->get();

        $search = $request->search_product;
        $result = Product::where('product_name','like','%'.$search.'%')->get();
        if($result){
            return view('product.features')
            ->with('category_product',$load_category)
            ->with('brand_product',$load_brand)
            ->with('promotion',$promotion)
            ->with('wishlist',$wishlist)
            ->with('product',$result);
        }else{
            return view('product.product.not_found_product')
            ->with('category_product',$load_category)
            ->with('brand_product',$load_brand)
            ->with('promotion',$promotion)
            ->with('wishlist',$wishlist)
            ->with('product',$result);
        }
    }
    //search product page dashboard
    public function search_product_admin(Request $request){
        //use controller
            // $find = $request->search_product;
            // $result = DB::table('tbl_product')
            // ->join('tbl_category_product','tbl_category_product.category_id','=','tbl_product.category_id')
            // ->join('tbl_brand_product','tbl_brand_product.brand_id','=','tbl_product.brand_id')
            // ->where('product_name','like','%'.$find.'%')
            // ->get();
            // if($result){
            //     return view('admin.search_product')->with('product',$result);
            // }

        //use model
        $find = $request->search_product;
        if($find==''){
            return Redirect::to('/all-product');
        }else{
           $result = Product::with('category','brand')->where('product_name','like','%'.$find.'%')->get();
            if($result){
                return view('admin.product.search_product')->with('product',$result)->with('product',$result)->with('product',$result);
        } 
        }
        
    }
}
