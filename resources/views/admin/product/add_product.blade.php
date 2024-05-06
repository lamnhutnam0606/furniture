@extends('dashboard')
@section('content')
<div class="row">
    <div class="col-lg-12">
            <section class="panel"> 
                    <header class="panel-heading">
                        Add Product
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
                        <form role="form" method="post" action="{{URL::to('/add-product')}}" enctype="multipart/form-data">
                        {{csrf_field()}}
                        <div class="form-group">
                            <label for="exampleInputEmail1">Product Name</label>
                            <input type="text" class="form-control" name="product_name" id="product_name" placeholder="Name Product">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Product Price</label>
                            <input type="text" class="form-control" name="product_price" id="product_price" placeholder="Price Product">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Product Discription</label>
                            <textarea style="resize: none" rows="5" class="form-control" id="product_desc" name="product_desc" placeholder="Describe Product"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Product Content</label>
                            <textarea style="resize: none" rows="5" class="form-control" id="product_content" name="product_content" placeholder="Content Product"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Product Image</label>
                            <input type="file" class="form-control" name="product_image" id="product_image" placeholder="Image Product">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputFile">Category Product</label>
                           
                            <select class="form-control input-sm m-bot15" name="load_category" id="load_category" placeholder="Chọn danh mục cho sản phẩm">
                                <option value=""disabled selected>Choose Category Product</option>
                                @foreach($category as $key => $cate)
                                    <option value="{{$cate->category_id}}">{{$cate->category_name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputFile">Brand Product</label>
                            <select class="form-control input-sm m-bot15" name="load_brand" id="load_brand">
                                <option value=""disabled selected>Choose Brand Product</option>
                                @foreach($brand as $key => $bra)
                                    <option value="{{$bra->brand_id}}">{{$bra->brand_name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputFile">Display</label>
                            <select class="form-control input-sm m-bot15" name="product_status">
                                <option value="1">Hidden</option>
                                <option value="0">Appear</option>
                            </select>
                        </div>

                        <button type="submit" class="btn btn-info" name="add_product">Add Product</button>
                    </form>
                    </div>

                </div>
               
            </section>

    </div>
    
</div>
@endsection