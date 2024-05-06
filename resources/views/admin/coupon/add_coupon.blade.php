@extends('dashboard')
@section('content')
<div class="row">
    <div class="col-lg-12">
            <section class="panel"> 
                <?php
                use Illuminate\Support\Facades\Session;
                $messages = Session::get('messages_coupon');
                if($messages){
                  echo '<script language="javascript">';
                  echo 'setTimeout(function() { alert("' . $messages . '"); }, 1);';
                  echo '</script>';
                  Session::put('messages_coupon',null);
                }
                ?>
                <header class="panel-heading">
                    Add Coupon
                </header>
                <div class="panel-body">
                    <div class="position-center">
                        <form role="form" method="post" action="{{URL::to('/add-coupon')}}">
                        {{csrf_field()}}
                        <div class="form-group">
                            <label for="exampleInputEmail1">Coupon name</label>
                            <input type="text" class="form-control" name="Coupon_name" id="Coupon_name">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Coupon code</label>
                            <textarea style="resize: none" rows="5" name="coupon_code" class="form-control" id="coupon_code"  placeholder="Describe Category Product"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Quantity</label>
                            <input type="text" class="form-control" name="Coupon_quantity" id="Coupon_quantity">
                        </div>
                        
                        <div class="form-group">
                            <label for="exampleInputFile">Coupon type</label>
                            <select class="form-control input-sm m-bot15" name="Coupon_type">
                                <option disabled selected value="0">---Choose---</option>
                                <option value="1">Percentage</option>
                                <option value="2">Money</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Percentage or money off</label>
                            <input type="text" class="form-control" name="Coupon_value" id="Coupon_value">
                        </div>
                        <button type="submit" class="btn btn-info" name="add_coupon">Add Coupon</button>
                    </form>
                    </div>

                </div>
            </section>
    </div>
    
</div>
@endsection
