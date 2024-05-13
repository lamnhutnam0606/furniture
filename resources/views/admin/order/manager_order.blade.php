@extends('dashboard')
@section('content')
<div class="table-agile-info">
    <div class="panel panel-default">
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
      <div class="panel-heading">
        Order management
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
          <form action="{{URL::to('/search-order-details')}}" method="post">
          {{csrf_field()}}
          <div class="input-group">
            <input type="text" size="50" name="search_order_details" class="input-sm form-control" >
            <span class="input-group-btn">
              <button class="btn btn-sm btn-default" name="search_order_details" type="submit">Search</button>
            </span>
          </div>
          </form>
        </div>
      </div>
      <div class="table-responsive">
        <table class="table table-striped b-t b-light">
          <thead>
            <tr>
              <th>STT</th>
              <th>Code</th>
              <th>Date</th>
              <th>Status</th>
              <th style="width:30px;"></th>
            </tr>
          </thead>
          <tbody>
            @php
              $i = 0;
            @endphp
            @foreach($order as $key => $orr)
            @php
              $i++;
            @endphp
            <tr>
              <td><label><i>{{$i}}</i></label></td>
              <td>{{$orr->order_code}}</td>
              <td>{{$orr->created_at}}</td>
              <td>{{$orr->order_status}}
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
                <a href="{{ URL::to('details-order/'.$orr->order_id) }}" class="active" ui-toggle-class="">
                  <i class="fa fa-pencil-square-o text-success text-active"></i>
                </a>
                <a onclick="return confirm('Are you sure you want to delete this category?')" href="{{ URL::to('delete-category-product/'.$orr->order_id) }}" class="active" ui-toggle-class="">
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
@endsection