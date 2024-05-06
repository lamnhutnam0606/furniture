@extends('dashboard')
@section('content')
<div class="row">
    <div class="col-lg-12">
            <section class="panel"> 
                <?php
                // use Illuminate\Support\Facades\Session;
                // $messages = Session::get('messages');
                // if($messages){
                //     echo $messages;
                //     Session::put('messages',null);
                // }
                ?>
                <header class="panel-heading">
                    Add Category Product
                </header>
                <div class="panel-body">
                    <div class="position-center">

                        <!-- use controller -->
                        <!-- @foreach($category_product as $key => $cate)
                        <form role="form" method="post" action="{{URL::to('update-category/')}}">
                        {{csrf_field()}}
                        <div class="form-group">
                            <label for="exampleInputEmail1">Category Name</label>
                            <input type="text" class="form-control" name="update_category_product_name" value="" id="category_product_name" placeholder="Name Category Product">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Category Description</label>
                            <textarea style="resize: none" rows="5" class="form-control" id="category_product_desc" name="update_category_product_desc" placeholder="Describe Category Product"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputFile">Display</label>
                            <select class="form-control input-sm m-bot15" name="update_category_product_status">
                                
                                <?php
                                    //if($cate->category_status == 0){
                                ?>
                                    <option value="">Hidde</option> 
                                    <option value="1">Appear</option> 
                                <?php 
                                //}else{
                                ?> 
                                    <option value="">Appear</option>
                                    <option value="0">Hidde</option>
                                <?php 
                                //}
                                ?>   
                            </select>
                        </div>
                        <button type="submit" class="btn btn-info" name="add_category_product">Update Category</button>
                    </form>
                    @endforeach -->


                    <!-- use model -->
                   
                        <form role="form" method="post" action="{{URL::to('update-category/'.$category_product->category_id)}}">
                        {{csrf_field()}}
                        <div class="form-group">
                            <label for="exampleInputEmail1">Category Name</label>
                            <input type="text" class="form-control" name="update_category_product_name" value="{{$category_product->category_name}}" id="category_product_name" placeholder="Name Category Product">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Category Description</label>
                            <textarea style="resize: none" rows="5" class="form-control" id="category_product_desc" name="update_category_product_desc" placeholder="Describe Category Product">{{$category_product->category_desc}}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputFile">Display</label>
                            <select class="form-control input-sm m-bot15" name="update_category_product_status">
                                
                                <?php
                                    if($category_product->category_status == 0){
                                ?>
                                    <option value="{{$category_product->category_status}}">Hidde</option> 
                                    <option value="1">Appear</option> 
                                <?php 
                                }else{
                                ?> 
                                    <option value="{{$category_product->category_status}}">Appear</option>
                                    <option value="0">Hidde</option>
                                <?php 
                                }
                                ?>   
                            </select>
                        </div>
                        <button type="submit" class="btn btn-info" name="add_category_product">Update Category</button>
                    </form>
                   

                    </div>
                </div>
            </section>
    </div>
</div>
@endsection
