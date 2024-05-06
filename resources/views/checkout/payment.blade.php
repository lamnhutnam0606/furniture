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
			

			
			<div class="review-payment">
				<h2>Review & Payment</h2>
			</div>
            <div class="table-responsive cart_info">
			
				<table class="table table-condensed">
					<thead>
						<tr class="cart_menu">
							<td class="image">Item</td>
							<td class="description"></td>
							<td class="price">Price</td>
							<td class="quantity">Quantity</td>
							<td class="total">Total</td>
							<td></td>
						</tr>
					</thead>
					
					<tbody>
						<?php
							$totalsubtotal = 0;
						?>
						{{csrf_field()}}
						@if(session('cart'))
                        @foreach(session('cart') as $product_id => $details)
						<tr rowId="{{$product_id}}">
							<td data-th="Product">
								<a href=""><img style="width: 70px; height: 70px;" src="{{asset('resources/images/image_product/'.$details['image'])}}" alt=""></a>
							</td>
							<td class="cart_description">
								<h4><a href=""></a>{{$details['name']}}</h4>
								<p></p>
							</td>
							<td data-th="Price">
								<p>${{$details['price']}}</p>
							</td>
							<td class="cart_quantity">
								<div class="cart_quantity_button">
									<input max="999"  name="cart_qty[{{$product_id}}]" type="number" style="width: 50px;" value="{{$details['qty']}}"/>
									
								</div>
							</td>
							<td data-th="Subtotal">
								<?php
									
									$total = $details['price']*$details['qty'];
									$totalsubtotal += $total;
								?>
								<p class="cart_total_price">${{number_format($total,0,',','.')}}</p>
							</td>
							<td class="actions">
								<a class="btn btn-outline-danger btn-sm delete-cart-product"  href=""><i class="fa fa-times"></i></a>
							</td>
						</tr>
                        @endforeach
						@endif
						
					</tbody>
					
				</table>
				<!-- delivery -->
				<div class="col-sm-3">
					<form >
					@csrf
					<div class="form-group">
						<label for="exampleInputFile">Choose the city</label>
						<select class="form-control input-sm m-bot15 choose city" name="name_city" id="name_city">
							<option disabled selected value="">Choose the city</option>
							@foreach($city as $key => $ci)
								<option value="{{$ci->city_id}}">{{$ci->city_name}}</option>
							@endforeach
							
						</select>
					</div>
					<div class="form-group">
						<label for="exampleInputFile">Choose the District</label>
						<select class="form-control input-sm m-bot15 district choose" name="name_district" id="name_district">
							<option value="">--choose district--</option>
						</select>
					</div>
					<div class="form-group">
						<label for="exampleInputFile">Choose the Wards</label>
						<select class="form-control input-sm m-bot15  wards" name="name_wards" id="name_wards">
							<option value="">--choose wards--</option>
							
						</select>
					</div>
					<input type="button" value="Shipping fee charged" name="calculate_order" class="btn btn-primary btn-sm calculate_delivery">
					</form>
					
				</div>
				<form action="{{URL::to('/check-coupon')}}" method="post">
				{{csrf_field()}}
				<div class="col-sm-4">
					<div class="total_area">
						<ul>
							<li>
							<span style="float: left;">Enter discount code here</span>
							</li>
						</ul>
						<ul>
							<li>
								<input type="text" name="coupon_check" id="coupon">
							</li>
							<input style="margin-left: 0px;" type="submit" value="Check" class="btn btn-default check_out">
						</ul>
						
					</div>
				</div>
				</form>
				<div class="col-sm-5">
					<div class="total_area">
						<ul>
							<li>SubTotal <span>${{number_format($totalsubtotal,0,',','.')}}</span></li>
							<li>Eco Tax <span>$0</span></li>
							<li>Shipping Cost <span>
								@if(Session::get('fee'))
									${{Session::get('fee')}}
								@endif
							</span></li>
							<li>Discount<span>
								@if(Session::get('coupon'))
									@foreach(Session::get('coupon') as $key => $cou)
										@if($cou['coupon_type'] == 1)
											{{$cou['coupon_value']}}%
										@else
											${{number_format($cou['coupon_value'],0,',','.')}}
										@endif
									@endforeach
								@endif
							</span></li>
							<li>Amount is reduced <span>
								@if(Session::get('coupon'))
									@if(Session::get('fee'))
										@foreach(Session::get('coupon') as $key => $cou)
											@if($cou['coupon_type'] == 1)
												${{number_format(($cou['coupon_value']*$totalsubtotal/100)+Session::get('fee'),0,',','.')}}
											@else
												${{number_format($cou['coupon_value']+Session::get('fee'),0,',','.')}}
											@endif
										@endforeach
									@else
										@foreach(Session::get('coupon') as $key => $cou)
											@if($cou['coupon_type'] == 1)
												${{number_format(($cou['coupon_value']*$totalsubtotal/100),0,',','.')}}
											@else
												${{number_format($cou['coupon_value'],0,',','.')}}
											@endif
										@endforeach
									@endif
								@elseif(Session::get('fee'))
									${{number_format(Session::get('fee'),0,',','.')}}
								@else
									$0
								@endif
							</span></li>
							<li>Total <span>
								@if(Session::get('coupon'))
									@foreach(Session::get('coupon') as $key => $cou)
										@if($cou['coupon_type'] == 1)
											${{number_format($totalsubtotal-($cou['coupon_value']*$totalsubtotal/100)-Session::get('fee'),0,',','.')}}
										@else
											${{number_format($totalsubtotal-$cou['coupon_value']-Session::get('fee'),0,',','.')}}
										@endif
									@endforeach
								@endif
							</span></li>
							</ul> 
							<!-- <a type="button" class="btn btn-default update" href="">Update</a> -->
							<!-- <button class="btn btn-default update" >update</button> -->
				
							
						</div>
			
		</div>
		<!-- coupon -->
		
		
		
		<!--method payment  -->
		<form action="{{URL::to('/order-place')}}" method="post">
			{{ csrf_field() }}
			
		<div style="padding-left: 271px;" class=" col-sm-7">
		<label style="color: gray;">Select a payment method</label><br>	
			<select name="payment_option" class="form-control input-sm m-bot15  wards" name="name_wards" id="name_wards">
				<option name="payment_option" value="1">Cash</option>
				<option name="payment_option" value="2">ATM Card</option>
				<option name="payment_option" value="3">Credit Card</option>
			</select>
			
			
		</div>
		<button style="width: 100px; margin-left: 55px;" class="btn btn-primary col-sm-7 btn-sm">Payment</button>
		</form>
				
	</section> <!--/#cart_items
    @endsection