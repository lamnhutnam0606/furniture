@extends('layout')
@section('features')
<section id="form"><!--form-->
    <div class="container">
        <div class="row">
            <div class="col-sm-4 col-sm-offset-1">
                <div class="login-form"><!--login form-->
                    <h2>Login to your account</h2>
                    <?php
                        use Illuminate\Support\Facades\Session;
                        $err = Session::get('error');
                        if($err){
                            echo $err;
                            Session::put('error',null);
                        }
                    ?>
                    <form action="{{URL::to('/user-signin')}}" method="post">
                        {{ csrf_field()}}
                        <input type="text" name="user_name_signin" placeholder="User name" />
                        <input type="password" name="user_pass_signin" placeholder="Password" />
                        <span>
                            <input type="checkbox" class="checkbox"> 
                            Keep me signed in
                        </span>
                        <button type="submit" class="btn btn-default">Login</button>
                    </form>
                </div><!--/login form-->
            </div>
            <div class="col-sm-1">
                <h2 class="or">OR</h2>
            </div>
            <div class="col-sm-4">
                <div class="signup-form"><!--sign up form-->
                    <h2>New User Signup!</h2>
                    <form action="{{URL::to('/user-signup')}}" method="post">
                        {{ csrf_field() }}
                        <input type="text" name="user_name_signup" placeholder="Name"/>
                        <input type="password" name="user_pass_signup" placeholder="Password"/>
                        <input type="email" name="user_email_signup" placeholder="Email Address"/>
                        <input type="text" name="user_phone_signup" placeholder="Phone"/>
                        <button type="submit"  class="btn btn-default">Signup</button>
                    </form>
                </div><!--/sign up form-->
            </div>
        </div>
    </div>
</section><!--/form-->
@endsection