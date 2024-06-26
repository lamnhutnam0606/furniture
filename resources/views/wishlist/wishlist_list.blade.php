@extends('layout')
@section('features')
<div class="col-sm-9 padding-right">
<div class="features_items"><!--features_items-->
        <h2 class="title text-center">Wishlist</h2>
        @foreach($wishlist as $key => $wish)
        <div class="col-sm-3">
            <div class="product-image-wrapper">
                <div class="single-products">
                        <div class="productinfo text-center">
                        <a href="{{URL::to('show-detail-product/'.$wish->product_id)}}">
                            <img style="width: 150px; height: 150px;" src="{{URL::to('resources/images/image_product/'.$wish->product->product_img)}}" alt="" />
                            <h2>${{ number_format($wish->product->product_price,2,'.',',') }}</h2>
                            <p>{{$wish->product->product_name}}</p>
                        </a>
                            <form method="post" action="{{URL::to('save-cart/'.$wish->product_id)}}">
                            {{csrf_field()}}
                            <a href="{{URL::to('wishlist-product-delete/'.$wish->wishlist_id)}}">
                                <img style="width: 25px;" src="{{URL::to('resources/images/icon_love_r.png')}}" alt="">
                            </a>
                            <button type="submit" class="btn btn-fefault cart">
                                <i class="fa fa-shopping-cart"></i>
                                Add to cart
                            </button>                           
                            </form>
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
        
        @endforeach
    </div><!--features_items-->
    
    
    
    
    
@endsection