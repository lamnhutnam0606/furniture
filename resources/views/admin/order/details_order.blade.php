@extends('dashboard')
@section('content')
<!-- customer info-->
<div class="table-agile-info">
    <div class="panel panel-default">
    <?php
    //   use Illuminate\Support\Facades\Session;
    //   $messages = Session::get('messages_category');
    //   if($messages){
    //     echo '<script language="javascript">';
    //     echo 'alert("'.$messages.'")';
    //     echo '</script>';
    //     Session::put('messages_category',null);
    //   }
      
    ?>
      <div class="panel-heading">
        Customer information
      </div>
      <div class="row w3-res-tb">
        <div class="col-sm-5 m-b-xs">
          <select class="input-sm form-control w-sm inline v-middle">
            <option value="0">Bulk action</option>
            <option value="1">Delete selected</option>
            <option value="2">Bulk edit</option>
            <option value="3">Export</option>
          </select>
          <button class="btn btn-sm btn-default">Apply</button>                
        </div>
        <div class="col-sm-4">
        </div>
        <div class="col-sm-3">
          <form action="{{URL::to('/search-category-product')}}" method="post">
          {{csrf_field()}}
          <div class="input-group">
            <input type="text" size="50" name="search_category" class="input-sm form-control" placeholder="Search">
            <span class="input-group-btn">
              <button class="btn btn-sm btn-default" type="submit">Search</button>
            </span>
          </div>
          </form>
        </div>
      </div>
      <div class="table-responsive">
        <table class="table table-striped b-t b-light">
          <thead>
            <tr>
              <th style="width:20px;">
                <label class="i-checks m-b-none">
                  <input type="checkbox"><i></i>
                </label>
              </th>
              <th>Customer name</th>
              <th>Customer phone</th>
              <th>Customer email</th>
              <th style="width:30px;"></th>
            </tr>
          </thead>
          <tbody>
            @foreach($details as $key => $del)
            <tr>
              <td><label class="i-checks m-b-none"><input type="checkbox" name="post[]"><i></i></label></td>
              <td>{{$del->customer_name}}</td>
              <td>{{$del->customer_phone}}</td>
              <td>{{$del->customer_email}}
              <span class="text-ellipsis">
                <?php
                //   if($cate->category_status==0){
                //     echo'Hidden';
                //   }else{
                //     echo'Appear';
                //   }
                    ?>
                    <!-- <a href="{{ URL::to('unactive-category-product/') }}"><span class="fa-thumb-styling fa fa-thumbs-up "></span></a> -->
                  <?php
                //   }else{
                  ?>
                  <!-- <a href="{{ URL::to('active-category-product/') }}"><span class="fa-thumb-styling fa fa-thumbs-down"></span></a> -->
                  <?php
                //   }
                  ?>
              </span></td>
              <td>
                <a href="{{ URL::to('update-category-product/') }}" class="active" ui-toggle-class="">
                  <i class="fa fa-pencil-square-o text-success text-active"></i>
                </a>
                <a onclick="return confirm('Are you sure you want to delete this category?')" href="{{ URL::to('delete-category-product/') }}" class="active" ui-toggle-class="">
                  <i class="fa fa-times text-danger text"></i>
                </a>
                  
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
      <footer class="panel-footer">
        <div class="row">
          
          <div class="col-sm-5 text-center">
            <small class="text-muted inline m-t-sm m-b-sm">showing 20-30 of 50 items</small>
          </div>
          <div class="col-sm-7 text-right text-center-xs">                
            <ul class="pagination pagination-sm m-t-none m-b-none">
              <li><a href=""><i class="fa fa-chevron-left"></i></a></li>
              <li><a href="">1</a></li>
              <li><a href="">2</a></li>
              <li><a href="">3</a></li>
              <li><a href="">4</a></li>
              <li><a href=""><i class="fa fa-chevron-right"></i></a></li>
            </ul>
          </div>
        </div>
      </footer>
    </div>
  </div>
  <br><br>
<!-- Produtc info -->
  <div class="table-agile-info">
    <div class="panel panel-default">
      <div class="panel-heading">
        Product information
      </div>
      <div class="row w3-res-tb">
        <div class="col-sm-5 m-b-xs">
          <select class="input-sm form-control w-sm inline v-middle">
            <option value="0">Bulk action</option>
            <option value="1">Delete selected</option>
            <option value="2">Bulk edit</option>
            <option value="3">Export</option>
          </select>
          <button class="btn btn-sm btn-default">Apply</button>                
        </div>
        <div class="col-sm-4">
        </div>
        <div class="col-sm-3">
          <form action="{{URL::to('/search-category-product')}}" method="post">
          {{csrf_field()}}
          <div class="input-group">
            <input type="text" size="50" name="search_category" class="input-sm form-control" placeholder="Search">
            <span class="input-group-btn">
              <button class="btn btn-sm btn-default" type="submit">Search</button>
            </span>
          </div>
          </form>
        </div>
      </div>
      <div class="table-responsive">
        <table class="table table-striped b-t b-light">
          <thead>
            <tr>
              <th style="width:20px;">
                <label class="i-checks m-b-none">
                  <input type="checkbox"><i></i>
                </label>
              </th>
              <th>Product name</th>
              <th>Product quantity</th>
              <th>Product price</th>
              <th>Order total</th>
              <th>Order status</th>
              <th style="width:30px;"></th>
            </tr>
          </thead>
          <tbody>
            @foreach($detai as $key => $del)
            <tr>
              <td><label class="i-checks m-b-none"><input type="checkbox" name="post[]"><i></i></label></td>
              <td>{{$del->product_name}}</td>
              <td>{{$del->product_sales_quantity}}</td>
              <td>{{$del->product_price}}</td>
              <td>{{$del->order_total}}</td>
              <td>{{$del->order_status}}
              <span class="text-ellipsis">
                <?php
                //   if($cate->category_status==0){
                //     echo'Hidden';
                //   }else{
                //     echo'Appear';
                //   }
                    ?>
                    <!-- <a href="{{ URL::to('unactive-category-product/') }}"><span class="fa-thumb-styling fa fa-thumbs-up "></span></a> -->
                  <?php
                //   }else{
                  ?>
                  <!-- <a href="{{ URL::to('active-category-product/') }}"><span class="fa-thumb-styling fa fa-thumbs-down"></span></a> -->
                  <?php
                //   }
                  ?>
              </span></td>
              <td>
                <a href="{{ URL::to('update-category-product/') }}" class="active" ui-toggle-class="">
                  <i class="fa fa-pencil-square-o text-success text-active"></i>
                </a>
                <a onclick="return confirm('Are you sure you want to delete this category?')" href="{{ URL::to('delete-category-product/') }}" class="active" ui-toggle-class="">
                  <i class="fa fa-times text-danger text"></i>
                </a>
                  
              </td>
            </tr>
           @endforeach
          </tbody>
        </table>
      </div>
      <footer class="panel-footer">
        <div class="row">
          
          <div class="col-sm-5 text-center">
            <small class="text-muted inline m-t-sm m-b-sm">showing 20-30 of 50 items</small>
          </div>
          <div class="col-sm-7 text-right text-center-xs">                
            <ul class="pagination pagination-sm m-t-none m-b-none">
              <li><a href=""><i class="fa fa-chevron-left"></i></a></li>
              <li><a href="">1</a></li>
              <li><a href="">2</a></li>
              <li><a href="">3</a></li>
              <li><a href="">4</a></li>
              <li><a href=""><i class="fa fa-chevron-right"></i></a></li>
            </ul>
          </div>
        </div>
      </footer>
    </div>
  </div>
  <br><br>
  <!-- payment info -->
  <div class="table-agile-info">
    <div class="panel panel-default">
      <div class="panel-heading">
        Payment information
      </div>
      <div class="row w3-res-tb">
        <div class="col-sm-5 m-b-xs">
          <select class="input-sm form-control w-sm inline v-middle">
            <option value="0">Bulk action</option>
            <option value="1">Delete selected</option>
            <option value="2">Bulk edit</option>
            <option value="3">Export</option>
          </select>
          <button class="btn btn-sm btn-default">Apply</button>                
        </div>
        <div class="col-sm-4">
        </div>
        <div class="col-sm-3">
          <form action="{{URL::to('/search-category-product')}}" method="post">
          {{csrf_field()}}
          <div class="input-group">
            <input type="text" size="50" name="search_category" class="input-sm form-control" placeholder="Search">
            <span class="input-group-btn">
              <button class="btn btn-sm btn-default" type="submit">Search</button>
            </span>
          </div>
          </form>
        </div>
      </div>
      <div class="table-responsive">
        <table class="table table-striped b-t b-light">
          <thead>
            <tr>
              <th style="width:20px;">
                <label class="i-checks m-b-none">
                  <input type="checkbox"><i></i>
                </label>
              </th>
              <th>Payment methods</th>
              <th>Payment status</th>
              <th style="width:30px;"></th>
            </tr>
          </thead>
          <tbody>
            @foreach($details as $key =>$del)
            <tr>
              <td><label class="i-checks m-b-none"><input type="checkbox" name="post[]"><i></i></label></td>
              <td>
              <span class="text-ellipsis">
                <?php
                  if($del->payment_method == 1){
                    echo'CASH';
                  }elseif($del->payment_method == 2){
                    echo'ATM CARD';
                  }else{
                    echo 'CREDIT CARD';
                  }
                    ?>
                    <!-- <a href="{{ URL::to('unactive-category-product/') }}"><span class="fa-thumb-styling fa fa-thumbs-up "></span></a> -->
                  <?php
                //   }else{
                  ?>
                  <!-- <a href="{{ URL::to('active-category-product/') }}"><span class="fa-thumb-styling fa fa-thumbs-down"></span></a> -->
                  <?php
                //   }
                  ?>
              </span></td>
              <td>{{$del->payment_status}}</td>
              <td>
                <a href="{{ URL::to('update-category-product/') }}" class="active" ui-toggle-class="">
                  <i class="fa fa-pencil-square-o text-success text-active"></i>
                </a>
                <a onclick="return confirm('Are you sure you want to delete this category?')" href="{{ URL::to('delete-category-product/') }}" class="active" ui-toggle-class="">
                  <i class="fa fa-times text-danger text"></i>
                </a>
                  
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
      <footer class="panel-footer">
        <div class="row">
          
          <div class="col-sm-5 text-center">
            <small class="text-muted inline m-t-sm m-b-sm">showing 20-30 of 50 items</small>
          </div>
          <div class="col-sm-7 text-right text-center-xs">                
            <ul class="pagination pagination-sm m-t-none m-b-none">
              <li><a href=""><i class="fa fa-chevron-left"></i></a></li>
              <li><a href="">1</a></li>
              <li><a href="">2</a></li>
              <li><a href="">3</a></li>
              <li><a href="">4</a></li>
              <li><a href=""><i class="fa fa-chevron-right"></i></a></li>
            </ul>
          </div>
        </div>
      </footer>
    </div>
  </div>
  <br><br>
  <!-- Shipping info -->
  <div class="table-agile-info">
    <div class="panel panel-default">
      <div class="panel-heading">
        Shipping information
      </div>
      <div class="row w3-res-tb">
        <div class="col-sm-5 m-b-xs">
          <select class="input-sm form-control w-sm inline v-middle">
            <option value="0">Bulk action</option>
            <option value="1">Delete selected</option>
            <option value="2">Bulk edit</option>
            <option value="3">Export</option>
          </select>
          <button class="btn btn-sm btn-default">Apply</button>                
        </div>
        <div class="col-sm-4">
        </div>
        <div class="col-sm-3">
          <form action="{{URL::to('/search-category-product')}}" method="post">
          {{csrf_field()}}
          <div class="input-group">
            <input type="text" size="50" name="search_category" class="input-sm form-control" placeholder="Search">
            <span class="input-group-btn">
              <button class="btn btn-sm btn-default" type="submit">Search</button>
            </span>
          </div>
          </form>
        </div>
      </div>
      <div class="table-responsive">
        <table class="table table-striped b-t b-light">
          <thead>
            <tr>
              <th style="width:20px;">
                <label class="i-checks m-b-none">
                  <input type="checkbox"><i></i>
                </label>
              </th>
              <th>Shipping name</th>
              <th>Shipping phone</th>
              <th>Shipping email</th>
              <th>Shipping address</th>
              <th>Shipping note</th>
              <th style="width:30px;"></th>
            </tr>
          </thead>
          <tbody>
            @foreach($details as $key => $del)
            <tr>
              <td><label class="i-checks m-b-none"><input type="checkbox" name="post[]"><i></i></label></td>
              <td>{{$del->shipping_name}}</td>
              <td>{{$del->shipping_phone}}</td>
              <td>{{$del->shipping_mail}}</td>
              <td>{{$del->shipping_address}}</td>
              <td>{{$del->shipping_note}}
              <span class="text-ellipsis">
                <?php
                //   if($cate->category_status==0){
                //     echo'Hidden';
                //   }else{
                //     echo'Appear';
                //   }
                    ?>
                    <!-- <a href="{{ URL::to('unactive-category-product/') }}"><span class="fa-thumb-styling fa fa-thumbs-up "></span></a> -->
                  <?php
                //   }else{
                  ?>
                  <!-- <a href="{{ URL::to('active-category-product/') }}"><span class="fa-thumb-styling fa fa-thumbs-down"></span></a> -->
                  <?php
                //   }
                  ?>
              </span></td>
              <td>
                <a href="{{ URL::to('update-category-product/') }}" class="active" ui-toggle-class="">
                  <i class="fa fa-pencil-square-o text-success text-active"></i>
                </a>
                <a onclick="return confirm('Are you sure you want to delete this category?')" href="{{ URL::to('delete-category-product/') }}" class="active" ui-toggle-class="">
                  <i class="fa fa-times text-danger text"></i>
                </a>
                  
              </td>
            </tr>
                    @endforeach
          </tbody>
        </table>
      </div>
      <footer class="panel-footer">
        <div class="row">
          
          <div class="col-sm-5 text-center">
            <small class="text-muted inline m-t-sm m-b-sm">showing 20-30 of 50 items</small>
          </div>
          <div class="col-sm-7 text-right text-center-xs">                
            <ul class="pagination pagination-sm m-t-none m-b-none">
              <li><a href=""><i class="fa fa-chevron-left"></i></a></li>
              <li><a href="">1</a></li>
              <li><a href="">2</a></li>
              <li><a href="">3</a></li>
              <li><a href="">4</a></li>
              <li><a href=""><i class="fa fa-chevron-right"></i></a></li>
            </ul>
          </div>
        </div>
      </footer>
    </div>
  </div>
  @foreach($details as $key => $del)
  <a href="{{URL::to('print-order/'.$del->order_id)}}">Print Order</a>
  @endforeach
@endsection