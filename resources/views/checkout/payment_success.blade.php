@extends('layout')
@section('features')
<section id="cart_items">
		<div class="container">
			<div class="breadcrumbs">
				<ol class="breadcrumb">
				  <li><a href="{{URL::to('/trang-chu')}}">Home</a></li>
				  <li class="active">Payment</li>
				</ol>
			</div><!--/breadcrums-->
            <h1> Successfull {{$op}} payment, Thanks!</h1>
		</div>
	</section> <!--/#cart_items-->
    @endsection