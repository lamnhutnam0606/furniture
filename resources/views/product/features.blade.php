@extends('layout')
@section('features')
<div class="col-sm-9 padding-right">
<div class="recommended_items"><!--recommended_items-->
    <h2 class="title text-center">Discount Collection</h2>
    <div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
            <div class="item active">
            @foreach ($promotion as $key => $prom )
                <div class="col-sm-3">
                    <div class="product-image-wrapper">
                        <div class="single-products">
                            <div class="productinfo text-center">
                            <a href="{{URL::to('show-detail-product-sale/'.$prom->product->product_id)}}">
                                <img style="width: 150px; height:150px;" src="{{URL::to('resources/images/image_product/'.$prom->product->product_img)}}"  alt="" />
                                <div class="logo-dis">
                                    <h4 style="text-align: center ; color: aqua;">{{$prom->campaign_value}}%</h4>
                                </div>
                                <del style="color: grey; padding-bottom: 2px; ">${{number_format($prom->product->product_price,2,'.',',')}}</del>
                                <h2 style="line-height: 0;">${{number_format($prom->product->product_price-(($prom->product->product_price*$prom->campaign_value)/100),2,'.',',')}}</h2>
                                <p>{{$prom->product->product_name}}</p>
                            </a>
                            <form method="post" action="{{URL::to('save-cart/'.$prom->product_id)}}">
                            {{csrf_field()}}
                            @if ($wishlist->contains('product_id', $prom->product_id))
                                <a href="{{URL::to('wishlist-product/'.$prom->product_id)}}">
                                    <img style="width: 25px;" src="{{URL::to('resources/images/icon_love_r.png')}}" alt="">
                                </a>
                            @else
                                <a href="{{URL::to('wishlist-product/'.$prom->product_id)}}">
                                    <img style="width: 25px;" src="{{URL::to('resources/images/icon_love.png')}}" alt="">
                                </a>
                            @endif
                            <button type="submit" class="btn btn-fefault cart">
                                <i class="fa fa-shopping-cart"></i>
                                Add to cart
                            </button>                           
                            </form>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach 
            </div>
            <div class="item">
            @foreach ($promotion as $key => $prom )
                <div class="col-sm-3">
                    <div class="product-image-wrapper">
                        <div class="single-products">
                            <div class="productinfo text-center">
                                <a href="{{URL::to('show-detail-product-sale/'.$prom->product->product_id)}}">
                                    <img style="width: 150px; height:150px;" src="{{URL::to('resources/images/image_product/'.$prom->product->product_img)}}"  alt="" />
                                    <div class="logo-dis">
                                        <h4 style="text-align: center ; color: aqua;">{{$prom->campaign_value}}%</h4>
                                    </div>
                                    <del style="color: grey; padding-bottom: 2px; ">${{number_format($prom->product->product_price,2,'.',',')}}</del>
                                    <h2 style="line-height: 0;">${{number_format($prom->product->product_price-(($prom->product->product_price*$prom->campaign_value)/100),2,'.',',')}}</h2>
                                    <p>{{$prom->product->product_name}}</p>
                                </a>
                                <form method="post" action="{{URL::to('save-cart/'.$prom->product_id)}}">

                                {{csrf_field()}}
                                @if ($wishlist->contains('product_id', $prom->product_id))
                                    <a href="{{URL::to('wishlist-product/'.$prom->product_id)}}">
                                        <img style="width: 25px;" src="{{URL::to('resources/images/icon_love_r.png')}}" alt="">
                                    </a>
                                @else
                                    <a href="{{URL::to('wishlist-product/'.$prom->product_id)}}">
                                        <img style="width: 25px;" src="{{URL::to('resources/images/icon_love.png')}}" alt="">
                                    </a>
                                @endif
                                <button type="submit" class="btn btn-fefault cart">
                                    <i class="fa fa-shopping-cart"></i>
                                    Add to cart
                                </button>                           
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach 
            </div>
        </div>
         <a class="left recommended-item-control" href="#recommended-item-carousel" data-slide="prev">
            <i class="fa fa-angle-left"></i>
          </a>
          <a class="right recommended-item-control" href="#recommended-item-carousel" data-slide="next">
            <i class="fa fa-angle-right"></i>
          </a>			
    </div>
</div><!--/recommended_items-->
<div class="features_items"><!--features_items-->
        <h2 class="title text-center">Collection</h2>
       
       
        @foreach($product as $key => $pro)
       
        
        <div class="col-sm-3">
            <div class="product-image-wrapper">
                <div class="single-products">
                        <div class="productinfo text-center">
                        <a href="{{URL::to('show-detail-product/'.$pro->product_id)}}">
                            <img style="width: 150px; height: 150px;" src="{{URL::to('resources/images/image_product/'.$pro->product_img)}}" alt="" />
                            <h2>${{ number_format($pro->product_price,2,'.',',') }}</h2>
                            <p>{{$pro->product_name}}</p>
                        </a>
                            <form method="post" action="{{URL::to('save-cart/'.$pro->product_id)}}">
                            {{csrf_field()}}
                            @if ($wishlist->contains('product_id', $pro->product_id))
                                <a href="{{URL::to('wishlist-product/'.$pro->product_id)}}">
                                    <img style="width: 25px;" src="{{URL::to('resources/images/icon_love_r.png')}}" alt="">
                                </a>
                            @else
                                <a href="{{URL::to('wishlist-product/'.$pro->product_id)}}">
                                    <img style="width: 25px;" src="{{URL::to('resources/images/icon_love.png')}}" alt="">
                                </a>
                            @endif
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