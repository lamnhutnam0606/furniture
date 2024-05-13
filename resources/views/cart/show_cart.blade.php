@extends('layout')
@section('features')
<div class="table-responsive">
	<div class="breadcrumbs">
		<ol class="breadcrumb">
		<li><a href="{{URL::to('/')}}">Home</a></li>
		<li class="active">Shopping Cart</li>
		</ol>
	</div>
	<div class="table-cart-up">
	<form action="{{URL::to('/update-qty-cart')}}" method="post">
				{{csrf_field()}}
        <table style="width: 100%; padding-top: 10px;" class="table-bordered">
          <thead>
            <tr>
				<td style="text-align: center; color: #FE980F; font-size:medium;"><b>Item</b></td>
				<td style="text-align: center; color: #FE980F; font-size:medium;"></td>
				<td style="text-align: center; color: #FE980F; font-size:medium;"><b>Price</b></td>
				<td style="text-align: center; color: #FE980F; font-size:medium;"><b>Quantity</b></td>
				<td style="text-align: center; color: #FE980F; font-size:medium;"><b>Total</b></td>
				<td></td>
              
            </tr>
          </thead>
          <tbody >
            @php
                $totalsubtotal = 0;
            @endphp
          	@if(session('cart'))
            @foreach(session('cart') as $product_id => $details)
            <tr rowId="{{$product_id}}">
			<td data-th="Product">
								<a href=""><img style="width: 80px; height: 70px; margin-left: 10px; margin-top: 5px;" src="{{asset('resources/images/image_product/'.$details['image'])}}" alt=""></a>
							</td>
							<td class="cart_description">
								<h4 style="padding-left: 5px;"><a href=""></a>{{$details['name']}}</h4>
								<p></p>
							</td>
							<td data-th="Price">
								<p>${{number_format($details['price'],2,'.',',')}}</p>
							</td>
							<td class="cart_quantity">
								<div class="cart_quantity_button">
									<input style="text-align: center; margin-left: 5px;" max="99" name="cart_qty[{{$product_id}}]" type="number" min="1" value="{{$details['qty']}}"/>
									
								</div>
							</td>
							<td data-th="Subtotal">
								<?php
									
									$total = $details['price']*$details['qty'];
									$totalsubtotal += $total;
								?>
								<p style="font-size: medium;" class="cart_total_price">${{number_format($total,2,'.',',')}}</p>
							</td>
							<td class="actions">
								<a class="btn btn-outline-danger btn-sm delete-cart-product"  href=""><i class="fa fa-times"></i></a>
							</td>
            </tr>
           @endforeach
		   @endif
          </tbody>
        </table>
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
		</div>
      </div>
    
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





