<!--A Design by W3layouts
Author: W3layout
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE html>
<head>
<title>Visitors an Admin Panel Category Bootstrap Responsive Website Template | Login :: w3layouts</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Visitors Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- bootstrap-css -->
<link rel="stylesheet" href="{{asset('resources/css/bootstrap.min.css')}}" >
<!-- //bootstrap-css -->
<!-- Custom CSS -->
<link href="{{asset('resources/css/style.css')}}" rel='stylesheet' type='text/css' />
<link href="{{asset('resources/css/style-responsive.css')}}" rel="stylesheet"/>
<!-- font CSS -->
<link href='//fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,400italic,500,500italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
<!-- font-awesome icons -->
<link rel="stylesheet" href="{{asset('resources/css/font.css')}}" type="text/css"/>
<link href="{{asset('resources/css/font-awesome.css')}}" rel="stylesheet"> 
<!-- //font-awesome icons -->
<script src="{{asset('resources/js/jquery2.0.3.min.js')}}"></script>
</head>
<body>
<div class="log-w3">
<div class="w3layouts-main">
	<h2>Sign In Now</h2>
		<?php
			use Illuminate\Support\Facades\Session;
			$messages = Session::get('messages');
			if($messages){
				echo $messages;
				Session::put('messages',null);
			}
		?>
		<form action="{{URL::to('/login-dashboard')}}" method="post">
			{{ csrf_field()}}
			<input type="email" class="ggg" name="admin_email" placeholder="E-MAIL" required="">
			<input type="password" class="ggg" name="admin_password" placeholder="PASSWORD" required="">
			<span><input type="checkbox" />Remember Me</span>
			<h6><a href="#">Forgot Password?</a></h6>
			<!-- thông báo lỗi cua -->
			
			<!-- đoạn code tạo mã captcha 48-54  thêm script dòng 72-->
			<div class="g-recaptcha" data-sitekey="{{env('CAPTCHA_KEY')}}"></div>
			<br/>
			@if($errors->has('g-recaptcha-response'))
			<span class="invalid-feedback" style="display:block">
				<strong style="font-size: small;">Please complete the recaptcha to submit the form.</strong>
			</span>
			@endif
			
				<div class="clearfix"></div>
				<input type="submit" value="Sign In" name="login">
				
		</form>
		<a href="{{URL::to('/login-facebook')}}">Login facebook |</a>
		<a href="{{URL::to('/login-google')}}"> Login google</a>
		<!-- <p>Don't Have an Account ?<a href="registration.html">Create an account</a></p> -->
</div>
</div>
<script src="{{asset('resources/js/bootstrap.js')}}"></script>
<script src="{{asset('resources/js/jquery.dcjqaccordion.2.7.js')}}"></script>
<script src="{{asset('resources/js/scripts.js')}}"></script>
<script src="{{asset('resources/js/jquery.slimscroll.js')}}"></script>
<script src="{{asset('resources/js/jquery.nicescroll.js')}}"></script>
<!--[if lte IE 8]><script language="javascript" type="text/javascript" src="js/flot-chart/excanvas.min.js"></script><![endif]-->
<script src="{{asset('resources/js/jquery.scrollTo.js')}}"></script>
<script src="https://www.google.com/recaptcha/api.js" async defer></script>
</body>
</html>
