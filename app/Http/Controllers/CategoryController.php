<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use function Laravel\Prompts\confirm;
session_start();

class CategoryController extends Controller
{
    public function Authlogin(){
        $admin_id = Session::get('admin_id');
        if($admin_id){
            return Redirect::to('/dashboard');
        }else{
            return Redirect::to('/admin')->send();
        }
    }
    public function add_category_product(){
        $this->Authlogin();
        return view('admin.category.add_category_product');
    }
    public function all_category_product(){
        $this->Authlogin();
        //use controller
            // $category_product = DB::table('tbl_category_product')->get();
            // return view('admin.all_category_product')->with('category_product',$category_product);

        //use model
        $category_product = Category::orderBy('category_id','desc')->get();
        return view('admin.category.all_category_product')->with('category_product',$category_product);
    }
    public function add_category(Request $request){
        $this->Authlogin();
        // use controller
            // $data = array();
            // $data['category_name']=$request->category_product_name;
            // $data['category_desc']=$request->category_product_desc;
            // $data['category_status']=$request->category_product_status;
            // DB::table('tbl_category_product')->insert($data);

        //use model
        $data = $request->all();
        $category = new Category();
        $category->category_name = $data['category_product_name'];
        $category->category_desc = $data['category_product_desc'];
        $category->category_status = $data['category_product_status'];
        $category->save();


        Session::put('messages_category','Add Category Successfully.');
        return Redirect::to('/add-category-product');
    }
    public function show_update_category_product($category_id){
        $this->Authlogin();
        //use controller
            // $load_info = DB::table('tbl_category_product')->where('category_id',$category_id)->get();
            // $manager = view('admin.update_category_product')->with('category_product',$load_info);
            // return view('dashboard')->with('admin.update_category_product',$manager);

        //use model
        $load_info = Category::find($category_id);
        $manager = view('admin.category.update_category_product')->with('category_product',$load_info);
        return view('dashboard')->with('admin.category.update_category_product',$manager);
    }
    public function update_category_product(Request $request,$category_id){
        $this->Authlogin();
        //use controller
            // $data = array();
            // $data['category_name']=$request->update_category_product_name;
            // $data['category_desc']=$request->update_category_product_desc;
            // $data['category_status']=$request->;
            // $result = DB::table('tbl_category_product')->where('category_id',$category_id)->update($data);
            // if($result){
            //     Session::put('messages_category','Update Category Successfully!');
            //     return Redirect::to('/all-category-product');
            // }


        //use model
        $data = $request->all();
        $category = Category::find($category_id);
        $category->category_name = $data['update_category_product_name'];
        $category->category_desc = $data['update_category_product_desc'];
        $category->category_status = $data['update_category_product_status'];
        $category->save();

        Session::put('messages_category','Update Category Successfully!');
        return Redirect::to('/all-category-product');

    }
    public function delete_category_product($category_id){
        $this->Authlogin();
        //use controller
            // $result = DB::table('tbl_category_product')->where('category_id',$category_id)->delete();
            // if($result){
            //     Session::put('messages_category','Delete Category Successfully!');
            //     return Redirect::to('/all-category-product');
            // }
        

        //use model
        $category = Category::find($category_id);
        $category->delete();
        Session::put('messages_category','Delete Category Successfully!');
        return Redirect::to('/all-category-product');

    }
    public function search_category_product(Request $request){
        //use controller
            // $find = $request->search_category;
            // $result = DB::table('tbl_category_product')->where('category_name','like','%'.$find.'%')->get();
            // if($result){
            //     return view('admin.search_category_product')->with('category_product',$result);
            // }

        //use model
        $find = $request->search_category;
        if($find==''){
            return Redirect::to('/all-category-product');
        }else{
            $result = Category::orderBy('category_id','desc')->where('category_name','like','%'.$find.'%')
            ->get();
            return view('admin.category.all_category_product')->with('category_product',$result);
        }
    }
}
