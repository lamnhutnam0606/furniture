@extends('dashboard')
@section('content')
<div class="row">
    <div class="col-lg-12">
            <section class="panel"> 
                <?php
                // use Illuminate\Support\Facades\Session;
                // $messages = Session::get('messages_coupon');
                // if($messages){
                //   echo '<script language="javascript">';
                //   echo 'alert("'.$messages.'")';
                //   echo '</script>';
                //   Session::put('messages_coupon',null);
                // }
                ?>
                <header class="panel-heading">
                    Update Coupon
                </header>
                <div class="panel-body">
                    <div class="position-center">
                    
                        <form role="form" method="post" action="{{URL::to('update-coupon/'.$coupon->coupon_id)}}">
                        {{csrf_field()}}
                        
                        <div class="form-group">
                            <label for="exampleInputEmail1">Coupon name</label>
                            <input type="text" class="form-control" value="{{$coupon->coupon_name}}" name="update_coupon_name" id="Coupon_name">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Coupon code</label>
                            <textarea style="resize: none" rows="5" name="update_coupon_code" class="form-control" id="coupon_code"  >{{$coupon->coupon_code}}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Quantity</label>
                            <input type="text" class="form-control" value="{{$coupon->coupon_qty}}" name="update_coupon_quantity" id="Coupon_quantity">
                        </div>
                        
                        <div class="form-group">
                            <label for="exampleInputFile">Coupon type</label>
                            <select class="form-control input-sm m-bot15" name="update_coupon_type">
                               <?php
                                    if($coupon->coupon_type == 1){
                                ?>
                                        <option value="{{$coupon->coupon_type}}">Percentage</option>
                                        <option value="2">Money</option>
                                <?php
                                    }else{
                                ?>
                                        <option value="{{$coupon->coupon_type}}">Money</option>
                                        <option value="1">Percentage</option>
                                <?php
                                    }
                               ?>
                                
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Percentage or money off</label>
                            <input type="text" class="form-control" value="{{$coupon->coupon_value}}" name="update_coupon_value" id="Coupon_value">
                        </div>
                        
                        <button type="submit" class="btn btn-info" name="add_coupon">Update Coupon</button>
                    </form>
                   
                    </div>

                </div>
            </section>
    </div>
    
</div>
@endsection
