@extends('dashboard')
@section('content')
<div class="row">
    
    <div class="col-lg-12">
            <section class="panel"> 
                <?php
                // use Illuminate\Support\Facades\Session;
                // $messages = Session::get('messages_update_brand');
                // if($messages){
                //   echo '<script language="javascript">';
                //   echo 'alert("'.$messages.'")';
                //   echo '</script>';
                //   Session::put('messages_update_brand',null);
                // }
                ?>
                <header class="panel-heading">
                    Add Brand Product
                </header>
                <div class="panel-body">
                    <div class="position-center">

                        <!-- use controller -->
                        <!-- @foreach($load_info as $key => $brand) -->
                        <!-- <form role="form" method="POST" action="{{URL::to('update-brand/')}}"> -->
                           <!-- {{csrf_field()}} -->
                        <!-- <div class="form-group"> -->
                            <!-- <label for="exampleInputEmail1">Brand Name</label> -->
                            <!-- <input type="text"  class="form-control" name="update_brand_product_name" value="" id="brand_product_name" placeholder="Name Category Product"> -->
                        <!-- </div> -->
                        <!-- <div class="form-group"> -->
                            <!-- <label for="exampleInputPassword1">Brand Description</label> -->
                            <!-- <textarea style="resize: none" rows="5" class="form-control" id="brand_product_desc" name="update_brand_product_desc" placeholder="Describe Category Product"></textarea> -->
                        <!-- </div> -->
                        <!-- <div class="form-group">
                            <label for="exampleInputFile">Display</label>
                            <select class="form-control input-sm m-bot15" name="update_brand_product_status">
                                <?php
                                    //if($brand->brand_status == 0){
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
                        <button type="submit" class="btn btn-info" name="add_brand_product">Update Brand</button>
                        </form>
                        @endforeach -->


                        
                        <!-- use model -->
                        <form role="form" method="POST" action="{{URL::to('update-brand/'.$load_info->brand_id)}}">
                           {{csrf_field()}}
                        <div class="form-group">
                            <label for="exampleInputEmail1">Brand Name</label>
                            <input type="text"  class="form-control" name="update_brand_product_name" value="{{$load_info->brand_name}}" id="brand_product_name" placeholder="Name Category Product">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Brand Description</label>
                            <textarea style="resize: none" rows="5" class="form-control" id="brand_product_desc" name="update_brand_product_desc" placeholder="Describe Category Product">{{$load_info->brand_desc}}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputFile">Display</label>
                            <select class="form-control input-sm m-bot15" name="update_brand_product_status">
                                <?php
                                    if($load_info->brand_status == 0){
                                ?> 
                                    <option value="{{$load_info->brand_status}}">Appear</option>
                                    <option value="1">Hidden</option>
                                <?php
                                    }else{
                                ?>
                                    <option value="{{$load_info->brand_status}}">Hidden</option>
                                    <option value="0">Appear</option>
                                <?php        
                                    }
                                ?>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-info" name="add_brand_product">Update Brand</button>
                        </form>

                        
                    </div>

                </div>
               
            </section>

    </div>
    
</div>
@endsection