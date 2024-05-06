@extends('dashboard')
@section('content')
<div class="row">
    <div class="col-lg-12">
            <section class="panel"> 
                    <header class="panel-heading">
                        Update Product
                    </header>
                    <?php
                        use Illuminate\Support\Facades\Session;
                        $messages = Session::get('messages_product');
                        if($messages){
                        echo '<script language="javascript">';
                        echo 'setTimeout(function() { alert("' . $messages . '"); }, 1);';
                        echo '</script>';
                        Session::put('messages_product',null);
                    }
                    ?>
                <div class="panel-body">
                    <div class="position-center">
                        <!-- @foreach($product as $key => $pro)
                        <form role="form" method="post" action="{{URL::to('update-product/')}}" enctype="multipart/form-data">
                        {{csrf_field()}}
                        <div class="form-group">
                            <label for="exampleInputEmail1">Product Name</label>
                            <input type="text" class="form-control" value="" name="update_product_name" id="product_name" placeholder="Name Product">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Product Price</label>
                            <input type="text" class="form-control" value="" name="update_product_price" id="product_price" placeholder="Price Product">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Product Discription</label>
                            <textarea style="resize: none" rows="5" class="form-control" id="product_desc" name="update_product_desc" placeholder="Describe Product"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Product Content</label>
                            <textarea style="resize: none" rows="5" class="form-control" id="product_content" name="update_product_content" placeholder="Content Product"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Product Image</label>
                            <input type="file" value="" class="form-control" name="update_product_image" id="product_image" placeholder="Image Product">
                            <img style="width: 100px; height: 100px;" src="{{URL::to('resources/images/image_product/')}}" alt="">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputFile">Category Product</label>
                            <select class="form-control input-sm m-bot15" name="load_category" id="load_category" placeholder="Chọn danh mục cho sản phẩm">
                            <option value=""disabled selected>Choose Category Product</option>
                                @foreach($category as $key => $cate)
                                   
                                        <option selected value="{{$cate->category_id}}">{{$cate->category_name}}</option>
                                    
                                        <option value="{{$cate->category_id}}">{{$cate->category_name}}</option>
                                   
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputFile">Brand Product</label>
                            <select class="form-control input-sm m-bot15" name="load_brand" id="load_brand">
                                @foreach($brand as $key => $bra)
                                   
                                        <option selected value="{{$bra->brand_id}}">{{$bra->brand_name}}</option>
                                  
                                        <option value="{{$bra->brand_id}}">{{$bra->brand_name}}</option>
                                   
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputFile">Display</label>
                            <select class="form-control input-sm m-bot15" name="update_product_status">
                                <?php
                                    //if($pro->product_status==0){
                                ?>     
                                    <option value="">Appear</option>
                                    <option value="1">Hidden</option>
                                    <?php
                                    //}else{
                                    ?>
                                    <option value="">Hidden</option>
                                    <option value="0">Appear</option>
                                    <?php
                                    //}
                                ?>
                            </select>
                        </div>

                        <button type="submit" class="btn btn-info" name="update_product">Update Product</button>
                    </form>
                    @endforeach -->


                    <!-- use model -->
                   
                        <form role="form" method="post" action="{{URL::to('update-product/'.$product->product_id)}}" enctype="multipart/form-data">
                        {{csrf_field()}}
                        <div class="form-group">
                            <label for="exampleInputEmail1">Product Name</label>
                            <input type="text" class="form-control" value="{{$product->product_name}}" name="update_product_name" id="product_name" placeholder="Name Product">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Product Price</label>
                            <input type="text" class="form-control" value="{{$product->product_price}}" name="update_product_price" id="product_price" placeholder="Price Product">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Product Discription</label>
                            <textarea style="resize: none" rows="5" class="form-control" id="product_desc" name="update_product_desc" placeholder="Describe Product">{{$product->product_desc}}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Product Content</label>
                            <textarea style="resize: none" rows="5" class="form-control" id="product_content" name="update_product_content" placeholder="Content Product">{{$product->product_content}}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Product Image</label>
                            <input type="file" value="" class="form-control" name="update_product_image" id="product_image" placeholder="Image Product">
                            <img style="width: 100px; height: 100px;" src="{{URL::to('resources/images/image_product/'.$product->product_img)}}" alt="">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputFile">Category Product</label>
                            <select class="form-control input-sm m-bot15" name="load_category" id="load_category" placeholder="Chọn danh mục cho sản phẩm">
                                @foreach($category as $category)
                                @if($product->category_id==$category->category_id)
                                    <option selected value="{{$category->category_id}}">{{$category->category_name}}</option>
                                @else
                                    <option value="{{$category->category_id}}">{{$category->category_name}}</option>
                                @endif
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputFile">Brand Product</label>
                            <select class="form-control input-sm m-bot15" name="load_brand" id="load_brand">
                                @foreach($brand as $brand)
                                @if($product->brand_id==$brand->brand_id)
                                    <option selected value="{{$brand->brand_id}}">{{$brand->brand_name}}</option>
                                @else
                                    <option value="{{$brand->brand_id}}">{{$brand->brand_name}}</option>
                                @endif
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputFile">Display</label>
                            <select class="form-control input-sm m-bot15" name="update_product_status">
                                <?php
                                    if($product->product_status==0){
                                ?>     
                                    <option value="{{$product->product_status}}">Appear</option>
                                    <option value="1">Hidden</option>
                                    <?php
                                    }else{
                                    ?>
                                    <option value="{{$product->product_status}}">Hidden</option>
                                    <option value="0">Appear</option>
                                    <?php
                                    }
                                ?>
                            </select>
                        </div>

                        <button type="submit" class="btn btn-info" name="update_product">Update Product</button>
                    </form>
                   
                    </div>
                </div>
            </section>
    </div>
</div>
@endsection