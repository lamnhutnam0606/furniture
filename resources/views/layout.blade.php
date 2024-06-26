<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Home | MrJunky</title>
    <link href="{{asset('resources/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('resources/css/font-awesome.min.css')}}" rel="stylesheet">
    <link href="{{asset('resources/css/prettyPhoto.css')}}" rel="stylesheet">
    <link href="{{asset('resources/css/price-range.css')}}" rel="stylesheet">
    <link href="{{asset('resources/css/animate.css')}}" rel="stylesheet">
	<link href="{{asset('resources/css/main.css')}}" rel="stylesheet">
	<link href="{{asset('resources/css/responsive.css')}}" rel="stylesheet">
	<link href="{{asset('resources/css/nam.css')}}" rel="stylesheet">
    
	<!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->       
    <link rel="shortcut icon" href="{{asset('resources/images/favicon.ico')}}">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="{{asset('resources/images/apple-touch-icon-144-precomposed.png')}}">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="{{asset('resources/images/apple-touch-icon-114-precomposed.png')}}">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="{{asset('resources/images/apple-touch-icon-72-precomposed.png')}}">
    <link rel="apple-touch-icon-precomposed" href="{{asset('resources/images/apple-touch-icon-57-precomposed.png')}}">
</head><!--/head-->

<body>
	<?php
	use Illuminate\Support\Facades\Session;
	$messages = Session::get('messages');
	if($messages){
		echo '<script language="javascript">';
		echo 'setTimeout(function() { alert("' . $messages . '"); }, 1);';
		echo '</script>';
		Session::put('messages',null);
	}
	?>
	<header id="header"><!--header-->
		<div class="header_top"><!--header_top-->
			<div class="container">
				<div class="row">
					<div class="col-sm-6">
						<div class="contactinfo">
							<ul class="nav nav-pills">
								<li><a href="#"><i class="fa fa-phone"></i> +2 95 01 88 821</a></li>
								<li><a href="#"><i class="fa fa-envelope"></i> furniture@weblaravel.com</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-6">
						<div class="social-icons pull-right">
							<ul class="nav navbar-nav">
								<li><a href="https://www.facebook.com/"><i class="fa fa-facebook"></i></a></li>
								<li><a href="https://twitter.com/"><i class="fa fa-twitter"></i></a></li>
								<li><a href="#"><i class="fa fa-dribbble"></i></a></li>
								<li><a href="https://www.google.com/"><i class="fa fa-google-plus"></i></a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div><!--/header_top-->
		
		<div class="header-middle"><!--header-middle-->
			<div class="container">
				<div class="row">
					<div class="col-sm-4">
						<div class="logo pull-left">
							<a href="{{URL::to('/trang-chu')}}"><img style="height: 90px; width: 100px;" src="{{asset('resources/images/logoshop.jpg')}}" alt="" /></a>
						</div>
						<div class="btn-group pull-right">
							<!-- <div class="btn-group">
								<button type="button" class="btn btn-default dropdown-toggle usa" data-toggle="dropdown">
									USA
									<span class="caret"></span>
								</button>
								<ul class="dropdown-menu">
									<li><a href="#">Canada</a></li>
									<li><a href="#">UK</a></li>
								</ul>
							</div> -->
							
							<!-- <div class="btn-group">
								<button type="button" class="btn btn-default dropdown-toggle usa" data-toggle="dropdown">
									DOLLAR
									<span class="caret"></span>
								</button>
								<ul class="dropdown-menu">
									<li><a href="#">Canadian Dollar</a></li>
									<li><a href="#">Pound</a></li>
								</ul>
							</div> -->
						</div>
					</div>
					<div class="col-sm-8">
						<div class="shop-menu pull-right">
							<ul class="nav navbar-nav">
								<!-- <li><a href="{{URL::to('/login-checkout')}}"><i class="fa fa-user"></i> Account</a></li> -->
								<li><a href="{{URL::to('/wishlist')}}"><i><img src="{{URL::to('resources/images/icon_love.png')}}" style="width: 14px;;" alt=""></i> Wishlist</a></li>
								<?php
									$customer_id = Session::get('customer_id');
									$shipping_id = Session::get('shipping_id');
									if($customer_id && $shipping_id){
								?>
								<li><a href="{{URL::to('/payment')}}"><i class="fa fa-lock"></i>Checkout</a></li>
								<?php
									}elseif($customer_id && !$shipping_id){
								?>
								<li><a href="{{URL::to('/checkout')}}"><i class="fa fa-lock"></i>Checkout</a></li>
								<?php
									}else{
								?>
								<li><a href="{{URL::to('/login-checkout')}}"><i class="fa fa-lock"></i>Checkout</a></li>
								<?php
									}
								?>
								<li><a href="{{URL::to('/show-cart')}}"><i class="fa fa-shopping-cart"></i> Cart <span style="color:#FE980F;" class="badge bg-danger"><i>{{count((array) session('cart'))}}</i></span></a></li>
								<?php
									$customer_id = Session::get('customer_id');
									if($customer_id){
								?>
								<li><a href="{{URL::to('/logout-checkout')}}"><i class="fa fa-lock"></i> Logout</a></li>
								<?php
									}else{
								?>
								<li><a href="{{URL::to('/login-checkout')}}"><i class="fa fa-lock"></i> Login</a></li>
								<?php
									}
								?>
								
								
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div><!--/header-middle-->
	
		<div class="header-bottom"><!--header-bottom-->
			<div class="container">
				<div class="row">
					<div class="col-sm-9">
						<div class="navbar-header">
							<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
								<span class="sr-only">Toggle navigation</span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</button>
						</div>
						<div class="mainmenu pull-left">
							<ul class="nav navbar-nav collapse navbar-collapse">
								<li><a href="{{URL::to('/trang-chu')}}" class="active">Home</a></li>
								<li class="dropdown"><a href="#">Shop<i class="fa fa-angle-down"></i></a>
                                    <ul role="menu" class="sub-menu">
                                        <li><a href="shop.html">Products</a></li>
										<li><a href="product-details.html">Product Details</a></li> 
										<li><a href="checkout.html">Checkout</a></li> 
										<li><a href="cart.html">Cart</a></li> 
										<li><a href="login.html">Login</a></li> 
                                    </ul>
                                </li> 
								<li class="dropdown"><a href="#">Blog<i class="fa fa-angle-down"></i></a>
                                    <ul role="menu" class="sub-menu">
                                        <li><a href="blog.html">Blog List</a></li>
										<li><a href="blog-single.html">Blog Single</a></li>
                                    </ul>
                                </li> 
								<li><a href="404.html">404</a></li>
								<li><a href="contact-us.html">Contact</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-3">
						<div style="padding-bottom: 10px;" class="search_box pull-right">
							<form action="{{URL::to('/search-product')}}" method="post">
								{{csrf_field()}}
								<input type="text" name="search_product" id="search_product" placeholder="Search"/>
								<button name="search" type="submit">
									<img style="width: 31.5px;" src="{{URL::to('resources/images/icon_search.png')}}" alt="">
								</button>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div><!--/header-bottom-->
	</header><!--/header-->
	
	<section id="slider"><!--slider-->
		<div class="container">
			<div class="row">
				<div class="col-sm-12">
					<div id="slider-carousel" class="carousel slide" data-ride="carousel">
						<ol class="carousel-indicators">
							<li data-target="#slider-carousel" data-slide-to="0" class="active"></li>
							<li data-target="#slider-carousel" data-slide-to="1"></li>
							<li data-target="#slider-carousel" data-slide-to="2"></li>
						</ol>
						
						<div class="carousel-inner">
							<div class="item active">
								<div class="col-sm-6">
									<h1><span>MrJunky</span>-Furniture</h1>
									<h2>Free E-Commerce Template</h2>
									<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </p>
									<button type="button" class="btn btn-default get">Get it now</button>
								</div>
								<div class="col-sm-6">
									<img style="height: 300px; width: 450px;" src="{{asset('resources/images/div1.jpg')}}" class="girl img-responsive" alt="" />
									<img style="height: 200px; width: 350px;" src="{{asset('resources/images/div1.1.jpeg')}}"  class="pricing" alt="" />
								</div>
							</div>
							<div class="item">
								<div class="col-sm-6">
									<h1><span>MrJunky</span>-Furniture</h1>
									<h2>100% Responsive Design</h2>
									<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </p>
									<button type="button" class="btn btn-default get">Get it now</button>
								</div>
								<div class="col-sm-6">
									<img style="height: 350px;width: 450px;" src="{{asset('resources/images/div2.jpg')}}" class="girl img-responsive" alt="" />
									<img src="images/home/pricing.png"  class="pricing" alt="" />
								</div>
							</div>
							
							<div class="item">
								<div class="col-sm-6">
									<h1><span>MrJunky</span>-Furniture</h1>
									<h2>Free Ecommerce Template</h2>
									<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </p>
									<button type="button" class="btn btn-default get">Get it now</button>
								</div>
								<div class="col-sm-6">
									<img style="height: 250px;width: 450px;" src="{{asset('resources/images/div3.jpg')}}" class="girl img-responsive" alt="" />
									<img style="height: 200px;width: 350px;" src="{{asset('resources/images/div3.1.jpg')}}" class="pricing" alt="" />
								</div>
							</div>
							
						</div>
						
						<a href="#slider-carousel" class="left control-carousel hidden-xs" data-slide="prev">
							<i class="fa fa-angle-left"></i>
						</a>
						<a href="#slider-carousel" class="right control-carousel hidden-xs" data-slide="next">
							<i class="fa fa-angle-right"></i>
						</a>
					</div>
					
				</div>
			</div>
		</div>
	</section><!--/slider-->
	
	<section>
		<div class="container">
			<div class="row">
				<div class="col-sm-3">
					<div class="left-sidebar">
						<h2>Category</h2>
						<div class="panel-group category-products" id="accordian"><!--category-productsr-->
						@foreach($category_product as $key => $cate)	
						<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title">
										<li><a href="{{URL::to('show-product-category/'.$cate->category_id)}}"> <span class="pull-right">(50)</span>{{$cate->category_name}}</a></li>
									</h4>
								</div>
								<!-- <div id="sportswear" class="panel-collapse collapse">
									<div class="panel-body">
										<ul>
											<li><a href="#">Nike </a></li>
											<li><a href="#">Under Armour </a></li>
											<li><a href="#">Adidas </a></li>
											<li><a href="#">Puma</a></li>
											<li><a href="#">ASICS </a></li>
										</ul>
									</div>
								</div> -->
							</div>
							@endforeach
						</div><!--/category-products-->
						
						<div class="brands_products"><!--brands_products-->
							<h2>Brands</h2>
							<div class="brands-name">
								@foreach($brand_product as $key => $brand)
									<ul class="nav nav-pills nav-stacked">
										<li><a href="{{URL::to('show-product-brand/'.$brand->brand_id) }}"> <span class="pull-right">(50)</span>{{$brand->brand_name}}</a></li>
									</ul>
								@endforeach
							</div>
							
						</div><!--/brands_products-->
						
						<div class="price-range"><!--price-range-->
							<h2>Price Range</h2>
							<div class="well text-center">
								<form action="{{URL::to('/price-range')}}" method="post">
								{{ csrf_field() }}
								<?php
									$start_price = Session::get('start_price');
									$end_price = Session::get('end_price');
									if($start_price && $end_price){
										
								?>
								<input type="text" class="span2" value="[{{$start_price}},{{$end_price}}]" name="price_range" data-slider-min="100" data-slider-max="3000" data-slider-step="5" data-slider-value="[{{$start_price}},{{$end_price}}]" id="sl2" ><br />


								<?php
									}else{
								?> 
								<input type="text" class="span2" value="" name="price_range" data-slider-min="100" data-slider-max="3000" data-slider-step="5" data-slider-value="[100,3000]" id="sl2" ><br /> 

								<?php
									}
								?>
								<!-- @if(Session::get('start_price') && Session::get('end_price')) -->
								<!-- @else -->
								<!-- @endif -->
								<b class="pull-left">$ 100</b> <b class="pull-right">$ 3000</b>
								<button style="color: white;padding: 2px; margin-top: 20px; margin-bottom: 0px; background-color: #FE980F; border : none" type="submit">search</button>
								</form>
							</div>
						</div><!--/price-range-->
					</div>
				</div>
				<!-- Features item -->

				@yield('features')

					
					
					
					
				</div>
			</div>
		</div>
	</section>
	
	<footer id="footer"><!--Footer-->
		<div class="footer-top">
			<div class="container">
				<div class="row">
					<div class="col-sm-2">
						<div class="companyinfo">
							<h2><span>Mr</span>-Junky</h2>
							<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit,sed do eiusmod tempor</p>
						</div>
					</div>
					<div class="col-sm-7">
						<div class="col-sm-3">
							<div class="video-gallery text-center">
								<a href="#">
									<div class="iframe-img">
										<img src="images/home/iframe1.png" alt="" />
									</div>
									<div class="overlay-icon">
										<i class="fa fa-play-circle-o"></i>
									</div>
								</a>
								<p>Circle of Hands</p>
								<h2>24 DEC 2014</h2>
							</div>
						</div>
						
						<div class="col-sm-3">
							<div class="video-gallery text-center">
								<a href="#">
									<div class="iframe-img">
										<img src="images/home/iframe2.png" alt="" />
									</div>
									<div class="overlay-icon">
										<i class="fa fa-play-circle-o"></i>
									</div>
								</a>
								<p>Circle of Hands</p>
								<h2>24 DEC 2014</h2>
							</div>
						</div>
						
						<div class="col-sm-3">
							<div class="video-gallery text-center">
								<a href="#">
									<div class="iframe-img">
										<img src="images/home/iframe3.png" alt="" />
									</div>
									<div class="overlay-icon">
										<i class="fa fa-play-circle-o"></i>
									</div>
								</a>
								<p>Circle of Hands</p>
								<h2>24 DEC 2014</h2>
							</div>
						</div>
						
						<div class="col-sm-3">
							<div class="video-gallery text-center">
								<a href="#">
									<div class="iframe-img">
										<img src="resources/images/iframe4.png" alt="" />
									</div>
									<div class="overlay-icon">
										<i class="fa fa-play-circle-o"></i>
									</div>
								</a>
								<p>Circle of Hands</p>
								<h2>24 DEC 2014</h2>
							</div>
						</div>
					</div>
					<div class="col-sm-3">
						<div class="address">
							<img src="images/home/map.png" alt="" />
							<p>505 S Atlantic Ave Virginia Beach, VA(Virginia)</p>
						</div>
					</div>
				</div>
			</div>
		</div>
		
		<div class="footer-widget">
			<div class="container">
				<div class="row">
					<div class="col-sm-2">
						<div class="single-widget">
							<h2>Service</h2>
							<ul class="nav nav-pills nav-stacked">
								<li><a href="#">Online Help</a></li>
								<li><a href="#">Contact Us</a></li>
								<li><a href="#">Order Status</a></li>
								<li><a href="#">Change Location</a></li>
								<li><a href="#">FAQs</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-2">
						<div class="single-widget">
							<h2>Quock Shop</h2>
							<ul class="nav nav-pills nav-stacked">
								<li><a href="#">T-Shirt</a></li>
								<li><a href="#">Mens</a></li>
								<li><a href="#">Womens</a></li>
								<li><a href="#">Gift Cards</a></li>
								<li><a href="#">Shoes</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-2">
						<div class="single-widget">
							<h2>Policies</h2>
							<ul class="nav nav-pills nav-stacked">
								<li><a href="#">Terms of Use</a></li>
								<li><a href="#">Privecy Policy</a></li>
								<li><a href="#">Refund Policy</a></li>
								<li><a href="#">Billing System</a></li>
								<li><a href="#">Ticket System</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-2">
						<div class="single-widget">
							<h2>About Shop</h2>
							<ul class="nav nav-pills nav-stacked">
								<li><a href="#">Company Information</a></li>
								<li><a href="#">Careers</a></li>
								<li><a href="#">Store Location</a></li>
								<li><a href="#">Affillate Program</a></li>
								<li><a href="#">Copyright</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-3 col-sm-offset-1">
						<div class="single-widget">
							<h2>About Shop</h2>
							<form action="#" class="searchform">
								<input type="text" placeholder="Your email address" />
								<button type="submit" class="btn btn-default"><i class="fa fa-arrow-circle-o-right"></i></button>
								<p>Get the most recent updates from <br />our site and be updated your self...</p>
							</form>
						</div>
					</div>
					
				</div>
			</div>
		</div>
		
		<div class="footer-bottom">
			<div class="container">
				<div class="row">
					<p class="pull-left">Copyright © 2013 E-SHOPPER Inc. All rights reserved.</p>
					<p class="pull-right">Designed by <span><a target="_blank" href="http://www.themeum.com">Themeum</a></span></p>
				</div>
			</div>
		</div>
		
	</footer><!--/Footer-->
	

  
    <script src="{{asset('resources/js/jquery.js')}}"></script>
	<script src="{{asset('resources/js/bootstrap.min.js')}}"></script>
	<script src="{{asset('resources/js/jquery.scrollUp.min.js')}}"></script>
	<script src="{{asset('resources/js/price-range.js')}}"></script>
    <script src="{{asset('resources/js/jquery.prettyPhoto.js')}}"></script>
    <script src="{{asset('resources/js/main.js')}}"></script>
	<script src="https://www.google.com/recaptcha/api.js" async defer></script>
	<script src="https://cdn.jsdelivr.net/npm/jquery@3.7.0/dist/jquery.min.js" async defer></script>
	@yield('scripts')
	
</body>
</html>
<script type="text/javascript">
	$(document).ready(function(){
		$('.choose').on('change',function(){
		var action = $(this).attr('id');
		var id = $(this).val();
		var _token = $('input[name="_token"]').val();
		var result = '';
		if(action == 'name_city'){
			result = 'name_district';
		}else{
			result = 'name_wards';
		}
		$.ajax({
			url: '{{ url("/select-delivery-layout") }}',
			method : 'POST',
			data:{action:action,id:id,_token:_token},
			success:function(data){
				$('#'+result).html(data);
			}
		});
        });
	});
</script>
<script type="text/javascript">
	$(document).ready(function(){
		$('.calculate_delivery').click(function(){
			
			var city_id = $('.city').val();
			var district_id = $('.district').val();
			var wards_id = $('.wards').val();
			var _token = $('input[name="_token"]').val();
			
			if(city_id == '' && district_id=='' && wards_id==''){
					alert('Please select the City/Province/Wards to calculate the conversion fee');
			
			}else{
				$.ajax({
					url: '{{ url("/calculate-fee") }}',
					method : 'POST',
					data:{city_id:city_id,district_id:district_id,wards_id:wards_id,_token:_token},
					success:function(data){
						alert('Additional shipping costs successfully');
						location.reload();
						$('#'+result).text(data);
					}
				});
			}
			
		});
	});
</script>