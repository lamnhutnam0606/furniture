@extends('dashboard')
@section('content')
<div class="table-agile-info">
    <div class="panel panel-default">
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
      <div class="panel-heading">
        List of Product Brands
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
          <form action="{{URL::to('/search-brand-product')}}" method="post">
          {{csrf_field()}}
          <div class="input-group">
            <input type="text" class="input-sm form-control" name="search_brand" id="search_brand" placeholder="Search">
            <span class="input-group-btn">
              <button class="btn btn-sm btn-default" type="submit" name="btn_search">Search</button>
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
              <th>Brand Name</th>
              <th>Discription</th>
              <th>Display</th>
              <th style="width:30px;"></th>
            </tr>
          </thead>
          <tbody>
          
            @foreach($brand_product as $key => $brand)
            <tr>
              <td><label class="i-checks m-b-none"><input type="checkbox" name="post[]"><i></i></label></td>
              <td>{{$brand->brand_name}}</td>
              <td>{{$brand->brand_desc}}</td>
              <td>
              <span class="text-ellipsis">
                <?php
                  if($brand->brand_status == 0){
                    echo 'Appear';
                  }else{
                    echo'Hidden';
                  }
                    ?>
                    <!-- <a href="{{ URL::to('unactive-brand-product/') }}"><span class="fa-thumb-styling fa fa-thumbs-up "></span></a> -->
                  <?php
                //   }else{
                  ?>
                  <!-- <a href="{{ URL::to('active-brand-product/') }}"><span class="fa-thumb-styling fa fa-thumbs-down"></span></a> -->
                  <?php
                //   }
                  ?>
              </span></td>
              <td>
                <a href="{{ URL::to('update-brand-product/'.$brand->brand_id) }}" class="active" ui-toggle-class="">
                  <i class="fa fa-pencil-square-o text-success text-active"></i>
                </a>
                <a onclick="return confirm('Are you sure you want to delete this brand?')" href="{{ URL::to('delete-brand-product/'.$brand->brand_id) }}" class="active" ui-toggle-class="">
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