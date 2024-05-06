@extends('layout')
@section('features')
<div class="col-sm-9 padding-right">
    <div class="features_items"><!--features_items-->
        <h2 class="title text-center">Features Items</h2>
        @foreach($product as $key => $pro)
        <a href="{{URL::to('show-detail-product/'.$pro->product_id)}}">
        <div class="col-sm-4">
            <div class="product-image-wrapper">
                <div class="single-products">
                        <div class="productinfo text-center">
                            <img style="width: 150px; height: 150px;" src="{{URL::to('resources/images/image_product/'.$pro->product_img)}}" alt="" />
                            <h2>{{$pro->product_price}}$</h2>
                            <p>{{$pro->product_name}}</p>
                            <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                        </div>
                        <!-- <div class="product-overlay">
                            <div class="overlay-content">
                                <h2>$56</h2>
                                <p>Easy Polo Black Edition</p>
                                <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                            </div>
                        </div> -->
                </div>
                <div class="choose">
                    <!-- <ul class="nav nav-pills nav-justified">
                        <li><a href="#"><i class="fa fa-plus-square"></i>Add to wishlist</a></li>
                        <li><a href="#"><i class="fa fa-plus-square"></i>Add to compare</a></li>
                    </ul> -->
                </div>
            </div>
        </div>
        </a>
        @endforeach
    </div><!--features_items-->
    
@endsection