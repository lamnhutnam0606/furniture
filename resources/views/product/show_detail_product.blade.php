@extends('layout')
@section('features')
@foreach($product as $key => $pro)

<div class="product-details"><!--product-details-->
    <div class="col-sm-5">
        <div class="view-product">
            <img style="height: 250px; width: 250px;" src="{{URL::to('resources/images/image_product/'.$pro->product_img)}}" alt="" />
            <h3>ZOOM</h3>
        </div>
        <div id="similar-product" class="carousel slide" data-ride="carousel">
            
              <!-- Wrapper for slides -->
                <div class="carousel-inner">
                    <div class="item active">
                      <a href=""><img style="height:70px ; width: 80px;" src="{{asset('resources/images/div1.jpg')}}" alt=""></a>
                      <a href=""><img style="height:70px ; width: 80px;" src="{{asset('resources/images/div2.jpg')}}" alt=""></a>
                      <a href=""><img style="height:70px ; width: 80px;" src="{{asset('resources/images/div3.jpg')}}" alt=""></a>
                    </div>
                </div>

              <!-- Controls -->
              <a class="left item-control" href="#similar-product" data-slide="prev">
                <i class="fa fa-angle-left"></i>
              </a>
              <a class="right item-control" href="#similar-product" data-slide="next">
                <i class="fa fa-angle-right"></i>
              </a>
        </div>

    </div>
    <div class="col-sm-7">
        <div class="product-information"><!--/product-information-->
            <img src="{{URL::to('/resources/images/new.jpg')}}" class="newarrival" alt="" />
                    
            <h2></h2>
            <p>{{$pro->product_name}} PDID{{$pro->product_id}} </p>
            <h2 style="color: #FE980F;">${{number_format($pro->product_price,2,'.',',')}}</h2>
            <img src="{{URL::to('/resources/images/rating.png')}}" alt="" />

            <form action="{{URL::to('save-cart/'.$pro->product_id)}}" method="POST">
               {{csrf_field()}}
            <span>
                <span></span>
                <label>Quantity:</label>
                <input name="qty" type="number"  min="1" value="1"/>
                <input name="productid_hidden" type="hidden" value="{{$pro->product_id}}"/>
                <button type="submit" class="btn btn-fefault cart">
                    <i class="fa fa-shopping-cart"></i>
                    Add to cart
                </button>
            </span>
            </form>

            <p><b>Condition:</b>
            @if ($pro->product_status == 0)
                Stocking
            @else
                Out of stock
            @endif
            </p>
            <p><b>Description: </b><p>{{$pro->product_desc}}</p></p>
            <p><b>Brand: </b>{{$pro->brand_name}}</p>
            <p><b>Category: </b>{{$pro->category_name}}</p>
            <a href=""><img src="{{URL::to('resources/images/share.png')}}" class="share img-responsive"  alt="" /></a>
        </div><!--/product-information-->
    </div>  
</div><!--/product-details-->

<div class="category-tab shop-details-tab"><!--category-tab-->
   
    <div class="col-sm-12">
        <ul class="nav nav-tabs">
            <?php
                $qty_review = 0;
                foreach($review as $key => $rev){
                    if($rev->product_id == $pro->product_id){
                        $qty_review++;
                    }
                }
            ?>
            <li><a href="#companyprofile" data-toggle="tab">Reviews ({{$qty_review}})</a></li>
            <li><a href="#reviews" data-toggle="tab">Write Reviews</a></li>
        </ul>
    </div>
    <div class="tab-content">
        <div class="tab-pane fade" id="companyprofile" >
            @foreach ($review as $key => $rev )
                @if ($rev->product_id == $pro->product_id)
                <h5 style="padding-left: 10px;">
                <img src="{{URL::to('resources/images/2.png')}}" style="width: 25px;" alt="">
                {{$rev->customer->customer_name}}
                </h5>
                <p style="padding-left: 10px;">{{$rev->review_content}}</p>
                <br>
                @endif
            @endforeach
        </div>
        
        <div class="tab-pane fade " id="reviews" >
            <div class="col-sm-12">
                <!-- <ul>
                    <li><a href=""><i class="fa fa-user"></i>EUGEN</a></li>
                    <li><a href=""><i class="fa fa-clock-o"></i>12:41 PM</a></li>
                    <li><a href=""><i class="fa fa-calendar-o"></i>31 DEC 2014</a></li>
                </ul>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p> -->
                <p><b>Write Your Review</b></p>
                
                <form action="{{URL::to('reviews-product/'.$pro->product_id)}}" method="POST">
                    @csrf
                    @if(Session::get('customer_id'))
                        @foreach ($customer as $key => $cus )
                            @if($cus->customer_id == Session::get('customer_id'))
                            <span>
                                <input type="text" value="{{$cus->customer_name}}" placeholder="Your Name"/>
                                <input type="email" value="{{$cus->customer_email}}" placeholder="Email Address"/>
                            </span>
                                <textarea name="review_content" ></textarea>
                                <b>Rating: </b> <img src="{{URL::to('resources/images/rating.png')}}" alt="" />
                                <button type="submit" class="btn btn-default pull-right">
                                    Submit
                                </button>
                            @endif
                        @endforeach
                    
                    @else
                    <h3 style="color: #FE980F;">Log in to rate the product</h3>
                    <!-- <a href="{{URL::to('/login-checkout')}}">Go to login</a> -->
                    @endif
                    
                </form>
            </div>
        </div>
        
    </div>
</div><!--/category-tab-->

<div class="recommended_items"><!--recommended_items-->
    <h2 class="title text-center">Suggested Products</h2>
    
    <div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
            <div class="item active">
            @foreach($realative as $key => $rel)
            <a href="{{URL::to('show-detail-product/'.$rel->product_id)}}">
                <div class="col-sm-4">
                    <div class="product-image-wrapper">
                        <div class="single-products">
                            
                            <div class="productinfo text-center">
                                <img style="height: 100px; width: 100px;" src="{{URL::to('resources/images/image_product/'.$rel->product_img)}}" alt="" />
                                <h4 style="color: grey;">{{$rel->product_name}}</h4>
                                <p style="color: #FE980F;">${{ number_format($rel->product_price,2,'.',',')}}</p>
                                <form method="post" action="{{URL::to('save-cart/'.$rel->product_id)}}">
                                {{csrf_field()}}
                                <button type="submit" class="btn btn-fefault cart">
                                    <i class="fa fa-shopping-cart"></i>
                                    Add to cart
                                </button>                           
                                </form>                           
                            </div>
                        </div>
                    </div>
                </div>
            </a>
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
@endforeach
@endsection