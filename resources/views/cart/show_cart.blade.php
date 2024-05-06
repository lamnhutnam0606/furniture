@extends('layout')
@section('features')
<section id="cart_items">

		<div class="container">
			<div class="breadcrumbs">
				<ol class="breadcrumb">
				  <li><a href="{{URL::to('/')}}">Home</a></li>
				  <li class="active">Shopping Cart</li>
				</ol>
			</div>
			
			<div class="table-responsive cart_info">
				<form action="{{URL::to('/update-qty-cart')}}" method="post">
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
									<input max="999" name="cart_qty[{{$product_id}}]" type="number" min="1" value="{{$details['qty']}}"/>
									
								</div>
							</td>
							<td data-th="Subtotal">
								<?php
									
									$total = $details['price']*$details['qty'];
									$totalsubtotal += $total;
								?>
								<p class="cart_total_price">${{$total}}</p>
							</td>
							<td class="actions">
								<a class="btn btn-outline-danger btn-sm delete-cart-product"  href=""><i class="fa fa-times"></i></a>
							</td>
						</tr>
                        @endforeach
						@endif
					</tbody>
				</table>
				<!-- <div class="col-sm-5">
					<div class="total_area">
						<ul>
							<li>SubTotal <span>${{$totalsubtotal}}</span></li>
							<li>Eco Tax <span>$0</span></li>
							<li>Shipping Cost <span>Free</span></li>
							<li>Discount<span>
								@if(Session::get('coupon'))
									@foreach(Session::get('coupon') as $key => $cou)
										@if($cou['coupon_type'] == 1)
											{{$cou['coupon_value']}}%
										@else
											{{number_format($cou['coupon_value'],0,',','.')}}$
										@endif
									@endforeach
								@endif
							</span></li>
							<li>Amount is reduced <span>
								@if(Session::get('coupon'))
									@foreach(Session::get('coupon') as $key => $cou)
										@if($cou['coupon_type'] == 1)
											{{number_format($cou['coupon_value']*$totalsubtotal/100,0,',','.')}}$
										@else
											{{number_format($cou['coupon_value'],0,',','.')}}$
										@endif
									@endforeach
								@endif
							</span></li>
							<li>Total <span>
								@if(Session::get('coupon'))
									@foreach(Session::get('coupon') as $key => $cou)
										@if($cou['coupon_type'] == 1)
											{{number_format($totalsubtotal-($cou['coupon_value']*$totalsubtotal/100),0,',','.')}}$
										@else
											{{number_format($totalsubtotal-$cou['coupon_value'],0,',','.')}}$
										@endif
									@endforeach
								@endif
							</span></li>
							</ul>
							 <a type="button" class="btn btn-default update" href="">Update</a> -->
							<button class="btn btn-default update" >update</button>
							<?php
									use Illuminate\Support\Facades\Session;
									Session::put('totalsubtotal',$totalsubtotal);
									$customer_id = Session::get('customer_id');
									$shipping_id = Session::get('shipping_id');
									if($customer_id && $shipping_id){
								?>
								<a class="btn btn-default check_out" href="{{URL::to('/payment')}}">Check Out</a>
								<?php
									}elseif($customer_id && !$shipping_id){
								?>
								<a class="btn btn-default check_out" href="{{URL::to('/checkout')}}">Check Out</a>
								<?php
									}else{
								?>
								<a class="btn btn-default check_out" href="{{URL::to('/login-checkout')}}">Check Out</a>
								<?php
									}
								?>		
					</div>
				</div> 
				</form>
				<!-- coupon -->
				<!-- <form action="{{URL::to('/check-coupon')}}" method="post">
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
							<input type="submit" value="Check" class="btn btn-default check_out">
						</ul>
						
					</div>
				</div>
				</form> -->
				<!-- subtotal -->
				
				
			</div>
		</div>
		
	</section> <!--/#cart_items-->
    
@endsection
@section('scripts')
<script type="text/javascript">
	$(".delete-cart-product").click(function(e){
		e.preventDefault();
		var ele = $(this)
		if(confirm('Do you really want to delete?')){
			$.ajax({
				url: '{{url("/delete-cart")}}',
				method: "DELETE",
				data:{
					_token: '{{ csrf_token() }}',
					product_id: ele.parents('tr').attr("rowId")
				},
				success: function (response){
					window.location.reload();
				}
			});
		}
	});

	// $(".update-cart-product").click(function(e){
	// 	e.preventDefault();
	// 	var ele =$(this)
	// 	var quantity = ele.parents('tr').find("input[name='quantity']").val();
	// 	$.ajax({
	// 		url: '{{url('/update-qty-cart')}}',
	// 		method: "PATCH",
	// 		data:{
	// 			_token: '{{ csrf_token()}}',
	// 			product_id: ele.parents('tr').attr("rowId"),
	// 			quantity: quantity
	// 		},
	// 		success: function(response){
	// 			window.location.reload();
	// 		}
	// 	});
		
	// });

</script>
@endsection