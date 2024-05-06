@extends('dashboard')
@section('content')
<div class="row">
    
    <div class="col-lg-12">
            <section class="panel"> 
                <?php
                use Illuminate\Support\Facades\Session;
                $messages = Session::get('messages_brand');
                if($messages){
                  echo '<script language="javascript">';
                  echo 'setTimeout(function() { alert("' . $messages . '"); }, 1);';
                  echo '</script>';
                  Session::put('messages_brand',null);
                }
                ?>
                <header class="panel-heading">
                    Add Brand Product
                </header>
                <div class="panel-body">
                    <div class="position-center">
                        <form role="form" method="POST" action="{{URL::to('/add-brand')}}">
                           {{csrf_field()}}
                        <div class="form-group">
                            <label for="exampleInputEmail1">Brand Name</label>
                            <input type="text" class="form-control" name="brand_product_name" id="brand_product_name" placeholder="Name Category Product">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Brand Description</label>
                            <textarea style="resize: none" rows="5" class="form-control" id="brand_product_desc" name="brand_product_desc" placeholder="Describe Category Product"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputFile">Display</label>
                            <select class="form-control input-sm m-bot15" name="brand_product_status">
                                <option value="1">Hidden</option>
                                <option value="0">Appear</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-info" name="add_brand_product">Add Brand</button>
                        </form>
                    </div>

                </div>
               
            </section>

    </div>
    
</div>
@endsection