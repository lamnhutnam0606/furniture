@extends('dashboard')
@section('content')
<div class="row">
    <div class="col-lg-12">
            <section class="panel"> 
                <?php
                use Illuminate\Support\Facades\Session;
                $messages = Session::get('messages_category');
                if($messages){
                  echo '<script language="javascript">';
                  echo 'setTimeout(function() { alert("' . $messages . '"); }, 1);';
                  echo '</script>';
                  Session::put('messages_category',null);
                }
                ?>
                <header class="panel-heading">
                    Add Category Product
                </header>
                <div class="panel-body">
                    <div class="position-center">
                        <form role="form" method="post" action="{{URL::to('/add-category')}}">
                        {{csrf_field()}}
                        <div class="form-group">
                            <label for="exampleInputEmail1">Category Name</label>
                            <input type="text" class="form-control" name="category_product_name" id="category_product_name" placeholder="Name Category Product">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Category Description</label>
                            <textarea style="resize: none" rows="5" class="form-control" id="category_product_desc" name="category_product_desc" placeholder="Describe Category Product"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputFile">Display</label>
                            <select class="form-control input-sm m-bot15" name="category_product_status">
                                <option value="1">Hidden</option>
                                <option value="0">Appear</option>
                            </select>
                        </div>

                        <button type="submit" class="btn btn-info" name="add_category_product">Add Category</button>
                    </form>
                    </div>

                </div>
            </section>
    </div>
    
</div>
@endsection
