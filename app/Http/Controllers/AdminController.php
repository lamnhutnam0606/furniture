<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Social;
use App\Rules\Captcha;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Validator;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Laravel\Socialite\Facades\Socialite;

session_start();
class AdminController extends Controller
{
    public function login_facebook(){
        return Socialite::driver('facebook')->redirect();
    }
    // public function callback_facebook(){
    //     $provider = Socialite::driver('facebook')->user();
    //     $account = Social::where('provider','facebook')->where('provider_user_id',$provider->getId())->first();
    //     if($account){
    //         $account_name = Admin::where('admin_id',$account->user)->first();
    //         Session::put('admin_email',$account_name->admin_email);
    //         Session::put('admin_id',$account_name->admin_id);
    //         return Redirect::to('/dashboard')->with('massages','Login Successfull!');
    //     }else{
    //         $nam = new Social([
    //             'provider_user_id' => $provider->getId(),
    //             'provider' => 'facebook'
    //         ]);
    //         $orang = Admin::where('admin_email',$provider->getEmail())->first();
    //         if($orang){
    //             $orang = Admin::create([
    //                 'admin_email' => $provider->getEmail(),
    //                 'admin_password' => ''
    //             ]);
    //         }
    //         $nam->login()->associate($orang);
    //         $nam->save();

    //         $account_name = Admin::where('admin_id',$nam->user)->first();
    //         Session::put('admin_email',$nam->admin_email);
    //         Session::put('admin_id',$nam->admin_id);
    //         return Redirect::to('/dashboard')->with('massages','Login successfull!');
    //     }
    // }

    
    public function login_google(){
        // khi chọn đăng nhập bằng google 
        //sẽ hiển thị ra list các tài khoản google của bạn
        return Socialite::driver('google')->redirect();
    }
    public function callback_google(){
        $users = Socialite::driver('google')->user();
        //return $users->getId();    
        $authUser = $this->findOrCreateUser($users,'google');
        if($authUser){
            $account = Admin::where('admin_id',$authUser->user)->first();
            Session::put('admin_name',$account->admin_name);
            Session::put('admin_id',$account->admin_id);
        }
        
        return Redirect::to('/dashboard')->with('messages','Login successfull!');
    }
    public function findOrCreateUser($users,$provider){
        $authUser = Social::where('provider_user_id',$users->id)->first();
        
        if($authUser){
            return $authUser;
        }else{
            $customer_new = new Social([
                'provider_user_id' => $users->id,
                'provider' => strtoupper($provider),
            ]);
            $orang = Admin::where('admin_email',$users->getEmail())->first();
                if(!$orang){
                    $orang = Admin::create([
                        'admin_email'=> $users->email,
                        'admin_name' => $users->name,
                        'admin_password'=>''
        
                    ]);
                }
            $customer_new->admin()->associate($orang);
            $customer_new->save();
            return $customer_new;
        }
        
        
        // $account = Admin::where('admin_id',$nam->user)->first();
        // Session::put('admin_email',$account->admin_email);
        // Session::put('admin_id',$account->admin_id);
        // return Redirect::to('/dashboard')->with('messages','Login successfull!');

    }
    public function AuthLogin(){
        $admin_id = Session::get('admin_id');
        if($admin_id){
            return Redirect::to('/dashboard');
        }
        else{
            return Redirect::to('/admin')->send();
        }
    }
    public function login(){
        return view('admin.admin_login');
    }
    public function index(){
        $this->AuthLogin();
        return view('dashboard');
    }
    
    public function dashboard(Request $request){
        //use controller
            // $email= $request->admin_email;
            // $password= md5($request->admin_Password);
            // $result = DB::table('tbl_admin')->where('admin_email',$email)->where('admin_password',$password)->first();
            // if($result){
            //     Session::put('admin_id',$result->admin_id);
            //     Session::put('admin_email',$result->admin_email);
            //     return Redirect::to('/dashboard');
            // }
            // else{
            //     Session::put('messages','Your email or Password incorect!');
            //     return Redirect::to('/admin');
            // }

        //use model
            // $data = $request->all();
            // $admin_email = $data['admin_email'];
            // $admin_password = md5($data['admin_Password']);
            // $login = Admin::where('admin_email',$admin_email)->where('admin_password',$admin_password)->first();
            // if($login){
            //     Session::put('admin_id',$login->admin_id);
            //     Session::put('admin_name',$login->admin_name);
            //     return Redirect::to('/dashboard');
            // }
            // else{
            //     Session::put('messages','Your email or Password incorect!');
            //     return Redirect::to('/admin');
            // }

        //captcha
        $data = $request->validate([
            //'admin_id' => 'required|email|string|min6|max5', 
            'admin_email' => 'required',
            'admin_password' => 'required',
            'g-recaptcha-response' => 'required',
        ]);
        $admin_email = $data['admin_email'];
        $admin_password = md5($data['admin_password']);
        $login = Admin::where('admin_email',$admin_email)->where('admin_password',$admin_password)->first();
       
        if($login){
            $login_count = $login->count();
            if($login_count>0){
                Session::put('admin_id',$login->admin_id);
                Session::put('admin_name',$login->admin_name);
                return Redirect::to('/dashboard');
            }
        }else{
            Session::put('messages','Your email or Password incorect!');
            return Redirect::to('/admin');
        }
    }
    public function logout(){
        $this->AuthLogin();
        Session::put('admin_id',null);
        Session::put('admin_email',null);
        return Redirect::to('/admin');
    }
   
}
